<?php
//require "favicon.php";
require "header.php";
?>
<head>

<link rel="shortcut icon" href="<?= $randomFavicon ?>" type="image/x-icon">
    <style>
        .contenerPubli {
            padding: 40px;
        }

        .photoArtiste {
            display: flex;

            justify-content: center;
            align-items: center;
        }

        .photoArtiste-img {
            border-radius: 10%;
            width: 30%;
        }

        body {
            margin: 0px;
        }

        .spotify {
            display: flex;
            justify-content: center;
            margin-bottom: 0px;
        }

        .spotify-img {
            border-radius: 12px;
            width: 100%;
            height: 500px;
        }

        .textePubli {
            margin-bottom: 0px;
        }
        @media screen and (max-width: 330px) {
            .photoArtiste{
                display: none;
            }
            .spotify{
                display: none;
            }
            .contenerPubli{
                padding: 10px;
            }
        }
    </style>
    <!--
    <link rel="stylesheet" href="./Style/stylePubli.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    -->

</head>

<body>
    <?php
    if ($_GET && $_GET["id"]) {
        $artiste = $artisteController->get($_GET["id"]);
    }
    ?>
    <div class="contenerPubli">
        <div class="photoArtiste">
            <img src="<?= $artiste->getImage() ?>" alt="..." class="photoArtiste-img">
        </div>
        <div class="pagePubli">
            <br>
            <h2><?= $artiste->getNomArtiste() ?></h2>
            <br>
            <h5><?= $artiste->getStyle() ?></h5>
            <br>
            <p class="spotify">
                <iframe src="<?= $artiste->getMusic() ?>" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy" class="spotify-img"></iframe>
            </p>
            <br>
            <p class="textePubli">
                <?= $artiste->getContent() ?>
            </p>
        </div>
    </div>

    <?php require("footer.php") ?>