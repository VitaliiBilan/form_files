<?php
ini_set('upload_max_filesize', '2M');
if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    if ($_FILES['inputfile']['error'] == UPLOAD_ERR_OK && $_FILES['inputfile']['type'] == 'image/jpeg') { //проверка на наличие ошибок
        $destiation_dir = dirname(__FILE__) . '/img/' . $_FILES['inputfile']['name']; // директория для размещения файла
        if (move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation_dir)) { //перемещение в желаемую директорию
            echo 'File Uploaded'; //оповещаем пользователя об успешной загрузке файла

        } else {
            echo 'File not uploaded';
        }
    } else {
        switch ($_FILES['inputfile']['error']) {
            case UPLOAD_ERR_FORM_SIZE:
            case UPLOAD_ERR_INI_SIZE:
                echo 'File Size exceed';
                brake;
            case UPLOAD_ERR_NO_FILE:
                echo 'FIle Not selected';
                break;
            default:
                echo 'Something is wrong';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
<h1>File Upload</h1>
<form method="post" action="index.php" enctype="multipart/form-data">
    <label for="inputfile">Upload File</label>
    <input type="file" id="inputfile" name="inputfile">
    <input type="submit" value="Click To Upload">
</form>
</body>
</html>

