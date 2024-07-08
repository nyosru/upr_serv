<?php

namespace App\Http\Controllers\Api\service;

use App\Http\Controllers\Controller;
use App\Livewire\Upr\Cron\Action\GetApi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DockerPythonAdapterController extends Controller
{
//    public static $server = 'http://91.218.230.97:5001';
//    public static $server = 'https://upr.local:5001';
    public static $server = 'http://php2.local:5001';

    public static $actions = [
        'full_update_crontab' => [
            'data' => [
                'crontab_content'
            ]
        ],
        'get_jobs_crontab' => [
            'data' => [
                'container_name'
            ]
        ],
        'get_crontab' => [
            'data' => [
                'container_name'
            ],
            'method' => 'get'
        ],
        'update_crontab' => [
            'data' => [
                'crontab_path'
            ]
        ],
        'copy_crontab' => [
            'data' => [
                'source_path',
                'target_path',
                'container_name'
            ]
        ],
        'restart_container' => [
            'data' => [
                'container_name'
            ]
        ],
        'rebuild_container' => [
            'data' => [
                'container_name'
            ]
        ]
    ];

    /**
     * принимает пост запросы для изменения в крон через апи
     */
    public function action(Request $request): JsonResponse
    {
        $endpoint =
        $action = $request->input('action');
        $data = $request->input('data') ?? [];
        $container = $request->input('container') ?? 'cron-service';
//        $action = '', $data = [], $container =

//        $endpoint = $action;
//        $response = self::sendRequest($endpoint, $data, $method = 'POST');

        $response = [
            'message' => 'no action'
        ];
        if (isset(self::$actions[$action])) {
//            self::copy_crontab();
//            $response = json_decode(self::$action($container));
//            if (!empty($data)) {
//                $response = self::$action($container, $data);
//            } else {
//                $response = self::$action($container);
//            }
            $data['container_name'] = $container;
            $response = self::callPythonService(
                'flask-api',
                $action,
                $data,
                ( self::$actions[$action]['method'] ?? 'post' )
            );
            if (!empty($response['crontab'])) {
                $response['crontab_ar'] = explode("\n", $response['crontab']);
            }
//            return $re;
        }

        return response()->json([
            'message' => 'Hello from API v2222',
            '$action' => $action,
            '$container' => $container,
            '$response' => $response
        ]);
    }





    public
    static function get_containers(
        $container_name
    ): array {
        $re = self::callPythonService('flask-api', 'containers', [
            'container_name' => $container_name
        ], 'GET');
//        $re[] = __FILE__.' #'.__LINE__;
//        if( !empty($re['response']['crontab']) )
//            $re['crontab_ar'] = explode("\n", $re['response']['crontab']);
        return $re;
    }


    public
    static function get_crontab(
        $container_name
    ): array {
        $re = self::callPythonService('flask-api', 'get_crontab', [
            'container_name' => $container_name
        ], 'GET');
//        $re[] = __FILE__.' #'.__LINE__;
        if( !empty($re['response']['crontab']) )
            $re['crontab_ar'] = explode("\n", $re['response']['crontab']);
        return $re;
    }


    public
    static function go_command(
        $data = [
            'endpoint' => 'restart_container',
            'api_container_name' => '',
            // какой контейнер перезапускаем
            'container_name' => '',
            'method' => 'post'
        ]
    ) {
//        return $data;
//        return self::sendRequest('/restart', [
//            'container_name' => $container_name
//        ]);
        $re = self::callPythonService($data['api_container_name'], $data['endpoint'], $data, $data['method']);
//        $re['crontab_ar'] = explode("\n", $re['crontab']);
        return $re;
    }








    public
    static function full_update_crontab(
        $container_name,
        $crontab_content
    ) {
//        return self::sendRequest('/full_update_crontab', [
//            'container_name' => $container_name,
//            'crontab_content' => $crontab_content
//        ]);
        return self::callPythonService('flask-api', __FUNCTION__, [
            'container_name' => $container_name,
            'crontab_content' => $crontab_content
        ], 'POST');
    }

    public
    static function get_jobs_crontab(
        $container_name
    ) {
        return self::sendRequest('/get_jobs_crontab', [
            'container_name' => $container_name
        ], 'GET');
    }

    public
    static function update_crontab(
        $container_name
        //,
//        $crontab_path
    ) {
//        return self::sendRequest('/update-crontab', [
//            'container_name' => $container_name,
//            'crontab_path' => $crontab_path
//        ]);
        $re = self::callPythonService($container_name, 'update_crontab', [], 'post');
        return $re;
    }

    public
    static function copy_crontab(
        $container_name,
        $source_path,
        $target_path
    ) {
        return self::sendRequest('/copy', [
            'source_path' => $source_path,
            'target_path' => $target_path,
            'container_name' => $container_name
        ]);
    }


    public
    static function rebuild_container(
        $container_name
    ) {
        return self::sendRequest('/rebuild', [
            'container_name' => $container_name
        ]);
    }

    public
    static function sendRequest(
        $endpoint,
        $data,
        $method = 'POST'
    ) {
        $url = self::$server . '/' . $endpoint;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response === false) {
            $error = curl_error($curl);
            curl_close($curl);
            return json_encode(
                ['status' => 'error', 'message' => $error, 'code' => 500, 'info' => [self::$server, $endpoint]]
            );
        }

        curl_close($curl);
        return $response;
    }


    public
    static function callPythonService(
        $containerName,
        $endpoint,
        $data,
        $method = 'POST'
    )
    //: array
    {
        $re = [];
        $re[] = $url = "http://$containerName:5000/$endpoint";
        $re[] = $data;

//        GetApi
//            ->$show_process_start = [
//            $containerName,
//            $endpoint,
//            $data,
//            $method
//        ];


        $ch = curl_init();

        if (strtoupper($method) === 'GET') {
            $url .= '?' . http_build_query($data);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
        } else {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if ($response === false) {
            return [
                'status' => 'error',
                'message' => curl_error($ch)
            ];
        }else{
            $re['response'] = json_decode( $response , true );
        }

        curl_close($ch);

        $re[] = 'ok';

        return $re;

//        return ( empty($response) ? [] : json_decode( $response , true ) );
//        return [ $response ] ;
    }

//// Example usage
//$containerName = 'python_container';
//$endpoint = 'rebuild_and_restart';
//$data = ['container_name' => 'your_container_name'];
//$method = 'POST'; // or 'GET'
//
//$response = callPythonService($containerName, $endpoint, $data, $method);
//print_r($response);


}
