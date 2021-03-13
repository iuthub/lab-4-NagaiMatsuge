<?php

$directory = './songs';

if (isset($_GET["playlist"])) {
    $file_name = $_GET['playlist'];
    $files = file('./songs/' . $file_name);
} else {
    $files = scandir($directory);
}
//Exclude some unnecessary files
$files = array_diff($files, ['.', '..'])
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!-- saved from url=(0071)http://www.webstepbook.com/supplements/labsection/lab3-music/music.html -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Music Viewer</title>

    <style>
        a {
            text-decoration: none;
            color: blue;
        }

        li:hover {
            background-color: #FFEEBB;
        }


        body {
            background-color: #BBCCDD;
            margin-left: 1em;
        }

        h1 {
            color: #000066;
            font-family: Fantasy;
            font-size: 24pt;
            margin-bottom: 0;
        }

        h2 {
            color: #006600;
            font-family: Arial;
            font-size: 14pt;
            margin-top: 0;
            padding-left: 2em;
        }

        li {
            padding-bottom: 0.5em;
            font-family: Verdana;
        }

        #listarea {
            background-color: #DDEEFF;
            border: 5px double blue;
            padding: 0;
            width: 50%;
            min-width: 500px;
        }

        .mp3item {
            list-style-image: url(http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/3-music/mp3icon.gif);
        }

        .playlistitem {
            list-style-image: url(http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/3-music/playlisticon.gif);
        }

        #return {
            list-style-image: url(back.gif);
        }

        ul {
            margin-bottom: 0.5em;
            margin-top: 0.5em;
        }
    </style>
</head>

<body>
    <div id="header">

        <h1>190M Music Playlist Viewer</h1>
        <h2>Search Through Your Playlists and Music</h2>
    </div>

    <div id="listarea">
        <ul id="musiclist">
            <?php foreach ($files as $file) : ?>
                <?php if (strpos($file, '.mp3') !== false) { ?>
                    <li class="mp3item">
                        <a href="<?= 'songs/' . $file ?>"><?= $file ?></a>
                    </li>
                <?php } elseif (strpos($file, '.txt') !== false) { ?>
                    <li class="playlistitem">
                        <a href="?playlist=<?= $file ?>"><?= $file ?></a>
                    </li>
                <?php } ?>
            <?php endforeach; ?>
    </div>
</body>

</html>