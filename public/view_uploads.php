<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Image Upload</title>
</head>
<body>
<h1>Ionic Image Upload</h1>
<?php
$scan = scandir('uploads');

foreach ($scan as $file) {
    if (!is_dir($file)) {
        echo '<h3>' . $file . '</h3>';
        echo '<img src="uploads/' . $file . '" style="width: 400px;"/><br />';
    }
}
?>
</body>
</html>
