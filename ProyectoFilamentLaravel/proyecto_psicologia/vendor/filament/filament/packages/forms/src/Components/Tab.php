<?php

namespace Filament\Forms\Components;

use Illuminate\Support\Str;

class Tab extends Component
{
    use Concerns\CanConcealFields;

    protected $columns = 1;

    public function columns($columns)
    {
        $this->configure(function () use ($columns) {
            $this->columns = $columns;
        });

        return $this;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function getId()
    {
        return $this->getParent()->getId() . '-' . parent::getId();
    }

    public function getSubform()
    {
        return parent::getSubform()->columns($this->columns);
    }

    public static function make($label, $schema = [])
    {
        return (new static())
            ->label($label)
            ->id(Str::slug($label))
            ->schema($schema);
    }
}
