<!-- FOR PRODUCTION -->

<?php

/*

try{
    $conn = new PDO("mysql:host=localhost;dbname=software_clinicas;port=3307","root","");
    
} catch(PDOException $err){
    $error_message = $err->getMessage();
    echo $error_message;
    
}
*/
?>



<!-- FOR DEPLOYMENT -->
<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=id20482366_alpha_clincias;port=3306","id20482366_alpha_clincias_database","Crystalcave31!");
    
} catch(PDOException $err){
    $error_message = $err->getMessage();
    echo $error_message;
    
}

?>



