<?php
    
        include '../components/connect.php';

        session_start();

        if(isset($_SESSION['usuarios_pacientes'])){
        $userPaciente_id = $_SESSION['usuarios_pacientes'];

      
        $select_paciente = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
        $select_paciente->execute([$userPaciente_id]);
        if($select_paciente->rowCount()>0){
          $fetch_paciente=$select_paciente->fetch(PDO::FETCH_ASSOC);}

            //fetch hc
        $select_hc=$conn->prepare("SELECT * FROM `hc` WHERE pacienteID = ? ");
        $select_hc->execute([$userPaciente_id]);

        if($select_hc->rowCount()>0){
            $fetch_hc=$select_hc->fetch(PDO::FETCH_ASSOC);
        }  




        }else{
        $userPaciente_id = '';
        header('location:index.php');

        };

       
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
    $idPaciente=$userPaciente_id ;
    

    $prevent_doble_paciente_actualizar_Nombre = $conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id= ? ");
    $prevent_doble_paciente_actualizar_Nombre->execute([$fetch_paciente['clinica_id']]);
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
      $update_paciente6 = $conn->prepare("UPDATE `pacientes` SET fechaNacimiento = ? WHERE id = ? ");
      $update_paciente6->execute([$fechaNacimiento,$idPaciente]);
      $update_paciente7 = $conn->prepare("UPDATE `pacientes` SET lugarNacimiento  = ? WHERE id = ? ");
      $update_paciente7->execute([$lugarNacimiento,$idPaciente]);
      $update_paciente8 = $conn->prepare("UPDATE `pacientes` SET ocupacion = ? WHERE id = ? ");
      $update_paciente8->execute([$ocupacionPaciente,$idPaciente]);
      $update_paciente9 = $conn->prepare("UPDATE `pacientes` SET direccion  = ? WHERE id = ? ");
      $update_paciente9->execute([$direccionPaciente,$idPaciente]);

      echo '<div id="toast-success" class="mx-auto relative flex justify-center mt-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Check icon</span>
      </div>
      <div class="ml-3 text-sm font-normal">Información actualizada</div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-success" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
  </div>';





  
 }




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="../images/imgLogo/favicon.png">

</head>
<body class="bg-gray-100">


<style>
@import url(https://pro.fontawesome.com/releases/v5.10.0/css/all.css);
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;800&display=swap');
body {
    font-family: 'Poppins', sans-serif;
}
.hover\:w-full:hover {
    width: 100%;
}
.group:hover .group-hover\:w-full {
    width: 100%;
}
.group:hover .group-hover\:inline-block {
    display: inline-block;
}
.group:hover .group-hover\:flex-grow {
    flex-grow: 1;
}
</style>
<!--USER NAV-->
<?php
    include('components/userNav.php');
?>


<div class=" mx-2    mt-4 items-center justify-center ">
    <div class="w-full max-w-md mx-auto">  
         <div class="px-7 bg-white shadow-lg  rounded-2xl ">
            <div class="flex flex-wrap">

            


                <div class="flex-1 group">
                    <a href="dashboard.php" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-blue-500  ">
                        <span class="block px-1 pt-1 pb-2">
                        <svg fill="none" class="w-8 h-8 mb-2 mx-auto"stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path>
                        </svg>                            
                                 <span class="block  text-xs pb-1">Citas</span>
                                 <span class="block w-5 mx-auto h-1 group-hover:bg-blue-500 rounded-full"></span>


                        </span>
                        
                    </a>
                </div>
                <div class="flex-1 group">
                    <a href="historia-clinica.php" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-blue-500   ">
                        <span class="block px-1 pt-1 pb-2">
                        <svg fill="none" class="h-8 w-8 mx-auto mb-2"stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"></path>
                        </svg>                            
                            <span class="flex gap-1 text-xs pb-1">Historia clínica</span>
                            <span class="block w-5 mx-auto h-1 group-hover:bg-blue-500 rounded-full"></span>

                        </span>
                    </a>
                </div>
                <div class="flex-1 group">
                    <a href="consentimientos.php" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-blue-500  ">
                        <span class="block px-1 pt-1 pb-2">
                        <svg class="w-8 h-8  mx-auto mb-2 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Layer_1" viewBox="0 0 512.003 512.003" xml:space="preserve">
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
                                    <span class="block text-xs pb-1">Consentimientos</span>
                                    <span class="block w-5 mx-auto h-1  group-hover:bg-blue-500 rounded-full"></span>

                        </span>
                    </a>
                </div>
                <div class="flex-1 group">
                    <a href="solicitar-cita.php" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-blue-500 ">
                        <span class="block px-1 pt-1 pb-2">
                        <svg fill="none" stroke="currentColor"class="w-8 h-8 mx-auto mb-2" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"></path>
                        </svg>                            
                            <span class="block text-xs pb-1">Solicitar cita</span>
                            <span class="block w-5 mx-auto h-1 group-hover:bg-blue-500 rounded-full"></span>

                        </span>
                    </a>
                </div>
            </div>
        </div>

       

    </div>
</div>

<section style="margin-bottom:5rem;margin-top:5rem" >





</section>
<!--DISPLAY HISTORIAL CLINICO-->

<section>
<h2 class="text-lg  text-center text-gray-500    ">Actualizar información</h2>
<span class="block w-60 mx-auto h-1 rounded-full bg-blue-500"></span>
<!----->
<?php
        $select_paciente = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
        $select_paciente->execute([$userPaciente_id]);
        if($select_paciente->rowCount()>0){
          $fetch_paciente=$select_paciente->fetch(PDO::FETCH_ASSOC);}

            //fetch hc
        $select_hc=$conn->prepare("SELECT * FROM `hc` WHERE pacienteID = ? ");
        $select_hc->execute([$userPaciente_id]);

        if($select_hc->rowCount()>0){
            $fetch_hc=$select_hc->fetch(PDO::FETCH_ASSOC);
        }  


?>



<div class="mx-auto px-4 pb-8">                
        <form action="" style="max-width:36rem"  method="post" class=" mx-auto  bg-white shadow-lg rounded-lg px-8 my-4 py-8">
            <div class="grid gap-6 mb-6 md:grid-cols-2 ">
                <div>

                    <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Nombres</label>
                    <input type="name" name="nombrePaciente"  value="<?=$fetch_paciente['nombrePaciente'];?>"id="nombrePaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Susana Mendoza" required>
                </div>
                <input hidden  type="text" name="sexo" value="<?=$fetch_paciente['sexo'];?>" > 
                
                <div>
                    <label for="telefonoPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Telefono (Whatsapp)</label>
                    <input type="tel" name="telefonoPaciente" value="<?=$fetch_paciente['telefonoPaciente'];?>"id="telefonoPaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="913411231" required>
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
                    <input type="text" name="direccionPaciente" id="direccionPaciente" value="<?=$fetch_paciente['direccion'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Av. Las Palmeras 556" >
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





<!----->

</section>


<?php
    include 'components/footer.php';
 ?>

<script>
// PREVENT RESEND FORMS
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>







<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>

</body>
</html>