<?php
    require ("DBFunction.php");

    if (!isset($_GET["gestImage_IdPhoto"])) {
        header("Location: index.php");
        exit();
    }

    function showImage($id) {
        $imageInfo = getImage($id)[0];

        echo ("<img src = '$imageInfo[2]' />");
        echo ("<h2 style = 'display: inline-block;'>$imageInfo[0]</h2> <h3 class = 'date'>$imageInfo[4]</h3><br/>"); // Titre
        echo ("Auteur: <b>$imageInfo[3]</b><br/><br/>"); // Pseudo membre
        echo ("Description: <br/><p style = 'text-align:justify;'>$imageInfo[1]</p>"); // Description
    }

    function showCommentSection($id) {
        $comment = getComments($id)[0];


    }
?>

<html>
    <head>
        <title>Galerie photo</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>

    <body>
        <?php include("Layout/Header.php") ?>
        <main>
            <div class = 'imageBox clearfix'>
                <?php showImage($_GET["gestImage_IdPhoto"]); ?>

                <?php showCommentSection($_GET["gestImage_IdPhoto"]); ?>
            </div>
        </main>

        <?php include("Layout/Footer.php"); ?>
    </body>
</html>
