<?php

namespace App\Livewire;

use App\Http\Controllers\CaddyfileController;
use Livewire\Component;

class UprConfigCaddyfile extends Component
{
    public $filecaddy = [];
//    public $filecaddy_id;

    public function render()
    {

//        dd($this->filecaddy['id']);

        $in = [];
        $in['cf_finish'] = CaddyfileController::configFinish($this->filecaddy);
//        dd($in);

        return view('livewire.upr-config-caddyfile',$in);
    }
}
