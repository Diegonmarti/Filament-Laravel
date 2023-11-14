<?php

namespace Filament\View\Components;

use function Filament\get_image_url;
use Illuminate\View\Component;

class Image extends Component
{
    public $dprs;

    public $manipulations;

    public $src;

    public function __construct($src, $manipulations, $dprs = [1, 1.5, 2, 3])
    {
        $this->dprs = $dprs;
        $this->manipulations = $manipulations;
        $this->src = $src;
    }

    public function render()
    {
        return view('filament::components.image');
    }

    public function src($dpr = 1)
    {
        return get_image_url(
            $this->src,
            array_merge(['dpr' => $dpr], $this->manipulations),
        );
    }

    public function srcSet()
    {
        return collect($this->dprs)
            ->map(fn ($dpr) => $this->src($dpr) . ' ' . $dpr . 'x')
            ->implode(', ');
    }
}
