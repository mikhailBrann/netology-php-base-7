<?php
$uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR;
$hasError = false;
$errorKeys = [];

if(empty($_POST["file_name"])) {
    $hasError = true;
    $errorKeys[] = "error=file-name";
}

if(isset($_FILES["upload_file"]["size"]) && $_FILES["upload_file"]["size"] <= 0) {
    $hasError = true;
    $errorKeys[] = "error_two=file";
}

if($hasError) {
    $errorKeys = "?" . implode("&", $errorKeys);
    header('Location: /form/index.php' . $errorKeys , true, 302);
    exit;
}

//забираем разрешение файла
$fileInfo = pathinfo($_FILES["upload_file"]["name"]);
$extension = $fileInfo["extension"];
$PathToNewFile = $uploadDir . $_POST["file_name"] . '.' . $extension;

//записываем в файл
if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $PathToNewFile)) {
    echo "Файл корректен и был успешно загружен.\nПуть до файла на хостинге: " . $PathToNewFile;
} else {
    echo "ошибка при загрузке файла!";
}
