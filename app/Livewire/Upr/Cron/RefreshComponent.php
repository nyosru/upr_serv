<?php

namespace App\Http\Livewire\Upr\Cron;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RefreshComponent extends Component
{
    public $secondsLeft;
    public $se =11;

    public function mount()
    {
        $this->startCountdown();
    }

    public function startCountdown()
    {
        $this->secondsLeft = 90;
    }

    public function decrementSeconds()
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
            $response = Http::get('https://api.example.com/endpoint');
            // Обработка ответа, если необходимо
        } catch (\Exception $e) {
            Log::error('API Request failed: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.upr.cron.refresh-component');
    }
}
