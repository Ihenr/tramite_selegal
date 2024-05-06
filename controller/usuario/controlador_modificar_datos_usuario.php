<?php
    require '../../model/model_usuario.php';
    $MU = new Modelo_Usuario();//Instaciamos

    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $nom = htmlspecialchars($_POST['nom'],ENT_QUOTES,'UTF-8');
    $ape = htmlspecialchars($_POST['ape'],ENT_QUOTES,'UTF-8');
    $dni = htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');

        
    

    $consulta = $MU->Modificar_Datos_Usu($id,$nom,$ape,$dni,$email);
    echo $consulta;
    
    
    