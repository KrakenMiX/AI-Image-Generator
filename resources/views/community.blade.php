@extends('master')

@section('content')
    <div class="wrapper-galeri">
        <div class="title-area-galeri ">
            <span class="title-galeri">Image Community</span>
        </div>
        <hr>
        <div class="text-white px-3 py-3">
            @if (count($images) == 0)
                <div class="text-center">
                    <img src="https://media.tenor.com/CccoYiSRvVEAAAAi/sad-cute.gif" alt="">
                    <h3 class="subtitle">Community Image still Empty</h3>
                </div>
            @else
            <div class="row">
                <div class="column">
                    @foreach ($images as $image)
                        @if ($image->pos == 1)
                            <a href="{{ route('communitydetail', ['id' => $image->id_image]) }}"
                                rel="noopener noreferrer" class="image-link">
                                <img src="{{ $image->url }}" class="hover-zoom">
                                <div class="image-detail community">
                                    <span class="prompt community">{!! $image->prompt !!}</span>
                                    <span class="prompt community">By {!! $image->owner !!}</span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="column">
                    @foreach ($images as $image)
                        @if ($image->pos == 2)
                            <a href="{{ route('communitydetail', ['id' => $image->id_image]) }}"
                                rel="noopener noreferrer" class="image-link">
                                <img src="{{ $image->url }}" class="hover-zoom">
                                <div class="image-detail">
                                    <span class="prompt">{!! $image->prompt !!}</span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="column">
                    @foreach ($images as $image)
                        @if ($image->pos == 3)
                            <a href="{{ route('communitydetail', ['id' => $image->id_image]) }}"
                                rel="noopener noreferrer" class="image-link">
                                <img src="{{ $image->url }}" class="hover-zoom">
                                <div class="image-detail">
                                    <span class="prompt">{!! $image->prompt !!}</span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="column">
                    @foreach ($images as $image)
                        @if ($image->pos == 0)
                            <a href="{{ route('communitydetail', ['id' => $image->id_image]) }}"
                                rel="noopener noreferrer" class="image-link">
                                <img src="{{ $image->url }}" class="hover-zoom">
                                <div class="image-detail">
                                    <span class="prompt">{!! $image->prompt !!}</span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
