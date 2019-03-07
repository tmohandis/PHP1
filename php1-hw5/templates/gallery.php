<h1>Добро пожаловать в галерею</h1>
<h3><?=$message?></h3>
<? foreach ($gallery as $item): ?>
    <a href="/image/?id=<?=$item['id']?>"><img src="/img/prev/<?=$item['name']?>" alt="<?=$item['name']?>"></a>
<? endforeach;?>
<h1>Загрузка файла</h1>
<form name="upload" method="POST" ENCTYPE="multipart/form-data">
    Select the file to upload: <input type="file" name="userfile">
    <input type="submit" name="upload" value="upload">
</form>