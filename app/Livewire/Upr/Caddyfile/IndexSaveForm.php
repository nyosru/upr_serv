<?php

namespace App\Livewire\Upr\Caddyfile;

use App\Http\Controllers\CaddyfileController;
use App\Models\Caddyfile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Symfony\Component\Process\Process;

class IndexSaveForm extends Component
{

    public function save()
    {

        //exec('docker -v',$a,$b);
        //exec('docker exec caddy restart',$a,$b);
        //exec('ls',$a,$b);
        //exec('cd .. && ls',$a,$b);
        // /home/
        //        exec(' cd .. && cd .. && ls', $a, $b);
        // /
        //        exec('cd .. && cd .. && cd .. && ls', $a, $b);
//        dd($a, $b);

//        $w = Storage::allFiles('');
//        $w2 = Storage::get('caddy/Caddyfile');
//        $w3 = Storage::put('caddy/Caddyfile-new77', '1111');
//        $w4 = Storage::get('caddy/Caddyfile-new77');
//        dd($w, $w2, $w3, $w4);

        $cf = Caddyfile::whereOn(true)->with('domains')->with('options')->get();
        $all_c = '';
        foreach ($cf as $c) {
            $all_c .= CaddyfileController::configFinish($c) . PHP_EOL . PHP_EOL;
        }

//        Storage::put('caddy/777example.txt', $all_c);
        $w = Storage::put('Caddyfile-new', $all_c);

//        exec("make ca", $output, $exitCode);
//        exec("docker cp upr_serv:storage/app/Caddyfile-new caddy:etc/caddy/Caddyfile", $output, $exitCode);

////    use Symfony\Component\Process\Process;
////
//// Команда для выполнения на хосте
//        $command = [
////            'cd ..',
////            'cd build',
////            'ls'
//            'make ca'
//        ];
//
//// Создание процесса
//        $process = new Process($command);
//
//// Выполнение команды
//        $process->run();
//
//// Получение вывода команды
//        $output2 = $process->getOutput();
////
////        echo $output;


//        $w = Storage::get('caddy/Caddyfile');
        dd(
//            $output2,
//            $output,
//            $exitCode
            $w
        );


//// Команда, которая будет выполнена в контейнере caddy
//        $command = "echo 'Ваш новый конфиг' > /etc/caddy/Caddyfile";
//
//// Выполнение команды в контейнере caddy
//        exec("docker exec caddy /bin/sh -c \"$command\"", $output, $exitCode);
//
//// Проверка успешности выполнения команды
//        if ($exitCode === 0) {
//            echo "Файл Caddyfile в контейнере caddy успешно обновлен.";
//        } else {
//            echo "Произошла ошибка при обновлении Caddyfile.";
//        }
//
//        dd($exitCode, $all_c,777);

//        Caddyfile::create([
//            'name' => $this->name,
////            'value' => $this->value,
////            'caddyfile_id' => $this->caddyfile_id,
////            'content' => $this->content,
//        ]);
//
////        $this->skipRender();
//        return redirect()->to('/config');
    }

    public function render()
    {
        return view('livewire.upr.caddyfile.index-save-form');
    }
}
