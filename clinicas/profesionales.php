
      
<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:../index.php');

};

if(isset($_POST['submitDoctorNuevo'])){
    $nombreDoctor = $_POST['nombreDoctor'];
    $nombreDoctor = filter_var($nombreDoctor, FILTER_SANITIZE_STRING);
    $especialidad = $_POST['especialidad'];
    $especialidad = filter_var($especialidad, FILTER_SANITIZE_STRING);
    $sexoDoctor = $_POST['sexo'];
    $sexoDoctor = filter_var($sexoDoctor, FILTER_SANITIZE_STRING);
    
    $telefonoDoctor = $_POST['telefonoDoctor'];
    $telefonoDoctor = filter_var($telefonoDoctor, FILTER_SANITIZE_STRING);
    $edadDoctor = $_POST['edadDoctor'];
    $edadDoctor = filter_var($edadDoctor, FILTER_SANITIZE_STRING);
    
    $correoDoctor = $_POST['correoDoctor'];
    $correoDoctor = filter_var($correoDoctor, FILTER_SANITIZE_STRING);
  
    
 
    $prevent_doble_doctor = $conn->prepare("SELECT * FROM `doctores` WHERE nombre= ? AND clinica_id=? ");
    $prevent_doble_doctor ->execute([$nombreDoctor,$user_id]);
    if($prevent_doble_doctor->rowCount()== 0 ){
     $insert_event = $conn->prepare("INSERT INTO `doctores`(clinica_id,nombre,especialidad,sexo, telefonoDoctor,correoDoctor,edadDoctor) VALUES(?,?,?,?,?,?,?)");
     $insert_event->execute([$user_id,$nombreDoctor,$especialidad,$sexoDoctor,$telefonoDoctor,$correoDoctor,$edadDoctor]);
    };
    
    header('location:profesionales.php');
  
 }

 if(isset($_POST['eliminarDoctor'])){
  $idDoctor = $_POST['idDoctor'];
  $deleteDoctor = $conn->prepare("DELETE FROM `doctores` WHERE id = ? AND clinica_id = ?");
  $deleteDoctor->execute([$idDoctor,$user_id]);
  
  header('location:profesionales.php');

}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
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
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class=" flex gap-2 my-4 mx-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
  Registrar nuevo doctor
  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
</button>

<!-- Main modal -->

<style>
    .modal_doctores{
        padding-top:10rem;
    }
    @media (min-width:768px) {
        .modal_doctores{
            padding-top:30rem;
        }
        
    }
    </style>
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class=" modal_doctores fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Nuevo Doctor</h3>
                <form class="space-y-6" action="" method="post" >
                    <div>
                        <label for="nombreDoctor" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre (*)</label>
                        <input type="name" name="nombreDoctor" id="nombreDoctor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " placeholder="Dr. Yess Lozano" required>
                    </div>

                            <fieldset class="grid grid-cols-2">
                    <legend class="sr-only">Sexo</legend>

                    <div  style="cursor:pointer" class="flex items-center mb-4">
                        <input id="country-option-1" style="cursor:pointer"  type="radio" name="sexo" value="Hombre" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300    " checked>
                        <label for="country-option-1" style="cursor:pointer" class="block ml-2 text-sm font-medium text-gray-900 ">
                        Hombre
                        </label>
                    </div>

                    <div style="cursor:pointer" class="flex items-center mb-4">
                        <input id="country-option-2" style="cursor:pointer" type="radio" name="sexo" value="Mujer" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300    ">
                        <label for="country-option-2" style="cursor:pointer"  class="block ml-2 text-sm font-medium text-gray-900 ">
                        Mujer
                        </label>
                    </div>
                    </fieldset>

                    
                        <h3 class="mb-4 font-semibold text-gray-900 ">Especialidad (*)</h3>
                        <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg   ">
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="odntologia-general" type="radio" value="Odontología General" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="odntologia-general" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Odontologia general </label>
                                </div>
                            </li>

                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="Cirugía-oral " type="radio" value="Cirugía oral y maxilofacial" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="Cirugía-oral " class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Cirugía oral y maxilofacial</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="Endodoncia" type="radio" value="Endodoncia" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="Endodoncia" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Endodoncia</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="Odontología-estética" type="radio" value="Odontología estética" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="Odontología-estética" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Odontología estética</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="Odontopediatría" type="radio" value="Odontopediatría" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="Odontopediatría" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Odontopediatría</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="Ortodoncia" type="radio" value="Ortodoncia" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="Ortodoncia" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Ortodoncia</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="Patología bucal" type="radio" value="Patología bucal" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="Patología bucal" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Patología bucal</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="Periodoncia" type="radio" value="Periodoncia" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="Periodoncia" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Periodoncia</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="Prostodoncia y rehabilitación oral" type="radio" value="Prostodoncia y rehabilitación oral" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="Prostodoncia y rehabilitación oral" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Prostodoncia y rehabilitación oral</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg ">
                                <div class="flex items-center pl-3">
                                    <input id="Radiología oral y maxilofacial" type="radio" value="Radiología oral y maxilofacial" name="especialidad" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500   focus:ring-2  ">
                                    <label for="Radiología oral y maxilofacial" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 ">Radiología oral y maxilofacial</label>
                                </div>
                            </li>

                        </ul>







                        

                    <div>
                        <label for="telefonoDoctor" class="block mb-2 text-sm font-medium text-gray-900 ">Telefono Whatsapp (*)</label>
                        <input type="tel" name="telefonoDoctor" id="telefonoDoctor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " placeholder="913464044" required >
                    </div>
                    <div>
                        <label for="correoDoctor" class="block mb-2 text-sm font-medium text-gray-900 ">Correo</label>
                        <input type="mail" name="correoDoctor" id="correoDoctor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " placeholder="JonhDoe@gmail.com" >
                    </div>
                    <div>
                        <label for="edadDoctor" class="block mb-2 text-sm font-medium text-gray-900 ">Edad</label>
                        <input type="age" name="edadDoctor" id="edadDoctor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " placeholder="35" >
                    </div>
                    
                
                    <button type="submit" name="submitDoctorNuevo"class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Registrar Doctor</button>
                    
                </form>
            </div>
        </div>
    </div>
</div> 

        
    

    

    
        <!-- Client Table -->
        <div class="mt-4 mx-4">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50  ">
                    <th class="px-4 py-3">Doctor</th>
                    <th class="px-4 py-3">Telefono</th>
                    
                    <th class="px-4 py-3">Edad</th>
                    <th class="px-4 py-3">Acción</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y  ">

                <?php
         $select_doctores = $conn->prepare("SELECT * FROM `doctores` WHERE clinica_id = ? ORDER BY id DESC");
         $select_doctores->execute([$user_id]);    
         
            while($fetch_doctores = $select_doctores->fetch(PDO::FETCH_ASSOC)){

                ?>
                
                


                  <tr class="bg-gray-50  hover:bg-gray-100  text-gray-700 ">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <a href="#">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <?php 
                                if($fetch_doctores['sexo']=='Hombre'){
                                  echo '<img src="./imgAvatar/doctor2.png" class="w-8 h-8"> ';
                                }else{
                                  echo '<img src="./imgAvatar/doctora3.png" class="w-8 h-8"> ';
                                }
                                
                                ?>                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                          </div>
                        </a>
                        <a href="#">
                          <p class=" text-blue-600   font-semibold"><?=$fetch_doctores['nombre'] ;?></p>
                          <p class="text-xs text-gray-600 "><?=$fetch_doctores['especialidad']  ;?></p>
                        </div>
                        </a>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm"><?=$fetch_doctores['telefonoDoctor']  ;?></td>
                    <td class="px-4 py-3 text-sm"><?=$fetch_doctores['edadDoctor']  ;?></td>
                    <td class="px-4 py-3 text-sm"><button  data-modal-target="eliminar-modal-<?=$fetch_doctores['id'];?>" data-modal-toggle="eliminar-modal-<?=$fetch_doctores['id'];?>" class="text-blue-600 ">Eliminar</button></td>
                   
                   
                    <!-- MODAL ELIMINAR DOCTOR -->
                    
                        <div id="eliminar-modal-<?=$fetch_doctores['id'];?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                         <form action="" method="POST">
                          <div class="relative w-full h-full max-w-md md:h-auto">
                              <div class="relative bg-white rounded-lg shadow ">
                                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="popup-modal">
                                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                      <span class="sr-only">Close modal</span>
                                  </button>
                                  <div class="p-6 text-center">
                                      <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                      
                                      <h3 class="mb-5 text-lg font-normal text-gray-500 ">¿Estás seguro de eliminar este doctor?</h3>
                                        <input name="idDoctor" hidden type="text" value="<?=$fetch_doctores['id'];?>"/>
                                      <button  type="submit" name="eliminarDoctor"class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                          Si, eliminar
                                      </button>
                                      <button data-modal-hide="eliminar-modal-<?=$fetch_doctores['id'];?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10      ">No, cancelar</button>
                                  </div>
                              </div>
                          </div>
                       </form>
                      </div>
                    
                  </tr>
                  <?php
            }

                

                ?>



                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t  bg-gray-50 sm:grid-cols-9  ">
                <?php
                $contarDocs = $conn->prepare("SELECT * FROM `doctores` WHERE clinica_id= ? ");
                $contarDocs ->execute([$user_id]);
                
                ?>
            <span class="flex items-center col-span-3"> Total: <?=$contarDocs->rowCount() ;?> doctores</span>
              <span class="col-span-2"></span>
              
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


</body>
</html>