@extends('adminlte::page')

@section('title', 'Tambah TPS')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Tempat Pembuangan Sampah</h1>    

    <!-- Include SweetAlert CSS and JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

@stop

@section('content')
    <form action="{{route('tempatsampahs.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow:auto">
                        <table style="width:100%">
                            <tr>
                                <td><label for="InputName">Nama</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputName" name="namalokasi" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><label for="InputAlamat">Alamat</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputAlamatLokasi" name="alamatlokasi" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><label for="InputJenisLokasi">Jenis</label></td>
                                <td>:</td>
                                <td>
                                    <select id="InputJenisLokasi" name="jenislokasi" class="form-control" required>
                                        <option value="">Pilih Jenis</option>
                                        <option value="TPST">TPST</option>
                                        <option value="TPA">TPA</option>
                                        <option value="TPS">TPS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="InputLuasLokasi">Luas Lokasi</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputLuasLokasi" name="luaslokasi" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><label for="InputKapasitasLokasi">Kapasitas</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputKapasitasLokasi" name="kapasitaslokasi" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><label for="InputRadiustasLokasi">Radius</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputRadiustasLokasi" name="radiuslokasi" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><label for="InputLongitude">Longitude</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputLongitude" name="longitude" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td><label for="InputLatitude">Latitude</label></td>
                                <td>:</td>
                                <td><input type="text" id="InputLatitude" name="latitude" class="form-control" required></td>
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
    </form>
@stop

@push('js')
<script>

    //Map Leaflet
    var redIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var map = L.map('map').setView([-6.902184275485767, 107.61872329812867], 17);
    var marker;

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    // Define a click event handler
    function onMapClick(e) {
        document.getElementById('InputLatitude').value = e.latlng.lat;
        document.getElementById('InputLongitude').value = e.latlng.lng;

        // Remove the previous marker if it exists
        if (marker) {
            map.removeLayer(marker);
        }

        // Add a new marker at the clicked location with a red icon
        marker = L.marker(e.latlng, { icon: redIcon }).addTo(map)
            .bindPopup("Koordinat: " + e.latlng.toString())
            .openPopup();

        // Add a click event listener to the marker for removal
        marker.on('click', function () {
            map.removeLayer(marker);
            document.getElementById('InputLatitude').value = "";
            document.getElementById('InputLongitude').value = "";
        });
    }

    // Add a click event listener to the map
    map.on('click', onMapClick);

//poliyline-statis//
// var latlngs = [
//     [-6.8931149, 107.6090784],
//     [-6.8931232, 107.6090233],
//     [-6.8931232, 107.6090788]
// ];

// var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);


//poliyline-dinamis//
// var linearray = [];
// var polyline;

// map.on('click', function onMapClick(e) {
//     latitude = e.latlng.lat;
//     longitude = e.latlng.lng;
//     document.getElementById('InputLatitude').value = latitude;
//     document.getElementById('InputLongitude').value = longitude;
//     linearray.push([latitude, longitude]);

//     var marker = L.marker([latitude, longitude]).addTo(map);
//     polyline = L.polyline(linearray, {color: 'red'}).addTo(map);

//     marker.on('click', function() { // tambahkan event listener ke marker
//         map.removeLayer(this); // hapus marker saat diklik
//         map.removeLayer(polyline); // hapus garis saat marker diklik
//         linearray.pop(); // hapus koordinat terakhir dari array

//         // buat garis baru dari koordinat yang masih ada
//         polyline = L.polyline(linearray, {color: 'red'}).addTo(map);
//     });
// });

//poliyline-dinamis2//
// var linearray = [];
// var polyline;

// map.on('click', function onMapClick(e) {
//     latitude = e.latlng.lat;
//     longitude = e.latlng.lng;
//     document.getElementById('InputLatitude').value = latitude;
//     document.getElementById('InputLongitude').value = longitude;
//     linearray.push([latitude, longitude]);

//     var marker = L.marker([latitude, longitude]).addTo(map);
//     polyline = L.polyline(linearray, {color: 'red'}).addTo(map);

//     marker.on('click', function() { // tambahkan event listener ke marker
//         map.removeLayer(this); // hapus marker saat diklik
//         map.removeLayer(polyline); // hapus garis saat marker diklik
//         linearray.pop(); // hapus koordinat terakhir dari array

//         // buat garis baru dari koordinat yang masih ada
//         polyline = L.polyline(linearray, {color: 'red'}).addTo(map);
//     });
// });

// poligon-dinamis//
// var marker;
//         var linearray = [];
//         var polyline;

//         map.on('click', function onMapClick(e) {
//             lat = e.latlng.lat;
//             lng = e.latlng.lng;
//             document.getElementById('InputLatitude').value = lat;
//             document.getElementById('InputLongitude').value = lng;

//             if (polyline) {
//                 map.removeLayer(polyline);
//             }

//             linearray.push(e.latlng);

//             marker = L.marker(e.latlng).addTo(map)
//                 .bindPopup("Koordinat " + e.latlng.toString())
//                 .openPopup();
//             polyline = L.polygon(linearray, {color: 'red'}).addTo(map);
// });

// circle//
// var marker;
// var circle;

// map.on('click', function onMapClick(e) {
//     lat = e.latlng.lat;
//     lng = e.latlng.lng;
//     document.getElementById('InputLatitude').value = lat;
//     document.getElementById('InputLongitude').value = lng;

//     if (circle) {
//         map.removeLayer(circle);
//         map.removeLayer(marker);
//     }

//     marker = L.marker(e.latlng).addTo(map)
//         .bindPopup("Koordinat " + e.latlng.toString())
//         .openPopup();
//     circle = L.circle(e.latlng, {
//         color: 'red',
//         fillColor: '#f03',
//         fillOpacity: 0.5,
//         radius: 500
//     }).addTo(map);
// });





        
    // L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
    //         maxZoom: 19,
    //         subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    //     }).addTo(map);

    //leaflet
    //     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     maxZoom: 19,
    //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    // }).addTo(map);

</script>
@endpush