
      
<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:../index.php');

};

if(isset($_POST['submitPacienteNuevo'])){
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
    
 
    $prevent_doble_paciente = $conn->prepare("SELECT * FROM `pacientes` WHERE nombrePaciente= ? ");
    $prevent_doble_paciente->execute([$nombrePaciente]);
    if($prevent_doble_paciente->rowCount()== 0 ){
     $insert_event = $conn->prepare("INSERT INTO `pacientes`(clinica_id,nombrePaciente,sexo,telefonoPaciente, edadPaciente,ciudadPaciente) VALUES(?,?,?,?,?,?)");
     $insert_event->execute([$user_id,$nombrePaciente,$sexoPaciente,$telefonoPaciente,$edadPaciente,$ciudadPaciente]);
    };
    
    header('location:pacientes.php');
  
 }
 

 if(isset($_POST['submitPostergarEvento'])){

  $idEvento= $_POST['idEvento'];
  //FECHA Y HORA INICIO UPDATE
  //fecha Inicio
  $fechaInicio=$_POST['fechaInicioPostergar']; // yyyy/mm/dd
  $formattedDateInicio = explode("/", $fechaInicio);
  $fechaInicioNuevoFormato=$formattedDateInicio[0].'-'.$formattedDateInicio[1].'-'.$formattedDateInicio[2];

  //Hora Inicio
  $horaInicio=$_POST['horaInicioPostergar'];
  //Juntamos Fecha y hora Inicio
  $inicio=$fechaInicioNuevoFormato.' '.$horaInicio.':00.000000'; 
  //FECHA Y HORA INICIO UPDATE


  //FECHA Y HORA FIN UPDATE   
  //fecha fin
  $fechaFin=$_POST['fechaFinPostergar']; // yyyy/mm/dd
  $formattedDateFin = explode("/", $fechaFin);
  $fechaFinNuevoFormato=$formattedDateFin[0].'-'.$formattedDateFin[1].'-'.$formattedDateFin[2];

  //Hora fin
  $horaFin=$_POST['horaFinPostergar'];

  //Juntamos Fecha y hora fin
  $fin=$fechaFinNuevoFormato.' '.$horaFin.':00.000000';


  //FECHA Y HORA FIN UPDATE   

 
  $updateEventoFin = $conn->prepare("UPDATE `eventos` SET fin = ? WHERE id = ?");
  $updateEventoFin->execute([$fin,$idEvento]);
  $updateEventoInicio = $conn->prepare("UPDATE `eventos` SET inicio = ? WHERE id = ?");
  $updateEventoInicio->execute([$inicio,$idEvento]);

  $updateEventoEstado = $conn->prepare("UPDATE `eventos` SET estado = 'Por confirmar' WHERE id = ?");
  $updateEventoEstado->execute([$idEvento]);


  header('location:citas.php');


}


 if(isset($_POST['submitCancelarCita'])){

    $idCita = $_POST['idEvento'];
    $deleteEvento = $conn->prepare("DELETE FROM `eventos` WHERE id = ?");
    $deleteEvento->execute([$idCita]);
    header('location:citas.php');


  
 }


if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
  $url = "https://";   

}   
else {
  $url = "http://";   

} 
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    


$currentLink=explode('clinicas',$url);
$clientURL='https://alpha-clinicas.com/usuarios';
$clientURLRegistro='https://alpha-clinicas.com/usuarios/registrar.php';




?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas </title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <script src="../components/datepicker/datepicker-flowbite.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/imgLogo/favicon.png">


</head>
<body>



<!-- component -->  
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white  text-black ">
      <?php
        include '../components/dashboard/dashboard-header.php';
      ?>




      <!--INICIA CONTENIDO-->    
      <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

      <!--REGISTRAR NUEVO PACIENTE-->


      







      
<!-- Modal toggle -->
<div class="flex justify-around items-center flex-wrap">
<a href="agenda.php">
<button  class=" flex gap-2 my-4 mx-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
  Agendar nueva cita 
  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
</button>
</a>

<div class="flex justify-center  text-gray-500 rounded-lg bg-gray-100 p-2 " id="MyClockDisplay" class="clock" onload="showTime()"></div>
</div>











<script type="text/javascript">

function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    if(h == 12){
      var session = "PM";

    }
    
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();








    </script>



        
    

    

    
        <!-- Client Table -->
        <div class="mt-4 mx-4">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">





          <!---->
        <?php
         $select_eventoHoy = $conn->prepare("SELECT * FROM `eventos` WHERE user_id = ? AND inicioDay = ? ORDER BY inicio DESC");
         date_default_timezone_set('America/New_York');

         $today=date("Y-m-d");
         $select_eventoHoy->execute([$user_id,$today]); 

         ?>
         <?php
           if($select_eventoHoy->rowCount()>0){

         ?>
          

         
         


         <!--TODAY BEFORE THEN-->
         <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-400 uppercase border-t  bg-gray-50 sm:grid-cols-9  ">
           
            <span class="flex items-center col-span-3"> HOY </span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
              
          </div>


         <!---->













            <div class="w-full overflow-x-auto">
              <table class="w-full  mb-8">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50  ">
                    <th class="px-4 py-3">Paciente</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Consulta</th>
                    
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Accion</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y  ">

               

         <?php
                   
         
            while($fetch_evento = $select_eventoHoy->fetch(PDO::FETCH_ASSOC)){ 
                       include '../utils/printCitasHoy.php';             
          }


                ?>                 
                  
                </tbody>
              </table>
            </div>
            <?php
           }
         ?>
            <!--FIN HOY-->

            <!--FUTURO--->





               <!---->
               <?php
         $select_eventoFuturo = $conn->prepare("SELECT * FROM `eventos` WHERE user_id = ? AND inicioDay > ? ORDER BY inicio DESC");
         date_default_timezone_set('America/New_York');

         $today=date("Y-m-d");
         $select_eventoFuturo->execute([$user_id,$today]);
         

         ?>
         
         


         <!--TODAY BEFORE THEN-->
         <?php
         if($select_eventoFuturo->rowCount()>0){
          ?>
         
         

         <div class="grid px-4 py-3 text-xs font-semibold tracking-wide rounded-lg text-gray-400 uppercase border-t  bg-gray-50 sm:grid-cols-9  ">
           
            <span class="flex items-center col-span-3">CITAS FUTURAS  </span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
             
            </div>


         <!---->
        
        













            <div class="w-full  overflow-x-auto">
              <table class="w-full  mb-8">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50  ">
                    <th class="px-4 py-3">Paciente</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Consulta</th>
                    
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Accion</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y  ">

               

         <?php
                   
         
            while($fetch_evento = $select_eventoFuturo->fetch(PDO::FETCH_ASSOC)){ 
                       include '../utils/printCitasHoy.php';             
          }
          ?>
          </tbody>
              </table>
            </div>

            <?php
        };
        ?>
            <!--FIN FUTURO-->









            <!--BEFORE--->





        <?php
         $select_eventoBefore = $conn->prepare("SELECT * FROM `eventos` WHERE user_id = ? AND inicioDay < ? ORDER BY inicio DESC");
         date_default_timezone_set('America/New_York');

         $today=date("Y-m-d");

         $select_eventoBefore->execute([$user_id,$today]); 
         ?>
         
         


         <!--TODAY BEFORE THEN-->
         <?php
         if($select_eventoBefore->rowCount()>0){
          ?>
         

        
         <div class="grid px-4 py-3 rounded-lg text-xs font-semibold tracking-wide text-gray-400 uppercase border-t  bg-gray-50 sm:grid-cols-9  ">
           
            <span class="flex items-center col-span-3"> CITAS PASADAS</span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
              <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                  <ul class="inline-flex items-center">
                  
                  </ul>
                </nav>
              </span>
            </div>


         <!---->
        












            <div class="w-full overflow-x-auto">
              <table class="w-full ">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50  ">
                    <th class="px-4 py-3">Paciente</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Consulta</th>
                    
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Accion</th>
                  </tr>
                </thead>
                <tbody class="bg-gray-white divide-y  ">

               

         <?php
                   
         
            while($fetch_evento = $select_eventoBefore->fetch(PDO::FETCH_ASSOC)){ 
                       include '../utils/printCitasHoy.php';             
          }
          ?>
          </tbody>
              </table>
            </div>
            <?php
        }
        ?>
            <!--FIN BEFORE-->



            <div class="grid px-4 py-3 text-xs rounded-lg  font-semibold tracking-wide text-gray-500 uppercase   bg-gray-100    border-t shadow-lg  ">
            <?php
                $contarcitas = $conn->prepare("SELECT * FROM `eventos` WHERE user_id= ? ");
                $contarcitas ->execute([$user_id]);
                
                ?>  
            <span class="flex items-center col-span-3"> Total: <?=$contarcitas->rowCount() ;?> citas </span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
             
            </div>
          </div>
        </div>
        <!-- ./Client Table -->
    
     
    
        

      </div>

      <!--TERMINA CONTENIDO-->

    </div>
</div>    

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <!--Dark Mode-->


<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="enviarMssg.js"></script>


</body>
</html>