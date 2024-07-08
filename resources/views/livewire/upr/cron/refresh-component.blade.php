<div>
    <h1>Countdown: {{ $secondsLeft ?? 'x'}} seconds</h1>
{{$se}}
    <script>
        document.addEventListener('livewire:load', function () {
            setInterval(function () {
            @this.call('decrementSeconds');
            }, 1000);
        });
    </script>
</div>
