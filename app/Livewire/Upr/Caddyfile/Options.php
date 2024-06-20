<?php

namespace App\Livewire\Upr\Caddyfile;

use App\Models\CaddyfileOption;
use Livewire\Component;

class Options extends Component
{

    public $caddyfile_id ;
    public $options = [];

    public function render()
    {
        return view('livewire.upr.caddyfile.options',[
            'options' => CaddyfileOption::whereCaddyfileId($this->caddyfile_id)
        ]);
    }
}
