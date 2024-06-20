<?php

namespace App\Livewire\Upr\Docker;

use App\Models\Docker;
use App\Models\DockerNetwork;
use App\Models\DockerOption;
use Livewire\Component;

class NetworksList extends Component
{
    public $docker_id;
    public $network_now;
    public $name;
    public $show_add = false;


    public function delete( DockerNetwork $d ){
        $d->delete();
        return redirect()->to('/docker/');
    }

    public function change_show_add(){
        $this->show_add = !$this->show_add;
    }

    public function update(Docker $i, $network_new = null)
    {
        $i->docker_network_id = $network_new;
        $i->save();
    }

    public function add()
    {
        DockerNetwork::create([
            'name' => $this->name,
//            'value' => $this->value,
//            'docker_id' => $this->docker_id,
        ]);
        $this->name = '';
//        $this->value = '';
        return redirect()->to('/docker');
    }

    public function render()
    {
        return view('livewire.upr.docker.networks-list',[
            'list' => DockerNetwork::all()
        ]);
    }
}
