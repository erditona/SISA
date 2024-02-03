@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="rounded overflow-hidden shadow mb-3" style="height: 400px;" id="map"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
<script>
    // MAP LEAFLET
    var redIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var defaultCoordinates = { latitude: -6.902184275485767, longitude: 107.61872329812867 };

    var map = L.map('map').setView([defaultCoordinates.latitude, defaultCoordinates.longitude], 12);

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    }).addTo(map);

    var activeMarker = null; // To keep track of the last clicked marker
    var activeCircle = null; // To keep track of the last displayed circle

    @forelse($tempatsampahs as $key => $loctempatsampah)
        var marker{{ $key }} = L.marker([{{ $loctempatsampah->latitude }}, {{ $loctempatsampah->longitude }}], {icon: redIcon}).addTo(map);
        var popupContent{{ $key }} = `
                <div>
                    <h4><i class="fas fa-trash-alt"></i> {{ $loctempatsampah->namalokasi }}</h4>
                    <p><i class="fas fa-info-circle"></i> <strong>Jenis:</strong> {{ $loctempatsampah->jenislokasi }}</p>
                    <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> {{ $loctempatsampah->alamatlokasi }}</p>
                    <p><i class="fas fa-dumpster"></i> <strong>Kapasitas:</strong> {{ $loctempatsampah->kapasitaslokasi }} Ton/Hari</p>
                    <p><i class="fas fa-expand"></i> <strong>Luas:</strong> {{ $loctempatsampah->luaslokasi }} M<sup>2</sup></p>
                    <a href="{{ route('tempatsampahs.show', $loctempatsampah->id) }}" class="btn btn-warning">Detail</a>
                </div>
            `;

            marker{{ $key }}.bindPopup(popupContent{{ $key }});

        // Initialize circle without adding it to the map
        var circle{{ $key }} = L.circle([{{ $loctempatsampah->latitude }}, {{ $loctempatsampah->longitude }}], {
            radius: {{ $loctempatsampah->radiuslokasi }},
            color: 'green',
            fillColor: '#65B741',
            fillOpacity: 0.3
        });

        // Bind circle to marker click event
        marker{{ $key }}.on('click', function () {
            if (activeCircle !== null) {
                // Remove the circle from the previous marker
                map.removeLayer(activeCircle);
            }
            
            // Add circle to the map
            circle{{ $key }}.addTo(map);
            marker{{ $key }}.openPopup();

            // Update the activeMarker and activeCircle variables
            activeMarker = marker{{ $key }};
            activeCircle = circle{{ $key }};
        });
    @empty
        // If no data, maybe you want to display a message or perform other actions
        console.log('No tempatsampah data available');
    @endforelse

    // Close the circle and popup when clicking on the map
    map.on('click', function () {
        if (activeMarker !== null && activeCircle !== null) {
            map.removeLayer(activeCircle);
            activeMarker.closePopup();
            activeMarker = null;
            activeCircle = null;
        }
    });
</script>

@endpush


<!-- // Select the first item from the collection (index 0)
    var tempatsampah = {!! json_encode($tempatsampahs->first()) !!};

    var marker = L.marker([tempatsampah.latitude, tempatsampah.longitude], {icon: redIcon}).addTo(map);
    marker.bindPopup("<center><b>" + tempatsampah.namalokasi + "</b><br>" + tempatsampah.jenislokasi + "</center>");

    var circle = L.circle([tempatsampah.latitude, tempatsampah.longitude], {
        radius: tempatsampah.radiuslokasi,
        color: 'green',
        fillColor: '#65B741',
        fillOpacity: 0.3
    }); -->