<?php

namespace App\Livewire\Upr\Caddyfile;

use App\Models\Caddyfile;
use App\Models\CaddyfileOption;
use Livewire\Component;

class IndexAddItemForm extends Component
{

//    public $caddyfile_id;
    public $name;
//    public $value;

    public function save()
    {
        Caddyfile::create([
            'name' => $this->name,
//            'value' => $this->value,
//            'caddyfile_id' => $this->caddyfile_id,
//            'content' => $this->content,
        ]);

//        $this->skipRender();
        return redirect()->to('/config');
    }

    public function render()
    {
        return view('livewire.upr.caddyfile.index-add-item-form');
    }
}
