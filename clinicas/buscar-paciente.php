
      
<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:../index.php');

};


 
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
$clientURL= $currentLink[0].'usuarios/';
$clientURLRegistro= $currentLink[0].'usuarios/registrar.php';




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

        
      <?php
   if(isset($_POST['search-paciente-box1']) OR isset($_POST['search-paciente-box2'])  ){
    if(isset($_POST['search-paciente-box1'])){
      $searchWord1=$_POST['search-paciente-box1'];
      echo '<div class="px-4 flex justify-center"><div style="max-width:30rem" class=" mx-auto mt-4  flex p-4 text-sm text-gray-700  rounded-lg bg-gray-50  " role="alert">
      <span class="sr-only">Info</span>
      <div>
        <span class="font-bold">Resultados para: "</span>'.$searchWord1.'"
      </div>
    </div></div>';

    }
    if(isset($_POST['search-paciente-box2'])){
      $searchWord2=$_POST['search-paciente-box2'];
      echo '<div class="px-4 flex justify-center"><div style="max-width:30rem" class=" mx-auto mt-4  flex p-4 text-sm text-gray-700  rounded-lg bg-gray-50  " role="alert">
      <span class="sr-only">Info</span>
      <div>
        <span class="font-bold">Resultados para: "</span>'.$searchWord2.'"
      </div>
    </div></div>';
    }
      
   }
   ?>

    

    
        <!-- Client Table -->
        <div class="mt-4 mx-4">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50  ">
                    <th class="px-4 flex gap-2 py-3">
                          <span>Paciente</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Capa_1" width="800px" height="800px" viewBox="0 0 97.68 97.68" xml:space="preserve">
                              <g>
                                <g>
                                  <path d="M42.72,65.596h-8.011V2c0-1.105-0.896-2-2-2h-16.13c-1.104,0-2,0.895-2,2v63.596H6.568c-0.77,0-1.472,0.443-1.804,1.137    C4.432,67.428,4.528,68.25,5.01,68.85l18.076,26.955c0.38,0.473,0.953,0.746,1.558,0.746s1.178-0.273,1.558-0.746L44.278,68.85    c0.482-0.6,0.578-1.422,0.246-2.117C44.192,66.039,43.49,65.596,42.72,65.596z"/>
                                  <path d="M92.998,39.315L79.668,1.541c-0.282-0.799-1.038-1.334-1.886-1.334h-3.861c-0.106,0-0.213,0.008-0.317,0.025    c-0.104-0.018-0.21-0.025-0.318-0.025h-3.76c-0.85,0-1.605,0.535-1.888,1.336L54.362,39.317c-0.215,0.611-0.12,1.289,0.255,1.818    c0.375,0.529,0.982,0.844,1.632,0.844h5.774c0.88,0,1.656-0.574,1.913-1.416l2.535-8.324H80.89l2.536,8.324    c0.256,0.842,1.033,1.416,1.913,1.416h5.771c0.648,0,1.258-0.314,1.633-0.844C93.119,40.604,93.213,39.926,92.998,39.315z     M68.864,24.283c2.397-7.77,4.02-13.166,4.82-16.041l4.928,16.041H68.864z"/>
                                  <path d="M87.255,89.838H69.438l18.928-27.205c0.232-0.336,0.357-0.734,0.357-1.143v-3.416c0-1.104-0.896-2-2-2h-26.07    c-1.104,0-2,0.896-2,2v3.844c0,1.105,0.896,2,2,2h16.782L58.481,91.094c-0.234,0.336-0.359,0.734-0.359,1.145v3.441    c0,1.105,0.896,2,2,2h27.135c1.104,0,2-0.895,2-2v-3.842C89.255,90.732,88.361,89.838,87.255,89.838z"/>
                                </g>
                              </g>
                          </svg>

                    </th>
                    <!-- <th class="px-4 py-3">Deuda</th> -->
                    <th class="px-4 py-3">Total Pagado</th>
                    <th class="px-4 py-3">Accion</th>

                    <th class="px-4 py-3">Estado</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y  ">

                        <?php
                
                if(isset($_POST['search-paciente-box1']) OR isset($_POST['search-paciente-box2'])  ){
                  if(isset($_POST['search-paciente-box1'])){
                    $searchWord1=$_POST['search-paciente-box1'];
                    $selectSearchPaciente = $conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id = ? AND nombrePaciente LIKE '%{$searchWord1}%'");
                    $selectSearchPaciente->execute([$user_id]);
                  }
                  if(isset($_POST['search-paciente-box2'])){
                    $searchWord2=$_POST['search-paciente-box2'];
                    $selectSearchPaciente = $conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id = ? AND nombrePaciente LIKE '%{$searchWord2}%'");
                    $selectSearchPaciente->execute([$user_id]);
                  }
                 
                  
              
                                
                if($selectSearchPaciente->rowCount()>0){
                  while($fetch_pacientes = $selectSearchPaciente->fetch(PDO::FETCH_ASSOC)){

             
         

                ?>
                
                


                  <tr class="bg-gray-50  hover:bg-gray-100  text-gray-700 ">
                    <td class="px-4 py-3">
                      <div class="flex justify-between text-sm">
                        <div class="flex items-center wrap">
                        <a href="paciente_id.php?pid=<?=$fetch_pacientes['id'] ;?>">
                            <div class="relative  w-8 h-8 mr-3 rounded-full md:block">
                              <?php 
                              if($fetch_pacientes['sexo']=='Hombre'){
                                echo '<img src="./imgAvatar/man.png" class="w-8 h-8"> ';
                              }else{
                                echo '<img src="./imgAvatar/woman.png" class="w-8 h-8"> ';
                              }
                              
                              ?>
                            <!-- <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg> -->
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                        </a>
                            <a href="paciente_id.php?pid=<?=$fetch_pacientes['id'] ;?>"> 
                                    <div>
                                    <p class=" text-blue-600    font-semibold"><?=$fetch_pacientes['nombrePaciente'] ;?></p>
                                    <p class="text-xs text-gray-600 "><?=$fetch_pacientes['telefonoPaciente'] ;?></p>
                                  </div>
                            </a>
                        </div>
                        <div>
                           

                               <!--MODAL ELMINAR PACIENTE-->
                            
                                    <div id="elimianrPacienteModal<?=$fetch_pacientes['id'] ;?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow ">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="elimianrPacienteModal<?=$fetch_pacientes['id'] ;?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900 ">¿Estás seguro de eliminar este paciente?</h3>
                                                    <form class="space-y-6" action="pacientes.php" method="post" >


                                                   
                                                        <input type="number" hidden name="idPacienteEliminar" id="idPacienteEliminar" value="<?=$fetch_pacientes['id'] ;?>"  >

                                                        

                                                        
                                                        
                                                    
                                                        <button type="submit" name="eliminarPaciente" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Eliminar</button>
                                                        <button type="button"  data-modal-hide="elimianrPacienteModal<?=$fetch_pacientes['id'] ;?>" class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">No, cancelar</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

        

                            <!--FIN MODAL-->


                    
                        </div>
                        
                      </div>


                    </td>

                    <?php
                                 $selectSumCostos = $conn->prepare("SELECT SUM(monto) FROM `costos` WHERE clinica_id = ? AND paciente=? AND modo='ingreso'");
                                 $selectSumCostos->execute([$user_id,$fetch_pacientes['nombrePaciente']]);    
                                 $result= $selectSumCostos->fetch(PDO::FETCH_ASSOC);

                   ?>
                    <!-- <td class="px-4 py-3 text-sm"><?='S/.'.$fetch_pacientes['deuda'];?></td> -->
                    <td class="px-4 py-3 text-sm"><?='S/.'.$result['SUM(monto)'];?></td>
                    

               
                    <td class="px-4 py-3 text-sm">
                      <div class="flex  gap-4">
                        <!--DOCUMENT ICON-->
                        <a href="paciente_id.php?pid=<?=$fetch_pacientes['id'];?>&modal=historia_clinica">
                            <button  type="button" class="inline-flex shadow-lg items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none  focus:ring-gray-50   " > 
                                  <svg fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path clip-rule="evenodd" fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"></path>
                                  <path clip-rule="evenodd" fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z"></path>
                                  </svg>
                                                       

                          </button>
                          <!--
                          <div id="tooltip-default<?=$fetch_pacientes['id'];?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
                                Historia Clínica
                                  <div class="tooltip-arrow" data-popper-arrow></div>
                              </div>
                          
                      <div id="tooltip-acciones<?=$fetch_pacientes['id'];?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
                        Acciones
                        <div class="tooltip-arrow" data-popper-arrow></div>
                      </div>
                      -->

                         
                        </a>


                      <!--ACCIONS ICON-->
                      <button  id="dropdownMenuIconHorizontalButton<?=$fetch_pacientes['id'];?>" data-dropdown-toggle="dropdownDotsHorizontal<?=$fetch_pacientes['id'];?>" class="inline-flex shadow-lg items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none  focus:ring-gray-50   " type="button"> 
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                      </button>
                     


                      <!--FORM INFORMAR PACIENTE MODAL-->

                  
                   <div id="informarPaciente-modal<?=$fetch_pacientes['id'];?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow ">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="informarPaciente-modal<?=$fetch_pacientes['id'];?>">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-center text-xl font-medium text-gray-900 ">Informar Paciente</h3>
                                  <form class="space-y-6" action="" method="post" >



                                       

                                        <div>
                                            <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Paciente</label>
                                            <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " > <?=$fetch_pacientes['nombrePaciente'];?> </p>
                                        </div>
                                          <?php
                                            //obtener token paciente
                                             $select_token = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
                                             $select_token->execute([$fetch_pacientes['id']]); 
                                             $fetch_token=$select_token->fetch(PDO::FETCH_ASSOC);
                                             $fetchedToken=$fetch_token['token'];

                                          ?>
                                      
                                     
                                          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Tu mensaje</label>
                                          <div  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500      " >Hola <?=$fetch_pacientes['nombrePaciente'];?>, tu cuenta ha sido creada. Activa tu cuenta facilmente en: <?=$clientURLRegistro;?>. Tu token digital es: <?=$fetchedToken;?>. Tendras acceso a agendar citas, mantener el control de registro médico, y más. ¡Que tengas un buen dia! </div>
                                          <!--OBTENER EL TELEFONO DE PACIENTE-->
                                          <?php
                                          $select_telefono = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
                                          $select_telefono->execute([$fetch_pacientes['id']]);   
                                          $fetch_telefono=$select_telefono->fetch(PDO::FETCH_ASSOC);
                                          $telefonoPaciente=$fetch_telefono['telefonoPaciente'];
                                          ?>
                                      
                                          
                                          <a target="_blank" href="https://api.whatsapp.com/send?phone=<?=$fetch_telefono['telefonoPaciente'];?>&text=Hola <?=$fetch_pacientes['nombrePaciente'];?>, tu cuenta ha sido creada. Activa tu cuenta facilmente en: <?=$clientURLRegistro;?>. Tu token digital es: <?=$fetchedToken;?>. Tendras acceso a agendar citas, mantener el control de registro médico, y más. ¡Que tengas un buen dia!"  class=" block  w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Enviar</a>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                  <!--FIN MODAL-->






                      <!--ACCTION DROWPUP MODAL-->

                      
                  <div id="dropdownDotsHorizontal<?=$fetch_pacientes['id'];?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44  ">
                      <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownMenuIconHorizontalButton<?=$fetch_pacientes['id'];?>">
                        <li>
                          <button  data-modal-target="informarPaciente-modal<?=$fetch_pacientes['id'];?>" data-modal-toggle="informarPaciente-modal<?=$fetch_pacientes['id'];?>" class="flex items-center gap-4 w-full px-2 py-2 hover:bg-gray-100  ">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                          </svg>
                            <p>Enviar token a paciente</p>                          

                          </button>
                        </li>
                       
                      </ul>
                     
                    </div>    
                    
                    
                    
                   </div>

                   

                      
                </td>
                <td class="px-4 py-3 text-xs">

                      <button class="text-blue-600   bg-white shadow-lg    hover:bg-gray-50 rounded-lg p-2" data-modal-target="elimianrPacienteModal<?=$fetch_pacientes['id'] ;?>" data-modal-toggle="elimianrPacienteModal<?=$fetch_pacientes['id'] ;?>">
                        Eliminar 
                      </button>
                      <!-- <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full  "> <?=$fetch_pacientes['estado'] ;?> </span> -->
                </td>
                <style>
                  .dark .dark\:shadow-white{
                  --tw-shadow: 0 2px 5px 0px rgba(255, 255, 255,0.3);
                    --tw-shadow-colored: 0 2px 5px 0px var(--tw-shadow-color);
                    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
                  }
                </style>
                



            </tr>
                  <?php
            }
          }
        }
                

                ?>



                                 



                 
                  
                </tbody>
                
              </table>
            </div>
            <?php
             if(isset($_POST['search-paciente-box2']) OR isset($_POST['search-paciente-box2'])  ){

             ?>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t  bg-gray-50 sm:grid-cols-9  ">
            
            <span class="flex items-center col-span-3"> Total: <?=$selectSearchPaciente->rowCount() ;?> pacientes </span>
              <span class="col-span-2"></span>
            
            </div>
            <?php
             }
             ?>
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
<script>
// PREVENT RESEND FORMS
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>

</body>
</html>