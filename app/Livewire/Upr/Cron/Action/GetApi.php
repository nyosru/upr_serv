<?php

namespace App\Livewire\Upr\Cron\Action;

use App\Http\Controllers\Api\service\DockerPythonAdapterController;
use App\Http\Controllers\Service\CronController;
use App\Http\Controllers\service\PythonAdapterController;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class GetApi extends Component
{
    /**
     * @var array|mixed|string
     */
//    public static mixed $show_process_start;
    public $api_container_name = 'flask-api';
    public $cron_container_name = 'cron-service';
    public $container_name = 'flask-api';
    public $container_api = 'upr_serv';

    public mixed $show_process_start = [];
    public $crontab_now = '';
    public $crontab_new = '';
    public $action_api = '';
    public $action_api2 = '';
    public $data_config = '';
    public $posts_list = [
        'get_crontab' => [
            'name' => '',
            'method' => 'get',
            'value' => [
                'container_name' => 'cron-service'
            ]
        ],

        'get_containers' => [
            'name' => '',
            'method' => 'get',
//            'value' => [
//                'container_name' => 'cron-service'
//            ]
        ],

        'restart_container' => [
            'name' => ''
            ,
            'method' => 'post',
            'value' => [
                'container_name' => 'cron-service'
            ]

        ],

        'put_new_crontab' => [
            'name' => ''
            ,
            'method' => 'post',
            'value' => [
                'container_name' => 'cron-service'
            ]

        ],


    ];
    public $posts_list_old = [


        'full_update_crontab' => [
            'name' => '',
            'method' => 'post',
            'value' => [
                'container_name' => 'cron-service',
                'crontab_content' => ''
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


        'get_jobs_crontab' => [
            'name' => '',
            'method' => 'get',
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
    public $containers_list = [];

//    public $containers_list_loading = false;


    protected $listeners = ['apiDataReceived' => 'updateContainersList'];

    public function updateContainersList($data)
    {
        $this->containers_list = $data;
    }

//    public function apiGetContainers($container_name = 'flask-api')
    public function apiGetContainers()
    {
//        $response = DockerPythonAdapterController::get_containers($container_name);
        $response = DockerPythonAdapterController::get_containers('flask-api');
        return $this->containers_list = $response['response']['containers'] ?? [];
//        return $response;
    }

    public function mount()
    {
        // список контейнеров с данными
//        $conts = $this->apiGetContainers($this->api_container_name);
//        $this->containers_list = $conts['response']['containers'] ?? [];
        // настройки кронаl
        $response = DockerPythonAdapterController::get_crontab($this->cron_container_name);
        $this->crontab_now = $response['response']['crontab'] ?? [];
        // список контейнеров
        $this->apiGetContainers();
    }

    /**
     * сюда стучимся получить ответ
     * @return void
     */
    public function apiGetNow()
    {
        $this->method = $this->posts_list[$this->action_api]['method'] ?? 'post';

//        $this->result = [$this->method];
//return;

// Пример использования функций
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//        $action = $_POST['action'];
        $action = $this->action_api;
//        $container_name = $_POST['container_name'];
        $container_name = $this->posts_list[$this->action_api]['value']['container_name'] ?? 'cron-service';
        $response = '';

//        $this->result = [$this->method,$action,$container_name];
//return;

        switch ($action) {
            case 'get_crontab':
                $response = DockerPythonAdapterController::get_crontab($container_name);
                if (!empty($response['crontab'])) {
                    $this->crontab_now = $response['crontab'];
                }
//                $this->crontab_new = $response['response']['crontab'];
                $this->crontab_now = $response['response']['crontab'];
//                $this->result['response'] = $response;
                break;

            case 'get_containers':
                $response = DockerPythonAdapterController::get_containers($container_name);
                $this->containers_list = $response['response']['containers'];
//                if (!empty($response['crontab'])) {
//                    $this->crontab_now = $response['crontab'];
//                }
////                $this->crontab_new = $response['response']['crontab'];
//                $this->crontab_now = $response['response']['crontab'];
////                $this->result['response'] = $response;
                break;

            case 'restart_container':
//                $response = DockerPythonAdapterController::restart_container($this->cron_container_name);

//                container_name = request.form.get('container_name')
//        service_name = request.form.get('service_name')
//        compose_file_path = request.form.get('compose_file_path', 'docker-compose.yml')

                $response = [];
                $response[] = time();

//                crontab_new

//
//                $response[] = $data = [
//                    'endpoint' => 'crontab_new_save',
////                    'container_name' => $this->api_container_name ?? 'flask-api',
//                    'container_name' => $this->cron_container_name,
//                    'api_container_name' => $this->api_container_name ?? 'flask-api',
////                    'container_name' => $this->cron_container_name,
////                    'service_name' => $this->cron_container_name,
//                    'new_data' => $this->crontab_new,
//                    'method' => 'post'
//                ];
//                $response[] = DockerPythonAdapterController::go_command($data);
//                $response[] = time() - $response[0];


                $response[] = $container_name;
                $response[] = $data = [
                    'endpoint' => $action,
//                    'container_name' => $this->api_container_name ?? 'flask-api',
                    'container_name' => $this->cron_container_name,
                    'api_container_name' => $this->api_container_name ?? 'flask-api',
//                    'container_name' => $this->cron_container_name,
                    'service_name' => $this->cron_container_name,
                    'method' => 'post'
                ];
                $response[] = DockerPythonAdapterController::go_command($data);
                $response[] = time() - $response[0];

                break;


            case 'put_new_crontab':
//                $response = DockerPythonAdapterController::restart_container($this->cron_container_name);

//                container_name = request.form.get('container_name')
//        service_name = request.form.get('service_name')
//        compose_file_path = request.form.get('compose_file_path', 'docker-compose.yml')

                $response = [];
                $response[] = time();

//                crontab_new

//
//                $response[] = $data = [
//                    'endpoint' => 'crontab_new_save',
////                    'container_name' => $this->api_container_name ?? 'flask-api',
//                    'container_name' => $this->cron_container_name,
//                    'api_container_name' => $this->api_container_name ?? 'flask-api',
////                    'container_name' => $this->cron_container_name,
////                    'service_name' => $this->cron_container_name,
//                    'new_data' => $this->crontab_new,
//                    'method' => 'post'
//                ];
//                $response[] = DockerPythonAdapterController::go_command($data);

               // {FOLDER_UPRSERV_SERV}/storage/app/cron2'

                $filePath = 'cron2/my-crontab';


// Получение полного пути к файлу на сервере
                $fullPath = storage_path('app/' . $filePath);

                $response[] = date('Y-m-d H:i:s',filemtime($fullPath) );

//// Изменение прав доступа к директории
//                chmod(dirname($fullPath), 0775);
//
//// Изменение прав доступа к файлу
//                if (file_exists($fullPath)) {
//                    chmod($fullPath, 0664);
//                } else {
//                    // Если файла нет, создаем его с нужными правами
//                    Storage::put($filePath, '');
//                    chmod($fullPath, 0664);
//                }

                $response[] = Storage::put($filePath, $this->crontab_new);
                $response[] = date('Y-m-d H:i:s',filemtime($fullPath) );
                $response[] = 'данные в файле';
                $response[] = Storage::get($filePath);

                $response[] = time() - $response[0];


//                $response[] = $container_name;
//                $response[] = $data = [
//                    'endpoint' => $action,
////                    'container_name' => $this->api_container_name ?? 'flask-api',
//                    'container_name' => $this->cron_container_name,
//                    'api_container_name' => $this->api_container_name ?? 'flask-api',
////                    'container_name' => $this->cron_container_name,
//                    'service_name' => $this->cron_container_name,
//                    'method' => 'post'
//                ];
//                $response[] = DockerPythonAdapterController::go_command($data);
//                $response[] = time() - $response[0];

                break;


            case 'update_crontab':

//                $crontab_path = $_POST['crontab_path'];
                $response = DockerPythonAdapterController::update_crontab(
                    $container_name
//                    , $crontab_path
                );
                break;


            case 'full_update_crontab':
//                $crontab_content = $_POST['crontab_content'];
//                $crontab_content = $this->posts_list[$this->action_api]['value']['crontab_content'] ?? '';
                $response = DockerPythonAdapterController::full_update_crontab($container_name, $this->crontab_new);
                break;
            case 'get_jobs_crontab':
                $response = DockerPythonAdapterController::get_jobs_crontab($container_name);
                break;


            case 'copy_crontab':
                $source_path = $_POST['source_path'];
                $target_path = $_POST['target_path'];
                $response = DockerPythonAdapterController::copy_crontab($source_path, $target_path, $container_name);
                break;

            case 'rebuild_container':
                $response = DockerPythonAdapterController::rebuild_container($container_name);
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

    public function cronCopeData(): void
    {
        $this->crontab_new = $this->crontab_now;
    }

    public function render()
    {
        return view('livewire.upr.cron.action.get-api', [
//            'actions' => DockerPythonAdapterController::$actions
        ]);
    }
}
