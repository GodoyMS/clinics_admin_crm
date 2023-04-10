
      
<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];

   $select_clinica=$conn->prepare("SELECT * FROM `usuarios` WHERE id = ?");
   $select_clinica->execute([$user_id]);
   $fetch_clinica=$select_clinica->fetch(PDO::FETCH_ASSOC);
}else{
   $user_id = '';
   header('location:../index.php');

};

//UPDATE INFO CONSULTORIO
if(isset($_POST['submitActualizarInfoConsultorio'])){

    $nombreConsultorio = $_POST['nombreConsultorio'];
    $nombreConsultorio = filter_var($nombreConsultorio, FILTER_SANITIZE_STRING);
    $especialidad = $_POST['especialidad'];
    $especialidad = filter_var($especialidad, FILTER_SANITIZE_STRING);
    $distrito = $_POST['distrito'];
    $distrito = filter_var($distrito, FILTER_SANITIZE_STRING);
    $provincia = $_POST['provincia'];
    $provincia = filter_var($provincia, FILTER_SANITIZE_STRING);
    $departamento = $_POST['departamento'];
    $departamento = filter_var($departamento, FILTER_SANITIZE_STRING);
    $numeroConsultorio = $_POST['numeroConsultorio'];
    $numeroConsultorio = filter_var($numeroConsultorio, FILTER_SANITIZE_STRING);
    $emailConsultorio = $_POST['emailConsultorio'];
    $emailConsultorio = filter_var($emailConsultorio, FILTER_SANITIZE_STRING);
    $Direccion = $_POST['Direccion'];
    $Direccion = filter_var($Direccion, FILTER_SANITIZE_STRING);
   
    $idConsultorio=$user_id;
    

    $prevent_doble_paciente_actualizar_Nombre = $conn->prepare("SELECT * FROM `usuarios` WHERE id= ? ");
    $prevent_doble_paciente_actualizar_Nombre->execute([$idConsultorio]);
   
      $updateConsultorio1 = $conn->prepare("UPDATE `usuarios` SET nombreConsultorio = ? WHERE id = ? ");
      $updateConsultorio1->execute([$nombreConsultorio,$idConsultorio]);
      $updateConsultorio2 = $conn->prepare("UPDATE `usuarios` SET especialidad  = ? WHERE id = ? ");
      $updateConsultorio2->execute([$especialidad,$idConsultorio]);
      $updateConsultorio3 = $conn->prepare("UPDATE `usuarios` SET distrito  = ? WHERE id = ? ");
      $updateConsultorio3->execute([$distrito,$idConsultorio]);

      $updateConsultorio4 = $conn->prepare("UPDATE `usuarios` SET provincia = ? WHERE id = ? ");
      $updateConsultorio4->execute([$provincia,$idConsultorio]);
      $updateConsultorio5 = $conn->prepare("UPDATE `usuarios` SET departamento = ? WHERE id = ? ");
      $updateConsultorio5->execute([$departamento,$idConsultorio]);
      $updateConsultorio6 = $conn->prepare("UPDATE `usuarios` SET numeroConsultorio = ? WHERE id = ? ");
      $updateConsultorio6->execute([$numeroConsultorio,$idConsultorio]);
      $updateConsultorio7 = $conn->prepare("UPDATE `usuarios` SET emailConsultorio  = ? WHERE id = ? ");
      $updateConsultorio7->execute([$emailConsultorio,$idConsultorio]);
      $updateConsultorio8 = $conn->prepare("UPDATE `usuarios` SET Direccion = ? WHERE id = ? ");
      $updateConsultorio8->execute([$Direccion,$idConsultorio]);
 
    header('Location:consultorio.php');




 
    
  
 }

 

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio<?=$fetch_clinica['nombreConsultorio'];?></title>
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


  



            <div style="max-width:600px;margin:4rem auto 0 auto" class="   p-4 mx-4 rounded-lg  bg-gray-50 " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h2 class="text-center font-bold text-lg">Perfil de consultorio</h2>
                        
                    <form action=""  method="post" class="px-2 py-4">
                            <div class="py-4">

                                <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre de consultorio</label>
                                <input type="name" name="nombreConsultorio"  value="<?=$fetch_clinica['nombreConsultorio'];?>" id="nombrePaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Susana Mendoza" required>
                            </div>

                                    <div class="py-4">

                                        <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Especialidad</label>
                                        <input type="text" name="especialidad"  value="<?=$fetch_clinica['especialidad'];?>" id="nombrePaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Susana Mendoza" required>
                                    </div>
                                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>

                                        <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Departamento</label>
                                        <input type="city" name="departamento"  value="<?=$fetch_clinica['departamento'];?>" id="nombrePaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Susana Mendoza" required>
                                    </div>
                                    
                                    <div>
                                        <label for="telefonoPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Provincia </label>
                                        <input type="text" name="provincia"value="<?=$fetch_clinica['provincia'];?>"id="telefonoPaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="913411231" required>
                                    </div>  
                                    <div>
                                        <label for="edadPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Distrito</label>
                                        <input type="text" name="distrito" id="edadPaciente"  value="<?=$fetch_clinica['distrito'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="12"  required>
                                    </div>
                                    <div>
                                        <label for="ciudadPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Numero de consultorio</label>
                                        <input type="tel" name="numeroConsultorio" id="ciudadPaciente" value="<?=$fetch_clinica['numeroConsultorio'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Huancavelica" >
                                    </div>
                                    <div>
                                        <label for="emailPaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Email de Consultorio</label>
                                        <input type="email" name="emailConsultorio" id="emailPaciente"  value="<?=$fetch_clinica['emailConsultorio'];?>"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="godoy@gmail.com"  >
                                    </div>    
                            </div>
                            <div class="py-4">

                                <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Dirección</label>
                                <input type="address" name="Direccion"  value="<?=$fetch_clinica['Direccion'];?>" id="nombrePaciente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5      " placeholder="Susana Mendoza" required>
                            </div>
                        <button type="submit" name="submitActualizarInfoConsultorio" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   ">Actualizar</button>
                    </form>





                </div>

 
        

      </div>

      <!--TERMINA CONTENIDO-->

    </div>
</div>    

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <!--Dark Mode-->


<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script>
// PREVENT RESEND FORMS
    if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>

</body>
</html>