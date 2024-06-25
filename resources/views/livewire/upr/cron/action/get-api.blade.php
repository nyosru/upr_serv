<div>
    <h3>get-api</h3>
    <table>
        <tr>
            <td>
                <button
                    class="bg-yellow-100 hover:bg-yellow-200 p-1 text-gray-400 hover:text-black mr-2"
                    wire:click="apiGetNow">apiGetNow
                </button>
                <br/>
                <div wire:loading wire:target="apiGetNow">
                   <img src="/img/loading.svg"/>
                </div>

            </td>
            <td>result:
                <br/>
                <pre>{{ print_r($result) }}</pre>
            </td>
        </tr>
    </table>

</div>
