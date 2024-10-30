<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>YOUTH ORGANIZATION REGISTRATION PROGRAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand ms-auto px-5" href="#">
                <img src="{{ asset('images/logo/logo-ym.jpg') }}" alt="Logo" width="80" height="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end pe-5" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('faq') }}">FAQs</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center pt-5 pb-5">
        <h1>FAQs</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>What is LYORP?</h5>
                        <p>Localized Youth Organization Registration Program or LYORP is a program of City Social
                            Services Department thru Youth Development Section that facilitates the registration of
                            youth organizations and youth-serving organization to ensure access and participation to
                            Youth Development Programs by the City of Calamba.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>What are the requirements to register?</h5>
                        <p>
                            There are five (5) documentary requirements to prepare:
                        <ul>
                            <li>Registration Form</li>
                            <li>Directory of Officers/Adviser</li>
                            <li>List of Members in Good Standing</li>
                            <li>Constitution and By Laws</li>
                            <li>Endorsement Letter</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>How to register to LYORP?</h5>
                        <p>
                            You may register your organization thru this link:
                            <a href="{{ route('register') }}">Register</a><br>
                            Or you may visit LG10 City Social Services Department, Bacnotan Rd, Brgy. Real, Calamba City
                            and look for Mr. Kenneth John H. Capunitan and Mrs. Eden C. Robas.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>What are the benefits of being a LYORP Member?</h5>
                        <p>
                        <ul>
                            <li>To avail free training exclusively for LYORP;</li>
                            <li>To use the LYORP logo/seal in letters, publication materials, collaterals and others;
                            </li>
                            <li>To be prioritized in the selection of representatives for youth consultations, Youth
                                Development Section events, provincial and national programs etc.;</li>
                            <li>To request for endorsement from YDS thru LYORP advisory;</li>
                            <li>Help in marketing/advertising youth-led projects thru the City Youth Development Offices
                                social media platform;</li>
                            <li>Technical and logistical assistance to youth-led projects;</li>
                            <li>and more.</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            YOUTH ORGANIZATION REGISTRATION PROGRAM
                        </h6>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque inventore temporibus
                            corrupti
                            quisquam error assumenda, perferendis ipsam maxime esse ipsa, fugit quibusdam sed aperiam
                            accusamus enim. Voluptatibus repudiandae aspernatur molestiae?
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
                            <a href="#!" class="text-reset">Facebook</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Instagram</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Twitter</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Threads</a>
                        </p>
                    </div>
                    <!-- Grid column -->


                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            lyorpcalamba.secretariat@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
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
