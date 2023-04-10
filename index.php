<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Clinicas </title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <link rel="icon" type="image/x-icon" href="images/imgLogo/logo-no-back.png">

</head>
<body>
    <?php
        include 'components/header_main.php';
    ?>
    <!--HERO SECTIONS-->
    <main>
    <section class="bg-white ">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
         <div  class=" lg:mt-0 lg:col-span-5 lg:flex">
            <img   src="images/inicio/main-hero.png" alt="doctor">
        </div>  
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-2xl md:text-5xl font-extrabold flex justify-center tracking-tight leading-none ">Sistematiza tu consultorio y administra los procesos eficazmente </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl ">Software para gestión de información, pagos, citas, tratamientos, historial médico y mas.</p>
            <div class="flex justify-center ">
            <a href="clinicas/registrarse.php" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 ">
                Registra tu consultorio Ahora 
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="software-odontologos.php" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100    ">
                Conoce más
            </a> 
            </div>
        </div>
                      
    </div>
</section>


    </main> 

    <style>
    @media (min-width: 1024px) { 
        .features{
            display:grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));

        }
     }
    </style>
    <!--SECOND HERO-->
        <section class="my-8 py-8">
            <div class="container mx-auto ">
                <h3 class="text-gray-600 text-xl text-center font-bold py-4"> </h3>
                <img width="900" height="600" class="mx-auto" src="images/Software-odontologos/secondHero/second-hero.png">

            </div>
        </section>
    <!--SECOOND HERO FINISHES-->


    <section class="bg-white  mt-10">
  <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
      <div class="max-w-screen-md mb-8 lg:mb-16 text-center mx-auto">
          <h2 class="mb-4 text-xl sm:text-3xl tracking-tight font-extrabold text-gray-900  ">Diseñado para profesionales de la salud</h2>
          <p class="text-gray-500 sm:text-xl ">Ofrecemos las siguientes funciones</p>
      </div>
      <div class="space-y-8 md:grid md:grid-cols-2 features  gap-12 md:space-y-0">
          <div class="bg-gray-50 rounded-lg p-4">
              <div class="flex mx-auto items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 ">
                    <svg class="w-8 h-8 flex mx-auto text-blue-600" fill="none"  stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"></path>
                </svg>
              </div>
              <h3 class="mb-2 text-xl font-bold  text-center">Agenda de digital</h3>
              <p class="text-gray-500 ">Control total de agenda, cancelación y postergación de horarios de citas a traves de una agenda digital.</p>
          </div>
          <div class="bg-gray-50 rounded-lg p-4">
              <div class="flex mx-auto items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 ">
              <svg class="w-8 h-8 flex mx-auto text-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>              
            </div>
              <h3 class="mb-2 text-xl font-bold  text-center">Registros clinicos</h3>
              <p class="text-gray-500 ">Registro de historia clínica y consentimientos informados por cada paciente</p>
          </div>

          <div class="bg-gray-50 rounded-lg p-4">
              <div class="flex mx-auto items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 ">
              <svg class="w-8 h-8 flex mx-auto text-blue-600" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Layer_1" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                            <path id="Tooth_2_" d="M54.3148651,5.0702143c-3.5253983-3.6377001-8.4227982-5.4512-13.472599-4.9921999  c-0.0372009,0.001-0.0762024,0.0019-0.1133003,0.0049c-1.6397018,0.1611-3.1631012,0.8252-4.6366997,1.4687001  c-1.5165901,0.6621001-2.9492989,1.2871001-4.3290997,1.2871001c-1.3838005,0-2.8124886-0.6259-4.325201-1.289  c-1.4619999-0.6407-2.9736996-1.3028001-4.6035995-1.4668001c-4.9531002-0.501-9.7802,1.2636-13.2469997,4.8301001  c-3.4667997,3.5663996-5.0899,8.4393997-4.4550996,13.3592997c2.6244998,22.700201,4.4779992,36.6513977,5.5082994,41.4648972  c0.3237,1.5166016,1.9116001,3.8935013,3.9375,4.2256012c0.1352005,0.0223999,0.2915001,0.038002,0.4643002,0.038002  c0.8149996,0,1.9883118-0.3476028,2.9648991-1.9960022c1.4033012-2.3702011,2.6221008-5.642601,3.9131012-9.1083984  c2.6425991-7.0937996,5.6385994-15.1348,10.4218998-15.2110023c4.7490005,0.0956993,7.1541977,6.8535004,9.481411,13.3887024  c1.241188,3.4891968,2.4150009,6.785099,3.9677887,9.2782974c1.0332108,1.6611023,2.6805992,2.4815025,4.4179001,2.1826019  c1.5683975-0.2656021,2.8788986-1.4121017,3.1875-2.7881012c1.3194008-5.8711014,3.6992989-25.5126991,5.4638977-40.9589005  C59.5199661,13.7323141,57.863678,8.7323141,54.3148651,5.0702143z M56.8773651,18.537014  c-0.0009995,0.0058002-0.0018997,0.0107002-0.0018997,0.0165997c-1.7597885,15.3984013-4.1299019,34.9697037-5.4296989,40.7557983  c-0.1319008,0.5849991-0.8067017,1.125-1.5703011,1.2538986c-0.5381012,0.0938034-1.5665016,0.0479012-2.3867874-1.267498  c-1.4384117-2.3106003-2.5761108-5.5078011-3.7812119-8.8916016c-2.5546989-7.1758003-5.1953011-14.594799-11.3604012-14.7187996  c-6.1854992,0.0986023-9.4344997,8.8194008-12.3006992,16.5126991c-1.2588005,3.3799019-2.4482994,6.5713005-3.7598,8.7871017  c-0.6640997,1.1231003-1.2060995,1.0321999-1.3852997,1.0038986c-0.9515886-0.1562004-2.0815001-1.6229973-2.3046999-2.669899  c-1.0028887-4.6855011-2.8973999-18.9589996-5.4794002-41.2900009c-0.5576997-4.3233004,0.8652-8.5957003,3.9043002-11.7217007  c2.7005997-2.7793,6.3442106-4.3066998,10.1683989-4.3066998c0.4794998,0,0.9619007,0.0235,1.4453011,0.0723002  c1.3155117,0.1317999,2.6191998,0.7031,4,1.3085999c0.6203995,0.2716999,1.2488995,0.5463998,1.8883991,0.7834997  c0.0491123,0.0377002,0.0876999,0.0852003,0.1448002,0.1140003l9.9726982,5.0399995  c0.1445007,0.0732002,0.2988014,0.1073999,0.4502029,0.1073999c0.3652,0,0.7176971-0.2001991,0.8934975-0.5487995  c0.2490997-0.4932003,0.0517998-1.0946999-0.4413986-1.3438001l-5.8496017-2.9555998  c1.0969124-0.2781,2.1592026-0.7402,3.1992035-1.1938002c1.375-0.6006,2.6738968-1.1670001,3.88871-1.3016999  c0.04879,0.0028999,0.0966873,0.0009999,0.1454887-0.0039001c4.4755974-0.4395,8.827198,1.1601,11.952198,4.3838  C56.0013657,9.6854143,57.4593658,14.0868139,56.8773651,18.537014z"/>
                                            </svg>             
                </div>
              <h3 class="mb-2 text-xl font-bold  text-center">Laboratorio virtual de odontogramas</h3>
              <p class="text-gray-500 ">Deja de lado los papeles y lapiceros y prueba nuestra interfaz de generación de odontogramas digital</p>
          </div>
          <div class="bg-gray-50 rounded-lg p-4">
              <div class="flex mx-auto items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 ">
              <svg class="w-8 h-8 flex mx-auto text-blue-600"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                </svg>
            </div>
              <h3 class="mb-2 text-xl font-bold  text-center">Canal de chat con pacientes </h3>
              <p class="text-gray-500 ">Mantente conectado en todo momento con tus pacientes a través de un canal de chat con tus pacientes afiliados</p>
          </div>
          <div class="bg-gray-50 rounded-lg p-4">
              <div class="flex mx-auto items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 ">
              <svg class="w-8 h-8 flex mx-auto text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                </svg>
            </div>
              <h3 class="mb-2 text-xl font-bold  text-center">Control y registro de costos </h3>
              <p class="text-gray-500 ">Obten el control de los ingresos y egresos a traves de un reporte mensual automático</p>
          </div>
          <div class="bg-gray-50 rounded-lg p-4">
              <div class="flex mx-auto items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 ">
              <svg  class="w-8 h-8 flex mx-auto text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zm-7.518-.267A8.25 8.25 0 1120.25 10.5M8.288 14.212A5.25 5.25 0 1117.25 10.5" />
            </svg>
            </div>
              <h3 class="mb-2 text-xl font-bold  text-center">Aplicativo web para tus pacientes</h3>
              <p class="text-gray-500 ">Afilia a tu paciente y proveele con una cuenta digital para mantener un control total de los procesos y documentos</p>
          </div>
          
      </div>
  </div>
</section>
    



    <section class="bg-white ">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center  ">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold leading-tight text-gray-900  ">Empieza tu prueba gratis hoy</h2>
            <p class="mb-6 font-light text-gray-500  md:text-lg">Prueba Alpha Clinicas por 15 días. No se requiere tarjeta de crédito</p>
            <a href="clinicas/registrarse.php" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">Prueba gratis por 15 dias</a>
        </div>
    </div>
</section>
    <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
    <?php
include 'components/footer.php'

?>
</body> 
</html>
