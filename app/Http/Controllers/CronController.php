<?php

namespace App\Http\Controllers;

use App\Models\Docker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CronController extends Controller
{
//    public static function createDockerFile()
//    {
//
//        $dockers = Docker::with(
//            ['options' => function ($query) {
//                $query->whereJob(true);
//            }, 'network', 'volumes'])->get();
//
//        $tab = '  ';
//
//        $str = 'services:';
//        foreach ($dockers as $d) {
//            $str .=
//                PHP_EOL .
//                PHP_EOL .
//                $tab . $d->name . ':';
//            $oo = [];
//            foreach ($d->options as $o) {
//                $oo[$o->name][] = $o->value;
//            }
//            foreach ($oo as $n => $ar) {
//
//                if ($n == '') {
//                    foreach ($ar as $r) {
//                        $str .=
//                            PHP_EOL .
//                            $tab . $tab . trim($r);
//                    }
//                } else {
//
//                    if (
//                        $n == 'networks' ||
//                        $n == 'volumes' ||
//                        $n == 'ports' ||
//                        $n == 'expose' ||
//                        $n == 'environment' ||
//                        $n == 'depends_on' ||
//                        $n == 'networks' ||
//                        sizeof($ar) > 1
//                    ) {
//                        $str .=
//                            PHP_EOL .
//                            $tab . $tab . $n . ':';
//                        foreach ($ar as $r) {
//                            $str .= PHP_EOL . $tab . $tab . $tab . '- ' . $r;
//                        }
//
//                    } else {
//                        $str .=
//                            PHP_EOL .
//                            $tab . $tab . trim($n) . ': ' . $ar[0];
//                    }
//                }
//
//
//            }
//        }
////        echo $str;
//        $str2 = 'version: \'3.8\' '.PHP_EOL.PHP_EOL.$str;
//
//        $w = Storage::put('Dockerfile-new', $str2);
//        dd($w, $str, $d, __FILE__, __LINE__);
//    }
}
