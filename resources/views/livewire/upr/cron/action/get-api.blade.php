<div>
    <h3>get-api</h3>
    <table>
        <tr>
            <td>
                <select wire:model.live="action_api" >
                    <option value="">действие</option>
                    @foreach( $posts_list as $item => $ival )
                    <option>{{$item}}</option>
                        @endforeach
                </select>
                <button
                    class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black mr-2"
                    wire:click="apiGetNow">apiGetNow
                </button>
                <br/>
                <div wire:loading wire:target="apiGetNow">
                   <img src="/img/loading.svg"/>
                </div>

            </td>
            <td>
                action_api: {{$action_api}}
                <br/>result:
                <br/>
                <pre style="text-size:12px;">{{ print_r($result) }}</pre>
                <textarea
                    wire:model.live="data_config"
                    rows="5" style="width:100%;"></textarea>
            </td>
        </tr>
    </table>

</div>
