@extends('master')

@section('content')
<div class="wrapper-galeri">
    <div class="title-area loading">
        <span class="title">My Galery</span>
    </div>
    <div class="text-white px-3 py-3" style="">
        <div class="image-grid">
            <img class="image-grid-col-2 image-grid-row-2" src="https://source.unsplash.com/random/300x300?v=1" alt="architecture">
            <img src="https://source.unsplash.com/random/300x300?v=2" alt="architecture">
            <img src="https://source.unsplash.com/random/300x300?v=3" alt="architecture">
            <img src="https://source.unsplash.com/random/300x300?v=4" alt="architecture">
            <img src="https://source.unsplash.com/random/300x300?v=5" alt="architecture">
        </div>

            <div class="loading-text">
                <span>This process will take some time for generating the image.</span>
            </div>
            <br>
        </form>
    </div>
</div>
@endsection
