<?php

namespace App\Http\Controllers;

use App\Models\Caddyfile;
use App\Models\CaddyfileDomain;
use App\Models\CaddyfileOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaddyfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public static function createConfigCaddyfile()
    {
        $cf = Caddyfile::whereOn(1)
//            ->has('domains', function (Builder $query) {
//                $query->where('job', '=', true);
//            })
//            ->has('options', function (Builder $query) {
//                $query->where('job', '=', true);
//            })
            ->select('id')
//            ->with([
//            'domains' => function ($query) {
//                $query->whereJob(true);
//            }
//            , 'options' => function ($query) {
//                    $query->whereJob(true);
//            }
//        ])
            ->get();
        $all_c = '';
        foreach ($cf as $c) {
//            dd($c);
            $all_c .= self::configFinish( $c ) . PHP_EOL . PHP_EOL;
        }

//        Storage::put('caddy/777example.txt', $all_c);
        $w = Storage::put('Caddyfile-new', $all_c);
    }

    public static function configFinish( $cf)
    {

        $domains = CaddyfileDomain::where('caddyfile_id', $cf->id)->get();
//        $domains = $cf->get();
//        $domains = $cf['domains'];
//        dd($cf->domains(),$domains);
//        dd($domains);
//        dd($cf->domains());

        $domains = CaddyfileDomain::whereCaddyfileId($cf->id)
            ->whereJob(true)
            ->get();
//        dd($domains);
        //        $cf['options'] = $cf->options();
        $str = '';

        foreach ($domains as $d) {
            //            dd($d);
            $str .= (!empty($str) ? ', ' : '') . $d->domain;
        }

        $str .= ' {' . PHP_EOL;

        $str_option = '';
//        $options = CaddyfileOption::where('caddyfile_id', $cf->id)->get();
//        $options = $cf->options()->get();
        $options = CaddyfileOption::where('caddyfile_id', $cf->id)->get();

        foreach ($options as $d) {

            if (!$d->job || empty($d->value))
                continue;

//            if ($d->name == 'text') {
            $str_option .= (!empty($str_option) ? ', ' . PHP_EOL : '') . '    ' . $d->value;
//            } else {
//                //            dd($d);
//                $str_option .= (!empty($str_option) ? ', ' . PHP_EOL : '') . '   ' . $d->name . ': ' . $d->value;
//            }
        }

        $str .= $str_option . PHP_EOL
            . '}' . PHP_EOL . PHP_EOL;

        return $str;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function saveTempFile()
    {
        dd(77);
        Storage::disk('local')->put('example.txt', 'Contents');
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
