
<?php

if ( !empty( $_POST ) ) {
    $name = $_POST['name'];
    $text = $_POST['code'];
   
    //generate file path
    $path = 'img/';
    $fileDir = $path . $name . time() . '.png';

    include 'phpqrcode/qrlib.php';
    QRcode::png( $text, $fileDir );
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="style.css">
    <title>QR Code Generator - PHP Aplication</title>
</head>
<body>
    <center>
        <h1><a href="./"><img src="assets/favicon.png" height="50px" width="50px"></a>QR Code Generator for FREE.</h1>
    </center>
    <center>
    <div class="form-div">
        <center>
        <form action="" class="form" method="post">
            <label class="form-label" for="name">Your Name:</label><br>
            <input required type="text" id="name" name="name" placeholder="Name" ><br>

            <label class="form-label" for="qr-text">Your Text</label><br>
            <textarea required id="qr-text" name="code" rows="5" cols="" placeholder="Your Text here..."></textarea><br>
            <button class="submit">Generate</button>
        </form></center>


        <center id="r">
            <div class="result">
                <h3>Your QR Code</h3>
                <div class="res"><?php
if ( isset( $fileDir ) ) {
    echo "<img src='" . $fileDir . "' height='100%' width='100%' >";
} else {
    echo "<img src='assets/favicon.png' height='100%' width='100%' >";

}
?>

                </div>

                    <?php
$link = "javascript:void(0)";
$btnColor = "#9F34FF";
$download = '';
if ( isset( $fileDir ) ) {
    $link = $fileDir;
    $btnColor = "#008B8B";
    $download = 'download="'.$name.'-qr.png"';
}?>
                <div class="download">
                <a style="color: white;background: <?php echo $btnColor; ?>" href="<?php echo $link; ?>" <?php echo $download; ?>>Download</a>
                </div>
            </div>
        </center>

    </div>
</center>

</body>
</html>

