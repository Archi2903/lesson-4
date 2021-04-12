<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Lesson 4 Artur</title>
</head>
<body>
<header><h1>Lesson 4</h1><br>
    <h2> Guestbook</h2></header>
<main>
    <div>
        <?php
        $arr = __DIR__ . '/guestbook.txt';  //Trip file
        $rec = file($arr);// Reading file /guestbook.txt and return array


        if (!empty($_POST['guest'])) { // There write in form <input>, when guest = 'example text'
            $rec[] = ($_POST['guest']); // Add Record in array
            $result = implode(PHP_EOL, $rec); // Association data from array in one array
            file_put_contents($arr, $result); // put all data in '/guestbook.txt'
        }
        ?>

        <?php foreach ($rec as $record): ?>
            <p>Recording guest:
                <mp class="guest"><?php echo '"' . $record . '"'; ?></mp>
            </p> <!--output in pages-->
        <?php endforeach ?>
        <form class="guestbook" action="index.php" method="post">
            <h3>Add new record</h3>
            <input type="text" name="guest" enctype="multipart/form-data"><br>
            <button type="submit">Submit</button>

        </form>
    </div>
    <hr><!-- Guest book-->
    <div>
        <h2>Photo Gallery</h2>
        <?php

        $dir = __DIR__ . '/img/';
        $s = scandir($dir);


        if (!false == $s) {
            $s = preg_grep('/\\.(?:png|gif|jpe?g)$/', $s);
            foreach ($s as $pic) {
                ; ?>

                <img src="/img/<?php
                echo htmlspecialchars($pic); ?>" width="300px" hegiht="300px"/>

            <?php }
        } ?>
        <hr>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit">Submit image</button>
            <?php
            //            var_dump($_FILES['file']['type']);
            $tmp = ($_FILES['file']['tmp_name']);
            if (isset($_FILES)) {
                if (0 == $_FILES['file'] ['error']) {
                    if ('image/jpeg' == $_FILES ['file'] ['type']) {
                        $upl = move_uploaded_file($tmp, __DIR__ . '/img/' . $_FILES['file']['name']);
                    } elseif ('image/png' == $_FILES ['file'] ['type']) {
                        $upl = move_uploaded_file($tmp, __DIR__ . '/img/' . $_FILES['file']['name']);
                    } else {
                        echo "Error! Not correct type";
                    }
                }
            } ?>
        </form>
    </div><!-- Photo gallery -->

</main>
<footer>@Arthur Li</footer>


</body>
</html>
