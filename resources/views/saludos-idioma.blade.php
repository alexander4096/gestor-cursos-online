<!doctype html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
<h1>Texto idioma</h1>
<div class="container text-center">
        <h1>@lang("Hi there!")</h1>
        <div class="col-md-offset-2">
            <p>{{ __("I hope this meets you well.")}}</p>
            <p>{{ __("Let's talk about Localization in Laravel, trust me, it's an awesome topic. Notwithstanding, not many have come to realize this awesomeness.")}}</p>
            <p>{{ __("Localization according to the dictionary, means adapting something to a fixed position or location. It therefore suffices to say that Laravel localization involves adapting the language used in the app to the given location of the user.")}}</p>
        </div>
        <p>{{ __("This might not make much sense to you but you've got no reason to worry. Nothing said here should be argued about because the idea is just to make up words for the purpose of testing this tutorial.")}}</p>

</div>

</body>
</html>
