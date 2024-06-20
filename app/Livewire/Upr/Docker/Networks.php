<?php

namespace App\Livewire\Upr\Docker;

use App\Models\Docker;
use App\Models\DockerNetwork;
use Livewire\Component;

class Networks extends Component
{


    public function render()
    {
        return view('livewire.upr.docker.networks');
    }
}
