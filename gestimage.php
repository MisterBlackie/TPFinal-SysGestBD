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

        echo("<img src = '$imageInfo[2]' height='$height' width='$width'/>");

    }
?>

<html>
    <head>
        <title>Galerie photo</title>

    </head>

    <?php include("Layout/Header.php") ?>

    <main>
        <div>
            <?php showImage($_GET["gestImage_IdPhoto"]); ?>
        </div>
    </main>

    <?php include("Layout/Footer.php"); ?>
</html>
