<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        
        <style>
            main{
                padding: 50px 0;
            }
            .fl{
                float: left;
            }
            #edit{
                margin-right: 10px;
            }
        </style>


        {{ Html::style(('css/w3.css')) }}
        {{ Html::style(('css/bootstrap.css')) }}
        @if (isset($style))
            @foreach ($style as $css)
                {{ Html::style(( $css )) }}
            @endforeach
        @endif
        
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        {{ Html::script('js/bootstrap.min.js') }}

        @if (isset($script))
            @foreach ($script as $js)
                {{ Html::script(($js)) }}
            @endforeach
        @endif
    </body>
</html>
