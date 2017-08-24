<h1>Admin</h1>
<form action="" method="post" class="container">
    <?php
    if (isset($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li class='alert-primary'> $error</li>";
        }
        echo "</ul>";
    }
    ?>
    <div class="form-group">
        <label for="pseudo">Pseudo:</label>
        <input type="text" placeholder="Pseudo..." name="pseudo" id="pseudo" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe:</label>
        <input type="password" placeholder="Mot de passe..." name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
</form>
