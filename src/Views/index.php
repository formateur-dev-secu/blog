<h1>Accueil</h1>
<?php
    if (isset($posts)) {
        foreach ($posts as $post) {
            echo
            "<article>
                <h2><a href='/article/".$post->getSlug()."'>".$post->getTitle()."</a></h2>  
                <p>".$post->getContent()."</p> 
                <time datetime='".$post->getDateCreated()."'>".$post->getDateCreated()."</time>
                <a href='/update/".$post->getSlug()."' class='btn btn-warning'>Modifier</a>
                <form action='/delete/".$post->getId()."' method='post'>
                    <input type='submit' value='Delete' class='btn btn-danger'>
                </form>
            </article>";
        }
    }
?>
