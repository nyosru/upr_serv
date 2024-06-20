<?php

namespace App\Livewire\Upr;

use Livewire\Component;

class ConfigCaddyfile extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
//dd(23);
        return view('livewire.upr.config-caddyfile');
    }
}
