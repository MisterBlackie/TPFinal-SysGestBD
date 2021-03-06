<?php
    require ("DBFunction.php");
    session_start();

    if (!isset($_SESSION['pseudo'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: Inscription/login.php');
    }

    if (!isset($_GET["gestImage_IdPhoto"]) && !isset($_POST["gestImage_IdPhoto"])) {
        header("Location: index.php");
        exit();
    }

    // On prend l'id dans une variable (On a vérifié si au moins un id était set plus haut)
    $idPhoto = isset($_GET["gestImage_IdPhoto"]) ? $_GET["gestImage_IdPhoto"] : $_POST["gestImage_IdPhoto"];

    if (isset($_POST["gestImage_AddComment"])) {
        $comment = $_POST["comment"];
        if (strlen($comment) > 155 || strlen($comment) == 0) {
            $_POST["ErrorMessage"] = "Le commentaire doit contenir entre 1 et 155 caractères.";
        } else {
            insertCommentaire($idPhoto, $_SESSION['pseudo'], $comment);
        }
    }

    function showImage($id) {
        $imageInfo = getImage($id)[0];

        echo ("<img src = '$imageInfo[2]' />");
        echo ("<h2 style = 'display: inline-block;'>$imageInfo[0]</h2> <h3 class = 'date'>$imageInfo[4]</h3><br/>"); // Titre
        echo ("Auteur: <b>$imageInfo[3]</b><br/><br/>"); // Pseudo membre
        echo ("Description: <br/><p style = 'text-align:justify;'>$imageInfo[1]</p>"); // Description
    }

    function showCommentSection($id) {
        $comments = getComments($id);

        foreach ($comments as $comment) {
            echo("<div class = 'comment'> Auteur: $comment[1] <br/> $comment[2]<br/></div>");
        }
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
            </div>

            <div class = "commentSection">
                <form method = "POST">
                    <input type = 'hidden' name = 'gestImage_IdPhoto' value = '<?php echo($idPhoto); ?>' />
                    <?php
                    if (isset($_POST["ErrorMessage"])) {
                        $error = $_POST["ErrorMessage"];
                        echo ("<label for = 'comment'>$error</label>");
                    }
                    ?>
                    <textarea name = 'comment' id = 'comment' required></textarea>
                    <input type = "submit" name = "gestImage_AddComment" />
                </form>

                <?php showCommentSection($idPhoto); ?>
            </div>
        </main>

        <?php include("Layout/Footer.php"); ?>
    </body>
</html>
