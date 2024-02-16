@extends('master')

@section('content')
    <div class="wrapper">
        <a href="{{ route('aiprompt') }}" class="back-button">
            <i class="fa-solid fa-left"></i>
        </a>
        <div class="title-area">
            <span class="title">Result Image</span>
        </div>
        <div class="text-white px-3 py-3" style="">
            <form action="{{ route('generate') }}" method="POST">
                <input type="hidden" name="radio-type" value="{{ $type }}">
                <input type="hidden" name="prompt" value="{{ $prompt }}">
                <input type="hidden" name="negative-prompt" value="{{ $negPrompt }}">
                <input type="hidden" name="radio-ratio" value="{{ $scale }}">
                <input type="hidden" name="blur" value="{{ $blur }}">
                @csrf
                <img class="result-img {{ (!$isSafe && ($blur == 'on')) ? 'blur' : '' }}"
                    src="{{ $image ? $image : 'https://icon-library.com/images/avatar-icon-images/avatar-icon-images-4.jpg' }}">
                <div class="button-area">
                    <button id="button-generate" type="submit" class="btn result">
                        <span>Regenerate</span>
                        <i class="gen-icon fa-solid fa-arrow-rotate-right"></i>
                        <i class="load-icon fas fa-cog fa-spin" style="display: none;"></i>
                    </button>
                    <button id="button-download" type="button" class="btn result">
                        <span>Download</span>
                        <i class="fa-regular fa-circle-down"></i>
                    </button>
                </div>
                <br>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('form').on('submit', function(e) {
                if ($('input[name="prompt"]').val() == '') {
                    e.preventDefault();
                } else {
                    $('.gen-icon').hide();
                    $('.load-icon').show();
                    $('#button-generate span').text('Regenerating...');
                    $('#button-generate').prop('disabled', true);
                    $('#button-generate').addClass('disabled');
                }
            })

            $('#button-download').on('click', function(e) {
                e.preventDefault();
                window.location.href = "{!! route('download', ['url' => $image, 'filename' => $prompt . '.png']) !!}"
            })

        })
    </script>
@endsection
