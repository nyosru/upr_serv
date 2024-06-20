<?php

namespace App\Livewire\Upr\Docker;

use App\Http\Controllers\DockerController;
use App\Models\Docker;
use Livewire\Component;

class Index extends Component
{

    public $name;
public $show_add_index = false;

    public function change_show_add(){
        $this->show_add_index = !$this->show_add_index;
    }

    public function createDockerfile(){
        DockerController::createDockerFile();
    }

    public function delete( Docker $d ){
        $d->delete();
        return redirect()->to('/docker/');
    }


    public function render()
    {
        return view('livewire.upr.docker.index',[
            'data' => Docker::with('volumes','network','options')->get()
        ]);
    }
}
