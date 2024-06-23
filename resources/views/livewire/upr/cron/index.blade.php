<div>


    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 30000)" x-show="show">
        @if (session()->has('message'))
            <div id="alert" class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div id="alert" class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
    </div>

<div class="bg-yellow-300 p-3 border-3 border-green-400" >
    show cron config
    <br/>

    <livewire:upr.cron.action.save-file-is-array />

</div>

    <br/>


    show cron config
    <br/>

    <livewire:upr.cron.action.save-file />

    <br/>
    files:
    <pre>{{print_r($files),true}}</pre>
    <br/>
    files2:
    <pre>{{print_r($files2),true}}</pre>
    <br/>
    fi:
    <br/>
    <pre style="font-size:10px;">
        {{print_r($data_cron_file_ar),true}}
    </pre>

    {{--    --}}{{-- The whole world belongs to you. --}}
    {{--    --}}{{--    sss--}}
    {{--    --}}{{--    <br/>--}}
    {{--    --}}{{--    data: {{$data}}--}}
    {{--    <div class="text-center">--}}
    {{--        <button--}}
    {{--            class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black mr-2"--}}
    {{--            wire:click="createDockerfile">сформировать докер файл--}}
    {{--        </button>--}}
    {{--        @if(!$show_add_index)--}}
    {{--            <button--}}
    {{--                wire:click="change_show_add"--}}
    {{--                class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black">добавить--}}
    {{--            </button>--}}
    {{--        @endif--}}

    {{--        <x-nav-link :href="route('docker.add')" :active="request()->routeIs('docker.add')" wire:navigate--}}
    {{--                    class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black"--}}
    {{--        >--}}
    {{--            {{ __('docker.add') }}--}}
    {{--        </x-nav-link>--}}

    {{--        <button--}}
    {{--            wire:click="to(/docker/add)"--}}
    {{--            class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black">добавить2--}}
    {{--        </button>--}}
    {{--    </div>--}}


    {{--    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">--}}

    {{--        @if($show_add_index)--}}
    {{--            <div class="bg-yellow-300 py-4 mb-1">--}}
    {{--                <form wire:submit="indexAdd">--}}
    {{--                    <input type="text" wire:model="name" placeholder="название"--}}
    {{--                           class="w-full mb-1"/>--}}
    {{--                    --}}{{--                    <textarea wire:model="value" rows="2" required="required" placeholder="значение"--}}
    {{--                    --}}{{--                              class="w-full mb-1"></textarea>--}}
    {{--                    <button--}}
    {{--                        class="bg-blue-300 rounded px-2 py-1 float-right mr-2"--}}
    {{--                        type="submit">Добавить--}}
    {{--                    </button>--}}
    {{--                    <br clear="all"/>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        @endif--}}


    {{--        @foreach($data as $d)--}}
    {{--            <div class="m-1 @if($loop->index%2 == 0) bg-gray-200 @else bg-cyan-100 @endif">--}}
    {{--                <div class="bg-orange-300 p-3">--}}
    {{--                    <b>{{ $d->name  }}</b>--}}

    {{--                    <button wire:confirm="удалить ?" wire:click="delete({{$d->id}})"--}}
    {{--                    class="float-right">X</button>--}}
    {{--                </div>--}}
    {{--                {{ $d  }}--}}
    {{--                <div class="px-2 py-1 ">--}}
    {{--                    <ol>--}}

    {{--                        <li>--}}

    {{--                            <livewire:upr.docker.options :docker_id="$d->id"/>--}}

    {{--                        </li>--}}

    {{--                        <li>--}}

    {{--                            --}}{{--                        <livewire:upr.docker.networks :docker_id="$d->id"/>--}}
    {{--                            --}}{{--                        {{$d->network->id}}--}}

    {{--                            <livewire:upr.docker.networks-list--}}
    {{--                                :network_now="$d->network"--}}
    {{--                                :docker_id="$d->id"--}}
    {{--                            />--}}

    {{--                        </li>--}}
    {{--                        <li>--}}

    {{--                            <livewire:upr.docker.volumes :docker_id="$d->id"/>--}}
    {{--                        </li>--}}

    {{--                    </ol>--}}
    {{--                    --}}{{--                                <br/>--}}
    {{--                    --}}{{--                                <br/>--}}
    {{--                    --}}{{--                                {{$d}}--}}
    {{--                    --}}{{--                {{ $d->options()  }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @endforeach--}}
    {{--    </div>--}}
</div>
