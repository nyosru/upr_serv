<div>
    <br/>
    {{--    domains: {{ $domains }}--}}
    <br/>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($domains as $d)
            <div class="pl-3 py-2 mb-1 mr-1 @if($loop->index%2 == 0) bg-gray-100 @else bg-green-100 @endif">
                {{--                {{$d->id }}<br/>--}}
                {{--                {{$d->domain }}<br/>--}}

                <div>
                    {{$d->domain}}

                    <button
                        @if( !$d->job )
                            wire:click.prevent="updateDomain({{$d->id}},1)"
                        @endif

                        class="
@if( $d->job )
bg-green-400
@else
bg-green-200 hover:bg-green-300 border-green-400 border-2
@endif
py-1 px-2">вкл
                    </button>
                    <button
                        @if( $d->job )
                            wire:click.prevent="updateDomain({{$d->id}},0)"
                        @endif

                        class="
@if( !$d->job )
bg-red-400
@else
bg-red-200 hover:bg-red-300 border-red-400 border-2
@endif

py-1 px-2">выкл
                    </button>

                    <a href="#"
                       wire:click="delete({{ $d->id }})"
                       wire:confirm="хотите удалить домен {{$d->domain }} ?"
                       class="underline text-red-400 hover:text-red-800">удалить</a>

                </div>

            </div>
        @endforeach

            <div class="mb-3 text-center bg-yellow-200 py-5">
                <span class="text-md">Добавить домен</span>
                <form wire:submit="save" class="inline-block">
                    <input type="text" wire:model="domain">
                    <button
                        class="bg-blue-300 rounded px-2 py-1"
                        type="submit">Добавить
                    </button>
                </form>
                @if(!empty($status_add))
                    <div class="bg-yellow-300 px-2 py-1">{{ $status_add }}</div>
                @endif
            </div>
    </div>

    {{--    <br/>--}}
    {{--    <br/>--}}

</div>
