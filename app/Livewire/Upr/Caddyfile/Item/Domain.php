<?php

namespace App\Livewire\Upr\Caddyfile\Item;

use App\Models\CaddyfileDomain;
use Livewire\Component;

class Domain extends Component
{
    public $domain;
    public $caddyfile_id;

    public function updateDomain(CaddyfileDomain $cfd, $status_new)
    {
        $cfd->job = $status_new;
        $cfd->save();
        $this->domain = $cfd;
    }


    public function render()
    {
        return view('livewire.upr.caddyfile.item.domain');
    }
}
