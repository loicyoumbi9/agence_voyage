<?php
 session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=agence','root','');
 $x = $_POST['no_cni'];
 if(isset($_POST['heure_depart']) && isset($_POST['lieu_depart']) && isset($_POST['lieu_arrive']) && isset($_POST['type'])
 && !empty($_POST['heure_depart']) && !empty($_POST['lieu_depart']) && !empty($_POST['lieu_arrive']) && !empty($_POST['type']) 
 ){
    $h_depart = $_POST['heure_depart'];
    $l_depart = $_POST['lieu_depart'];
    $l_arrive = $_POST['lieu_arrive'];
    $type = $_POST['type'];
    $messages = 'SELECT no_cni, no_bus,  FROM client as cl, voyage as vg where (id_dest=:id_dest AND id_source =:id_source) or (id_dest=:id_source AND id_source =:id_dest) order by date_post DESC';
    $req = $bdd->prepare($messages);
    $req->execute(["id_dest"=>$id_dest, "id_source"=>$id_source])
    or die(print_r($req->errorInfo()));

     header("location:../index.html");
     exit(0);
 }else{
     header("location:../index.php");
 }
?>