<?php
    
        include '../components/connect.php';
        
        /*
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
*/
        session_start();
        

        if(isset($_SESSION['usuarios_pacientes'])){
        $userPaciente_id = $_SESSION['usuarios_pacientes'];
        
        //FETCH PACIENTE
        $selectpacienteId = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
        $selectpacienteId->execute([$userPaciente_id]);    
        $fetchPaciente = $selectpacienteId->fetch(PDO::FETCH_ASSOC);

        // GET EMAIL CLINICA
        $idClinica=$fetchPaciente['clinica_id'];
        $selectClinica= $conn->prepare("SELECT * FROM `usuarios` WHERE id = ? ");
        $selectClinica->execute([$idClinica]);    
        $fetchClinica = $selectClinica->fetch(PDO::FETCH_ASSOC);
        $emailClinica=$fetchClinica['emailConsultorio'];

        }else{
        $userPaciente_id = '';
        header('location:index.php');

        };
        

        if(isset($_POST['submitPostergarCita'])){

            if(isset($_GET['cita_id'])){
                $idEvento=$_GET['cita_id'];
            }




            $clinica_id=$fetchPaciente['clinica_id'];
            $nombrePaciente=$fetchPaciente['nombrePaciente'];
            $descripcion=$_POST['consulta'];
            $inicio = $_POST['startDate'];
            $inicio = filter_var($inicio, FILTER_SANITIZE_STRING); 

            date_default_timezone_set('America/New_York');
            $today=date("Y-m-d H:i");

            
            $insertsolicitarCita = $conn->prepare("INSERT INTO `solicitudesPostergacionCita`(idPaciente, clinica_id,nombrePaciente,descripcion,inicio,idEvento) VALUES(?,?,?,?,?,?)");
            $insertsolicitarCita->execute([$userPaciente_id,$clinica_id,$nombrePaciente,$descripcion,$inicio,$idEvento]);
            /*
            $clinica_id=$fetchPaciente['clinica_id'];
            $nombrePaciente=$fetchPaciente['nombrePaciente'];
            $descripcion=$_POST['consulta'];
            $inicio = $_POST['startDate'];
            $inicio = filter_var($inicio, FILTER_SANITIZE_STRING); 

            date_default_timezone_set('America/New_York');
            $today=date("Y-m-d H:i");
            
            $insertsolicitarCita = $conn->prepare("INSERT INTO `solicitudesCitas`(idPaciente, clinica_id,nombrePaciente,descripcion,inicio) VALUES(?,?,?,?,?)");
            $insertsolicitarCita->execute([$userPaciente_id,$clinica_id,$nombrePaciente,$descripcion,$inicio]);
            */
            /*
            //SEND EMAIL TO CLINIC

    
        
             $mail = new PHPMailer(true);
            
             try {
            //Server settings
            $mail->SMTPDebug = 0;                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            
            $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'bot-notificador@tech-millenial.tech';                     //SMTP username
            $mail->Password   = 'Crystalcave31!';                               //SMTP password
            $mail->SMTPSecure =  'ssl' ;          //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            //Recipients
            $mail->setFrom('bot-notificador@tech-millenial.tech');
            $mail->addAddress($emailClinica);     //Add a recipient
     
            
    
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nueva solicitud de cita';
            $mail->Body    = $nombrePaciente.' ha solicitado una cita para el día: '.$inicio.'. El motivo de la consulta es: '.$descripcion.' .';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
    
         } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }      
         */

        
         

        }

        if(isset($_POST['submitPostergarCita'])){
            $clinica_id=$fetchPaciente['clinica_id'];
            $nombrePaciente=$fetchPaciente['nombrePaciente'];
            $emailPaciente=$fetchPaciente['correo'];
            $emailConsultorio=$emailClinica;
            $consulta=$_POST['consulta'];
            $consulta = filter_var($consulta, FILTER_SANITIZE_STRING); 
            $inicio = $_POST['startDate'];
            $inicio = filter_var($inicio, FILTER_SANITIZE_STRING); 
            $inicio=substr($inicio,0,16);
            $mensaje= 'El paciente '.$nombrePaciente.' ha solicitado una postergación de cita para el dia '.$inicio.' . El motivo de la postergación es: '.$consulta;

            date_default_timezone_set('America/New_York');
            $fecha=date("Y-m-d H:i");
            $direccion="pacienteAConsultorio";
            $tipoMensaje="Solicitud postergación de cita";
            
            $insertsolicitarCita = $conn->prepare("INSERT INTO `mensajes`(idPaciente, clinica_id,nombrePaciente,emailPaciente,emailConsultorio,mensaje,fecha,direccion,tipoMensaje) VALUES(?,?,?,?,?,?,?,?,?)");
            $insertsolicitarCita->execute([$userPaciente_id,$clinica_id,$nombrePaciente,$emailPaciente,$emailConsultorio,$mensaje,$fecha,$direccion,$tipoMensaje]);
           
            if(isset($_GET['cita_id'])){
                $idCitaPostergar=$_GET['cita_id'];
            }
            //UPDATE ESTADO DE CITA EN EVENTOS
            $updateInhabilitadoState= $conn->prepare("UPDATE `eventos` SET estado = 'Solicitud postergación' WHERE idPaciente = ? AND id = ? ");
            $updateInhabilitadoState->execute([$userPaciente_id,$idCitaPostergar]); 
            echo '<div style="max-width:500px" class="p-4 mb-4 mx-auto text-sm text-green-700 bg-green-100 rounded-lg " role="alert">
            <span class="font-medium">¡Envío exitoso! </span> Se ha notificado tu solicitud a tu clinica. En breve te daran respuesta, asegurate de actualizar tu información de contacto. Podras ver tu cita agendada
            </div>';

         
         

        }



     ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postergar cita</title>
    <script src="https://cdn.tailwindcss.com"></script>

        <!--CALENDAR.IO-->
        <script src='components/fullcalendar-6.0.2/dist/index.global.js'></script>
    <script src='components/fullcalendar-6.0.2/packages/core/locales/es.global.js'></script>
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


<!--USER NAV ENDS-->
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
                    <a href="historia-clinica.php" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-blue-500  ">
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
                    <a href="consentimientos.php" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-gray-400 group-hover:text-blue-500 ">
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
                                    <span class="block w-5 mx-auto h-1 group-hover:bg-blue-500 rounded-full"></span>

                        </span>
                    </a>
                </div>
                <div class="flex-1 group">
                    <a href="solicitar-cita.php" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full  text-gray-400 group-hover:text-blue-500 ">
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




<h3 class="text-center mt-4 text-xl">Solicitud de postergación de cita</h3>




















<section style="margin-bottom:5rem" class="mb-8">

<?php
        if(isset($_GET['cita_id'])){

      
      $cita_id = $_GET['cita_id'];
      $selectCitaPostergar = $conn->prepare("SELECT * FROM `eventos` WHERE id = ? AND idPaciente = ? AND estado = 'Por Confirmar' ");
      $selectCitaPostergar->execute([$cita_id,$userPaciente_id]);
      if($selectCitaPostergar->rowCount() > 0){
        $fetchCitaPostergar = $selectCitaPostergar->fetch(PDO::FETCH_ASSOC);
        
   ?>

   <!-- drawer init and toggle -->
<div class="flex justify-end py-4">
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
   <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center " >
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      <span class="sr-only">Close menu</span>
   </button>
   <p class="mb-6 text-sm text-gray-500 text-justify">La agenda virtual se actualiza cada vez que un consultorio o clínica agenda una cita con un paciente. Contiene la información en vivo de la hora exacta del inicio y fin de las citas. Podras ver que las casillas de color ya estan ocupadas </p>
   <h6>Seleccionar un horario</h6>
   <p class="mb-6 text-sm text-gray-500">En la sección "semana" o "dia", has click en la fila que corresponda a la hora que desees tu cita. En caso desees que tu cita se programe a cualquier hora de un día, hacer click en un dia en la sección "Mes".</p>
   <h6>¿Que sigue?</h6>
   <p class="mb-6 text-sm text-gray-500">Cuando tu consultorio o clínica reciba tu solicitud, te informaran por Whatsapp o correo y podras ver tu cita agendada en esta misma sección.</p>

   
   
</div>


















<div class="px-4 pb-4"id="modalCalendar">
      <div class="calendarBig" id='calendar'></div>   
      <div class="calendarBigMobile"  id='calendarMobile'></div>   
</div> 
<?php
 }else{
    echo '<p class="text-center text-gray-500"></p>';
 }
}
?>

 
</section>



<script>
// PREVENT RESEND FORMS
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>



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
      start: 'listWeek',
      center: 'today',
      
    },
    

 
    select: function(info) {
       
        
      const singleEvent=calendar.addEvent({
            
            start:info.startStr,
            end:info.endStr,
        });
        modal.innerHTML=`  <div style="width:100%;height:100vh;position:absolute;background-color:rgba(0,0,0,0.7)"class="py-12   transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
                <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                    <div class="relative py-8 px-5 md:px-10 bg-white  shadow-md rounded border border-gray-400">
                        <div class="w-full flex justify-start text-gray-600 mb-3">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/left_aligned_form-svg1.svg" alt="icon"/>
                           
                        </div>
                        <form action="" method="post">
                        <input style="visibility:hidden" name="startDate" value='${singleEvent['startStr']}'>
                                                
                        <h1 class="text-gray-800  flex justify-center  font-lg font-bold tracking-normal leading-tight mb-4">Ingresar motivo postergación</h1>
    

                        
                        
                        <input type="text" id="consulta" name="consulta" class="mb-5 mt-2 text-gray-600   focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border"  placeholder=" " />
                        
                        

                        
                        
                        <div class="flex items-center justify-start w-full">
                            <button   type="submit" name="submitPostergarCita" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Solicitar cita</button>
                           <a href="solicitar-cita.php" class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm">Cancelar</a>
                        </div>
                        <a href="solicitar-cita.php" class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modal" role="button">
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
         $select_eventos->execute([$fetchPaciente['clinica_id']]);    
         
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
        title:'Ocupado',
        

        start: '<?=$fetch_eventos['inicio']; ?>',
        end:'<?=$fetch_eventos['fin']; ?>',
        color:'<?=$fetch_eventos['color']; ?>',
        

      },
      <?php
            }
        

    ?>
     
    ],
    
    nowIndicator: true,  
    contentHeight: 500,


  });

  calendar.render();
 
});

</script>

<?php
    include 'components/footer.php';
 ?>




<script src="js/changeDateNamePosition.js"></script>

<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>

</body>
</html>