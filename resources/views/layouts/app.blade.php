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
        function refreshHeightOfContent() {
            let content = document.getElementById('content');

            if(content) {
                let height = document.documentElement.clientHeight + 12;
                content.style.height = height + 'px';
            }
        }

        let html = document.getElementsByTagName('body')[0];

        window.onhashchange = function() {
            refreshHeightOfContent();
        };

        html.onload = function() {
            refreshHeightOfContent();
        };

        html.onresize = function() {
            refreshHeightOfContent();
        };
    </script>
</body>
</html>
