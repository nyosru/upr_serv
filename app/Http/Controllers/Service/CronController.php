<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CronController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function getApi(
        String $domain,
        String $action,
        Array $vars = [
        'container_name' => ''
    ], $type = 'post')
    {
        $flask_api_url = $domain.'/'.$action;

//        $data = [
//            'container_name' => $vars['container_name']
//        ];

        $options = [
            CURLOPT_URL => $flask_api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($vars))
            ]
        ];

        if( $type == 'post' ){
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = json_encode($vars);
        } elseif( $type == 'get' ){
            $options[CURLOPT_URL] .= '?'.http_build_query($vars);
        }

        $ch = curl_init();
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code == 200) {
            $result = [
                'status' => 'success',
                'message' => 'successfully.',
                'response' => $response,
                'code' => 200
            ];
        } else {
            $result = [
                'status' => 'error',
                'message' => 'Failed',
                'code' => 500
            ];
        }

        curl_close($ch);

//        header('Content-Type: application/json');
//        return json_encode($result);

        $result['CURLOPT_URL']= $options[CURLOPT_URL];
        $result['$response']= $response;
//        $result['$response2']= $response['status'];

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
