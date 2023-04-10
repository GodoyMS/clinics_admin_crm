<?php
    
        include '../components/connect.php';

        session_start();

        if(isset($_SESSION['usuarios_pacientes'])){
        $userPaciente_id = $_SESSION['usuarios_pacientes'];
        }else{
        $userPaciente_id = '';
        header('location:index.php');

        };

        if(isset($_POST['confirmarCita'])){
            
            $citaFechaInicio=$_POST['citaFechaInicio'];
            
            $updateInhabilitadoState= $conn->prepare("UPDATE `eventos` SET estado = 'Confirmado' WHERE idPaciente = ? AND inicio = ? ");
            $updateInhabilitadoState->execute([$userPaciente_id,$citaFechaInicio]);          
            echo'<div id="toast-success" class="mx-auto relative flex justify-center mt-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Gracias por tu confirmación</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 " data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>';
          
              
          }

          if(isset($_POST['cancelarCita'])){
            
            $citaFechaInicio=$_POST['citaFechaInicio'];
            
            $updateInhabilitadoStateCancelar= $conn->prepare("UPDATE `eventos` SET estado = 'Cancelado' WHERE idPaciente = ? AND inicio = ? ");
            $updateInhabilitadoStateCancelar->execute([$userPaciente_id,$citaFechaInicio]);          
            echo'<div id="alert-border-3" style="max-width:500px" class=" mx-auto flex p-4 mb-4 text-green-700 bg-green-100 border-t-4 border-green-500 " role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium">
              Cita cancelada. Lamentamos tu decisión. Recuerda que puedes solicitar otra cita en otra fecha y horario disponible
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"  data-dismiss-target="#alert-border-3" aria-label="Close">
              <span class="sr-only">Dismiss</span>
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
    <title>Historia clínica y odontograma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="../images/imgLogo/favicon.png">

</head>
<body class="bg-gray-100  relative">


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

<div style="min-height:100vh" class="flex flex-col  flex-grow justify-between">
<div>
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
                    <a href="historia-clinica.php" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-blue-500  ">
                        <span class="block px-1 pt-1 pb-2">
                        <svg fill="none" class="h-8 w-8 mx-auto mb-2"stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"></path>
                        </svg>                            
                            <span class="flex gap-1 text-xs pb-1">Historia clínica</span>
                            <span class="block w-5 mx-auto h-1 bg-blue-500 rounded-full"></span>

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
<h2 class="text-lg  text-center text-gray-500    ">Historia clinica</h2>
<span class="block w-48 mx-auto h-1 rounded-full bg-blue-500"></span>
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
          


?>
            <form class="p-4 " action="" method="POST" >
                    <div class="grid gap-6 md:grid-cols-2">
                    <!--1-->

                      <div  class="  bg-gray-50  p-4 shadow-lg rounded-lg">
                      <div><h2 class="text-xl text-center pb-6 font-medium">Datos generales</h2></div>
                        <input type="hidden"   value="<?=$fetch_paciente['id'];?>"id="pacienteId" name="pacienteId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   "  required>
                        <input type="hidden"   value="<?=$fetch_paciente['clinica_id'];?>"id="clinicaId" name="clinicaId"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   "  required>
                        <input type="hidden"   value="<?=$fetch_paciente['token'];?>"id="token" name="token"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   "  required>
                        
                       

                        
                        <div class="mb-6">
                            <label for="doctorCargo" class="block mb-2 text-sm font-medium text-gray-900 ">Doctor a cargo</label>
                            <input  type="text" disabled  value="<?=$fetch_hc['doctor'];?>"id="doctorCargo"  name="nombresPaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="Robert Carvajar Espinoza" >
                        </div> 


                        <div class="mb-6">
                            <label for="nombresPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Nombres y apellidos</label>
                            <input  type="text" disabled  value="<?=$fetch_paciente['nombrePaciente'];?>"id="nombresPaciente"  name="nombresPaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="Robert Carvajar Espinoza" >
                        </div> 
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="dni12" class="block mb-2 text-sm font-medium text-gray-900 ">DNI</label>
                                <input  type="text" disabled name="dni12"  value="<?=$fetch_paciente['dni'];?>" maxlength="8" minlength="8"  id="dni" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="" >
                            </div>
                            <div>
                                <label for="numHC" class="block mb-2 text-sm font-medium text-gray-900 ">N° HC</label>
                                <input type="number"  disabled id="numHC" name="numHC" value="<?=$fetch_hc['numhc'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="12" >
                                 
                              </div>
                           <?php
                            date_default_timezone_set('America/New_York');

                            $now=date("Y-m-d H:i");                        

                           ?>
                              
                            <div>
                                <label for="fechaAtencion" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha y hora de atención</label>
                                <input type="datetime-local" disabled id="fechaAtencion" name="fechaAtencion" value="<?=$fetch_hc['fechahoraatencion'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " >
                            </div>  
                            <div>
                                <label for="fechaHC" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha apertura de h.c.</label>
                                <input type="date" disabled id="fechaHC" name="fechaHC" value="<?=$fetch_hc['fechaapertura'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="123-45-678"  >
                            </div>

                            <div>
                                <label for="sexo12" class="block mb-2 text-sm font-medium text-gray-900 ">Sexo</label>
                                <input  name="sexo12" disabled type="text"  value="<?=$fetch_paciente['sexo'];?>" id="sexo12" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="Hombre" >
                            </div>  
                            <div>
                                <label for="edadPacienteHC" class="block mb-2 text-sm font-medium text-gray-900 ">Edad</label>
                                <input  type="number" disabled value="<?=$fetch_paciente['edadPaciente'];?>"id="edadPacienteHC" name="edadPacienteHC"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="12"  >
                            </div>
                            <div>
                                <label for="lugarNacimiento" class="block mb-2 text-sm font-medium text-gray-900 ">Lugar de Nacimiento</label>
                                <input  type="text" disabled id="lugarNacimiento" name="lugarNacimiento" value="<?=$fetch_paciente['lugarNacimiento'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  >
                            </div>
                            <div>
                                <label for="fechaNacimiento" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha Nacimiento</label>
                                <input  type="date" disabled id="fechaNacimiento" value="<?=$fetch_paciente['fechaNacimiento'];?>" name="fechaNacimiento"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  >
                            </div>

                            <div>
                                <label for="ocupacion" class="block mb-2 text-sm font-medium text-gray-900 ">Ocupación</label>
                                <input  type="text" disabled  id="ocupacion" name="ocupacion" value="<?=$fetch_paciente['ocupacion'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  >
                            </div>
                            <input hidden type="text" name="direccion" value="<?=$fetch_paciente['direccion'];?>">
                            <div>
                                <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 ">Dirección</label>
                                <div   type="text " contenteditable="false" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  ><?=$fetch_paciente['direccion'];?></div>
                            </div>

                            
                      </div>

                      </div>
                      <!--2-->
                      <div class="bg-gray-50  p-4 shadow-lg rounded-lg">
                      <div><h2 class="text-center text-xl py-6 font-medium">Enfermedad Actual</h2></div>
                      <div class="mb-6">
                            <label for="tiempoEnfermedad" class="block mb-2 text-sm font-medium text-gray-900 ">Tiempo de enfermedad</label>
                            <input type="text"  disabled id="tiempoEnfermedad" value="<?=$fetch_hc['tiempoEnfermedad'];?>" name="tiempoEnfermedad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="" >
                        </div> 
                        <div class="mb-6">
                            <label for="signosSintomas" class="block mb-2 text-sm font-medium text-gray-900 ">Signos y síntomas principales</label>
                            <input type="text" disabled id="signosSintomas"  name="signosSintomas" value="<?=$fetch_hc['signosSintomas'];?>"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="" >
                        </div> 
                        <div class="mb-6">
                            <label for="relatoCronologico" class="block mb-2 text-sm font-medium text-gray-900 ">Relatos cronológico</label>
                            <input type="text" disabled id="relatoCronologico"  name="relatoCronologico" value="<?=$fetch_hc['relatosCronologicos'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="" >
                        </div> 
                        <div class="mb-6">
                            <label for="funcionesBiologicas" class="block mb-2 text-sm font-medium text-gray-900 ">Funciones biológicas</label>
                            <input type="name" disabled  id="funcionesBiologicas"  name="funcionesBiologicas" value="<?=$fetch_hc['funcionesBiologicas'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="" >
                        </div> 

                        
                        <div><h2 class="text-center text-xl py-6 font-medium">Antecedentes</h2></div>
                      <div class="mb-6">
                            <label for="antecedentesFamiliares" class="block mb-2 text-sm font-medium text-gray-900 ">Antecedentes familiares</label>
                            <input type="text" disabled  id="antecedentesFamiliares"  name="antecedentesFamiliares" value="<?=$fetch_hc['antFamiliares'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="" >
                        </div> 
                        <div class="mb-6">
                            <label for="antecedentesPersonales" class="block mb-2 text-sm font-medium text-gray-900 ">Antecedentes personales</label>
                            <input type="text" disabled id="antecedentesPersonales"  name="antecedentesPersonales"  value="<?=$fetch_hc['antPersonales'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="" >
                        </div> 



                      </div>
                      <!--3-->
                      <div class="bg-gray-50  p-4 shadow-lg rounded-lg">
                      <div><h2 class="text-center text-xl py-6 font-medium">Exploración fisica</h2></div>
                      
                      <h3 class=" py-6 text-center  font-medium">Signos vitales</h3>
                      <div class="grid gap-6 mb-6 md:grid-cols-2">
                          <div>
                              <label for="pa" class="block mb-2 text-sm font-medium text-gray-900 ">Presión arterial</label>
                              <input type="text" disabled  name="pa" id="pa"value="<?=$fetch_hc['presionArterial'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="" >
                          </div>
                          <div>
                              <label for="pulso" class="block mb-2 text-sm font-medium text-gray-900 ">Pulso</label>
                              <input type="text" disabled id="pulso" name="pulso" value="<?=$fetch_hc['pulso'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder="" >
                          </div>
                                                   
                          <div>
                              <label for="temperatura" class="block mb-2 text-sm font-medium text-gray-900 ">Temperatura</label>
                              <input  type="numer" disabled id="temperatura" name="temperatura" value="<?=$fetch_hc['temperatura'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  >
                          </div>
                          <div>
                              <label for="frecCardiaca" class="block mb-2 text-sm font-medium text-gray-900 ">Frec. cardiaca</label>
                              <input    id="frecCardiaca" disabled name="frecCardiaca" value="<?=$fetch_hc['frecCardiaca'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  >
                          </div>
                          <div>
                              <label for="frecRespiratoria" class="block mb-2 text-sm font-medium text-gray-900 ">Frec. respiratoria</label>
                              <input   id="frecRespiratoria" disabled name="frecRespiratoria" value="<?=$fetch_hc['frecRespiratoria'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  >
                          </div>                            
                    </div>
                      <div class="grid gap-6 mb-6 md:grid-cols-1">

                          <div>
                              <label for="examenClinicoGeneral" class="block mb-2 text-sm font-medium text-gray-900 ">Exámen clinico general</label>
                              <textarea   type="text" disabled id="examenClinicoGeneral"  name="examenClinicoGeneral" value=""class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  ><?=$fetch_hc['examenClinicoGeneral'];?></textarea>
                          </div>

                          <div>
                              <label for="odontoestomatologico" class="block mb-2 text-sm font-medium text-gray-900 ">Odontoestomatológico</label>
                              <textarea  type="text" disabled id="odontoestomatologico"  name="odontoestomatologico" value=""class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  ><?=$fetch_hc['odontoestomatologico'];?></textarea>
                          </div>
                      </div>

                      
                            <h3 class="mb-4 font-semibold text-gray-900 ">Estado de la higiene bucal</h3>

                         
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex   ">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                                    <div class="flex items-center pl-3">
                                        <input disabled id="horizontal-list-radio-license" <?php if($fetch_hc['estadoHigieneBucal']=="Muy bueno"){ echo "checked";};?> type="radio" value="Muy bueno" name="estadosHigieneBucal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                        <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Muy bueno </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                                    <div class="flex items-center pl-3">
                                        <input disabled id="horizontal-list-radio-id"  <?php if($fetch_hc['estadoHigieneBucal']=="Bueno"){ echo "checked";};?> type="radio" value="Bueno" name="estadosHigieneBucal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                        <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Bueno</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                                    <div class="flex items-center pl-3">
                                        <input disabled id="horizontal-list-radio-millitary"  <?php if($fetch_hc['estadoHigieneBucal']=="Deficiente"){ echo "checked";};?> type="radio" value="Deficiente" name="estadosHigieneBucal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                        <label for="horizontal-list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Deficiente</label>
                                    </div>
                                </li>
                                <li class="w-full ">
                                    <div class="flex items-center pl-3">
                                        <input disabled id="horizontal-list-radio-passport" <?php if($fetch_hc['estadoHigieneBucal']=="Malo"){ echo "checked";};?> type="radio" value="Malo" name="estadosHigieneBucal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2 ">
                                        <label disabled for="horizontal-list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Malo</label>
                                    </div>
                                </li>
                            </ul>



                            <h3 class="my-4 font-semibold text-gray-900 ">Estado bucal general</h3>
                            <div class="grid gap-6 mb-6 md:grid-cols-2 px-8">
                                <div >
                                    <h4  class="flex items-center mb-2 ">Presencia de sarro</h4>
                                    <div class="flex items-center  mb-4">
                                      <input disabled <?php if($fetch_hc['presenciaSarro']=="NO"){ echo "checked";};?>  id="presenciaSarroNO" type="radio" value="NO"  name="presenciaSarro" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2  ">
                                      <label  for="presenciaSarroNO"  class="ml-2 text-sm font-medium text-gray-900 ">NO</label>
                                  </div>
                                  <div class="flex items-center ">
                                      <input disabled <?php if($fetch_hc['presenciaSarro']=="SI"){ echo "checked";};?> id="presenciaSarroSI" type="radio" value="SI"  name="presenciaSarro" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2  ">
                                      <label for="presenciaSarroSI" class="ml-2 text-sm font-medium text-gray-900 ">SI</label>
                                  </div>


                                  </div>
                                  <div><h4 class="flex items-center mb-2 ">Enfermedad periodontal</h4>
                                  <div class="flex items-center mb-4">
                                      <input disabled  <?php if($fetch_hc['enfermedadPeriodontal']=="NO"){ echo "checked";};?> id="enfermedadPeriodontalNO" type="radio" value="NO" name="enfermedadPeriodontal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2  ">
                                      <label for="enfermedadPeriodontalNO" class="ml-2 text-sm font-medium text-gray-900 ">NO</label>
                                  </div>
                                  <div class="flex items-center">
                                      <input  disabled <?php if($fetch_hc['enfermedadPeriodontal']=="SI"){ echo "checked";};?> id="enfermedadPeriodontalSI" type="radio" value="SI" name="enfermedadPeriodontal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2  ">
                                      <label for="enfermedadPeriodontalSI" class="ml-2 text-sm font-medium text-gray-900 ">SI</label>
                                  </div>
                                </div>



                            </div>



                      </div>
                      <!--4-->
                      <div class="bg-gray-50  p-4 shadow-lg rounded-lg">
                      <div><h2 class="text-center text-xl py-6 font-medium">Diagnóstico (CIE 10)</h2></div>
                              <div class="grid gap-6 mb-6 md:grid-cols-1">

                            <div>
                                <label for="diagnosticoPresuntivo" class="block mb-2 text-sm font-medium text-gray-900 ">Diagnóstico Presuntivo</label>
                                <textarea  disabled type="text" id="diagnosticoPresuntivo"  name="diagnosticoPresuntivo"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  ><?=$fetch_hc['diagnosticoPresuntivo'];?></textarea>
                            </div>

                            <div>
                                <label for="diagnosticoDefinitivo" class="block mb-2 text-sm font-medium text-gray-900 ">Diagnóstico Definitivo</label>
                                <textarea disabled type="text"  id="diagnosticoDefinitivo"  name="diagnosticoDefinitivo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  ><?=$fetch_hc['diagfinal'];?></textarea>
                            </div>
                        </div>



                        
                        <div><h2 class="text-center text-xl py-6 font-medium">Tratamiento </h2></div>
                              <div class="grid gap-6 mb-6 md:grid-cols-1">                           

                            <div>
                                <textarea  disabled type="text"  id="tratamiento"  name="tratamiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  ><?=$fetch_hc['tratamiento'];?></textarea>
                            </div>
                        </div>

                        <div><h2 class="text-center text-xl py-6 font-medium">Observaciones </h2></div>
                              <div class="grid gap-6 mb-6 md:grid-cols-1">                         

                            <div>
                                <textarea disabled type="text"  id="observaciones"  name="observaciones" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   " placeholder=""  ><?=$fetch_hc['observaciones'];?></textarea>
                            </div>
                        </div>  
                      </div>
                    </div>

                        

                     
                        

                                             
                        
                    </form>
                    <?php
                    }else{
                        echo'<div style="max-width:500px"class="p-4 mt-4 mx-auto  text-sm text-gray-700 rounded-lg bg-gray-50  " role="alert">
                        Tu clinica aun no ha generado tu historia clínica.
                      </div>';

                    }

                    ?>

        <section>
        <h2 class="text-lg  text-center text-gray-500    ">Odontograma</h2>
        <span class="block w-48 mx-auto h-1 rounded-full bg-blue-500"></span>
        <!----->
        <?php
                $selectOdontograma = $conn->prepare("SELECT * FROM `odontogramas` WHERE pacienteId = ?  AND estado='Actual'");
                $selectOdontograma->execute([$userPaciente_id]);
                if($selectOdontograma->rowCount()>0){
                $fetchOdontograma=$selectOdontograma->fetch(PDO::FETCH_ASSOC);

                ?>
                    <table style="max-width:50rem;" class="w-full mt-4 mb-8 rounded-full shadow-lg mx-auto text-sm text-left text-gray-500 ">
                                <thead  class="text-xs border-gray-200  border-b text-gray-700 uppercase  bg-gray-50  ">
                                    <tr>
                                        
                                        <th scope="col" class="px-6 py-3">
                                            
                                        </th>
                                                                                
                                        <th scope="col" class="px-6 py-3">
                                            Fecha de creación
                                        </th>
                                        

                                    </tr>
                                </thead>
                                <tbody>

                                

                                    <tr class="bg-white hover:bg-gray-50 ">
                                        
                                        <td scope="row" class="flex tems-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            <a  target="_blank" href="../clinicas/odontogram/screenshots/<?=$fetchOdontograma['imagen'];?>">
                                                <div class="flex hover:text-blue-600 gap-2 items-center">
                                                <span>Ver odontograma</span>
                                                <svg fill="none" class="h-6 w-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                                                </svg> 
                                                </div>
                                            </a>
                                        
                                            
                                        </td>
                                       
                                        
                                        <td class="px-6 py-4">
                                            <?=$fetchOdontograma['fecha'];?>
                                        </td>


                                        
                                    </tr>

                                    <?php

                                    


                                    
                                   
                                    
                                    
                                    ?>         
                                    </tbody>
                     </table>

                <?php

                
            
            }else{
                echo '<div style="max-width:500px"class="p-4 my-4 mx-auto  text-sm text-gray-700 rounded-lg bg-gray-50  " role="alert">
                Tu clinica aun no ha generado tu odontograma.
              </div>';


            }






        ?>
<!----->

</section>
 </div>

<?php
    include 'components/footer.php';
 ?>
</div>

<script>
// PREVENT RESEND FORMS
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>







<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>

</body>
</html>