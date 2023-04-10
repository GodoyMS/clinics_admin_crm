

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
    background-color: white;
  }
  .dark .dark\:bg-gray-800 {
    background-color: ;rgba(31, 41, 55)
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
    color: rgb(120,120,120);
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
<div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
        <div class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-blue-600  border-none">

        <?php include 'logo.php';?>
        
         
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
                    echo'  
                    
                    <li class="p-2 ">
                          <a href="">
                              
                                <div class="flex items-center">
                                    <div class="relative inline-block shrink-0">
                                    <svg fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                      <path clip-rule="evenodd" fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
                                    </svg>                                
                                    
                                    </div>
                                    <div class="ml-3 text-sm font-normal">
                                        <div class="text-sm font-semibold text-gray-900  ">Aun no tienes niguna notificación</div>
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
        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
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
          <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs grid grid-rows-2">
        <span> <a href="../index.php" class="hover:underline semibold">         Alpha Clinicas </a>- Copyright @2023</span>       
        <a href="https://github.com/GodoyMS" target="_blank" style="font-size: 0.55rem" class="text-gray-200 hover:underline decoration-red-500"> Desarrollado por Godoy Muñoz S.</a>        
 
        </p>       
       </div>
      </div>
      <!-- ./Sidebar -->