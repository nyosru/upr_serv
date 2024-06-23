<?php

namespace App\Livewire\Upr\Cron\Action;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SaveFile extends Component
{
    public $data_cron_file = '';
    public $data_cron_file2 = '';


    public function copyFileInContainer($container_name,$source_path,$target_path): array
    {
//        $container_name = 'cron-service';
        $flask_api_url = 'http://91.218.230.97:5000/copy';

        $data = [
            'container_name' => $container_name
        ];

        $options = [
            CURLOPT_URL => $flask_api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ]
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code == 200) {
            $result = [
                'status' => 'success',
                'message' => 'Container restarted successfully.',
                'code' => 200
            ];
        } else {
            $result = [
                'status' => 'error',
                'message' => 'Failed to restart container.',
                'code' => 500
            ];
        }

        curl_close($ch);

//        header('Content-Type: application/json');
//        return json_encode($result);

        return $result;
    }

    public function restartContainer($container_name): array
    {
//        $container_name = 'cron-service';
        $flask_api_url = 'http://91.218.230.97:5000/restart';

        $data = [
            'container_name' => $container_name
        ];

        $options = [
            CURLOPT_URL => $flask_api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ]
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code == 200) {
            $result = [
                'status' => 'success',
                'message' => 'Container restarted successfully.',
                'code' => 200
            ];
        } else {
            $result = [
                'status' => 'error',
                'message' => 'Failed to restart container.',
                'code' => 500
            ];
        }

        curl_close($ch);

//        header('Content-Type: application/json');
//        return json_encode($result);
        return $result;
    }


//p.route('/update-crontab', methods=['POST'])
//container_name = data['container_name']
//crontab_path = data['crontab_path']
    public function updateCrontab($container_name,$crontab_path): array
    {
//        $container_name = 'cron-service';
        $flask_api_url = 'http://91.218.230.97:5000/update-crontab';

        $data = [
            'container_name' => $container_name
        ];

        $options = [
            CURLOPT_URL => $flask_api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ]
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code == 200) {
            $result = [
                'status' => 'success',
                'message' => 'Container restarted successfully.',
                'code' => 200
            ];
        } else {
            $result = [
                'status' => 'error',
                'message' => 'Failed to restart container.',
                'code' => 500
            ];
        }

        curl_close($ch);

//        header('Content-Type: application/json');
//        return json_encode($result);
        return $result;
    }


    public function save()
    {
//        $this->validate();
        $msg = Storage::put('cron/my-crontab', $this->data_cron_file);
        $msg .= ' - запись в файл /';
//        Post::create(
//            $this->form->all()
//        );

// Имя контейнера
        $containerName = 'cron-service';
//// Команда для перезапуска контейнера
//        $command = "docker restart " . escapeshellarg($containerName);
//// Выполнение команды
//        $output = shell_exec($command . " 2>&1");
//// Проверка и обработка результата
//        if (strpos($output, 'Error') !== false) {
//            $msg .= "Ошибка при перезапуске контейнера: <pre>$output</pre>";
//        } else {
//            $msg .= "Контейнер успешно перезапущен: <pre>$output</pre>";
//        }

        $result = $this->restartContainer($containerName);
        $msg .= '// '.$result['message'] ?? '';

        session()->flash( ( $result['code'] == 200 ) ? 'message' : 'error', $msg);
//        return redirect()->route('target.route');
//        return;
        return $this->redirect('/cron');
    }

    public function save2()
    {
//        $this->validate();

//        $filename = '/path/to/your/file.txt'; // Укажите путь к вашему файлу
        $filename = Storage::path('cron2/my-crontab', $this->data_cron_file2); // Укажите путь к вашему файлу
//        $permissions = 0755; // Укажите нужные права доступа
        $permissions = 0644; // Укажите нужные права доступа

// Изменение прав доступа к файлу
        if(chmod($filename, $permissions)) {
            echo "Права доступа к файлу успешно изменены";
        } else {
            echo "Ошибка при изменении прав доступа к файлу";
        }

        $msg = Storage::put('cron2/my-crontab', $this->data_cron_file2);
        $msg .= ' - запись в файл /';
//        Post::create(
//            $this->form->all()
//        );

// Имя контейнера
        $containerName = 'cron-service';
//// Команда для перезапуска контейнера
//        $command = "docker restart " . escapeshellarg($containerName);
//// Выполнение команды
//        $output = shell_exec($command . " 2>&1");
//// Проверка и обработка результата
//        if (strpos($output, 'Error') !== false) {
//            $msg .= "Ошибка при перезапуске контейнера: <pre>$output</pre>";
//        } else {
//            $msg .= "Контейнер успешно перезапущен: <pre>$output</pre>";
//        }

//        $result = $this-
        $crontab_path = '/etc/cron.d/my-crontab';
        $result = $this->updateCrontab($containerName,$crontab_path);

        $msg .= '// '.$result['message'] ?? '';

        session()->flash( ( $result['code'] == 200 ) ? 'message' : 'error', $msg);
//        return redirect()->route('target.route');
//        return;
        return $this->redirect('/cron');
    }

    public function render()
    {
        $this->data_cron_file = Storage::get('cron/my-crontab');
        $this->data_cron_file2 = Storage::get('cron2/my-crontab');
        return view('livewire.upr.cron.action.save-file');
    }
}
