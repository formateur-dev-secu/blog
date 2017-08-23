<h1>Edition de <?php echo $post->getTitle(); ?></h1>
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
        <input type="text" value="<?php echo $post->getTitle(); ?>" placeholder="Titre..." name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Contenu:</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?php echo $post->getContent(); ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary">
    </div>
</form>
