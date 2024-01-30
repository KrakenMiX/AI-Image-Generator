@extends('master')

@section('content')
    <form action="{{ route('generate') }}" method="POST">
        @csrf
        <div class="title-area">
            <span class="title">Image AI Generator</span>
        </div>
        <div class="radio-type">
            <input type="radio" name="radio-type" id="anime" value="anime" checked="checked">
            <label for="anime" class="image-type anime">Anime
                Style</label>
            <input type="radio" name="radio-type" id="pastel" value="pastel">
            <label for="pastel" class="image-type pastel">Pastel
                Mix</label>
            <input type="radio" name="radio-type" id="realistic" value="realistic">
            <label for="realistic" class="image-type realistic">Realistic
                Art</label>
        </div>
        <br>
        <span class="subtitle">Prompt</span>
        <div class="input-box">
            <input type="text" name="prompt" placeholder="Input your prompt..." required>
            <i class='bx bx-code-alt'></i>
        </div>
        <span class="subtitle">
            Negative Prompt
            <a class="button-negative" href="#negative-prompt">
                <i class="hide fa-solid fa-eye-slash"></i>
                <i class="show fa-solid fa-eye" style="display: none;"></i>
            </a>
        </span>
        <div class="input-box input-negative" style="display: none;">
            <textarea name="negative-prompt" id="" cols="30" rows="5" style="overflow: hidden;"
                placeholder="negative prompt">child, kid, baby, underage, children, young, infant, lowres, bad anatomy, text, error, missing fingers, missing foots, extra digit, fewer digits, cropped, worst quality, low normal jpeg artifacts, signature, watermark, username, blurry, artist name, bad_prompt_version2, (((Blurry Eyes))), (((bad anatomy))), ((disabled body)), ((deformed ((missing finger)), ((mutant hands)), ((more than five fingers)), badly drawn lack of detail, (((Low resolution))), ((bad ((text)), low-quality image, details in the distorted mouth</textarea>
            <i class="bx bxs-checkbox-minus"></i>
        </div>
        <span class="subtitle">Aspect Ratio</span>
        <div class="radio-ratio">
            <input type="radio" name="radio-ratio" id="1:1" value="1:1" checked="checked">
            <label for="1:1" class="scale">1:1</label>
            <input type="radio" name="radio-ratio" id="9:16" value="9:16">
            <label for="9:16" class="scale">9:16</label>
            <input type="radio" name="radio-ratio" id="16:9" value="16:9">
            <label for="16:9" class="scale">16:9</label>
            <input type="radio" name="radio-ratio" id="2:3" value="2:3">
            <label for="2:3" class="scale">2:3</label>
            <input type="radio" name="radio-ratio" id="3:2" value="3:2">
            <label for="3:2" class="scale">3:2</label>
        </div><br>
        <div>
            <button id="button-generate" type="submit" class="btn">
                <span>Generate</span>
                <i class="gen-icon fa-regular fa-shuttle-space"></i>
                <i class="load-icon fas fa-cog fa-spin" style="display: none;"></i>
            </button>
        </div>
    </form>
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
                    $('#button-generate span').text('Generating...');
                    $('#button-generate').prop('disabled', true);
                    $('#button-generate').addClass('disabled');
                }
            })
            $('.button-negative').on('click', function(e) {
                if ($('.input-negative').is(":hidden")) {
                    $('.input-negative').show();
                    $('.button-negative .show').show();
                    $('.button-negative .hide').hide();
                } else {
                    $('.input-negative').hide();
                    $('.button-negative .show').hide();
                    $('.button-negative .hide').show();
                }
            })
        })
    </script>
@endsection
