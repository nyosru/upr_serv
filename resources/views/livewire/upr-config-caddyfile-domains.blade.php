<div class="p-2">
    {{-- Stop trying to control. --}}
    {{--    domains: {{ $domains }}--}}
    <h2>Домены</h2>
    <div class="mb-10">
        @foreach( $domains as $d )
            <div class="bg-green-200 mb-1">
                d: {{ $d->domain }}
            </div>
        @endforeach
    </div>
{{--{{ $caddyfile_id }}--}}
    <livewire:upr.caddyfile.domain-form :caddyfile_id="$caddyfile_id"/>

</div>
