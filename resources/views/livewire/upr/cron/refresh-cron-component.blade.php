<div>
    {{ $ert }}

    <br/>
    {{ $secondsLeft }}
    <br/>

    <script type="application/javascript">
        console.log('1122');
        // document.addEventListener('livewire:load', function() {
            setInterval(function() {
            @this.call('decrementSeconds11');
            console.log('11');
            }, 1000);
        // });
    </script>


</div>
