
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
    <a href="index.php" class="flex items-center">
        <img src="images/imgLogo/logo-solid-bg.png" class="h-12 w-12 mr-3 " alt="Flowbite Logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap font-bold ">Alpha Clinicas</span>
    </a>
    <div class="flex  right-buttons md:order-2">
      <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center   " type="button">Iniciar sesión<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
        <!-- Dropdown menu -->
        <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownHoverButton">
              <li>
                <a href="clinicas/index.php" class="block px-4 py-2 hover:bg-gray-100  ">Como clínica</a>
              </li>
              <li>
                <a href="usuarios/index.php" class="block px-4 py-2 hover:bg-gray-100  ">Como paciente</a>
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
            <a href="index.php" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto      md:">Inicio</a>
           
      </li>
      <li>
            <a href="software-odontologos.php" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto      md:">Software para Odontologos </a>
           
      </li>
      <!-- <li>
          <a href="funcionalidades.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:    md: ">Funcionalidades</a>
      </li> -->
      <li>
        <a href="precios.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:    md: ">Precios</a>
      </li>
      
      
    </ul>
  </div>
  </div>
</nav>
