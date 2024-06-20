<?php

namespace App\Livewire\Upr\Caddyfile;

use App\Http\Controllers\CaddyfileController;
use App\Models\CaddyfileOption;
use Livewire\Component;

class OptionForm extends Component
{
    public $caddyfile_id;
    public $name;
    public $value;

    public function save()
    {
        CaddyfileOption::create([
            'name' => $this->name,
            'value' => $this->value,
            'caddyfile_id' => $this->caddyfile_id,
//            'content' => $this->content,
        ]);

//        $this->skipRender();
//        return redirect()->back();
        return redirect()->to('/config');

        // обновить дата файл
        CaddyfileController::createConfigCaddyfile();

    }

    public function render()
    {
        return view('livewire.upr.caddyfile.option-form');
    }
}
