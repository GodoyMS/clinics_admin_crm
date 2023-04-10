<?php
    
        include '../components/connect.php';

        session_start();

        if(isset($_SESSION['usuarios_pacientes'])){
        $userPaciente_id = $_SESSION['usuarios_pacientes'];
                //FETCH PACIENTE
                $selectpacienteId = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
                $selectpacienteId->execute([$userPaciente_id]);    
                $fetchPaciente = $selectpacienteId->fetch(PDO::FETCH_ASSOC);
        
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
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8  " data-dismiss-target="#toast-success" aria-label="Close">
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
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 "  data-dismiss-target="#alert-border-3" aria-label="Close">
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
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
            <!--CALENDAR.IO-->

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

<div style="min-height:100vh" class="flex flex-col  justify-between">
<div>
<div class=" mx-2    mt-4 items-center justify-center ">
    <div class="w-full max-w-md mx-auto">  
         <div class="px-7 bg-white shadow-lg  rounded-2xl ">
            <div class="flex flex-wrap">
                <div class="flex-1 group">
                    <a href="dashboard.php" class="flex items-end justify-center text-center mx-auto px-4 pt-2 w-full text-blue-500 ">
                        <span class="block px-1 pt-1 pb-2">
                        <svg fill="none" class="w-8 h-8 mb-2 mx-auto"stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path>
                        </svg>                            
                                 <span class="block  text-xs pb-1">Citas</span>
                                 <span class="block w-5 mx-auto h-1 bg-blue-500 rounded-full"></span>


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

<?php

    $citasPendientesConditional = $conn->prepare("SELECT * FROM `eventos` WHERE idPaciente= ? AND estado = 'Por confirmar' ");
    $citasPendientesConditional->execute([$userPaciente_id]);    

    if($citasPendientesConditional->rowCount()>0){

?>

<h2 class="text-lg  text-center text-gray-500    ">Citas por confirmar</h2>
<span class="block w-60 mx-auto h-1 rounded-full bg-blue-500"></span>
<?php
    }
?>


<?php

    $selectCitasConfirmar = $conn->prepare("SELECT * FROM `eventos` WHERE idPaciente= ? AND estado = 'Por confirmar' ");
    $selectCitasConfirmar->execute([$userPaciente_id]);    

    while($fetchCitaPendiente = $selectCitasConfirmar->fetch(PDO::FETCH_ASSOC)){

?>
<form action="" method="POST" class="px-4">
        <div style="max-width:60rem" class="rounded-lg bg-white shadow-lg  mx-auto  grid sm:grid-cols-2 m-4 gap-4 py-4 px-4 ">

                <div class="grid-rows-2 grid gap-4"> 
                        <div class="sm:grid-cols-2 grid  gap-4">
                            <div >
                                <h5 class="text-sm text-gray-500">Doctor<h5>
                                <p><?=$fetchCitaPendiente['doctor'];?></p> 

                            </div>
                            <div>
                                <h5 class="text-sm text-gray-500">Fecha<h5>
                                <p><?php 
                                
                                $fechaInicioShort=substr($fetchCitaPendiente['inicio'],0,16);
                                echo $fechaInicioShort;
                                
                                ?>
                                </p> 

                            </div>
                        </div>

                        <div>
                            <h5 class="text-sm text-gray-500">Descripción<h5>
                            <p><?=$fetchCitaPendiente['descripcion'];?></p> 

                        </div>

                
                </div>
                <div class="flex flex-wrap justify-around gap-4">
                            <div class="flex justify-center items-center">

                                <button type="submit" name="confirmarCita" class=" flex items-center  gap-1 text-white bg-gray-700 hover:bg-gray-800  focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-2.5    focus:outline-none">
                                    <span>Confirmar</span>
                                    <svg fill="none" stroke="currentColor" class="w-6 h-6 text-green-400" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>                        
                                </button>


                            </div>
                            <div class="flex justify-center items-center">
                                <input hidden type="text" value="<?=$fetchCitaPendiente['inicio'];?>" name="citaFechaInicio">
                                <button type="submit" name="cancelarCita" class=" flex items-center  gap-1 text-white bg-gray-700 hover:bg-gray-800  focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-2.5    focus:outline-none">
                                    <span>Cancelar</span>
                                    <svg fill="none" stroke="currentColor" class="w-6 h-6 text-red-400"  stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>

                                
                                </button>

                            </div>
                    
                        <div class="flex justify-center items-center">
                            
                                <a   href="postergar-cita.php?cita_id=<?=$fetchCitaPendiente['id'];?>"  class=" flex items-center  gap-1 text-white bg-gray-700 hover:bg-gray-800  focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-2.5    focus:outline-none">
                                <span>Postergar</span>
                                    <svg fill="none" stroke="currentColor" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"></path>
                                    </svg>

                            
                                </a>
                            

                        </div>


                       
















                </div>
                

        </div>
</form>
<?php
 }  
?>
 






</section>
<!--DISPLAY HISTORIAL CITAS-->

<section>
<h2 class="text-lg  text-center text-gray-500    ">Historial de citas</h2>
<span class="block w-60 mx-auto h-1 rounded-full bg-blue-500"></span>

<div class="p-4 shadow-lg relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Doctor
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Consulta
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                
            </tr>
        </thead>
        <tbody>
        <?php

            $selectTodoCitas = $conn->prepare("SELECT * FROM `eventos` WHERE idPaciente= ?  ");
            $selectTodoCitas->execute([$userPaciente_id]);    

            while($fetchCitaPendienteTodo = $selectTodoCitas->fetch(PDO::FETCH_ASSOC)){

          

            ?>
            <tr class="bg-white border-b ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <?=$fetchCitaPendienteTodo['doctor'];?>
                </th>
                <td class="px-6 py-4">
                <?php 
                
                    $fechaInicioShortCitaTodo=substr($fetchCitaPendienteTodo['inicio'],0,16);
                    echo $fechaInicioShortCitaTodo;
                    
                ?>

                </td>
                <td class="px-6 py-4">
                <?=$fetchCitaPendienteTodo['descripcion'];?>

                </td>
                <?php
                if($fetchCitaPendienteTodo['estado']=="Por confirmar"){
                    echo '<td class="  px-6 py-4"><span class="px-2 py-1  leading-tight text-gray-800 bg-gray-100 rounded-full ">'.$fetchCitaPendienteTodo["estado"].'</span></td>';
                };
                if($fetchCitaPendienteTodo['estado']=="Confirmado"){
                    echo '<td class="  px-6 py-4"><span class="px-2 py-1  leading-tight text-green-800 bg-green-200 rounded-full ">'.$fetchCitaPendienteTodo["estado"].'</span></td>';
                };
                if($fetchCitaPendienteTodo['estado']=="Cancelado"){
                    echo '<td class="  px-6 py-4"><span class="px-2 py-1  leading-tight text-red-800 bg-red-200 rounded-full ">'.$fetchCitaPendienteTodo["estado"].'</span></td>';
                };
                if($fetchCitaPendienteTodo['estado']=="Solicitud postergación"){
                    echo '<td class="  px-6 py-4"><span class="px-2 py-1  leading-tight text-yellow-800 bg-yellow-200 rounded-full ">'.$fetchCitaPendienteTodo["estado"].'</span></td>';
                };
                
                ?>


            </tr>
            <?php
              }
            ?>
           
           

        </tbody>
    </table>
</div>
   

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