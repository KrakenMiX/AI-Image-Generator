@extends('master')

@section('content')
    <div class="container"><br>
        <div>
            <h2 class="text-center"><b>AI-Prompt Generator</b><br>Login Site</h3>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
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
            <div class="form-group">
                <input type="checkbox" class="custom-control-input" id="customCheck">
                <label class="custom-control-label" for="customCheck">Remember Me</label>
            </div><br>
            <div>
                <button id="button-generate" type="submit" class="btn">
                    <span>Login</span>
                    <i class="gen-icon fa-regular fa-shuttle-space"></i>
                    <i class="load-icon fas fa-cog fa-spin" style="display: none;"></i>
                </button>
            </div>
            <span class="subtitle" style="text-align: center">Belum punya akun? <a href="{{route('register')}}">Register</a> sekarang!</span>
            </form>
        </div>
    </div>
@endsection