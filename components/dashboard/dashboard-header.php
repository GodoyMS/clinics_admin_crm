

<style>
  /* Compiled dark classes from Tailwind */
  .dark .dark\:divide-gray-700 > :not([hidden]) ~ :not([hidden]) {
    border-color: rgba(55, 65, 81);
  }
  .dark .dark\:bg-gray-50 {
    background-color: rgba(249, 250, 251);
  }
  .dark .dark\:bg-gray-100 {
    background-color: rgba(243, 244, 246);
  }
  .dark .dark\:bg-gray-600 {
    background-color: rgba(75, 85, 99);
  }
  .dark .dark\:bg-gray-700 {
    background-color: #111827;
  }
  .dark .dark\:bg-gray-800 {
    background-color: rgba(31, 41, 55);
  }
  .dark .dark\:bg-gray-900 {
    background-color: rgba(17, 24, 39);
  }
  .dark .dark\:bg-red-700 {
    background-color: rgba(185, 28, 28);
  }
  .dark .dark\:bg-green-700 {
    background-color: rgba(4, 120, 87);
  }
  .dark .dark\:hover\:bg-gray-200:hover {
    background-color: rgba(229, 231, 235);
  }
  .dark .dark\:hover\:bg-gray-600:hover {
    background-color: rgba(75, 85, 99);
  }
  .dark .dark\:hover\:bg-gray-700:hover {
    background-color: rgba(55, 65, 81);
  }
  .dark .dark\:hover\:bg-gray-900:hover {
    background-color: rgba(17, 24, 39);
  }
  .dark .dark\:border-gray-100 {
    border-color: rgba(243, 244, 246);
  }
  .dark .dark\:border-gray-400 {
    border-color: rgba(156, 163, 175);
  }
  .dark .dark\:border-gray-500 {
    border-color: rgba(107, 114, 128);
  }
  .dark .dark\:border-gray-600 {
    border-color: rgba(75, 85, 99);
  }
  .dark .dark\:border-gray-700 {
    border-color: rgba(55, 65, 81);
  }
  .dark .dark\:border-gray-900 {
    border-color: rgba(17, 24, 39);
  }
  .dark .dark\:hover\:border-gray-800:hover {
    border-color: rgba(31, 41, 55);
  }
  .dark .dark\:text-white {
    color: rgba(255, 255, 255);
  }
  .dark .dark\:text-gray-50 {
    color: rgba(249, 250, 251);
  }
  .dark .dark\:text-gray-100 {
    color: rgba(243, 244, 246);
  }
  .dark .dark\:text-gray-200 {
    color: rgba(229, 231, 235);
  }
  .dark .dark\:text-gray-400 {
    color: rgba(156, 163, 175);
  }
  .dark .dark\:text-gray-500 {
    color: rgba(107, 114, 128);
  }
  .dark .dark\:text-gray-700 {
    color: rgba(55, 65, 81);
  }
  .dark .dark\:text-gray-800 {
    color: rgba(31, 41, 55);
  }
  .dark .dark\:text-red-100 {
    color: rgba(254, 226, 226);
  }
  .dark .dark\:text-green-100 {
    color: rgba(209, 250, 229);
  }
  .dark .dark\:text-blue-400 {
    color: rgba(96, 165, 250);
  }
  .dark .group:hover .dark\:group-hover\:text-gray-500 {
    color: rgba(107, 114, 128);
  }
  .dark .group:focus .dark\:group-focus\:text-gray-700 {
    color: rgba(55, 65, 81);
  }
  .dark .dark\:hover\:text-gray-100:hover {
    color: rgba(243, 244, 246);
  }
  .dark .dark\:hover\:text-blue-500:hover {
    color: rgba(59, 130, 246);
  }

  /* Custom style */
  .header-right {
      width: calc(100% - 3.5rem);
  }
  .sidebar:hover {
      width: 16rem;
  }
  @media only screen and (min-width: 768px) {
      .header-right {
          width: calc(100% - 16rem);
      }        
  }
</style>    

<!-- Header -->
<div class="fixed w-full shadow-lg flex items-center justify-between h-14 text-white z-10">
        <div class="flex items-center justify-between md:justify-around pl-3 w-14 md:w-64 h-14 bg-blue-600  border-none">
          
        <?php include 'logo.php';   ?>
        </div>
        
        
        <div class="flex justify-between items-center h-14 bg-blue-600  header-right">

              <!--RESPONSIVE SEARCHBAR-->
                <div class="container pl-4  flex flex-wrap items-center justify-between mx-auto">
                 
                      <div class="flex">
                        <button type="button"  data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-800 bg-blue-200      hover:bg-gray-100  focus:outline-none focus:ring-4 focus:ring-gray-200  rounded-full text-sm p-2.5 mr-1" >
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                          <span class="sr-only">Search</span>
                        </button>
                        <div class="relative hidden md:block">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Search icon</span>
                          </div>
                          <form action="buscar-paciente.php" method="POST" >
                          <input type="text" name="search-paciente-box1"  class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500      " placeholder="Buscar un paciente">

                          </form>
                        </div>

                      </div>

                        <div class="items-center  justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                        <form action="buscar-paciente.php" method="POST" >

                          <div class="absolute mt-3 md:hidden">
                            
                            <input type="text"  name="search-paciente-box2"  class="block w-full p-2  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500      " placeholder="Buscar un paciente">
                            <button type="submit"  class="absolute top-0 right-0 p-2 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300   ">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                <span class="sr-only">Search</span>
                            </button>
                          </div>
                        </form>

                          
                        </div>
               </div>
            <!--ENDS RESPONSIVE SEARCHBAR-->


          <!-- <div class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
            <button class="outline-none focus:outline-none">
              <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
            <input type="search" name="" id="" placeholder="Buscar Paciente" class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
          </div> -->
          <ul class="flex items-center">
          <li>
             
             <button   id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class=" p-2 mr-4 relative text-white hover:text-blue-200" >
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 00-1.032-.211 50.89 50.89 0 00-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 002.433 3.984L7.28 21.53A.75.75 0 016 21v-4.03a48.527 48.527 0 01-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979z" />
                  <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 001.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0015.75 7.5z" />
                </svg>

                <?php
                    $selectNumberMessages = $conn->prepare("SELECT * FROM `mensajes` WHERE clinica_id = ? AND direccion='pacienteAConsultorio' AND estadoNotificacion='activo' ");
                    $selectNumberMessages->execute([$user_id]);   
                    $numberMessages= $selectNumberMessages->rowCount();
                    if($numberMessages>0){  
                ?>
                <div style="padding:0.6rem;top:-0.2rem;right:-0.6rem"class="absolute inline-flex items-center justify-center w-4 h-4  text-xs  text-white bg-red-500  rounded-full  "><?=$numberMessages;?></div>
                <?php
                    }
               ?>
    
              
             </button>
           </li>


           <!--NOTIFICATIONS DROPDOWN-->
           
            <div id="dropdown" tabindex="-1" class="z-50  hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-80 ">
                <ul   class="py-2 text-sm text-gray-700  " aria-labelledby="dropdownDefaultButton">

                <?php
                  if($numberMessages>0){     
                    while($fetchMensajes = $selectNumberMessages->fetch(PDO::FETCH_ASSOC)){
                               
                  ?>
                  <li  class="p-2">
                    <a href="mensajes.php">
                        
                          <div class="flex items-center z-50">
                              <div class="relative inline-block shrink-0">
                              <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" >
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                              </svg>                                  
                              <span class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-blue-600 rounded-full">
                                      <svg aria-hidden="true" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                      <span class="sr-only">Message icon</span>
                              </span>
                              </div>
                              <div class="ml-3 text-sm  font-normal">
                                  <div class="text-sm font-semibold text-gray-900 "><?=$fetchMensajes['nombrePaciente'];?></div>
                                  <div class="text-sm font-normal truncate w-60"><?=$fetchMensajes['mensaje'];?></div> 
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
                  <li class="p-2 text-blue-500 hover:text-blue-700 ">
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

                </li>';
                  }
                  ?>
              
                </ul>
            </div>

            
          
            <li>
              <div class="block w-px h-6 mx-3 bg-gray-400 "></div>
            </li>
            <li>
              <a href="components/user_logout.php" class="flex items-center mr-4 hover:text-blue-100">
                <span class="inline-flex mr-1">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </span>
                Salir       
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- ./Header -->
      
    
      <!-- Sidebar -->
      <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-500  h-full text-white transition-all duration-300 border-none z-10 sidebar">
        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between  flex-grow">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-white uppercase">Principal</div>
              </div>
            </li>
            <li>
              <a href="dashboard.php" class="relative flex flex-row items-center h-11 focus:outline-none pacientes inicio hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Inicio</span>
              </a>
            </li>
            <li>
              <a href="pacientes.php" class="relative flex flex-row items-center h-11 focus:outline-none pacientes hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Pacientes</span>
              </a>
            </li>
            <li>
              <a href="agenda.php" class="relative flex flex-row items-center h-11 focus:outline-none agenda hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Agenda</span>
              </a>
            </li>
            <li>
              <a href="citas.php" class="relative flex flex-row items-center h-11 focus:outline-none agenda hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
              </span>
                <span class="ml-2 text-sm tracking-wide truncate">Citas</span>
                <?php
                    $selectNumberCitas = $conn->prepare("SELECT * FROM `eventos` WHERE user_id = ? ");
                    $selectNumberCitas->execute([$user_id]);   
                    $numberCitas= $selectNumberCitas->rowCount();
                    if($numberCitas>0){

                    
                    ?>
                    
                  <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">
                    <?php
                    echo $numberCitas;
                    ?>
               </span>
               <?php
               }
                    ?>
              </a>
            </li>
            
           
            <!-- <li>
              <a href="boletas-electronicas.php" class="relative flex flex-row items-center h-11 focus:outline-none boletas_electronicas hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"></path></svg>                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Boletas electrónicas</span>
              </a>
            </li> -->


            <li>
              <a href="costos.php" class="relative flex flex-row items-center h-11 focus:outline-none costos hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd"></path></svg>                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Costos</span>
              </a>
            </li>
           


            <li>
              <a href="mensajes.php" class="relative flex flex-row items-center h-11 focus:outline-none mensajes hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Mensajes</span>
                <?php
                    $selectNumberMessages = $conn->prepare("SELECT * FROM `mensajes` WHERE clinica_id = ? AND direccion='pacienteAConsultorio' AND estadoNotificacion= 'activo' ");
                    $selectNumberMessages->execute([$user_id]);   
                    $numberMessages= $selectNumberMessages->rowCount();
                    if($numberMessages>0){  
                    ?>
                    
                  <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">
                    <?php
                    echo $numberMessages;
                    ?>
               </span>

               <?php
                    }
               ?>
              </a>
            </li>
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-white uppercase">Ajustes</div>
              </div>
            </li>
            <li>
              <a href="consultorio.php" class="relative flex flex-row items-center h-11 perfil focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg>                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Perfil Consultorio</span>
              </a>
            </li>
            <li>
              <a href="profesionales.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800  text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500  pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Profesionales</span>
              </a>
            </li>



          

            


            
          </ul>

          <!-- <a  style="bottom:6rem"class="relative flex flex-row  items-center h-11 focus:outline-none   text-white-600  border-l-4 border-transparent    pr-6">
                
                <span class="inline-flex justify-center text-gray-600 items-center ml-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 600 600" version="1.1"><path d="M 226.250 180.566 L 222 183.113 222 184.149 L 222 185.185 224 187.727 L 226 190.270 226 193.570 L 226 196.870 225.048 199.374 L 224.096 201.878 221.798 203.134 L 219.500 204.390 215.544 204.945 L 211.588 205.500 210.894 208 L 210.199 210.500 210.100 217.083 L 210 223.666 211.122 229.254 L 212.244 234.842 215.451 240.671 L 218.658 246.500 223.579 249.225 L 228.500 251.951 232 251.353 L 235.500 250.756 239 248.801 L 242.500 246.846 245.832 242.356 L 249.165 237.865 251.592 230.728 L 254.020 223.592 254.621 215.546 L 255.222 207.500 253.534 201.060 L 251.847 194.620 249.813 190.560 L 247.780 186.500 245.140 183.661 L 242.500 180.821 239.800 179.411 L 237.099 178 233.800 178.009 L 230.500 178.019 226.250 180.566 M 369.500 179.388 L 366.500 180.697 362.871 184.718 L 359.242 188.738 356.924 194.619 L 354.606 200.500 354.553 212 L 354.500 223.500 356.213 229 L 357.927 234.500 361.213 239.961 L 364.500 245.422 368.837 248.461 L 373.174 251.500 377.553 251.405 L 381.933 251.310 385.961 248.645 L 389.988 245.980 392.431 242.109 L 394.875 238.238 396.473 232.742 L 398.070 227.247 397.785 216.373 L 397.500 205.500 392.812 204.961 L 388.124 204.422 386.153 202.639 L 384.183 200.855 382.994 197.987 L 381.806 195.118 382.954 191.639 L 384.102 188.160 385.551 186.958 L 387 185.755 387 184.467 L 387 183.179 381.804 180.589 L 376.607 178 374.554 178.039 L 372.500 178.078 369.500 179.388 M 243.261 185.526 L 245.603 188.052 247.478 193.776 L 249.353 199.500 250.177 200.450 L 251 201.400 251 212.771 L 251 224.143 249.466 225.677 L 247.932 227.211 248.489 228.964 L 249.045 230.718 247.523 231.981 L 246 233.245 246 231.122 L 246 229 245.067 229 L 244.135 229 243.500 231 L 242.865 233 239.014 233 L 235.164 233 233.582 233.607 L 232 234.214 232 235.107 L 232 236 233.393 236 L 234.786 236 235.393 237.582 L 236 239.164 236 239.582 L 236 240 234.500 240 L 233 240 231 242 L 229 244 229 244.893 L 229 245.786 227.698 246.286 L 226.395 246.786 223.198 245.441 L 220 244.097 220 242.548 L 220 241 219 241 L 218 241 218 239.223 L 218 237.445 216.655 235.473 L 215.311 233.500 214.155 228.807 L 213 224.114 212.937 218.307 L 212.873 212.500 211.956 214.786 L 211.038 217.072 212.141 224.786 L 213.243 232.500 215.600 237.500 L 217.956 242.500 220.228 245.103 L 222.500 247.705 226.814 248.912 L 231.127 250.118 235.987 248.504 L 240.846 246.890 243.249 243.695 L 245.651 240.500 247.200 237.500 L 248.749 234.500 250.306 229.500 L 251.863 224.500 252.516 215.815 L 253.169 207.130 251.982 201.315 L 250.795 195.500 248.648 191.528 L 246.500 187.557 244.570 185.278 L 242.639 183 241.779 183 L 240.919 183 243.261 185.526 M 361.202 189.314 L 358.015 194.573 356.363 203.480 L 354.710 212.388 355.896 218.944 L 357.081 225.500 358.638 231.047 L 360.194 236.595 363.584 241.265 L 366.973 245.936 369.381 247.514 L 371.788 249.091 375.144 249.627 L 378.500 250.163 383.249 248.117 L 387.999 246.072 390.999 241.340 L 394 236.608 393.884 234.054 L 393.768 231.500 393.263 233.495 L 392.759 235.490 389.842 239.730 L 386.925 243.970 385.028 244.985 L 383.131 246 378.066 246 L 373 246 373 244.608 L 373 243.217 370.500 242.589 L 368 241.962 368 240.922 L 368 239.882 367.011 240.493 L 366.023 241.104 366.522 239.802 L 367.021 238.500 364.510 235.794 L 362 233.087 362 232.044 L 362 231 360.933 231 L 359.865 231 360.467 229.105 L 361.068 227.211 359.534 225.677 L 358 224.143 358 211.571 L 358 199 359 199 L 360 199 360 197.187 L 360 195.374 362.556 190.076 L 365.112 184.778 364.750 184.417 L 364.389 184.056 361.202 189.314 M 379.750 190.392 L 378 191.720 378 194.301 L 378 196.882 377 197.500 L 376 198.118 376.015 199.309 L 376.031 200.500 376.792 199.303 L 377.553 198.106 378.905 198.941 L 380.256 199.776 379.542 200.932 L 378.828 202.088 379.987 203.484 L 381.146 204.881 382.573 204.334 L 384 203.786 384 204.893 L 384 206 385.133 206 L 386.265 206 388.182 208.210 L 390.098 210.420 391.941 209.269 L 393.784 208.118 394.355 208.689 L 394.926 209.260 394.338 213.550 L 393.750 217.841 394.576 224.670 L 395.402 231.500 396.084 225.500 L 396.766 219.500 396.257 212.945 L 395.749 206.389 392.348 206.293 L 388.946 206.196 385.555 203.610 L 382.164 201.023 381.503 198.012 L 380.841 195 381.500 192 L 382.159 189 381.829 189.032 L 381.500 189.064 379.750 190.392 M 372.750 204.162 L 370 205.167 370 206.083 L 370 207 371 207 L 372 207 372 210.500 L 372 214 373 214 L 374 214 374 212.082 L 374 210.164 374.607 208.582 L 375.214 207 376.886 207 L 378.558 207 380 209 L 381.442 211 382.115 211 L 382.788 211 382.644 208.584 L 382.500 206.168 382 206.282 L 381.500 206.396 379.250 205.631 L 377 204.865 377 203.933 L 377 203 376.250 203.079 L 375.500 203.158 372.750 204.162 M 26 258.953 L 26 260.906 24.870 263.385 L 23.741 265.865 20.943 267.024 L 18.145 268.183 15.572 272.070 L 13 275.957 13 287.313 L 13 298.670 15.036 304.872 L 17.072 311.074 16.520 311.968 L 15.967 312.862 16.984 313.490 L 18 314.118 18 316.726 L 18 319.333 18.652 318.682 L 19.303 318.030 20.652 320.629 L 22 323.229 22 325.662 L 22 328.096 25.546 333.639 L 29.091 339.182 30.796 341.023 L 32.500 342.865 34.458 346.683 L 36.416 350.500 38.458 353.500 L 40.500 356.500 40.500 364 L 40.500 371.500 39.149 375 L 37.798 378.500 36.982 380.500 L 36.165 382.500 35.082 385.899 L 34 389.298 34 393.102 L 34 396.906 35.229 399.703 L 36.459 402.500 41.479 407.997 L 46.500 413.493 51 417.787 L 55.500 422.080 59.750 424.470 L 64 426.859 63.954 426.180 L 63.907 425.500 60 422.500 L 56.093 419.500 56.046 418.083 L 56 416.667 55.373 417.294 L 54.745 417.921 47.821 410.816 L 40.897 403.711 41.437 402.304 L 41.977 400.896 40.922 401.548 L 39.866 402.201 40.143 400.850 L 40.420 399.500 39.103 397.117 L 37.787 394.733 38.443 390.617 L 39.099 386.500 41.150 379.739 L 43.201 372.979 43.344 363.739 L 43.486 354.500 41.691 351.500 L 39.895 348.500 36.698 343.371 L 33.500 338.241 30.574 333.871 L 27.649 329.500 25.448 323.500 L 23.246 317.500 20.631 311.831 L 18.016 306.163 17.098 299.331 L 16.180 292.500 16.424 282.828 L 16.667 273.156 18.326 270.625 L 19.985 268.093 23.492 267.435 L 27 266.777 27 261.889 L 27 257 26.500 257 L 26 257 26 258.953 M 579.150 259.125 L 579 261.750 578.375 264.875 L 577.750 268 579.212 268 L 580.674 268 585.796 272.989 L 590.918 277.979 592.024 280.045 L 593.130 282.111 593.315 291.305 L 593.500 300.500 592.088 305.500 L 590.675 310.500 588.822 313.176 L 586.968 315.853 582.048 325.806 L 577.127 335.759 574.868 342.129 L 572.608 348.500 572.554 383 L 572.500 417.500 570.235 421.810 L 567.969 426.120 565.693 428.575 L 563.417 431.030 556.458 435.109 L 549.500 439.188 546.427 439.696 L 543.353 440.204 542.099 442.214 L 540.844 444.223 543.144 442.611 L 545.445 441 549.108 441 L 552.771 441 555.483 439.593 L 558.195 438.186 565.453 431.305 L 572.711 424.423 573.486 420.961 L 574.261 417.500 574.732 403 L 575.203 388.500 573.998 376.500 L 572.793 364.500 573.973 354.500 L 575.153 344.500 580.270 333.500 L 585.386 322.500 586.579 321 L 587.772 319.500 590.366 314.324 L 592.959 309.147 594.465 304.824 L 595.971 300.500 595.985 292.929 L 596 285.357 594.250 281.776 L 592.500 278.195 586.500 271.550 L 580.500 264.905 579.900 260.703 L 579.300 256.500 579.150 259.125 M 243.024 302.750 L 243.049 304.500 244.076 308.958 L 245.104 313.416 246.474 316.458 L 247.845 319.500 250.038 325.700 L 252.231 331.899 254.116 333.605 L 256 335.310 256 333.596 L 256 331.882 255.151 332.407 L 254.302 332.931 254.262 329.716 L 254.221 326.500 254.767 328 L 255.313 329.500 257.275 331.220 L 259.238 332.941 261.133 333.542 L 263.029 334.144 262.422 335.126 L 261.815 336.109 259.574 334.640 L 257.333 333.172 257.333 334.518 L 257.333 335.863 266.417 339.332 L 275.500 342.801 283.500 344.066 L 291.500 345.332 304 345.280 L 316.500 345.227 325.354 343.562 L 334.209 341.896 341.854 338.911 L 349.500 335.926 352.507 332.713 L 355.513 329.500 358.302 321 L 361.090 312.500 362.045 309.429 L 363 306.358 363 303.679 L 363 301 361.622 301 L 360.245 301 359.224 302.250 L 358.204 303.500 356.703 308.593 L 355.201 313.685 353.144 317.719 L 351.086 321.752 351.793 322.460 L 352.500 323.167 351.500 322.838 L 350.500 322.510 344.500 325.470 L 338.500 328.430 333 329.631 L 327.500 330.832 331 330.932 L 334.500 331.031 333.013 331.971 L 331.527 332.910 333.722 334.955 L 335.916 337 339.208 337.079 L 342.500 337.158 341 337.669 L 339.500 338.179 336.356 339.586 L 333.212 340.993 325.356 342.496 L 317.500 344 303.434 344 L 289.367 344 283.434 342.968 L 277.500 341.936 273.446 340.808 L 269.393 339.679 271.758 337.128 L 274.122 334.576 273.630 332.693 L 273.137 330.810 277.819 331.396 L 282.500 331.983 300.500 332.385 L 318.500 332.787 301 331.999 L 283.500 331.212 278 330.109 L 272.500 329.005 268 327.725 L 263.500 326.444 261.322 325.226 L 259.145 324.007 257.733 324.549 L 256.320 325.091 254.910 323.384 L 253.500 321.677 253.500 319.588 L 253.500 317.500 252.176 317.775 L 250.851 318.050 251.351 317.241 L 251.851 316.432 249.992 309.729 L 248.134 303.025 247.508 302.013 L 246.882 301 244.941 301 L 243 301 243.024 302.750 M 257.594 537.628 L 256.882 539.500 258.141 538.250 L 259.400 537 264.513 537 L 269.626 537 278.563 541.629 L 287.500 546.259 295.341 550.158 L 303.181 554.057 309.091 556.459 L 315 558.860 315 558.414 L 315 557.969 307.250 554.155 L 299.500 550.342 295.701 547.732 L 291.902 545.123 288.201 543.911 L 284.500 542.700 278.756 539.700 L 273.011 536.700 265.659 536.229 L 258.307 535.757 257.594 537.628 M 344.500 562.152 L 339.500 563.069 332 562.571 L 324.500 562.073 326.500 562.966 L 328.500 563.859 337 563.834 L 345.500 563.808 350.500 562.523 L 355.500 561.238 352.500 561.236 L 349.500 561.235 344.500 562.152" stroke="none" fill="#2b2c29" fill-rule="evenodd"/><path d="M 243.261 185.526 L 245.603 188.052 247.478 193.776 L 249.353 199.500 250.177 200.450 L 251 201.400 251 212.771 L 251 224.143 249.466 225.677 L 247.932 227.211 248.489 228.964 L 249.045 230.718 247.523 231.981 L 246 233.245 246 231.122 L 246 229 245.067 229 L 244.135 229 243.500 231 L 242.865 233 239.014 233 L 235.164 233 233.582 233.607 L 232 234.214 232 235.107 L 232 236 233.393 236 L 234.786 236 235.393 237.582 L 236 239.164 236 239.582 L 236 240 234.500 240 L 233 240 231 242 L 229 244 229 244.893 L 229 245.786 227.698 246.286 L 226.395 246.786 223.198 245.441 L 220 244.097 220 242.548 L 220 241 219 241 L 218 241 218 239.223 L 218 237.445 216.655 235.473 L 215.311 233.500 214.155 228.807 L 213 224.114 212.937 218.307 L 212.873 212.500 211.956 214.786 L 211.038 217.072 212.141 224.786 L 213.243 232.500 215.600 237.500 L 217.956 242.500 220.228 245.103 L 222.500 247.705 226.814 248.912 L 231.127 250.118 235.987 248.504 L 240.846 246.890 243.249 243.695 L 245.651 240.500 247.200 237.500 L 248.749 234.500 250.306 229.500 L 251.863 224.500 252.516 215.815 L 253.169 207.130 251.982 201.315 L 250.795 195.500 248.648 191.528 L 246.500 187.557 244.570 185.278 L 242.639 183 241.779 183 L 240.919 183 243.261 185.526 M 361.202 189.314 L 358.015 194.573 356.363 203.480 L 354.710 212.388 355.896 218.944 L 357.081 225.500 358.638 231.047 L 360.194 236.595 363.584 241.265 L 366.973 245.936 369.381 247.514 L 371.788 249.091 375.144 249.627 L 378.500 250.163 383.249 248.117 L 387.999 246.072 390.999 241.340 L 394 236.608 393.884 234.054 L 393.768 231.500 393.263 233.495 L 392.759 235.490 389.842 239.730 L 386.925 243.970 385.028 244.985 L 383.131 246 378.066 246 L 373 246 373 244.608 L 373 243.217 370.500 242.589 L 368 241.962 368 240.922 L 368 239.882 367.011 240.493 L 366.023 241.104 366.522 239.802 L 367.021 238.500 364.510 235.794 L 362 233.087 362 232.044 L 362 231 360.933 231 L 359.865 231 360.467 229.105 L 361.068 227.211 359.534 225.677 L 358 224.143 358 211.571 L 358 199 359 199 L 360 199 360 197.187 L 360 195.374 362.556 190.076 L 365.112 184.778 364.750 184.417 L 364.389 184.056 361.202 189.314 M 379.750 190.392 L 378 191.720 378 194.301 L 378 196.882 377 197.500 L 376 198.118 376.015 199.309 L 376.031 200.500 376.792 199.303 L 377.553 198.106 378.905 198.941 L 380.256 199.776 379.542 200.932 L 378.828 202.088 379.987 203.484 L 381.146 204.881 382.573 204.334 L 384 203.786 384 204.893 L 384 206 385.133 206 L 386.265 206 388.182 208.210 L 390.098 210.420 391.941 209.269 L 393.784 208.118 394.355 208.689 L 394.926 209.260 394.338 213.550 L 393.750 217.841 394.576 224.670 L 395.402 231.500 396.084 225.500 L 396.766 219.500 396.257 212.945 L 395.749 206.389 392.348 206.293 L 388.946 206.196 385.555 203.610 L 382.164 201.023 381.503 198.012 L 380.841 195 381.500 192 L 382.159 189 381.829 189.032 L 381.500 189.064 379.750 190.392 M 372.750 204.162 L 370 205.167 370 206.083 L 370 207 371 207 L 372 207 372 210.500 L 372 214 373 214 L 374 214 374 212.082 L 374 210.164 374.607 208.582 L 375.214 207 376.886 207 L 378.558 207 380 209 L 381.442 211 382.115 211 L 382.788 211 382.644 208.584 L 382.500 206.168 382 206.282 L 381.500 206.396 379.250 205.631 L 377 204.865 377 203.933 L 377 203 376.250 203.079 L 375.500 203.158 372.750 204.162 M 273.623 332.665 L 274.122 334.576 271.758 337.128 L 269.393 339.679 273.446 340.808 L 277.500 341.936 283.434 342.968 L 289.367 344 303.434 344 L 317.500 344 325.356 342.496 L 333.212 340.993 336.356 339.586 L 339.500 338.179 341 337.669 L 342.500 337.158 339.208 337.079 L 335.916 337 333.722 334.955 L 331.527 332.910 333.013 331.889 L 334.500 330.868 326.500 331.684 L 318.500 332.500 303 332.500 L 287.500 332.500 280.311 331.627 L 273.123 330.754 273.623 332.665" stroke="none" fill="#2a2b28" fill-rule="evenodd"/><path d="M 27 279.996 L 27 281.159 24.130 280.529 L 21.260 279.898 20.739 281.889 L 20.219 283.879 21.598 290.456 L 22.976 297.033 25.114 301.266 L 27.251 305.500 30.859 310.500 L 34.466 315.500 40.103 322.500 L 45.741 329.500 53.157 336.545 L 60.574 343.589 69.037 349.198 L 77.500 354.807 91.500 361.795 L 105.500 368.782 108 369.521 L 110.500 370.259 115 372.513 L 119.500 374.768 131.500 378.820 L 143.500 382.873 151 385.030 L 158.500 387.187 159.450 388.093 L 160.400 389 163.950 389.015 L 167.500 389.031 166 390 L 164.500 390.969 166.333 390.985 L 168.167 391 167.730 392.250 L 167.293 393.500 165.646 393.206 L 164 392.912 164 393.735 L 164 394.558 166 396 L 168 397.442 168 399.221 L 168 401 169 401 L 170 401 170 400 L 170 399 171 399 L 172 399 172 400.500 L 172 402 174.750 402.015 L 177.500 402.031 176 403 L 174.500 403.969 175.750 403.985 L 177 404 177 408.045 L 177 412.091 179.500 414.591 L 182 417.091 182 418.045 L 182 419 184 419 L 186 419 186 421.500 L 186 424 186.917 424 L 187.833 424 188.338 422.750 L 188.842 421.500 188.921 423.529 L 189 425.558 191 427 L 193 428.442 193 429.500 L 193 430.558 194.998 431.998 L 196.996 433.438 196.430 435.219 L 195.865 437 196.933 437 L 198 437 198 438.099 L 198 439.198 201 442 L 204 444.802 204 446.401 L 204 448 205.500 448 L 207 448 207 450.071 L 207 452.143 208.429 453.571 L 209.857 455 211.488 455 L 213.118 455 212.431 456.112 L 211.744 457.224 213.122 458.096 L 214.500 458.969 220 459.084 L 225.500 459.199 228 459.938 L 230.500 460.677 230.234 461.887 L 229.968 463.097 233.351 462.462 L 236.734 461.827 237.241 464.482 L 237.749 467.136 233.485 472.818 L 229.222 478.500 224.338 487 L 219.454 495.500 217.094 500.500 L 214.734 505.500 212.786 510 L 210.837 514.500 209.410 518.500 L 207.984 522.500 207.351 531.604 L 206.718 540.707 207.851 541.408 L 208.984 542.108 215.242 540.398 L 221.500 538.687 222.500 537.999 L 223.500 537.310 228 536.203 L 232.500 535.096 236 534.510 L 239.500 533.924 244.500 533.035 L 249.500 532.146 260 532.088 L 270.500 532.030 276.560 533.459 L 282.621 534.888 290.060 538.620 L 297.500 542.351 301.618 545.250 L 305.737 548.150 318.892 552.575 L 332.047 557 337.273 556.985 L 342.500 556.971 347 555.360 L 351.500 553.750 357.754 553.393 L 364.009 553.036 367.754 551.099 L 371.500 549.162 376.058 544.331 L 380.617 539.500 384.380 534.745 L 388.142 529.990 385.466 524.245 L 382.790 518.500 381.895 516.500 L 381 514.500 377.942 505.500 L 374.885 496.500 374.296 485.651 L 373.707 474.802 374.993 466.158 L 376.279 457.514 378.140 453.174 L 380 448.834 380 446.956 L 380 445.078 382.189 443.039 L 384.377 441 386.305 441 L 388.233 441 387.737 439.102 L 387.241 437.204 393.370 431.214 L 399.500 425.225 403.250 423.499 L 407 421.772 407 420.087 L 407 418.402 410.500 418.810 L 414 419.219 414 420.609 L 414 422 415 422 L 416 422 416.584 421.949 L 417.169 421.898 420.689 427.699 L 424.210 433.500 424.230 435.750 L 424.250 438 475.682 438 L 527.114 438 531.807 436.838 L 536.500 435.676 537 434.949 L 537.500 434.223 541.500 433.117 L 545.500 432.011 550.500 431.932 L 555.500 431.854 558.349 430.177 L 561.198 428.500 563.734 424 L 566.271 419.500 567.231 412.500 L 568.192 405.500 568.247 403 L 568.303 400.500 567.616 383.500 L 566.929 366.500 566.488 362.974 L 566.048 359.447 568.024 352.974 L 570 346.500 571.589 340 L 573.177 333.500 577.630 324.668 L 582.083 315.836 581.533 314.105 L 580.984 312.375 583.568 310.128 L 586.152 307.881 584.576 305.476 L 583 303.070 583 302.535 L 583 302 586.026 302 L 589.053 302 588.822 296.164 L 588.592 290.328 585.546 291.414 L 582.500 292.500 581.568 293.987 L 580.636 295.474 576.568 299.733 L 572.500 303.992 571.750 303.996 L 571 304 571 303.093 L 571 302.186 575.498 295.343 L 579.996 288.500 579.998 284.309 L 580 280.118 578.933 279.459 L 577.867 278.800 576.472 280.650 L 575.077 282.500 572.453 289 L 569.830 295.500 566.941 300 L 564.053 304.500 563.026 305.708 L 562 306.916 562 307.822 L 562 308.729 558.942 312.114 L 555.884 315.500 554.335 317.738 L 552.786 319.976 547.643 322.949 L 542.500 325.922 534.503 331.900 L 526.505 337.878 518.503 341.946 L 510.500 346.014 509 346.957 L 507.500 347.900 501 350.783 L 494.500 353.665 490.037 355.583 L 485.575 357.500 478.537 357.447 L 471.500 357.393 459 357.143 L 446.500 356.893 436.500 357.912 L 426.500 358.932 414 360.848 L 401.500 362.764 389 366.467 L 376.500 370.170 371.359 371.588 L 366.218 373.005 363.359 374.497 L 360.500 375.988 359.556 375.994 L 358.612 376 348.056 380.152 L 337.500 384.304 316.810 384.785 L 296.120 385.265 278.310 384.111 L 260.500 382.958 239 381.448 L 217.500 379.939 205.653 378.469 L 193.805 376.999 187.153 375.449 L 180.500 373.900 168.864 371.437 L 157.229 368.974 143.364 364.421 L 129.500 359.868 122.500 357.294 L 115.500 354.720 104.170 349.360 L 92.839 344 92.410 344 L 91.980 344 82.740 337.895 L 73.500 331.790 67 326.505 L 60.500 321.219 55.890 316.860 L 51.281 312.500 46.890 307 L 42.500 301.500 41.750 301.167 L 41 300.833 41 299.745 L 41 298.657 39.601 297.079 L 38.203 295.500 35.931 291.500 L 33.660 287.500 31.536 283.569 L 29.411 279.637 28.206 279.235 L 27 278.833 27 279.996" stroke="none" fill="#df0f16" fill-rule="evenodd"/><path d="M 23.700 267.214 L 19.901 268.222 18.284 270.689 L 16.667 273.156 16.424 282.828 L 16.180 292.500 17.098 299.331 L 18.016 306.163 20.631 311.831 L 23.246 317.500 25.448 323.500 L 27.649 329.500 30.574 333.871 L 33.500 338.241 36.698 343.371 L 39.895 348.500 41.698 351.500 L 43.500 354.500 43.439 363.500 L 43.379 372.500 41.260 379.500 L 39.141 386.500 38.477 390.153 L 37.814 393.806 39.553 397.471 L 41.292 401.136 45.396 406.398 L 49.500 411.660 58 419.194 L 66.500 426.729 70 429.949 L 73.500 433.170 72 432.406 L 70.500 431.642 67.250 429.202 L 64 426.763 64 427.349 L 64 427.935 69.341 431.968 L 74.682 436 75.400 436 L 76.118 436 75.405 434.845 L 74.691 433.691 75.862 434.415 L 77.033 435.138 76.488 436.020 L 75.943 436.902 81.721 440.622 L 87.500 444.342 100.500 450.566 L 113.500 456.790 122 459.344 L 130.500 461.898 138.500 463.893 L 146.500 465.888 158.500 467.551 L 170.500 469.215 195.500 468.681 L 220.500 468.147 227.851 467.008 L 235.201 465.868 235.733 466.400 L 236.265 466.931 230.716 474.216 L 225.168 481.500 220.184 489.751 L 215.199 498.003 211.535 506.751 L 207.871 515.500 206.435 522.315 L 205 529.131 205 536.097 L 205 543.063 206.499 543.638 L 207.999 544.214 220.508 540.634 L 233.016 537.055 241.258 535.879 L 249.500 534.703 261.376 535.764 L 273.251 536.826 278.876 539.763 L 284.500 542.700 288.201 543.911 L 291.902 545.123 295.701 547.732 L 299.500 550.342 307.417 554.421 L 315.334 558.500 317.614 559.779 L 319.894 561.058 328.391 562.155 L 336.888 563.252 347.858 561.653 L 358.827 560.054 365.664 555.373 L 372.500 550.693 380.323 543.096 L 388.146 535.500 390.166 532.715 L 392.186 529.930 388.137 522.147 L 384.088 514.364 381.063 505.030 L 378.037 495.695 376.967 485.180 L 375.898 474.665 376.565 469.083 L 377.233 463.500 380.161 454.258 L 383.089 445.016 385.294 444.584 L 387.500 444.152 402.500 443.088 L 417.500 442.024 438 440.903 L 458.500 439.783 500.183 440.300 L 541.866 440.817 545.767 439.941 L 549.668 439.065 556.542 435.047 L 563.417 431.030 565.693 428.575 L 567.969 426.120 570.235 421.810 L 572.500 417.500 572.554 383 L 572.608 348.500 574.868 342.129 L 577.127 335.759 582.048 325.806 L 586.968 315.853 588.822 313.176 L 590.675 310.500 592.088 305.500 L 593.500 300.500 593.315 291.305 L 593.130 282.111 592.024 280.045 L 590.918 277.979 585.796 272.989 L 580.674 268 579.376 268 L 578.077 268 576.597 272.985 L 575.117 277.971 570.820 286.235 L 566.523 294.500 560.836 302.052 L 555.149 309.604 547.681 316.698 L 540.212 323.793 532.772 329.392 L 525.333 334.992 517.154 339.907 L 508.976 344.823 497.738 349.618 L 486.500 354.413 462.500 354.571 L 438.500 354.729 424.500 356.880 L 410.500 359.031 398.421 361.955 L 386.343 364.879 376.421 367.841 L 366.500 370.802 361 372.972 L 355.500 375.141 347.500 378.821 L 339.500 382.500 307.500 382.500 L 275.500 382.500 257.500 381.776 L 239.500 381.051 240.500 381.460 L 241.500 381.868 269.445 383.565 L 297.391 385.262 317.445 384.780 L 337.500 384.298 348 380.235 L 358.500 376.172 361 375.463 L 363.500 374.755 364.500 373.970 L 365.500 373.184 371 371.677 L 376.500 370.170 389 366.467 L 401.500 362.764 414 360.848 L 426.500 358.932 436.500 357.912 L 446.500 356.893 459 357.143 L 471.500 357.393 478.537 357.447 L 485.575 357.500 490.037 355.583 L 494.500 353.665 501 350.783 L 507.500 347.900 509 346.957 L 510.500 346.014 518.503 341.946 L 526.505 337.878 534.503 331.900 L 542.500 325.922 547.643 322.949 L 552.786 319.976 554.335 317.738 L 555.884 315.500 558.942 312.114 L 562 308.729 562 307.822 L 562 306.916 563.026 305.708 L 564.053 304.500 566.941 300 L 569.830 295.500 572.453 289 L 575.077 282.500 576.472 280.650 L 577.867 278.800 578.933 279.459 L 580 280.118 579.998 284.309 L 579.996 288.500 575.498 295.343 L 571 302.186 571 303.093 L 571 304 571.750 303.996 L 572.500 303.992 576.568 299.733 L 580.636 295.474 581.568 293.987 L 582.500 292.500 585.546 291.414 L 588.592 290.328 588.822 296.164 L 589.053 302 586.026 302 L 583 302 583 302.535 L 583 303.070 584.576 305.476 L 586.152 307.881 583.568 310.128 L 580.984 312.375 581.533 314.105 L 582.083 315.836 577.630 324.668 L 573.177 333.500 571.589 340 L 570 346.500 568.024 352.974 L 566.048 359.447 566.488 362.974 L 566.929 366.500 567.616 383.500 L 568.303 400.500 568.247 403 L 568.192 405.500 567.231 412.500 L 566.271 419.500 563.734 424 L 561.198 428.500 558.349 430.177 L 555.500 431.854 550.500 431.932 L 545.500 432.011 541.500 433.117 L 537.500 434.223 537 434.949 L 536.500 435.676 531.807 436.838 L 527.114 438 475.682 438 L 424.250 438 424.230 435.750 L 424.210 433.500 420.689 427.699 L 417.169 421.898 416.584 421.949 L 416 422 415 422 L 414 422 414 420.609 L 414 419.219 410.500 418.810 L 407 418.402 407 420.087 L 407 421.772 403.250 423.499 L 399.500 425.225 393.370 431.214 L 387.241 437.204 387.737 439.102 L 388.233 441 386.305 441 L 384.377 441 382.189 443.039 L 380 445.078 380 446.956 L 380 448.834 378.140 453.174 L 376.279 457.514 374.993 466.158 L 373.707 474.802 374.296 485.651 L 374.885 496.500 377.942 505.500 L 381 514.500 381.895 516.500 L 382.790 518.500 385.466 524.245 L 388.142 529.990 384.380 534.745 L 380.617 539.500 376.058 544.331 L 371.500 549.162 367.754 551.099 L 364.009 553.036 357.754 553.393 L 351.500 553.750 347 555.360 L 342.500 556.971 337.273 556.985 L 332.047 557 318.892 552.575 L 305.737 548.150 301.618 545.250 L 297.500 542.351 290.060 538.620 L 282.621 534.888 276.560 533.459 L 270.500 532.030 260 532.088 L 249.500 532.146 244.500 533.035 L 239.500 533.924 236 534.510 L 232.500 535.096 228 536.203 L 223.500 537.310 222.500 537.999 L 221.500 538.687 215.242 540.398 L 208.984 542.108 207.851 541.408 L 206.718 540.707 207.351 531.604 L 207.984 522.500 209.410 518.500 L 210.837 514.500 212.786 510 L 214.734 505.500 217.094 500.500 L 219.454 495.500 224.338 487 L 229.222 478.500 233.485 472.818 L 237.749 467.136 237.241 464.482 L 236.734 461.827 233.351 462.462 L 229.968 463.097 230.234 461.887 L 230.500 460.677 228 459.938 L 225.500 459.199 220 459.084 L 214.500 458.969 213.122 458.096 L 211.744 457.224 212.431 456.112 L 213.118 455 211.488 455 L 209.857 455 208.429 453.571 L 207 452.143 207 450.071 L 207 448 205.500 448 L 204 448 204 446.401 L 204 444.802 201 442 L 198 439.198 198 438.099 L 198 437 196.933 437 L 195.865 437 196.430 435.219 L 196.996 433.438 194.998 431.998 L 193 430.558 193 429.500 L 193 428.442 191 427 L 189 425.558 188.921 423.529 L 188.842 421.500 188.338 422.750 L 187.833 424 186.917 424 L 186 424 186 421.500 L 186 419 184 419 L 182 419 182 418.045 L 182 417.091 179.500 414.591 L 177 412.091 177 408.045 L 177 404 175.750 403.985 L 174.500 403.969 176 403 L 177.500 402.031 174.750 402.015 L 172 402 172 400.500 L 172 399 171 399 L 170 399 170 400 L 170 401 169 401 L 168 401 168 399.221 L 168 397.442 166 396 L 164 394.558 164 393.735 L 164 392.912 165.646 393.206 L 167.293 393.500 167.730 392.250 L 168.167 391 166.333 390.985 L 164.500 390.969 166 390 L 167.500 389.031 163.950 389.015 L 160.400 389 159.450 388.093 L 158.500 387.187 151 385.030 L 143.500 382.873 131.500 378.820 L 119.500 374.768 115 372.513 L 110.500 370.259 108 369.521 L 105.500 368.782 91.500 361.795 L 77.500 354.807 69.037 349.198 L 60.574 343.589 53.157 336.545 L 45.741 329.500 40.103 322.500 L 34.466 315.500 30.859 310.500 L 27.251 305.500 25.114 301.266 L 22.976 297.033 21.598 290.456 L 20.219 283.879 20.745 281.865 L 21.272 279.851 23.791 280.484 L 26.310 281.116 27.043 279.930 L 27.776 278.744 28.903 279.440 L 30.030 280.137 31.479 283.318 L 32.928 286.500 35.567 291 L 38.205 295.500 39.603 297.079 L 41 298.657 41 299.745 L 41 300.833 41.750 301.167 L 42.500 301.500 46.890 307 L 51.281 312.500 55.890 316.860 L 60.500 321.219 67 326.505 L 73.500 331.790 82.740 337.895 L 91.980 344 92.410 344 L 92.839 344 104.170 349.360 L 115.500 354.720 122.500 357.294 L 129.500 359.868 143.364 364.421 L 157.229 368.974 168.864 371.437 L 180.500 373.900 187.100 375.437 L 193.700 376.974 205.100 378.436 L 216.500 379.897 227.500 380.396 L 238.500 380.895 231 379.938 L 223.500 378.982 209 376.955 L 194.500 374.928 177 371.423 L 159.500 367.919 144 363.055 L 128.500 358.191 120.769 355.113 L 113.038 352.036 101.920 346.460 L 90.802 340.884 82.158 335.308 L 73.514 329.732 66.378 323.900 L 59.241 318.069 52.780 310.784 L 46.319 303.500 42.296 297.500 L 38.274 291.500 35.277 285.500 L 32.280 279.500 30.058 272.750 L 27.837 266 27.668 266.103 L 27.500 266.207 23.700 267.214" stroke="none" fill="#cb141a" fill-rule="evenodd"/><path d="M 116.500 3.615 L 112.500 4.020 108 5.134 L 103.500 6.248 99.172 7.638 L 94.844 9.029 92.172 10.417 L 89.500 11.805 85.500 14.961 L 81.500 18.117 74.750 24.712 L 68 31.307 68 32.133 L 68 32.959 61.472 42.654 L 54.944 52.350 51.350 59.925 L 47.757 67.500 46.960 70.500 L 46.163 73.500 43.209 82 L 40.255 90.500 39.191 94.500 L 38.126 98.500 37.097 103 L 36.069 107.500 34.465 115 L 32.862 122.500 31.996 126.500 L 31.130 130.500 30.077 138 L 29.024 145.500 28.514 150.500 L 28.003 155.500 26.987 183 L 25.971 210.500 26.580 237.500 L 27.189 264.500 30.040 272.677 L 32.892 280.853 35.584 286.177 L 38.277 291.500 42.298 297.500 L 46.319 303.500 52.780 310.784 L 59.241 318.069 66.378 323.900 L 73.514 329.732 82.158 335.308 L 90.802 340.884 101.920 346.460 L 113.038 352.036 120.769 355.113 L 128.500 358.191 144 363.030 L 159.500 367.868 171.500 370.373 L 183.500 372.877 195.500 374.920 L 207.500 376.962 224.500 378.918 L 241.500 380.874 266.500 382.049 L 291.500 383.224 315.500 382.850 L 339.500 382.476 347.500 378.809 L 355.500 375.141 361 372.972 L 366.500 370.802 376.421 367.841 L 386.343 364.879 398.421 361.955 L 410.500 359.031 424.500 356.880 L 438.500 354.729 462.500 354.571 L 486.500 354.413 497.738 349.618 L 508.976 344.823 517.154 339.907 L 525.333 334.992 532.772 329.392 L 540.212 323.793 547.681 316.698 L 555.149 309.604 560.836 302.052 L 566.523 294.500 570.820 286.235 L 575.117 277.971 576.494 273.235 L 577.871 268.500 579.070 260.115 L 580.269 251.731 579.639 221.115 L 579.009 190.500 578.536 172 L 578.064 153.500 575.940 140 L 573.816 126.500 572.961 121.500 L 572.106 116.500 571.205 112 L 570.304 107.500 569.137 103 L 567.969 98.500 566.984 94.750 L 566 91 564.886 86.750 L 563.772 82.500 562.966 80.500 L 562.160 78.500 559.531 71 L 556.902 63.500 550.701 51.004 L 544.500 38.508 540.118 33.004 L 535.736 27.500 531.118 22.708 L 526.500 17.915 520.479 13.989 L 514.459 10.064 504.979 6.926 L 495.500 3.788 481.706 3.888 L 467.913 3.988 463.206 5.411 L 458.500 6.834 447.500 10.021 L 436.500 13.209 423 18.735 L 409.500 24.260 407.500 25.086 L 405.500 25.913 390.253 32.956 L 375.006 40 374.569 40 L 374.133 40 369.308 42.999 L 364.483 45.999 354.491 49.489 L 344.500 52.980 342.297 52.990 L 340.094 53 337.797 53.892 L 335.500 54.784 326.333 56.511 L 317.165 58.239 300.833 57.766 L 284.500 57.294 279.500 56.043 L 274.500 54.792 269.500 53.317 L 264.500 51.843 254.777 48.920 L 245.055 45.997 239.154 42.999 L 233.253 40 232.621 40 L 231.990 40 226.808 37.500 L 221.626 35 220.765 35 L 219.903 35 216.202 33.169 L 212.500 31.338 206 27.840 L 199.500 24.342 197.500 23.224 L 195.500 22.106 189.500 19.977 L 183.500 17.849 180 16.322 L 176.500 14.796 174.500 14.023 L 172.500 13.249 166.500 11.503 L 160.500 9.757 156.500 7.978 L 152.500 6.200 149.296 5.168 L 146.093 4.136 133.296 3.673 L 120.500 3.209 116.500 3.615 M 226.250 180.566 L 222 183.113 222 184.149 L 222 185.185 224 187.727 L 226 190.270 226 193.570 L 226 196.870 225.048 199.374 L 224.096 201.878 221.798 203.134 L 219.500 204.390 215.544 204.945 L 211.588 205.500 210.894 208 L 210.199 210.500 210.100 217.083 L 210 223.666 211.122 229.254 L 212.244 234.842 215.451 240.671 L 218.658 246.500 223.579 249.225 L 228.500 251.951 232 251.353 L 235.500 250.756 239 248.801 L 242.500 246.846 245.832 242.356 L 249.165 237.865 251.592 230.728 L 254.020 223.592 254.621 215.546 L 255.222 207.500 253.534 201.060 L 251.847 194.620 249.813 190.560 L 247.780 186.500 245.140 183.661 L 242.500 180.821 239.800 179.411 L 237.099 178 233.800 178.009 L 230.500 178.019 226.250 180.566 M 369.500 179.388 L 366.500 180.697 362.871 184.718 L 359.242 188.738 356.924 194.619 L 354.606 200.500 354.553 212 L 354.500 223.500 356.213 229 L 357.927 234.500 361.213 239.961 L 364.500 245.422 368.837 248.461 L 373.174 251.500 377.553 251.405 L 381.933 251.310 385.961 248.645 L 389.988 245.980 392.431 242.109 L 394.875 238.238 396.473 232.742 L 398.070 227.247 397.785 216.373 L 397.500 205.500 392.812 204.961 L 388.124 204.422 386.153 202.639 L 384.183 200.855 382.994 197.987 L 381.806 195.118 382.954 191.639 L 384.102 188.160 385.551 186.958 L 387 185.755 387 184.467 L 387 183.179 381.804 180.589 L 376.607 178 374.554 178.039 L 372.500 178.078 369.500 179.388 M 243.424 306.141 L 244.106 311.282 246.152 317.513 L 248.197 323.744 250.851 329.122 L 253.505 334.500 258.003 336.707 L 262.500 338.914 271 341.347 L 279.500 343.780 290.427 344.951 L 301.354 346.122 310.427 345.493 L 319.500 344.863 327.183 343.380 L 334.867 341.896 340.641 339.866 L 346.416 337.836 349.120 336.438 L 351.823 335.040 353.847 332.468 L 355.870 329.896 358.926 320.698 L 361.982 311.500 362.865 306.731 L 363.749 301.963 362.865 301.417 L 361.982 300.871 360.045 301.486 L 358.108 302.100 355.880 309.161 L 353.652 316.221 351.538 319.360 L 349.424 322.500 341.959 325.703 L 334.494 328.907 322.696 330.453 L 310.898 332 303.135 332 L 295.373 332 284.436 330.545 L 273.500 329.091 267.739 327.096 L 261.978 325.100 258.947 323.310 L 255.916 321.519 252.958 315.600 L 250 309.681 250 307.563 L 250 305.445 248.443 303.223 L 246.887 301 244.814 301 L 242.742 301 243.424 306.141 M 57 423.512 L 57 424.142 59.999 429.821 L 62.998 435.500 65.571 442.500 L 68.144 449.500 68.975 451.500 L 69.805 453.500 72.049 459.500 L 74.293 465.500 75.647 468.750 L 77 472 78.396 475.250 L 79.792 478.500 82.080 484 L 84.368 489.500 90.733 501.891 L 97.097 514.282 100.216 519.891 L 103.336 525.500 104.918 528.010 L 106.500 530.521 114.187 541.510 L 121.875 552.500 134.187 564.655 L 146.500 576.810 153.974 581.405 L 161.448 586 162.600 586 L 163.751 586 169.404 588.500 L 175.057 591 190.779 590.985 L 206.500 590.971 210.870 589.449 L 215.241 587.927 218.370 586.309 L 221.500 584.692 226.500 580.983 L 231.500 577.273 235.500 572.508 L 239.500 567.742 244.137 561.121 L 248.775 554.500 253.387 545.884 L 258 537.268 258 536.134 L 258 535 251.588 535 L 245.176 535 237.338 536.494 L 229.500 537.988 218.783 541.114 L 208.067 544.240 206.533 543.651 L 205 543.063 205 536.097 L 205 529.131 206.435 522.315 L 207.871 515.500 211.535 506.751 L 215.199 498.003 220.184 489.751 L 225.168 481.500 230.716 474.216 L 236.265 466.931 235.733 466.400 L 235.201 465.868 227.851 467.008 L 220.500 468.147 195.500 468.681 L 170.500 469.215 158.500 467.551 L 146.500 465.888 138.500 463.893 L 130.500 461.898 122 459.344 L 113.500 456.790 100.358 450.519 L 87.216 444.248 79.358 438.989 L 71.500 433.730 65.500 429.032 L 59.500 424.335 58.250 423.608 L 57 422.882 57 423.512 M 434 440.993 L 420.500 441.811 404 442.972 L 387.500 444.133 385.294 444.574 L 383.089 445.016 380.161 454.258 L 377.233 463.500 376.565 469.083 L 375.898 474.665 376.967 485.180 L 378.037 495.695 381.063 505.030 L 384.088 514.364 388.137 522.147 L 392.186 529.930 390.166 532.715 L 388.146 535.500 380.323 543.121 L 372.500 550.743 366.250 554.909 L 360 559.075 360 559.666 L 360 560.258 363.646 564.379 L 367.292 568.500 374.636 576.182 L 381.980 583.865 388.418 587.034 L 394.855 590.203 402.678 591.582 L 410.500 592.961 416.429 592.980 L 422.358 593 425.429 592.068 L 428.500 591.136 433 589.876 L 437.500 588.617 444.118 585.453 L 450.736 582.289 457.213 577.667 L 463.690 573.046 472.244 564.273 L 480.797 555.500 483.753 552 L 486.709 548.500 495.161 536 L 503.612 523.500 505.158 520.500 L 506.704 517.500 510.698 511 L 514.692 504.500 516.230 501 L 517.767 497.500 520.020 492.500 L 522.272 487.500 525.503 480.500 L 528.734 473.500 529.498 471 L 530.261 468.500 532.020 464.500 L 533.779 460.500 535.466 456 L 537.154 451.500 539.981 446.250 L 542.808 441 542.654 440.941 L 542.500 440.883 495 440.528 L 447.500 440.174 434 440.993" stroke="none" fill="#e7f3fa" fill-rule="evenodd"/></svg>                 
                </span>
                <div class="grid grid-rows-2"> 
                    <span class="ml-4 text-lg tracking-wide font-bold truncate">© Alpha Clinicas </span>
                    <span style="font-size:0.6rem" class="ml-4 tracking-wide  truncate">Todos los derechos reservados - 2023  </span>

                </div>
             


          </a>

          <a href="https://github.com/GodoyMS" style="bottom:3rem"class="relative flex flex-row  items-center h-11 focus:outline-none  text-white-600  border-l-4 border-transparent pr-6">
            
           
                <span style="font-size:0.55rem;margin-left:5rem" class=" flex tracking-wide  text-gray-300  truncate">Desarrollado por Godoy Muñoz S. </span>

         


         </a> -->

              
                         
              
           
         <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs grid grid-rows-2">
        <span> <a href="https://alpha-clinicas.com/" class="hover:underline semibold">         Alpha Clinicas </a>- Copyright @2023</span>       
        <a href="https://github.com/GodoyMS" target="_blank" style="font-size: 0.55rem" class="text-gray-200 hover:underline decoration-red-500"> Desarrollado por Godoy Muñoz S.</a>        
 
        </p>

        </div>
      </div>
      <!-- ./Sidebar -->