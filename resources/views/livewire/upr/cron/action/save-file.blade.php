<div>

{{--    --}}
{{--11<br/>--}}
{{--    <form wire:submit="save" >--}}
{{--    <textarea--}}
{{--        wire:model="data_cron_file"--}}
{{--        rows="10" style="width:100%;"></textarea>--}}
{{--        <br/>--}}
{{--        <button type="submit" class="p-1 bg-green-400" >Save</button>--}}
{{--        <br/>--}}
{{--    <button--}}
{{--        class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black mr-2"--}}
{{--        wire:click="saveCronFile">сохранить файл</button>--}}
{{--    </form>--}}
{{--    <br/>--}}
{{--    22--}}


    result: {{ $result ?? 'x' }}
    <br/>
    result1: {{ $result1 ?? 'x' }}
    <br/>
    result2: {{ $result2 ?? 'x' }}
    <br/>
    result3: {{ $result3 ?? 'x' }}
    <br/>

    <br/>
    <form wire:submit="save2" >
    <textarea
        wire:model="data_cron_file2"
        rows="10" style="width:100%;"></textarea>
        <br/>
        <button type="submit" class="p-1 bg-green-400" >Save</button>
        <br/>
{{--    <button--}}
{{--        class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black mr-2"--}}
{{--        wire:click="saveCronFile">сохранить файл</button>--}}
    </form>


</div>
