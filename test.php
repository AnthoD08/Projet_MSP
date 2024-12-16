<?php
if(isset($_POST['code'])){
    $querryAllBook = "SELECT * FROM livres INNER JOIN langues ON langues.id = livres.id_langue INNER JOIN genres ON genres.id = livres.id_genre"
}

?>