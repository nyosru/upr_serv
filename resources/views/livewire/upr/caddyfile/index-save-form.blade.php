<div class="text-md text-right pb-2 bg-white-700"
     style="display: block; position: sticky; bottom: 0; z-index: 100; right: 10px;">
    <form wire:submit="save">
        Файл данных
        {{--        название--}}
        {{--        <br/>--}}
        {{--        <input type="text" wire:model="name" class="border border-1 border-black-300"/>--}}
        {{--        <br/>--}}
        {{--        значение <sup class="text-red-500">*</sup>--}}
        {{--        <br/>--}}
        {{--        <textarea wire:model="value" rows="5" required="required"></textarea>--}}
        {{--        <br/>--}}
        <button
            class="bg-blue-300 rounded px-2 py-1"
            type="submit">Сохранить
        </button>

    </form>
</div>
