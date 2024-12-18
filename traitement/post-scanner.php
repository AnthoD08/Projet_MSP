<?php
if(isset($_POST['code'])){
    $recuperationDesLivres = "SELECT * FROM livres WHERE ISBN = :isbn";
    $livre = $pdo -> prepare($recuperationDesLivres);
    $livre->execute([
        'isbn' => $_POST['code'],
    ]);
    $data = $livre->fetch();
    if(isset($data) && !empty($data)){
        http_response_code(200);
    }else{
        http_response_code(401);
    }
}

?>