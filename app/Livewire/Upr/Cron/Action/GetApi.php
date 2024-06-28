<?php

namespace App\Livewire\Upr\Cron\Action;

use App\Http\Controllers\Service\CronController;
use App\Http\Controllers\service\PythonAdapterController;
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
    /**
     * метод которым обращаемся к апи питона
     * @var string
     */
    public $method = 'post';


    public function apiGetNow()
    {
        $this->method = (!empty($this->posts_list[$this->action_api]['method']) && $this->posts_list[$this->action_api]['method'] == 'get' ? 'get' : 'post');

// Пример использования функций
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//        $action = $_POST['action'];
        $action = $this->action_api;
//        $container_name = $_POST['container_name'];
        $container_name =  $this->posts_list[$this->action_api]['value']['container_name'] ?? 'cron-service';
        $response = '';

        switch ($action) {
            case 'full_update_crontab':
//                $crontab_content = $_POST['crontab_content'];
                $crontab_content = $this->posts_list[$this->action_api]['value']['crontab_content'] ?? '';
                $response = PythonAdapterController::update_crontab($container_name, $crontab_content);
                break;
            case 'get_jobs_crontab':
                $response = PythonAdapterController::get_jobs_crontab($container_name);
                break;
            case 'get_crontab':
                $response = PythonAdapterController::get_crontab($container_name);
                break;
            case 'update_crontab':
                $crontab_path = $_POST['crontab_path'];
                $response = PythonAdapterController::update_crontab($container_name, $crontab_path);
                break;
            case 'copy_crontab':
                $source_path = $_POST['source_path'];
                $target_path = $_POST['target_path'];
                $response = PythonAdapterController::copy_crontab($source_path, $target_path, $container_name);
                break;
            case 'restart_container':
                $response = PythonAdapterController::restart_container($container_name);
                break;
            case 'rebuild_container':
                $response = PythonAdapterController::rebuild_container($container_name);
                break;
            default:
                $response = json_encode(['status' => 'error', 'message' => 'Invalid action', 'code' => 400]);
                break;
        }

//            echo $response;
        $this->result = $response;
//        } else {
//            echo json_encode(['status' => 'error', 'message' => 'Invalid request method', 'code' => 405]);
//        }


//
//        if ($this->action_api == 'full_update_crontab') {
//            $this->posts_list[$this->action_api]['value']['crontab_content'] = $this->data_config;
//        }
//
//        $this->result = CronController::getApi(
//            'http://' . $_SERVER['HTTP_HOST'] . ':5001',
//            $this->action_api,
//            $this->posts_list[$this->action_api]['value'],
//            (!empty($this->posts_list[$this->action_api]['method']) && $this->posts_list[$this->action_api]['method'] == 'get' ? 'get' : 'post')
//        );
    }

    public function render()
    {
        return view('livewire.upr.cron.action.get-api');
    }
}
