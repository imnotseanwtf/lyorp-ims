<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Localized Youth Organization Registration Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<style>
    body {
        background-image: url('{{ asset('images/logo/background.png') }}');
        /* Replace with your image path */
        background-size: cover;
        /* Makes the image cover the entire background */
        background-position: center;
        /* Centers the image */
        background-repeat: no-repeat;
        /* Prevents the image from repeating */
    }

    .carousel-image {
        opacity: 0.8;
        /* Adjust this value (0 to 1) for desired opacity */
        transition: opacity 0.5s ease-in-out;
        /* Optional: Adds a transition effect */
    }

    .carousel-item.active .carousel-image {
        opacity: 1;
        /* Ensures the active image is fully opaque */
    }

    .carousel-item {
        position: relative;
        /* Required for the overlay to position correctly */
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        /* Adjust for desired darkness */
        z-index: 1;
        /* Ensure overlay is above the image */
    }

    .shadow-box {
        background: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        /* Shadow effect */
        display: inline-block;
    }

    .shadow-box h2 {
        font-size: 50px;
        color: skyblue;
    }

    .shadow-box p {
        color: skyblue;
    }
</style>

<body style="background-color: #FBFBFB">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: rgba(0, 0, 0, 0.05);">
        <div class="container-fluid">
            <a class="navbar-brand ms-auto px-5" href="/">
                <img src="{{ asset('images/logo/logo-ym.gif') }}" alt="Logo" width="100" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end pe-5" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('faq') }}">FAQs</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="height: 600px;">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
                aria-label="Slide 6"></button>
        </div>

        <!-- Carousel Inner -->
        <div class="carousel-inner" style="height: 100%;">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="height: 100%;">
                <img src="{{ asset('images/welcome/1.jpg') }}" class="d-block w-100 h-100" alt="Slide 1"
                    style="object-fit: cover;">
                <div class="carousel-caption d-none d-md-block text-center shadow-box">
                    <h2>CSSD - LYORP</h2>
                    <p>Calamba City Youth Development Office</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join Us</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="height: 100%;">
                <img src="{{ asset('images/fron/2.png') }}" class="d-block w-100 h-100" alt="Slide 2" style="object-fit: cover;">
                <div class="carousel-caption d-none d-md-block text-center shadow-box">
                    <h2>CSSD - LYORP</h2>
                    <p>Calamba City Youth Development Office</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join Us</a>
                </div>
            </div>

            <!-- Additional Slides (3-6) -->
            <div class="carousel-item" style="height: 100%;">
                <img src="{{ asset('images/fron/3.png') }}" class="d-block w-100" alt="Slide 3"
                    style="object-fit:contain; height: 600px">
                <div class="carousel-caption d-none d-md-block text-center shadow-box">
                    <h2>CSSD - LYORP</h2>
                    <p>Calamba City Youth Development Office</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join Us</a>
                </div>
            </div>

            <div class="carousel-item" style="height: 100%;">
                <img src="{{ asset('images/fron/4.png') }}" class="d-block w-100" alt="Slide 4"
                    style="object-fit:contain; height: 600px">
                <div class="carousel-caption d-none d-md-block text-center shadow-box">
                    <h2>CSSD - LYORP</h2>
                    <p>Calamba City Youth Development Office</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join Us</a>
                </div>
            </div>

            <div class="carousel-item" style="height: 100%;">
                <img src="{{ asset('images/fron/5.png') }}" class="d-block w-100" alt="Slide 5"
                    style="object-fit:contain; height: 600px">
                <div class="carousel-caption d-none d-md-block text-center shadow-box">
                    <h2>CSSD - LYORP</h2>
                    <p>Calamba City Youth Development Office</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join Us</a>
                </div>
            </div>

            <div class="carousel-item" style="height: 100%;">
                <img src="{{ asset('images/fron/6.png') }}" class="d-block w-100" alt="Slide 6"
                    style="object-fit:contain; height: 600px">
                <div class="carousel-caption d-none d-md-block text-center shadow-box">
                    <h2>CSSD - LYORP</h2>
                    <p>Calamba City Youth Development Office</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join Us</a>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mb-5 mt-5">
        <h2>City Social Services Department</h2>
        <div class="row">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>MANDATE</h5>
                        <p>The City Social Services Department is committed to care, protect and rehabilitate the
                            segment of the city population (Individual, Family and Community) which has the least in
                            life in terms of physical, mental and social well being and needs social welfare assistance
                            and Social Work Interventions to restore their normal functioning and participation in
                            national development.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>MISSION</h5>
                        <p>Provide effective and efficient social welfare intervention and opportunities that will
                            uplift the living conditions of the distressed and disadvantaged individuals, families,
                            groups and communities to enable them to become productive members of society.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>VISION</h5>
                        <p>The City Social Services Department envisions a developed City promoting self-reliant,
                            protected, and empowered individual, groups, families and communities liberated from poverty
                            and deprivation through its existing comprehensive social welfare and globally competitive
                            technical - vocational programs and services.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <h2>Article II. VISION, MISSION, CORE VALUES</h2>
        <div class="d-flex ">
            <div class="container-fluid" style="margin-top: 100px;">
                <h2>Section 2.1. Vision Statement</h2>
                <p style="font-size: 20px">The CCYDC envision a participative, globally competitive, and empowered <br>
                    youth of Calamba City with
                    realized needs and aspirations living in an inclusive and <br> sustainable community.</p>
            </div>
            <img src="{{ asset('images/fron/vision.png') }}" alt="" srcset=""
                style="width: 800px; height:300px;">
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="d-flex ">
            <img src="{{ asset('images/fron/mission.png') }}" alt="" srcset=""
                style="width: 800px; height:300px;">
            <div class="container-fluid mx-3" style="margin-top: 50px;">
                <h2>Section 2.2. Mission Statement</h2>
                <p style="font-size: 20px">The CCYDC as the core of advocacy on the participation of the young
                    Calambeños in nation-building and youth empowerment-commit to ensure that all youth subsectors are
                    represented and that the Local Youth Development Plan be effectively and efficiently delivered to
                    the youth of Calamba City through critical engagement and monitoring of all PPAs indicated.</p>
            </div>
        </div>
    </div>

    <hr>

    <hr>
    <footer>
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Localized Youth Organization Registration Program
                        </h6>
                        <p>

                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Socials
                        </h6>
                        <p>
                            <i class="fab fa-facebook"></i>
                            <a href="{{ $welcome->facebook }}" class="text-reset">Facebook</a>
                        </p>
                    </div>
                    <!-- Grid column -->


                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i>{{ $welcome->address }}</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            {{ $welcome->email }}
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            {{ $welcome->email_two }}
                        </p>
                        <p><i class="fas fa-phone me-3"></i> <b>{{ $welcome->number }}</b></p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="#">LYORP</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>
