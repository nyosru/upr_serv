<?php

namespace App\Livewire;

use Livewire\Component;

class UprConfigCaddyfileOptions extends Component
{

    public $caddyfile_id ;
    public $options = [];

    public function render()
    {
        return view('livewire.upr-config-caddyfile-options');
    }
}
