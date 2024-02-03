@extends('adminlte::page')

@section('title', 'Detail TPS')

@section('content_header')
    <h1 class="m-0 text-dark">Detail Tempat Pengolahan Sampah</h1>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('tempatsampahs.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    <div class="row mt-2">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="display-6 text-center"><strong>{{ $tempatsampah->namalokasi }}</strong></h1>
                    <div class="row mt-5 mb-2">
                        <div class="col-lg-6 mt-3 mb-5">
                            <p class="card-text"><strong>Alamat:</strong> {{ $tempatsampah->alamatlokasi }}</p>
                            <p class="card-text"><strong>Jenis:</strong> {{ $tempatsampah->jenislokasi }}</p>
                            <p class="card-text"><strong>Luas Lokasi:</strong> {{ $tempatsampah->luaslokasi }} M<sup>2</sup></p>
                        </div>
                        <div class="col-lg-6 mt-3 mb-5">
                            <p class="card-text"><strong>Kapasitas:</strong> {{ $tempatsampah->kapasitaslokasi }} Ton/Hari</p>
                            <p class="card-text" dataRadius="{{ $tempatsampah->radiuslokasi }}"></p>
                            <p class="card-text" dataLatitude="{{ $tempatsampah->latitude }}"><strong>Latitude:</strong> {{ $tempatsampah->latitude }}</p>
                            <p class="card-text" dataLongitude="{{ $tempatsampah->longitude }}"><strong>Longitude:</strong> {{ $tempatsampah->longitude }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow" style="height: 360px;">
                <div class="rounded overflow-hidden" id="map" style="height: 100%;"></div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        var redIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var latitude = document.querySelector('p[dataLatitude]').getAttribute('dataLatitude');
        var longitude = document.querySelector('p[dataLongitude]').getAttribute('dataLongitude');
        var radius = document.querySelector('p[dataRadius]').getAttribute('dataRadius');
        console.log(radius);

        var map = L.map('map').setView([latitude, longitude], 17);
        var marker = L.marker([latitude, longitude], { icon: redIcon }).addTo(map);
        var circle;

        L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        marker.on('click', function (e) {
            if (circle) {
                map.removeLayer(circle);
                circle = null;
            } else {
                circle = L.circle(e.latlng, {
                    color: 'green',
                    fillColor: '#65B741',
                    fillOpacity: 0.5,
                    radius: radius
                }).addTo(map);
            }
        });
    </script>
@endpush
