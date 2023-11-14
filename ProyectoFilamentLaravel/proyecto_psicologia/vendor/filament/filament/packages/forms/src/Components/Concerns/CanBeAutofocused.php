<?php

namespace Filament\Forms\Components\Concerns;

trait CanBeAutofocused
{
    protected $autofocus = false;

    public function autofocus()
    {
        $this->configure(function () {
            $this->autofocus = true;
        });

        return $this;
    }

    public function isAutofocused()
    {
        return $this->autofocus;
    }
}
