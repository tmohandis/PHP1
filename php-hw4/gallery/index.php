<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <style>
        .galleryWrapper__screen {
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #222;
            opacity: 0.8;
            position: fixed;
            top: 0;
            z-index: 100;
            display: block;
            text-align: center;
        }

        .galleryWrapper__image {
            max-height: 80%;
            max-width: 80%;
            z-index: 101;
            position: absolute;
            margin: auto;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
        }

        .galleryWrapper__close {
            z-index: 101;
            position: absolute;
            top: 0;
            right: 0;
        }

        img {
            max-height: 200px;
            max-width: 300px;
        }


    </style>
</head>

<body>
    <div class="galleryPreviewsContainer">
        <?php
        $arr = scandir('images/image');

        $arr = scandir('images/image');

        for ($i = 2; $i < count($arr); $i++)
        {
            echo '<img src="images/image/'.$arr[$i].'" data-full_image_url="images/image/'.$arr[$i].'" alt="Картинка">';
        }
        ?>

    </div>
    <!--
  <div class="galleryWrapper">
    <div class="galleryWrapper__screen"></div>
    <img class="galleryWrapper__close" src="images/gallery/close.png" alt="">
    <img class="galleryWrapper__image" src="images/max/1.jpg" alt="">
  </div>
  -->
    <script src="js.js"></script>
</body>

</html>
