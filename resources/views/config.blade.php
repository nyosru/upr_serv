<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Config') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <livewire:upr.caddyfile.index/>

                    {{--                    <h2>caddyfiles</h2>--}}

                    @foreach($caddyfiles as $l)

                        {{--                    <livewire:upr-config-caddyfile :filecaddy="$l"/>--}}
                        <livewire:upr.caddyfile.item :filecaddy="$l"/>



                        @if( 1 == 2)
                            {{--                        <livewire:upr.ConfigCaddy />--}}

                            #{{ $l->id }} {{ $l->name }}
                            <div style="margin-left:15px;background-color: rgba(255,0,255,0.2); padding: 10px;">
                                <ul>
                                    @foreach($l->domains as $d)
                                        <li>{{ $d->domain }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br/>
                            <div style="margin-left:15px; background-color: rgba(255,255,0,0.2); padding: 10px;">
                                <ul>
                                    @foreach($l->options as $o)
                                        <li>{{ $o->name }}: {{ $o->value }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br/>
                            <small>{{ $l }}</small>
                            <br/>
                            <br/>
                        @endif
                    @endforeach

                    @if( 1 == 2 )

                        {{ __("You're logged in!") }}

                        список файлов для конфига
                        <br/>
                        <br/>
                        {{--                    $list: {{ print_r($list) }}--}}
                        @foreach($list as $l)
                            {{ $l }}
                            <br/>
                        @endforeach
                        <br/>
                        <br/>
                        $li2:
                        <pre>
                        {{$li2}}
                        </pre>
                        <br/>
                        <br/>
                        @foreach($li3 as $l3)
                            {{ $l3 }}
                            <br/>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
