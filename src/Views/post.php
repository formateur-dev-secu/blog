<h1><?php echo $post->getTitle(); ?></h1>
<?php
    echo
    "<article>
        <h2><a href='#'>".$post->getTitle()."</a></h2>  
        <p>".$post->getContent()."</p>
        <time datetime='".$post->getDateCreated()."'>".$post->getDateCreated()."</time>
    </article>";
?>
