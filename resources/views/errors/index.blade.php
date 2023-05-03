<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />


    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="../vendor/themify-icons/themify-icons.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-override.css') }}">


</head>

<body>
    <section class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
                <div class="fs-big text-center text-danger fw-bold">@yield('code')</div>
                <div class="fs-3 text-center fw-bold mb-4">@yield('message')</div>
                <div class="fs-6 text-center mb-3">
                    @yield('description')
                </div>
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                      </div>
                </form>
                <div class="text-center">
                    <a href="/">Back to Home</a>
    
                </div>
                <div class="text-center mt-5 mb-5 text-muted">
                    Copyright &copy; {{ date('Y') }} &mdash; Barengs
                </div>
            </div>
        </div>
    </section>
<script src="{{ asset('assets/js/login.js') }}"></script>
</body>
</html>