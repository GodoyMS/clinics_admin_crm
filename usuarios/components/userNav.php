<!---USER DROPDOWN-->
<?php
$selectPacienteName = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
$selectPacienteName->execute([$userPaciente_id]);
if($selectPacienteName->rowCount()>0){
  $fetchPacienteName=$selectPacienteName->fetch(PDO::FETCH_ASSOC);}

  ?>

<div class="mx-auto flex gap-8 justify-center flex-wrap p-4">


<button id="dropdownAvatarNameButton"  data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-gray-500 hover:text-blue-500 text-sm font-medium   ">
        <svg fill="none" class="h-6 w-6 " stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
            </svg>
            <span ><?=$fetchPacienteName['nombrePaciente'];?></span>
<svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>     
</button>


    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"  class="flex relative items-center text-gray-500 hover:text-blue-500  ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
</svg>



                <?php
                    $selectNumberMessages = $conn->prepare("SELECT * FROM `mensajes` WHERE idPaciente = ? AND direccion='consultorioAPaciente'  AND estadoNotificacion='activo'");
                    $selectNumberMessages->execute([$userPaciente_id]);   
                    $numberMessages= $selectNumberMessages->rowCount();
                    if($numberMessages>0){  
                    ?>
                    
                    <div style="padding:0.6rem;top:-0.7rem;right:-0.6rem"class="absolute inline-flex items-center justify-center w-4 h-4  text-xs  text-white bg-red-500  rounded-full  "><?=$numberMessages;?></div>
                    
               <?php
                    }
               ?>
    

        
</button>

<!-- Notifications dropdown -->
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 ">
    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
        

    <?php
                  if($numberMessages>0){     
                    $select_paciente = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
                    $select_paciente->execute([$userPaciente_id]);
                  if($select_paciente->rowCount()>0){
                  $fetch_paciente=$select_paciente->fetch(PDO::FETCH_ASSOC);}
                    $select_clinica=$conn->prepare("SELECT * FROM `usuarios` WHERE id = ?");
                    $select_clinica->execute([$fetch_paciente['clinica_id']]);
                    $fetch_clinica=$select_clinica->fetch(PDO::FETCH_ASSOC);
                    while($fetchMensajes = $selectNumberMessages->fetch(PDO::FETCH_ASSOC)){
                               
                  ?>
                  <li class="p-2">
                    <a href="mensajes.php">
                        
                          <div class="flex items-center">
                              <div class="relative inline-block shrink-0">
                              <svg fill="currentColor" class="w-10 h-10" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path clip-rule="evenodd" fill-rule="evenodd" d="M3 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5H15v-18a.75.75 0 000-1.5H3zM6.75 19.5v-2.25a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75zM6 6.75A.75.75 0 016.75 6h.75a.75.75 0 010 1.5h-.75A.75.75 0 016 6.75zM6.75 9a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM6 12.75a.75.75 0 01.75-.75h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 6a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zm-.75 3.75A.75.75 0 0110.5 9h.75a.75.75 0 010 1.5h-.75a.75.75 0 01-.75-.75zM10.5 12a.75.75 0 000 1.5h.75a.75.75 0 000-1.5h-.75zM16.5 6.75v15h5.25a.75.75 0 000-1.5H21v-12a.75.75 0 000-1.5h-4.5zm1.5 4.5a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008zm.75 2.25a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75h-.008zM18 17.25a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z"></path>
                                </svg>                                 <span class="absolute bottom-0 right-0 inline-flex items-center justify-center w-5 h-5 bg-blue-600 rounded-full">
                                      <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                      <span class="sr-only">Message icon</span>
                                  </span>
                              </div>
                              <div class="ml-3 text-sm font-normal">


                                  <div class="text-sm font-semibold text-gray-900 e"><?=$fetch_clinica['nombreConsultorio'];?></div>
                                  <div class="text-sm font-normal  truncate  w-60"><?=$fetchMensajes['mensaje'];?></div> 
                                  <span class="text-xs font-medium text-blue-600 "><?=$fetchMensajes['tipoMensaje'];?></span>   
                              </div>
                          </div> 
                    </a>                 
                  </li>
                  <?php
                  } 
                  }else{
                              echo'  <li class="p-2">
                                      <a href="">
                                          
                                            <div class="flex items-center">
                                                <div class="relative inline-block shrink-0">
                                                <svg fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                  <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
                                                </svg>                                
                                                
                                                </div>
                                                <div class="ml-3 text-sm font-normal">
                                                    <div class="text-sm font-semibold text-gray-900 ">Aun no tienes niguna notificación</div>
                                                </div>
                                            </div> 
                                      </a>                 
                            </li>
                            <li class="p-2 text-blue-500 hover:text-blue-700">
                            <a href="mensajes.php">
                                  <div class="flex items-center">
                                                <div class="relative inline-block shrink-0">
                                                <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5"></path>
                                                  </svg>                                
                                                
                                                </div>
                                                <div class="ml-3 text-sm font-normal">
                                                    <div class="text-sm font-semibold ">Ver mis mensajes</div>
                                                </div>
                                            </div> 
                            </a>

                            </li>
                            
                            ';
                  }
                  ?>



    </ul>
</div>


<a href="components/logoutUsuariosPacientes.php">
        <button class="flex items-center text-gray-500 hover:text-blue-600 ">
            <svg fill="none"class="h-6 w-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
            </svg>
        
            
            
    </button>
</a>
</div>



<!-- Dropdown menu -->
<div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 ">

    <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
      <li>
        <a href="actualizar-informacion.php" class="block px-4 py-2 hover:bg-gray-100 ">Actualizar información</a>
      </li>
      <li>
        <a href="informacion-consultorio.php" class="block px-4 py-2 hover:bg-gray-100 ">Informacion de consultorio</a>
      </li>
      
    </ul>
    <div class="py-1">
      <a href="components/logoutUsuariosPacientes.php" class="flex gap-2 justify-between px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 600 ">
        <span>Salir</span>
        <svg fill="none"class="h-6 w-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
        </svg>      
    </a>
    </div>
</div>




<!---USER DROPDOWN ENDS-->