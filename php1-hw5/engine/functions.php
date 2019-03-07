<?php

class SimpleImage
{

    var $image;
    var $image_type;

    function load($filename)
    {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }

    function output($image_type = IMAGETYPE_JPEG)
    {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        }
    }

    function getWidth()
    {
        return imagesx($this->image);
    }

    function getHeight()
    {
        return imagesy($this->image);
    }

    function resizeToHeight($height)
    {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }

    function resizeToWidth($width)
    {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width, $height);
    }

    function scale($scale)
    {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->resize($width, $height);
    }

    function resize($width, $height)
    {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
}

function prepareVariables($page)
{
    $params = [];
    switch ($page) {
        case 'index':
            break;

        case 'news':
            $params['news'] = getNews();
            break;

        case 'newspage':
            $content = getNewsContent($_GET['id']);;
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;
        case 'gallery':
            $params['message'] = loadImage();
            $params['gallery'] = getGallery();
            header("Location /gallery");
            break;
        case 'image':
            $params['image'] = getimage($_GET['id']);
            break;

    }
    // var_dump($params);
    return $params;
}

function loadImage()
{
    if (isset($_POST['upload'])) {
        $uploadfile = IMAGE_DIR . basename($_FILES['userfile']['name']);

        if (file_exists($uploadfile)) {
            $message = "Файл существует, выберите другое имя файла!";
        }
          else if ($_FILES["userfile"]["size"] > 1024 * 1 * 1024) {
                $message = "Размер файла не больше 5 мб";
            }

            else if ($_FILES['userfile']['type'] != "image/jpeg") {
                $message = "Можно загружать только jpg-файлы";
            }
            else if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                $message = "Файл успешно загружен";
                resizeImage($_FILES['userfile']['name']);
                executeQuery("INSERT INTO `images` (`name`, `views`) VALUES ('{$_FILES['userfile']['name']}', 0);");
            } else {
                $message = "Ошибка при загрузке";
            }

            return $message;
        }



}




function resizeImage($img)
{
    $image = new SimpleImage();
    $image->load(IMAGE_DIR . $img);
    $image->resizeToWidth(250);
    $image->save(PREV_IMAGE_DIR . $img);
}

function getGallery()
{
    $sql = "SELECT * FROM images ORDER BY views DESC ";
    $gallery = getAssocResult($sql);
    //var_dump($gallery);
    return $gallery;
}

function getImage($id)
{
    $id = (int)$id;

    $sql = "SELECT * FROM images WHERE id = {$id}";
    executeQuery("UPDATE images SET views = views + 1 WHERE id = {$id}");
    $image = getAssocResult($sql);
    //В случае если новости нет, вернем пустое значение
    $result = [];
    if (isset($image[0]))
        $result = $image[0];

    return $result;
}

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'content' => renderTemplate($page, $params),
        'menu' => renderTemplate('menu', $params),
        'title' => SITE_TITLE
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
