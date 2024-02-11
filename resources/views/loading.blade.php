@extends('master')

@section('content')
<div class="wrapper">

    <div class="title-area loading">
        <span class="title">Generating Image</span>
    </div>
    <div class="text-white px-3 py-3" style="">
        <form action="{{ route('generate') }}" method="POST">
            <input type="hidden" name="process-url" value="{{ $processUrl }}">
            <input type="hidden" name="radio-type" value="{{ $type }}">
            <input type="hidden" name="prompt" value="{{ $prompt }}">
            <input type="hidden" name="negative-prompt" value="{{ $negPrompt }}">
            <input type="hidden" name="radio-ratio" value="{{ $scale }}">
            @csrf
            <img class="loading-img" src="img/thinking.gif">
            <div class="loading-text">
                <span id="status">Starting generate...</span>
                <br>
                <span>This process will take some time for generating.</span>
            </div>
            <br>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const url_process = $('input[name="process-url"]').val();
            const type = $('input[name="radio-type"]').val();
            const prompt = $('input[name="prompt"]').val();
            const negPrompt = $('input[name="negative-prompt"]').val();
            const radio = $('input[name="radio-ratio"]').val();

            let intervalCheck = setInterval(() => {
                $.getJSON(
                    `https://kawaii-ai-image-generator.herokuapp.com/image/upscale?url=${url_process}`,
                    function(data) {
                        if (data.status == 'succeeded') {
                            $('#status').text('Done.');
                            clearInterval(intervalCheck);
                            var output = data.output;
                            if (Array.isArray(output)) output = output.slice(-1)
                            window.location.href = `{{ route('post_result') }}?type=${type}&prompt=${prompt}&negPrompt=${negPrompt}&scale=${radio}&image=${output}`;
                        }
                        if (data.status == 'processing') {
                            $('#status').text('Processing image...');
                        }
                    }).fail(function(errMsg) {
                        alert('GAGAL');
                });
            }, 1000);
        })
    </script>
@endsection
