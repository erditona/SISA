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
    <!-- Add the Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ViU3W5E1oP3z+G5cD56uU/Bq1FQ+1b7T5V3ruO5sI8E9ZPWE3aaO5rn" crossorigin="anonymous">
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
            <!-- Add the search form -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <form class="d-flex ms-auto my-2 my-lg-0">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput" oninput="filterCards()">
                </form>
            </div>
            <!-- Add the back button -->
            <a href="{{ route('wellcome') }}" class="btn btn-outline-primary ms-2">Kembali</a>
        </div>
    </nav>

    <!-- Content Section -->
    <section class="page-section" id="detail">
        <div class="container">
            <div class="row justify-content-center">
                @forelse($tempatsampahs as $key => $loctempatsampah)
                    <div class="col-md-4 mb-4 card-container">
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
        </div>
    </section>

    <!-- Footer Section -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script src="{{ asset('asset/js/scripts.js') }}"></script>

    <!-- SB Forms JS -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Add the search function -->
    <script>
        function filterCards() {
            var searchInput = document.getElementById('searchInput').value.toLowerCase();
            var cardContainers = document.getElementsByClassName('card-container');

            for (var i = 0; i < cardContainers.length; i++) {
                var cardTitle = cardContainers[i].getElementsByClassName('card-title')[0].innerText.toLowerCase();

                if (cardTitle.includes(searchInput) || searchInput === "") {
                    cardContainers[i].style.display = 'block';
                } else {
                    cardContainers[i].style.display = 'none';
                }
            }
        }
    </script>

</body>
</html>