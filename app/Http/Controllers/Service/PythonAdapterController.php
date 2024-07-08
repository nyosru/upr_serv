<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PythonAdapterController extends Controller
{

//
//    public static function sendRequest($endpoint, $data, $method = 'POST') {
//        $url = "http://91.218.230.97:5001" . $endpoint;
//
//        $curl = curl_init($url);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
//
//        if ($method == 'POST') {
//            curl_setopt($curl, CURLOPT_POST, true);
//            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
//        }
//
//        $response = curl_exec($curl);
//        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//
//        if ($response === false) {
//            $error = curl_error($curl);
//            curl_close($curl);
//            return json_encode(['status' => 'error', 'message' => $error, 'code' => 500]);
//        }
//
//        curl_close($curl);
//        return $response;
//    }
//
//    public static function full_update_crontab($container_name, $crontab_content) {
//        return self::sendRequest('/full_update_crontab', [
//            'container_name' => $container_name,
//            'crontab_content' => $crontab_content
//        ]);
//    }
//
//    public static function get_jobs_crontab($container_name) {
//        return self::sendRequest('/get_jobs_crontab', [
//            'container_name' => $container_name
//        ], 'GET');
//    }
//
//    public static function get_crontab($container_name) {
//        return self::sendRequest('/get_crontab', [
//            'container_name' => $container_name
//        ], 'GET');
//    }
//
//    public static function update_crontab($container_name, $crontab_path) {
//        return self::sendRequest('/update-crontab', [
//            'container_name' => $container_name,
//            'crontab_path' => $crontab_path
//        ]);
//    }
//
//    public static function copy_crontab($source_path, $target_path, $container_name) {
//        return self::sendRequest('/copy', [
//            'source_path' => $source_path,
//            'target_path' => $target_path,
//            'container_name' => $container_name
//        ]);
//    }
//
//    public static function restart_container($container_name) {
//        return self::sendRequest('/restart', [
//            'container_name' => $container_name
//        ]);
//    }
//
//    public static function rebuild_container($container_name) {
//        return self::sendRequest('/rebuild', [
//            'container_name' => $container_name
//        ]);
//    }
//
//// Пример использования функций
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//$action = $_POST['action'];
//$container_name = $_POST['container_name'];
//$response = '';
//
//switch ($action) {
//    case 'full_update_crontab':
//            $crontab_content = $_POST['crontab_content'];
//            $response = full_update_crontab($container_name, $crontab_content);
//            break;
//        case 'get_jobs_crontab':
//            $response = get_jobs_crontab($container_name);
//            break;
//        case 'get_crontab':
//            $response = get_crontab($container_name);
//            break;
//        case 'update_crontab':
//            $crontab_path = $_POST['crontab_path'];
//            $response = update_crontab($container_name, $crontab_path);
//            break;
//        case 'copy_crontab':
//            $source_path = $_POST['source_path'];
//            $target_path = $_POST['target_path'];
//            $response = copy_crontab($source_path, $target_path, $container_name);
//            break;
//        case 'restart_container':
//            $response = restart_container($container_name);
//            break;
//        case 'rebuild_container':
//            $response = rebuild_container($container_name);
//            break;
//        default:
//            $response = json_encode(['status' => 'error', 'message' => 'Invalid action', 'code' => 400]);
//            break;
//    }
//
//echo $response;
//} else {
//    echo json_encode(['status' => 'error', 'message' => 'Invalid request method', 'code' => 405]);
//}


//
//
//
//
//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
//        //
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(string $id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(string $id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, string $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(string $id)
//    {
//        //
//    }
}
