<div>
    <form wire:submit="save" >
    <textarea
        wire:model="data_cron_file"
        rows="10" style="width:100%;"></textarea>
        <br/>
        <button type="submit">Save</button>
        <br/>
{{--    <button--}}
{{--        class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black mr-2"--}}
{{--        wire:click="saveCronFile">сохранить файл</button>--}}
    </form>
</div>
