<h1>Загрузка файла</h1>
<form name="upload" method="POST" ENCTYPE="multipart/form-data">
    Select the file to upload: <input type="file" name="userfile">
 <input type="submit" name="upload" value="upload">
</form>
<?=loadImage();?>