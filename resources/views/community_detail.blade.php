@extends('master')

@section('content')
    <div class="wrapper-galeri">
        <a href="{{ route('community') }}" class="back-button">
            <i class="fa-solid fa-left"></i>
        </a>
        <div class="title-area-galeri ">
            <span class="title-galeri px-4">Image Detail</span>
        </div>
        <hr>
        <div class="text-white px-3 py-3" style="">
            <div class="row">
                <div class="col-12 col-md-7 text-center">
                    <img src="{{ $image->url }}" class="img-fluid" style="border-radius: 4px;">
                </div>

                <div class="col-12 col-md-5 mt-3 mt-md-0">
                    <div class="d-flex justify-content-between mb-4">
                        <div>

                            <div class="d-inline-block d-flex align-items-center">
                                <b>By {!! $image->owner !!}</b>
                            </div>
                        </div>
                    </div>

                    <div class="prompt-area">
                        <b>Prompt:</b>
                        <p>
                            {!! $image->prompt !!}
                        </p>
                    </div>
                    <div class="prompt-area">
                        <b>Negative Prompt:</b>
                        <p>
                            {!! $image->negative_prompt !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
