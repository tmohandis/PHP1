<?php

class SimpleImage {

    var $image;
    var $image_type;

    function load($filename) {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $this->image = imagecreatefromgif($filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $this->image = imagecreatefrompng($filename);
        }
    }
    function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image,$filename,$compression);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image,$filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image,$filename);
        }
        if( $permissions != null) {
            chmod($filename,$permissions);
        }
    }
    function output($image_type=IMAGETYPE_JPEG) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image);
        }
    }
    function getWidth() {
        return imagesx($this->image);
    }
    function getHeight() {
        return imagesy($this->image);
    }
    function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width,$height);
    }
    function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width,$height);
    }
    function scale($scale) {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getheight() * $scale/100;
        $this->resize($width,$height);
    }
    function resize($width,$height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
}

function render($page, $params = [])
{
        return renderTemplate(LAYOUTS_DIR . 'main', [
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu', $params)
        ]);

}


function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }

    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die('Страницы не существует 404');
    }

    return ob_get_clean();
}

function loadGallery(){
    $arr = array_slice(scandir(IMAGE_DIR),2);

    foreach ($arr as $item){
        echo '<img src="'. RESIZED_IMAGE_DIR . $item. '" data-full_image_url="'. IMAGE_DIR . $item.'" alt="Картинка">';
    }
}
function resizeImage($img){
    echo var_dump($img);
    $image = new SimpleImage();
    $image->load(IMAGE_DIR . $img);
    $image->resizeToWidth(250);
    $image->save(RESIZED_IMAGE_DIR .$img);
}

function loadImage()
{
    if (isset($_POST['upload'])) {
        $uploaddir = 'img/image/'; // Relative path under webroot
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
//Проверка существует ли файл
        if (file_exists($uploadfile)) {
            echo "Файл $uploadfile существует, выберите другое имя файла!";
        }

//Проверка на размер файла
        if ($_FILES["userfile"]["size"] > 1024 * 1 * 1024) {
            echo("Размер файла не больше 5 мб");
        }
//Проверка расширения файла
        $blacklist = array(".php", ".phtml", ".php3", ".php4");
        foreach ($blacklist as $item) {
            if (preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
                echo "Загрузка php-файлов запрещена!";
            }
        }
//Проверка на тип файла
        $imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
        if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
            echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
        }

        if ($_FILES['userfile']['type'] != "image/jpeg") {
            echo "Можно загружать только jpg-файлы.";
        }

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "Файл " . $_FILES['userfile']['name'] . " успешно загружен.\n";
        } else {
            echo "Загрузка не получилась.\n";
        }
        resizeImage($_FILES['userfile']['name']);
    }

}

