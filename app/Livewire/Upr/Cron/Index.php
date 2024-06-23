<?php

namespace App\Livewire\Upr\Cron;

use App\Http\Controllers\CronController;

//use App\Models\Docker;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{

    public $data_cron_file = 111;
    public $data_cron_file_ar = [];
    public $datafile = '';

    function parseCronString($cronString)
    {
        $pattern = '/^(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(\S+)\s+(.*)$/';

        if (preg_match($pattern, $cronString, $matches)) {
            $timeParts = preg_split('/\s+/', $matches[1]);

            return [
                'dops' => [
                    'string' => $cronString,
                    '$matches' => $matches
                ],
                'data' => [
//            минуты 	0-59
                    'minutes' => $matches[1],
//часы 	0-23
                    'hours' => $matches[2],
//день месяца 	1-31
                    'day_of_month' => $matches[3],
//месяц 	1-12
                    'month' => $matches[4],
//день недели 	0-7 (0-Вс,1-Пн,2-Вт,3-Ср,4-Чт,5-Пт,6-Сб,7-Вс)
                    'day_of_week' => $matches[5] ?? '',
                    'command' => $matches[6], // Команда wget
//            'log' => $matches[3] // Логирование
                ]
            ];
        } else {
            return null; // Возвращаем null если строка не соответствует ожидаемому формату
        }
    }

    function readCronFile($filePath)
    {
        $result = [];

        // Открываем файл для чтения
        $file = fopen($filePath, "r");
        if ($file) {
            // Читаем файл построчно
            while (($line = fgets($file)) !== false) {
                if (substr(trim($line), 0, 1) == '#') {
                    continue;
                }

                $parsedLine = $this->parseCronString(trim($line)); // Парсим строку и убираем лишние пробелы
                if ($parsedLine !== null) {
                    $result[] = $parsedLine;
                }
            }
            // Закрываем файл
            fclose($file);
        } else {
            // Ошибка при открытии файла
            echo "Не удалось открыть файл: $filePath";
        }

        return $result;
    }

//// Пример использования
//$filePath = 'cron_jobs.txt';
//$parsedCronJobs = readCronFile($filePath);
//print_r($parsedCronJobs);
//
//


    public function render()
    {
        $this->data_cron_file = Storage::get('cron/my-crontab');
        $this->data_cron_file_ar = $this->readCronFile(Storage::path('cron/my-crontab'));
        $this->data_cron_file_ar2 = $this->readCronFile(Storage::path('cron2/my-crontab'));

//    parseCronString();

        $directory = 'cron';
        $directory2 = 'cron2';
        return view('livewire.upr.cron.index', [
            'files' => Storage::allFiles($directory),
            'files2' => Storage::allFiles($directory2)
//            'data' => Docker::with('volumes','network','options')->get()
        ]);
    }
}
