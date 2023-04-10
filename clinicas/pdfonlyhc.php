

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




  <div class="container" >

        


      <h1 class="title" >Historia Clinica</h1>
      <table style="width:100%">
            
            <tr>
              <td class="tableQuestion" style="width:50%">Doctor a cargo:</td>
              <td class="tableAnswer" style="width:50%"><?=$fetch_hc['doctor'];?></td>
            

            </tr>
            <tr>
              <td class="tableQuestion" style="width:50%">Número de Historia clinica:</td>
              <td class="tableAnswer" style="width:50%"><?=$fetch_hc['numhc'];?></td>
            

            </tr>
          </table>
      <!--DATOS GENERALES-->
      <h2 class="subtitle">Datos Generales</h2>

            
      <table style="width:100%">
       
        <tr>
          <td class="tableQuestion" style="width:20%">Nombres y apellidos:</td>
          <td class="tableAnswer" style="width:50%"><?=$fetch_hc['nombrePaciente'];?></td>
          <td  style="width:10%">  </td>
          <td class="tableQuestion" style="width:10%">DNI:</td>
          <td class="tableAnswer" style="width:10%"><?=$fetch_hc['dni'];?></td>

        </tr>
      </table>


      <table style="width:100%">  
       <tr >
         <td class="tableQuestion" style="width:25%">Fecha y hora de atención:</td>
         <td class="tableAnswer" style="width:22.5%"><?=$fetch_hc['fechahoraatencion'];?></td>
         <td  style="width:5%">  </td>
         <td class="tableQuestion" style="width:25%">Fecha de apertura de H.C.:</td>
         <td class="tableAnswer" style="width:22.5%"><?=$fetch_hc['fechaapertura'];?></td>

       </tr>
     </table>

     <table style="width:100%">  
       <tr >
         <td class="tableQuestion" style="width:7.5%">Sexo:</td>
         <td class="tableAnswer" style="width:10%"><?=$fetch_hc['sexo'];?></td>
         <td  style="width:5%">  </td>
         <td class="tableQuestion" style="width:10%">Edad:</td>
         <td class="tableAnswer" style="width:15%"><?=$fetch_hc['edadPaciente'];?></td>
         <td  style="width:5%">  </td>
         <td class="tableQuestion" style="width:30%">Fecha de nacimiento</td>
         <td class="tableAnswer" style="width:17.5%"><?=$fetch_hc['fechaNacimiento'];?></td>

       </tr>
     </table>

     <table style="width:100%">
       
        <tr>
          <td class="tableQuestion" style="width:22.5%">Lugar de Nacimiento:</td>
          <td class="tableAnswer" style="width:25%"><?=$fetch_hc['lugarNacimiento'];?> </td>
          <td  style="width:5%">  </td>
          <td class="tableQuestion" style="width:10%">Ocupación:</td>
          <td class="tableAnswer" style="width:37.5%"><?=$fetch_hc['ocupacion'];?></td>

        </tr>
      </table>

      <table style="width:100%">
            
            <tr>
              <td class="tableQuestion" style="width:50%">Direccion</td>
              <td class="tableAnswer" style="width:50%"><?=$fetch_hc['direccion'];?></td>
            

            </tr>
          </table>




      <!--ENFERMEDAD ACTUAL-->

      <h2 class="subtitle">Enfermedad actual</h2>

      <table style="width:100%">
       
        <tr>
          <td class="tableQuestion" style="width:22.5%">Tiempo de enfermedad:</td>
          <td class="tableAnswer" style="width:10%"><?=$fetch_hc['tiempoEnfermedad'];?></td>
          <td  style="width:5%">  </td>
          <td class="tableQuestion" style="width:10%">Signos y síntomas:</td>
          <td class="tableAnswer" style="width:52.5%"><?=$fetch_hc['signosSintomas'];?></td>

        </tr>
      </table>
      <table style="width:100%">
       
        <tr>
          <td class="tableQuestion" style="width:30%">Relatos cronológicos:</td>
          <td class="tableAnswer" style="width:70%"><?=$fetch_hc['relatosCronologicos'];?> </td>
          
        </tr>
      </table>
      <table style="width:100%">
       
       <tr>
         <td class="tableQuestion" style="width:30%">Funciones biológicas:</td>
         <td class="tableAnswer" style="width:70%"><?=$fetch_hc['funcionesBiologicas'];?></td>
         
       </tr>
     </table>

     <!--ANTECEDENTES-->


      <h2 class="subtitle">Antecedentes</h2>

      
      <table style="width:100%">
        <tr>
          <td class="tableQuestion" style="width:30%;padding:0rem 0rem 1rem 0rem">Antecedentes familiares:</td>
          <td class="tableAnswer" style="width:70%;padding:1rem 0rem"><?=$fetch_hc['antFamiliares'];?></td>

        </tr>
        <tr>
         <td class="tableQuestion" style="width:30%">Antecedentes personales:</td>
         <td class="tableAnswer" style="width:70%"><?=$fetch_hc['antPersonales'];?> </td>
         
       </tr>
       
        

          
        
      </table>


        <!--EXPLORACION FISICA-->


        <h2 class="subtitle">Exploración física</h2>
        <table style="width:100%">  
       <tr >
         <td class="tableQuestion" style="width:10%">P.A. :</td>
         <td class="tableAnswer" style="width:20%"><?=$fetch_hc['presionArterial'];?></td>
         <td  style="width:5%">  </td>
         <td class="tableQuestion" style="width:10%">Pulso:</td>
         <td class="tableAnswer" style="width:20%"><?=$fetch_hc['pulso'];?></td>
         <td  style="width:5%">  </td>
         <td class="tableQuestion" style="width:10%">Temperatura:</td>
         <td class="tableAnswer" style="width:20%"><?=$fetch_hc['temperatura'];?></td>

       </tr>
     </table>

      
        <table style="width:100%">  
       <tr >
         <td class="tableQuestion" style="width:25%">Frecuencia cardiaca:</td>
         <td class="tableAnswer" style="width:22.5%"><?=$fetch_hc['frecCardiaca'];?></td>
         <td  style="width:5%">  </td>
         <td class="tableQuestion" style="width:25%">Frecuencia respiratoria:</td>
         <td class="tableAnswer" style="width:22.5%"><?=$fetch_hc['frecRespiratoria'];?></td>

       </tr>
     </table>

     <div class="table" style="width:100%">
       
        <p class="tableQuestion" style="margin-bottom:0.5rem;width:100%">
          Examen clinico general
          
        </p>
        <p style="color:rgba(0,0,0,0.7); font-size:0.9rem;text-align:justify;width:100%">
        <?=$fetch_hc['examenClinicoGeneral'];?>

        </p>
      </div>

      <div class="table" style="margin-top:1rem;width:100%">
       
        <p class="tableQuestion" style="margin-bottom:0.5rem;width:100%">
          Odontoestomatológico
          
        </p>
        <p style="color:rgba(0,0,0,0.7); font-size:0.9rem;text-align:justify;width:100%">
        <?=$fetch_hc['odontoestomatologico'];?>

        </p>
      </div>

      <div class="table" style="width:100%">
       
       <p class="tableQuestion" style="width:100%">
        Estado de la higiene bucal         
       </p>
       <p style="color:rgba(0,0,0,0.7); font-size:0.9rem;text-align:justify;width:100%">
       <?=$fetch_hc['estadoHigieneBucal'];?>
       </p>
     </div>



     


     <h3 class="tableQuestion">Estado bucal general</h3>


     <div class="table" style="width:100%;padding-left:2rem;">
       
       <p style="margin-bottom:1rem">
        <strong  class="tableQuestion" style="width:100%;font-size:0.9rem">Presencia de sarrol:</strong> <span class="tableAnswer"> <?=$fetch_hc['presenciaSarro'];?></span>       
       </p>
       <p>
        <strong  class="tableQuestion" style="width:100%;font-size:0.9rem">Enfermedad periodontal:</strong> <span class="tableAnswer"> <?=$fetch_hc['enfermedadPeriodontal'];?></span>       
       </p>
    </div>
      

    



     <!--DIAGNÓSTICO (CIE10)-->


     <h2 class="subtitle">Diagnóstico (CIE 10)</h2>

            <div class="table" style="margin-top:1rem;width:100%">
              
                <p class="tableQuestion" style="margin-bottom:0.5rem;width:100%">
                  Diagnóstico presuntivo
                  
                </p>
                <p style="color:rgba(0,0,0,0.7); font-size:0.9rem;text-align:justify;width:100%">
                <?=$fetch_hc['diagnosticoPresuntivo'];?>

                </p>
              </div>



              <div class="table" style="margin-top:1rem;width:100%">
       
                <p class="tableQuestion" style="margin-bottom:0.5rem;width:100%">
                  Diagnóstico definitivo
                  
                </p>
                <p style="color:rgba(0,0,0,0.7); font-size:0.9rem;text-align:justify;width:100%">
                <?=$fetch_hc['diagfinal'];?>

                </p>
              </div>

              <div class="table" style="margin-top:1rem;width:100%">
       
              <p class="tableQuestion" style="margin-bottom:0.5rem;width:100%">
                Tratamiento 
                
              </p>
              <p style="color:rgba(0,0,0,0.7); font-size:0.9rem;text-align:justify;width:100%">
              <?=$fetch_hc['tratamiento'];?>

              </p>
            </div>

            <div class="table" style="margin-top:1rem;width:100%">
       
            <p class="tableQuestion" style="margin-bottom:0.5rem;width:100%">
              Observaciones 
              
            </p>
            <p style="color:rgba(0,0,0,0.7); font-size:0.9rem;text-align:justify;width:100%">
            <?=$fetch_hc['observaciones'];?>

            </p>
          </div>







  </div>







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
    $dompdf->stream('historia_clinica.pdf',array('Attachment'=>true))
  
	
?>