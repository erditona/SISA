<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SISA!</title>
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

<!-- Add Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand me-0" href="#page-top">
                    <img src="{{ asset('asset/assets/img/navbar-logo.png') }}" alt="Logo" class="img-fluid" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#data">Data</a></li>                        
                        <li class="nav-item"><a class="nav-link" href="#lokasi">Lokasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Selamat Datang di SISA!</div>
                <div class="masthead-heading text-uppercase">Sistem Informasi Sampah Andalan</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#layanan">Lihat Selengkapnya</a>
            </div>
        </header>

        <!-- Layanan-->
        <section class="page-section" id="layanan">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Layanan</h2>
                    <h3 class="section-subheading text-muted">Informasi Tempat Pengolahan Sampah Bandung Raya</h3>
                </div>
                <div class="row text-center pt-5">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-map-marked-alt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Lokasi Tempat Sampah</h4>
                        <p class="text-muted">Temukan lokasi tempat pengolahan sampah di sekitar Bandung Raya. Informasi akurat dan terkini.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-info-circle fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Detail Informasi</h4>
                        <p class="text-muted">Dapatkan detail informasi tentang setiap tempat pengolahan sampah, termasuk kapasitas, jenis, dan luas lokasi.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-recycle fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Pengolahan Sampah</h4>
                        <p class="text-muted">Ikuti upaya pengolahan sampah yang berkelanjutan dan ramah lingkungan di wilayah Bandung Raya.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Data-->
        <section class="page-section" id="data" style="padding: 20px;">
            <div class="container">
                <div class="text-center mt-5">
                    <h2 class="section-heading text-uppercase">DATA</h2>
                    <h3 class="section-subheading text-muted">DATA TEMPAT PENGOLAHAN SAMPAH BANDUNG RAYA</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                @forelse($tempatsampahs->sortByDesc('created_at')->take(6) as $key => $loctempatsampah)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('detail', $loctempatsampah->id) }}" class="text-decoration-none">
                            <div class="card p-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mb-3">
                                        <i class="fas fa-trash-alt fa-3x"></i>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <h5 class="card-title text-center"><strong>{{ $loctempatsampah->namalokasi }}</strong></h5>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <p class="card-text text-center"><i class="fas fa-map-marker-alt"></i> Alamat: {{ $loctempatsampah->alamatlokasi }}</p>
                                    </div>
                                    <div class="d-flex justify-content-center mb-3">
                                        <p class="card-text text-center"><i class="fas fa-recycle"></i> Jenis: {{ $loctempatsampah->jenislokasi }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            Tidak ada data tempat pengolahan sampah.
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="container mt-4 text-center mb-5">
                <a href="{{ route('alldatalokasi') }}" class="btn btn-primary btn-lg">Lihat Selengkapnya</a>
            </div>
        </section>



        <!-- Lokasi-->
        <section class="page-section bg-dark" id="lokasi">
            <div class="container">
                <div class="text-center pt-0">
                    <h2 class="section-heading text-white text-uppercase">LOKASI</h2>
                    <h3 class="section-subheading text-muted">SEBARAN TEMPAT SAMPAH BANDUNG RAYA</h3>
                </div>
                <div id="map" class="mt-4" style="height: 400px; border: 2px solid #ddd; border-radius: 10px; overflow: hidden;"></div>
            <div class="mt-3">
                <button class="btn btn-primary btn-sm" onclick="getCurrentLocation()">Temukan Lokasi Kamu</button>
            </div>
            </div>
        </section>


        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-2 col-sm-4 my-3">
                        <a href="https://www.bandung.go.id/"><img class="img-fluid img-brand d-block mx-auto" src="{{ asset('asset/assets/img/logos/bandungkota.png') }}" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-2 col-sm-4 my-3">
                        <a href="https://bandungkab.go.id/"><img class="img-fluid img-brand d-block mx-auto" src="{{ asset('asset/assets/img/logos/bandungkabupaten.png') }}" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-2 col-sm-4 my-3">
                        <a href="https://bandungbaratkab.go.id/"><img class="img-fluid img-brand d-block mx-auto" src="{{ asset('asset/assets/img/logos/bandungbarat.png') }}" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-2 col-sm-4 my-3">
                        <a href="https://cimahikota.go.id/"><img class="img-fluid img-brand d-block mx-auto" src="{{ asset('asset/assets/img/logos/cimahikota.png') }}" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                    <div class="col-md-2 col-sm-4 my-3">
                        <a href="https://sumedangkab.go.id/"><img class="img-fluid img-brand d-block mx-auto" src="{{ asset('asset/assets/img/logos/sumedangkabupaten.png') }}" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kontak-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Hubungi Kami</h2>
                    <h3 class="section-subheading text-muted">Kami Siap Melayani Kebutuhan Pengelolaan Sampah Anda</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="9279200d-afd2-41a4-9ef1-7b251848739f">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Nama Kamu *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Email Kamu *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Nomor Telepon Kamu *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Isi Pesan Kamu *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Sukses Terkirim, Terimakasih!</div>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Gagal Mengirim Pesan!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Kirim Pesan</button></div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; SISA! 2024</div>
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
        <scrcipt src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></scrcipt>
        <!-- Core theme JS-->
        <script src="{{ asset('asset/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
    
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

        var map = L.map('map').setView([defaultCoordinates.latitude, defaultCoordinates.longitude], 11);

        L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        }).addTo(map);

        var activeMarker = null; // To keep track of the last clicked marker
        var activeCircle = null; // To keep track of the last displayed circle

        @forelse($tempatsampahs as $key => $loctempatsampah)
            var marker{{ $key }} = L.marker([{{ $loctempatsampah->latitude }}, {{ $loctempatsampah->longitude }}], {icon: redIcon}).addTo(map);
            
            // Customize popup content
            var popupContent{{ $key }} = `
                <div>
                    <h4><i class="fas fa-trash-alt"></i> {{ $loctempatsampah->namalokasi }}</h4>
                    <p><i class="fas fa-info-circle"></i> <strong>Jenis:</strong> {{ $loctempatsampah->jenislokasi }}</p>
                    <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> {{ $loctempatsampah->alamatlokasi }}</p>
                    <p><i class="fas fa-dumpster"></i> <strong>Kapasitas:</strong> {{ $loctempatsampah->kapasitaslokasi }} Ton/Hari</p>
                    <p><i class="fas fa-expand"></i> <strong>Luas:</strong> {{ $loctempatsampah->luaslokasi }} M<sup>2</sup></p>
                    <a href="{{ route('detail', $loctempatsampah->id) }}" class="btn btn-primary">Detail</a>
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

    
        
    // GET CURRENT LOCATION
    function getCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(updateMapWithCurrentLocation, handleLocationError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function updateMapWithCurrentLocation(position) {
        // Get the current latitude and longitude
        var currentLatitude = position.coords.latitude;
        var currentLongitude = position.coords.longitude;

        // Set the map view to the current location
        map.setView([currentLatitude, currentLongitude], 15);

        // Add a marker for the current location
        var currentLocationMarker = L.marker([currentLatitude, currentLongitude]).addTo(map);

        // Customize popup content
        var popupContent = `
            <div style="text-align: center;">
                <h4 style="color: #28a745;"><i class="fas fa-map-marker-alt"></i> LokasiKamu</h4>
                <p style="font-weight: bold; margin: 0;">Latitude: ${currentLatitude}</p>
                <p style="font-weight: bold; margin: 0;">Longitude: ${currentLongitude}</p>
            </div>
        `;

        currentLocationMarker.bindPopup(popupContent).openPopup();
    }

    function handleLocationError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }


    </script>
</html>