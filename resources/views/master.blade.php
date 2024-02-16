<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GenAI Art</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/png">
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
</head>

<body>
    @if (!request()->is('login') && !request()->is('register'))
    <div class="navbar">
        <div class="logo">GenAI Art</div>
        <div class="nav-buttons">
            <a href="{{ route('aiprompt') }}" class="nav-button">Generate AI</a>
            <a href="{{ route('gallery') }}" class="nav-button">Gallery</a>
            <a href="{{ route('community') }}" class="nav-button">Community</a>
        </div>
        <li class="profile-button dropdown">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user() ? Auth::user()->username : 'Guest' }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('actionlogout') }}">
                        <i class="fas fa-sign-out-alt fa-fw"></i> 
                        <span class="text-center px-4">Log Out</span>
                    </a>
                </li>
            </ul>
        </li>
    </div>
    @endif
    <div class="bg">
        @yield('content')
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="{{ url('js/fontawesome.js') }}"></script>
<script src="{{ url('js/script.js') }}"></script>
@yield('script')

</html>
