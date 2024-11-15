<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Localized Youth Organization Registration Program</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/sass/app.scss')
</head>

<style>
    .bg {
        background-image: url('{{ asset('images/logo/background.png') }}');
        /* Replace with your image path */
        background-size: cover;
        /* Makes the image cover the entire background */
        background-position: center;
        /* Centers the image */
        background-repeat: no-repeat;
        /* Prevents the image from repeating */
    }
</style>

<body>
    @include('sweetalert::alert')
    <div class="row g-0 auth-row bg">
        @yield('content')
    </div>
</body>

</html>
