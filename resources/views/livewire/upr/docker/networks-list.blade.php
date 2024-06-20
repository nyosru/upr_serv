<div>

    <div class="bg-gray-300 px-1 font-bold">
        network

        @if(!$show_add)
            <button
                wire:click="change_show_add"
                style="float:right; font-weight:normal;" class="text-gray-400 hover:text-black">добавить
            </button>
        @endif
    </div>

    @if($show_add)
        <div class="bg-yellow-200 pb-1 pt-2 text-center">
        <form wire:submit="add">
            <input type="text" wire:model="name" class="mb-1 px-2 py-1" placeholder="название сети"/>
            {{--        <br/>--}}
            {{--        <input type="text" wire:model="value2" class="mb-1" placeholder="значение2"/>--}}
            {{--        <br/>--}}{{----}}
            <button
                title="Добавить"
                class="bg-blue-300 rounded px-2 py-1"
                type="submit">+
            </button>
        </form>
        </div>
    @endif


    {{--    $show_add: {{ $show_add ? 1 : 0 }}--}}

    {{--    list: {{$list}}--}}

    {{--    network_now: {{ $network_now  }}--}}
    <label>
        <input wire:change="update({{$docker_id}})" type="radio" value="" name="web{{ $docker_id }}"
               @if( empty($network_now->id) ) checked="checked" @endif
        > без сети
    </label>
    <br/>
    @foreach($list as $l)
        <div class=" @if( $loop->index%2 == 0) bg-gray-100 @else bg-gray-200 @endif ">
        <label>
            <input type="radio" value="{{ $l->id }}"
                   name="web{{ $docker_id }}"
                   wire:change="update({{$docker_id}},{{ $l->id }})"
                   @if(  !empty($network_now->id) && $network_now->id == $l->id ) checked="checked" @endif
            />
            {{ $l->id }} / </label>
            {{ $l->name }}
<button wire:click="delete({{ $l->id }})" wire:confirm="удалить сеть везде ?"
class="float-right text-gray-400 hover:text-red-600 ">X</button>
        </div>
    @endforeach

</div>
