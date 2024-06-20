<?php

namespace App\Livewire\Upr\Docker;

use App\Models\CaddyfileOption;
use App\Models\DockerOption;
use Livewire\Component;

class Options extends Component
{
    public $docker_id;
    public $name;
    public $value;
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
        DockerOption::create([
            'name' => $this->name,
            'value' => $this->value,
            'docker_id' => $this->docker_id,
        ]);
        $this->name =
        $this->value = '';
    }

    public function render()
    {
        return view('livewire.upr.docker.options',[
            'items' => DockerOption::whereDockerId($this->docker_id)->get()
        ]);
    }
}
