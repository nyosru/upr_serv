<div>
    {{--    :domain="$d" :caddyfile_id="$filecaddy->id"--}}
    {{--    <Br/>--}}
    domain: {{$domain}}
    <br/>
    <br/>
    {{$domain->domain}}

    {{--@if(1==1)--}}
    <button
        @if( !$domain->job )
            wire:click.prevent="updateDomain({{$domain->id}},1)"
        @endif

        class="
            @if( $domain->job )
            bg-green-400
            @else
            bg-green-200 hover:bg-green-300 border-green-400 border-2
            @endif
             py-1 px-2">вкл
    </button>
    <button
        @if( $domain->job )
            wire:click.prevent="updateDomain({{$domain->id}},0)"
        @endif

        class="
            @if( !$domain->job )
            bg-red-400
            @else
            bg-red-200 hover:bg-red-300 border-red-400 border-2
            @endif

     py-1 px-2">выкл
    </button>
    {{--@endif--}}

    <a href="#" class="underline text-red-400 hover:text-red-800">удалить</a>

</div>
