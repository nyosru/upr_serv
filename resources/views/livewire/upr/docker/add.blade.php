<div class="text-center">
    <div class="bg-yellow-300 py-4 mt-5 mb-1 inline-block" style="max-width: 600px;">
        <form wire:submit="indexAdd" class="mx-2">
            <input type="text" wire:model="name" placeholder="название"
                   class="w-full mb-1 px-2"/>
            {{--                    <textarea wire:model="value" rows="2" required="required" placeholder="значение"--}}
            {{--                              class="w-full mb-1"></textarea>--}}
            <button
                class="bg-blue-300 rounded px-2 py-1 float-right mr-2"
                type="submit">Добавить
            </button>
            <br clear="all"/>
        </form>
    </div>
</div>
