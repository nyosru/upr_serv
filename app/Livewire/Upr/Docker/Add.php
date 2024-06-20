<?php

namespace App\Livewire\Upr\Docker;

use App\Models\Docker;
use Livewire\Component;

class Add extends Component
{

    public $name;
    public function indexAdd()
    {
        Docker::create([
            'name' => $this->name,
//            'value' => $this->value,
//            'docker_id' => $this->docker_id,
        ]);
        $this->name = '';
        return redirect()->to('/docker/');
    }

    public function render()
    {
        return view('livewire.upr.docker.add');
    }
}
