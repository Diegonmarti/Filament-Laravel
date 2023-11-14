<?php

namespace Filament\Tables\Concerns;

use Illuminate\Support\Str;

trait CanSortRecords
{
    public $defaultSortColumn;

    public $defaultSortDirection;

    public $isSortable = true;

    public $sortColumn;

    public $sortDirection = 'asc';

    public function getDefaultSort()
    {
        return [$this->getDefaultSortColumn(), $this->getDefaultSortDirection()];
    }

    public function getDefaultSortColumn()
    {
        return $this->defaultSortColumn ?? $this->getTable()->getDefaultSortColumn();
    }

    public function getDefaultSortDirection()
    {
        return $this->defaultSortDirection ?? $this->getTable()->getDefaultSortDirection();
    }

    public function getSorts()
    {
        $sortColumn = $this->sortColumn;
        $sortDirection = $this->sortDirection;

        if (
            ! $this->isSortable() ||
            $sortColumn === '' ||
            $sortColumn === null
        ) {
            if (! $this->hasDefaultSort()) {
                return [];
            }

            return [
                $this->getDefaultSort(),
            ];
        }

        $column = collect($this->getTable()->getColumns())
            ->filter(fn ($column) => $column->getName() === $sortColumn)
            ->first();

        if ($column === null) {
            return [];
        }

        return collect($column->getSortColumns())
            ->map(fn ($sortColumn) => [$sortColumn, $sortDirection])
            ->toArray();
    }

    public function hasDefaultSort()
    {
        return $this->getDefaultSortColumn() !== null;
    }

    public function isSortable()
    {
        return $this->isSortable && collect($this->getTable()->getColumns())
                ->filter(fn ($column) => $column->isSortable())
                ->count();
    }

    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            switch ($this->sortDirection) {
                case 'asc':
                    $this->sortDirection = 'desc';

                    break;
                case 'desc':
                    $this->sortColumn = null;
                    $this->sortDirection = 'asc';

                    break;
            }

            return;
        }

        $this->sortColumn = $column;
        $this->sortDirection = 'asc';
    }

    protected function applyRelationshipSort($query, $sort)
    {
        [$sortColumn, $sortDirection] = $sort;

        $parentModel = $query->getModel();
        $relationshipName = (string) Str::of($sortColumn)->beforeLast('.');
        $relationship = $parentModel->{$relationshipName}();
        $relatedColumnName = (string) Str::of($sortColumn)->afterLast('.');
        $relatedModel = $relationship->getModel();

        return $query->orderBy(
            $relatedModel
                ->query()
                ->select($relatedColumnName)
                ->whereColumn(
                    "{$relatedModel->getTable()}.{$relationship->getOwnerKeyName()}",
                    "{$parentModel->getTable()}.{$relationship->getForeignKeyName()}",
                ),
            $sortDirection,
        );
    }

    protected function applySorting($query)
    {
        foreach ($this->getSorts() as $sort) {
            [$column, $direction] = $sort;

            if ($this->isRelationshipSort($column)) {
                $query = $this->applyRelationshipSort(
                    $query,
                    [$column, $direction],
                );
            } else {
                $query = $query->orderBy($column, $direction);
            }
        }

        return $query;
    }

    protected function isRelationshipSort($column)
    {
        return Str::of($column)->contains('.');
    }
}
