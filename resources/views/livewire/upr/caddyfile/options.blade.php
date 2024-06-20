<div class="bg-cyan-200 ml-5 p-3 my-3">

    @foreach( $options as $o )
{{--        <div class="bg-yellow-200 p-2 mb-1">--}}
{{--            {{$o->name}}:--}}
{{--            <pre>{{$o->value}}</pre>--}}
{{--        </div>--}}
        <livewire:upr.caddyfile.option :option="$o"/>
    @endforeach

    <livewire:upr.caddyfile.option-form :caddyfile_id="$caddyfile_id"/>

</div>
