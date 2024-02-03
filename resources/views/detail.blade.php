<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agency - Start Bootstrap Theme</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/assets/img/navbar-logo.png') }}" />

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('asset/css/styles.css') }}" rel="stylesheet" />

    <!-- Add Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('asset/assets/img/navbar-logo.png') }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
        </div>
    </nav>

    <!-- Content Section -->
    <section class="page-section" id="detail">
        <div class="container">
            <div class="mb-3">
                <a href="{{ route('wellcome') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h1 class="display-6 text-center"><strong>{{ $tempatsampah->namalokasi }}</strong></h1>
                            <div class="row mt-5 mb-5">
                                <div class="col-lg-6 mt-3 ">
                                    <p class="card-text"><strong>Alamat:</strong> {{ $tempatsampah->alamatlokasi }}</p>
                                    <p class="card-text"><strong>Jenis:</strong> {{ $tempatsampah->jenislokasi }}</p>
                                    <p class="card-text"><strong>Luas Lokasi:</strong> {{ $tempatsampah->luaslokasi }} M<sup>2</sup></p>
                                </div>
                                <div class="col-lg-6 mt-3 mb-5">
                                    <p class="card-text"><strong>Kapasitas:</strong> {{ $tempatsampah->kapasitaslokasi }} Ton/Hari</p>
                                    <p class="card-text"><strong>Latitude:</strong> {{ $tempatsampah->latitude }}</p>
                                    <p class="card-text"><strong>Longitude:</strong> {{ $tempatsampah->longitude }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-lg-6">
                    <div class="card shadow" style="height: 360px;">
                        <div class="rounded overflow-hidden" id="map" style="height: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; SISA! 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script src="{{ asset('asset/js/scripts.js') }}"></script>

    <!-- SB Forms JS -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Custom Leaflet Script -->
    <script>
        var redIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var latitude = {{ $tempatsampah->latitude }};
        var longitude = {{ $tempatsampah->longitude }};
        var radius = {{ $tempatsampah->radiuslokasi }};
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


</body>
</html>
