<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fabelio Price Monitor</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,400i,700&display=swap">
    <style>
        body,
        * {
            font-family: 'Lato', arial, sans-serif
        }

        .product-info__attributes__title {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        div.label {
            font-weight: bold;
            font-size: 1rem
        }

        a[target="_blank"]:after {
            content: '(external link)';
            display: inline-block;
            width: .7em;
            height: .7em;
            text-indent: .7em;
            white-space: nowrap;
            overflow: hidden;
            background-image: url(https://upload.wikimedia.org/wikipedia/commons/4/44/Icon_External_Link.svg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
            margin-left: .1em;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" defer></script>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    @yield('script')
</body>
</html>
