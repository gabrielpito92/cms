<?php
//a requisição chega pelo controller
//o controller que recebe a requisição 
//é o controller que vai implementar a lógica para saber se vai chamar o model ou o view e em qual ordem
//é a porta de entrada
loadModel('Login');

$exception = null;

if(count($_POST) > 0) {
    $login = new Login($_POST);

    try{
       $user = $login->checkLogin();
       header("Location: home.php");
    } catch (AppException $e) {
        $exception = $e;
    }
}


loadView('login', $_POST + ['exception' => $exception]);