<?php

namespace App\Http\Controllers;

use App\Models\Caddyfile;
use App\Models\PhpcatDevelop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StarterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        $files = Storage::files('caddy');
//        dd($files);

        $in = [];

        $in['list'] = [];
//        $in['list'] = scandir(__DIR__ . '/../../../../caddy/');
//        $configfile = __DIR__ . '/../../../../caddy/dev.Caddyfile';
//        $in['li2'] = file_get_contents($configfile);
//        $in['li3'] = [];
////        $in['li3'] = explode("\n", $in['li2']);
//        $in['li5'] = $this->parseCaddyfile($configfile);
////        dd($li3);
//
        $in['caddyfiles'] = [];
//        $in['caddyfiles'] = Caddyfile::with('domains')
//            ->with('options')
//            ->get();

        return view('config', $in);
    }

    public function parseCaddyfile($caddyfile)
    {

        $out = [];
        $f = file_get_contents($caddyfile);

        return $out;
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
