<div class="text-md text-right pb-2">
    <form wire:submit="save">
        Новая площадка:

        {{--        название--}}
        {{--        <br/>--}}
        <input type="text" wire:model="name" class="border border-1 border-black-300"/>
        {{--        <br/>--}}
        {{--        значение <sup class="text-red-500">*</sup>--}}
        {{--        <br/>--}}
        {{--        <textarea wire:model="value" rows="5" required="required"></textarea>--}}
        {{--        <br/>--}}
        <button
            class="bg-blue-300 rounded px-2 py-1"
            type="submit">Добавить
        </button>

    </form>
</div>
