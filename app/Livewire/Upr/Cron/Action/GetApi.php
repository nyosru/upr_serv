<?php

namespace App\Livewire\Upr\Cron\Action;

use App\Http\Controllers\Service\CronController;
use Livewire\Component;

class GetApi extends Component
{
    public $result = [];
    public $loading = false;


    public function apiGetNow()
    {
        $this->result = CronController::getApi(
            'http://'.$_SERVER['HTTP_HOST'].':5001',
            'get_jobs_crontab',
            [
                'container_name' => 'cron-service'
            ],
            'get'
        );
    }

    public function render()
    {
        return view('livewire.upr.cron.action.get-api');
    }
}
