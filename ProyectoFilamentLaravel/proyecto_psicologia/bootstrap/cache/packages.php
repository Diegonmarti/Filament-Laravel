<?php return array (
  'blade-ui-kit/blade-heroicons' => 
  array (
    'providers' => 
    array (
      0 => 'BladeUI\\Heroicons\\BladeHeroiconsServiceProvider',
    ),
  ),
  'blade-ui-kit/blade-icons' => 
  array (
    'providers' => 
    array (
      0 => 'BladeUI\\Icons\\BladeIconsServiceProvider',
    ),
  ),
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'filament/filament' => 
  array (
    'providers' => 
    array (
      0 => 'Filament\\FilamentServiceProvider',
      1 => 'Filament\\Forms\\FormsServiceProvider',
      2 => 'Filament\\Tables\\TablesServiceProvider',
    ),
    'aliases' => 
    array (
      'FilamentManager' => 'Filament\\Filament',
    ),
  ),
  'fruitcake/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Fruitcake\\Cors\\CorsServiceProvider',
    ),
  ),
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'laravel/sail' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sail\\SailServiceProvider',
    ),
  ),
  'laravel/sanctum' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'livewire/livewire' => 
  array (
    'providers' => 
    array (
      0 => 'Livewire\\LivewireServiceProvider',
    ),
    'aliases' => 
    array (
      'Livewire' => 'Livewire\\Livewire',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'thomaswelton/laravel-gravatar' => 
  array (
    'providers' => 
    array (
      0 => 'Thomaswelton\\LaravelGravatar\\LaravelGravatarServiceProvider',
    ),
    'aliases' => 
    array (
      'Gravatar' => 'Thomaswelton\\LaravelGravatar\\Facades\\Gravatar',
    ),
  ),
);