@extends('master')

@section('content')
<div class="wrapper">

    <div class="title-area loading">
        <span class="title">Failed Generate</span>
    </div>
    <div class="text-white px-3 py-3" style="">
        <form action="{{ route('generate') }}" method="POST">
            <input type="hidden" name="radio-type" value="{{ $type }}">
            <input type="hidden" name="prompt" value="{{ $prompt }}">
            <input type="hidden" name="negative-prompt" value="{{ $negPrompt }}">
            <input type="hidden" name="radio-ratio" value="{{ $scale }}">
            @csrf
            <img class="loading-img" src="img/shock.gif">
            <div class="loading-text">
                <span id="status">Oops...</span>
                <br>
                <span>We have an error, please try again</span>
            </div>
            <br>
            <div class="button-area">
                <button id="button-generate" type="submit" class="btn result">
                    <span>Regenerate</span>
                    <i class="gen-icon fa-solid fa-arrow-rotate-right"></i>
                    <i class="load-icon fas fa-cog fa-spin" style="display: none;"></i>
                </button>
            </div>
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
            console.log({{ $err }})
        })
    </script>
@endsection
