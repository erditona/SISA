@extends('adminlte::page')

@section('title', 'Edit TPS')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Tempat Pembuangan Sampah</h1>

    <!-- Include SweetAlert CSS and JS from CDN -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@stop

@section('content')
    <form action="{{ route('tempatsampahs.update',$tempatsampah->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table style="width:100%" class="mb-3">
                            <tr>
                                <td><label for="InputName">Nama</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputName" name="namalokasi" class="form-control" required value="{{ $tempatsampah->namalokasi }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputAlamat">Alamat</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputAlamatLokasi" name="alamatlokasi" class="form-control" required value="{{ $tempatsampah->alamatlokasi }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputJenisLokasi">Jenis</label></td>
                                <td>:</td>
                                <td>
                                    <select id="InputJenisLokasi" name="jenislokasi" class="form-control" required>
                                        <option value="">Pilih Jenis</option>
                                        <option value="TPST" {{ $tempatsampah->jenislokasi === 'TPST' ? 'selected' : '' }}>TPST</option>
                                        <option value="TPA" {{ $tempatsampah->jenislokasi === 'TPA' ? 'selected' : '' }}>TPA</option>
                                        <option value="TPS" {{ $tempatsampah->jenislokasi === 'TPS' ? 'selected' : '' }}>TPS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="InputLuasLokasi">Luas Lokasi</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputLuasLokasi" name="luaslokasi" class="form-control" required value="{{ $tempatsampah->luaslokasi }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputKapasitasLokasi">Kapasitas</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputKapasitasLokasi" name="kapasitaslokasi" class="form-control" required value="{{ $tempatsampah->kapasitaslokasi }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputKapasitasLokasi">Radius</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputRadiusLokasi" name="radiuslokasi" class="form-control" required value="{{ $tempatsampah->radiuslokasi }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputLatitude">Latitude</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputLatitude" name="latitude" class="form-control" required value="{{ $tempatsampah->latitude }}"></td>
                            </tr>
                            <tr>
                                <td><label for="InputLongitude">Longitude</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputLongitude" name="longitude" class="form-control" required value="{{ $tempatsampah->longitude }}"></td>
                            </tr>
                        </table>
                        <div class="rounded overflow-hidden shadow mb-3 mt-3" style="height: 400px;" id="map"></div>
                        <div class="card px-5 p-5">
                            <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                            <a href="{{ route('tempatsampahs.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

        var longitude = document.getElementById("InputLongitude").value;
        var latitude = document.getElementById("InputLatitude").value;
        
        var map = L.map('map').setView([latitude, longitude], 17);
        var marker = L.marker([latitude, longitude], {icon: redIcon}).addTo(map);
        
        L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);
        // Define a click event handler
        // var marker;
        function onMapClick(e) {
            // alert("Latitude: " + e.latlng.lat + "\nLongitude: " + e.latlng.lng);
            document.getElementById('InputLongitude').value = e.latlng.lng;
            document.getElementById('InputLatitude').value = e.latlng.lat;

            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker(e.latlng, {icon: redIcon}).addTo(map)
                .bindPopup("Koordinat: " + e.latlng.toString())
                .openPopup();
        }

        // Add a click event listener to the map
        map.on('click', onMapClick);
    </script>
@endpush