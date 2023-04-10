<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['usuarios_pacientes'])){
   $userPaciente_id = $_SESSION['usuarios_pacientes'];
}else{
   $userPaciente_id = '';
};


if(isset($_POST['submitRegistrarPaciente'])){
    //DATOS REPRESENTANTE
   $dni = $_POST['dni'];
   $dni = filter_var($dni, FILTER_SANITIZE_STRING);
   $token = $_POST['token'];
   $token = filter_var($token, FILTER_SANITIZE_STRING);


   $passwordUser = sha1($_POST['pass']);
   $passwordUser = filter_var($passwordUser, FILTER_SANITIZE_STRING);
   $confirmPasswordUser = sha1($_POST['cpass']);
   $confirmPasswordUser = filter_var($confirmPasswordUser, FILTER_SANITIZE_STRING);



      
  $preventExistingUser = $conn->prepare("SELECT * FROM `usuariosPacientes` WHERE dni = ?   ");
  $preventExistingUser ->execute([$dni]);
  $validateExistingUserDNI=$conn->prepare("SELECT * FROM `pacientes` WHERE dni = ?  ");
  $validateExistingUserDNI ->execute([$dni]);
  $validateExistingUserToken=$conn->prepare("SELECT * FROM `pacientes` WHERE  token = ? ");
  $validateExistingUserToken ->execute([ $token]);


  if($preventExistingUser->rowCount()== 0 ){
    if($validateExistingUserDNI->rowCount()>0){
        if($validateExistingUserToken->rowCount()>0){
            
       



        if($passwordUser!=$confirmPasswordUser){
            echo '
            <div id="toast-danger" style=" display:flex;justify-content:center;"class="mx-auto flex items-center  p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow  " role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg  ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Confirmación de contraseña fallida, vuelve a revisar</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
            ';

        }else{

            $select_paciente = $conn->prepare("SELECT * FROM `pacientes` WHERE dni = ? AND token = ?");
            $select_paciente->execute([$dni,$token]);
            $fetch_id=$select_paciente->fetch(PDO::FETCH_ASSOC);
            $idPaciente=$fetch_id['id'];
            $idClinica=$fetch_id['clinica_id'];

            $insert_userPaciente = $conn->prepare("INSERT INTO `usuariospacientes`(idPaciente,idClinica,token,dni,contraseña) VALUES(?,?,?,?,?)");
            $insert_userPaciente->execute([$idPaciente,$idClinica,$token,$dni,$confirmPasswordUser]);
            $select_userPaciente = $conn->prepare("SELECT * FROM `usuariospacientes` WHERE token = ? AND dni = ?");
            $select_userPaciente->execute([$token, $dni]);
            $row = $select_userPaciente->fetch(PDO::FETCH_ASSOC);
            if($select_userPaciente->rowCount() > 0){
                $_SESSION['usuarios_pacientes'] = $row['idPaciente'];
                header('location:success-registrar.php');
            }
         
        }
    }else{
        echo '
        <div id="toast-danger" style=" display:flex;justify-content:center;"class="mx-auto mx-auto flex items-center  p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow  " role="alert">
        <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg  ">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">El dni existe pero el token es incorrecto</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
        ';

    }





    }else{
        echo '
        <div id="toast-danger" style=" display:flex;justify-content:center;"class="mx-auto flex items-center  p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow  " role="alert">
        <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg  ">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Este dni no existe en la base de datos</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
        ';

    }

  }else{
    echo '
    <div id="toast-danger" style=" display:flex;justify-content:center;"class="mx-auto flex items-center  p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow  " role="alert">
    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-red-500 bg-red-100 rounded-lg  ">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">Este usuario con este dni ya existe</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8    " data-dismiss-target="#toast-danger" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
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
    <title>Registrarse Alpha Clinicas</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <link rel="icon" type="image/x-icon" href="../images/imgLogo/favicon.png">

</head>
<body class="bg-gray-100">
<h1 class="font-bold text-3xl text-center py-4">Plataforma para pacientes</h1>
<section style="max-width:500px" class="mx-auto pt-8">

<form class="space-y-6 bg-gray-10 p-8 rounded-lg shadow-lg bg-white py-8 " style="margin:0 2rem 2rem 2rem" action="" method="post">
<h3 class="mb-4 text-2x1 font-bold text-gray-900 ">Registrarse a la plataforma</h3>

                    <div>
                        <label for="dni" class="block mb-2 text-sm font-medium text-gray-900 ">DNI</label>
                        <input type="text" name="dni" id="dni" maxlength="8" minlength="8" type="text" placeholder="711022131" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
                    </div>
                    <div>
                        <label  for="pass" class="block mb-2 text-sm font-medium text-gray-900 ">Tu contraseña</label>
                        <input oninput="this.value = this.value.replace(/\s/g, '')" type="password" name="pass" id="pass" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
                    </div>
                    <div>
                        <label  for="cpass" class="block mb-2 text-sm font-medium text-gray-900 ">Confirmar tu contraseña</label>
                        <input oninput="this.value = this.value.replace(/\s/g, '')" type="password" name="cpass" id="cpass" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
                    </div>
                    <div>
                        <label  for="token" class="block mb-2 flex gap-2 items-center text-sm font-medium text-gray-900 ">
                            <span>Tu token<span>
                            <button data-popover-target="popover-tokenInfo" data-popover-placement="top"  type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                         </label>

                         <div data-popover id="popover-tokenInfo" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72   ">
                                <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 ">¿Que es esto?</h3>
                                <p>Por medidas de seguridad y privacidad de información, tu clínica, consultorio, o doctor obtendra  un token digital para ti al momento de afiliarte, para despues dártelo y asi te registres a la plataforma.</p>
                                <h3 class="font-semibold text-gray-900 ">¿Que sigue?</h3>
                                <p> El token es exclusivamente para que te registres a la plataforma, despues solo necesitas ingresar tu dni y contraseña para ingresar</p>
                                </div>
                         <div data-popper-arrow></div>
                </div>




                        <input type="text" name="token" id="token" placeholder="••••••••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " required>
                    </div>
                    <div class="flex justify-between">
                        
                        <a href="#" class="text-sm text-blue-700 hover:underline ">¿Olvidaste tu contraseña?</a>
                    </div>
                    
                    <button type="submit" value="login now" name="submitRegistrarPaciente" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Registrarse</button>
                    <div class="text-sm font-medium text-gray-500 ">
                        ¿Ya tienes una cuenta activa? <a href="index.php" class="text-blue-700 hover:underline ">Entrar ahora  </a>
                    </div>
                </form>





</section>

<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>


    
</body>
</html>