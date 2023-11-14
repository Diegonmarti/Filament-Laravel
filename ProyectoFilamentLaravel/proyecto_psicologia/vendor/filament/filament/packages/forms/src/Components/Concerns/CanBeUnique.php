<?php

namespace Filament\Forms\Components\Concerns;

trait CanBeUnique
{
    public function unique($table, $column = null, $except = false)
    {
        $this->configure(function () use ($column, $except, $table) {
            $rule = "unique:$table,$column";

            if ($except) {
                $rule .= ",{$except}";
            }

            $this->addRules([$this->getName() => [$rule]]);
        });

        return $this;
    }
}
