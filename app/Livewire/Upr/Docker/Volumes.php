<?php

namespace App\Livewire\Upr\Docker;

use App\Models\DockerOption;
use App\Models\DockerVolume;
use Livewire\Component;

class Volumes extends Component
{

    public $docker_id;
//    public $name;
    public $value1;
    public $value2;

    public $show_add;

    public function change_show_add(){
        $this->show_add = !$this->show_add;
    }

    public function delete(DockerOption $i)
    {
        $i->delete();
    }

    public function update(DockerOption $i, $status_new)
    {
        $i->job = $status_new;
        $i->save();
    }

    public function save()
    {
        DockerVolume::create([
            'value1' => $this->value1,
            'value2' => $this->value2,
            'docker_id' => $this->docker_id,
        ]);
        $this->value1 =
        $this->value2 = '';
    }

    public function render()
    {
        return view('livewire.upr.docker.volumes', [
            'items' => DockerVolume::whereDockerId($this->docker_id)->get()
        ]);
    }
}
