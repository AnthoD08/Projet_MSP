<?php
if(isset($_POST['code'])){
    $recuperationDesLivres = "SELECT * FROM livres INNER JOIN langues ON langues.id = livres.id_langue INNER JOIN genres ON genres.id = livres.id_genre WHERE livres.ISBN = :isbn";
    $livre = $pdo -> prepare($recuperationDesLivres);
    $livre->execute([
        'isbn' => $_POST['code'],
    ]);
    $livre->fetch();
    if(isset($livre) && !empty($livre)){
        http_response_code(200);
    }else{
        http_response_code(401);
    }
}

?>