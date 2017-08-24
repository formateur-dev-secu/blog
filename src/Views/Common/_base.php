<?php
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Blog Aston</title>
</head>
<body class="container">
    <nav class="nav navbar-default">
        <ul class="nav nav-pills">
            <li><a href="/">Accueil</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/admin/post">Nouveau Post</a></li>
        </ul>
        <div>
            <form action="/" method="post" class="col-lg-6">
                <input type="text" class="form-control" name="search" placeholder="Search for...">
                <span class="input-group-btn">
                <input type="submit" class="btn btn-secondary" value="Go">
            </span>
            </form>
        </div>
    </nav>


    <?php include $path ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
