<?php
    require ("DBFunction.php");

    if (!isset($_GET["gestImage_IdPhoto"])) {
        header("Location: index.php");
        exit();
    }

    function determineIdealSize($imgUrl) {
        $actualSize = getimagesize($imgUrl);

        if ($actualSize[0] > $actualSize[1]) {
            $idealSize["height"] = 600;
            $idealSize["width"] = 800;
        } else if ($actualSize[0] < $actualSize[1]) {
            $idealSize["height"] = 800;
            $idealSize["width"] = 600;
        } else {
            $idealSize["height"] = 600;
            $idealSize["width"] = 600;
        }

        return $idealSize;
    }

    function showImage($id) {
        $imageInfo = getImage($id)[0];

        $size = determineIdealSize($imageInfo[2]);
        $height = $size["height"];
        $width = $size["width"];

        echo ("<img src = '$imageInfo[2]' height='$height' width='$width'/>");
        echo ("<h2>$imageInfo[0]       $imageInfo[4]</h2><br/>"); // Titre
        echo ("<span class=\"glyphicon glyphicon-user\"></span><b>$imageInfo[3]</b><br/><br/>"); // Pseudo membre
        echo ("<p>$imageInfo[1]</p>"); // Description

    }
?>

<html>
    <head>
        <title>Galerie photo</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>

    <?php include("Layout/Header.php") ?>

    <main>
        <div>
            <div class = 'imageBox clearfix'>
                <?php showImage($_GET["gestImage_IdPhoto"]); ?>
            </div>
        </div>
    </main>

    <?php include("Layout/Footer.php"); ?>
</html>
