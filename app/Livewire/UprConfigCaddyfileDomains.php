<?php

namespace App\Livewire;

use Livewire\Component;

class UprConfigCaddyfileDomains extends Component
{

    public $caddyfile_id ;
    public $domains = [];

    public function render()
    {
        return view('livewire.upr-config-caddyfile-domains');
    }
}
