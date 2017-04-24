<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">

    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="js/app.js"></script>
    <script>
        function refreshHeight(id) {
            let el = document.getElementById(id);

            if(el) {
                let height = document.documentElement.clientHeight + 12;
                el.style.height = height + 'px';
            }
        }

        let html = document.getElementsByTagName('body')[0];

        window.onhashchange = function() {
            refreshHeight('content');
            refreshHeight('side-menu');
        };

        html.onload = function() {
            refreshHeight('content');
            refreshHeight('side-menu');
        };

        html.onresize = function() {
            refreshHeight('content');
            refreshHeight('side-menu');
        };
    </script>
</body>
</html>
