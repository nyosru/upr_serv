<div>

    <livewire:upr.caddyfile.index-save-form />
    <br/>
    <br/>
    <br/>
    <livewire:upr.caddyfile.index-add-item-form />

    @foreach($caddyfiles as $l)
        <livewire:upr.caddyfile.item :filecaddy="$l"/>
    @endforeach



</div>
