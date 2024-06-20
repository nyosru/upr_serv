<?php

namespace App\Livewire\Upr\Caddyfile;

use App\Models\CaddyfileOption;
use Livewire\Component;

class Option extends Component
{
    public $option;


    public function update($id,$status_new)
    {
        $i = CaddyfileOption::find($id);
        $i->job = $status_new;
        $i->save();

        return redirect()->to('/config');
    }

    public function render()
    {
        return view('livewire.upr.caddyfile.option');
    }
}
