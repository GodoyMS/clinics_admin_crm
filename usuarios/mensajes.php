<?php
    
        include '../components/connect.php';

        session_start();

        if(isset($_SESSION['usuarios_pacientes'])){
        $userPaciente_id = $_SESSION['usuarios_pacientes'];

        //DISSMISSS NOTIFICATIONS ON DOM LOADED
        $updateNotificationsState= $conn->prepare("UPDATE `mensajes` SET estadoNotificacion = 'leido' WHERE idPaciente = ? AND direccion = 'consultorioAPaciente' ");
        $updateNotificationsState->execute([$userPaciente_id]);
      
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

       
if(isset($_POST['enviarMensaje'])){

    

    $idConsultorio=$_POST['idConsultorio'];
    $idConsultorio = filter_var($idConsultorio, FILTER_SANITIZE_STRING);
    $emailConsultorio=$_POST['emailConsultorio'];
    $emailConsultorio = filter_var($emailConsultorio, FILTER_SANITIZE_STRING);
    
    $nombrePaciente = $_POST['nombrePaciente'];
    $nombrePaciente = filter_var($nombrePaciente, FILTER_SANITIZE_STRING);
    $emailPaciente = $_POST['correoPaciente'];
    $emailPaciente = filter_var($emailPaciente, FILTER_SANITIZE_STRING);
    $mensaje = $_POST['mensaje'];
    $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
    $direccion='pacienteAConsultorio';
    date_default_timezone_set('America/New_York');
    $tipoMensaje="Mensaje";
    $today=date("Y-m-d H:i");
    $insert_event = $conn->prepare("INSERT INTO `mensajes`(idPaciente,clinica_id,nombrePaciente,emailPaciente,emailConsultorio,mensaje,fecha,direccion,tipoMensaje) VALUES(?,?,?,?,?,?,?,?,?)");
    $insert_event->execute([$userPaciente_id,$idConsultorio,$nombrePaciente,$emailPaciente,$emailConsultorio,$mensaje,$today,$direccion,$tipoMensaje]);
      

      echo '<div id="toast-success" class="mx-auto relative flex justify-center mt-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Check icon</span>
      </div>
      <div class="ml-3 text-sm font-normal">Mensaje enviado</div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 " data-dismiss-target="#toast-success" aria-label="Close">
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
    <title>Mensajes</title>
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

<section class="grid gap-4 md:grid-cols-2">
    <div>
        <h2 class="text-lg  text-center text-gray-500    ">Enviar mensaje a consultorio</h2>
        <span class="block w-80 mx-auto h-1 rounded-full bg-blue-500"></span>
        <!----->
        <?php
                $select_paciente = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
                $select_paciente->execute([$userPaciente_id]);
                if($select_paciente->rowCount()>0){
                $fetch_paciente=$select_paciente->fetch(PDO::FETCH_ASSOC);}

                $select_clinica=$conn->prepare("SELECT * FROM `usuarios` WHERE id = ?");
                $select_clinica->execute([$fetch_paciente['clinica_id']]);
                $fetch_clinica=$select_clinica->fetch(PDO::FETCH_ASSOC);
                    //fetch hc

            


        ?>

            <form class="p-4"action="" method="POST">
                <div style="max-width:42rem" class="  px-4 py-4  mx-auto my-4 px-4">
                <input name="idConsultorio" hidden value="<?=$fetch_clinica['id'];?>">

                <input name="emailConsultorio" hidden value="<?=$fetch_clinica['emailConsultorio'];?>">
                <input name="nombrePaciente" hidden value="<?=$fetch_paciente['nombrePaciente'];?>">
                <input name="correoPaciente" hidden value="<?=$fetch_paciente['correo'];?>">



                    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 ">Para: <?=$fetch_clinica['nombreConsultorio'];?></label>
                    <div class="relative mb-4">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            </div>
                            <div type="text" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  " placeholder="name@flowbite.com"><?=$fetch_clinica['emailConsultorio'];?></div>
                    </div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Tu mensaje</label>
                    <textarea id="message" required name="mensaje" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Escribe tu mensaje"></textarea>
                    <button type="submit" name="enviarMensaje" class=" my-4 mx-auto w-40  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Enviar</button>

                </div>

            </form>

    </div>

    <div class="p-4">
        <h2 class="text-lg  text-center text-gray-500    ">Mensajes recibidos</h2>
        <span class="block w-60 mx-auto h-1 rounded-full bg-blue-500"></span>

        
                <?php
            $select_mensajes=$conn->prepare("SELECT * FROM `mensajes` WHERE idPaciente = ? AND direccion='consultorioAPaciente' ORDER BY fecha DESC");
            $select_mensajes->execute([$userPaciente_id]);
            if($select_mensajes->rowCount()>0){
                while($fetch_mensajes=$select_mensajes->fetch(PDO::FETCH_ASSOC)){
                    ?>

                        <div id="toast-notification" style="max-width:40rem"class="shadow-lg my-2 mx-auto w-full  p-4 text-gray-900 bg-white rounded-lg shadow " role="alert">
                                <div class="flex items-center mb-3">
                                    <span class="mb-1 text-sm font-semibold text-gray-900 "><?=$fetch_mensajes['fecha'];?></span>
                                
                                </div>
                                <div class="flex items-center">
                                    <div class="relative inline-block shrink-0">
                                        <svg fill="none" stroke="currentColor" class="w-12 h-12 text-gray-600" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>                                
                                        <span class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-blue-600 rounded-full">
                                                <svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Message icon</span>
                                        </span>
                                    </div>
                                    <div class="ml-3 text-sm font-normal">
                                        <div class="text-sm font-semibold text-gray-900 "><?=$fetch_clinica['nombreConsultorio'];?></div>
                                        <div class="text-sm font-normal"><?=$fetch_mensajes['mensaje'];?></div> 
                                        <span class="text-xs font-medium text-blue-600 "><?=$fetch_mensajes['emailConsultorio'];?></span>   
                                    </div>
                                </div>
                        </div>
                


                    <?php


                }
            }else{

                echo '<div style="max-width:500px"class="p-4 my-8 mx-auto text-sm text-gray-700 rounded-lg bg-gray-50 " role="alert">
                Aun no tienes ningún mensaje recibido
            </div>';
            }
            
                ?>

    </div>



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