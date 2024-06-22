<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title')</title> 
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" >

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100;1,900&display=swap" rel="stylesheet">
   
    <script>window.yaContextCb=window.yaContextCb||[]</script>
    <script src="https://yandex.ru/ads/system/context.js" async></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="d-flex flex-column justify-content-between min-vh-100 text-center">
        @include('includes.header')

        <main>
           @yield('content') 
        </main>

       @include('includes.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>
</html>


<style>
    body{
        margin: 0;
        padding: 0;
        font-family: Roboto, sans-serif;
    }

    section{
        position: relative;
        width: 100%;
        height: 730px;
        display: flex;
        justify-content: center;
        align-items: center;
        /* font-size: 5em; */
        /* font-weight: 400; */
    }

    .container-white {
        margin-bottom: 20px; /* Задайте нужный вам отступ в пикселях */
    }

    .back-one {
        background-image: url('image/mount.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .half-card {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 25px;
      padding: 20px;
    }

    .no-decoration {
        text-decoration: none;
        color: inherit;
        outline: none;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    th, td {
      padding: 8px;
      text-align: center;
      border: none;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        background-color: transparent;
        border: none;
        color: black;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background-color: rgba(60, 60, 60, 0.1);
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1);
    }
</style>


