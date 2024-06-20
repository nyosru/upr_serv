<?php

namespace App\Livewire\Upr\Caddyfile;

use App\Models\Caddyfile;
use Livewire\Component;

class Index extends Component
{
    public $caddyfiles;

    public function render()
    {
        $this->caddyfiles = Caddyfile::with('domains')
            ->with('options')
            ->get();
        return view('livewire.upr.caddyfile.index');
    }
}
