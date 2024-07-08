<div>
    <h3>get-api</h3>
    <table class="table" style="width:100%;">
        <tr>
            <td style="width:50%; vertical-align: top;">

                {{--                <pre>--}}
                {{--                    {{ print_r($containers_list_loading, true) }}--}}
                {{--                    <br/>--}}
                {{--                    {{ print_r($containers_list, true) }}--}}
                {{--                </pre>--}}

                @foreach( $posts_list as $a => $v )
                    <label class="block mb-1">
                        <input type="radio" value="{{ $a }}" wire:model.live="action_api"/>
                        {{ $a }}
                    </label>
                @endforeach
                <br/>
                --- old ---<br/>
                @foreach( $posts_list_old as $a => $v )
                    <label class="block mb-1">
                        <input type="radio" value="{{ $a }}" wire:model.live="action_api"/>
                        {{ $a }}
                    </label>
                @endforeach

                {{--                <select wire:model.live="action_api2" >--}}
                {{--                    <option value="">действие</option>--}}
                {{--                    @foreach( $posts_list as $item => $ival )--}}
                {{--                    <option>{{$item}}</option>--}}
                {{--                        @endforeach--}}
                {{--                </select>--}}

                <button
                    class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black mr-2"
                    wire:click="apiGetNow">apiGetNow
                </button>
                <div wire:loading wire:target="apiGetNow" class="align-center">
                    <img src="/img/loading.svg"/>
                </div>


                @if( empty($containers_list) )
                    <div>
                        крон контейнер<br/>
                        <input type="text" class="w-full" wire:model="cron_container_name"></input>
                    </div>
                @else
                    <div>
                        выберите контейнер<br/>
                        @foreach($containers_list as $k => $i )
                            <label>   <div class="bg-orange-200 p-1 m-1 w-[45%] xinline float-left" style="">

                                    <input type="radio" wire:model="cron_container_name"
                                           value="{{ $i['name'] }}"/> {{ $i['name'] }}

                            </div>
                            </label>
                        @endforeach
                    </div>
                    <br clear="all" />
                @endif

                <div>
                    новый крон<br/>
                    <textarea wire:model="crontab_new" class="w-full" rows="10"></textarea>
                </div>

                <div>
                    АПИ контейнер<br/>
                    <input type="text" class="w-full" wire:model="api_container_name"></input>
                </div>

            </td>
            <td style=" vertical-align: top;">

                action_api: {{$action_api}}
                <br/>
                <br/>
                $show_process_start: {{ print_r($show_process_start) }}
                <br/>
                result:
                <br/>
                <div style="overflow:auto; width:100%; max-width:700px; border: 2px solid green; font-size: 10px;"
                     class="p-1">
                    <pre style="text-size:12px;">{{ !empty($result) ? print_r($result) : var_dump($result) }}</pre>
                </div>
                crontab_now
                <button
                    class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black mr-2"
                    wire:click="cronCopeData">копировать в новый
                </button>
                <br/>
                <textarea
                    wire:model="crontab_now"
                    rows="5" style="width:100%;"></textarea>
                <br/>
                data_config<br/>
                <textarea
                    wire:model.live="data_config"
                    rows="5" style="width:100%;"></textarea>

            </td>
        </tr>
    </table>

</div>
