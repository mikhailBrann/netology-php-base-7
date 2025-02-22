<?php
$errorFileName = $_GET["error"] == 'file-name' ? '<div class="error">Заполните поле с названием файла</div>' : '';
$errorFile = $_GET["error_two"] == 'file' ? '<div class="error">Загрузите файл</div>' : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File form</title>
</head>
<body> 
    <form action="/form/upload.php" method="post" enctype="multipart/form-data">
        <div>
            <?=$errorFileName?>
            <input name="file_name" type="text" value="" placeholder="введите имя файла">
        </div>
        <div>
            <?=$errorFile?>
            <input name="upload_file" type="file">
        </div>
        <div>
            <button type="submit">Отправить</button>
        </div>
    </form>
</body>
</html>

<style>
.error {
    color: red;
}
</style>