<?php

namespace App\Livewire\Upr\Caddyfile;

use App\Models\Caddyfile;
use Livewire\Component;

class ItemOnoff extends Component
{

    public $filecaddy;
    public $status;

    public function update( Caddyfile $cf , $status_new)
    {
//        $cf = Caddyfile::find($this->id);
        $cf = $this->filecaddy;
        $cf->on = $status_new;
        $e = $cf->save();

        if ($e)
            $this->status = $cf->on;

    }

    public function render()
    {
        return view('livewire.upr.caddyfile.item-onoff');
    }
}
