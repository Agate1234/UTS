<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venture</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fork-awesome/1.1.7/css/fork-awesome.min.css"> 

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset(path: 'css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset(path: 'css/header_home.css') }}"> 
    <link rel="stylesheet" href="{{ asset(path: 'css/banner_home.css') }}">
    <link rel="stylesheet" href="{{ asset(path: '.css/footer_home.css') }}">
    <link rel="stylesheet" href="{{ asset(path: 'css/kategori_home.css') }}">
    <link rel="stylesheet" href="{{ asset(path: 'css/about.css') }}">
</head>
<body>

    <div class="page-wrapper">

        @include('home.header_home')

        <div class="content-wrapper">

            @include('home.banner')

            @include('home.kategori')

            @include('home.about_home')

        </div>

        @include('home.footer_home')

    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>

</html>