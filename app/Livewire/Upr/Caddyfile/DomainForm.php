<?php

namespace App\Livewire\Upr\Caddyfile;

use App\Models\CaddyfileDomain;
use Livewire\Component;

class DomainForm extends Component
{

    public $caddyfile_id;
    public $domain = '';

    public function save()
    {
        CaddyfileDomain::create([
            'domain' => $this->domain,
            'caddyfile_id' => $this->caddyfile_id,
//            'content' => $this->content,
        ]);

//        return false;
//        return redirect()->to('/config');
    }

    public function render()
    {
        return view('livewire.upr.caddyfile.domain-form');
    }
}
