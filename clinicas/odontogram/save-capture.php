<?php

include '../../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:../../index.php');

};

?>



<?php
    header('Access-Control-Allow-Origin:index.php');
    $randomize=bin2hex(random_bytes(8));
    date_default_timezone_set('America/New_York');

    $now=date("Y-m-d H:i");   
    $image=$_POST['image'];
    $image=explode(';',$image)[1];
    $image=explode(',',$image)[1];
    
    $image=str_replace(' ','+',$image);
    $image=base64_decode($image);

    $id=$_POST['id'];
    $id = filter_var($id, FILTER_SANITIZE_STRING);    

    $token=$_POST['token'];
    $token = filter_var($token, FILTER_SANITIZE_STRING);    

    $clinica_id=$_POST['clinica_id'];
    $clinica_id = filter_var($clinica_id, FILTER_SANITIZE_STRING);    
    $folder=$id.'-'.$token.'-'.$clinica_id.'-'.$randomize.'-'."odontograma.jpeg";

   

    $insert_product = $conn->prepare("INSERT INTO `odontogramas`(pacienteId, clinicaId,imagen,fecha) VALUES(?,?,?,?)");
    $insert_product->execute([$id,$clinica_id,$folder,$now]);

    file_put_contents("screenshots/".$id.'-'.$token.'-'.$clinica_id.'-'.$randomize.'-'."odontograma.jpeg",$image);


    echo 'DONE    ';



?>