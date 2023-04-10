

<?php
ob_start();
include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:../index.php');

};

?> 

<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="stylespdf.php" rel="stylesheet">
</head>
<body> 



<?php
		if(isset($_GET['pid'])){
			$pid = $_GET['pid'];
			$select_hc = $conn->prepare("SELECT * FROM `hc` WHERE pacienteId = ?");
			$select_hc->execute([$pid]);
			if($select_hc->rowCount()>0){
			$fetch_hc=$select_hc->fetch(PDO::FETCH_ASSOC);
	
       


?>
<style>
  
  @font-face {
    font-family: 'Droid';
    font-style: normal;
    font-weight: normal;
    src: url('dompdf/lib/fonts/DroidSansFallback.ttf') format('truetype');
  }
  
  * {
    margin: 0;
    box-sizing: border-box;
  }
  
  
  .text-center{
    text-align:center;
  }
  .container{
    padding:2rem;

  }
  .subtitle{
    padding-top:1rem;

  }
  .question{
    font-size:1rem;
  }
  .answer{
    color:rgba(0,0,0,0.4);
    font-size:0.8rem;
  }
  .tableQuestion{
    font-weight:bold;
    font-size:1rem;


  }
  .tableAnswer{
    color:rgba(0,0,0,0.7);
    font-size:0.9rem;
    text-align:right;

  }
  table{
    margin:1rem 0rem;
  }
 
  .table{
    margin:1rem 0rem;
  }
  

  </style>




<?php
      $server=$_SERVER['SERVER_NAME'];
      $selfLocation=$_SERVER['PHP_SELF'];
      $x=explode('pdfonlyOd_generate',$selfLocation);

      $selectImgOdontograma = $conn->prepare("SELECT * FROM `odontogramas` WHERE pacienteId= ? AND estado='Actual' ");
			$selectImgOdontograma->execute([$pid]);
			if($selectImgOdontograma->rowCount()>0){
			$fetchimgOdontograma=$selectImgOdontograma->fetch(PDO::FETCH_ASSOC);      

    
?>
  
  

<div style="text-align:center;">

      <img style=" max-width:750px; "src="<?php echo 'https://alpha-clinicas.com/clinicas/odontogram/screenshots/'.$fetchimgOdontograma['imagen'] ;?>">

      </div>

 
  
  <?php

}
?>







<?php
		}
	
  }
?>


</body>
</html>

    

<?php




    $htmlPrint=ob_get_clean();
    //echo $htmlPrint;

    require_once '../components/dompdf/autoload.inc.php';
    require_once '../components/dompdf/vendor/masterminds/html5/src/HTML5.php';

    use Dompdf\Dompdf;
    $dompdf=new Dompdf();
    $options=$dompdf->getOptions();
    $options->set(array('isRemoteEnabled'=>true));
    $dompdf->setOptions($options);
    $dompdf->loadHtml($htmlPrint);
    $dompdf->setPaper('A4');
    $dompdf->render();
    $dompdf->stream('odontograma.pdf',array('Attachment'=>true))
  
	
?>