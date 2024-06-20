<div>

    <button
        @if( !$status )
            wire:click.prevent="update({{$filecaddy}},1)"
        @endif

        class="
            @if( $status )
            bg-green-400
            @else
            bg-green-200 hover:bg-green-300 border-green-400 border-2
            @endif
             py-1 px-2">вкл
    </button>
    <button
        @if( $status )
            wire:click.prevent="update({{$filecaddy}},0)"
        @endif

        class="
            @if( !$status )
            bg-red-400
            @else
            bg-red-200 hover:bg-red-300 border-red-400 border-2
            @endif

     py-1 px-2">выкл
    </button>

</div>
