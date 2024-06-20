<div>
    {{-- Success is as dangerous as failure. --}}
{{--    $options: {{ $options }}--}}
    @foreach( $options as $o )
        <div class="bg-yellow-200 p-2 mb-1">
        {{$o->name}}: <pre>{{$o->value}}</pre>
        </div>
    @endforeach

    <livewire:upr.caddyfile.option-form :caddyfile_id="$caddyfile_id"/>

</div>
