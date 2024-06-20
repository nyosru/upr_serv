<div class="bg-yellow-200 p-2 mb-1">
    <div class="float-right">

        <button
            @if(!$option->job)
                wire:click.prevent="update({{$option->id}},1)"
            @endif

            class="
            @if($option->job)
            bg-green-400
            @else
            bg-green-200 hover:bg-green-300 border-green-400 border-2
            @endif
             py-1 px-2">вкл
        </button>
        <button
            @if($option->job)
                wire:click.prevent="update({{$option->id}},0)"
            @endif

            class="
            @if(!$option->job)
            bg-red-400
            @else
            bg-red-200 hover:bg-red-300 border-red-400 border-2
            @endif

     py-1 px-2">выкл
        </button>
    </div>
    {{--    option: {{ $option }}--}}
    {{$option->name}}:
    <pre>{{$option->value}}</pre>
</div>
