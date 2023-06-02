<?php
 session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=agence','root','');
 $x = $_POST['no_cni'];
 if(isset($_POST['no_cni']) && isset($_POST['nom']) && isset($_POST['telephone']) && isset($_POST['ville'])
 && !empty($_POST['no_cni']) && !empty($_POST['nom']) && !empty($_POST['telephone']) && !empty($_POST['ville']) 
 ){
     $sql =$bdd->prepare('insert into client(no_cni, nom, telephone, ville) values(:no_cni, :nom, :telephone, :ville)');
     $sql->execute(array('no_cni'=>$_POST['no_cni'],'nom'=>$_POST['nom'],'telephone'=>$_POST['telephone'],'ville'=>$_POST['ville']));

     $userId=$bdd->query("select no_cni from client where no_cni=$x")->fetch();
     $_SESSION['no_cni'] = $x;

     header("location:../reserver.php?no_cni=$x");
     exit(0);
 }else{
     header("location:../index.php");
 }
?>