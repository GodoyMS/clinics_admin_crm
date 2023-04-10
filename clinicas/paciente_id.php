
      
<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:../index.php');

};

if(isset($_POST['updateStateOdontograma'])){
   
  $imageName=$_POST['imageName'];
  $idPaciente=$_POST['idPaciente'];
  
  $updateInhabilitadoState= $conn->prepare("UPDATE `odontogramas` SET estado = 'Inhabilitado' WHERE estado = 'Actual' ");
  $updateInhabilitadoState->execute();
  $updateStateImg = $conn->prepare("UPDATE `odontogramas` SET estado = 'Actual' WHERE imagen= ? ");
  $updateStateImg->execute([$imageName]);

  $headerAfterUpdateStateOdontograma='location:paciente_id.php?pid='.$idPaciente.'&modal=odontograma';
    header($headerAfterUpdateStateOdontograma);

    
}

if(isset($_POST['updateStateConsentimiento'])){
   
  $docName=$_POST['docName'];
  $idPaciente=$_POST['idPaciente'];
  
  $updateInhabilitadoStateConsent= $conn->prepare("UPDATE `consentimientos` SET estado = 'Inhabilitado' WHERE estado = 'Actual' ");
  $updateInhabilitadoStateConsent->execute();
  $updateStateDoc = $conn->prepare("UPDATE `consentimientos` SET estado = 'Actual' WHERE doc= ? ");
  $updateStateDoc->execute([$docName]);

  $headerAfterUpdateConsentimiento='location:paciente_id.php?pid='.$idPaciente.'&modal=consentimientos';
    header($headerAfterUpdateConsentimiento);

    
}

if(isset($_POST['deleteConsentimiento'])){

  $idPaciente=$_POST['idPaciente'];
  $docName=$_POST['consentimientoName'];

  $selectDoc = $conn->prepare("SELECT * FROM `consentimientos` WHERE doc = ?");
  $selectDoc->execute([$docName]);
  $fetchConsentimiento = $selectDoc->fetch(PDO::FETCH_ASSOC);
  unlink('./consentimientos/'.$fetchConsentimiento['doc']);
  $deleteConsentimiento = $conn->prepare("DELETE FROM `consentimientos` WHERE doc = ? AND pacienteId = ?");
  $deleteConsentimiento->execute([$docName,$idPaciente]);
  $headerAfterDeleteConsentimiento='location:paciente_id.php?pid='.$idPaciente.'&modal=consentimientos';
  header($headerAfterDeleteConsentimiento);
    
}

if(isset($_POST['deletehcDoc'])){

    $idPaciente=$_POST['idPaciente'];
    $hcdocName=$_POST['hcDocName'];
  
    $selectHCDoc = $conn->prepare("SELECT * FROM `hcdocs` WHERE doc = ?");
    $selectHCDoc->execute([$hcdocName]);
    $fetchhcdoc = $selectHCDoc->fetch(PDO::FETCH_ASSOC);
    unlink('./hcdocs/'.$fetchhcdoc['doc']);
    $deleteHCDoc = $conn->prepare("DELETE FROM `hcdocs` WHERE doc = ? AND pacienteId = ?");
    $deleteHCDoc->execute([$hcdocName,$idPaciente]);
    
    $headerAfterDeleteHCDoc='location:paciente_id.php?pid='.$idPaciente.'&modal=historia_clinica';
    header($headerAfterDeleteHCDoc);
      
  }

if(isset($_POST['deleteOdontograma'])){

  $idPaciente=$_POST['idPaciente'];
  $imgName=$_POST['imageName'];

  $selectImg = $conn->prepare("SELECT * FROM `odontogramas` WHERE imagen = ?");
  $selectImg->execute([$imgName]);
  $fetchOdontogramaImg = $selectImg->fetch(PDO::FETCH_ASSOC);
  unlink('./odontogram/screenshots/'.$fetchOdontogramaImg['imagen']);
  $deleteOdontograma = $conn->prepare("DELETE FROM `odontogramas` WHERE imagen = ? AND pacienteId = ?");
  $deleteOdontograma->execute([$imgName,$idPaciente]);

  $headerAfterDeleteOdontograma='location:paciente_id.php?pid='.$idPaciente.'&modal=odontograma';
  header($headerAfterDeleteOdontograma);
    
}

if(isset($_POST['submitActualizarInfoPaciente'])){

    $nombrePaciente = $_POST['nombrePaciente'];
    $nombrePaciente = filter_var($nombrePaciente, FILTER_SANITIZE_STRING);
    $sexoPaciente = $_POST['sexo'];
    $sexoPaciente = filter_var($sexoPaciente, FILTER_SANITIZE_STRING);
    $telefonoPaciente = $_POST['telefonoPaciente'];
    $telefonoPaciente = filter_var($telefonoPaciente, FILTER_SANITIZE_STRING);
    $edadPaciente = $_POST['edadPaciente'];
    $edadPaciente = filter_var($edadPaciente, FILTER_SANITIZE_STRING);
    $ciudadPaciente = $_POST['ciudadPaciente'];
    $ciudadPaciente = filter_var($ciudadPaciente, FILTER_SANITIZE_STRING);
    $emailPaciente = $_POST['emailPaciente'];
    $emailPaciente = filter_var($emailPaciente, FILTER_SANITIZE_STRING);
    $dniPaciente = $_POST['dniPaciente'];
    $dniPaciente = filter_var($dniPaciente, FILTER_SANITIZE_STRING);
    $fechaNacimiento = $_POST['fechaNacimientopaciente'];
    $fechaNacimiento = filter_var($fechaNacimiento, FILTER_SANITIZE_STRING);
    $lugarNacimiento = $_POST['lugarNacimiento'];
    $lugarNacimiento = filter_var($lugarNacimiento, FILTER_SANITIZE_STRING);
    $ocupacionPaciente = $_POST['ocupacionPaciente'];
    $ocupacionPaciente = filter_var($ocupacionPaciente, FILTER_SANITIZE_STRING);
    $direccionPaciente = $_POST['direccionPaciente'];
    $direccionPaciente = filter_var($direccionPaciente, FILTER_SANITIZE_STRING);
    $idPaciente=$_GET['pid'];
    

    $prevent_doble_paciente_actualizar_Nombre = $conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id= ? ");
    $prevent_doble_paciente_actualizar_Nombre->execute([$user_id]);
    if($prevent_doble_paciente_actualizar_Nombre->rowCount()> 0 ){
      $update_paciente = $conn->prepare("UPDATE `pacientes` SET nombrePaciente = ? WHERE id = ? ");
      $update_paciente->execute([$nombrePaciente,$idPaciente]);
      


    } 
      $update_paciente1 = $conn->prepare("UPDATE `pacientes` SET telefonoPaciente = ? WHERE id = ? ");
      $update_paciente1->execute([$telefonoPaciente,$idPaciente]);
      $update_paciente2 = $conn->prepare("UPDATE `pacientes` SET ciudadPaciente  = ? WHERE id = ? ");
      $update_paciente2->execute([$ciudadPaciente,$idPaciente]);
      $update_paciente3 = $conn->prepare("UPDATE `pacientes` SET edadPaciente  = ? WHERE id = ? ");
      $update_paciente3->execute([$edadPaciente,$idPaciente]);

      $update_paciente4 = $conn->prepare("UPDATE `pacientes` SET correo = ? WHERE id = ? ");
      $update_paciente4->execute([$emailPaciente,$idPaciente]);

      $update_paciente5 = $conn->prepare("UPDATE `pacientes` SET dni = ? WHERE id = ? ");
      $update_paciente5->execute([$dniPaciente,$idPaciente]);
      $update_paciente5usuariosPaciente = $conn->prepare("UPDATE `usuariospacientes` SET dni = ? WHERE idPaciente = ? ");
      $update_paciente5usuariosPaciente->execute([$dniPaciente,$idPaciente]);

      $update_paciente6 = $conn->prepare("UPDATE `pacientes` SET fechaNacimiento = ? WHERE id = ? ");
      $update_paciente6->execute([$fechaNacimiento,$idPaciente]);
      $update_paciente7 = $conn->prepare("UPDATE `pacientes` SET lugarNacimiento  = ? WHERE id = ? ");
      $update_paciente7->execute([$lugarNacimiento,$idPaciente]);
      $update_paciente8 = $conn->prepare("UPDATE `pacientes` SET ocupacion = ? WHERE id = ? ");
      $update_paciente8->execute([$ocupacionPaciente,$idPaciente]);
      $update_paciente9 = $conn->prepare("UPDATE `pacientes` SET direccion  = ? WHERE id = ? ");
      $update_paciente9->execute([$direccionPaciente,$idPaciente]);


      //UPDATE EN CITAS
      $update_pacienteEventos = $conn->prepare("UPDATE `eventos` SET nombreEvento = ? WHERE idPaciente = ? ");
      $update_pacienteEventos->execute([$nombrePaciente,$idPaciente]);

      //UPDATE EN mensajes
       $update_pacienteMensajes = $conn->prepare("UPDATE `mensajes` SET nombrePaciente = ? WHERE idPaciente = ? ");
       $update_pacienteMensajes->execute([$nombrePaciente,$idPaciente]);

       
      //UPDATE EN Solicitud postergación cita
      $update_pacientePostergacionCita = $conn->prepare("UPDATE `solicitudespostergacioncita` SET nombrePaciente = ? WHERE idPaciente = ? ");
      $update_pacientePostergacionCita->execute([$nombrePaciente,$idPaciente]);

      //UPDATE EN solicitudescitas
      $update_pacienteSolicitudesCitas = $conn->prepare("UPDATE `solicitudescitas` SET nombrePaciente = ? WHERE idPaciente = ? ");
      $update_pacienteSolicitudesCitas->execute([$nombrePaciente,$idPaciente]);

      //UPDATE EN hc
      $update_pacienteHc = $conn->prepare("UPDATE `hc` SET nombrePaciente = ? WHERE pacienteId = ? ");
      $update_pacienteHc->execute([$nombrePaciente,$idPaciente]);

        //UPDATE EN costos
        $update_pacienteHc = $conn->prepare("UPDATE `costos` SET paciente = ? WHERE pacienteId = ? ");
        $update_pacienteHc->execute([$nombrePaciente,$idPaciente]);
      



    $headerAfterUpdatePatient='location:paciente_id.php?pid='.$idPaciente;
    header($headerAfterUpdatePatient);
    
  
 }


    
 if(isset($_POST['submitUpdateHC'])){

  $select_HC = $conn->prepare("SELECT * FROM `hc` WHERE clinica_id= ? ");
  $select_HC ->execute([$user_id]);

  if($select_HC->rowCount()> 0 ){
    $token = $_POST['token'];
    $token = filter_var($token, FILTER_SANITIZE_STRING);
    echo $token;  

 //doctorCargo
 $doctorCargo = $_POST['doctor'];
 $doctorCargo = filter_var($doctorCargo, FILTER_SANITIZE_STRING);
 $updateHCdoctorCargo = $conn->prepare("UPDATE `hc` SET doctor = ? WHERE token = ? ");
 $updateHCdoctorCargo->execute([$doctorCargo,$token]);  





  //paciente_ID
  $paciente_ID = $_POST['pacienteId'];
  $paciente_ID = filter_var($paciente_ID, FILTER_SANITIZE_STRING);
  $updateHC_paciente_ID = $conn->prepare("UPDATE `hc` SET pacienteId = ? WHERE token = ? ");
  $updateHC_paciente_ID->execute([$paciente_ID,$token]);  

  //dni
  $dni1 = $_POST['dni12'];
  $dni1 = filter_var($dni1, FILTER_SANITIZE_STRING);
  $updateHC_dni = $conn->prepare("UPDATE `hc` SET dni = ? WHERE token = ? ");
  $updateHC_dni->execute([$dni1,$token]); 
  
  //sexo
  $sexo12 = $_POST['sexo12'];
  $sexo12 = filter_var($sexo12, FILTER_SANITIZE_STRING);
  $updateHC_sexo = $conn->prepare("UPDATE `hc` SET sexo = ? WHERE token = ? ");
  $updateHC_sexo->execute([$sexo12,$token]);  
  //edadPaciente
  $edadPaciente = $_POST['edadPacienteHC'];
  $edadPaciente = filter_var($edadPaciente, FILTER_SANITIZE_STRING);
  $updateHC_edadPaciente = $conn->prepare("UPDATE `hc` SET edadPaciente = ? WHERE token = ? ");
  $updateHC_edadPaciente->execute([$edadPaciente,$token]);  
  //lugarNacimiento
  $lugarNacimiento = $_POST['lugarNacimiento'];
  $lugarNacimiento = filter_var($lugarNacimiento, FILTER_SANITIZE_STRING);
  $updateHC_lugarNacimiento = $conn->prepare("UPDATE `hc` SET lugarNacimiento = ? WHERE token = ? ");
  $updateHC_lugarNacimiento->execute([$lugarNacimiento,$token]); 
  //fehcaNacimiento
  $fehcaNacimiento = $_POST['fechaNacimiento'];
  $fehcaNacimiento = filter_var($fehcaNacimiento, FILTER_SANITIZE_STRING);
  $updateHC_fehcaNacimiento = $conn->prepare("UPDATE `hc` SET fechaNacimiento = ? WHERE token = ? ");
  $updateHC_fehcaNacimiento->execute([$fehcaNacimiento,$token]);  
  //ocupacion
  $ocupacion = $_POST['ocupacion'];
  $ocupacion = filter_var($ocupacion, FILTER_SANITIZE_STRING);
  $updateHC_ocupacion = $conn->prepare("UPDATE `hc` SET ocupacion = ? WHERE token = ? ");
  $updateHC_ocupacion->execute([$ocupacion,$token]); 
  //direccion
  $direccion = $_POST['direccion'];
  $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);
  $updateHC_direccion = $conn->prepare("UPDATE `hc` SET direccion = ? WHERE token = ? ");
  $updateHC_direccion->execute([$direccion,$token]);  


  
  

    //numHC
    $numHC = $_POST['numHC'];
    $numHC = filter_var($numHC, FILTER_SANITIZE_STRING);
    $updateHC_numHC = $conn->prepare("UPDATE `hc` SET numHC = ? WHERE token = ? ");
    $updateHC_numHC->execute([$numHC,$token]);  
    //fechaAtencion
    $fechaAtencion = $_POST['fechaAtencion'];
    $fechaAtencion = filter_var($fechaAtencion, FILTER_SANITIZE_STRING);
    $updateHC_fechaAtencion = $conn->prepare("UPDATE `hc` SET fechahoraatencion = ? WHERE token = ? ");
    $updateHC_fechaAtencion->execute([$fechaAtencion,$token]); 
    //fechaHC
    $fechaHC = $_POST['fechaHC'];
    $fechaHC = filter_var($fechaHC, FILTER_SANITIZE_STRING);
    $updateHC_fechaHC = $conn->prepare("UPDATE `hc` SET fechaapertura = ? WHERE token = ? ");
    $updateHC_fechaHC->execute([$fechaHC,$token]);  


  //tiempoEnfermedad
  $tiempoEnfermedad = $_POST['tiempoEnfermedad'];
  $tiempoEnfermedad = filter_var($tiempoEnfermedad, FILTER_SANITIZE_STRING);
  $updateHC_tiempoEnfermedad = $conn->prepare("UPDATE `hc` SET tiempoEnfermedad = ? WHERE token = ? ");
  $updateHC_tiempoEnfermedad->execute([$tiempoEnfermedad,$token]);  
  //signosSintomas
  $signosSintomas = $_POST['signosSintomas'];
  $signosSintomas = filter_var($signosSintomas, FILTER_SANITIZE_STRING);
  $updateHC_signosSintomas = $conn->prepare("UPDATE `hc` SET signosSintomas = ? WHERE token = ? ");
  $updateHC_signosSintomas->execute([$signosSintomas,$token]);   
  //relatosCronologicos
  $relatosCronologicos = $_POST['relatoCronologico'];
  $relatosCronologicos = filter_var($relatosCronologicos, FILTER_SANITIZE_STRING);
  $updateHC_ = $conn->prepare("UPDATE `hc` SET relatosCronologicos = ? WHERE token = ? ");
  $updateHC_->execute([$relatosCronologicos,$token]);  
  //funcionesBiologicas
  $funcionesBiologicas = $_POST['funcionesBiologicas'];
  $funcionesBiologicas = filter_var($funcionesBiologicas, FILTER_SANITIZE_STRING);
  $updateHC_funcionesBiologicas = $conn->prepare("UPDATE `hc` SET funcionesBiologicas = ? WHERE token = ? ");
  $updateHC_funcionesBiologicas->execute([$funcionesBiologicas,$token]); 
  //antFamiliares
  $antFamiliares = $_POST['antecedentesFamiliares'];
  $antFamiliares = filter_var($antFamiliares, FILTER_SANITIZE_STRING);
  $updateHC_antFamiliares = $conn->prepare("UPDATE `hc` SET antFamiliares = ? WHERE token = ? ");
  $updateHC_antFamiliares->execute([$antFamiliares,$token]);  
  //antPersonales
  $antPersonales = $_POST['antecedentesPersonales'];
  $antPersonales = filter_var($antPersonales, FILTER_SANITIZE_STRING);
  $updateHC_antPersonales = $conn->prepare("UPDATE `hc` SET antPersonales = ? WHERE token = ? ");
  $updateHC_antPersonales->execute([$antPersonales,$token]); 
  //presionArterial  
  $presionArterial = $_POST['pa'];
  $presionArterial = filter_var($presionArterial, FILTER_SANITIZE_STRING);
  $updateHC_presionArterial = $conn->prepare("UPDATE `hc` SET presionArterial = ? WHERE token = ? ");
  $updateHC_presionArterial->execute([$presionArterial,$token]); 

  //pulso
  $pulso = $_POST['pulso'];
  $pulso = filter_var($pulso, FILTER_SANITIZE_STRING);
  $updateHC_pulso = $conn->prepare("UPDATE `hc` SET pulso = ? WHERE token = ? ");
  $updateHC_pulso->execute([$pulso,$token]);  
  //temperatura
  $temperatura = $_POST['temperatura'];
  $temperatura = filter_var($temperatura, FILTER_SANITIZE_STRING);
  $updateHC_temperatura = $conn->prepare("UPDATE `hc` SET temperatura = ? WHERE token = ? ");
  $updateHC_temperatura->execute([$temperatura,$token]);  
  //frecCardiaca
  $frecCardiaca = $_POST['frecCardiaca'];
  $frecCardiaca = filter_var($frecCardiaca, FILTER_SANITIZE_STRING);
  $updateHC_frecCardiaca = $conn->prepare("UPDATE `hc` SET frecCardiaca = ? WHERE token = ? ");
  $updateHC_frecCardiaca->execute([$frecCardiaca,$token]); 
  //frecRespiratoria
  $frecRespiratoria = $_POST['frecRespiratoria'];
  $frecRespiratoria = filter_var($frecRespiratoria, FILTER_SANITIZE_STRING);
  $updateHC_frecRespiratoria = $conn->prepare("UPDATE `hc` SET frecRespiratoria = ? WHERE token = ? ");
  $updateHC_frecRespiratoria->execute([$frecRespiratoria,$token]); 
  //examenClinicoGeneral
  $examenClinicoGeneral = $_POST['examenClinicoGeneral'];
  $examenClinicoGeneral = filter_var($examenClinicoGeneral, FILTER_SANITIZE_STRING);
  $updateHC_examenClinicoGeneral = $conn->prepare("UPDATE `hc` SET examenClinicoGeneral = ? WHERE token = ? ");
  $updateHC_examenClinicoGeneral->execute([$examenClinicoGeneral,$token]); 
  //odontoestomatologico
  $odontoestomatologico = $_POST['odontoestomatologico'];
  $odontoestomatologico = filter_var($odontoestomatologico, FILTER_SANITIZE_STRING);
  $updateHC_odontoestomatologico = $conn->prepare("UPDATE `hc` SET odontoestomatologico = ? WHERE token = ? ");
  $updateHC_odontoestomatologico->execute([$odontoestomatologico,$token]); 
  //estadoHigieneBucal
  $estadoHigieneBucal = $_POST['estadosHigieneBucal'];
  $estadoHigieneBucal = filter_var($estadoHigieneBucal, FILTER_SANITIZE_STRING);
  $updateHC_estadoHigieneBucal = $conn->prepare("UPDATE `hc` SET estadoHigieneBucal = ? WHERE token = ? ");
  $updateHC_estadoHigieneBucal->execute([$estadoHigieneBucal,$token]); 

  //presenciaSarro
  $presenciaSarro = $_POST['presenciaSarro'];
  $presenciaSarro = filter_var($presenciaSarro, FILTER_SANITIZE_STRING);
  $updateHC_presenciaSarro = $conn->prepare("UPDATE `hc` SET presenciaSarro = ? WHERE token = ? ");
  $updateHC_presenciaSarro->execute([$presenciaSarro,$token]);   
  //enfermedadPeriodontal
  $enfermedadPeriodontal = $_POST['enfermedadPeriodontal'];
  $enfermedadPeriodontal = filter_var($enfermedadPeriodontal, FILTER_SANITIZE_STRING);
  $updateHC_enfermedadPeriodontal = $conn->prepare("UPDATE `hc` SET enfermedadPeriodontal = ? WHERE token = ? ");
  $updateHC_enfermedadPeriodontal->execute([$enfermedadPeriodontal,$token]); 
  //diagnosticoPresuntivo
  $diagnosticoPresuntivo = $_POST['diagnosticoPresuntivo'];
  $diagnosticoPresuntivo = filter_var($diagnosticoPresuntivo, FILTER_SANITIZE_STRING);
  $updateHC_diagnosticoPresuntivo = $conn->prepare("UPDATE `hc` SET diagnosticoPresuntivo = ? WHERE token = ? ");
  $updateHC_diagnosticoPresuntivo->execute([$diagnosticoPresuntivo,$token]);  
  //diagnosticoDefinitivo
  $diagnosticoDefinitivo = $_POST['diagnosticoDefinitivo'];
  $diagnosticoDefinitivo = filter_var($diagnosticoDefinitivo, FILTER_SANITIZE_STRING);
  $updateHC_diagnosticoDefinitivo = $conn->prepare("UPDATE `hc` SET diagfinal = ? WHERE token = ? ");
  $updateHC_diagnosticoDefinitivo->execute([$diagnosticoDefinitivo,$token]); 
  //tratamiento  
  $tratamiento = $_POST['tratamiento'];
  $tratamiento = filter_var($tratamiento, FILTER_SANITIZE_STRING);
  $updateHC_tratamiento = $conn->prepare("UPDATE `hc` SET tratamiento = ? WHERE token = ? ");
  $updateHC_tratamiento->execute([$tratamiento,$token]);  

  //observaciones
  $observaciones = $_POST['observaciones'];
  $observaciones = filter_var($observaciones, FILTER_SANITIZE_STRING);
  $updateHC_observaciones = $conn->prepare("UPDATE `hc` SET observaciones = ? WHERE token = ? ");
  $updateHC_observaciones->execute([$observaciones,$token]);  


 
    

  $headerAfterUpdatePatientHC='location:paciente_id.php?pid='.$paciente_ID.'&modal=historia_clinica';
  header($headerAfterUpdatePatientHC);
  }  
}






?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="../node_modules/flowbite/dist/flowbite.css">
    <link rel="icon" type="image/x-icon" href="../images/imgLogo/favicon.png">

</head>
<body>
<script>
// PREVENT RESEND FORMS
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>
<!-- component -->  
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white  text-black ">
      <?php
        include '../components/dashboard/dashboard-header.php';
      ?>
     

      <!--INICIA CONTENIDO-->    
      <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
      <div id="successUploadedImgModal"></div>

   



       <!--SUBMIT IMG ODONTOGRAMA-->
       <?php
        if(isset($_POST['uploadImgOdontograma'])){           
          $pacienteId=$_POST['id'];
          date_default_timezone_set('America/New_York');
          $now=date("Y-m-d H:i");     
          $dayMonth=date('m-d');
          $randomvar=bin2hex(random_bytes(8));
          $imagen1 = $_FILES['imgOdontograma']['name'];
          $imagen1='odontograma-'.$dayMonth.'-'.$pacienteId.'-'.$randomvar.'-'.$imagen1;
          $imagen1 = filter_var($imagen1, FILTER_SANITIZE_STRING);
          $imagen_size1 = $_FILES['imgOdontograma']['size'];
          $imagen_tmp_name1 = $_FILES['imgOdontograma']['tmp_name'];
          $imagen_folder1 = './odontogram/screenshots/'.$imagen1;              
          if($imagen_size1 > 2000000 ){
            echo'<script>document.getElementById("successUploadedImgModal").innerHTML=` <div id="toast-success" class=" mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Imagen muy grande </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>`</script>               
            ';  
        }else{
            move_uploaded_file($imagen_tmp_name1, $imagen_folder1);
            $insert_product = $conn->prepare("INSERT INTO `odontogramas`(pacienteId,clinicaId,imagen,fecha) VALUES(?,?,?,?)");
            $insert_product->execute([$pacienteId,$user_id,$imagen1,$now]);
            echo'<script>document.getElementById("successUploadedImgModal").innerHTML=` <div id="toast-success" class=" mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Imagen subida exitosamente</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>`</script>               
            ';     
        }
        }
      ?>


       <!--SUBMIT DOC Consentimiento-->
       <?php
        if(isset($_POST['uploadDocConsentimiento'])){           
          $pacienteId=$_POST['id'];
          date_default_timezone_set('America/New_York');
          $now=date("Y-m-d H:i");     
          $dayMonth=date('m-d');
          $randomvar=bin2hex(random_bytes(8));

          $nombreTratamiento=$_POST['nombreTratamiento'];
          $docConsentimiento = $_FILES['docConsentimiento']['name'];
          $docConsentimiento='consentimiento-'.$dayMonth.'-'.$pacienteId.'-'.$randomvar.'-'.$docConsentimiento;
          $docConsentimiento = filter_var($docConsentimiento, FILTER_SANITIZE_STRING);
          $docConsentimiento_size1 = $_FILES['docConsentimiento']['size'];
          $docConsentimiento_tmp_name1 = $_FILES['docConsentimiento']['tmp_name'];
          $docConsentimiento_folder1 = './consentimientos/'.$docConsentimiento;              
          if($docConsentimiento_size1 > 2000000 ){
            echo'<script>document.getElementById("successUploadedImgModal").innerHTML=` <div id="toast-success" class=" mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Documento muy grande</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>`</script>               
            ';  
        }else{
            move_uploaded_file($docConsentimiento_tmp_name1, $docConsentimiento_folder1);
            $insert_product = $conn->prepare("INSERT INTO `consentimientos`(pacienteId,clinicaId,nombreTratamiento,doc,fecha) VALUES(?,?,?,?,?)");
            $insert_product->execute([$pacienteId,$user_id,$nombreTratamiento,$docConsentimiento,$now]);
            echo'<script>document.getElementById("successUploadedImgModal").innerHTML=` <div id="toast-success" class=" mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Consentimiento subido exitosamente</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>`</script>               
            ';     
        }
        }
      ?>


       <!--SUBMIT DOC HC-->
       <?php
        if(isset($_POST['uploadDocHC'])){           
          $pacienteId=$_POST['id'];
          date_default_timezone_set('America/New_York');
          $now=date("Y-m-d H:i");     
          $dayMonth=date('m-d');
          $randomvar=bin2hex(random_bytes(8));

          $nombreHC=$_POST['nombreHC'];
          $docHC = $_FILES['docHC']['name'];
          $docHC='hc-'.$dayMonth.'-'.$pacienteId.'-'.$randomvar.'-'.$docHC;
          $docHC = filter_var($docHC, FILTER_SANITIZE_STRING);
          $docHC_size1 = $_FILES['docHC']['size'];
          $docHC_tmp_name1 = $_FILES['docHC']['tmp_name'];
          $docHC_folder1 = './hcdocs/'.$docHC;              
          if($docHC_size1 > 2000000 ){
            echo'<script>document.getElementById("successUploadedImgModal").innerHTML=` <div id="toast-success" class=" mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Documento muy grande</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>`</script>               
            ';  
        }else{
            move_uploaded_file($docHC_tmp_name1, $docHC_folder1);
            $insert_hc = $conn->prepare("INSERT INTO `hcdocs`(pacienteId,clinicaId,nombrehc,doc,fecha) VALUES(?,?,?,?,?)");
            $insert_hc->execute([$pacienteId,$user_id,$nombreHC,$docHC,$now]);
            echo'<script>document.getElementById("successUploadedImgModal").innerHTML=` <div id="toast-success" class=" mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Historia clínica subido exitosamente</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>`</script>               
            ';     
            header('Location:paciente_id.php?pid='.$pacienteId.'&modal=historia_clinica');
        }
        }
      ?>

  
<?php
      if(isset($_GET['pid'])){

        if(isset($_GET['modal'])){
          if($_GET['modal']=="historia_clinica"){
              $ariaHistoriaClinica='true';
                }
                else{
                  $ariaHistoriaClinica='false';
                }
          if($_GET['modal']=="odontograma"){
                  $ariaOdontograma='true';
                }
                else{
                      $ariaOdontograma='false';
                }

          if($_GET['modal']=="consentimientos"){
                  $ariaConsentimientos='true';
                }
                else{
                      $ariaConsentimientos='false';
                }
          
          if($_GET['modal']=="recetas"){
                  $ariaRecetas='true';
                }
                else{
                      $ariaRecetas='false';
                }
          
  
        }

        


        $pid = $_GET['pid'];
        $select_paciente = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? AND clinica_id = ?");
        $select_paciente->execute([$pid,$user_id]);
        if($select_paciente->rowCount()>0){
          $fetch_paciente=$select_paciente->fetch(PDO::FETCH_ASSOC);

          $select_clinica=$conn->prepare("SELECT * FROM `usuarios` WHERE id = ?");
          $select_clinica->execute([$user_id]);
          $fetch_clinica=$select_clinica->fetch(PDO::FETCH_ASSOC);
  
          //fetch hc
          $tokenHC=$fetch_paciente['token'];
          $select_hc=$conn->prepare("SELECT * FROM `hc` WHERE clinica_id = ? AND token = ?");
          $select_hc->execute([$user_id,$tokenHC]);
          $fetch_hc=$select_hc->fetch(PDO::FETCH_ASSOC);

        }
       


      if($select_paciente->rowCount()> 0 ){

        ?>
         
              <div class="flex justify-center py-2">
                      <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600  md:mr-0 focus:ring-4 focus:ring-gray-100  " type="button">
                          <span class="sr-only">Open user menu</span>
                          <?php 
                              if($fetch_paciente['sexo']=='Hombre'){
                                echo '<img src="./imgAvatar/man.png" class="w-6 h-6 mr-2"> ';
                              }else{
                                echo '<img src="./imgAvatar/woman.png" class="w-6 h-6 mr-2"> ';
                              }
                              
                              ?>                          
                              <?=$fetch_paciente['nombrePaciente'];?>
                      </button>
              </div>

              <div class="mb-4 flex justify-center border-b-2  border-gray-200 ">



              



                  <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                      <li class="mr-2" role="presentation">
                      

                            <button class="inline-flex p-4  rounded-t-lg hover:text-gray-600 hover:border-gray-300  group" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> 
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 " fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                        </svg>                          



                                    <span>Info</span>
                                </button>

                      


                      </li>
                      <li class="mr-2" role="presentation">
                      <!-- <a href="paciente_id.php?pid=<?php// echo $fetch_paciente['id'];?>&modal=historia_clinica"> 
                      </a> -->
                        <button class="inline-flex p-4  rounded-t-lg hover:text-gray-600 hover:border-gray-300  group" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="<?=$ariaHistoriaClinica ;?>"> 
                          <svg aria-hidden="true" class="w-5 h-5 mr-2 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                          



                          <span>Historia Clinica</span>
                      </button>
                            
                      </li>

                      <li class="mr-2" role="presentation">
                         <button class="inline-flex p-4  border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300  group" id="odontograma-tab" data-tabs-target="#odontograma" type="button" role="tab" aria-controls="odontograma" aria-selected="<?=$ariaOdontograma ;?>"> 
                          <svg class="w-5 h-5 mr-2 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Layer_1" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                          <path id="Tooth_2_" d="M54.3148651,5.0702143c-3.5253983-3.6377001-8.4227982-5.4512-13.472599-4.9921999  c-0.0372009,0.001-0.0762024,0.0019-0.1133003,0.0049c-1.6397018,0.1611-3.1631012,0.8252-4.6366997,1.4687001  c-1.5165901,0.6621001-2.9492989,1.2871001-4.3290997,1.2871001c-1.3838005,0-2.8124886-0.6259-4.325201-1.289  c-1.4619999-0.6407-2.9736996-1.3028001-4.6035995-1.4668001c-4.9531002-0.501-9.7802,1.2636-13.2469997,4.8301001  c-3.4667997,3.5663996-5.0899,8.4393997-4.4550996,13.3592997c2.6244998,22.700201,4.4779992,36.6513977,5.5082994,41.4648972  c0.3237,1.5166016,1.9116001,3.8935013,3.9375,4.2256012c0.1352005,0.0223999,0.2915001,0.038002,0.4643002,0.038002  c0.8149996,0,1.9883118-0.3476028,2.9648991-1.9960022c1.4033012-2.3702011,2.6221008-5.642601,3.9131012-9.1083984  c2.6425991-7.0937996,5.6385994-15.1348,10.4218998-15.2110023c4.7490005,0.0956993,7.1541977,6.8535004,9.481411,13.3887024  c1.241188,3.4891968,2.4150009,6.785099,3.9677887,9.2782974c1.0332108,1.6611023,2.6805992,2.4815025,4.4179001,2.1826019  c1.5683975-0.2656021,2.8788986-1.4121017,3.1875-2.7881012c1.3194008-5.8711014,3.6992989-25.5126991,5.4638977-40.9589005  C59.5199661,13.7323141,57.863678,8.7323141,54.3148651,5.0702143z M56.8773651,18.537014  c-0.0009995,0.0058002-0.0018997,0.0107002-0.0018997,0.0165997c-1.7597885,15.3984013-4.1299019,34.9697037-5.4296989,40.7557983  c-0.1319008,0.5849991-0.8067017,1.125-1.5703011,1.2538986c-0.5381012,0.0938034-1.5665016,0.0479012-2.3867874-1.267498  c-1.4384117-2.3106003-2.5761108-5.5078011-3.7812119-8.8916016c-2.5546989-7.1758003-5.1953011-14.594799-11.3604012-14.7187996  c-6.1854992,0.0986023-9.4344997,8.8194008-12.3006992,16.5126991c-1.2588005,3.3799019-2.4482994,6.5713005-3.7598,8.7871017  c-0.6640997,1.1231003-1.2060995,1.0321999-1.3852997,1.0038986c-0.9515886-0.1562004-2.0815001-1.6229973-2.3046999-2.669899  c-1.0028887-4.6855011-2.8973999-18.9589996-5.4794002-41.2900009c-0.5576997-4.3233004,0.8652-8.5957003,3.9043002-11.7217007  c2.7005997-2.7793,6.3442106-4.3066998,10.1683989-4.3066998c0.4794998,0,0.9619007,0.0235,1.4453011,0.0723002  c1.3155117,0.1317999,2.6191998,0.7031,4,1.3085999c0.6203995,0.2716999,1.2488995,0.5463998,1.8883991,0.7834997  c0.0491123,0.0377002,0.0876999,0.0852003,0.1448002,0.1140003l9.9726982,5.0399995  c0.1445007,0.0732002,0.2988014,0.1073999,0.4502029,0.1073999c0.3652,0,0.7176971-0.2001991,0.8934975-0.5487995  c0.2490997-0.4932003,0.0517998-1.0946999-0.4413986-1.3438001l-5.8496017-2.9555998  c1.0969124-0.2781,2.1592026-0.7402,3.1992035-1.1938002c1.375-0.6006,2.6738968-1.1670001,3.88871-1.3016999  c0.04879,0.0028999,0.0966873,0.0009999,0.1454887-0.0039001c4.4755974-0.4395,8.827198,1.1601,11.952198,4.3838  C56.0013657,9.6854143,57.4593658,14.0868139,56.8773651,18.537014z"/>
                          </svg>            



                          <span>Odontograma</span>
                          </button>
                      </li>
                      <li class="mr-2" role="presentation">
                          <button class="inline-flex p-4  rounded-t-lg hover:text-gray-600 hover:border-gray-300 " id="consentimientos-tab" data-tabs-target="#consentimientos" type="button" role="tab" aria-controls="consentimientos" aria-selected="<?=$ariaConsentimientos ;?>"> 
                          <svg class="w-5 h-5 mr-2 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Layer_1" viewBox="0 0 512.003 512.003" xml:space="preserve">
                                <g>
                                  <g>
                                    <path d="M102.403,0.002c-42.351,0-76.8,34.449-76.8,76.8c0,42.351,34.449,76.8,76.8,76.8c42.351,0,76.8-34.449,76.8-76.8    C179.203,34.451,144.754,0.002,102.403,0.002z M102.403,128.002c-28.279,0-51.2-22.921-51.2-51.2s22.921-51.2,51.2-51.2    s51.2,22.921,51.2,51.2S130.683,128.002,102.403,128.002z"/>
                                  </g>
                                </g>
                                <g>
                                  <g>
                                    <path d="M384.003,0.002c-42.351,0-76.8,34.449-76.8,76.8c0,42.351,34.449,76.8,76.8,76.8s76.8-34.449,76.8-76.8    C460.803,34.451,426.354,0.002,384.003,0.002z M384.003,128.002c-28.279,0-51.2-22.921-51.2-51.2s22.921-51.2,51.2-51.2    c28.279,0,51.2,22.921,51.2,51.2S412.283,128.002,384.003,128.002z"/>
                                  </g>
                                </g>
                                <g>
                                  <g>
                                    <path d="M486.403,325.122h-3.302l-22.707-124.894c-2.219-12.177-12.817-21.026-25.19-21.026h-102.4    c-5.811,0-11.452,1.98-15.991,5.606L255.73,233.67l-89.429-51.106c-3.866-2.202-8.243-3.362-12.698-3.362h-102.4    c-12.373,0-22.972,8.849-25.19,21.026l-25.6,140.8c-1.357,7.467,0.666,15.155,5.53,20.983c4.872,5.82,12.066,9.19,19.661,9.19    h16.358l9.327,117.231c1.058,13.303,12.169,23.569,25.515,23.569h51.2c13.355,0,24.465-10.266,25.515-23.569l11.196-140.8    l6.485-63.394l63.778,21.606c2.688,0.913,5.461,1.357,8.226,1.357c4.437,0,8.738-1.408,12.638-3.652    c3.994,2.355,8.448,3.652,12.962,3.652c3.678,0,7.364-0.794,10.795-2.389l35.985-16.742l6.153,60.134l11.145,140.22    c1.058,13.312,12.169,23.578,25.523,23.578h51.2c13.355,0,24.465-10.266,25.523-23.569l4.233-53.231h47.044    c14.14,0,25.6-11.46,25.6-25.6v-58.88C512.003,336.582,500.543,325.122,486.403,325.122z M243.203,281.602l-94.191-31.915    l-9.813,95.915l-11.196,140.8h-51.2l-11.196-140.8H25.603l25.6-140.8h38.4v77.875c0,7.074,5.726,12.8,12.8,12.8    c7.074,0,12.8-5.726,12.8-12.8v-77.875h38.4l89.6,51.2V281.602z M409.603,486.402h-51.2l-11.196-140.8l-9.813-95.915    l-68.591,31.915v-25.6l64-51.2h38.4v77.875c0,7.074,5.726,12.8,12.8,12.8c7.074,0,12.8-5.726,12.8-12.8v-77.875h38.4    l21.879,120.32h-52.599c-14.14,0-25.6,11.46-25.6,25.6v58.88c0,14.14,11.46,25.6,25.6,25.6h9.19L409.603,486.402z     M486.403,409.602h-81.92v-58.88h81.92V409.602z"/>
                                  </g>
                                </g>
                                </svg>
                          



                              <span>Consentimientos</span>
                          </button>
                       
                      </li>



                      <!-- <li class="mr-2" role="presentation">
                          <button class="inline-flex p-4  rounded-t-lg hover:text-gray-600 hover:border-gray-300 " id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="<?=$ariaRecetas ;?>"> 
                              <svg class="w-5 h-5 mr-2 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                              </svg>
                                                        <span>Recetas</span>
                          </button>
                      </li>
                      
                      
                      <li role="presentation">
                          <button class="inline-flex p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 " id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false"> 
                          <svg class="w-5 h-5 mr-2 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>

                          



                              <span>Estado de cuenta</span>
                          </button>
                      </li> -->
                  </ul>
              </div>
              <div id="myTabContent">
                  <div style="max-width:600px;" class="hidden   p-4 mx-auto" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                  
                      <form action=""  method="post" class="p-8 rounded-lg  bg-gray-50 ">
                          <div class="grid gap-6 mb-6 md:grid-cols-2">
                              <div>

                                  <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Nombres</label>
                                  <input type="name" name="nombrePaciente"  value="<?=$fetch_paciente['nombrePaciente'];?>"id="nombrePaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Susana Mendoza" required>
                              </div>
                              <input hidden  type="text" name="sexo" value="<?=$fetch_paciente['sexo'];?>" > 
                              
                              <div>
                                  <label for="telefonoPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Telefono</label>
                                  <input type="tel" name="telefonoPaciente"value="<?=$fetch_paciente['telefonoPaciente'];?>"id="telefonoPaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="913411231" required>
                              </div>  
                              <div>
                                  <label for="edadPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Edad</label>
                                  <input type="age" name="edadPaciente" id="edadPaciente"  value="<?=$fetch_paciente['edadPaciente'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="12"  required>
                              </div>
                              <div>
                                  <label for="ciudadPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Ciudad</label>
                                  <input type="city" name="ciudadPaciente" id="ciudadPaciente" value="<?=$fetch_paciente['ciudadPaciente'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Huancavelica" >
                              </div>
                              <div>
                                  <label for="emailPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                  <input type="email" name="emailPaciente" id="emailPaciente"  value="<?=$fetch_paciente['correo'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="godoy@gmail.com"  >
                              </div>
                              <div>
                                  <label for="dniPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Dni</label>
                                  <input type="text" name="dniPaciente" id="dniPaciente" value="<?=$fetch_paciente['dni'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="71102387" required>
                              </div>   
                              <div>
                                  <label for="fechaNacimientopaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha Nacimiento</label>
                                  <input type="date" name="fechaNacimientopaciente" id="fechaNacimientopaciente" value="<?=$fetch_paciente['fechaNacimiento'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                              </div>
                              <div>
                                  <label for="lugarNacimiento" class="block mb-2 text-sm font-medium text-gray-900 ">Lugar de Nacimiento</label>
                                  <input type="text" name="lugarNacimiento" id="lugarNacimiento" value="<?=$fetch_paciente['lugarNacimiento'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Cerro de Pasco - Villa Rica" >
                              </div>

                              <div>
                                  <label for="ocupacionPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Ocupación</label>
                                  <input type="text" name="ocupacionPaciente" id="ocupacionPaciente" value="<?=$fetch_paciente['ocupacion'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Abogado" >
                              </div>
                              <div>
                                  <label for="direccionPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Dirección</label>
                                  <input type="text" name="direccionPaciente"  id="direccionPaciente" value="<?=$fetch_paciente['direccion'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Av. Las Palmeras 556" >
                              
                                </div>
                              <div>
                                  <label for="tokenPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Token</label>
                                  <div class="flex gap-2 items-center">
                                        <input disabled type="password" name="tokenPaciente" id="tokenPaciente" value="<?=$fetch_paciente['token'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="71102387" required>
                                        <svg style="cursor:pointer" id="showHide" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                   </div>

                                 </div>        
                              <script>
                                  const token=document.getElementById("tokenPaciente");
                                  const showHide=document.getElementById("showHide");

                                  showHide.addEventListener('click',()=>{
                                    if(token.getAttribute('type')=="password"){
                                    token.setAttribute('type','text')
                                  }
                                  else{
                                    token.setAttribute('type','password')
                                  }

                                  })
                                  

                               
                               

                                
                                
                              
                              </script>
                        
                      </div>
                          <button type="submit" name="submitActualizarInfoPaciente" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   ">Actualizar</button>
                      </form>





                 </div>

                 <!--HISTORIA CLINICA-->
                  <div  class="   hidden p-4 rounded-lg " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

                  <div class="py-8 px-2 grid gap-4 grid-cols-1 md:grid-cols-2">
                    <div class=" mx-auto">
                            <div style="padding-bottom:3rem;max-width:400px"class="text-center text-medium  text-gray-500 ">Puedes elegir entre <strong class="font-medium text-gray-800 ">subir tu historia clínica</strong>

                                        
                                        o usar nuestro <strong class="font-medium text-gray-800 ">generador de historias clínicas</strong> con un formato general. La historia clínica que generes mediante nuestro formato general, se mantendra actualizado y puede ser descargado en pdf con el boton azul en la parte derecha inferior.
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data" style="max-width:400px">
                                        <input hidden name="id" type="text" value="<?=$fetch_paciente['id'];?>">
                                        <div class="">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 "  for="file_input">Subir historia clínica</label>
                                            <div class="flex flex-wrap  gap-2">

                                                <input name="docHC"  type="file" required  class="w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none   " aria-describedby="file_input_help" id="file_input" >
                                                <div class="relative w-full my-2 z-0">
                                                    <input type="text" id="floating_standard" name="nombreHC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none    focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                    <label for="floating_standard" class="absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Escribir nombre de H.C. (opcional)</label>
                                                </div>
                                                <button type="submit" name="uploadDocHC" class=" flex gap-2  justify-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                                                    <span>Subir</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                                  </svg>

                                                </button>
                                            
                                              </div>
                                        </div> 
                            </form>

                    </div>

                    <div class="relative pt-4  overflow-x-auto shadow-md  sm:rounded-lg">
                    <h2 class="p-2 text-center text-gray-600 ">Repositorio de historias clínicas subidas</h2>
                    <table class="w-full  text-sm text-left text-gray-500 ">
                              <thead  class="text-xs border-gray-200  border-b text-gray-700 uppercase  bg-gray-50  ">
                                  <tr>
                                      
                                      <th scope="col" class="px-6 py-3">
                                          
                                      </th>
                                                                            
                                      <th scope="col" class="px-6 py-3">
                                          Nombre
                                      </th>
                                      <th scope="col" class="px-6 py-3">
                                          Fecha
                                      </th>
                                      
                                      <th scope="col" class="px-6 py-3">
                                          Acción
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>

                              <?php
                              $showhcdocs = $conn->prepare("SELECT * FROM `hcdocs` WHERE pacienteId = ? ORDER BY fecha DESC");
                              $showhcdocs->execute([$fetch_paciente['id']]);
                              if($showhcdocs->rowCount() > 0){
                                
                                while ($fetchHCDocs = $showhcdocs->fetch(PDO::FETCH_ASSOC)) { 

                                  ?>

                                  <tr class="bg-white  hover:bg-gray-50 ">
                                      
                                      <td scope="row" class="flex tems-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                          <a  target="_blank" href="hcdocs/<?=$fetchHCDocs['doc'];?>">
                                            <div class="flex hover:text-blue-600 gap-2  items-center">
                                             <span>Ver documento</span>
                                              <svg fill="none" class="h-6 w-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                                              </svg> 
                                            </div>
                                          </a>
                                     
                                          
                                      </td>
                                      <td class="px-6 py-4">
                                        
                                      <?=$fetchHCDocs['nombreHC'];?>
                                        
                                      </td>
                                      
                                      <td class="px-6 py-4">
                                          <?=$fetchHCDocs['fecha'];?>
                                      </td>
                                  

                                      <td class="px-6 py-4">
                                      <button   data-modal-target="<?='delete-modal'.$fetchHCDocs['doc'];?>" data-modal-toggle="<?='delete-modal'.$fetchHCDocs['doc'];?>"  class="flex justify-start font-medium text-red-600  hover:underline">Eliminar</button>

                                                  
                                          
                                         
                                         

                                             
                                      </td>
                                  </tr>

                                  <!--MODAL-->
                                  <form action="" method="POST">
                                  <div id="<?='delete-modal'.$fetchHCDocs['doc'];?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <input  type="text" name="hcDocName" value="<?=$fetchHCDocs['doc'];?>" hidden >
                                      <input   type="text" name="idPaciente"  value="<?=$fetchHCDocs["pacienteId"];?>" hidden > 
                                      <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow ">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="<?='delete-modal'.$fetchHCDocs['doc'];?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">¿Seguro que quieres eliminar este consentimiento?</h3>
                                                    <button  type="submit" name="deletehcDoc"class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Sí, eliminar
                                                    </button>
                                                    <button data-modal-hide="<?='delete-modal'.$fetchHCDocs['doc'];?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10      ">No, cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    </form>

                                  <?php

                                  


                                  
                                }
                                  
                                }
                          ?>         
                                  </tbody>
                              </table>


                    </div>

                  </div>

                         


                     

                    <form  action="" method="POST" >
                        <h2 class="text-center text-gray-600  text-base md:text-xl pt-8 pb-4">Formato general de Historia clínica</h2>


                    <div class="grid gap-6 md:grid-cols-2">
                    <!--1-->

                      <div class="bg-gray-50  p-4  rounded-lg">
                      <div><h2 class="text-xl text-center pb-6 font-medium">Datos generales</h2></div>
                        <input type="hidden"   value="<?=$fetch_paciente['id'];?>"id="pacienteId" name="pacienteId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      "  required>
                        <input type="hidden"   value="<?=$fetch_paciente['clinica_id'];?>"id="clinicaId" name="clinicaId"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      "  required>
                        <input type="hidden"   value="<?=$fetch_paciente['token'];?>"id="token" name="token"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      "  required>
                        
                        <label for="name" class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Doctor a Cargo</label>
                        <label for="underline_select" class="sr-only">Underline select</label>
                       
                        <select name="doctor" id="underline_select" required class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                            <option  selected><?=$fetch_hc['doctor'];?></option>
                        <?php
                         $select_doctor= $conn->prepare("SELECT * FROM `doctores` WHERE clinica_id = ? ");
                         $select_doctor->execute([$user_id]);    
                         
                            while($fetch_doctor = $select_doctor->fetch(PDO::FETCH_ASSOC)){

                        ?>
                            <option  value="<?=$fetch_doctor['nombre'];?>"><?=$fetch_doctor['nombre'];?></option>
                            <?php
                            }
                            ?>
                           
                        </select>



                        <div class="mb-6">
                            <label for="nombresPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Nombres y apellidos</label>
                            <input  type="hidden"   value="<?=$fetch_paciente['nombrePaciente'];?>"id="nombresPaciente"  name="nombresPaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Robert Carvajar Espinoza" >
                            <div  style="min-height:2.5rem"   class="bg-gray-50 border h-auto border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Robert Carvajar Espinoza" ><?=$fetch_paciente['nombrePaciente'];?></div>

                        </div> 
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="dni12" class="block mb-2 text-sm font-medium text-gray-900 ">DNI</label>
                                <input  type="hidden" name="dni12"  value="<?=$fetch_paciente['dni'];?>" maxlength="8" minlength="8"  id="dni" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                                <div  style="min-height:2.5rem"  class="bg-gray-50 border h-auto border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " ><?=$fetch_paciente['dni'];?></div>

                            </div>
                            <div>
                                <label for="numHC" class="block mb-2 text-sm font-medium text-gray-900 ">N° HC</label>
                                <input type="number"  id="numHC" name="numHC" value="<?=$fetch_hc['numhc'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="12" >
                                 
                              </div>
                           <?php
                            date_default_timezone_set('America/New_York');

                            $now=date("Y-m-d H:i");                        

                           ?>
                              
                            <div>
                                <label for="fechaAtencion" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha y hora de atención</label>
                                <input type="datetime-local"  id="fechaAtencion" name="fechaAtencion" value="<?=$fetch_hc['fechahoraatencion'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " >
                            </div>  
                            <div>
                                <label for="fechaHC" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha apertura de h.c.</label>
                                <input type="date" id="fechaHC" name="fechaHC" value="<?=$fetch_hc['fechaapertura'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="123-45-678"  >
                            </div>

                            <div>
                                <label for="sexo12" class="block mb-2 text-sm font-medium text-gray-900 ">Sexo</label>
                                <input  name="sexo12"  type="hidden"  value="<?=$fetch_paciente['sexo'];?>" id="sexo12" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Hombre" >
                                <div   style="min-height:2.5rem"  class="bg-gray-50 border h-auto border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " ><?=$fetch_paciente['sexo'];?></div>

                            </div>  
                            <div>
                                <label for="edadPacienteHC" class="block mb-2 text-sm font-medium text-gray-900 ">Edad</label>
                                <input  type="hidden"  value="<?=$fetch_paciente['edadPaciente'];?>"id="edadPacienteHC" name="edadPacienteHC"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="12"  >
                                <div  style="min-height:2.5rem" class="bg-gray-50 border border-gray-300 h-auto text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      "  ><?=$fetch_paciente['edadPaciente'];?></div>

                            </div>
                            <div>
                                <label for="lugarNacimiento" class="block mb-2 text-sm font-medium text-gray-900 ">Lugar de Nacimiento</label>
                                <input  type="hidden" id="lugarNacimiento" value="<?=$fetch_paciente['lugarNacimiento'];?>" name="lugarNacimiento"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  >
                                <div  style="min-height:2.5rem" class="bg-gray-50 border border-gray-300 h-auto text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " ><?=$fetch_paciente['lugarNacimiento'];?></div>

                            </div>
                            <div>
                                <label for="fechaNacimiento" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha Nacimiento</label>
                               
                                <input  type="hidden" id="fechaNacimiento" value="<?=$fetch_paciente['fechaNacimiento'];?>" name="fechaNacimiento"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  >
                                <div style="min-height:2.5rem" class="bg-gray-50 border border-gray-300 h-auto text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " ><?=$fetch_paciente['fechaNacimiento'];?></div>

                            </div>

                            <div>
                                <label for="ocupacion" class="block mb-2 text-sm font-medium text-gray-900 ">Ocupación</label>
                                <input     type="hidden" name="ocupacion" value="<?=$fetch_paciente['ocupacion'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " / >
                                <div style="min-height:2.5rem" class="bg-gray-50 border border-gray-300 h-auto text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  ><?=$fetch_paciente['ocupacion'];?></div>

                            </div>
                            <input hidden type="text" name="direccion" value="<?=$fetch_paciente['direccion'];?>">
                            <div>
                                <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 ">Dirección</label>
                                <div   type="hidden" style="min-height:2.5rem" name="direccionPaciente"  class="bg-gray-50 h-auto border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      "  ><?=$fetch_paciente['direccion'];?></div>

                                <input   type="hidden" name="direccionPaciente" value="<?=$fetch_paciente['direccion'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  />
                            </div>

                            
                      </div>

                      </div>
                      <!--2-->
                      <div class="bg-gray-50  p-4  rounded-lg">
                      <div><h2 class="text-center text-xl py-6 font-medium">Enfermedad Actual</h2></div>
                      <div class="mb-6">
                            <label for="tiempoEnfermedad" class="block mb-2 text-sm font-medium text-gray-900 ">Tiempo de enfermedad</label>
                            <input type="text"   id="tiempoEnfermedad" value="<?=$fetch_hc['tiempoEnfermedad'];?>" name="tiempoEnfermedad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                        </div> 
                        <div class="mb-6">
                            <label for="signosSintomas" class="block mb-2 text-sm font-medium text-gray-900 ">Signos y síntomas principales</label>
                            <input type="text"  id="signosSintomas"  name="signosSintomas" value="<?=$fetch_hc['signosSintomas'];?>"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                        </div> 
                        <div class="mb-6">
                            <label for="relatoCronologico" class="block mb-2 text-sm font-medium text-gray-900 ">Relatos cronológico</label>
                            <input type="text"  id="relatoCronologico"  name="relatoCronologico" value="<?=$fetch_hc['relatosCronologicos'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                        </div> 
                        <div class="mb-6">
                            <label for="funcionesBiologicas" class="block mb-2 text-sm font-medium text-gray-900 ">Funciones biológicas</label>
                            <input type="name"   id="funcionesBiologicas"  name="funcionesBiologicas" value="<?=$fetch_hc['funcionesBiologicas'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                        </div> 

                        
                        <div><h2 class="text-center text-xl py-6 font-medium">Antecedentes</h2></div>
                      <div class="mb-6">
                            <label for="antecedentesFamiliares" class="block mb-2 text-sm font-medium text-gray-900 ">Antecedentes familiares</label>
                            <input type="text"   id="antecedentesFamiliares"  name="antecedentesFamiliares" value="<?=$fetch_hc['antFamiliares'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                        </div> 
                        <div class="mb-6">
                            <label for="antecedentesPersonales" class="block mb-2 text-sm font-medium text-gray-900 ">Antecedentes personales</label>
                            <input type="text"  id="antecedentesPersonales"  name="antecedentesPersonales"  value="<?=$fetch_hc['antPersonales'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                        </div> 



                      </div>
                      <!--3-->
                      <div class="bg-gray-50  p-4 rounded-lg">
                      <div><h2 class="text-center text-xl py-6 font-medium">Exploración fisica</h2></div>
                      
                      <h3 class=" py-6 text-center  font-medium">Signos vitales</h3>
                      <div class="grid gap-6 mb-6 md:grid-cols-2">
                          <div>
                              <label for="pa" class="block mb-2 text-sm font-medium text-gray-900 ">Presión arterial</label>
                              <input type="text"  name="pa" id="pa"value="<?=$fetch_hc['presionArterial'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                          </div>
                          <div>
                              <label for="pulso" class="block mb-2 text-sm font-medium text-gray-900 ">Pulso</label>
                              <input type="text"  id="pulso" name="pulso" value="<?=$fetch_hc['pulso'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="" >
                          </div>
                                                   
                          <div>
                              <label for="temperatura" class="block mb-2 text-sm font-medium text-gray-900 ">Temperatura</label>
                              <input  type="numer"  id="temperatura" name="temperatura" value="<?=$fetch_hc['temperatura'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  >
                          </div>
                          <div>
                              <label for="frecCardiaca" class="block mb-2 text-sm font-medium text-gray-900 ">Frec. cardiaca</label>
                              <input    id="frecCardiaca"  name="frecCardiaca" value="<?=$fetch_hc['frecCardiaca'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  >
                          </div>
                          <div>
                              <label for="frecRespiratoria" class="block mb-2 text-sm font-medium text-gray-900 ">Frec. respiratoria</label>
                              <input   id="frecRespiratoria"  name="frecRespiratoria" value="<?=$fetch_hc['frecRespiratoria'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  >
                          </div>                            
                    </div>
                      <div class="grid gap-6 mb-6 md:grid-cols-1">

                          <div>
                              <label for="examenClinicoGeneral" class="block mb-2 text-sm font-medium text-gray-900 ">Exámen clinico general</label>
                              <textarea   type="text" id="examenClinicoGeneral"  name="examenClinicoGeneral" value=""class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  ><?=$fetch_hc['examenClinicoGeneral'];?></textarea>
                          </div>

                          <div>
                              <label for="odontoestomatologico" class="block mb-2 text-sm font-medium text-gray-900 ">Odontoestomatológico</label>
                              <textarea  type="text"  id="odontoestomatologico"  name="odontoestomatologico" value=""class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  ><?=$fetch_hc['odontoestomatologico'];?></textarea>
                          </div>
                      </div>

                      
                            <h3 class="mb-4 font-semibold text-gray-900 ">Estado de la higiene bucal</h3>

                         
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex   ">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                                    <div class="flex items-center pl-3">
                                        <input id="horizontal-list-radio-license" <?php if($fetch_hc['estadoHigieneBucal']=="Muy bueno"){ echo "checked";};?> type="radio" value="Muy bueno" name="estadosHigieneBucal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2  ">
                                        <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Muy bueno </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                                    <div class="flex items-center pl-3">
                                        <input id="horizontal-list-radio-id"  <?php if($fetch_hc['estadoHigieneBucal']=="Bueno"){ echo "checked";};?> type="radio" value="Bueno" name="estadosHigieneBucal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2  ">
                                        <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Bueno</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                                    <div class="flex items-center pl-3">
                                        <input id="horizontal-list-radio-millitary"  <?php if($fetch_hc['estadoHigieneBucal']=="Deficiente"){ echo "checked";};?> type="radio" value="Deficiente" name="estadosHigieneBucal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2  ">
                                        <label for="horizontal-list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Deficiente</label>
                                    </div>
                                </li>
                                <li class="w-full ">
                                    <div class="flex items-center pl-3">
                                        <input id="horizontal-list-radio-passport" <?php if($fetch_hc['estadoHigieneBucal']=="Malo"){ echo "checked";};?> type="radio" value="Malo" name="estadosHigieneBucal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500    focus:ring-2  ">
                                        <label for="horizontal-list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Malo</label>
                                    </div>
                                </li>
                            </ul>



                            <h3 class="my-4 font-semibold text-gray-900 ">Estado bucal general</h3>
                            <div class="grid gap-6 mb-6 md:grid-cols-2 px-8">
                                <div >
                                    <h4  class="flex items-center mb-2 ">Presencia de sarro</h4>
                                    <div class="flex items-center  mb-4">
                                      <input <?php if($fetch_hc['presenciaSarro']=="NO"){ echo "checked";};?>  id="presenciaSarroNO" type="radio" value="NO"  name="presenciaSarro" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                      <label  for="presenciaSarroNO"  class="ml-2 text-sm font-medium text-gray-900 ">NO</label>
                                  </div>
                                  <div class="flex items-center ">
                                      <input <?php if($fetch_hc['presenciaSarro']=="SI"){ echo "checked";};?> id="presenciaSarroSI" type="radio" value="SI"  name="presenciaSarro" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                      <label for="presenciaSarroSI" class="ml-2 text-sm font-medium text-gray-900 ">SI</label>
                                  </div>


                                  </div>
                                  <div><h4 class="flex items-center mb-2 ">Enfermedad periodontal</h4>
                                  <div class="flex items-center mb-4">
                                      <input  <?php if($fetch_hc['enfermedadPeriodontal']=="NO"){ echo "checked";};?> id="enfermedadPeriodontalNO" type="radio" value="NO" name="enfermedadPeriodontal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                      <label for="enfermedadPeriodontalNO" class="ml-2 text-sm font-medium text-gray-900 ">NO</label>
                                  </div>
                                  <div class="flex items-center">
                                      <input <?php if($fetch_hc['enfermedadPeriodontal']=="SI"){ echo "checked";};?> id="enfermedadPeriodontalSI" type="radio" value="SI" name="enfermedadPeriodontal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                      <label for="enfermedadPeriodontalSI" class="ml-2 text-sm font-medium text-gray-900 ">SI</label>
                                  </div>
                                </div>



                            </div>



                      </div>
                      <!--4-->
                      <div class="bg-gray-50  p-4  rounded-lg">
                      <div><h2 class="text-center text-xl py-6 font-medium">Diagnóstico (CIE 10)</h2></div>
                              <div class="grid gap-6 mb-6 md:grid-cols-1">

                            <div>
                                <label for="diagnosticoPresuntivo" class="block mb-2 text-sm font-medium text-gray-900 ">Diagnóstico Presuntivo</label>
                                <textarea   type="text" id="diagnosticoPresuntivo"  name="diagnosticoPresuntivo"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  ><?=$fetch_hc['diagnosticoPresuntivo'];?></textarea>
                            </div>

                            <div>
                                <label for="diagnosticoDefinitivo" class="block mb-2 text-sm font-medium text-gray-900 ">Diagnóstico Definitivo</label>
                                <textarea  type="text"  id="diagnosticoDefinitivo"  name="diagnosticoDefinitivo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  ><?=$fetch_hc['diagfinal'];?></textarea>
                            </div>
                        </div>



                        
                        <div><h2 class="text-center text-xl py-6 font-medium">Tratamiento </h2></div>
                              <div class="grid gap-6 mb-6 md:grid-cols-1">                           

                            <div>
                                <textarea  type="text"  id="tratamiento"  name="tratamiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  ><?=$fetch_hc['tratamiento'];?></textarea>
                            </div>
                        </div>

                        <div><h2 class="text-center text-xl py-6 font-medium">Observaciones </h2></div>
                              <div class="grid gap-6 mb-6 md:grid-cols-1">                         

                            <div>
                                <textarea  type="text"  id="observaciones"  name="observaciones" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder=""  ><?=$fetch_hc['observaciones'];?></textarea>
                            </div>
                        </div>  
                      </div>
                    </div>

                        

                     
                        

                                             
                        
                        <button type="submit" style="margin-top:3rem" name="submitUpdateHC" class="text-white bg-blue-700 text-center mx-auto flex justify-center hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   ">Guardar cambios</button>
                    </form>

                  </div>

                  <!--ODONTOGRAMA TAB-->
                  <div class=" hidden p-4 rounded-lg" style="padding:2rem" id="odontograma" role="tabpanel" aria-labelledby="odontograma-tab">

                              <!--POPOVER IMAGES INFORMATION-->
                  <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72   ">
                          <div class="p-3 space-y-2">
                              <h3 class="font-semibold text-gray-900 ">Informacion importante</h3>
                              <p>Se recomienda subir tu imagen en formato A4 y orientación vertical para evitar problemas de compatibilidad al momento de adjuntar a la historia clinica y descargar como pdf </p>
                          </div>
                          <div data-popper-arrow></div>
                      </div>
                                <div class="flex items-center flex-wrap pb-8" style="justify-content:space-evenly">
                                    <p style="padding-bottom:3rem;max-width:300px"class="text-center text-medium   text-gray-500 ">Puedes elegir entre <strong class="font-medium text-gray-800 ">subir tu imagen</strong>
                                    <button  style="padding-left:0.5rem"data-popover-target="popover-description" data-popover-placement="bottom-end" type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>

                                    
                                    o usar nuestro <strong class="font-medium text-gray-800 ">generador de odontogramas</strong>.
                                    </p>
                                  <!--SKELETON FOR ODONTOGRAMA-->
                                  <div>
                                  <span class="mx-auto flex justify-center mb-2 text-gray-500 ">Formato de odontograma</span>

                                  <div role="status" class=" max-w-sm p-4 border border-gray-200 rounded shadow animate-pulse md:p-6 ">

                                     
                                      <div class=" pb-4 items-center  mt-4 space-x-3">
                                          <div class="flex w-48 flex-wrap justify-end">
                                              <div class="h-2.5 bg-gray-200 rounded-full  w-48 mb-2"></div>

                                              <div  class=" relative w-32 h-2 flex bg-gray-200 rounded-full "></div>

                                          </div>
                                      </div>
                                  
                                      <div class="flex items-center justify-center h-48 mb-4 bg-gray-300 rounded ">
                                          <svg class="w-12 h-12 text-gray-200 " xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
                                      </div>
                                      <div class="h-2.5 bg-gray-200 rounded-full  w-48 mb-4"></div>
                                      <div class="h-2 bg-gray-200 rounded-full  mb-2.5"></div>
                                      <div class="h-2 bg-gray-200 rounded-full "></div>
                                      <div class="flex items-center mt-4 space-x-3">
                                          <div>
                                              <div class="h-2.5 bg-gray-200 rounded-full  w-32 mb-2"></div>
                                              <div class="w-48 h-2 bg-gray-200 rounded-full "></div>
                                          </div>
                                      </div>
                                      <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                    



                               </div>
                               
                               <!--CREATE NEW FILE-->

                                <div style="justify-content:space-evenly" class="flex flex-wrap gap-4   items-center ">
                                        <!--FILE INPUT-->
                                    <form action="" method="POST" enctype="multipart/form-data" style="max-width:300px">
                                        <input hidden name="id" type="text" value="<?=$fetch_paciente['id'];?>">
                                        <div class="">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Subir imagen</label>
                                            <div class="flex flex-wrap  gap-2">

                                                <input name="imgOdontograma" type="file" required accept="image/jpg, image/jpeg, image/png, image/webp"  class="w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none   " aria-describedby="file_input_help" id="file_input" >
                                                <button type="submit" name="uploadImgOdontograma" class=" flex gap-2  justify-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                                                    <span>Subir</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                                  </svg>

                                                </button>
                                            
                                              </div>
                                        </div> 
                                    </form>

                                    <style>
                                        input[type=file]::file-selector-button {
                                        background-color: #1A56DB;

                                        height:100%;

                                        transition: 1s;
                                      }

                                      input[type=file]::file-selector-button:hover {
                                        background-color: #1E429F;
                                        }

                                    </style>


                                    <div>
                                        <a  href="odontogram/index.php?pid=<?=$fetch_paciente['id'];?>&token=<?=$fetch_paciente['token'];?>" class=" flex items-center gap-2 my-4 mx-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
                                          Crear nuevo odontograma 
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                          </svg>
                                        </a>
                                    </div>

                                    
                                </div>




                        <!--table view all images-->
                        <?php
                            $showOdontogramaTab = $conn->prepare("SELECT * FROM `odontogramas` WHERE pacienteId = ? ");
                            $showOdontogramaTab->execute([$fetch_paciente['id']]);
                            if($showOdontogramaTab->rowCount()>0){
                        ?>

                        <div class="relative pt-4  overflow-x-auto shadow-md  sm:rounded-lg">
                          
                        <style>
                          
                    

                        .dark .dark\:shadow-white {
                      --tw-shadow-color: rgba(255,255,255,0.1);
                      --tw-shadow: var(--tw-shadow-colored);
}
                        </style>
                          <table class="w-full  text-sm text-left text-gray-500 ">
                              <thead  class="text-xs border-gray-200  border-b text-gray-700 uppercase  bg-gray-50  ">
                                  <tr>
                                      
                                      <th scope="col" class="px-6 py-3">
                                          Nombre
                                      </th>
                                      <th scope="col" class="px-6 py-3">
                                          Fecha
                                      </th>
                                      <th scope="col" class="px-6 py-3">
                                          Estado
                                      </th>
                                      <th scope="col" class="px-6 py-3">
                                          Acción
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>

                              <?php
                              $showOdontograma = $conn->prepare("SELECT * FROM `odontogramas` WHERE pacienteId = ? ORDER BY fecha DESC");
                              $showOdontograma->execute([$fetch_paciente['id']]);
                              if($showOdontograma->rowCount() > 0){
                                ;
                                while ($fetchOdontograma = $showOdontograma->fetch(PDO::FETCH_ASSOC)) { 

                                  ?>

                                  <tr class="bg-white  hover:bg-gray-50 ">
                                      
                                      <td scope="row" class="flex gap-2 items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                          <a  target="_blank" href="odontogram/screenshots/<?=$fetchOdontograma['imagen'];?>">
                                            <div class="flex items-center">
                                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                              </svg>
                                            </a>
                                            </div>
                                          <a target="_blank" href="odontogram/screenshots/<?=$fetchOdontograma['imagen'];?>"><img  class="" style="  height:100%; max-height: 100px; width: auto;" src="odontogram/screenshots/<?=$fetchOdontograma['imagen'];?>" alt="odontograma"></a>
                                          
                                      </td>
                                      
                                      <td class="px-6 py-4">
                                          <?=$fetchOdontograma['fecha'];?>
                                      </td>
                                      <td class="px-6 py-4">
                                          <div class="flex items-center">
                                              <?php
                                              if($fetchOdontograma['estado']=="Inhabilitado" )
                                              {
                                                echo ' <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>';
                                              } else echo ' <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>';
                                              ?>
                                              <?=$fetchOdontograma['estado'];?>

                                          </div>
                                      </td>

                                      <td class="px-6 py-4">
                                          
                                         
                                            <?php
                                              if($fetchOdontograma['estado']=="Inhabilitado" )
                                              {
                                                echo ' <div class="grid lg:grid-cols-2  ">
                                                <form action="" method="POST">
                                                  <input  type="text" name="imageName" value="'.$fetchOdontograma["imagen"].'" hidden >
                                                  <input   type="text" name="idPaciente"  value="'.$fetchOdontograma["pacienteId"].'" hidden >
                                                  <button type="submit" name="updateStateOdontograma" class=" flex justify-start font-medium text-blue-600  hover:underline">Marcar como actual</button>

                                                </form>
                                                <button   data-modal-target="'.$fetchOdontograma['imagen'].'" data-modal-toggle="'.$fetchOdontograma['imagen'].'"  class="flex justify-start font-medium text-red-600  hover:underline">Eliminar</button>
                                                </div>';
                                              } else echo ' <div class="grid lg:grid-cols-2 ">
                                                          <p  class="flex justify-start font-medium text-blue-300  ">Marcar como actual</p>
                                                          
                                                          <button  data-modal-target="'.$fetchOdontograma['imagen'].'" data-modal-toggle="'.$fetchOdontograma['imagen'].'" class="flex justify-start font-medium text-red-600  hover:underline">Eliminar</button>                                              </div>
                                              ';
                                              ?>

                                             
                                      </td>
                                  </tr>

                                  <!--MODAL-->
                                  <form action="" method="POST">
                                  <div id="<?=$fetchOdontograma['imagen'];?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <input  type="text" name="imageName" value="<?=$fetchOdontograma["imagen"];?>" hidden >
                                      <input   type="text" name="idPaciente"  value="<?=$fetchOdontograma["pacienteId"];?>" hidden > 
                                      <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow ">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="<?=$fetchOdontograma['imagen'];?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">¿Seguro que quieres eliminar este odontograma?</h3>
                                                    <button  type="submit" name="deleteOdontograma"class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Sí, eliminar
                                                    </button>
                                                    <button data-modal-hide="<?=$fetchOdontograma['imagen'];?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10      ">No, cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    </form>

                                  <?php

                                  


                                  
                                }
                                  
                                }
                          ?>         
                                  </tbody>
                              </table>
                          </div>
                          <?php
                            }
                          ?>



                  </div>

                  <!--CONSENTIMIENTOS-->
                  <div class="hidden p-4 rounded-lg bg-gray-50 " id="consentimientos" role="tabpanel" aria-labelledby="consentimientos-tab">
                      
                    
                                                   <!--POPOVER IMAGES INFORMATION-->
              
                               <div class="flex items-center flex-wrap gap-8 pb-8" style="justify-content:space-evenly">

                                  <!--SKELETON FOR ODONTOGRAMA-->
                                  <div>
                                    <span class="mx-auto flex justify-center mb-2 text-gray-500 ">Formato de consentimiento</span>

                                     <div role="status" class=" max-w-sm p-4 border border-gray-200 rounded shadow animate-pulse md:p-6 ">

                                     
                                          <div class=" pb-4 items-center  mt-4 space-x-3">
                                              <div class="flex w-48 flex-wrap justify-end">
                                                  <div class="h-2.5 bg-gray-200 rounded-full  w-48 mb-2"></div>

                                                  <div  class=" relative w-32 h-2 flex bg-gray-200 rounded-full "></div>

                                              </div>
                                          </div>
              
                                          <div class="h-2.5 bg-gray-200 rounded-full  w-48 mb-4"></div>
                                          <div class="h-2 bg-gray-200 rounded-full  mb-2.5"></div>

                                                
                                          <div class="h-2.5 bg-gray-200 rounded-full  w-48 mb-4"></div>
                                          <div class="h-2 bg-gray-200 rounded-full  mb-2.5"></div>
                                                
                                          <div class="h-2.5 bg-gray-200 rounded-full  w-48 mb-4"></div>
                                          <div class="h-2 bg-gray-200 rounded-full  mb-2.5"></div>
                                                
                                          <div class="h-2.5 bg-gray-200 rounded-full  w-48 mb-4"></div>
                                          <div class="h-2 bg-gray-200 rounded-full  mb-2.5"></div>
                                          <div class="h-2 bg-gray-200 rounded-full "></div>
                                          <div class="flex items-center mt-4 space-x-3">
                                              <div>
                                                  <div class="h-2.5 bg-gray-200 rounded-full  w-32 mb-2"></div>
                                                  <div class="w-48 h-2 bg-gray-200 rounded-full "></div>
                                              </div>
                                          </div>
                                          <span class="sr-only">Loading...</span>
                                    </div>


                                </div>
                                <form action="" method="POST" enctype="multipart/form-data" style="max-width:300px">
                                        <input hidden name="id" type="text" value="<?=$fetch_paciente['id'];?>">
                                        <div class="">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 "  for="file_input">Subir consentimiento</label>
                                            <div class="flex flex-wrap  gap-2">

                                                <input name="docConsentimiento"  type="file" required  class="w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none   " aria-describedby="file_input_help" id="file_input" >
                                                <div class="relative w-full my-2 z-0">
                                                    <input type="text" id="floating_standard" name="nombreTratamiento" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none    focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                    <label for="floating_standard" class="absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Escribir nombre de tratamiento (opcional)</label>
                                                </div>
                                                <button type="submit" name="uploadDocConsentimiento" class=" flex gap-2  justify-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                                                    <span>Subir</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                                  </svg>

                                                </button>
                                            
                                              </div>
                                        </div> 
                                    </form>



                                <!-- TRATAMIENTOS LIST
                                  <div class="">
                                  <button id="mega-menu-full-dropdown-button-tratamientos" data-collapse-toggle="mega-menu-full-dropdown-tratamientos" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0  md:   md: ">
                                    Seleccionar un tratamiento 
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" version="1.1" id="Capa_1" width="800px" height="800px" viewBox="0 0 97.68 97.68" xml:space="preserve">
                                    <g>
                                      <g>
                                        <path d="M42.72,65.596h-8.011V2c0-1.105-0.896-2-2-2h-16.13c-1.104,0-2,0.895-2,2v63.596H6.568c-0.77,0-1.472,0.443-1.804,1.137    C4.432,67.428,4.528,68.25,5.01,68.85l18.076,26.955c0.38,0.473,0.953,0.746,1.558,0.746s1.178-0.273,1.558-0.746L44.278,68.85    c0.482-0.6,0.578-1.422,0.246-2.117C44.192,66.039,43.49,65.596,42.72,65.596z"/>
                                        <path d="M92.998,39.315L79.668,1.541c-0.282-0.799-1.038-1.334-1.886-1.334h-3.861c-0.106,0-0.213,0.008-0.317,0.025    c-0.104-0.018-0.21-0.025-0.318-0.025h-3.76c-0.85,0-1.605,0.535-1.888,1.336L54.362,39.317c-0.215,0.611-0.12,1.289,0.255,1.818    c0.375,0.529,0.982,0.844,1.632,0.844h5.774c0.88,0,1.656-0.574,1.913-1.416l2.535-8.324H80.89l2.536,8.324    c0.256,0.842,1.033,1.416,1.913,1.416h5.771c0.648,0,1.258-0.314,1.633-0.844C93.119,40.604,93.213,39.926,92.998,39.315z     M68.864,24.283c2.397-7.77,4.02-13.166,4.82-16.041l4.928,16.041H68.864z"/>
                                        <path d="M87.255,89.838H69.438l18.928-27.205c0.232-0.336,0.357-0.734,0.357-1.143v-3.416c0-1.104-0.896-2-2-2h-26.07    c-1.104,0-2,0.896-2,2v3.844c0,1.105,0.896,2,2,2h16.782L58.481,91.094c-0.234,0.336-0.359,0.734-0.359,1.145v3.441    c0,1.105,0.896,2,2,2h27.135c1.104,0,2-0.895,2-2v-3.842C89.255,90.732,88.361,89.838,87.255,89.838z"/>
                                      </g>
                                    </g>
                                    </svg>
                                  </button>

                                    <div id="mega-menu-full-dropdown-tratamientos" class="mt-1 bg-white border-gray-200 shadow-sm border-y  ">
                                      <div class="grid max-w-screen-xl px-4 py-5 mx-auto text-gray-900  sm:grid-cols-2 md:grid-cols-3 md:px-6">
                                          <ul aria-labelledby="mega-menu-full-dropdown-button-tratamientos">
                                              <li>
                                                  <button data-modal-target="apicectomiaModal" data-modal-toggle="apicectomiaModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Apicectomía</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="caninosRetenidosModal" data-modal-toggle="caninosRetenidosModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Caninos retenidos</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="cirugíaTerceraMolarModal" data-modal-toggle="cirugíaTerceraMolarModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Cirugía tercera molar</div>
                                                  </button>
                                              </li>

                                              <li>
                                                  <button data-modal-target="cirugiaApicalModal" data-modal-toggle="cirugiaApicalModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Cirugía apical</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="cirugiaBucalMenorModal" data-modal-toggle="cirugiaBucalMenorModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Cirugía bucal menor</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="cirugiaOrtognaticaModal" data-modal-toggle="cirugiaOrtognaticaModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Cirugía ortognática</div>
                                                  </button>
                                              </li>
                                          </ul>
                                          <ul>
                                          <li>
                                                  <button data-modal-target="endodonciaModal" data-modal-toggle="endodonciaModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Endodoncia</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="exodonciaSimpleModal" data-modal-toggle="exodonciaSimpleModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Exodoncia simple</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="implantesModal" data-modal-toggle="implantesModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Implantes</div>
                                                  </button>
                                              </li>

                                              <li>
                                                  <button data-modal-target="normasModal" data-modal-toggle="normasModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Normas técnicas del odontograma</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="operatoriaModal" data-modal-toggle="operatoriaModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Operatoria</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="ortodonciaModal" data-modal-toggle="ortodonciaModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Ortodoncia</div>
                                                  </button>
                                              </li>
                                          </ul>
                                          <ul class="hidden md:block">


                                              <li>
                                                  <button data-modal-target="periodonciaModal" data-modal-toggle="periodonciaModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Periodoncia</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="prótesisFijaModal" data-modal-toggle="prótesisFijaModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Prótesis fija</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="tercerMolarModal" data-modal-toggle="tercerMolarModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Tercer molar</div>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button data-modal-target="tratamientoGeneralModal" data-modal-toggle="tratamientoGeneralModal" class="block p-3 rounded-lg hover:bg-gray-50 ">
                                                      <div class="font-semibold">Tratamiento general</div>
                                                  </button>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                                </div> -->
                                    



                              </div>
                                                          
  


                            

                               
                               <!--CREATE NEW FILE-->

                                <div style="justify-content:space-evenly" class="flex flex-wrap gap-4   items-center ">



<!-- 
                                    <div>
                                        <a  href="odontogram/index.php?pid=<?=$fetch_paciente['id'];?>&token=<?=$fetch_paciente['token'];?>" class=" flex items-center gap-2 my-4 mx-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
                                          Seleccionar tratamiento
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                          </svg>
                                        </a>
                                    </div> -->
                            


                                    
                                </div>




                        <!--table view all images-->
                        <?php
                            $showOdontogramaTab = $conn->prepare("SELECT * FROM `odontogramas` WHERE pacienteId = ? ");
                            $showOdontogramaTab->execute([$fetch_paciente['id']]);
                            
                        ?>

                        <div class="relative pt-4  overflow-x-auto shadow-md  sm:rounded-lg">
                          
                        <style>
                          
                    

                        .dark .dark\:shadow-white {
                      --tw-shadow-color: rgba(255,255,255,0.1);
                      --tw-shadow: var(--tw-shadow-colored);
                                        }
                        </style>
                          <table class="w-full  text-sm text-left text-gray-500 ">
                              <thead  class="text-xs border-gray-200  border-b text-gray-700 uppercase  bg-gray-50  ">
                                  <tr>
                                      
                                      <th scope="col" class="px-6 py-3">
                                          
                                      </th>
                                                                            
                                      <th scope="col" class="px-6 py-3">
                                          Nombre
                                      </th>
                                      <th scope="col" class="px-6 py-3">
                                          Fecha
                                      </th>
                                      <th scope="col" class="px-6 py-3">
                                          Estado
                                      </th>
                                      <th scope="col" class="px-6 py-3">
                                          Acción
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>

                              <?php
                              $showConsentimiento = $conn->prepare("SELECT * FROM `consentimientos` WHERE pacienteId = ? ORDER BY fecha DESC");
                              $showConsentimiento->execute([$fetch_paciente['id']]);
                              if($showConsentimiento->rowCount() > 0){
                                
                                while ($fetchConsentimiento = $showConsentimiento->fetch(PDO::FETCH_ASSOC)) { 

                                  ?>

                                  <tr class="bg-white  hover:bg-gray-50 ">
                                      
                                      <td scope="row" class="flex tems-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                          <a  target="_blank" href="consentimientos/<?=$fetchConsentimiento['doc'];?>">
                                            <div class="flex hover:text-blue-600 gap-2  items-center">
                                             <span>Ver documento</span>
                                              <svg fill="none" class="h-6 w-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                                              </svg> 
                                            </div>
                                          </a>
                                     
                                          
                                      </td>
                                      <td class="px-6 py-4">
                                        
                                      <?=$fetchConsentimiento['nombreTratamiento'];?>
                                        
                                      </td>
                                      
                                      <td class="px-6 py-4">
                                          <?=$fetchConsentimiento['fecha'];?>
                                      </td>
                                      <td class="px-6 py-4">
                                          <div class="flex items-center">
                                              <?php
                                              if($fetchConsentimiento['estado']=="Inhabilitado" )
                                              {
                                                echo ' <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>';
                                              } else echo ' <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>';
                                              ?>
                                              <?=$fetchConsentimiento['estado'];?>

                                          </div>
                                      </td>

                                      <td class="px-6 py-4">
                                          
                                         
                                            <?php
                                              if($fetchConsentimiento['estado']=="Inhabilitado" )
                                              {
                                                echo ' <div class="grid lg:grid-cols-2  ">
                                                <form action="" method="POST">
                                                  <input  type="text" name="docName" value="'.$fetchConsentimiento["doc"].'" hidden >
                                                  <input   type="text" name="idPaciente"  value="'.$fetchConsentimiento["pacienteId"].'" hidden >
                                                  <button type="submit" name="updateStateConsentimiento" class=" flex justify-start font-medium text-blue-600  hover:underline">Marcar como actual</button>

                                                </form>
                                                <button   data-modal-target="'.$fetchConsentimiento['doc'].'" data-modal-toggle="'.$fetchConsentimiento['doc'].'"  class="flex justify-start font-medium text-red-600  hover:underline">Eliminar</button>
                                                </div>';
                                              } else echo ' <div class="grid lg:grid-cols-2 ">
                                                          <p  class="flex justify-start font-medium text-blue-300  ">Marcar como actual</p>
                                                          
                                                          <button  data-modal-target="'.$fetchConsentimiento['doc'].'" data-modal-toggle="'.$fetchConsentimiento['doc'].'" class="flex justify-start font-medium text-red-600  hover:underline">Eliminar</button>                                              </div>
                                              ';
                                              ?>

                                             
                                      </td>
                                  </tr>

                                  <!--MODAL-->
                                  <form action="" method="POST">
                                  <div id="<?=$fetchConsentimiento['doc'];?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <input  type="text" name="consentimientoName" value="<?=$fetchConsentimiento["doc"];?>" hidden >
                                      <input   type="text" name="idPaciente"  value="<?=$fetchConsentimiento["pacienteId"];?>" hidden > 
                                      <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow ">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="<?=$fetchConsentimiento['doc'];?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">¿Seguro que quieres eliminar este consentimiento?</h3>
                                                    <button  type="submit" name="deleteConsentimiento"class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Sí, eliminar
                                                    </button>
                                                    <button data-modal-hide="<?=$fetchConsentimiento['doc'];?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10      ">No, cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    </form>

                                  <?php

                                  


                                  
                                }
                                  
                                }
                          ?>         
                                  </tbody>
                              </table>
                          </div>
                          <?php
                            }
                          ?>         
                </div>
                 
              </div>



        <?php
      }
      else{

       
          echo '<div id="toast-warning" class="flex mx-auto items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
          <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg  ">
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
              <span class="sr-only">Warning icon</span>
          </div>
          <div class="ml-3 text-sm font-normal">Este paciente no existe en la base de datos</div>
          <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-warning" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
      </div>';
        
      
        


      }
    

        ?>




             

      
      


    

      
  
 
 




































      
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded ">

<?php
if(isset($_GET['pid']))
{
      $pid = $_GET['pid'];
      $select_paciente = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? AND clinica_id = ?");
      $select_paciente->execute([$pid,$user_id]);
      $fetch_paciente=$select_paciente->fetch(PDO::FETCH_ASSOC);

      if($select_paciente->rowCount()> 0 ){


    

      
   ?>
 
   <?php
        
   ?>






<!--INFORMACION GENERAL DE PACIENTES-->



      
    
       <?php
      }
      else{
       
      }
    }
      ?>




              <!--SPEED DIAL-->
              <div data-dial-init style="z-index:200"class="fixed right-6 bottom-6 group">
                    <div id="speed-dial-menu-hover" class="flex flex-col items-center hidden mb-4 space-y-2">
                       
                        <!-- <button type="button" data-tooltip-target="tooltip-share" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-blue-600  bg-white rounded-full border border-gray-200  shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>
                            <span class="sr-only">Share</span>
                        </button>
                        <div id="tooltip-share" role="tooltip" class="absolute z-10 invisible inline-block w-60 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
                            Descargar historia clinica + odontograma + consentimiento
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div> -->


                        <a target="_blank"href="pdfHC-generate.php/?pid=<?=$fetch_paciente['id'];?>"> 
                            <button type="button" data-tooltip-target="tooltip-print" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-blue-600 bg-white rounded-full border border-gray-200  shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                          </svg>
                                <span class="sr-only">Descargar</span>
                            </button>
                      </a>
                        <div id="tooltip-print" role="tooltip" class="absolute z-10 invisible inline-block w-60 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
                          Descargar historia clinica + odontograma 
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                        
                        <a target="_blank"href="pdfonlyhc.php/?pid=<?=$fetch_paciente['id'];?>">
                          
                            <button type="button" data-tooltip-target="tooltip-copy" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-blue-600 bg-white rounded-full border border-gray-200   shadow-sm  hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                              </svg>
                                <span class="sr-only">Descargar</span>
                            </button>
                          </a>
                        <div id="tooltip-copy" role="tooltip" class="absolute z-10 invisible inline-block w-60 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
                            Descargar solo historia clinica
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                        <a target="_blank"href="pdfonlyOd_generate.php/?pid=<?=$fetch_paciente['id'];?>">
                                <button type="button" data-tooltip-target="tooltip-download" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-blue-600 bg-white rounded-full border border-gray-200  shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
                                            <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Layer_1" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                            <path id="Tooth_2_" d="M54.3148651,5.0702143c-3.5253983-3.6377001-8.4227982-5.4512-13.472599-4.9921999  c-0.0372009,0.001-0.0762024,0.0019-0.1133003,0.0049c-1.6397018,0.1611-3.1631012,0.8252-4.6366997,1.4687001  c-1.5165901,0.6621001-2.9492989,1.2871001-4.3290997,1.2871001c-1.3838005,0-2.8124886-0.6259-4.325201-1.289  c-1.4619999-0.6407-2.9736996-1.3028001-4.6035995-1.4668001c-4.9531002-0.501-9.7802,1.2636-13.2469997,4.8301001  c-3.4667997,3.5663996-5.0899,8.4393997-4.4550996,13.3592997c2.6244998,22.700201,4.4779992,36.6513977,5.5082994,41.4648972  c0.3237,1.5166016,1.9116001,3.8935013,3.9375,4.2256012c0.1352005,0.0223999,0.2915001,0.038002,0.4643002,0.038002  c0.8149996,0,1.9883118-0.3476028,2.9648991-1.9960022c1.4033012-2.3702011,2.6221008-5.642601,3.9131012-9.1083984  c2.6425991-7.0937996,5.6385994-15.1348,10.4218998-15.2110023c4.7490005,0.0956993,7.1541977,6.8535004,9.481411,13.3887024  c1.241188,3.4891968,2.4150009,6.785099,3.9677887,9.2782974c1.0332108,1.6611023,2.6805992,2.4815025,4.4179001,2.1826019  c1.5683975-0.2656021,2.8788986-1.4121017,3.1875-2.7881012c1.3194008-5.8711014,3.6992989-25.5126991,5.4638977-40.9589005  C59.5199661,13.7323141,57.863678,8.7323141,54.3148651,5.0702143z M56.8773651,18.537014  c-0.0009995,0.0058002-0.0018997,0.0107002-0.0018997,0.0165997c-1.7597885,15.3984013-4.1299019,34.9697037-5.4296989,40.7557983  c-0.1319008,0.5849991-0.8067017,1.125-1.5703011,1.2538986c-0.5381012,0.0938034-1.5665016,0.0479012-2.3867874-1.267498  c-1.4384117-2.3106003-2.5761108-5.5078011-3.7812119-8.8916016c-2.5546989-7.1758003-5.1953011-14.594799-11.3604012-14.7187996  c-6.1854992,0.0986023-9.4344997,8.8194008-12.3006992,16.5126991c-1.2588005,3.3799019-2.4482994,6.5713005-3.7598,8.7871017  c-0.6640997,1.1231003-1.2060995,1.0321999-1.3852997,1.0038986c-0.9515886-0.1562004-2.0815001-1.6229973-2.3046999-2.669899  c-1.0028887-4.6855011-2.8973999-18.9589996-5.4794002-41.2900009c-0.5576997-4.3233004,0.8652-8.5957003,3.9043002-11.7217007  c2.7005997-2.7793,6.3442106-4.3066998,10.1683989-4.3066998c0.4794998,0,0.9619007,0.0235,1.4453011,0.0723002  c1.3155117,0.1317999,2.6191998,0.7031,4,1.3085999c0.6203995,0.2716999,1.2488995,0.5463998,1.8883991,0.7834997  c0.0491123,0.0377002,0.0876999,0.0852003,0.1448002,0.1140003l9.9726982,5.0399995  c0.1445007,0.0732002,0.2988014,0.1073999,0.4502029,0.1073999c0.3652,0,0.7176971-0.2001991,0.8934975-0.5487995  c0.2490997-0.4932003,0.0517998-1.0946999-0.4413986-1.3438001l-5.8496017-2.9555998  c1.0969124-0.2781,2.1592026-0.7402,3.1992035-1.1938002c1.375-0.6006,2.6738968-1.1670001,3.88871-1.3016999  c0.04879,0.0028999,0.0966873,0.0009999,0.1454887-0.0039001c4.4755974-0.4395,8.827198,1.1601,11.952198,4.3838  C56.0013657,9.6854143,57.4593658,14.0868139,56.8773651,18.537014z"/>
                                            </svg>                  
                                            <span class="sr-only">Descargar</span>
                                </button>
                        </a>
                        <div id="tooltip-download" role="tooltip" class="absolute z-10 invisible inline-block w-60 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
                          Descargar solo odontograma
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                        <!-- <button type="button" data-tooltip-target="tooltip-consentimiento" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-blue-600 bg-white rounded-full border border-gray-200   shadow-sm  hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
                              <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Layer_1" viewBox="0 0 512.003 512.003" xml:space="preserve">
                                          <g>
                                            <g>
                                              <path d="M102.403,0.002c-42.351,0-76.8,34.449-76.8,76.8c0,42.351,34.449,76.8,76.8,76.8c42.351,0,76.8-34.449,76.8-76.8    C179.203,34.451,144.754,0.002,102.403,0.002z M102.403,128.002c-28.279,0-51.2-22.921-51.2-51.2s22.921-51.2,51.2-51.2    s51.2,22.921,51.2,51.2S130.683,128.002,102.403,128.002z"/>
                                            </g>
                                          </g>
                                          <g>
                                            <g>
                                              <path d="M384.003,0.002c-42.351,0-76.8,34.449-76.8,76.8c0,42.351,34.449,76.8,76.8,76.8s76.8-34.449,76.8-76.8    C460.803,34.451,426.354,0.002,384.003,0.002z M384.003,128.002c-28.279,0-51.2-22.921-51.2-51.2s22.921-51.2,51.2-51.2    c28.279,0,51.2,22.921,51.2,51.2S412.283,128.002,384.003,128.002z"/>
                                            </g>
                                          </g>
                                          <g>
                                            <g>
                                              <path d="M486.403,325.122h-3.302l-22.707-124.894c-2.219-12.177-12.817-21.026-25.19-21.026h-102.4    c-5.811,0-11.452,1.98-15.991,5.606L255.73,233.67l-89.429-51.106c-3.866-2.202-8.243-3.362-12.698-3.362h-102.4    c-12.373,0-22.972,8.849-25.19,21.026l-25.6,140.8c-1.357,7.467,0.666,15.155,5.53,20.983c4.872,5.82,12.066,9.19,19.661,9.19    h16.358l9.327,117.231c1.058,13.303,12.169,23.569,25.515,23.569h51.2c13.355,0,24.465-10.266,25.515-23.569l11.196-140.8    l6.485-63.394l63.778,21.606c2.688,0.913,5.461,1.357,8.226,1.357c4.437,0,8.738-1.408,12.638-3.652    c3.994,2.355,8.448,3.652,12.962,3.652c3.678,0,7.364-0.794,10.795-2.389l35.985-16.742l6.153,60.134l11.145,140.22    c1.058,13.312,12.169,23.578,25.523,23.578h51.2c13.355,0,24.465-10.266,25.523-23.569l4.233-53.231h47.044    c14.14,0,25.6-11.46,25.6-25.6v-58.88C512.003,336.582,500.543,325.122,486.403,325.122z M243.203,281.602l-94.191-31.915    l-9.813,95.915l-11.196,140.8h-51.2l-11.196-140.8H25.603l25.6-140.8h38.4v77.875c0,7.074,5.726,12.8,12.8,12.8    c7.074,0,12.8-5.726,12.8-12.8v-77.875h38.4l89.6,51.2V281.602z M409.603,486.402h-51.2l-11.196-140.8l-9.813-95.915    l-68.591,31.915v-25.6l64-51.2h38.4v77.875c0,7.074,5.726,12.8,12.8,12.8c7.074,0,12.8-5.726,12.8-12.8v-77.875h38.4    l21.879,120.32h-52.599c-14.14,0-25.6,11.46-25.6,25.6v58.88c0,14.14,11.46,25.6,25.6,25.6h9.19L409.603,486.402z     M486.403,409.602h-81.92v-58.88h81.92V409.602z"/>
                                            </g>
                                          </g>
                                          </svg>
                            <span class="sr-only">Copy</span>
                        </button>
                        <div id="tooltip-consentimiento" role="tooltip" class="absolute z-10 invisible inline-block w-60 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
                            Descargar solo consentimiento
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div> -->



                      </div>

                      


                              



                    <button type="button" data-dial-toggle="speed-dial-menu-hover" data-dial-trigger="hover" aria-controls="speed-dial-menu-hover" aria-expanded="false" class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800   focus:ring-4 focus:ring-blue-300 focus:outline-none ">
                        <svg aria-hidden="true" class="w-8 h-8 transition-transform group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        <span class="sr-only">Open actions menu</span>
                    </button>
                </div>

      </div>

      <!--TERMINA CONTENIDO-->

    </div>
</div>    

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <!--Dark Mode-->


<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>


</body>
</html>