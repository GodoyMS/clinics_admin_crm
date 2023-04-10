<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['usuarios_pacientes'])){
   $userPaciente_id = $_SESSION['usuarios_pacientes'];
}else{
   $userPaciente_id = '';
};

if(isset($_POST['submitLoginPacientes'])){

   $dni = $_POST['dni'];
   $dni = filter_var($dni, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `usuariospacientes` WHERE dni = ? AND contraseña = ?");
   $select_user->execute([$dni, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['usuarios_pacientes'] = $row['idPaciente'];
      header('location:dashboard.php');
   }else{
      echo '
      <div class="w-full flex justify-center">
         <div id="toast-danger" style=" z-index:100"class="mx-auto absolute flex items-center  justify-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow  " role="alert">
         <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg  ">
             <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
             <span class="sr-only">Error icon</span>
         </div>
         <div class="ml-3 text-sm font-normal">Contraseña o DNI incorrecto</div>
         <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-danger" aria-label="Close">
             <span class="sr-only">Close</span>
             <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
         </button>
         </div>
    </div>
         ';
   }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion - Usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="icon" type="image/x-icon" href="../images/imgLogo/favicon.png">

</head>
<body class="bg-gray-50">
<!-- <h1 class="font-bold text-3xl text-center py-4">Plataforma para pacientes</h1>
<section style="max-width:500px" class=" bg-white rounded-lg mx-auto pb-1 pt-8 shadow-lg ">

<form class="space-y-6 " style="margin:0 2rem 2rem 2rem" action="" method="post">
<h3 class="mb-4 text-2x1 font-bold text-gray-900 ">Iniciar sesión a nuestra plataforma</h3>

                    <div>
                        <label for="dni" class="block mb-2 text-sm font-medium text-gray-900 ">DNI</label>
                        <input maxlength="8" minlength="8" type="" oninput="validationDNI();" id="dni" name="dni"  placeholder="711022131" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
                    </div>
                    <div>
                        <label  for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Tu contraseña</label>
                        <input oninput="this.value = this.value.replace(/\s/g, '')" type="password" name="pass" id="pass" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
                    </div>
                    
                    <div class="flex justify-between">
                        
                        <a href="#" class="text-sm text-blue-700 hover:underline ">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button type="submit" value="login now" name="submitLoginPacientes" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Entrar a tu cuenta</button>
                    <div class="text-sm font-medium text-gray-500 ">
                        ¿Aun no estas registrado? <a href="registrar.php" class="text-blue-700 hover:underline ">Afiliate y registrate a tu clinica o consultorio</a>
                    </div>
                </form>




</section> -->


<style>
/*remove custom style*/
  .circles{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
  .circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;  
}
.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}
 
 
.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}
 
.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}
 
.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}
 
.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}
 
.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}
 
.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}
 
.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}
 
.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}
 
.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}
  @keyframes animate {
 
    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }
 
    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }
 
}
</style>
<div class="relative min-h-screen flex ">
    <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
      <div class="sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
        style="background-image: url(images/schedule-img.png);">
        <div class="absolute bg-gradient-to-b from-indigo-600 to-blue-500 opacity-75 inset-0 z-0"></div>
        <div class="w-full  max-w-md z-10">
          <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6">Alpha Clinicas</div>
          <div class="sm:text-xl text-gray-200 font-normal"> Pacientes</div>
        </div>
        <!---remove custom style-->
       <ul class="circles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
   </ul>
      </div>
      <div class="md:flex md:items-center md:justify-center pt-14 sm:w-auto md:h-full w-4/5 xl:w-2/5 p-4  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white">
        <div class="max-w-md w-full space-y-8">
            <a  href="../index.php" class="flex justify-end text-gray-400 gap-2">       
                <svg fill="none"  class="h-6 w-6"stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"></path>
                </svg>
                <span class=" font-normal">Ir a inicio</span>
            </a>
          <div class="text-center">
            <a href="../index.php"><img  src="../images/imgLogo/logo-solid-bg.png" class="w-40 h-40 mx-auto"></a>
            <div class="flex items-center justify-center space-x-2 "> <!---->
            <span class="h-px w-16 bg-gray-200"></span>
            <span class="text-gray-400 font-normal">Alpha Clinicas | Pacientes</span>
            <span class="h-px w-16 bg-gray-200"></span>
          </div>
            <h2 class="mt-6 text-3xl font-bold text-gray-900">
              ¡Bienvenido!
            </h2>
            <p class="mt-2 text-sm text-gray-500">Por favor ingresa tus datos para ingresar a tu cuenta</p>
                  <p class="text-start text-sm text-gray-500">Demo</p>
            <p class="text-start text-xs text-gray-500">Dni: 22222222</p>
            <p class=" text-start text-xs text-gray-500">Contraseña: liamg31072001</p>
          </div>
          <!-- <div class="flex flex-row justify-center items-center space-x-3">
            <a href="https://www.behance.net/ajeeshmon" target="_blank"
              class="w-11 h-11 items-center justify-center inline-flex rounded-2xl font-bold text-lg   bg-blue-900 hover:shadow-lg cursor-pointer transition ease-in duration-300"><img
                class="w-4 h-4"
                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiBjbGFzcz0iIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNS45OTcgMy45ODVoMi4xOTF2LTMuODE2Yy0uMzc4LS4wNTItMS42NzgtLjE2OS0zLjE5Mi0uMTY5LTMuMTU5IDAtNS4zMjMgMS45ODctNS4zMjMgNS42Mzl2My4zNjFoLTMuNDg2djQuMjY2aDMuNDg2djEwLjczNGg0LjI3NHYtMTAuNzMzaDMuMzQ1bC41MzEtNC4yNjZoLTMuODc3di0yLjkzOWMuMDAxLTEuMjMzLjMzMy0yLjA3NyAyLjA1MS0yLjA3N3oiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+"></span>
            <a href="https://twitter.com/ajeemon?lang=en" target="_blank"
              class="w-11 h-11 items-center justify-center inline-flex rounded-2xl font-bold text-lg  text-white bg-blue-400 hover:shadow-lg cursor-pointer transition ease-in duration-300"><img
                class="w-4 h-4"
                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDY4MS4zMzQ2NCA2ODEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTIwMC45NjQ4NDQgNTE1LjI5Mjk2OWMyNDEuMDUwNzgxIDAgMzcyLjg3MTA5NC0xOTkuNzAzMTI1IDM3Mi44NzEwOTQtMzcyLjg3MTA5NCAwLTUuNjcxODc1LS4xMTcxODgtMTEuMzIwMzEzLS4zNzEwOTQtMTYuOTM3NSAyNS41ODU5MzctMTguNSA0Ny44MjQyMTgtNDEuNTg1OTM3IDY1LjM3MTA5NC02Ny44NjMyODEtMjMuNDgwNDY5IDEwLjQ0MTQwNi00OC43NTM5MDcgMTcuNDYwOTM3LTc1LjI1NzgxMyAyMC42MzY3MTggMjcuMDU0Njg3LTE2LjIzMDQ2OCA0Ny44MjgxMjUtNDEuODk0NTMxIDU3LjYyNS03Mi40ODgyODEtMjUuMzIwMzEzIDE1LjAxMTcxOS01My4zNjMyODEgMjUuOTE3OTY5LTgzLjIxNDg0NCAzMS44MDg1OTQtMjMuOTE0MDYyLTI1LjQ3MjY1Ni01Ny45NjQ4NDMtNDEuNDAyMzQ0LTk1LjY2NDA2Mi00MS40MDIzNDQtNzIuMzY3MTg4IDAtMTMxLjA1ODU5NCA1OC42ODc1LTEzMS4wNTg1OTQgMTMxLjAzMTI1IDAgMTAuMjg5MDYzIDEuMTUyMzQ0IDIwLjI4OTA2MyAzLjM5ODQzNyAyOS44ODI4MTMtMTA4LjkxNzk2OC01LjQ4MDQ2OS0yMDUuNTAzOTA2LTU3LjYyNS0yNzAuMTMyODEyLTEzNi45MjE4NzUtMTEuMjUgMTkuMzYzMjgxLTE3Ljc0MjE4OCA0MS44NjMyODEtMTcuNzQyMTg4IDY1Ljg3MTA5MyAwIDQ1LjQ2MDkzOCAyMy4xMzY3MTkgODUuNjA1NDY5IDU4LjMxNjQwNyAxMDkuMDgyMDMyLTIxLjUtLjY2MDE1Ni00MS42OTUzMTMtNi41NjI1LTU5LjM1MTU2My0xNi4zODY3MTktLjAxOTUzMS41NTA3ODEtLjAxOTUzMSAxLjA4NTkzNy0uMDE5NTMxIDEuNjcxODc1IDAgNjMuNDY4NzUgNDUuMTcxODc1IDExNi40NjA5MzggMTA1LjE0NDUzMSAxMjguNDY4NzUtMTEuMDE1NjI1IDIuOTk2MDk0LTIyLjYwNTQ2OCA0LjYwOTM3NS0zNC41NTg1OTQgNC42MDkzNzUtOC40Mjk2ODcgMC0xNi42NDg0MzctLjgyODEyNS0yNC42MzI4MTItMi4zNjMyODEgMTYuNjgzNTk0IDUyLjA3MDMxMiA2NS4wNjY0MDYgODkuOTYwOTM3IDEyMi40MjU3ODEgOTEuMDIzNDM3LTQ0Ljg1NTQ2OSAzNS4xNTYyNS0xMDEuMzU5Mzc1IDU2LjA5NzY1Ny0xNjIuNzY5NTMxIDU2LjA5NzY1Ny0xMC41NjI1IDAtMjEuMDAzOTA2LS42MDU0NjktMzEuMjYxNzE4OC0xLjgxNjQwNyA1Ny45OTk5OTk4IDM3LjE3NTc4MSAxMjYuODcxMDkzOCA1OC44NzEwOTQgMjAwLjg4NjcxODggNTguODcxMDk0IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg=="></span>
            <a href="https://in.linkedin.com/in/ajeeshmon" target="_blank"
              class="w-11 h-11 items-center justify-center inline-flex rounded-2xl font-bold text-lg  text-white bg-blue-500 hover:shadow-lg cursor-pointer transition ease-in duration-300"><img
                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yMy45OTQgMjR2LS4wMDFoLjAwNnYtOC44MDJjMC00LjMwNi0uOTI3LTcuNjIzLTUuOTYxLTcuNjIzLTIuNDIgMC00LjA0NCAxLjMyOC00LjcwNyAyLjU4N2gtLjA3di0yLjE4NWgtNC43NzN2MTYuMDIzaDQuOTd2LTcuOTM0YzAtMi4wODkuMzk2LTQuMTA5IDIuOTgzLTQuMTA5IDIuNTQ5IDAgMi41ODcgMi4zODQgMi41ODcgNC4yNDN2Ny44MDF6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtLjM5NiA3Ljk3N2g0Ljk3NnYxNi4wMjNoLTQuOTc2eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTIuODgyIDBjLTEuNTkxIDAtMi44ODIgMS4yOTEtMi44ODIgMi44ODJzMS4yOTEgMi45MDkgMi44ODIgMi45MDkgMi44ODItMS4zMTggMi44ODItMi45MDljLS4wMDEtMS41OTEtMS4yOTItMi44ODItMi44ODItMi44ODJ6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg=="
                class="w-4 h-4"></a>
          </div> -->
          <div class="flex items-center justify-center "> <!--space-x-2-->
            <span class="h-px w-16 bg-gray-200"></span>
            <span class="text-gray-300 font-normal"></span>
            <span class="h-px w-16 bg-gray-200"></span>
          </div>
          <form class="mt-8 space-y-6" action="" method="POST">
            <div class="relative">
              <div class="absolute right-3 mt-4">
                
              </div>
              <label for="dni"class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Dni</label>
              <input
                class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500"
                type="text"   maxlength="8" minlength="8" type="" oninput="validationDNI();" id="dni" name="dni"  placeholder="711022131"  value="<?php if(isset($_COOKIE["dni"])) { echo $_COOKIE["dni"]; } ?>">
            </div>
            <div class="mt-8 content-center">
              <label for="pass" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                Contraseña
              </label>
              <input
                class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500"
                oninput="this.value = this.value.replace(/\s/g, '')" id="pass" type="password" name="pass" placeholder="*********" value="<?php if(isset($_COOKIE["pass"])) { echo $_COOKIE["pass"]; } ?>" class="input-field" >
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-center " >
                <input id="remember" checked name="remember" style="cursor:pointer" type="checkbox"
                  class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-900">
                  Recordarme
                </label>
              </div>
              <div class="text-sm">
                <a href="#" class="text-indigo-400 hover:text-blue-500">
                  <!-- Forgot your password? -->
                </a>
              </div>
            </div>
            <div>
              <button value="login now" name="submitLoginPacientes" type="submit"
                class="w-full flex justify-center bg-gradient-to-r from-indigo-500 to-blue-600  hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                Entrar
              </button>
            </div>
            <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
              <span>¿Aún no tienes una cuenta?</span>
              <a href="registrar.php"
                class="text-indigo-400 hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">Afiliate y registrate a tu clinica o consultorio</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script>
// PREVENT RESEND FORMS
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>
<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>


</body>


    

</html>