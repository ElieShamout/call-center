<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="{{asset('css/layout.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/components/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/components/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/components/sidebar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home/homepage.css')}}">

    
    <link rel="stylesheet" type="text/css" href="{{asset('css/auth/verify.css')}}">

    @yield('style')

</head>

<body style="background-image: url({{URL::asset('images/homepage/homepage-background.jpg')}});">

    @include('components.header')


    <div class="container-fluid d-flex m-0 p-0 parentBox">

        @if(Request::is('session') || Request::is('session/*'))
        <div class="sidebar">
            @include('components.sidebar')
        </div>
        @endif



        @if(!Request::is('session/*'))
        <div class="d-block w-100">
            <div class="container d-flex py-5 mt-5 align-items-center content">
                <div class="internal-content">
                    @yield('content')
                </div>
            </div>

            <div class="pb-5">
                @yield('session_employee')
            </div>

        </div>
        @endif


        @if(Request::is('session/*'))
        @include('sessions_employee.emp_sessions')
        @endif

    </div>




    @yield('script')
</body>

</html>