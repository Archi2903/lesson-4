<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
$path = __DIR__ . '/library.txt';
$lib = file($path);
if (!empty ($_POST['new'])) {
    file_put_contents($path, $lib[] = $_POST['new'] . PHP_EOL, FILE_APPEND);
}

function show($lib) /* function for output every recording(add bootstrap)*/
{
    foreach ($lib as $key => $val) {
        echo "<li  class='list-group-item'><div class='media'>
<img src='/img/avtar/user.png' alt='Guest' class='mr-2 mt-2 rounded-circle' style= 'width:40px;'>
<div class='media-body'>
<h5 class='font-weight-bold media-body'>Guest entry № (" . ($key + 1) . ") :
</h5>  
<p class='font-italic'>" . "$val" . "</p>

</div>
</div>
 </li>";
    }
}

$pathimg = __DIR__ . '/img/';
$arrimg = scandir($pathimg);

function gallery($arrimg)
{
    if (!false == $arrimg) {
        $imgs = preg_grep("/(pg|png)/", $arrimg);
        foreach ($imgs as $key => $value) {
            echo "<img class='img-fluid col-lg-3 col-md-6 mx-auto d-block rounded' src=img/" . $value . "  />";
        }
    }

}

$tmp = ($_FILES['file']['tmp_name']);
            if (isset($_FILES)) {
                if (0 == $_FILES['file'] ['error']) {
                    if ('image/jpeg' == $_FILES ['file'] ['type']) {
                        $upl = move_uploaded_file($tmp, __DIR__ . '/img/' . $_FILES['file']['name']);
                    } elseif ('image/png' == $_FILES ['file'] ['type']) {
                        $upl = move_uploaded_file($tmp, __DIR__ . '/img/' . $_FILES['file']['name']);
                    }
                }
            }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- link bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>Lesson 4 Artur</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="/index.html">In lessons</a>
            </li>
            <li>
                <a class="nav-link" href="/index41.php">old version!!!</a>
            </li>
        </ul>
    </nav>
    <h1 class="text-center">Lesson 4</h1>
    <main>
        <div class="jumbotron container">
            <h2 class="text-center"> Guestbook</h2>
            <ul class="list-group">
                <?= show($lib) ?>
            </ul>
        </div>

        <form action="index4.php" class="container" method="post">
            <textarea class='form-control row="3"' name='new' placeholder="Text . . . ."></textarea>
            <button type='submit' class='btn-block btn-sm btn-outline-dark'>Add new record</button>
        </form>

        <hr>
        <div class="container">
            <h2 class="text-center">Photo gallery</h2>
            <div class="row ">

                <?= gallery($arrimg) ?>
            </div>
            <form action="index4.php" class="container jumbotron" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type='submit' class=' btn-sm btn-outline-dark'>Upload new photo</button>
            </form>
        </div>

    </main>
    <footer>@Arthur Li</footer>


</body>
</html>
