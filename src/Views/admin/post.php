<h1>Nouveau post</h1>
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
        <label for="title">Titre:</label>
        <input type="text" placeholder="Titre..." name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
</form>
