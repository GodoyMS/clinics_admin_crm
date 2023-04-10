
      
<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   //FETCH PROFESIONALES
   $selectProfesionales = $conn->prepare("SELECT * FROM `doctores` WHERE clinica_id= ? ");
   $selectProfesionales ->execute([$user_id]);
   if($selectProfesionales->rowCount()>0){
    $fetchProfesionales = $selectProfesionales->fetch(PDO::FETCH_ASSOC);
   }

   //FETCH PACIENTES
   $selectPacientes = $conn->prepare("SELECT * FROM `pacientes` WHERE clinica_id= ? ");
   $selectPacientes ->execute([$user_id]);
   if($selectPacientes->rowCount()>0){
    $fetchPacientes = $selectPacientes->fetch(PDO::FETCH_ASSOC);
   }
   //FETCH CITAS TOTALES
   $selectCitasTotales = $conn->prepare("SELECT * FROM `eventos` WHERE user_id= ? ");
   $selectCitasTotales ->execute([$user_id]);
   if($selectCitasTotales->rowCount()>0){
    $fetchCitasTotales = $selectCitasTotales->fetch(PDO::FETCH_ASSOC);
   }
   //GET YEAR MONTH
   date_default_timezone_set('America/New_York');
  $thisYearMonth=date("Y-m"); 
      //FETCH CITAS ESTE MES
   $selectCitasThisMonth = $conn->prepare("SELECT * FROM `eventos` WHERE user_id= ? AND yearMonth=? ORDER BY inicio");
   $selectCitasThisMonth ->execute([$user_id,$thisYearMonth]);
  


}else{
   $user_id = '';
   header('location:../index.php');

};
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
      <div class="h-full ml-14 mt-14 bg-gray-50  mb-10 md:ml-64">

     



      <!---->
      <div style="" class=" grid gap-6 p-4 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-lg ">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full  ">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 ">
                    Profesionales
                  </p>
                  <p class="text-lg font-semibold text-gray-700 ">
                  <?=$selectProfesionales->rowCount();?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-lg ">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full  ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" >
                  <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                </svg>

                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 ">
                    Pacientes
                  </p>
                  <p class="text-lg font-semibold text-gray-700 ">
                    <?=$selectPacientes->rowCount();?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-lg ">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full  ">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" >
                    <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                  </svg>

                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 ">
                    Citas agendadas en total
                  </p>
                  <p class="text-lg font-semibold text-gray-700 ">
                  <?=$selectCitasTotales->rowCount();?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-lg ">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full  ">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                      <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                    </svg>

                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 ">
                    Citas para este mes
                  </p>
                  <p class="text-lg font-semibold text-gray-700 ">
                  <?=$selectCitasThisMonth->rowCount();?>

                  </p>
                </div>
              </div>
            </div>
        
      <!---->




   




















    
        
    


        <div class="grid grid-cols-1 lg:grid-cols-1 p-4 gap-4">
    
          <!-- Social Traffic -->
          <div style="m" class="relative mx-auto flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50  w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
              <div class="flex flex-wrap items-center px-4 py-2">
                <div class="relative w-full max-w-full flex-grow flex-1">
                  <h3 class="font-semibold text-base text-gray-900 ">Citas este mes</h3>
                </div>
                <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                  <a  href="citas.php"class="bg-blue-500  text-white active:bg-blue-600   text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" >Ver más</a>
                </div>
              </div>
              <div class="block w-full overflow-x-auto">
                <table class="items-center w-full bg-transparent border-collapse">
                  <thead>
                    <tr>
                      <th class="px-4 bg-gray-100  text-gray-500  align-middle border border-solid border-gray-200  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Paciente</th>
                      <th class="px-4 bg-gray-100  text-gray-500  align-middle border border-solid border-gray-200  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Doctor</th>
                      <th class="px-4 bg-gray-100  text-gray-500  align-middle border border-solid border-gray-200  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $stringMonth=['','Ene','Feb','Marz','Abr','May','Jun','Jul','Agos','Sept','Oct','Nov','Dic'];

                    if($selectCitasThisMonth->rowCount()>0){

                    
                    while($fetchCitasThisMonth = $selectCitasThisMonth->fetch(PDO::FETCH_ASSOC)){

                   

                      ?>
                    

                    <tr class="text-gray-700 ">
                      <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"><?=$fetchCitasThisMonth['nombreEvento'];?></th>
                      <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?=$fetchCitasThisMonth['doctor'];?></td>
                      <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"> <?=$stringMonth[(int)substr($fetchCitasThisMonth['inicio'],5,2)].'-'.substr($fetchCitasThisMonth['inicio'],8,8);?>  <?php
                      ?>
                      </td>
                    </tr>

                    <?php
                    }
                  }else{

                    echo '<tr class="text-gray-700 ">
                    <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"></th>
                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Aun no hay citas para este mes</td>
                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">  
                    </td>
                  </tr>';
                  }

                    ?>
                    
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
          <!-- ./Social Traffic -->
    
          <!-- Recent Activities -->
          <!-- <div class="relative flex flex-col min-w-0 break-words bg-gray-50  w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
              <div class="flex flex-wrap items-center px-4 py-2">
                <div class="relative w-full max-w-full flex-grow flex-1">
                  <h3 class="font-semibold text-base text-gray-900 ">Recent Activities</h3>
                </div>
                <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                  <button class="bg-blue-500  text-white active:bg-blue-600   text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">See all</button>
                </div>
              </div>
              <div class="block w-full">
                <div class="px-4 bg-gray-100  text-gray-500  align-middle border border-solid border-gray-200  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                  Today
                </div>
                <ul class="my-1">
                  <li class="flex px-4">
                    <div class="w-9 h-9 rounded-full flex-shrink-0 bg-indigo-500 my-2 mr-3">
                      <svg class="w-9 h-9 fill-current text-indigo-50" viewBox="0 0 36 36"><path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path></svg>
                    </div>
                    <div class="flex-grow flex items-center border-b border-gray-100  text-sm text-gray-600  py-2">
                      <div class="flex-grow flex justify-between items-center">
                        <div class="self-center">
                          <a class="font-medium text-gray-800 hover:text-gray-900  " href="#0" style="outline: none;">Nick Mark</a> mentioned <a class="font-medium text-gray-800  " href="#0" style="outline: none;">Sara Smith</a> in a new post
                        </div>
                        <div class="flex-shrink-0 ml-2">
                          <a class="flex items-center font-medium text-blue-500 hover:text-blue-600  " href="#0" style="outline: none;">
                            View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="flex px-4">
                    <div class="w-9 h-9 rounded-full flex-shrink-0 bg-red-500 my-2 mr-3">
                      <svg class="w-9 h-9 fill-current text-red-50" viewBox="0 0 36 36"><path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z"></path></svg>
                    </div>
                    <div class="flex-grow flex items-center border-gray-100 text-sm text-gray-600  py-2">
                      <div class="flex-grow flex justify-between items-center">
                        <div class="self-center">
                          The post <a class="font-medium text-gray-800  " href="#0" style="outline: none;">Post Name</a> was removed by <a class="font-medium text-gray-800 hover:text-gray-900  " href="#0" style="outline: none;">Nick Mark</a>
                        </div>
                        <div class="flex-shrink-0 ml-2">
                          <a class="flex items-center font-medium text-blue-500 hover:text-blue-600  " href="#0" style="outline: none;">
                            View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="px-4 bg-gray-100  text-gray-500  align-middle border border-solid border-gray-200  py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                  Yesterday
                </div>
                <ul class="my-1">
                  <li class="flex px-4">
                    <div class="w-9 h-9 rounded-full flex-shrink-0 bg-green-500 my-2 mr-3">
                      <svg class="w-9 h-9 fill-current text-light-blue-50" viewBox="0 0 36 36"><path d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z"></path></svg>
                    </div>
                    <div class="flex-grow flex items-center border-gray-100 text-sm text-gray-600  py-2">
                      <div class="flex-grow flex justify-between items-center">
                        <div class="self-center">
                          <a class="font-medium text-gray-800 hover:text-gray-900  " href="#0" style="outline: none;">240+</a> users have subscribed to <a class="font-medium text-gray-800  " href="#0" style="outline: none;">Newsletter #1</a>
                        </div>
                        <div class="flex-shrink-0 ml-2">
                          <a class="flex items-center font-medium text-blue-500 hover:text-blue-600  " href="#0" style="outline: none;">
                            View<span><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div> -->
          <!-- ./Recent Activities -->
       
    









         <!--DOCTORES-->
    <h3 class="font-semibold mt-10 text-2xl text-center text-gray-900 ">Profesionales</h3>
    <span class="block w-48 mx-auto h-1 rounded-full  bg-blue-500"></span>      <?php
         //FETCH DOCTORES
        $selectDoctores = $conn->prepare("SELECT * FROM `doctores` WHERE clinica_id= ? ");
        $selectDoctores ->execute([$user_id]);
        if($selectDoctores->rowCount()>0){
          ?>
        <div style="" class=" mx-auto grid py-8 grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 px-4 ">

          <?php
         while($fetchDoctores = $selectDoctores->fetch(PDO::FETCH_ASSOC)) {
          ?>
              <div class="w-full   bg-white border border-gray-200 rounded-lg shadow  ">                  

                  <div class="flex flex-col items-center pb-4 pt-4">
                      <?php
                           if($fetchDoctores['sexo']=='Hombre'){
                            echo '<img src="./imgAvatar/doctor2.png" class="avatarDoctor mb-3 "> ';
                          }else{
                            echo '<img src="./imgAvatar/doctora3.png" class="avatarDoctor mb-3 "> ';
                          }
                      ?>
                      <style>
                        .avatarDoctor{
                            width:4rem;
                            height:4rem;
                        }
                        @media (min-width:580px) {

                          .avatarDoctor{
                            width:6rem;
                            height:6rem;
                          }
                          
                        }
                      

                      </style>
                      <h5 class="mb-1 text-xs md:text-base font-medium text-gray-900 "><?=$fetchDoctores['nombre'];?></h5>
                      <span class="text-sm text-gray-500 px-1 "><?=$fetchDoctores['especialidad'];?></span>
                      <div class="flex mt-4 flex-wrap justify-center space-x-3 md:mt-6">
                          <a href="mailto:<?=$fetchDoctores['correoDoctor'];?>"  target="_blank" class="inline-flex bg-gray-100 items-center px-2 py-2 text-sm font-medium text-center text-white rounded-full   hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="7.086 -169.483 1277.149 1277.149" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality"><path fill="none" d="M1138.734 931.095h.283M1139.017 931.095h-.283"/><path d="M1179.439 7.087c57.543 0 104.627 47.083 104.627 104.626v30.331l-145.36 103.833-494.873 340.894L148.96 242.419v688.676h-37.247c-57.543 0-104.627-47.082-104.627-104.625V111.742C7.086 54.198 54.17 7.115 111.713 7.115l532.12 394.525L1179.41 7.115l.029-.028z" fill="#e75a4d"/><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"/><stop offset="1" stop-color="#e7e4d6"/></linearGradient><path fill="url(#a)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"/><path fill="#e7e4d7" d="M148.96 242.419v688.676h989.774V245.877L643.833 586.771z"/><path fill="#b8b7ae" d="M148.96 931.095l494.873-344.324-2.24-1.586L148.96 923.527z"/><path fill="#b7b6ad" d="M1138.734 245.877l.283 685.218-495.184-344.324z"/><path d="M1284.066 142.044l.17 684.51c-2.494 76.082-35.461 103.238-145.219 104.514l-.283-685.219 145.36-103.833-.028.028z" fill="#b2392f"/><linearGradient id="b" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"/><stop offset="1" stop-color="#e7e4d6"/></linearGradient><path fill="url(#b)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"/><linearGradient id="c" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"/><stop offset="1" stop-color="#e7e4d6"/></linearGradient><path fill="url(#c)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"/><linearGradient id="d" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"/><stop offset="1" stop-color="#e7e4d6"/></linearGradient><path fill="url(#d)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"/><linearGradient id="e" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"/><stop offset="1" stop-color="#e7e4d6"/></linearGradient><path fill="url(#e)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"/><linearGradient id="f" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"/><stop offset="1" stop-color="#e7e4d6"/></linearGradient><path fill="url(#f)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"/><linearGradient id="g" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"/><stop offset="1" stop-color="#e7e4d6"/></linearGradient><path fill="url(#g)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"/><linearGradient id="h" gradientUnits="userSpaceOnUse" x1="1959.712" y1="737.107" x2="26066.213" y2="737.107" gradientTransform="matrix(.0283 0 0 -.0283 248.36 225.244)"><stop offset="0" stop-color="#f8f6ef"/><stop offset="1" stop-color="#e7e4d6"/></linearGradient><path fill="url(#h)" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"/><path fill="#f7f5ed" d="M111.713 7.087l532.12 394.525L1179.439 7.087z"/></svg>
                            </a>
                          <a href="https://api.whatsapp.com/send?phone=<?=$fetchDoctores['telefonoDoctor'];?>" target="_blank" class="inline-flex items-center px-2 py-2 text-sm font-medium text-center bg-gray-10  text-gray-900 rounded-full   hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200     ">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24" fill-rule="evenodd" clip-rule="evenodd"><path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"/><path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z"/><path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z"/><path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"/><path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd"/></svg>
                          </a>
                      </div>
                  </div>
              </div>

          <?php
         }
         ?>
    </div>
         <?php
        }else{
          echo '<div style="max-width:24rem" class="p-4 mx-auto mt-4  mb-10 text-sm text-gray-800 rounded-lg bg-gray-50  " role="alert">
        Aun no tienes registrado a ningún doctor
      </div>';
        }

      ?>      
      <!--DOCTORES-->
    



        <!-- Task Summaries -->
        <!-- <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 p-4 gap-4 text-black ">
          <div class="md:col-span-2 xl:col-span-3">
            <h3 class="text-lg font-semibold">Task summaries of recent sprints</h3>
          </div>
          <div class="md:col-span-2 xl:col-span-1">
            <div class="rounded bg-gray-200  p-3">
              <div class="flex justify-between py-1 text-black ">
                <h3 class="text-sm font-semibold">Tasks in TO DO</h3>
                <svg class="h-4 fill-current text-gray-600  cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" /></svg>
              </div>
              <div class="text-sm text-black  mt-2">
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Delete all references from the wiki</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Remove analytics code</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">
                  Do a mobile first layout
                  <div class="text-gray-500  mt-2 ml-2 flex justify-between items-start">
                    <span class="text-xs flex items-center">
                      <svg class="h-4 fill-current mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M11 4c-3.855 0-7 3.145-7 7v28c0 3.855 3.145 7 7 7h28c3.855 0 7-3.145 7-7V11c0-3.855-3.145-7-7-7zm0 2h28c2.773 0 5 2.227 5 5v28c0 2.773-2.227 5-5 5H11c-2.773 0-5-2.227-5-5V11c0-2.773 2.227-5 5-5zm25.234 9.832l-13.32 15.723-8.133-7.586-1.363 1.465 9.664 9.015 14.684-17.324z" /></svg>
                      3/5
                    </span>
                    <img src="https://i.imgur.com/OZaT7jl.png" class="rounded-full" />
                  </div>
                </div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Check the meta tags</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">
                  Think more tasks for this example
                  <div class="text-gray-500  mt-2 ml-2 flex justify-between items-start">
                    <span class="text-xs flex items-center">
                      <svg class="h-4 fill-current mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M11 4c-3.855 0-7 3.145-7 7v28c0 3.855 3.145 7 7 7h28c3.855 0 7-3.145 7-7V11c0-3.855-3.145-7-7-7zm0 2h28c2.773 0 5 2.227 5 5v28c0 2.773-2.227 5-5 5H11c-2.773 0-5-2.227-5-5V11c0-2.773 2.227-5 5-5zm25.234 9.832l-13.32 15.723-8.133-7.586-1.363 1.465 9.664 9.015 14.684-17.324z" /></svg>
                      0/3
                    </span>
                  </div>
                </div>
                <p class="mt-3 text-gray-600 ">Add a card...</p>
              </div>
            </div>
          </div>
          <div>
            <div class="rounded bg-gray-200  p-3">
              <div class="flex justify-between py-1 text-black ">
                <h3 class="text-sm font-semibold">Tasks in DEVELOPMENT</h3>
                <svg class="h-4 fill-current text-gray-600  cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" /></svg>
              </div>
              <div class="text-sm text-black  mt-2">
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Delete all references from the wiki</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Remove analytics code</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">
                  Do a mobile first layout
                  <div class="flex justify-between items-start mt-2 ml-2 text-white text-xs">
                    <span class="bg-pink-600 rounded p-1 text-xs flex items-center">
                      <svg class="h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2c-.8 0-1.5.7-1.5 1.5v.688C7.344 4.87 5 7.62 5 11v4.5l-2 2.313V19h18v-1.188L19 15.5V11c0-3.379-2.344-6.129-5.5-6.813V3.5c0-.8-.7-1.5-1.5-1.5zm-2 18c0 1.102.898 2 2 2 1.102 0 2-.898 2-2z" /></svg>
                      2
                    </span>
                  </div>
                </div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Check the meta tags</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">
                  Think more tasks for this example
                  <div class="text-gray-500 mt-2 ml-2 flex justify-between items-start">
                    <span class="text-xs flex items-center">
                      <svg class="h-4 fill-current mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M11 4c-3.855 0-7 3.145-7 7v28c0 3.855 3.145 7 7 7h28c3.855 0 7-3.145 7-7V11c0-3.855-3.145-7-7-7zm0 2h28c2.773 0 5 2.227 5 5v28c0 2.773-2.227 5-5 5H11c-2.773 0-5-2.227-5-5V11c0-2.773 2.227-5 5-5zm25.234 9.832l-13.32 15.723-8.133-7.586-1.363 1.465 9.664 9.015 14.684-17.324z" /></svg>
                      0/3
                    </span>
                  </div>
                </div>
                <p class="mt-3 text-gray-600 ">Add a card...</p>
              </div>
            </div>
          </div>
          <div>
            <div class="rounded bg-gray-200  p-3">
              <div class="flex justify-between py-1 text-black ">
                <h3 class="text-sm font-semibold">Tasks in QA</h3>
                <svg class="h-4 fill-current text-gray-600  cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" /></svg>
              </div>
              <div class="text-sm text-black  mt-2">
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Delete all references from the wiki</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Remove analytics code</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Do a mobile first layout</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">Check the meta tags</div>
                <div class="bg-white  hover:bg-gray-50  p-2 rounded mt-1 border-b border-gray-100  cursor-pointer">
                  Think more tasks for this example
                  <div class="text-gray-500  mt-2 ml-2 flex justify-between items-start">
                    <span class="text-xs flex items-center">
                      <svg class="h-4 fill-current mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M11 4c-3.855 0-7 3.145-7 7v28c0 3.855 3.145 7 7 7h28c3.855 0 7-3.145 7-7V11c0-3.855-3.145-7-7-7zm0 2h28c2.773 0 5 2.227 5 5v28c0 2.773-2.227 5-5 5H11c-2.773 0-5-2.227-5-5V11c0-2.773 2.227-5 5-5zm25.234 9.832l-13.32 15.723-8.133-7.586-1.363 1.465 9.664 9.015 14.684-17.324z" /></svg>
                      0/3
                    </span>
                  </div>
                </div>
                <p class="mt-3 text-gray-600 ">Add a card...</p>
              </div>
            </div>
          </div>
        </div> -->
        <!-- ./Task Summaries -->
    
        <!-- Client Table -->
        <!-- <div class="mt-4 mx-4">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50  ">
                    <th class="px-4 py-3">Client</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y  ">
                  <tr class="bg-gray-50  hover:bg-gray-100  text-gray-700 ">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold">Hans Burger</p>
                          <p class="text-xs text-gray-600 ">10x Developer</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">$855.85</td>
                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full  "> Approved </span>
                    </td>
                    <td class="px-4 py-3 text-sm">15-01-2021</td>
                  </tr>
                  <tr class="bg-gray-50  hover:bg-gray-100  text-gray-700 ">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;facepad=3&amp;fit=facearea&amp;s=707b9c33066bf8808c934c8ab394dff6" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold">Jolina Angelie</p>
                          <p class="text-xs text-gray-600 ">Unemployed</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">$369.75</td>
                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full"> Pending </span>
                    </td>
                    <td class="px-4 py-3 text-sm">23-03-2021</td>
                  </tr>
                  <tr class="bg-gray-50  hover:bg-gray-100  text-gray-700 ">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1502720705749-871143f0e671?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=b8377ca9f985d80264279f277f3a67f5" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold">Dave Li</p>
                          <p class="text-xs text-gray-600 ">Influencer</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">$775.45</td>
                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full  "> Expired </span>
                    </td>
                    <td class="px-4 py-3 text-sm">09-02-2021</td>
                  </tr>
                  <tr class="bg-gray-50  hover:bg-gray-100  text-gray-700 ">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1551006917-3b4c078c47c9?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold">Rulia Joberts</p>
                          <p class="text-xs text-gray-600 ">Actress</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">$1276.75</td>
                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full  "> Approved </span>
                    </td>
                    <td class="px-4 py-3 text-sm">17-04-2021</td>
                  </tr>
                  <tr class="bg-gray-50  hover:bg-gray-100  text-gray-700 ">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/photo-1566411520896-01e7ca4726af?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold">Hitney Wouston</p>
                          <p class="text-xs text-gray-600 ">Singer</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">$863.45</td>
                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full  "> Denied </span>
                    </td>
                    <td class="px-4 py-3 text-sm">11-01-2021</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t  bg-gray-50 sm:grid-cols-9  ">
              <span class="flex items-center col-span-3"> Showing 21-30 of 100 </span>
              <span class="col-span-2"></span>

              <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                  <ul class="inline-flex items-center">
                    <li>
                      <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                        <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                          <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                      </button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">1</button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">2</button>
                    </li>
                    <li>
                      <button class="px-3 py-1 text-white  transition-colors duration-150 bg-blue-600  border border-r-0 border-blue-600  rounded-md focus:outline-none focus:shadow-outline-purple">3</button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">4</button>
                    </li>
                    <li>
                      <span class="px-3 py-1">...</span>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">8</button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">9</button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                          <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                      </button>
                    </li>
                  </ul>
                </nav>
              </span>
            </div>
          </div>
        </div> -->
        <!-- ./Client Table -->

        
    
        <!-- Contact Form -->
        <div class="mt-8 mx-4">
          <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="p-6 mr-2 bg-gray-100  sm:rounded-lg">
              <h1 class="text-4xl sm:text-5xl text-gray-800  font-extrabold tracking-tight">Contáctanos</h1>
              <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600  mt-2">Completa el formulario para enviar tu mensaje</p>
    
              <!-- <div class="flex items-center mt-8 text-gray-600 ">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <div class="ml-4 text-md tracking-wide font-semibold w-40">Dhaka, Street, State, Postal Code</div>
              </div>
    
              <div class="flex items-center mt-4 text-gray-600 ">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <div class="ml-4 text-md tracking-wide font-semibold w-40">+880 1234567890</div>
              </div> -->
    
              <div class="flex items-center mt-4 text-gray-600 ">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <div class="ml-4 text-md tracking-wide font-semibold w-40">alphaclinicas.business@gmail.com</div>
              </div>
            </div>
            <form class="p-6 flex flex-col justify-center">
            <div class="flex items-center gap-4">
                <label for="destinatario" class="text-gray-700 font-semibold ">Para:</label>
                <input type="email" name="destinatario" id="destinatario" disabled value="alphaclinicas.business@gmail.com" class="w-full mt-2 py-3 px-3 rounded-lg bg-white  border border-gray-400  text-gray-800  font-semibold focus:border-blue-500 focus:outline-none" />
              </div>
              <div class="flex flex-col">
                <label for="name" class="hidden">Nombres</label>
                <input type="name" name="name" id="name" placeholder="Nombres" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white  border border-gray-400  text-gray-800  font-semibold focus:border-blue-500 focus:outline-none" />
              </div>
    
              <div class="flex flex-col mt-2">
                <label for="email" class="hidden">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white  border border-gray-400  text-gray-800  font-semibold focus:border-blue-500 focus:outline-none" />
              </div>
    
              <div class="flex flex-col mt-2">
                <label for="mensaje" class="hidden">Mensaje</label>
                <textarea  name="mensaje" id="tel" placeholder="Mensaje" rows="3" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white  border border-gray-400  text-gray-800  font-semibold focus:border-blue-500 focus:outline-none" ></textarea>
              </div>
    
              <button type="submit" class="md:w-32 bg-blue-600  text-white  font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500  transition ease-in-out duration-300">Enviar</button>
            </form>
          </div>
        </div>
        <!-- ./Contact Form -->
    
        <!-- External resources -->
        <!-- <div class="mt-8 mx-4">
          <div class="p-4 bg-blue-50   border border-blue-500  rounded-lg shadow-md">
            <h4 class="text-lg font-semibold">Have taken ideas & reused components from the following resources:</h4>
            <ul>
              <li class="mt-3">
                <a class="flex items-center text-blue-700 " href="https://tailwindcomponents.com/component/sidebar-navigation-1" target="_blank">
                  <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="inline-flex pl-2">Sidebar Navigation</span>
                </a>
              </li>
              <li class="mt-2">
                <a class="flex items-center text-blue-700 " href="https://tailwindcomponents.com/component/contact-form-1" target="_blank">
                  <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="inline-flex pl-2">Contact Form</span>
                </a>
              </li>
              <li class="mt-2">
                <a class="flex items-center text-blue-700 " href="https://tailwindcomponents.com/component/trello-panel-clone" target="_blank">
                  <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="inline-flex pl-2">Section: Task Summaries</span>
                </a>
              </li>
              <li class="mt-2">
                <a class="flex items-center text-blue-700 " href="https://windmill-dashboard.vercel.app/" target="_blank">
                  <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="inline-flex pl-2">Section: Client Table</span>
                </a>
              </li>
              <li class="mt-2">
                <a class="flex items-center text-blue-700 " href="https://demos.creative-tim.com/notus-js/pages/admin/dashboard.html" target="_blank">
                  <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="inline-flex pl-2">Section: Social Traffic</span>
                </a>
              </li>
              <li class="mt-2">
                <a class="flex items-center text-blue-700 " href="https://mosaic.cruip.com" target="_blank">
                  <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="inline-flex pl-2">Section: Recent Activities</span>
                </a>
              </li>
            </ul>
          </div>
        </div> -->
        <!-- ./External resources -->

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