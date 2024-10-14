<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h2>hello and welcome to 4f</h2>
    <p>in this site you can upload your fabric pattern and we say you which store have that</p>
    <form action="/upload.php" method="post" enctype="multipart/form-data">
        <label for="pattern">input your pattern</label>
        <input type="file" name="pattern" id="pattern">
        <small><?php echo $errors['file'] ?? ''?></small>
        <input type="submit" value="search">
    </form>
</body>
</html>
