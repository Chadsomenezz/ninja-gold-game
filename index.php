<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>

<section class="score">
    Your Gold: <span><?= (!empty($_SESSION["score"])) ? $_SESSION["score"] : ""; ?></span>
</section>

<section class="form_container">
    <form action="process.php" method="post">
        <h2>Farm</h2>
        <input type="hidden" name="building" value="farm" />
        <h3>(earn 10 - 20 golds)</h3>
        <input type="submit" value="Find Gold!"/>
    </form>

    <form action="process.php" method="post">
        <h2>Cave</h2>
        <input type="hidden" name="building" value="cave" />
        <h3>(earn 5 - 10 golds)</h3>
        <input type="submit" value="Find Gold!"/>
    </form>

    <form action="process.php" method="post">
        <h2>House</h2>
        <input type="hidden" name="building" value="house" />
        <h3>(earn 2 - 5 golds)</h3>
        <input type="submit" value="Find Gold!"/>
    </form>

    <form action="process.php" method="post">
        <h2>Casino!</h2>
        <input type="hidden" name="building" value="casino" />
        <h3>(earn/takes 0 - 50 golds)</h3>
        <input type="submit" value="Find Gold!"/>
    </form>
</section>

<section class="activities">
    Activities:
    <div>
        <?php
            if(!empty($_SESSION["logs"])){
                foreach ($_SESSION["logs"] as $log){
                    echo $log;}
            } ?>
    </div>
    <form action="process.php" method="post">
        <input type="hidden" name="reset" value="reset">
        <input type="submit" value="Reset" class="reset">
    </form>
</section>


</body>
</html>