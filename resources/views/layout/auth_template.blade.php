<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="flex flex-col">
    @include("layout.akademis_header", ["hideMenu" => true])
    @yield('content')
</body>
@if ($errors->any())
<script>
    // Create an array to store error messages
    var errorMessages = [];
    @foreach ($errors->all() as $error)
        errorMessages.push("{{ $error }}");
    @endforeach

    // Join the error messages into a single string
    var errorMessage = errorMessages.join("<br>");

    // Display the error message using SweetAlert
    Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        html: errorMessage
    });
</script>
@endif
</html>