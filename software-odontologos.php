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
    <title>Alpha Clinicas</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <link rel="icon" type="image/x-icon" href="images/imgLogo/logo-no-back.png">

</head>
<body>
    <?php
        include 'components/header_main.php'
    ?>
    <!--HERO SECTIONS-->
    <main>
    <section class="bg-white px-4 ">
    <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
        <img class="w-full " src="images/Software-odontologos/software-odontologos-hero.png" alt="dashboard image">
        <div class="mt-4 md:mt-0">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 ">Conecta con tus pacientes</h2>
            <p class="mb-6 font-light text-gray-500 md:text-lg ">Contamos con todas las herramientas que un odontologo necesita, como registro clínico de pacientes, agenda de citas, generador de odontogramas, gestión de costos y mucho mas. Un software tanto para ti como para tus pacientes </p>
            <a  class="inline-flex items-center text-white bg-blue-600 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                Descubre más
                <svg fill="none"class="ml-2 -mr-1 w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"></path>
                </svg>
            </a>
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


     <!--PACIENTES ODONTOLOGOS CARDS END-->
     <section >
        <p class="text-center text-gray-600  mt-8 px-8 text-lg">Este software incluye 2 servidores: para tu <strong>clínica</strong> y para tus <strong>pacientes</strong></p>
            <div class=" py-8">  
                <div class="container mx-auto  px-6 text-gray-500 md:px-12 xl:px-0">
                    <div class="mx-auto grid  md:grid-cols-2 gap-6 md:w-3/4 lg:w-full lg:grid-cols-3">

                        

                        <div class="bg-white rounded-2xl shadow-xl px-4 py-12 sm:px-12 lg:px-8">
                            <div class="mb-12 space-y-4 mb-4">
                                <h3 class="text-2xl font-semibold text-purple-900">Servidor para clínicas</h3>
                                <p class="mb-6">Este servidor es dedicado al manejo de todos los proceso de las clínicas, aquí tendras el control total de los procesos de tu clínica. Tendras acceso a las siguientes funciones:</p>
                            </div>
                            <img src="images/Software-odontologos/servidor-clinicas.png" class="w-2/3 ml-auto" alt="illustration" loading="lazy" width="900" height="600">
                            <div class="my-4 space-y-4">

                                <ul class=" my-8 text-sm font-medium text-start text-gray-500 divide-gray-200 rounded-lg ">
                                    
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Administración de pacientes
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Historial clínico
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Generador de odontogramas
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Consentimientos informados
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Agenda, cancelación y postergación de citas<
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Notificación automática de solicitud, cancelación y confirmación de citas mediante Email
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Control de costos
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Administración de doctores 
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Chat con tus pacientes
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
                                            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Modo oscuro
                                        </a>
                                    </li>

                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full text-gray-400  p-4 bg-white">
                                            <svg fill="none" stroke="currentColor" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Notificación automática de citas mediante Bot Whatsapp (Proximamente)
                                        </a>
                                    </li>
                                    <li class="w-full">
                                        <a  class="flex items center gap-2 w-full text-gray-400  p-4 bg-white ">
                                            <svg fill="none" stroke="currentColor" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>Emisión de facturas electrónicas (Proximamente)
                                        </a>
                                    </li>
                                                                   
                                </ul>
                            </div>
                        
                        </div>

                        <div class="bg-white rounded-2xl shadow-xl px-4 py-12 sm:px-12 lg:px-8">
                            <div class="mb-12 space-y-4 pb-4">
                                <h3 class="text-2xl font-semibold text-purple-900">Servidor para pacientes</h3>
                                <p class="mb-6"> En este servidor,  tus pacientes afiliados podran crearse una cuenta con su dni y podran visualizar su información. Tendran acceso a las siguientes funciones: </p>
                            </div>
                            <img src="images/Software-odontologos/pacientes/servidor-pacientes.png" class="w-2/3 ml-auto " alt="illustration" loading="lazy" width="900" height="600">
                            <div class="my-4 space-y-4">

<ul class=" my-8 text-sm font-medium text-start text-gray-500 divide-gray-200 rounded-lg ">
    
    <li class="w-full">
        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>Administración citas
        </a>
    </li>
    <li class="w-full">
        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>Registro clínico (Historia clinica y odontogramas)
        </a>
    </li>
    <li class="w-full">
        <a class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>Registro de consentimientos informados
        </a>
    </li>
    <li class="w-full">
        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>Confirmación, cancelación, postergación y solicitud de citas
        </a>
    </li>
    <li class="w-full">
        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>Agenda virtual en vivo 
        </a>
    </li>
    <li class="w-full">
        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>Notificación automática de solicitud, cancelación y confirmación de citas mediante Email
        </a>
    </li>
    <li class="w-full">
        <a  class="flex items center gap-2 w-full   p-4 bg-white hover:text-gray-700">
            <svg fill="none" stroke="green" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>Chat con tu clínica 
        </a>
    </li>
    
 

    <li class="w-full">
        <a  class="flex items center gap-2 w-full text-gray-400  p-4 bg-white ">
            <svg fill="none" stroke="currentColor" class="w-6 h-6 " stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>Notificación automática de citas mediante Bot Whatsapp (Proximamente)
        </a>
    </li>
  
                                   
</ul>
</div>
                        
                        </div>

                    </div>
                </div>
            </div>
        </section>


     <!--PACIENTES ODONTOLOGOS CARDS END-->



    



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
