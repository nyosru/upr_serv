<div>
    {{--    options--}}
    {{--    <br/>--}}
    {{--    $docker_id {{ $docker_id }}--}}
    {{--    <br/>--}}
    {{--    <br/>--}}
    {{--    <br/>--}}
    {{--    $items:{{ $items  }}--}}
    {{--    <br/>--}}
    {{--    <br/>--}}


    <div class="bg-gray-300 px-1 font-bold">
        options

        @if(!$show_add)
            <button
                wire:click="change_show_add"
                style="float:right; font-weight:normal;" class="text-gray-400 hover:text-black">добавить
            </button>
        @endif


    </div>

    @if($show_add)
<div class="bg-yellow-300 py-4 mb-1">

    <form wire:submit="save">
        <input type="text" wire:model="name" placeholder="название"
        class="w-full mb-1"/>
        <textarea wire:model="value" rows="2" required="required" placeholder="значение"
                  class="w-full mb-1"></textarea>
        <button
            class="bg-blue-300 rounded px-2 py-1 float-right mr-2"
            type="submit">Добавить
        </button>
    <br clear="all" />
    </form>

</div>
    @endif

    <div class="pl-4">
        <ol>
            @foreach( $items as $o )
                <li class="mb-1">
                    {{ $o->name }}: {{ $o->value }}
                    <button class="
                        @if($o->job) bg-green-400 pointer-events-none @else bg-green-100 hover:bg-green-300 border-b-2 border-b-green-500 @endif
                        px-1 py-0 "
                            wire:click="update({{ $o->id }}, 1)">вкл
                    </button>
                    <button class="
                        @if(!$o->job) bg-red-400 pointer-events-none @else bg-red-100 hover:bg-red-300 border-b-2 border-b-red-500 @endif
                        px-1 py-0"
                            wire:click="update({{ $o->id }}, 0)">выкл
                    </button>
                    <a href="#"
                       class="text-red-300 hover:text-red-500 hover:font-bold"
                       title="Удалить"
                       wire:confirm="удалить ?"
                       wire:click="delete({{ $o->id }})"
                    >X</a>
                    {{--                <br/>--}}
                    {{--                <br/>--}}
                    {{--                {{ $o }}--}}
                </li>
            @endforeach

        </ol>

    </div>
</div>
