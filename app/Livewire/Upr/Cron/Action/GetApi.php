<?php

namespace App\Livewire\Upr\Cron\Action;

use App\Http\Controllers\Service\CronController;
use Livewire\Component;

class GetApi extends Component
{
    public $action_api = '';
    public $posts_list = [
        'get_jobs_crontab' => [ 'name' => '' , 'method' => 'get' ],
        'get_crontab' => [ 'name' => '' , 'method' => 'get' ],
        'update-crontab' => [ 'name' => ''
        //    , 'method' => 'get'
        ],
        'copy' => [ 'name' => '' ,
//            'method' => 'get'
        ],
        'restart' => [ 'name' => ''
            //, 'method' => 'get'
            ],
        'rebuild' => [ 'name' => ''
            //, 'method' => 'get'
            ],
    ];
    public $result = [];
    public $loading = false;


    public function apiGetNow()
    {

        $this->result = CronController::getApi(
            'http://'.$_SERVER['HTTP_HOST'].':5001',
            $this->action_api,
            [
                'container_name' => 'cron-service'
            ],
            ( !empty($this->posts_list[$this->action_api]['method']) && $this->posts_list[$this->action_api]['method'] == 'get' ? 'get' : 'post' )
        );
    }

    public function render()
    {
        return view('livewire.upr.cron.action.get-api');
    }
}
