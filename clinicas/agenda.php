<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:../index.php');

};

if(isset($_POST['submitAgendar'])){
    $doctor = $_POST['doctor'];
    $doctor = filter_var($doctor, FILTER_SANITIZE_STRING);
   $inicio = $_POST['startDate'];
   $inicio = filter_var($inicio, FILTER_SANITIZE_STRING);


   $inicioDay=substr( $_POST['startDate'],0,10);
   $inicioDay = filter_var($inicioDay, FILTER_SANITIZE_STRING); //yyyy-mm-dd

   $yearMonth=substr( $_POST['startDate'],0,7  );
   $yearMonth = filter_var($yearMonth, FILTER_SANITIZE_STRING); //yyyy-mm-dd



   $fin = $_POST['endDate'];
   $fin = filter_var($fin, FILTER_SANITIZE_STRING);
   $nombreCita = $_POST['nombrePaciente'];
   $nombreCita = filter_var($nombreCita, FILTER_SANITIZE_STRING);
   $descripcion = $_POST['descripcion'];
   $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
   $colored_radio=$_POST['colored-radio'];
   $colored_radio = filter_var($colored_radio, FILTER_SANITIZE_STRING);

   //SRIPT PARA PASAR EL ID DE PACIENTE A ID DE PACIENTE EN EVENTOS 
   $electIdPaciente = $conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id= ? AND nombrePaciente=?");
   $electIdPaciente->execute([$user_id,$nombreCita]);
   $fetchIdPaciente = $electIdPaciente->fetch(PDO::FETCH_ASSOC);
   $idPacien = $fetchIdPaciente['id'];
    //FIN SCRIPT

   //SCRIPT PARA OBTENER NOMBRECLINICA
   $selectClinica=$conn->prepare("SELECT * FROM `usuarios` WHERE id = ?");
   $selectClinica->execute([$user_id]);
   $fetchClinica = $selectClinica->fetch(PDO::FETCH_ASSOC);



   $prevent_double_event = $conn->prepare("SELECT * FROM `eventos` WHERE nombreEvento= ? AND inicio=?");
   $prevent_double_event->execute([$nombreCita,$inicio]);


  

   if($prevent_double_event->rowCount()== 0 ){
    $insert_event = $conn->prepare("INSERT INTO `eventos`(idPaciente, user_id,doctor,nombreEvento,descripcion,color, inicio,fin,inicioDay,yearMonth) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $insert_event->execute([$idPacien,$user_id,$doctor,$nombreCita,$descripcion,$colored_radio,$inicio,$fin,$inicioDay,$yearMonth]);
   }
/*
   $correoPaciente=$fetchIdPaciente['correo'];
   if($correPaciente =! ''){
   
            //SEND EMAIL TO CLINIC

    
        
             $mail = new PHPMailer(true);
            
             try {
            //Server settings
            $mail->SMTPDebug = 0;                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            
            $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'agenda-citas@tech-millenial.tech';                     //SMTP username
            $mail->Password   = 'Crystalcave31!';                               //SMTP password
            $mail->SMTPSecure =  'ssl' ;          //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            //Recipients
            $mail->setFrom('agenda-citas@tech-millenial.tech');
            $mail->addAddress($correoPaciente);     //Add a recipient
     
            
    
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nueva cita agendada de '.$fetchClinica['nombreConsultorio'];
            $mail->Body    ='Hola '.$nombreCita.', tu consultorio '.$fetchClinica['nombreConsultorio'].' te ha agendado una cita para el dia: '.$inicio.'. El motivo de la consulta es: '.$descripcion.'. Gracias por usar nuestros servicios.';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
    
         } catch (Exception $e) {
                echo "El mensaje gmail no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
         }      
        

   }
   */
   header('Location:agenda.php');
 
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />

    <!--CALENDAR.IO-->
    <script src='../components/fullcalendar-6.0.2/dist/index.global.js'></script>
    <script src='../components/fullcalendar-6.0.2/packages/core/locales/es.global.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
    <link rel="icon" type="image/x-icon" href="../images/imgLogo/favicon.png">


</head>
<body>

<!--CONFIRMAR CITA MODAL-->
    <script>
        
let modal = document.getElementById("modal");
function modalHandler(val) {
    if (val) {
        fadeIn(modal);
    } else {
        fadeOut(modal);
    }
}
function fadeOut(el) {
    el.style.opacity = 1;
    (function fade() {
        if ((el.style.opacity -= 0.1) < 0) {
            el.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })();
}
function fadeIn(el, display) {
    el.style.opacity = 0;
    el.style.display = display || "flex";
    (function fade() {
        let val = parseFloat(el.style.opacity);
        if (!((val += 0.2) > 1)) {
            el.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
}
</script>
<!--CONFIRMAR CITA MODAL ENDS-->

<!--CALENDAR FOR DESKTOP-->
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var initialLocaleCode = 'es';

  const modal=document.getElementById('modalCalendar');
 

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: initialLocaleCode,   
    selectable: true,
    initialView: 'timeGridWeek',
    navLinks:true,
    
/*
    views: {
      timeGridFour: {
        type: 'timeGridWeek',
        duration: { days: 4 },
        buttonText: 'Semana'
      }
      
    }, 
    */
   
    headerToolbar: {
        /*
      left: 'prev',
      center: 'title',
      right: 'next',//dayGridMonth,timeGridWeek,timeGridDay,listWeek
      */
         start: 'title',
      center: 'dayGridMonth,timeGridWeek,timeGridDay',
      end: 'prev,next'
      

    },

    footerToolbar: {
      start: 'listWeek listDay',
      center: 'today',
      end: 'prevYear,nextYear'
    },
    

 
    select: function(info) {
       
        
      const singleEvent=calendar.addEvent({
            
            start:info.startStr,
            end:info.endStr,
        });
        modal.innerHTML=`  <div style="width:100%;height:100vh;position:absolute;bottom:"class="py-12 bg-gray-700  transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
                <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                    <div class="relative py-8 px-5 md:px-10 bg-white   shadow-md rounded border border-gray-400">
                        <div class="w-full flex justify-start text-gray-600 mb-3">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/left_aligned_form-svg1.svg" alt="icon"/>
                           
                        </div>
                        <form action="" method="post">
                        <input style="visibility:hidden" name="startDate" value='${singleEvent['startStr']}'>

                         <input style="visibility:hidden" name="endDate" value='${singleEvent['endStr']}'>
                        <h1 class="text-gray-800  flex justify-center  font-lg font-bold tracking-normal leading-tight mb-4">Ingresar datos de la cita</h1>
                        <label for="name" class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Doctor a Cargo</label>
                        <label for="underline_select" class="sr-only">Underline select</label>
                       
                        <select name="doctor" id="underline_select" required class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                            
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

                        
                        <label for="paciente"  "class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Paciente</label>

<select name="nombrePaciente" id="underline_select" required class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                            
                        <?php
                         $select_paciente= $conn->prepare("SELECT * FROM `pacientes`  WHERE clinica_id = ? ORDER BY nombrePaciente ASC" );

                         $select_paciente->execute([$user_id]);    
                         
                            while($fetch_paciente = $select_paciente->fetch(PDO::FETCH_ASSOC)){

                        ?>
                            <option  value="<?=$fetch_paciente['nombrePaciente'];?>"><?=$fetch_paciente['nombrePaciente'];?></option>
                            <?php
                            }
                            ?>
                           
                        </select>
<!----->
                        
                        <label for="descripcion" class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Descripcion (opcional)</label>
                        <input type="text" id="descripcion" name="descripcion" class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"  placeholder="Endodoncia sesion 2" />
                        
                        <div class="grid grid-cols-3 grid-rows-2 py-4 gap-2">
                            <div class="flex items-center mr-4">
                                <input checked id="blue-radio" type="radio" value="#1C64F2" name="colored-radio" class="w-4 h-4 text-blue-500 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                <label for="blue-radio" class="ml-2 text-sm font-medium text-gray-900 ">Azul</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="red-radio" type="radio" value="#9B1C1C" name="colored-radio" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500   focus:ring-2  ">
                                <label for="red-radio" class="ml-2 text-sm font-medium text-gray-900 ">Rojo</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="green-radio" type="radio" value="#046C4E" name="colored-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500   focus:ring-2  ">
                                <label for="green-radio" class="ml-2 text-sm font-medium text-gray-900 ">Verde</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input  id="purple-radio" type="radio" value="#5521B5" name="colored-radio" class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500   focus:ring-2  ">
                                <label for="purple-radio" class="ml-2 text-sm font-medium text-gray-900 ">Púrpura</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="gris-radio" type="radio" value="#1F2937" name="colored-radio" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500   focus:ring-2  ">
                                <label for="gris-radio" class="ml-2 text-sm font-medium text-gray-900 ">Gris</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="yellow-radio" type="radio" value="#E3A008" name="colored-radio" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 focus:ring-yellow-500   focus:ring-2  ">
                                <label for="yellow-radio" class="ml-2 text-sm font-medium text-gray-900 ">Amarillo</label>
                            </div>
                            
                        </div>

                        
                        
                        <div class="flex items-center justify-start w-full">
                            <button   type="submit" name="submitAgendar" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Agendar</button>
                           <a href="agenda.php" class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm">Cancelar</a>
                        </div>
                        <a href="agenda.php" class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modal" role="button">
                            <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center py-12" id="button">
                <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 mx-auto transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-4 sm:px-8 py-2 text-xs sm:text-sm" onclick="modalHandler(true)">Open Modal</button>
            </div>
            
            
        
        
        `  },
    
   
    //editable: true,
    dayMaxEvents: true, // when too many events in a day, show the popover
    eventColor: 'green',

    events: [       

        

        <?php
         $select_eventos = $conn->prepare("SELECT * FROM `eventos` WHERE user_id = ? ");
         $select_eventos->execute([$user_id]);    
         
            while($fetch_eventos = $select_eventos->fetch(PDO::FETCH_ASSOC)){

                if($fetch_eventos['descripcion'] == NULL){
                    $title_description=[$fetch_eventos['nombreEvento']];

                }
                if($fetch_eventos['descripcion'] != NULL){
                    $title_description=[$fetch_eventos['nombreEvento'], $fetch_eventos['descripcion']];

                }

                ?>
                
               	

           

        

      {
        id:'<?=$fetch_eventos['id']; ?>',
        title:'<?=implode("-",$title_description) ?>',
        

        start: '<?=$fetch_eventos['inicio']; ?>',
        end:'<?=$fetch_eventos['fin']; ?>',
        color:'<?=$fetch_eventos['color']; ?>',
        

      },
      <?php
            }
        

    ?>
     
    ],
    
    nowIndicator: true,  
    contentHeight: 600,


  });

  calendar.render();
 
});

</script>




<!--CALENDAR FOR MOBILE-->
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendarMobile');
  var initialLocaleCode = 'es';

  const modal=document.getElementById('modalCalendar');
 

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: initialLocaleCode,   
    contentHeight: 600,
    selectable: true,
    initialView: 'timeGridFour',
    navLinks:true,
    

    views: {
      timeGridFour: {
        type: 'timeGridWeek',
        duration: { days: 4 },
        buttonText: 'Semana'
      }
      
    }, 
    
   
    headerToolbar: {
        /*
      left: 'prev',
      center: 'title',
      right: 'next',//dayGridMonth,timeGridWeek,timeGridDay,listWeek
      */
         start: 'title',
      center: 'dayGridMonth,timeGridFour,timeGridDay',
      end: 'prev,next'
      

    },

    footerToolbar: {
      start: 'listWeek listDay',
      center: 'today',
      end: 'prevYear,nextYear'
    },
    

 
    select: function(info) {
       
        
      const singleEvent=calendar.addEvent({
            
            start:info.startStr,
            end:info.endStr,
        });
        modal.innerHTML=`  <div style="width:100%;height:100vh;position:absolute;bottom:"class="py-12 bg-gray-700  transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
                <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                    <div class="relative py-8 px-5 md:px-10 bg-white   shadow-md rounded border border-gray-400">
                        <div class="w-full flex justify-start text-gray-600 mb-3">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/left_aligned_form-svg1.svg" alt="icon"/>
                           
                        </div>
                        <form action="" method="post">
                        <input style="visibility:hidden" name="startDate" value='${singleEvent['startStr']}'>

                         <input style="visibility:hidden" name="endDate" value='${singleEvent['endStr']}'>
                        <h1 class="text-gray-800  flex justify-center  font-lg font-bold tracking-normal leading-tight mb-4">Ingresar datos de la cita</h1>
                        <label for="name" class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Doctor a Cargo</label>
                        <label for="underline_select" class="sr-only">Underline select</label>
                       
                        <select name="doctor" id="underline_select" required class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                            
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

                        
                        <label for="paciente"  "class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Paciente</label>

<select name="nombrePaciente" id="underline_select" required class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                            
                        <?php
                         $select_paciente= $conn->prepare("SELECT * FROM `pacientes`  WHERE clinica_id = ? ORDER BY nombrePaciente ASC" );

                         $select_paciente->execute([$user_id]);    
                         
                            while($fetch_paciente = $select_paciente->fetch(PDO::FETCH_ASSOC)){

                        ?>
                            <option  value="<?=$fetch_paciente['nombrePaciente'];?>"><?=$fetch_paciente['nombrePaciente'];?></option>
                            <?php
                            }
                            ?>
                           
                        </select>
<!----->
                        
                        <label for="descripcion" class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Descripcion (opcional)</label>
                        <input type="text" id="descripcion" name="descripcion" class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"  placeholder="Endodoncia sesion 2" />
                        
                        <div class="grid grid-cols-3 grid-rows-2 py-4 gap-2">
                            <div class="flex items-center mr-4">
                                <input checked id="blue-radio" type="radio" value="#1C64F2" name="colored-radio" class="w-4 h-4 text-blue-500 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                <label for="blue-radio" class="ml-2 text-sm font-medium text-gray-900 ">Azul</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="red-radio" type="radio" value="#9B1C1C" name="colored-radio" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500   focus:ring-2  ">
                                <label for="red-radio" class="ml-2 text-sm font-medium text-gray-900 ">Rojo</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="green-radio" type="radio" value="#046C4E" name="colored-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500   focus:ring-2  ">
                                <label for="green-radio" class="ml-2 text-sm font-medium text-gray-900 ">Verde</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input  id="purple-radio" type="radio" value="#5521B5" name="colored-radio" class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500   focus:ring-2  ">
                                <label for="purple-radio" class="ml-2 text-sm font-medium text-gray-900 ">Púrpura</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="gris-radio" type="radio" value="#1F2937" name="colored-radio" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 focus:ring-gray-500   focus:ring-2  ">
                                <label for="gris-radio" class="ml-2 text-sm font-medium text-gray-900 ">Gris</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="yellow-radio" type="radio" value="#E3A008" name="colored-radio" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 focus:ring-yellow-500   focus:ring-2  ">
                                <label for="yellow-radio" class="ml-2 text-sm font-medium text-gray-900 ">Amarillo</label>
                            </div>
                            
                        </div>

                        
                        
                        <div class="flex items-center justify-start w-full">
                            <button   type="submit" name="submitAgendar" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Agendar</button>
                           <a href="agenda.php" class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm">Cancelar</a>
                        </div>
                        <a href="agenda.php" class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modal" role="button">
                            <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center py-12" id="button">
                <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 mx-auto transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-4 sm:px-8 py-2 text-xs sm:text-sm" onclick="modalHandler(true)">Open Modal</button>
            </div>
            
            
        
        
        `  },
    
   
    //editable: true,
    dayMaxEvents: true, // when too many events in a day, show the popover
    eventColor: 'green',

    events: [       

        

        <?php
         $select_eventos = $conn->prepare("SELECT * FROM `eventos` WHERE user_id = ? ");
         $select_eventos->execute([$user_id]);    
         
            while($fetch_eventos = $select_eventos->fetch(PDO::FETCH_ASSOC)){

                if($fetch_eventos['descripcion'] == NULL){
                    $title_description=[$fetch_eventos['nombreEvento']];

                }
                if($fetch_eventos['descripcion'] != NULL){
                    $title_description=[$fetch_eventos['nombreEvento'], $fetch_eventos['descripcion']];

                }

                ?>
                
               	

           

        

      {
        id:'<?=$fetch_eventos['id']; ?>',
        title:'<?=implode("-",$title_description) ?>',
        

        start: '<?=$fetch_eventos['inicio']; ?>',
        end:'<?=$fetch_eventos['fin']; ?>',
        color:'<?=$fetch_eventos['color']; ?>',
        

      },
      <?php
            }
        

    ?>
     
    ],
    
    nowIndicator: true,  
  });

  calendar.render();
 
});




</script>

<!-- component -->  
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white  text-black ">
      <?php
        include '../components/dashboard/dash-board-header-agenda.php';
      ?>




      <!--INICIA CONTENIDO-->    
      <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

            <!--COMO USAR AGENDA VIRTUAL--->
                <div class="flex justify-end pt-2">
                        <button class="text-blue-500 hover:text-blue-700 flex gap-2 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none " type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
                        <span>¿Como usar la agenda virtual?</span>
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
                        <p class="mb-6 text-sm text-gray-500  text-justify">La agenda virtual se actualiza cada vez que agendes una cita con un paciente. Contiene la información en vivo de la hora exacta del inicio y fin de las citas. Tus pacientes podran ver los horarios disponibles y ocupados desde su misma agenda personal virtual, también podran solicitar una cita desde su propia cuenta en los horarios disponibles. Asimismo, tus pacientes solo podran ver la información del horario, tal como se muestra en la imágen, esto te permite mantener un control total de tus citas e información personal.</p>
                        <img src="./imgAgenda/ejemploAgenda.png">
                        <h6 class=" mt-4">Agendar una cita</h6>
                        <p class="mb-6 text-sm text-gray-500  text-justify ">En la sección "semana" o "dia", has click en la fila que corresponda a la hora de inicio y sin soltar el cursor (mantener presionado en móbil), arrastra hasta la hora de fin.  En caso desees que tu cita se programe para un dia completo con un paciente, hacer click en un dia en la sección "Mes", esta acción llenara tu agenda de un dia completo.</p>
                        <h6 class=" ">¿Que sigue?</h6>
                        <p class="mb-6 text-sm text-gray-500  text-justify">Después de ello y completar el formulario que aparece, podrás ver tus citas agendadas en la sección citas. Puedes notificar a tu paciente directamente por Whatsapp 
                        desde esa sección a tu paciente haciendo click  en los 3 puntos. Asimismo el propio sistema manda un correo automaticamente a tu paciente despues de agendar la cita, y tu paciente lo podra <strong>confirmar, cancelar o solicitar su postergación</strong></p>

                
                
                </div>
                    

      <div id="modalCalendar">
      <div class="calendarBig" id='calendar'></div>   
      <div class="calendarBigMobile"  id='calendarMobile'></div>   

    
    
        </div>

      


    
      

      </div>

      <!--TERMINA CONTENIDO-->

    </div>
    
</div>    

<style>     

            #calendar{
                display:none;
            }

            #calendarMobile{
                display:block;
            }

        @media (min-width:600px) {
            #calendar{
                display:block;
            }

            #calendarMobile{
                display:none;
            }
            
        }















            .calendarBig{
                padding:0rem;
            }
            .calendarBigMobile{
                padding:1rem;
            }
            @media (min-width:500px) {
            .calendarBig{
                padding:2rem;
            }
            
        }

        @media (min-width:748px) {
            .calendarBig{
                padding:2rem;
            }
            
        }

</style>

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <!--Dark Mode-->

<!--CURRENT TIME-->
<!-- <div id="clock" onclick="currentTime()"></div> -->

    <script type="text/javascript">
    function currentTime() {
    var date = new Date(); /* creating object of Date class */
    var hour = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
    hour = updateTime(hour);
    min = updateTime(min);
    sec = updateTime(sec);
    var y = date.getFullYear();
    var d = new Date();
    var weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Jueves";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";
  var n = weekday[d.getDay()];
    document.getElementById("clock").innerText = hour + " : " + min + " , " + n + " , " + y; /* adding time to the div */
      var t = setTimeout(function(){ currentTime() }, 1000); /* setting timer */
}
  function updateTime(k) {
    if (k < 10) {
      return "0" + k;
    }
    else {
      return k;
    }
  }
  currentTime(); /* calling currentTime() function to initiate the process */
    </script>


<script src="js/changeButtonsName.js"></script>
<script src="js/changeDateNamePosition.js"></script>


<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>


</body>
</html>