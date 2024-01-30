<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Generator</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>

    <div class="wrapper">
        <form action="{{ route('generate') }}" method="POST">
            @csrf
            <h1>Image AI Generator</h1><br>
            <div class="radio-type">
                <input type="radio" name="radio-type" id="anime" value="anime" checked="checked">
                <label for="anime" class="image-type" style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZ1sqG9gR7Bo96y-9SGeyoXIBm6lrrkbxvgsqK2m0vHg&s);">Anime Style</label>
                <input type="radio" name="radio-type" id="pastel" value="pastel">
                <label for="pastel" class="image-type" style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQERyEmGZAAdYLsZqDHKibGm8gBTwfR_KLRHg&usqp=CAU);">Pastel Mix</label>
                <input type="radio" name="radio-type" id="realistic" value="realistic">
                <label for="realistic" class="image-type" style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoq2bnuNGP7IRa-boB8dgujhaO9wqKnItn-w&usqp=CAU);">Realistic Art</label>
            </div>
            <br>
            <h4>Prompt</h4>
            <div class="input-box">
                <input type="text" name="prompt" placeholder="input your prompt..." required>
                <i class='bx bx-code-alt'></i>
            </div>
            <h4>Negative Prompt</h4>
            <div class="input-box">
                <textarea name="negative-prompt" id="" cols="30" rows="5" style="overflow: hidden;" placeholder="negative prompt">child, kid, baby, underage, children, young, infant, lowres, bad anatomy, text, error, missing fingers, missing foots, extra digit, fewer digits, cropped, worst quality, low normal jpeg artifacts, signature, watermark, username, blurry, artist name, bad_prompt_version2, (((Blurry Eyes))), (((bad anatomy))), ((disabled body)), ((deformed ((missing finger)), ((mutant hands)), ((more than five fingers)), badly drawn lack of detail, (((Low resolution))), ((bad ((text)), low-quality image, details in the distorted mouth</textarea>
                <!-- <input type="text" name="negative-prompt" placeholder="negative prompt" id="negative-prompt" value=""> -->
                <i class="bx bxs-checkbox-minus"></i>
            </div>
            <hr><br>
            <h4>Aspect Ratio</h4>
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
            <div id="button-generate">
                <button type="submit" class="btn">Generate</button>
            </div>
        </form>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
</script>