
<?php
// $dni = '71102795';
// $token = 'apis-token-3501.VfDkZH0nb-Rt2zZhzKPBjAWr6jtd0Q0n';
/*
$json = file_get_contents('https://api.apis.net.pe/v1/dni?numero=71102795');
// Convert to array 
$array = json_decode($json, true);
 var_dump($array); // print arrayCopy
 echo $array["apellidoPaterno"];
*/

?>


<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['registrarUsuario'])){
    //DATOS REPRESENTANTE
   $nombres = $_POST['nombres'];
   $nombres = filter_var($nombres, FILTER_SANITIZE_STRING);
   $apellidos = $_POST['apellidos'];
   $apellidos = filter_var($apellidos, FILTER_SANITIZE_STRING);
   $telefonoRepresentante = $_POST['telefonoRepresentante'];
   $telefonoRepresentante = filter_var($telefonoRepresentante, FILTER_SANITIZE_STRING);
   $correoRepresentante = $_POST['correoRepresentante'];
   $correoRepresentante = filter_var($correoRepresentante, FILTER_SANITIZE_STRING);
   $dni = $_POST['dni'];
   $dni = filter_var($dni, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
    //DATOS CONSULTORIO
    $nombreConsultorio = $_POST['nombreConsultorio'];
    $nombreConsultorio = filter_var($nombreConsultorio, FILTER_SANITIZE_STRING);
    $especialidad = $_POST['especialidad'];
    $especialidad = filter_var($especialidad, FILTER_SANITIZE_STRING);
    $emailConsultorio = $_POST['emailConsultorio'];
    $emailConsultorio = filter_var($emailConsultorio, FILTER_SANITIZE_STRING);
    $telefonoConsultorio = $_POST['telefonoConsultorio'];
    $telefonoConsultorio = filter_var($telefonoConsultorio, FILTER_SANITIZE_STRING);

    $departamento = $_POST['departamento'];
    $departamento = filter_var($departamento, FILTER_SANITIZE_STRING);
    $provincia = $_POST['provincia'];
    $provincia = filter_var($provincia, FILTER_SANITIZE_STRING);
    $distrito = $_POST['distrito'];
    $distrito = filter_var($distrito, FILTER_SANITIZE_STRING);
    $direccion = $_POST['direccion'];
    $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);






   $select_user = $conn->prepare("SELECT * FROM `usuarios` WHERE dni = ? OR emailRepresentante = ?");
   $select_user->execute([$dni, $correoRepresentante]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
    echo '
    <div id="toast-danger" style=" display:flex;justify-content:center;"class="flex items-center  p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow  " role="alert">
    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg  ">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">El usuario ya existe</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-danger" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
    ';
   }else{
      if($pass != $cpass){
         echo '
         <div id="toast-danger" style=" display:flex;justify-content:center;"class="flex items-center  p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow  " role="alert">
         <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg  ">
             <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
             <span class="sr-only">Error icon</span>
         </div>
         <div class="ml-3 text-sm font-normal">Confirmación de contraseña fallida</div>
         <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-danger" aria-label="Close">
             <span class="sr-only">Close</span>
             <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
         </button>
     </div>
         ';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `usuarios`(nombreConsultorio,nombres, apellidos, dni, especialidad, departamento,provincia,distrito ,emailRepresentante, emailConsultorio,numeroRepresentante,numeroConsultorio,contraseña,Direccion) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
         $insert_user->execute([$nombreConsultorio, $nombres, $apellidos, $dni, $especialidad,$departamento,$provincia,$distrito,$correoRepresentante,$emailConsultorio,$telefonoRepresentante,$telefonoConsultorio,$cpass,$direccion]);
         $select_user = $conn->prepare("SELECT * FROM `usuarios` WHERE emailRepresentante = ? AND contraseña = ?");
         $select_user->execute([$correoRepresentante, $pass]);
         $row = $select_user->fetch(PDO::FETCH_ASSOC);
         if($select_user->rowCount() > 0){
            $_SESSION['user_id'] = $row['id'];
            header('location:index.php');
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Consultorio</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />

    <link rel="icon" type="image/x-icon" href="../images/imgLogo/favicon.png">



</head>
<body>

<style>
  .right-buttons{
  justify-content:space-around;
  width:100%;
}

  @media (min-width:380px) {
    .logo-and-right-buttons{
      justify-content:space-between;
}
.right-buttons{
  justify-content:space-around;
  width:auto;
}
    
  }

</style>
<nav class="  pb-8 border-gray-200   rounded  ">
  <div class=" bg-white flex flex-wrap items-center shadow-lg w-full p-4 rounded-lg justify-center logo-and-right-buttons mx-auto">
    <a href="../index.php" class="flex items-center">
        <img src="../images/imgLogo/logo-solid-bg.png" class="h-12 w-12 mr-3 " alt="Alpha Clinicas Logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap font-bold ">Alpha Clinicas</span>
    </a>
    <div class="flex  right-buttons md:order-2">
      <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center   " type="button">Iniciar sesión<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
        <!-- Dropdown menu -->
        <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownHoverButton">
              <li>
                <a href="index.php" class="block px-4 py-2 hover:bg-gray-100  ">Como clínica</a>
              </li>
              <li>
                <a href="../usuarios/index.php" class="block px-4 py-2 hover:bg-gray-100  ">Como paciente</a>
              </li>
             
             
            </ul>
        </div>       
       <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200   " aria-controls="navbar-cta" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
    </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
    <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white  md: ">
      <li>
            <a href="../index.php" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto      md:">Inicio</a>
           
      </li>
      <li>
            <a href="../software-odontologos.php" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto      md:">Software para Odontologos </a>
           
      </li>
      <!-- <li>
          <a href="funcionalidades.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:    md: ">Funcionalidades</a>
      </li> -->
      <li>
        <a href="../precios.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:    md: ">Precios</a>
      </li>
      
      
    </ul>
  </div>
  </div>
</nav>

<section style="max-width:800px" class="mx-auto">

<form action="" method="post" style="margin:0 2rem" >
<h1 class="max-w-2xl mb-4 text-2xl md:text-4xl font-bold text-blue-500 flex justify-start py-8">Datos de representante</h1>
    <div class="grid gap-6 mb-6 md:grid-cols-2 pb-4">

        

        <div>
            <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 ">Nombres</label>
            <input type="text" name="nombres"id="nombres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="John Doe" required>
        </div>
        <div>
            <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 ">Apellidos</label>
            <input type="text" name="apellidos"id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Gonzales" required>
        </div>
          
        <div>
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 ">Número de teléfono </label>
            <input type="tel" name="telefonoRepresentante"id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="999-415-678" required>
        </div>
        <div>
            <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 ">Correo electrónico</label>
            <input type="email" name="correoRepresentante"id="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="alpha-Clinicas@gmail.com" required>
        </div>
        <div>
            <label for="dni" class="block mb-2 text-sm font-medium text-gray-900 ">Dni</label>
            <input type="number" name="dni" id="dni" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="78110245" required>
        </div>

        <div>
                                <label class="text-gray-600"> Recuerda que</label>

                                   <p class="text-gray-400">Para iniciar sesión debes proporcionar tu numero de DNI y contraseña</p>
        </div>
    </div>
        <div class="mb-6">Contraseña</label>
        <label for="pass" class="block mb-2 text-sm font-medium text-gray-900">
        <input maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" type="password" name="pass" id="pass" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
        </div> 
        <div class="mb-6">
        <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 ">Confirmar Contraseña</label>
        <input maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')"type="password" name="cpass" id="confirm_password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
        </div>


    


    <h1 class="max-w-2xl mb-4 text-2xl md:text-4xl font-bold text-blue-500 flex justify-start py-8">Datos del consultorio</h1>
  
    <div class="mb-6">
        <label for="nombreConsultorio" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre del Consultorio</label>
        <input type="text" id="nombreConsultorio"  name="nombreConsultorio"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Consultorio Smile" required>
    </div> 
    
    <div class="mb-6">
        <label for="especialidad" class="block mb-2 text-sm font-medium text-gray-900 ">Especialidad</label>

                <fieldset>

                <div class="flex items-center mb-4">
                    <input id="country-option-1" type="radio" name="especialidad" value="Medicina General" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300    " checked>
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 ">
                        Medicina General
                    </label>
                </div>

                <div class="flex items-center mb-4">
                    <input id="country-option-2" type="radio" name="especialidad" value="Odontología" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300    ">
                    <label for="country-option-2" class="block ml-2 text-sm font-medium text-gray-900 ">
                    Odontología
                    </label>
                </div>

               

                <div class="flex items-center">
                    <input id="option-disabled" type="radio" name="countries" value="China" class="w-4 h-4 border-gray-200 focus:ring-2 focus:ring-blue-300   " disabled>
                    <label for="option-disabled" class="block ml-2 text-sm font-medium text-gray-300 ">
                    Nutrición (proximamente)
                    </label>
                </div>
                </fieldset>
    </div> 

    <div class="grid gap-6 mb-6 md:grid-cols-2 pb-4">

        

<div>
    <label for="emailConsultorio" class="block mb-2 text-sm font-medium text-gray-900 ">Email  </label>
    <input type="email" name="emailConsultorio" id="emailConsultorio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="John Doe" required>
</div>
<div>
    <label for="telefonoConsultorio" class="block mb-2 text-sm font-medium text-gray-900 ">Número de teléfono </label>
            <input type="tel" name="telefonoConsultorio" id="telefonoConsultorio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="999-415-678"  required>
</div>
  
<div>
    <label for="departamento" class="block mb-2 text-sm font-medium text-gray-900 ">Departamento </label>
    <input type="text" name="departamento"id="departamento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Lima" required>
</div>
<div>
    <label for="provincia" class="block mb-2 text-sm font-medium text-gray-900 ">Provincia</label>
    <input type="text" name="provincia" id="provincia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Lima" required>
</div>
<div>
    <label for="distrito" class="block mb-2 text-sm font-medium text-gray-900 ">Distrito</label>
    <input type="text" name="distrito"id="distrito" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Ancon" required>
</div>
<div>
    <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 ">Dirección</label>
    <input type="address" name="direccion"id="direccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Av. Las palmeras 567" required>
</div>


</div>
    







    <div class="flex items-start mb-6">
        <div class="flex items-center h-5">
        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300    " required>
        </div>
        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 ">Estoy de acuerdo con los <a href="#" class="text-blue-600 hover:underline ">términos y condiciones</a>.</label>
    </div>
    <button type="submit" name="registrarUsuario" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   ">Registrar</button>
</form>


</section>

<!--CONTACT FORM-->
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

              <div class="flex items-center mt-4 text-gray-600 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" class="w-8 h-8 text-gray-500"><path d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 29.079097 3.1186875 32.88588 4.984375 36.208984 L 2.0371094 46.730469 A 1.0001 1.0001 0 0 0 3.2402344 47.970703 L 14.210938 45.251953 C 17.434629 46.972929 21.092591 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 21.278025 46 17.792121 45.029635 14.761719 43.333984 A 1.0001 1.0001 0 0 0 14.033203 43.236328 L 4.4257812 45.617188 L 7.0019531 36.425781 A 1.0001 1.0001 0 0 0 6.9023438 35.646484 C 5.0606869 32.523592 4 28.890107 4 25 C 4 13.390466 13.390466 4 25 4 z M 16.642578 13 C 16.001539 13 15.086045 13.23849 14.333984 14.048828 C 13.882268 14.535548 12 16.369511 12 19.59375 C 12 22.955271 14.331391 25.855848 14.613281 26.228516 L 14.615234 26.228516 L 14.615234 26.230469 C 14.588494 26.195329 14.973031 26.752191 15.486328 27.419922 C 15.999626 28.087653 16.717405 28.96464 17.619141 29.914062 C 19.422612 31.812909 21.958282 34.007419 25.105469 35.349609 C 26.554789 35.966779 27.698179 36.339417 28.564453 36.611328 C 30.169845 37.115426 31.632073 37.038799 32.730469 36.876953 C 33.55263 36.755876 34.456878 36.361114 35.351562 35.794922 C 36.246248 35.22873 37.12309 34.524722 37.509766 33.455078 C 37.786772 32.688244 37.927591 31.979598 37.978516 31.396484 C 38.003976 31.104927 38.007211 30.847602 37.988281 30.609375 C 37.969311 30.371148 37.989581 30.188664 37.767578 29.824219 C 37.302009 29.059804 36.774753 29.039853 36.224609 28.767578 C 35.918939 28.616297 35.048661 28.191329 34.175781 27.775391 C 33.303883 27.35992 32.54892 26.991953 32.083984 26.826172 C 31.790239 26.720488 31.431556 26.568352 30.914062 26.626953 C 30.396569 26.685553 29.88546 27.058933 29.587891 27.5 C 29.305837 27.918069 28.170387 29.258349 27.824219 29.652344 C 27.819619 29.649544 27.849659 29.663383 27.712891 29.595703 C 27.284761 29.383815 26.761157 29.203652 25.986328 28.794922 C 25.2115 28.386192 24.242255 27.782635 23.181641 26.847656 L 23.181641 26.845703 C 21.603029 25.455949 20.497272 23.711106 20.148438 23.125 C 20.171937 23.09704 20.145643 23.130901 20.195312 23.082031 L 20.197266 23.080078 C 20.553781 22.728924 20.869739 22.309521 21.136719 22.001953 C 21.515257 21.565866 21.68231 21.181437 21.863281 20.822266 C 22.223954 20.10644 22.02313 19.318742 21.814453 18.904297 L 21.814453 18.902344 C 21.828863 18.931014 21.701572 18.650157 21.564453 18.326172 C 21.426943 18.001263 21.251663 17.580039 21.064453 17.130859 C 20.690033 16.232501 20.272027 15.224912 20.023438 14.634766 L 20.023438 14.632812 C 19.730591 13.937684 19.334395 13.436908 18.816406 13.195312 C 18.298417 12.953717 17.840778 13.022402 17.822266 13.021484 L 17.820312 13.021484 C 17.450668 13.004432 17.045038 13 16.642578 13 z M 16.642578 15 C 17.028118 15 17.408214 15.004701 17.726562 15.019531 C 18.054056 15.035851 18.033687 15.037192 17.970703 15.007812 C 17.906713 14.977972 17.993533 14.968282 18.179688 15.410156 C 18.423098 15.98801 18.84317 16.999249 19.21875 17.900391 C 19.40654 18.350961 19.582292 18.773816 19.722656 19.105469 C 19.863021 19.437122 19.939077 19.622295 20.027344 19.798828 L 20.027344 19.800781 L 20.029297 19.802734 C 20.115837 19.973483 20.108185 19.864164 20.078125 19.923828 C 19.867096 20.342656 19.838461 20.445493 19.625 20.691406 C 19.29998 21.065838 18.968453 21.483404 18.792969 21.65625 C 18.639439 21.80707 18.36242 22.042032 18.189453 22.501953 C 18.016221 22.962578 18.097073 23.59457 18.375 24.066406 C 18.745032 24.6946 19.964406 26.679307 21.859375 28.347656 C 23.05276 29.399678 24.164563 30.095933 25.052734 30.564453 C 25.940906 31.032973 26.664301 31.306607 26.826172 31.386719 C 27.210549 31.576953 27.630655 31.72467 28.119141 31.666016 C 28.607627 31.607366 29.02878 31.310979 29.296875 31.007812 L 29.298828 31.005859 C 29.655629 30.601347 30.715848 29.390728 31.224609 28.644531 C 31.246169 28.652131 31.239109 28.646231 31.408203 28.707031 L 31.408203 28.708984 L 31.410156 28.708984 C 31.487356 28.736474 32.454286 29.169267 33.316406 29.580078 C 34.178526 29.990889 35.053561 30.417875 35.337891 30.558594 C 35.748225 30.761674 35.942113 30.893881 35.992188 30.894531 C 35.995572 30.982516 35.998992 31.07786 35.986328 31.222656 C 35.951258 31.624292 35.8439 32.180225 35.628906 32.775391 C 35.523582 33.066746 34.975018 33.667661 34.283203 34.105469 C 33.591388 34.543277 32.749338 34.852514 32.4375 34.898438 C 31.499896 35.036591 30.386672 35.087027 29.164062 34.703125 C 28.316336 34.437036 27.259305 34.092596 25.890625 33.509766 C 23.114812 32.325956 20.755591 30.311513 19.070312 28.537109 C 18.227674 27.649908 17.552562 26.824019 17.072266 26.199219 C 16.592866 25.575584 16.383528 25.251054 16.208984 25.021484 L 16.207031 25.019531 C 15.897202 24.609805 14 21.970851 14 19.59375 C 14 17.077989 15.168497 16.091436 15.800781 15.410156 C 16.132721 15.052495 16.495617 15 16.642578 15 z"/></svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                +51 913464041
                            </div>
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
    

<!--CONTACT FORM ENDS-->
<footer class="p-4 bg-white rounded-lg shadow md:px-6 md:py-8 w-full ">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="../index.php" class="flex items-center mb-4 sm:mb-0">
            <img src="../images/imgLogo/logo-solid-bg.png" class="h-8 mr-3" alt="Alpha Clinicas Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap ">Alpha-Clinicas</span>
        </a>
        <!-- <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 ">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">Sobre</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Politica de Privacidad</a>
            </li>
            <li>
                <a href="precios.php" class="mr-4 hover:underline md:mr-6 ">Precios</a>
            </li>
            <li>
                <a href="#" class="hover:underline">Contacto</a>
            </li>
        </ul> -->
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
    <span class="block text-sm text-gray-500 sm:text-center ">© 2023 <a href="../index.php" class="hover:underline">Alpha Clinicas™</a>. Todos los Derechos Reservados
    </span>
    <span class="block text-xs text-gray-500 sm:text-center ">Desarrollado por: <a href="https://github.com/GodoyMS" target="_blank"class=" text-blue-500 hover:underline">Godoy Muñoz S.</a>

</footer>


<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>

    
</body>
</html>