@extends('master')

@section('content')
    <div class="container"><br>
        <div>
            <h2 class="text-center">FORM REGISTER USER</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actionregister')}}" method="post">
            @csrf
            <span class="subtitle">Username</span>
            <div class="input-box">
                <input type="text" name="username" class="form-control" placeholder="Input your username..." required>
                <i class='bx bx-code-alt'></i>
            </div>
            <span class="subtitle">Email</span>
            <div class="input-box">
                <input type="text" name="email" class="form-control" placeholder="Input your email..." required>
                <i class='bx bx-code-alt'></i>
            </div>
            <span class="subtitle">Password</span>
            <div class="input-box">
                <input type="password" name="password" class="form-control" placeholder="Input your password..." required>
                <i class='bx bx-lock-alt'></i>
            </div><br>
            <div>
                <button id="button-generate" type="submit" class="btn">
                    <span>Register</span>
                    <i class="gen-icon fa-regular fa-shuttle-space"></i>
                    <i class="load-icon fas fa-cog fa-spin" style="display: none;"></i>
                </button>
            </div>
            <span class="subtitle" style="text-align: center">Sudah punya akun? <a href="{{route('login')}}">Login</a> sekarang!</span>
            </form>
        </div>
    </div>
</body>
@endsection