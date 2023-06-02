<?php
 session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=agence','root','');

 if(isset($_POST['no_bus']) && isset($_POST['heure_depart']) && isset($_POST['lieu_depart']) && isset($_POST['lieu_arrive'])&& isset($_POST['type'])
 && !empty($_POST['no_bus']) && !empty($_POST['heure_depart']) && !empty($_POST['lieu_depart']) && !empty($_POST['lieu_arrive']) && !empty($_POST['type']) 
 ){
     $sql =$bdd->prepare('insert into voyage(no_bus, heure_depart, lieu_depart, lieu_arrive, type) values(:no_bus, :heure_depart, :lieu_depart,
      :lieu_arrive, :type)');
     $sql->execute(array('no_bus'=>$_POST['no_bus'],'heure_depart'=>$_POST['heure_depart'],'lieu_depart'=>$_POST['lieu_depart'],
     'lieu_arrive'=>$_POST['lieu_arrive'], 'type'=>$_POST['type']));

     header("location:../index.html");
     exit(0);
 }else{
     header("location:../index.php");
 }
?>