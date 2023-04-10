<?php
include 'connect.php';
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>



<header class="header">
   

   <section class="flex">
      <a href="home.php" class="logo">FERRETERIA</a>
      

      <nav class="navbar ">     
         



         <a href="home.php"><icon>Home</icon></a>
         <a href="about.php">about</a>
         <a href="menu.php">menu</a>
         <a href="orders.php">Ordenes de compra</a>
         <a href="contact.php">Contacto</a>
      </nav>

      

      <div class="icons">
         <?php
            include 'connect.php';
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>

         <!--<a href="search.php"><i class="fas fa-search"></i></a>-->
         <div id="user-btn" class="fas fa-user"><span>Cuenta</span></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">Debes iniciar sesión primero</p>
            <a href="login.php" class="btn">Iniciar sesión</a>
            <a href="login.php" class="btn">Registrarse</a>
         <?php
          }
         ?>
      </div>

   </section>
   <section class="search-section">

  <!-- drawer init and toggle -->

<!-- drawer init and toggle -->
<div class="text-center">
   <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2   focus:outline-none " type="button" data-drawer-target="drawer-disabled-backdrop" data-drawer-show="drawer-disabled-backdrop" data-drawer-backdrop="false" aria-controls="drawer-disabled-backdrop">
   Show drawer without backdrop
   </button>
</div>

          <div class="cotizador-button" >
          <a class=" cotizador" href="cart.php"><i class="fa-solid fa-file-contract"></i> Cotizar productos   <span>(<?= $total_cart_items; ?>)</span></a>


         </div>  
         <div class="search-bar " >
            <form method="post" action="search.php" class="d-flex " role="search">
            <input class="form-control me-2 " type="search" name="search_box" placeholder="Buscar un artículo " aria-label="Search" required>
            
            <button  name="search_btn" class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            </form>
         </div> 
   

</section>
   <?php 
include 'sidebar.php';
?>
   

</header>



