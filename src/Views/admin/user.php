<h1>Nouveau utilisateur</h1>
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
        <label for="password_1">Mot de passe:</label>
        <input type="password" placeholder="Mot de passe..." name="password_1" id="password_1" class="form-control">
    </div>
    <div class="form-group">
        <label for="password_2">Mot de passe confirmation:</label>
        <input type="password" placeholder="Mot de passe confirmation..." name="password_2" id="password_2" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
</form>
