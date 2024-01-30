<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Generator</title>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>

    <div class="wrapper">
        <form action="">
            <h1>Image AI Generator</h1><br>
            <h4>Image Type</h4>
            <div class="radio-type">
                <input type="radio" name="radio-type" id="anime" value="anime" checked="checked">
                <label for="anime" style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZ1sqG9gR7Bo96y-9SGeyoXIBm6lrrkbxvgsqK2m0vHg&s);">Anime Style</label>
                <input type="radio" name="radio-type" id="pastel" value="pastel">
                <label for="pastel" style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQERyEmGZAAdYLsZqDHKibGm8gBTwfR_KLRHg&usqp=CAU);">Pastel Mix</label>
                <input type="radio" name="radio-type" id="realistic" value="realistic">
                <label for="realistic" style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoq2bnuNGP7IRa-boB8dgujhaO9wqKnItn-w&usqp=CAU);">Realistic Art</label>
            </div>
            <div class="input-box">
                <input type="text" placeholder="prompt" required id="prompt">
                <i class='bx bx-code-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="negative prompt" id="negative-prompt">
                <i class="bx bxs-checkbox-minus"></i>
            </div>
            <hr><br>
            <h4>Aspect Ratio</h4>
            <div class="radio-ratio">
                <input type="radio" name="radio-ratio" id="1:1" value="1:1" checked="checked">
                <label for="1:1" style="color: #333">Scale 1:1</label>
                <input type="radio" name="radio-ratio" id="9:16" value="9:16">
                <label for="9:16" style="color: #333">Scale 9:16</label>
                <input type="radio" name="radio-ratio" id="16:9" value="16:9">
                <label for="16:9" style="color: #333">Scale 16:9</label>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="radio-ratio" id="2:3" value="2:3">
                <label for="2:3" style="color: #333">Scale 2:3</label>
                <input type="radio" name="radio-ratio" id="3:2" value="3:2">
                <label for="3:2" style="color: #333">Scale 3:2</label>
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
    $('#button-generate').on('click', function(){
        alert("Anjay generate")
    })
</script>