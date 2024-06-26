<?php

namespace App\Livewire\Upr\Cron\Action;

use App\Http\Controllers\Service\CronController;
use Livewire\Component;

class GetApi extends Component
{
    public $action_api = '';
    public $data_config = '';
    public $posts_list = [

        'full_update_crontab' => [
            'name' => '',
            'method' => 'post',
            'value' => [
                'container_name' => 'cron-service',
                'crontab_content' => ''
            ]
        ],
        'get_jobs_crontab' => [
            'name' => '',
            'method' => 'get',
            'value' => [
                'container_name' => 'cron-service'
            ]
        ],
        'get_crontab' => [
            'name' => '',
            'method' => 'get',
            'value' => [
                'container_name' => 'cron-service'
            ]
        ],
        'update-crontab' => [
            'name' => ''
            ,
            'method' => 'post',
            'value' => [
                'container_name' => 'cron-service'
            ]

        ],
        'copy' => [
            'name' => '',
            'method' => 'post',
            'value' => [
                'container_name' => 'cron-service'
            ]

        ],
        'restart' => [
            'name' => ''
            ,
            'method' => 'post',
            'value' => [
                'container_name' => 'cron-service'
            ]

        ],
        'rebuild' => [
            'name' => ''
            ,
            'method' => 'post',
            'value' => [
                'container_name' => 'cron-service'
            ]

        ],
    ];
    public $result = [];
    public $loading = false;


    public function apiGetNow()
    {
        $this->result = CronController::getApi(
            'http://' . $_SERVER['HTTP_HOST'] . ':5001',
            $this->action_api,
            $this->posts_list[$this->action_api]['value'],
            (!empty($this->posts_list[$this->action_api]['method']) && $this->posts_list[$this->action_api]['method'] == 'get' ? 'get' : 'post')
        );
    }

    public function render()
    {
        $this->posts_list['full_update_crontab']['value']['crontab_content'] = $this->data_config;
        return view('livewire.upr.cron.action.get-api');
    }
}
