<?php

namespace App\Livewire\Upr\Caddyfile;

use App\Http\Controllers\CaddyfileController;
use App\Models\Caddyfile;
use App\Models\CaddyfileOption;
use Livewire\Component;

class Item extends Component
{
    public $filecaddy = [];

    public function render()
    {

        $in = [];
        $in['cf_finish'] = CaddyfileController::configFinish($this->filecaddy);
//        if (empty($this->item_status))
            $in['item_status'] = $this->filecaddy->on;
        return view('livewire.upr.caddyfile.item', $in);

    }
}
