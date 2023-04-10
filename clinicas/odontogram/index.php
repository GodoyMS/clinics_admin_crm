<?php

include '../../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:../../index.php');

};
if(isset($_GET['pid'])){
	$pid=$_GET['pid'];

}
if(isset($_GET['token'])){
	$token=$_GET['token'];

}
?>

<html>


<head>
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />

<script type="text/javascript" src="assets/js/odontogramaDrawjs.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.esm.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
	
<style>



p{margin:5px 0}
button{padding:5px 10px}
.btn-cmd{width:1060px;padding-left:20px}  
.GFG{transform: scale(-1, 1);-moz-transform: scale(-1, 1);-webkit-transform: scale(-1, 1);-o-transform: scale(-1, 1);-ms-transform: scale(-1, 1);transform: scale(-1, 1);}
</style>
</head>



<body >

<?php
	 $select_paciente = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? AND token = ?");
	 $select_paciente->execute([$pid,$token]);
	 if($select_paciente->rowCount()>0){

	
?>
	
<nav class="bg-white px-2 sm:px-4 py-2.5  fixed w-full z-20 top-0 left-0 border-b border-gray-200 ">
  <div class="container  flex flex-wrap items-center justify-center mx-auto">
  
  <div class="flex md:order-2">
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200   " aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex  flex-col gap-4 p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white  md: ">
      
      <li>
      	<button data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation" type="button" class=" flex gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0   ">
			<span>Tratamientos generales</span>


			<svg xmlns="http://www.w3.org/2000/svg" class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<defs>				
				</defs>
				<g id="dental">
				<path class="cls-1" d="M1.5,8.18A6.68,6.68,0,0,1,12,2.7"/><path class="cls-1" d="M22.5,8.18A6.69,6.69,0,0,0,9.78,5.31"/>
				<path class="cls-1" d="M22.5,8.18V9.6a17.35,17.35,0,0,1-1.32,6.63,17.27,17.27,0,0,1-3.75,5.61,2.25,2.25,0,0,1-3.82-1.25L13,16.54a1,1,0,0,0-2,0l-.62,4.05a2.25,2.25,0,0,1-3.82,1.25A17.27,17.27,0,0,1,1.5,9.6V8.18"/>
				<line class="cls-1" x1="12" y1="8.18" x2="19.64" y2="8.18"/><line class="cls-1" x1="15.82" y1="4.36" x2="15.82" y2="12"/></g>
			</svg>			
			
		</button>
      </li>
	  <li>
      	<button data-dropdown-toggle="dropDownOrtodoncia"   type="button" class="h-full flex gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0   ">
			<span>Ortodoncia</span>
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" class="text-white w-6 h-6" version="1.1" id="Layer_1" viewBox="0 0 222.261 222.261" xml:space="preserve">
				<g>
					<g>
						<g>
							<path d="M50.221,119.213L50.221,119.213l57.568-0.001h8.191h56.467h8.179h39.658l-0.043-4.084     c-0.272-24.898-9.422-40.361-23.875-40.361c-8.676,0-15.419,5.608-19.5,15.452c-5.551-17.423-17.062-27.573-32.659-27.573     c-15.273,0-26.644,9.713-32.323,26.476c-5.679-16.763-17.051-26.476-32.323-26.476c-16.052,0-27.779,10.747-33.131,29.116     c-3.996-10.815-11-16.994-20.128-16.994c-14.453,0-23.603,15.463-23.876,40.361l-0.044,4.084h40.759H50.221z M196.366,82.849     c10.397,0,14.836,13.944,15.657,28.283H180.71C181.534,96.793,185.973,82.849,196.366,82.849z M144.208,70.727     c22.937,0,27.352,27.158,28.133,40.404h-56.274C117.227,90.898,125.091,70.727,144.208,70.727z M79.561,70.727     c22.937,0,27.352,27.158,28.133,40.404H51.421C52.581,90.898,60.444,70.727,79.561,70.727z M10.646,111.132     c0.821-14.339,5.26-28.283,15.657-28.283c10.397,0,14.836,13.944,15.657,28.283H10.646z"/>
							<path d="M218.221,139.414h-59.16c-1.806-6.952-8.078-12.121-15.588-12.121c-7.51,0-13.781,5.17-15.588,12.121h-33.47     c-1.806-6.952-8.078-12.121-15.588-12.121c-7.51,0-13.781,5.17-15.588,12.121H4.04c-2.234,0-4.04,1.807-4.04,4.04     c0,2.233,1.807,4.04,4.04,4.04h59.199c1.806,6.952,8.078,12.121,15.588,12.121s13.781-5.17,15.588-12.121h33.47     c1.806,6.952,8.078,12.121,15.588,12.121s13.781-5.17,15.588-12.121h59.16c2.233,0,4.04-1.807,4.04-4.04     C222.261,141.222,220.455,139.414,218.221,139.414z M78.827,135.374c2.977,0,5.554,1.637,6.956,4.04H71.871     C73.273,137.011,75.851,135.374,78.827,135.374z M78.827,151.536c-2.977,0-5.554-1.637-6.956-4.04h13.913     C84.382,149.898,81.804,151.536,78.827,151.536z M143.474,135.374c2.977,0,5.554,1.637,6.956,4.04h-13.913     C137.92,137.011,140.497,135.374,143.474,135.374z M143.474,151.536c-2.977,0-5.554-1.637-6.956-4.04h13.913     C149.028,149.898,146.451,151.536,143.474,151.536z"/>
						</g>
					</g>
				</g>
				</svg>			
		</button>
		 <!-- Dropdown menu -->
		 <div id="dropDownOrtodoncia" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded shadow w-44  ">
                <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                  <li>
                    <button data-drawer-target="drawer-top-ortodoncia" data-drawer-show="drawer-top-ortodoncia" data-drawer-placement="top" aria-controls="drawer-top-ortodoncia"  class=" w-full block px-4 py-2 hover:bg-gray-100  ">Ortodocia fija</button>
                  </li>
                  <li>
                    <button  data-drawer-target="drawer-top-ortodonciaremovible" data-drawer-show="drawer-top-ortodonciaremovible" data-drawer-placement="top" aria-controls="drawer-top-ortodonciaremovible"  class="w-full block px-4 py-2 hover:bg-gray-100  ">Ortodoncia removible</button>
                  </li>


				  
                  
                </ul>
	
            </div>



      </li>
	  <li>
      	<button data-dropdown-toggle="dropDownProtesis"  type="button" class="h-full flex gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0   ">
			<span>Protesis</span>
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" class="text-white w-6 h-6" version="1.1" id="Capa_1" width="800px" height="800px" viewBox="0 0 400.141 400.141" xml:space="preserve">
			<g>
				<path d="M344.879,30.971C327.039,11,302.484,0,275.737,0c-20.946,0-43.379,12.377-59.76,21.414   c-5.425,2.992-13.523,7.894-15.911,7.895c-2.377,0.001-10.438-4.889-15.84-7.879C167.88,12.387,145.494,0,124.401,0   C97.654,0,73.099,11,55.26,30.971C38.308,49.951,28.972,74.93,28.972,101.303c0,16.988,3.122,36.946,8.017,59.606   c4.605,21.32,19.205,39.269,50.061,52.85c9.321,4.104,26.044,7.305,29.044,10.305c3.605,3.605,7.458,16.625,7.458,16.625   s0.875,3.068-0.412,3.068c-7.122,0-12.916,5.795-12.916,12.916s5.794,12.916,12.916,12.916c0,0,6.215,0,8.287,0   c1.625,0,2.154,1.67,2.154,1.67l4.472,13.805c0,0,0.375,2.533-2.6,2.533c-7.121,0-12.914,5.793-12.914,12.914   s5.793,12.916,12.914,12.916c0,0,7.669,0,10.225,0c1.875,0,2.501,1.512,2.501,1.512l5.201,15.561c0,0,0.298,0.936-0.827,0.936   c-1.17,0-4.682,0-4.682,0c-7.123,0-12.916,5.795-12.916,12.916c0,7.123,5.793,12.916,12.916,12.916c0,0,9.668,0,12.891,0   c1.75,0,2.022,1.373,2.022,1.373l7.974,23.855l0.047,0.125c4.757,11.623,14.385,17.52,28.617,17.52h0.791   c14.231,0,23.858-5.896,28.649-17.605c0,0,5.98-18.223,8.19-24.219c0.438-1.189,1.25-1.049,1.25-1.049h13.966   c7.121,0,12.915-5.793,12.915-12.916c0-7.121-3.506-12.916-12.915-12.916c-1.981,0-3.93,0.006-4.778,0.006   c-1.313,0-0.5-2.25-0.5-2.25l4.75-14.313c0,0,0.25-1.449,1.626-1.449c2.829,0,11.318,0,11.318,0   c7.121,0,12.915-5.795,12.915-12.916c0-7.12-5.176-12.913-12.297-12.913c-1.515,0-2.042,0.049-2.625,0.049   c-1.562,0-0.688-1.771-0.688-1.771s3.381-11.144,4.812-15.438c0.313-0.938,1.313-0.85,1.313-0.85h8.882   c7.121,0,12.914-5.795,12.914-12.916s-5.793-12.916-12.914-12.916c-1.132,0-0.92-1.494-0.736-2.234   c1.167-4.709,3.348-14.395,7.5-17.459c3.922-2.895,19.721-6.291,28.842-10.305c30.191-13.291,45.991-33.361,49.961-51.629   c5.019-23.091,8.604-43.98,8.604-60.828C371.168,74.93,361.832,49.954,344.879,30.971z M213.749,376.484   c-2.825,6.844-11.379,7.375-13.932,7.375c-2.548,0-11.065-0.529-13.913-7.324l-6.142-18.416c0,0-0.147-0.854,1.041-0.854   c9.864,0,29.086,0,38.78,0c0.688,0,0.541,0.396,0.541,0.396L213.749,376.484z M228.573,331.434c-14.224,0-42.562,0-56.896,0   c-0.875,0-1.063-0.869-1.063-0.869l-5.535-16.475c0,0-0.09-0.662,1.035-0.662c17.249,0,51.266,0,68.354,0   c0.646,0,0.48,0.477,0.48,0.477l-5.839,17.229C229.112,331.133,228.948,331.434,228.573,331.434z M244.136,286.982   c0,0-0.146,0.615-0.792,0.615c-6.161,0-65.66,0-86.208,0c-0.917,0-1.125-0.574-1.125-0.574l-5.42-16.388   c0,0-0.351-1.071,1.024-1.071c26.875,0,73.109,0.025,97.479,0.025c0.875,0,0.64,0.676,0.64,0.676L244.136,286.982z    M256.928,243.753c-28.567,0-113.958-0.063-113.958-0.063s-0.875,0-1.292-0.875c-1.202-2.522-3.542-8.791-4.489-12.369   c-0.525-1.983,1.364-1.381,1.364-1.381c19.971,3.822,39.268,5.351,61.273,5.351c22.32,0,42.439-1.672,62.644-5.601   c0,0,1.417-0.25,1.087,0.653c-1.098,3.009-3.308,9.647-4.316,12.7C258.915,243.148,257.928,243.753,256.928,243.753z    M348.261,157.066c-0.691,3.012-2.895,8.507-4.036,11.595c-4.261,11.532-18.773,21.91-38.087,30.414   c-9.916,4.365-21.131,8.088-33.332,11.064l-2.128,0.514c-21.528,5.049-46.028,7.717-70.853,7.717   c-24.134,0-48.009-2.529-69.107-7.318l-2.075-0.477c-12.884-3.041-24.7-6.908-35.129-11.498   c-18.93-8.334-34.325-19.907-38.899-31.041c-1.469-3.577-3.938-12.219-3.938-12.219c-4.931-21.021-5.661-39.273-5.661-54.512   c0-41.91,29.694-85.258,79.384-85.258c12.896,0,29.882,5.902,45.442,15.789c2.272,1.445,5.513,3.936,8.646,6.346   c1.245,0.957,2.473,1.9,3.618,2.764c3.715,2.779,8.735,6.418,14.615,9.879c3.093,1.826,5.907,3.445,9.021,4.768   c12.738,5.406,26.244,8.148,40.142,8.148c14.181,0,31.599-3.445,31.359-5.414c-0.24-1.969-29.273-1.969-48.604-7.09   c-7.717-2.043-16.462-5.355-16.462-7.17c0-1.935,2.729-3.453,4.871-4.732c1.868-1.117,3.987-2.383,6.688-3.873   c14.851-8.193,35.188-19.414,52-19.414c49.69,0,79.384,43.348,79.384,85.258C355.121,116.336,353.147,135.788,348.261,157.066z"/>
			</g>
			</svg>			
		</button>
		  <!-- Dropdown menu -->
		  <div id="dropDownProtesis" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded shadow w-44  ">
                <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                  <li>
                    <button data-drawer-target="drawer-top-protesis" data-drawer-show="drawer-top-protesis" data-drawer-placement="top" aria-controls="drawer-top-protesis" class="w-full block px-4 py-2 hover:bg-gray-100  ">Protesis fija</button>
                  </li>
                  <li>
                    <button  data-drawer-target="drawer-top-protesisremovible" data-drawer-show="drawer-top-protesisremovible" data-drawer-placement="top" aria-controls="drawer-top-protesisremovible" class=" w-full block px-4 py-2 hover:bg-gray-100  ">Protesis removible</button>
                  </li>
                  
                </ul>
                
            </div>



      </li>
	 
      
    </ul>
  </div>
  </div>
</nav>

<div  id="modalSaveImgConfirmation">



</div>


<!-- drawer ortodoncia fija -->
<div id="drawer-top-ortodoncia" class="fixed z-40 w-full p-4 bg-white  transition-transform top-0 left-0 right-0 -translate-y-full" tabindex="-1" aria-labelledby="drawer-top-label">
    <h5 id="drawer-top-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 "><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Ortodoncia fija</h5>
    <button type="button" data-drawer-hide="drawer-top-ortodoncia" aria-controls="drawer-top-ortodoncia" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center  " >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>


	<div style="margin:0rem 0rem"class="grid grid-cols-1 gap-4">
	<h5 class="text-center text-blue-600 text-2xl">Buen estado</h5>
	<ol class="items-center flex justify-center mb-4 w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
		<li class="flex items-center text-blue-600 bg-blue-100 hover:bg-blue-200 p-2 rounded-lg  space-x-2.5">
			<button onclick="odt.setcommand(23)" data-drawer-hide="drawer-top-ortodoncia" aria-controls="drawer-top-ortodoncia" class="flex gap-2 items-center">
				<span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 ">
				1
			</span>
			<span>
				<h3 class="font-medium leading-tight">Ortodoncia Fija  </h3>
				<p class="text-sm">Parte inicial<p>
			</span>
			</button>
			
		</li>
		<li class="flex items-center  text-blue-600  bg-blue-100 p-2 hover:bg-blue-200 rounded-lg space-x-2.5">
				<button onclick="odt.setcommand(24)"data-drawer-hide="drawer-top-ortodoncia" aria-controls="drawer-top-ortodoncia" class="flex gap-2 items-center">
					<span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 ">
					2
				</span>
				<span>
					<h3 class="font-medium leading-tight">Ortodoncia Fija  </h3>
					<p class="text-sm">Cuerpo<p>
				</span>
				</button>
		</li>
		<li class="flex items-center  text-blue-600  bg-blue-100 p-2 hover:bg-blue-200  rounded-lg space-x-2.5">
			<button onclick="odt.setcommand(25)"data-drawer-hide="drawer-top-ortodoncia" aria-controls="drawer-top-ortodoncia" class="flex gap-2 items-center">
				<span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 ">
				3
			</span>
			<span>
				<h3 class="font-medium leading-tight">Ortodoncia Fija  </h3>
				<p class="text-sm">Parte final<p>
			</span>
			</button>
		</li>
	</ol>
	<h5 class="text-center text-red-600 text-2xl">Mal estado</h5>

	<ol class="items-center flex justify-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
		<li class="flex items-center text-red-600  bg-red-100 p-2 hover:bg-red-200  rounded-lg space-x-2.5">
			<button onclick="odt.setcommand(26)"data-drawer-hide="drawer-top-ortodoncia" aria-controls="drawer-top-ortodoncia" class="flex gap-2 items-center">
				<span class="flex items-center justify-center w-8 h-8 border border-red-600 rounded-full shrink-0 ">
				1
			</span>
			<span>
				<h3 class="font-medium leading-tight">Ortodoncia Fija  </h3>
				<p class="text-sm">Parte inicial<p>
			</span>
			</button>
			
		</li>
		<li class="flex items-center  text-red-600  bg-red-100 p-2 hover:bg-red-200   rounded-lg space-x-2.5">
				<button onclick="odt.setcommand(27)" data-drawer-hide="drawer-top-ortodoncia" aria-controls="drawer-top-ortodoncia" class="flex gap-2 items-center">
					<span class="flex items-center justify-center w-8 h-8 border border-red-600 rounded-full shrink-0 ">
					2
				</span>
				<span>
					<h3 class="font-medium leading-tight">Ortodoncia Fija  </h3>
					<p class="text-sm">Cuerpo<p>
				</span>
				</button>
		</li>
		<li class="flex items-center  text-red-600  bg-red-100 p-2 hover:bg-red-200  rounded-lg space-x-2.5">
			<button onclick="odt.setcommand(28)" data-drawer-hide="drawer-top-ortodoncia" aria-controls="drawer-top-ortodoncia" class="flex gap-2 items-center">
				<span class="flex items-center justify-center w-8 h-8 border border-red-600 rounded-full shrink-0 ">
				3
			</span>
			<span>
				<h3 class="font-medium leading-tight">Ortodoncia Fija  </h3>
				<p class="text-sm">Parte final<p>
			</span>
			</button>
		</li>
	</ol>
		

</div>   
</div>


<!-- drawer ortodoncia removible -->
<div id="drawer-top-ortodonciaremovible" class="fixed z-40 w-full p-4 bg-white  transition-transform top-0 left-0 right-0 -translate-y-full" tabindex="-1" aria-labelledby="drawer-top-label">
    <h5 id="drawer-top-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 "><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Ortodoncia removible</h5>
    <button type="button" data-drawer-hide="drawer-top-ortodonciaremovible" aria-controls="drawer-top-ortodonciaremovible" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center  " >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>


	<div style="margin:0rem 0rem"class="grid grid-cols-1 gap-4">
	<h5 class="text-center text-blue-600 text-2xl">Buen estado</h5>
	<ol class="items-center flex justify-center mb-4 w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
	
		<li class="flex items-center  text-blue-600  bg-blue-100 hover:bg-blue-200 p-2 rounded-lg space-x-2.5">
				<button onclick="odt.setcommand(29)"data-drawer-hide="drawer-top-ortodonciaremovible" aria-controls="drawer-top-ortodonciaremovible" class="flex gap-2 items-center">
					
				<span>
					<h3 class="font-medium leading-tight">Ortodoncia removible  </h3>
				</span>
				</button>
		</li>
		
	</ol>
	<h5 class="text-center text-red-600 text-2xl">Mal estado</h5>

	<ol class="items-center flex justify-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
		
		<li class="flex items-center  text-red-600  bg-red-100 hover:bg-red-200 p-2  rounded-lg space-x-2.5">
				<button onclick="odt.setcommand(30)" data-drawer-hide="drawer-top-ortodonciaremovible" aria-controls="drawer-top-ortodonciaremovible" class="flex gap-2 items-center">
					
				<span>
					<h3 class="font-medium leading-tight">Ortodoncia removible </h3>
				</span>
				</button>
		</li>
		
	</ol>
		

</div>   
</div>


<!-- drawer protesis fija -->
<div id="drawer-top-protesis" class="fixed z-40 w-full p-4 bg-white  transition-transform top-0 left-0 right-0 -translate-y-full" tabindex="-1" aria-labelledby="drawer-top-label">
    <h5 id="drawer-top-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 "><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Protesis fija</h5>
    <button type="button" data-drawer-hide="drawer-top-protesis" aria-controls="drawer-top-protesis" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center  " >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>


	<div style="margin:0rem 0rem"class="grid grid-cols-1 gap-4">
	<h5 class="text-center text-blue-600 text-2xl">Buen estado</h5>
	<ol class="items-center flex justify-center mb-4 w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
		<li class="flex items-center text-blue-600 bg-blue-100 hover:bg-blue-200 p-2 rounded-lg  space-x-2.5">
			<button onclick="odt.setcommand(31)" data-drawer-hide="drawer-top-protesis" aria-controls="drawer-top-protesis" class="flex gap-2 items-center">
				<span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 ">
				1
			</span>
			<span>
				<h3 class="font-medium leading-tight">Prótesis Fija  </h3>
				<p class="text-sm">Parte inicial<p>
			</span>
			</button>
			
		</li>
		<li class="flex items-center  text-blue-600  bg-blue-100 p-2 hover:bg-blue-200 rounded-lg space-x-2.5">
				<button onclick="odt.setcommand(32)"data-drawer-hide="drawer-top-protesis" aria-controls="drawer-top-protesis" class="flex gap-2 items-center">
					<span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 ">
					2
				</span>
				<span>
					<h3 class="font-medium leading-tight">Prótesis Fija  </h3>
					<p class="text-sm">Cuerpo<p>
				</span>
				</button>
		</li>
		<li class="flex items-center  text-blue-600  bg-blue-100 p-2 hover:bg-blue-200  rounded-lg space-x-2.5">
			<button onclick="odt.setcommand(33)"data-drawer-hide="drawer-top-protesis" aria-controls="drawer-top-protesis" class="flex gap-2 items-center">
				<span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 ">
				3
			</span>
			<span>
				<h3 class="font-medium leading-tight">Prótesis Fija  </h3>
				<p class="text-sm">Parte final<p>
			</span>
			</button>
		</li>
	</ol>
	<h5 class="text-center text-red-600 text-2xl">Mal estado</h5>

	<ol class="items-center flex justify-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
		<li class="flex items-center text-red-600  bg-red-100 p-2 hover:bg-red-200  rounded-lg space-x-2.5">
			<button onclick="odt.setcommand(34)"data-drawer-hide="drawer-top-protesis" aria-controls="drawer-top-protesis" class="flex gap-2 items-center">
				<span class="flex items-center justify-center w-8 h-8 border border-red-600 rounded-full shrink-0 ">
				1
			</span>
			<span>
				<h3 class="font-medium leading-tight">Prótesis Fija  </h3>
				<p class="text-sm">Parte inicial<p>
			</span>
			</button>
			
		</li>
		<li class="flex items-center  text-red-600  bg-red-100 p-2 hover:bg-red-200   rounded-lg space-x-2.5">
				<button onclick="odt.setcommand(35)" data-drawer-hide="drawer-top-protesis" aria-controls="drawer-top-protesis" class="flex gap-2 items-center">
					<span class="flex items-center justify-center w-8 h-8 border border-red-600 rounded-full shrink-0 ">
					2
				</span>
				<span>
					<h3 class="font-medium leading-tight">Prótesis Fija  </h3>
					<p class="text-sm">Cuerpo<p>
				</span>
				</button>
		</li>
		<li class="flex items-center  text-red-600  bg-red-100 p-2 hover:bg-red-200  rounded-lg space-x-2.5">
			<button onclick="odt.setcommand(36)" data-drawer-hide="drawer-top-protesis" aria-controls="drawer-top-protesis" class="flex gap-2 items-center">
				<span class="flex items-center justify-center w-8 h-8 border border-red-600 rounded-full shrink-0 ">
				3
			</span>
			<span>
				<h3 class="font-medium leading-tight">Prótesis Fija  </h3>
				<p class="text-sm">Parte final<p>
			</span>
			</button>
		</li>
	</ol>
		

</div>   
</div>


<!-- drawer protesis removible -->
<div id="drawer-top-protesisremovible" class="fixed z-40 w-full p-4 bg-white  transition-transform top-0 left-0 right-0 -translate-y-full" tabindex="-1" aria-labelledby="drawer-top-label">
    <h5 id="drawer-top-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 "><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Ortodoncia removible</h5>
    <button type="button" data-drawer-hide="drawer-top-protesisremovible" aria-controls="drawer-top-protesisremovible" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center  " >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>


	<div style="margin:0rem 0rem"class="grid grid-cols-1 gap-4">
	<h5 class="text-center text-blue-600 text-2xl">Buen estado</h5>
	<ol class="items-center flex justify-center mb-4 w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
	
		<li class="flex items-center  text-blue-600  bg-blue-100 hover:bg-blue-200 p-2 rounded-lg space-x-2.5">
				<button onclick="odt.setcommand(37)"data-drawer-hide="drawer-top-protesisremovible" aria-controls="drawer-top-protesisremovible" class="flex gap-2 items-center">
					
				<span>
					<h3 class="font-medium leading-tight">Prótesis removible </h3>
				</span>
				</button>
		</li>
		
	</ol>
	<h5 class="text-center text-red-600 text-2xl">Mal estado</h5>

	<ol class="items-center flex justify-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
		
		<li class="flex items-center  text-red-600  bg-red-100 hover:bg-red-200 p-2  rounded-lg space-x-2.5">
				<button onclick="odt.setcommand(38)" data-drawer-hide="drawer-top-protesisremovible" aria-controls="drawer-top-protesisremovible" class="flex gap-2 items-center">
					
				<span>
					<h3 class="font-medium leading-tight">Prótesis removible </h3>
				</span>
				</button>
		</li>
		
	</ol>
		

</div>   
</div>





<!--DRAWER SHOW TRATAMIENTOS-->
<!-- drawer component -->
<div id="drawer-navigation" class="fixed z-40 h-screen p-4 overflow-y-auto bg-white w-80  transition-transform left-0 top-0 -translate-x-full" tabindex="-1" aria-labelledby="drawer-navigation-label">
    <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase ">Tratamientos generales</h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center  " >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
  <div class="py-4 overflow-y-auto">
      <ul class="space-y-2">
         <li>
            <button onclick="odt.setcommand(18)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Lesion de caries</span>
            </button>
         </li>

		 <li>
            <button onclick="odt.setcommand(3)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Pieza dentaria ausente</span>
            </button>
         </li>
		 <li>
            <button onclick="odt.setcommand(4)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Pieza dentaria en erupción</span>
            </button>
         </li>
		 <li>
            <button onclick="odt.setcommand(5)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Edéntulo total</span>
            </button>
         </li>
		 <li>
            <button onclick="odt.setcommand(6)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Pieza dentaria supernumeraria</span>
            </button>
         </li>
		 <li>
            <button onclick="odt.setcommand(7)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Pieza dentaria extruida</span>
            </button>
         </li>	
		 <li>
            <button onclick="odt.setcommand(8)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Pieza dentaria intruida</span>
            </button>
         </li>
		 <li>
            <button onclick="odt.setcommand(9)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Giroversion</span>
            </button>
         </li>
		 <li>
            <button onclick="odt.setcommand(10)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Pieza dentaria en clavija</span>
            </button>
         </li>
		 <li>
            <button onclick="odt.setcommand(11)"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
               <span class="ml-3">Geminacion</span>
            </button>
         </li>
		

		 
		 

         <li>
            <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  " aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">Coronas</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-example" class="overflow-hidden hidden py-2 space-y-2">
                  <li>
					<button onclick="odt.setcommand(12)" style="margin-left:1.5rem"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Corona temporal</span>
						</button>                  
				</li>
				<li>
					<button onclick="odt.setcommand(13)" style="margin-left:1.5rem"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Corona buen estado</span>
						</button>                  
				</li>
				<li>
					<button onclick="odt.setcommand(14)" style="margin-left:1.5rem"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Corona mal estado</span>
						</button>                  
				</li>
                  
            </ul>
         </li>


		 <li>
            <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  " aria-controls="dropdown-espigo" data-collapse-toggle="dropdown-espigo">
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">Espigo</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-espigo" class="overflow-hidden hidden py-2 space-y-2">
                  <li>
					<button onclick="odt.setcommand(15)"style="margin-left:1.5rem"   data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Espigo buen estado</span>
						</button>                  
				</li>
				<li>
					<button onclick="odt.setcommand(16)"style="margin-left:1.5rem"   data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Espigo mal estado</span>
						</button>                  
				</li>
				
                  
            </ul>
         </li>

		 <li>
            <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  " aria-controls="dropdown-diastemia" data-collapse-toggle="dropdown-diastemia">
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">Diastemia</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-diastemia" class="overflow-hidden  hidden py-2 space-y-2">
                  <li>
					<button onclick="odt.setcommand(19)"style="margin-left:1.5rem"   data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Diastemia parte inicial</span>
						</button>                  
				</li>
				<li>
					<button onclick="odt.setcommand(20)" style="margin-left:1.5rem"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Diastemeia parte final</span>
						</button>                  
				</li>
				
                  
            </ul>
         </li>

		 <li>
            <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  " aria-controls="dropdown-fusion" data-collapse-toggle="dropdown-fusion">
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">Fusion</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-fusion" class="overflow-hidden hidden py-2 space-y-2">
                  <li>
						<button onclick="odt.setcommand(21)" style="margin-left:1.5rem"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Fusion parte inicial</span>
						</button>                  
				</li>
				<li>
					<button onclick="odt.setcommand(22)"style="margin-left:1.5rem"   data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Fusion parte final</span>
						</button>                  
				</li>
				
                  
            </ul>
         </li>

		 <li>
            <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  " aria-controls="dropdown-transposicion" data-collapse-toggle="dropdown-transposicion">
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">Transposición</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-transposicion" class="hidden overflow-hidden  py-2 space-y-2">
                  <li>
					<button onclick="odt.setcommand(41)" style="margin-left:1.5rem"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Transposición parte inicial</span>
						</button>                  
				</li>
				<li>
					<button onclick="odt.setcommand(42)"style="margin-left:1.5rem"  data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg  hover:bg-gray-100 ">
						<span class="ml-3">Transposición parte final</span>
						</button>                  
				</li>
				
                  
            </ul>
         </li>




         
      </ul>
   </div>
</div>



<!--EDIT DOC-->

<div data-dial-init style="top:15rem"class="fixed  right-6 group">
    <div  id="speed-dial-menu-text-outside-button-square" class="flex flex-col items-center  mb-4 space-y-2">








	  <!---->
	  <button onclick="odt.setcommand(18)" data-tooltip-target="tooltip-pintar-rojo" type="button" class="relative w-[52px] h-[52px] text-red-500 bg-white rounded-full border border-gray-200 hover:text-red-800  shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
		
	  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" class="w-6 h-6" version="1.1" id="Layer_1" viewBox="0 0 511.999 511.999" xml:space="preserve">
		<g>
			<g>
				<g>
					<path d="M490.146,140.597c0-76.592-61.445-139.659-136.971-140.586c-36.424-0.46-71.2,13.465-97.173,38.093     c-25.975-24.627-60.765-38.509-97.173-38.093C83.302,0.938,21.858,64.005,21.858,140.596c0,2.494-3.135-18.285,48.685,311.669     c8.166,62.265,89.209,81.712,124.79,30.058l40.651-59.01c9.682-14.055,30.366-14.038,40.035,0l40.651,59.011     c35.609,51.688,116.628,32.164,124.79-30.058C493.1,123.461,490.146,143.098,490.146,140.597z M398.956,445.894     c-0.033,0.215-0.065,0.431-0.093,0.648c-2.944,23.385-33.397,30.854-46.801,11.399l-40.651-59.011     c-26.723-38.791-84.108-38.778-110.82,0l-40.651,59.011c-13.429,19.495-43.861,11.951-46.801-11.399     c-0.029-0.216-0.059-0.433-0.092-0.648L64.848,139c0.844-52.814,43.496-96.02,95.682-96.02c30.886,0,59.965,14.967,77.982,40.199     l46.471,66.276c6.816,9.722,20.22,12.068,29.932,5.258c9.717-6.814,12.073-20.214,5.258-29.932l-37.146-52.977     c59.72-61.017,162.756-18.859,164.128,67.194L398.956,445.894z"/>
					<path d="M147.435,134.169c-1.483-11.775-12.242-20.13-24.006-18.634c-11.776,1.483-20.118,12.232-18.634,24.006l17.608,139.738     c1.487,11.809,12.282,20.128,24.006,18.634c11.776-1.483,20.118-12.232,18.634-24.006L147.435,134.169z"/>
				</g>
			</g>
		</g>
		</svg>

	
	 
        </button>

		<div id="tooltip-pintar-rojo" role="tooltip" class=" z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
			Pintar diente de rojo
			<div class="tooltip-arrow" data-popper-arrow></div>
		</div>


			  <!---->
		<button onclick="odt.setcommand(17)" data-tooltip-target="tooltip-pintar-azul" type="button" class="relative w-[52px] h-[52px] text-blue-500 bg-white rounded-full border border-gray-200 hover:text-blue-700  shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" class="w-6 h-6" version="1.1" id="Layer_1" viewBox="0 0 511.999 511.999" xml:space="preserve">
		<g>
			<g>
				<g>
					<path d="M490.146,140.597c0-76.592-61.445-139.659-136.971-140.586c-36.424-0.46-71.2,13.465-97.173,38.093     c-25.975-24.627-60.765-38.509-97.173-38.093C83.302,0.938,21.858,64.005,21.858,140.596c0,2.494-3.135-18.285,48.685,311.669     c8.166,62.265,89.209,81.712,124.79,30.058l40.651-59.01c9.682-14.055,30.366-14.038,40.035,0l40.651,59.011     c35.609,51.688,116.628,32.164,124.79-30.058C493.1,123.461,490.146,143.098,490.146,140.597z M398.956,445.894     c-0.033,0.215-0.065,0.431-0.093,0.648c-2.944,23.385-33.397,30.854-46.801,11.399l-40.651-59.011     c-26.723-38.791-84.108-38.778-110.82,0l-40.651,59.011c-13.429,19.495-43.861,11.951-46.801-11.399     c-0.029-0.216-0.059-0.433-0.092-0.648L64.848,139c0.844-52.814,43.496-96.02,95.682-96.02c30.886,0,59.965,14.967,77.982,40.199     l46.471,66.276c6.816,9.722,20.22,12.068,29.932,5.258c9.717-6.814,12.073-20.214,5.258-29.932l-37.146-52.977     c59.72-61.017,162.756-18.859,164.128,67.194L398.956,445.894z"/>
					<path d="M147.435,134.169c-1.483-11.775-12.242-20.13-24.006-18.634c-11.776,1.483-20.118,12.232-18.634,24.006l17.608,139.738     c1.487,11.809,12.282,20.128,24.006,18.634c11.776-1.483,20.118-12.232,18.634-24.006L147.435,134.169z"/>
				</g>
			</g>
		</g>
		</svg>
        </button>

		<div id="tooltip-pintar-azul" role="tooltip" class=" z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
			Pintar diente de azul
			<div class="tooltip-arrow" data-popper-arrow></div>
		</div>








        <!---->
		<button onclick="odt.new()" data-tooltip-target="tooltip-nuevo" type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200 hover:text-gray-900  shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
		<path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zM12.75 12a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V18a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V12z" clip-rule="evenodd" />
		<path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
		</svg>
        </button>

		<div id="tooltip-nuevo" role="tooltip" class=" z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
			Nuevo odontograma
			<div class="tooltip-arrow" data-popper-arrow></div>
		</div>



		<!---->
        <button onclick="odt.clear()" type="button" data-tooltip-target="tooltip-borrarTodo" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200  hover:text-gray-900 shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
			<path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
			</svg>

        </button>
		<div id="tooltip-borrarTodo" role="tooltip" class=" z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
			Borrar todo
			<div class="tooltip-arrow" data-popper-arrow></div>
		</div>

		<!---->
        <button onclick="odt.undo()" type="button" data-tooltip-target="tooltip-borrarUltimo" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200  hover:text-gray-900 shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
		<path fill-rule="evenodd" d="M9.53 2.47a.75.75 0 010 1.06L4.81 8.25H15a6.75 6.75 0 010 13.5h-3a.75.75 0 010-1.5h3a5.25 5.25 0 100-10.5H4.81l4.72 4.72a.75.75 0 11-1.06 1.06l-6-6a.75.75 0 010-1.06l6-6a.75.75 0 011.06 0z" clip-rule="evenodd" />
		</svg>
        </button>

		<div  id="tooltip-borrarUltimo" role="tooltip" class=" z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
			Borrar ultimo paso (doble click)
			<div class="tooltip-arrow" data-popper-arrow></div>
		</div>


		
		<!---->
        <button type="button" data-tooltip-target="tooltip-descargar"  id="download" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200  hover:text-gray-900 shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
		<path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v11.69l3.22-3.22a.75.75 0 111.06 1.06l-4.5 4.5a.75.75 0 01-1.06 0l-4.5-4.5a.75.75 0 111.06-1.06l3.22 3.22V3a.75.75 0 01.75-.75zm-9 13.5a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
		</svg>
        </button>
		<div id="tooltip-descargar" role="tooltip" class=" z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
			Descargar odontograma
			<div class="tooltip-arrow" data-popper-arrow></div>
		</div>

		<!---->
		<button type="submit" name="saveImg" id="guardarImg"  data-tooltip-target="tooltip-guardar" style="width:70px;height:70px"class="relative  text-blue-500 bg-white rounded-full border border-gray-200  hover:text-blue-700 shadow-sm   hover:bg-gray-50   focus:ring-4 focus:ring-gray-300 focus:outline-none ">
	

		<svg aria-hidden="true" class="w-10 h-10 mx-auto mt-px" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"></path><path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z"></path></svg>
        </button>
				
        
			<div id="tooltip-guardar" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip ">
			Guardar odontograma
			<div class="tooltip-arrow" data-popper-arrow></div>
		</div>
    </div>
    
</div>











	

<div  style="margin-top:6rem ;padding-left:7rem" class="flex justify-center">

	<div id="photo" style="padding-right:4.5rem;padding-top:2rem; padding-bottom:3rem">
		<div style="padding-left:7rem;padding-top:3rem " class="flex justify-center mb-4">
				<div>	<input style="font-size:1.5rem;background:none;height:50px;width:700px;" type="text" id="success" class="bg-blue-50 border border-gray-500 text-black  placeholder-blue-700  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="Escribir un título...">
				</div>
				
		</div>
		<div style="padding-left:7rem;margin-bottom:4rem " class="flex justify-end mb-8">
				
				<div class="inline-flex items-center gap-2">	<label style="margin-bottom:5px" for="date">Fecha: </label><input style="background:none;height:50px;border:transparent" id="date" type="date" class="bg-blue-50 border border-blue-500 text-black  placeholder-blue-700  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="">
				</div>
		</div>
	
		<!--PARTE SUPERIOR-->
		<div style="grid-template-columns: 15px 500px 5px 500px 15px; padding-left:5rem " class="grid gap-2  ">
			<div></div>
			<div class="grid" style=" grid-template-columns: repeat(8, minmax(0, 1fr));" >
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
			</div>
			<div></div>

			<div class="grid" style=" grid-template-columns: repeat(8, minmax(0, 1fr));" >
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
			</div>
			<div></div>

		</div>
	<div style="padding-left:5rem">
		<div  class="pid-odontogram"></div>
		<div  class="pid2-odontogram2"></div>
	</div>

	<!--PARTE INFERIOR-->
	<div style="grid-template-columns: 15px 500px 5px 500px 15px; padding-left:5rem " class="grid gap-2  ">
			<div></div>
			<div class="grid" style=" grid-template-columns: repeat(8, minmax(0, 1fr));" >
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
			</div>
			<div></div>

			<div class="grid" style=" grid-template-columns: repeat(8, minmax(0, 1fr));" >
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>
				<div contenteditable="true"  class="flex items-center justify-center"  style="font-size:15px;height:50px;width:50px;border:1px solid black;"></div>

	
			</div>
			<div></div>

	</div>	
	<div id="comentarios"style="margin-left:6rem;margin-right:2rem;margin-top:6rem; padding-bottom:1rem" class="mt-8 p-2 bg-gray-50 grid grid-rows-2">
		<label style="font-size:1.3rem;"class="font-semibold"  for="comentarios">Comentarios:</label>
		<div  contenteditable="true" style="padding:-10px 0;background:none;height:180px;width:1000px;border:transparent;overflow:auto" type="text" id="comentarios" class="bg-blue-50 border border-blue-500 text-black  placeholder-green-blue  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " ></div>
	</div>
	<div id="comentarios"style="margin-left:6rem;margin-right:2rem; padding-bottom:1rem" class="mt-8 p-2 bg-gray-50 grid grid-rows-2">
		<label style="font-size:1.3rem;"class="font-semibold" for="Especificaciones">Especificaciones:</label>
		<div  contenteditable="true" style="padding:-10px 0;background:none;height:180px;width:1000px;border:transparent;overflow:auto" type="text" id="Especificaciones" class="bg-blue-50 border border-blue-500 text-black  placeholder-green-blue  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " ></div>
	</div>

</div>
</div>





<div class="cmd-odontograma2-fill btn-cmd options  grid grid-cols-2" style="width:100%"></div>


<style>
	.options{
		margin:auto;
		padding:0rem;
		
	}

	@media (min-width:700px) {
		.options{
			padding:0 4rem 0 8rem;
		}
		
	}
	.options button{
		background:#3F83F8;
		border-radius: 0.5rem;
		
		display:flex;
		justify-content:center;
		margin:auto;
		color:white;
		width:100%;
		height:50px;
		align-items:center;
	
	}	
	.options button:hover{
		background:rgba(0,50,255,0.8);
	}

	
</style>
<br/>
<div class="cmd-message" style="padding:10px; font-weight: bold;"></div>
<div class="cmd-message2" style="padding:10px; font-weight: bold;"></div>











<script type="text/javascript">
var odt;
var saveImg = function(){
	
	odt.getPng(function(img){ 
		/* //window.open(img, '_blank'); */
		$.post('save.php', {imagedata: img}, function(result){
			console.log(result);
			var res=JSON.parse(result);
			if(res.success){
				window.open(res.filename, '_blank');
			}
		})
	})
}
$(function(){
	odt= new odontogramxxasda({pid:'pid',obj:'odontogram',message:'cmd-message'});
	var cmd=odt.getCommand(),btn='',spr='<div style="width:220px; float:left">\n';	
	btn+=spr;
	$.each(cmd,function(k,v){
		//		console.log(k,v);

		if(k>0) btn+='<p style="display:none;margin:5px"><button onclick="odt.setcommand('+k+')"> '+v+' </button></p>';
		if((k==0)||(k==6)||(k==10)||(k==14)||(k==18)) btn+='</div>'+spr;
	});
	btn+='</div>';
	$('.cmd').append(btn);
})


$(function(){
	odt= new odontogram2({pid:'pid2',obj:'odontogram2',message:'cmd-message2'});
	var cmd=odt.getCommand(),btn='',spr='\n';	
	btn+=spr;
	$.each(cmd,function(k,v){
		//		console.log(k,v);
		if(k>0 && k<3) btnfill+='<p style="display:none;margin:5px"><button onclick="odt.setcommand('+k+')"> '+v+' </button></p>';

		if(k>2) btn+='<p style="margin:5px"><button class="buttons-1" onclick="odt.setcommand('+k+')"> '+v+' </button></p>';
		btn+=spr;

		 btn+=spr;
	});
	btn+='</div>';
	$('.cmd-odontograma2').append(btn);

	var cmd_fill=odt.getCommand_fill(),btnfill='',sprfill='\n';	
	btnfill+=spr;
	$.each(cmd_fill,function(k,v){
		//		console.log(k,v);
		if(k>0) btnfill+='<p style="margin:5px"><button onclick="odt.setcommand('+k+')"> '+v+' </button></p>';

		btnfill+=sprfill;
	});
	btnfill+='</div>';


	$('.cmd-odontograma2-fill').append(btnfill)
})





</script>
<style>
	#options_title1:nth-child(1){
		display:none;

		background-color:pink;
		
	}
</style>





<!--SCRIPT TO BEGIN PRINT-->

<script type="text/javascript">
		
   
   jQuery(document).ready(function(){
       jQuery("#download").click(function(){
		   screenshot();
	   });
	   jQuery("#guardarImg").click(function(){
		   saveFile();
	   });
   });
   
   function saveFile(){
	   html2canvas(document.getElementById("photo")).then(function(canvas){

		const id='<?php echo $_GET['pid']?>';
		const token='<?php echo $_GET['token']?>';
		const clinica_id='<?php echo $user_id?>';

		var ajax=new XMLHttpRequest();
		ajax.open('POST','save-capture.php',true);
		ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		ajax.send(`id=${id}&token=${token}&clinica_id=${clinica_id}&image=`+canvas.toDataURL('image/jpeg',0.9));
		document.getElementById('modalSaveImgConfirmation').innerHTML=`

		<div id="alert-additional-content-3" style="z-index:50;position:fixed;width:1000px" class="mx-auto flex justify-center" role="alert">
<div style="margin-top:4rem;max-width:500px;margin:4rem auto 0 auto;"  class="p-4 mb-4 text-green-700 border border-green-300 rounded-lg bg-green-50   " >
  <div class="flex items-center">
    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <h3 class="text-lg font-medium">Imagen guardada con exito</h3>
  </div>
  <div class="mt-2 mb-4 text-sm">
		Cada vez que guardes un odontograma, se genera una nueva imagen. Los podras visualizar en la seccion de pacientes
  </div>
  <div class="flex">
    <a  href="../paciente_id.php?pid=<?=$pid;?>&modal=odontograma" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center   ">
      <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
      Ir a odontogramas
    </a>
    <button type="button" onclick="hideModal()" class="text-green-700 bg-transparent border border-green-700 hover:bg-green-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center     " data-dismiss-target="#alert-additional-content-3" aria-label="Close">
      Seguir editando
    </button>
  </div>
</div>
</div>

`;

console.log(document.getElementById('modalSaveImgConfirmation'));


		ajax.onreadystatechange=function(){
			if(ajax.readystate==4 && ajax.status==200){

			}
		}
	   });
   }
   function screenshot(){
	   html2canvas(document.getElementById("photo")).then(function(canvas){
          downloadImage(canvas.toDataURL(),"UsersInformation.png");
	   });
   }

   function downloadImage(uri, filename){
	 var link = document.createElement('a');
	 if(typeof link.download !== 'string'){
        window.open(uri);
	 }
	 else{
		 link.href = uri;
		 link.download = filename;
		 accountForFirefox(clickLink, link);
	 }
   }

   function clickLink(link){
	   link.click();
   }

   function accountForFirefox(click){
	   var link = arguments[1];
	   document.body.appendChild(link);
	   click(link);
	   document.body.removeChild(link);
   }

function hideModal(){
	document.getElementById('alert-additional-content-3').style.visibility='hidden';
}
</script>
<!--END SCRIPT PRINT IMAGE-->
<?php
 }else{
	echo '<div style="max-width:600px" class="p-4 mx-auto  mb-4 text-sm text-red-700 bg-red-100 rounded-lg  " role="alert">
	<span class="font-medium">Informacion!</span> No estas permitido editar el odontograma de este paciente
  </div>
  
  <a href="../pacientes.php"type="button" style="margin:0 auto 0 auto;max-width:300px; display:flex;justify-content:center"class=" text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2   ">Volver a pacientes</a>
  '
  

  ;
 }
?>

<script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>


</body>
</html>