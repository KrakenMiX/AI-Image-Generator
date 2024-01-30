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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
</head>

<body>

    <div class="wrapper">
        <form action="">
            <h1>Result Image</h1><br>
            <div class="text-white px-3 py-3" style="background: transparent;border: 2px solid rgb(255, 255, 255);border-radius: 30px; font-size: 85%;">
                <img src="https://icon-library.com/images/avatar-icon-images/avatar-icon-images-4.jpg" style="border-radius: 50px; padding: 15px; display: block; margin-left: auto; margin-right: auto; width: 70%;">
                <div id="button-regenerate" class="text-center px-2 py-2" style="background: #fff;width: 300px;border-radius: 50px; margin: auto;padding: 15px;">
                    <i class="fa fa-refresh text-black " aria-hidden="true" style="line-height: : 45px; ">&nbsp Regenerate</i>
                </div> &nbsp
                <div id="button-download" class="text-center px-2 py-2" style="background: #fff;width: 300px;border-radius: 50px; margin: auto;padding: 15px;">
                    <i class="fa fa-download text-black " aria-hidden="true" style="line-height: : 45px; ">&nbsp Download</i>
                </div><br>
            </div>
        </form>  
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $('#button-regenerate').on('click', function(){
        alert("Anjay regenerate")
    })
    $('#button-download').on('click', function(){
        alert("Anjay download")
    })
</script>


