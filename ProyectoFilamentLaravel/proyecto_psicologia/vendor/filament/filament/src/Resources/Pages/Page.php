<?php

namespace Filament\Resources\Pages;

use Filament\Resources\Concerns\CanCallHooks;
use Filament\Resources\Route;
use Illuminate\Support\Str;

class Page extends \Filament\Pages\Page
{
    use CanCallHooks;

    public static $resource;

    public static function generateUrl($parameters = [], $absolute = true)
    {
        return route(static::getResource()::getRouteNamePrefix() . '.' . static::getResource()::getSlug() . '.' . static::route()->name, $parameters, $absolute);
    }

    public static function getModel()
    {
        return static::getResource()::getModel();
    }

    public static function getQuery()
    {
        return static::getModel()::query();
    }

    public static function getResource()
    {
        return static::$resource;
    }

    public static function routeTo($uri, $name)
    {
        return new Route(static::class, $uri, $name);
    }

    protected function authorize($action)
    {
        $method = (string) Str::of($action)->ucfirst()->prepend('can');

        if (! method_exists($this, $method)) {
            return true;
        }

        abort_unless($this->{$method}() ?? true, 403);
    }
}
