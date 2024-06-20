<?php

namespace App\Livewire\Upr\Caddyfile\Item;

use App\Http\Controllers\CaddyfileController;
use App\Models\CaddyfileDomain;
use Livewire\Component;

class Domains extends Component
{

    public $caddyfile_id;
//    public $domains;
    public $domain;
    public $status_add;

    public function save()
    {
        $e = CaddyfileDomain::create([
            'domain' => $this->domain,
            'caddyfile_id' => $this->caddyfile_id,
        ]);

//        $this->domains[] = $e;
//        if ($e) {
//            $this->domains = $this->refresh();
//        $this->refresh();

//        $this->domains = CaddyfileDomain::whereCaddyfileId($this->caddyfile_id)->get();

        $this->status_add = 'Домен ' . $this->domain . ' добавлен';
        $this->domain = '';
//        }

        // обновить дата файл
        CaddyfileController::createConfigCaddyfile();

    }

    public function updateDomain(CaddyfileDomain $cfd, $status_new)
    {
        $cfd->job = $status_new;
        $cfd->save();
//        $this->domain = $cfd;

        // обновить дата файл
        CaddyfileController::createConfigCaddyfile();

    }

    public function delete(CaddyfileDomain $cfd)
    {
//        $cfd->job = $status_new;
        $cfd->delete();
//        $this->domain = $cfd;

        // обновить дата файл
        CaddyfileController::createConfigCaddyfile();

    }


    public function refresh()
    {
        $this->domains = CaddyfileDomain::whereCaddyfileId($this->caddyfile_id)->get();
    }

    public function render()
    {
        return view('livewire.upr.caddyfile.item.domains',[
            'domains' => CaddyfileDomain::whereCaddyfileId($this->caddyfile_id)->get()
        ]);
    }
}
