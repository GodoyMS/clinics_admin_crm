
      
<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];

   $select_clinica=$conn->prepare("SELECT * FROM `usuarios` WHERE id = ?");
   $select_clinica->execute([$user_id]);
   $fetch_clinica=$select_clinica->fetch(PDO::FETCH_ASSOC);

   //DISSMISSS NOTIFICATIONS ON DOM LOADED
   $updateNotificationsState= $conn->prepare("UPDATE `mensajes` SET estadoNotificacion = 'leido' WHERE clinica_id = ? AND direccion = 'pacienteAConsultorio' ");
   $updateNotificationsState->execute([$user_id]);

}else{
   $user_id = '';
   header('location:../index.php');

};





//UPDATE INFO CONSULTORIO
if(isset($_POST['submitActualizarInfoConsultorio'])){

    $nombreConsultorio = $_POST['nombreConsultorio'];
    $nombreConsultorio = filter_var($nombreConsultorio, FILTER_SANITIZE_STRING);
    $especialidad = $_POST['especialidad'];
    $especialidad = filter_var($especialidad, FILTER_SANITIZE_STRING);
    $distrito = $_POST['distrito'];
    $distrito = filter_var($distrito, FILTER_SANITIZE_STRING);
    $provincia = $_POST['provincia'];
    $provincia = filter_var($provincia, FILTER_SANITIZE_STRING);
    $departamento = $_POST['departamento'];
    $departamento = filter_var($departamento, FILTER_SANITIZE_STRING);
    $numeroConsultorio = $_POST['numeroConsultorio'];
    $numeroConsultorio = filter_var($numeroConsultorio, FILTER_SANITIZE_STRING);
    $emailConsultorio = $_POST['emailConsultorio'];
    $emailConsultorio = filter_var($emailConsultorio, FILTER_SANITIZE_STRING);
    $Direccion = $_POST['Direccion'];
    $Direccion = filter_var($Direccion, FILTER_SANITIZE_STRING);
   
    $idConsultorio=$user_id;
    

    $prevent_doble_paciente_actualizar_Nombre = $conn->prepare("SELECT * FROM `usuarios` WHERE id= ? ");
    $prevent_doble_paciente_actualizar_Nombre->execute([$idConsultorio]);
   
      $updateConsultorio1 = $conn->prepare("UPDATE `usuarios` SET nombreConsultorio = ? WHERE id = ? ");
      $updateConsultorio1->execute([$nombreConsultorio,$idConsultorio]);
      $updateConsultorio2 = $conn->prepare("UPDATE `usuarios` SET especialidad  = ? WHERE id = ? ");
      $updateConsultorio2->execute([$especialidad,$idConsultorio]);
      $updateConsultorio3 = $conn->prepare("UPDATE `usuarios` SET distrito  = ? WHERE id = ? ");
      $updateConsultorio3->execute([$distrito,$idConsultorio]);

      $updateConsultorio4 = $conn->prepare("UPDATE `usuarios` SET provincia = ? WHERE id = ? ");
      $updateConsultorio4->execute([$provincia,$idConsultorio]);
      $updateConsultorio5 = $conn->prepare("UPDATE `usuarios` SET departamento = ? WHERE id = ? ");
      $updateConsultorio5->execute([$departamento,$idConsultorio]);
      $updateConsultorio6 = $conn->prepare("UPDATE `usuarios` SET numeroConsultorio = ? WHERE id = ? ");
      $updateConsultorio6->execute([$numeroConsultorio,$idConsultorio]);
      $updateConsultorio7 = $conn->prepare("UPDATE `usuarios` SET emailConsultorio  = ? WHERE id = ? ");
      $updateConsultorio7->execute([$emailConsultorio,$idConsultorio]);
      $updateConsultorio8 = $conn->prepare("UPDATE `usuarios` SET Direccion = ? WHERE id = ? ");
      $updateConsultorio8->execute([$Direccion,$idConsultorio]);
 
    header('Location:consultorio.php');




 
    
  
 }

 

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes<?=$fetch_clinica['nombreConsultorio'];?></title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <link rel="icon" type="image/x-icon" href="../images/imgLogo/favicon.png">

</head>
<body>

<!-- component -->  
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-100  text-black ">
      <?php
        include '../components/dashboard/dashboard-header.php';
      ?>




      <!--INICIA CONTENIDO-->    
      <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
      <div id="successUploadedImgModal"></div>






       <!--COMO USAR MENSAJES--->
       <div class="flex justify-end pt-2">
                        <button class="text-blue-500 hover:text-blue-700   flex gap-2 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none " type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
                        <span>¿Para que sirve esta sección?</span>
                        <svg class="w-6 h-6"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>

                        </button>
                        </div>

                        <!-- drawer component -->
                        <div id="drawer-right-example" class="fixed z-40 h-screen p-4 overflow-y-auto bg-white w-80  transition-transform right-0 top-0 translate-x-full" tabindex="-1" aria-labelledby="drawer-right-label">
                            <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 "><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Informacion</h5>
                        <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center  " >
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close menu</span>
                        </button>
                        <p class="mb-6 text-sm text-gray-500  text-justify">Esta sección sirve para mantener una comunicación bilateral con tus pacientes. Aqui podrás comunicarte con cualquier paciente que este afiliado y con su cuenta activada. Esta sección es muy importante ya que recibiras notificaciones de solicitud de citas y solicitud de postergación de citas, pero no te precupes, podras saber si tienes notificaciones nuevas en el icono de mensajería en la parte superior. Tus pacientes tambíen podran escribirte por alguna inquietud, sugerencia o malestar, y podran recibir los mensajes que mandes por este canal como se muestra en la imágen</p>
                        <img src="./imgMensajes/ejemploMensaje.png">
                        
                       
                
                </div>






      <?php
            
 //SEND MESSAGE TO USER

if(isset($_POST['enviarMensaje'])){

    

    $idConsultorio=$_POST['idConsultorio'];
    $idConsultorio = filter_var($idConsultorio, FILTER_SANITIZE_STRING);
    $emailConsultorio=$_POST['emailConsultorio'];
    $emailConsultorio = filter_var($emailConsultorio, FILTER_SANITIZE_STRING);
    
    $dniPaciente = $_POST['dni'];
    $dniPaciente = filter_var($dniPaciente, FILTER_SANITIZE_STRING);

                //fetch hc
    $selectPaciente=$conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id = ? AND dni=? ");
    $selectPaciente->execute([$user_id,$dniPaciente]);
    $fetchPaciente=$selectPaciente->fetch(PDO::FETCH_ASSOC);


    $mensaje = $_POST['mensaje'];
    $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
    $direccion='consultorioAPaciente';
    date_default_timezone_set('America/New_York');

    $today=date("Y-m-d H:i");
    $insert_event = $conn->prepare("INSERT INTO `mensajes`(idPaciente,clinica_id,nombrePaciente,emailPaciente,emailConsultorio,mensaje,fecha,direccion) VALUES(?,?,?,?,?,?,?,?)");
    $insert_event->execute([$fetchPaciente['id'],$user_id,$fetchPaciente['nombrePaciente'],$fetchPaciente['correo'],$emailConsultorio,$mensaje,$today,$direccion]);
      

      echo '<script>document.getElementById("successUploadedImgModal").innerHTML=` <div id="toast-success" class=" mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow  " role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg  ">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Check icon</span>
      </div>
      <div class="ml-3 text-sm font-normal">Mensaje enviado </div>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-success" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
  </div>`</script>';
  



 }

      ?>


            
<!-- Modal toggle -->
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class=" flex gap-2 my-4 mx-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
  Redactar nuevo mensaje
  <svg class="h-6 w-6"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
</svg>
</button>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed  top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Nuevo mensaje</h3>
            </div>
                <form class="space-y-6 p-4" action="" method="post" >

                <input name="idConsultorio" hidden value="<?=$fetch_clinica['id'];?>">
                <input name="emailConsultorio" hidden value="<?=$fetch_clinica['emailConsultorio'];?>">


 

                      <label for="name" class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Para</label>
                        <label for="underline_select" class="sr-only">Underline select</label>
                       
                        <select name="dni" id="underline_select" required class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                            
                        <?php
                         $select_pacientes= $conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id = ? ");
                         $select_pacientes->execute([$user_id]);    
                         
                            while($fetchPacientes = $select_pacientes->fetch(PDO::FETCH_ASSOC)){

                        ?>
                            <option  value="<?=$fetchPacientes['dni'];?>"><?=$fetchPacientes['nombrePaciente'];?></option>
                            <?php
                            }
                            ?>
                           
                        </select>

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Tu mensaje</label>
                    <textarea id="message" name="mensaje" rows="4" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500      " placeholder="Escribe tu mensaje"></textarea>
                  
                
                    <button type="submit" name="enviarMensaje"class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Enviar</button>
                    
                </form>
            </div>

        </div>
        
   
</div> 






<h2 class="text-lg mt-8 mb-4 text-center text-gray-500     ">Mensajes recibidos</h2>
                    
        <?php
            //determine which page number visitor is currently on  

             //define total number of results you want per page  
             $results_per_page = 5;  

              if (!isset ($_GET['page']) ) {  
                $page = 1;  
            } else {  
                $page = $_GET['page'];  
            }  
            $page_first_result = ($page-1) * $results_per_page;  
      
        if($page>0){

       
       $select_mensajes=$conn->prepare("SELECT * FROM `mensajes`  WHERE clinica_id = ? AND direccion='pacienteAConsultorio' ORDER BY fecha DESC LIMIT ".$page_first_result .",".$results_per_page);
       $select_mensajes->execute([$user_id]);
       if($select_mensajes->rowCount()>0){
        while($fetch_mensajes=$select_mensajes->fetch(PDO::FETCH_ASSOC)){
            ?>
                <div class="px-2">
                <div id="toast-notification" style="max-width:40rem" class="my-2 mx-auto w-full  p-4 text-gray-900 bg-white rounded-lg shadow-lg  " role="alert">
                        <div class="flex justify-between items-center mb-3">
                            <span class="mb-1 text-sm font-semibold text-gray-900 "><?=$fetch_mensajes['fecha'];?></span>

                            <?php
                            if($fetch_mensajes['tipoMensaje']!=""){
                              ?>
                            <span class="bg-gray-200 p-2 rounded-lg text-xs   shadow-lg"> <?=$fetch_mensajes['tipoMensaje'];?></span>

                              <?php

                            }
                            ?>
                           
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
                                <div class="text-sm font-semibold text-gray-900 "><?=$fetch_mensajes['nombrePaciente'];?></div>
                                <div class="text-sm font-normal "><?=$fetch_mensajes['mensaje'];?></div> 
                                <span class="text-xs font-medium text-blue-600 "><?=$fetch_mensajes['emailPaciente'];?></span>   
                            </div>
                        </div>
                </div>
                </div>
        


            <?php


        }
       }
       }else{

        echo '<div style="max-width:500px"class="p-4 my-8 mx-auto text-sm text-gray-700 rounded-lg bg-gray-50  " role="alert">
         Aun no tienes ningún mensaje recibido
      </div>';
       }
       
        ?>

        <?php
        $selectTotalMessages=$conn->prepare("SELECT * FROM `mensajes`  WHERE clinica_id = ? AND direccion='pacienteAConsultorio' ORDER BY fecha DESC ");
        $selectTotalMessages->execute([$user_id]);        
        if($selectTotalMessages->rowCount()>0){

        
        ?>

        
        <!--PAGINATION-->
        <div class="flex flex-col items-center">
          <!-- Help text -->
          <span class="text-sm text-gray-700 ">
              Mostrando <span class="font-semibold text-gray-900 "><?=($page*5)-4;?></span> al <span class="font-semibold text-gray-900 "><?=($page*5)-5+$select_mensajes->rowCount();?></span> de <span class="font-semibold text-gray-900 "><?=$selectTotalMessages->rowCount();?></span> mensajes
          </span>
          <!-- Buttons -->
          <div class="inline-flex mt-2 gap-2 xs:mt-0">
              <?php
                  if($page <= 1 ){
                  ?>
                  <a  class="inline-flex  px-4 py-2 text-sm font-medium text-gray-200 bg-gray-500 rounded-l      ">
                  <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
    
                    Anterior
                  </a>
                  <?php
                  }else{              
                  ?>
                    <a  href="mensajes.php?page=<?=$page-1;?>"class="inline-flex px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-l hover:bg-blue-800     ">
                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
  
                    Anterior
                  </a>

                  <?php
                  }
              ?>

              <?php
                  if($page >= ceil($selectTotalMessages->rowCount()/5) ){
                  ?>
                  <a  class="inline-flex  px-4 py-2 text-sm font-medium text-white bg-gray-500 border-0 border-l border-gray-700 rounded-r      ">
                      Siguiente
                      <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

                  </a>
         
                  <?php
                  }else{              
                  ?>
              <a href="mensajes.php?page=<?=$page+1;?>" class="inline-flex  px-4 py-2 text-sm font-medium text-white bg-blue-600 border-0 border-l border-gray-700 rounded-r hover:bg-blue-800     ">
                  Siguiente
                  <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

              </a>

                  <?php
                  }
              ?>




          </div>
        </div>
        <?php
        }
        
        ?>

      
                

      <!--TERMINA CONTENIDO-->
    </div>
    </div>
</div>    


  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <!--Dark Mode-->


<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script>
// PREVENT RESEND FORMS
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>

</body>
</html>