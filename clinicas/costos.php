
      
<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:../index.php');

};

if(isset($_POST['submitIngresoEgreso'])){

    $IdnamePaciente=explode('--',$_POST['paciente']);
    $paciente = $IdnamePaciente['0'];
    $paciente = filter_var($paciente, FILTER_SANITIZE_STRING);

    $pacienteId=  $IdnamePaciente['1'];
    $pacienteId = filter_var($pacienteId, FILTER_SANITIZE_STRING);


    $doctor = $_POST['doctor'];
    $doctor = filter_var($doctor, FILTER_SANITIZE_STRING);
    $concepto = $_POST['concepto'];
    $concepto = filter_var($concepto, FILTER_SANITIZE_STRING);
    $monto = $_POST['monto'];
    $monto = filter_var($monto, FILTER_SANITIZE_STRING);

    $year = $_POST['year'];
    $year = filter_var($year, FILTER_SANITIZE_STRING);
    $month = $_POST['month'];
    $month = filter_var($month, FILTER_SANITIZE_STRING);
    $modo = $_POST['modo'];
    $modo = filter_var($modo, FILTER_SANITIZE_STRING);
    $now = $_POST['now'];
    $now = filter_var($now, FILTER_SANITIZE_STRING);

    $insert_event = $conn->prepare("INSERT INTO `costos`(clinica_id,pacienteId,paciente,doctor,concepto,monto, year_,month_,modo,nowDate) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $insert_event->execute([$user_id,$pacienteId,$paciente,$doctor,$concepto,$monto,$year,$month,$modo,$now]);
    header('Location:costos.php');

  
 }


 if(isset($_POST['submitEgreso'])){
  $paciente = $_POST['paciente'];
  $paciente = filter_var($paciente, FILTER_SANITIZE_STRING);

  $doctor = $_POST['doctor'];
  $doctor = filter_var($doctor, FILTER_SANITIZE_STRING);
  $concepto = $_POST['concepto'];
  $concepto = filter_var($concepto, FILTER_SANITIZE_STRING);
  $monto = $_POST['monto'];
  $monto = '-'.filter_var($monto, FILTER_SANITIZE_STRING);

  $year = $_POST['year'];
  $year = filter_var($year, FILTER_SANITIZE_STRING);
  $month = $_POST['month'];
  $month = filter_var($month, FILTER_SANITIZE_STRING);
  $modo = $_POST['modo'];
  $modo = filter_var($modo, FILTER_SANITIZE_STRING);
  $now = $_POST['now'];
  $now = filter_var($now, FILTER_SANITIZE_STRING);

  $insert_event = $conn->prepare("INSERT INTO `costos`(clinica_id,paciente,doctor,concepto,monto, year_,month_,modo,nowDate) VALUES(?,?,?,?,?,?,?,?,?)");
  $insert_event->execute([$user_id,$paciente,$doctor,$concepto,$monto,$year,$month,$modo,$now]);
  header('Location:costos.php');

}

if(isset($_POST['deleteIngresoEgreso'])){
  $idIngresoEgreso = $_POST['idEgresoingreso'];
  $deleteIngresoEgreso = $conn->prepare("DELETE FROM `costos` WHERE id = ?");
  $deleteIngresoEgreso->execute([$idIngresoEgreso]);
  header('location:costos.php');


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
    <title>Costos </title>
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
<button   data-modal-target="ingreso-modal"  data-modal-toggle="ingreso-modal" class=" flex gap-2 my-4 mx-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
  Nuevo ingreso
  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
</button>

<button  data-modal-target="egreso-modal"  data-modal-toggle="egreso-modal" class=" flex gap-2 my-4 mx-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
  Nuevo egreso
  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
</button>     


<!-- Ingreso modal -->
<div id="ingreso-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="ingreso-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Nuevo ingreso</h3>
                <form class="space-y-6" action=" " method="POST">

                             <?php
                              date_default_timezone_set('America/New_York');

                             $now=date("Y-m-d H:i");  
                             $year=date("Y");
                             $month=date("m");

                             $select_doctor= $conn->prepare("SELECT * FROM `doctores` WHERE clinica_id = ? ");
                            $select_doctor->execute([$user_id]);   
                            //$fetch_doc=$select_doctor->fetch(PDO::FETCH_ASSOC);

                            $select_paciente= $conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id = ? ");
                            $select_paciente->execute([$user_id]); 
                            //$fetch_pac= $select_paciente->fetch(PDO::FETCH_ASSOC);
                             ?>
                        <!-- <input hidden type="text" name="idPaciente" value="<?=$fetch_pac['id'];?>">   
                        <input hidden type="text" name="clinica_id" value="<?=$fetch_doc['clinica_id'];?>">  

                        <input hidden type="text" name="nombrePaciente" value="<?=$fetch_pac['nombrePaciente'];?>">    
                        <input hidden type="text" name="clinica_id" value="<?=$fetch_doc['clinica_id'];?>">   -->

                        <input hidden type="text" name="now" value="<?=$now;?>">

                        <input hidden type="text" name="year" value="<?=$year;?>">
                        <input hidden type="text" name="month" value="<?=$month;?>">
                        <input hidden type="text" name="modo" value="ingreso" />
                        <label for="name" class="text-gray-800    text-sm font-bold leading-tight tracking-normal">Doctor</label>
                       
                        <select name="doctor" id="underline_select"  style="margin-top:0.5rem;margin-bottom:1rem" class=" text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                        <option value="" selected>Escoger un doctor (opcional)</option>

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
                           
                          
                    
                       <label for="name"  class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Paciente</label>
                       
                        <select name="paciente" id="underline_select" style="margin-top:0.5rem"   class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                        <option value="" selected>Escoger un paciente (opcional)</option>
   
                        <?php
                            

                        
                         
                            while($fetch_paciente = $select_paciente->fetch(PDO::FETCH_ASSOC)){

                        ?>
                            <option  value="<?=$fetch_paciente['nombrePaciente'];?>--<?=$fetch_paciente['id'];?>"><?=$fetch_paciente['nombrePaciente'];?></option>
                            <?php
                            }
                            ?>
                           
                        </select>

                        <div>
                          <label for="concepto" class="block mb-2 text-sm font-medium text-gray-900 ">Concepto</label>
                          <input type="text" name="concepto" id="concepto" required placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
                        </div>
                        <input hidden type="text" value="">
                        <div>
                          <label for="monto" class="block mb-2 text-sm font-medium text-gray-900 ">Monto</label>
                          <div style="grid-template-columns: 50px 1fr;" class="grid gap-2">
                          <span class="h-full flex items-center justify-center bg-gray-50  rounded-lg border border-gray-500"> S/.</span>
                          <input type="number" name="monto" id="monto" required placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>

                          </div>
                        </div>

                   
                    <button type="submit" name="submitIngresoEgreso" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Registrar Ingreso</button>
                    
                </form>
            </div>
        </div>
    </div>
</div> 



<!-- Egreso modal -->
<div id="egreso-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="egreso-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Nuevo egreso</h3>
                <form class="space-y-6" action=" " method="POST">

                             <?php
                              date_default_timezone_set('America/New_York');

                             $now=date("Y-m-d H:i");  
                             $year=date("Y");
                             $month=date("m");

                             $select_doctor= $conn->prepare("SELECT * FROM `doctores` WHERE clinica_id = ? ");
                            $select_doctor->execute([$user_id]);   
                            //$fetch_doc=$select_doctor->fetch(PDO::FETCH_ASSOC);

                            $select_paciente= $conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id = ? ");
                            $select_paciente->execute([$user_id]); 
                            //$fetch_pac= $select_paciente->fetch(PDO::FETCH_ASSOC);
                             ?>
                        <!-- <input hidden type="text" name="idPaciente" value="<?=$fetch_pac['id'];?>">   
                        <input hidden type="text" name="clinica_id" value="<?=$fetch_doc['clinica_id'];?>">  

                        <input hidden type="text" name="nombrePaciente" value="<?=$fetch_pac['nombrePaciente'];?>">    
                        <input hidden type="text" name="clinica_id" value="<?=$fetch_doc['clinica_id'];?>">   -->

                        <input hidden  name="now" value="<?=$now;?>">

                        <input hidden type="text" name="year" value="<?=$year;?>">
                        <input hidden type="text" name="month" value="<?=$month;?>">
                        <input hidden type="text" name="modo" value="egreso" />
                        <label for="name" class="text-gray-800    text-sm font-bold leading-tight tracking-normal">Doctor</label>
                       
                        <select name="doctor" id="underline_select"  style="margin-top:0.5rem;margin-bottom:1rem" class=" text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                        <option value="" selected>Escoger un doctor (opcional)</option>

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
                           
                          
                    
                       <label for="name"  class="text-gray-800   text-sm font-bold leading-tight tracking-normal">Paciente</label>
                       
                        <select name="paciente" id="underline_select" style="margin-top:0.5rem"   class="mb-5 mt-2 text-gray-600     focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border">
                        <option value="" selected>Escoger un paciente (opcional)</option>
   
                        <?php
                            

                        
                         
                            while($fetch_paciente = $select_paciente->fetch(PDO::FETCH_ASSOC)){

                        ?>
                            <option  value="<?=$fetch_paciente['nombrePaciente'];?>"><?=$fetch_paciente['nombrePaciente'];?></option>
                            <?php
                            }
                            ?>
                           
                        </select>

                        <div>
                          <label for="concepto" class="block mb-2 text-sm font-medium text-gray-900 ">Concepto</label>
                          <input type="text" name="concepto" id="concepto" required placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
                        </div>
                        <input hidden type="text" value="">
                        <div>
                          <label for="monto" class="block mb-2 text-sm font-medium text-gray-900 ">Monto</label>
                          <div style="grid-template-columns: 50px 1fr;" class="grid gap-2">
                          <span class="h-full flex items-center justify-center bg-gray-50  rounded-lg border border-gray-500"> S/.</span>
                          <input type="number" name="monto" id="monto" required placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>

                          </div>
                        </div>

                   
                    <button type="submit" name="submitEgreso" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Registrar Ingreso</button>
                    
                </form>
            </div>
        </div>
    </div>
</div> 

</div>


<style>
.shadow-white {
  --tw-shadow-color: rgba(255,255,255,0.1);
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:shadow-white{
  --tw-shadow: 0 2px 5px 0px rgba(255, 255, 255, 0.08);
  --tw-shadow-colored: 0 2px 5px 0px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
</style>
<!--COSTOS TABLE--->
 <!--TODAY BEFORE THEN-->
          <?php

            for ($x = 2030; $x >= 2023; $x--) {
              $select_costosYear= $conn->prepare("SELECT * FROM `costos` WHERE clinica_id = ? AND year_=?  ");
              $select_costosYear->execute([$user_id,$x]); 
              if($select_costosYear->rowCount()>0){
                    for($y=12;$y >=1;$y--){

                      $select_costosMonth= $conn->prepare("SELECT * FROM `costos` WHERE clinica_id = ? AND month_=? AND year_=? ORDER BY nowDate DESC ");
                      $select_costosMonth->execute([$user_id,$y,$x]);
                      if($select_costosMonth->rowCount()>0){
                        $mesesNames=['Nothin','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Sep','Oct','Nov','Dic'];

                        

                          ?>

                           <div style="" class="mx-4 my-8  relative overflow-x-auto shadow-md sm:rounded-lg">

                              <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-400 uppercase border-t  bg-gray-50 sm:grid-cols-9  ">
                                
                                <span class="flex items-center col-span-3"> <?=$mesesNames[$y].' - '.$x;?> </span>
                                  <span class="col-span-2"></span>
                                  <!-- Pagination -->
                                  
                              </div>


                            <table class="w-full text-sm text-left text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50  ">
                                        <th scope="col" class="px-6 py-3">
                                            Paciente
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Doctor
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Concepto
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Monto
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  while($fetch_costosMonth = $select_costosMonth->fetch(PDO::FETCH_ASSOC)){
                                  ?>
                                    <tr class="bg-white border-b   hover:bg-gray-50 ">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            <?=$fetch_costosMonth['paciente'];?>
                                        </th>
                                        <td class="px-6 py-4">
                                        <?=$fetch_costosMonth['doctor'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                        <?=$fetch_costosMonth['concepto'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php
                                            if($fetch_costosMonth['modo']=='ingreso'){
                                              echo '<span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full   ">S/. '.$fetch_costosMonth['monto'].'</span>';
                                            }else{
                                              echo '<span class="px-2 py-1  leading-tight  rounded-full text-red-800 bg-red-200 ">S/. '.$fetch_costosMonth['monto'].'</span>';

                                            }
                                            ?>
                                        </td>
                                        
                                        <td class="px-6 py-4 text-right">
                                          <form action=" " method="POST">
                                              <input hidden type="text" name="idEgresoingreso" value="<?=$fetch_costosMonth['id'];?>">

                                            <button type="submit" name="deleteIngresoEgreso" class="font-medium text-blue-600  hover:underline">Eliminar</button>

                                          </form>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                     };
                                     
                                     ?>
                                    
                                </tbody>
                                <tfoot>
                                  <tr class="font-semibold text-gray-900 ">
                                      <th scope="row" class="px-6 py-3 text-base">Total</th>
                                      <td class="px-6 py-3"></td>
                                      <td class="px-6 py-3"></td>
                                      <td class="px-6 text-base  py-3"><?php
                                      
                                      $selectSuma= $conn->prepare("SELECT SUM(monto) FROM `costos` WHERE clinica_id = ? AND month_=? AND year_=? ");
                                      $selectSuma->execute([$user_id,$y,$x]);

                                      $result= $selectSuma->fetch(PDO::FETCH_ASSOC);
                                      
                                      echo 'S/. '.$result['SUM(monto)'];

                                    
                                      
                                      ?></td>
                                  </tr>
                              </tfoot>
                            </table>
                        </div>
         

                          <?php

                          
                       

                      }
                      
                    }

              }
              
/*
                     $mesesNames=['Nothin','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Sep','Oct','Nov','Dic'];
                      $numberMonthInt=(int)$mesNumberMM;

                      $year=substr($inicioCorto,0,4);//YEAR YYYYY
                      $day=substr($inicioCorto,8,2); //DAY DD
                      $monthString=$mesesNames[$numberMonthInt]; //MONTH STRING RETURN OF $inicioCorto
*/

            }
            /*
              $select_costos= $conn->prepare("SELECT * FROM `costos` WHERE clinica_id = ?  ");
              $select_costos->execute([$user_id]);   
              while($fetch_costos = $select_costos->fetch(PDO::FETCH_ASSOC)){}*/
            ?>
            
       





    
       
    
     
    
        

      </div>

      <!--TERMINA CONTENIDO-->

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