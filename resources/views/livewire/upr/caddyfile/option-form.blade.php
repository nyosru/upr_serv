<div>
    <div class="text-md">Добавить настройку</div>
    <form wire:submit="save">
        название
        <br/>
        <input type="text" wire:model="name" />
        <br/>
        значение <sup class="text-red-500">*</sup>
        <br/>
        <textarea wire:model="value" rows="5" required="required"></textarea>
        <br/>
        <button
            class="bg-blue-300 rounded px-2 py-1"
            type="submit">Добавить
        </button>

    </form>
</div>
