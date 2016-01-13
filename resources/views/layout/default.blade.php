<!doctype html>
<html>
<head>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    {!! Rapyd::head() !!}

</head>
<body>
<div class="container">
    <header> @include('layout.header') </header>
    <div class="row">
        <div class="col-md-8">
            <div class="contents"> @yield('content') </div>
        </div>
        <div class="col-md-4">
            @yield('sidebar')
        </div>
    </div>

</div>
</body>
</html>