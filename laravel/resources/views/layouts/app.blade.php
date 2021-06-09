<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>iTec Assist @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet"/>
    </head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
            @yield('content')
        </main>
    </div>

</div>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="/js/scripts.js"></script>
</body>
</html>
