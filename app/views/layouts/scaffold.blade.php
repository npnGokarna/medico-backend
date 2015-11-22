<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <style>
        body { padding-top: 20px; }
    </style>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (Session::has('message'))
                <div class="alert alert-info">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif


            
            @if (!Auth::guest())
                    @include('header')
            
            @endif
            
            @yield('main')

        </div>
    </div>
</div>

</body>
</html>