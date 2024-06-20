<div class="bg-blue-200 mb-2 p-2">

    <div class="float-right">
        <livewire:upr.caddyfile.item-onoff :status="$filecaddy->on" :filecaddy="$filecaddy"/>
    </div>

    <b class="text-lg">{{ $filecaddy->name }}</b>

    <livewire:upr.caddyfile.item.domains :domains="$filecaddy->domains" :caddyfile_id="$filecaddy->id"/>

{{--    <div class="bg-green-400">-</div>--}}
{{--    <livewire:upr-config-caddyfile-domains :domains="$filecaddy->domains" :caddyfile_id="$filecaddy->id"/>--}}

    {{--    <livewire:upr-config-caddyfile-options :options="$filecaddy->options" :caddyfile_id="$filecaddy->id" />--}}

    <livewire:upr.caddyfile.options :options="$filecaddy->options" :caddyfile_id="$filecaddy->id"/>


    <div class="grid grid-cols-2 gap-4">
        <div class="bg-green-300 p-3">
            {{--    {{ $filecaddy }}--}}

            cf_finish:
            <br/>
            <pre>{{ $cf_finish  }}</pre>

        </div>
        <div>
            <div class="bg-green-200 p-2 text-lg">Пример конфига</div>
            <pre>

upr.php-cat.local {

	# Формируем самоподписной сертификат для работы https
	tls internal
    # tls support@php-cat.com

    php_fastcgi upr_serv:9000

    file_server
    encode gzip

    root * /upr_serv/public

}

    </pre>
        </div>
    </div>
</div>
