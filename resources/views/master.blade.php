<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Generator</title>

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <div class="navbar">
        <div class="logo">GenAI Art</div>
        <div class="nav-buttons">
          <a href="#" class="nav-button">Home</a>
          <a href="{{ route('aiprompt') }}" class="nav-button">Generate AI</a>
          <a href="#" class="nav-button">Gallery</a>
          <a href="#" class="nav-button">Community</a>
        </div>
        <button class="profile-button">User Logo</button>
      </div>
      <div class="bg">
          <div class="wrapper">
              @yield('content')
          </div>
      </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="{{ url('js/fontawesome.js') }}"></script>
@yield('script')

</html>

