<?php

namespace Filament\Resources;

use Illuminate\Support\Str;

class Route
{
    public $name;

    public $page;

    public $uri;

    public function __construct($page, $uri, $name)
    {
        $this->page = $page;

        $this->name($name);
        $this->uri($uri);
    }

    public function uri($uri)
    {
        $this->uri = (string) Str::of($uri)->trim('/');

        return $this;
    }

    protected function name($name)
    {
        $this->name = $name;

        return $this;
    }
}
