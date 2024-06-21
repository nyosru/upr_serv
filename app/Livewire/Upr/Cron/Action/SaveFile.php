<?php

namespace App\Livewire\Upr\Cron\Action;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SaveFile extends Component
{
    public $data_cron_file = '';


    public function save()
    {
//        $this->validate();
        Storage::put('cron/my-crontab', $this->data_cron_file);
//        Post::create(
//            $this->form->all()
//        );

// Имя контейнера
        $containerName = 'cron-service';
// Команда для перезапуска контейнера
        $command = "docker restart " . escapeshellarg($containerName);
// Выполнение команды
        $output = shell_exec($command . " 2>&1");
// Проверка и обработка результата
        if (strpos($output, 'Error') !== false) {
            $msg = "Ошибка при перезапуске контейнера: <pre>$output</pre>";
        } else {
            $msg = "Контейнер успешно перезапущен: <pre>$output</pre>";
        }
        session()->flash('message', $msg);
//        return redirect()->route('target.route');
//        return;
        return $this->redirect('/cron');
    }

    public function render()
    {
        $this->data_cron_file = Storage::get('cron/my-crontab');
        return view('livewire.upr.cron.action.save-file');
    }
}
