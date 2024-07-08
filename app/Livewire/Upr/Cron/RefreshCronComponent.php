<?php

namespace App\Livewire\Upr\Cron;

use App\Http\Controllers\Api\service\DockerPythonAdapterController;
use App\Livewire\Upr\Cron\Action\GetApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class RefreshCronComponent extends Component
{
    public $ert = 11;
    public $secondsLeftMax = 3;
    public $secondsLeft = 11;


    public function mount()
    {
        $this->startCountdown();
    }

    public function startCountdown()
    {
        $this->secondsLeft = $this->secondsLeftMax;
    }

    public function decrementSeconds11()
    {
        if ($this->secondsLeft > 0) {
            $this->secondsLeft--;
        } else {
            $this->makeApiRequest();
            $this->startCountdown();
        }
    }

    public function makeApiRequest()
    {
        try {
//            $response = Http::get('https://api.example.com/endpoint');
            // Обработка ответа, если необходимо
//            $GetApi = new GetApi();
//            $container_name = $GetApi->posts_list[$this->action_api]['value']['container_name'] ?? 'cron-service';
            $response = DockerPythonAdapterController::get_containers($container_name??'x');
//            $GetApi->containers_list = $response['response']['containers'];
            $this->emit('apiDataReceived', $response['response']['containers']);
        } catch (\Exception $e) {
//            Log::error('API Request failed: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.upr.cron.refresh-cron-component');
    }
}
