@extends('adminlte::page')

@section('title', 'Data TPS')

@section('content_header')
    <h1 class="m-0 text-dark">Data Tempat Pengolahan Sampah</h1>

    <!-- Include SweetAlert CSS and JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('tempatsampahs.create') }}" class="btn btn-primary">Tambah Lokasi</a>
    </div>

    <div class="row">
        @forelse($tempatsampahs->sortByDesc('created_at') as $key => $loctempatsampah)
            <div class="col-md-6">
                <div class="card mb-3 p-2">
                    <div class="card-body">
                        <div class="rounded overflow-hidden shadow mb-3" style="height: 300px;" id="map{{ $key }}"></div>
                        <div class="d-flex justify-content-center">
                            <h1 class="display-6 text-center mt-3"><strong>{{ $loctempatsampah->namalokasi }}</strong></h1>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="card-text text-center">Alamat: {{ $loctempatsampah->alamatlokasi }}</p>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <p class="card-text text-center">Jenis: {{ $loctempatsampah->jenislokasi }}</p>
                        </div>

                        <div class="row px-5">
                            <div class="col">
                                <a href="{{ route('tempatsampahs.show', $loctempatsampah->id) }}"
                                    class="btn btn-sm btn-primary btn-block">Lihat</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('tempatsampahs.edit', $loctempatsampah->id) }}"
                                    class="btn btn-sm btn-warning btn-block">Edit</a>
                            </div>
                            <div class="col">
                                <form action="{{ route('tempatsampahs.destroy', $loctempatsampah->id) }}"
                                    id="delete-form-{{ $loctempatsampah->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-block"
                                        onclick="confirmDelete({{ $loctempatsampah->id }})">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                var redIcon = new L.Icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });
                var map{{ $key }} = L.map('map{{ $key }}');

                // Check if there are tempatsampahs data
                @if($tempatsampahs->isNotEmpty())
                    map{{ $key }}.setView([{{ $loctempatsampah->latitude }}, {{ $loctempatsampah->longitude }}], 12);
                @else
                    // If no data, set the default coordinates
                    map{{ $key }}.setView([defaultCoordinates.latitude, defaultCoordinates.longitude], 12);
                @endif

                L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                }).addTo(map{{ $key }});

                var marker{{ $key }} = L.marker([{{ $loctempatsampah->latitude }}, {{ $loctempatsampah->longitude }}], { icon: redIcon }).addTo(map{{ $key }});
                var popupContent{{ $key }} = `
                <div>
                    <h4><i class="fas fa-trash-alt"></i> {{ $loctempatsampah->namalokasi }}</h4>
                    <p><i class="fas fa-info-circle"></i> <strong>Jenis:</strong> {{ $loctempatsampah->jenislokasi }}</p>
                    <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> {{ $loctempatsampah->alamatlokasi }}</p>
                    <p><i class="fas fa-dumpster"></i> <strong>Kapasitas:</strong> {{ $loctempatsampah->kapasitaslokasi }} Ton/Hari</p>
                    <p><i class="fas fa-expand"></i> <strong>Luas:</strong> {{ $loctempatsampah->luaslokasi }} M<sup>2</sup></p>
                </div>
            `;

            marker{{ $key }}.bindPopup(popupContent{{ $key }});
            </script>
        @empty
            <div class="col-md-12">
                <div class="alert alert-info">
                    Tidak ada data tempat sampah.
                </div>
            </div>
        @endforelse
    </div>
@stop

@push('js')
    <script>
        // DELETE CONFIRMATION
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form-' + id).submit();
                }
            });
        }
    </script>
@endpush
