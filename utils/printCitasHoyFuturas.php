
                  <tr class="bg-gray-50  hover:bg-gray-100  text-gray-700 ">
                    <td class="px-4 py-3">
                      <div class="flex  text-sm">
                        <div class="flex items-center wrap">

                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        
                        <div>
                          <a href="paciente_id.php?pid=<?=$fetch_evento['idPaciente'];?>"><p class=" text-blue-600    font-semibold"><?=$fetch_evento['nombreEvento'] ;?></p></a>
                          <p class="text-xs text-gray-600 "><?=$fetch_evento['doctor'] ;?></p>
                        </div>
                        </div>
                       
                        
                      </div>
                    </td>
                    <?php
                      $inicioCorto=substr($fetch_evento['inicio'] ,0,16);
                      $finCorto=substr($fetch_evento['fin'] ,0,16);

                      $mesNumberMM=substr($inicioCorto,5,2); //formato mm

                      $mesesNames=['Nothin','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Sep','Oct','Nov','Dic'];
                      $numberMonthInt=(int)$mesNumberMM;

                      $year=substr($inicioCorto,0,4);//YEAR YYYYY
                      $day=substr($inicioCorto,8,2); //DAY DD
                      $monthString=$mesesNames[$numberMonthInt]; //MONTH STRING RETURN OF $inicioCorto
                      $exactTime=substr($inicioCorto,11,5);//INICIO EXACT TIME

                      $exactTimeEnd=substr($finCorto,11,5);






                    //SCRIPT PARA OBTENER EL INTERVALO DE TIEMPO DE CITA

                      $datetime1 = date_create($inicioCorto);
                      $datetime2 = date_create($finCorto);
                      $interval = date_diff($datetime1, $datetime2);
                      $mins=$interval->format('%i'); //minutos hora dias  %i %h %d
                      $hours=$interval->format('%h'); //minutos hora dias  %i %h %d
                      $days=$interval->format('%d'); //minutos hora dias  %i %h %d

                      





                    ?>
                    <td class="px-4 py-3 text-sm">
                      
                     <div class=" text-sm">
                        <div class=" wrap">

                     
                        
                        <div>
                          <div class="flex items-center justify-between pr-2 gap-4 w-full">
                          <p class=" text-gray-600    font-semibold"><?=$year.'-'.$monthString.'-'.$day;?></p>
                          <p class=" text-blue-600   text-base	 font-semibold"><?=$exactTime;?></p>
                          </div>


                          <?php
                          if($days=='0' && $hours!='0' &&  $mins!='0'){
                            echo '<p class="text-xs text-gray-600 ">Duración: '.$hours.'h. y '.$mins.'min.</p>';

                          };
                          if($days=='0' && $hours=='0'  &&  $mins!='0'){
                            echo '<p class="text-xs text-gray-600 ">Duración: '.$mins.'min.</p>';

                          };
                          if($days!='0' ){
                            echo '<p class="text-xs text-gray-600 ">Duración: '.$days.'dias, '.$hours.'h. y '.$mins.'min.</p>';


                          }
                          if($days=='0' && $hours!='0' &&  $mins=='0'){
                            echo '<p class="text-xs text-gray-600 ">Duración: '.$hours.'h</p>';


                          }
                          ?>
                        </div>
                        </div>
                       
                        
                      </div>
                    
                    
                    
                    </td>
                    <td class="px-4 py-3 text-sm"><?=$fetch_evento['descripcion'] ;?></td>

                    <?php
                      if($fetch_evento['estado']=="Por confirmar"){
                          echo '<td class="  px-4 py-3 text-xs"><span class="px-2 py-1  leading-tight text-gray-800 bg-gray-100 rounded-full  ">'.$fetch_evento["estado"].'</span></td>';
                      };
                      if($fetch_evento['estado']=="Confirmado"){
                          echo '<td class="  px-4 py-3 text-xs"><span class="px-2 py-1  leading-tight text-green-800 bg-green-200 rounded-full  ">'.$fetch_evento["estado"].'</span></td>';
                      };
                      if($fetch_evento['estado']=="Cancelado"){
                          echo '<td class="  px-4 py-3 text-xs"><span class="px-2 py-1  leading-tight text-red-800 bg-red-200 rounded-full  ">'.$fetch_evento["estado"].'</span></td>';
                      };
                      
                      ?>
                    <td class="px-4 py-3 text-sm">
                      
                  <button id="dropdownMenuIconHorizontalButton<?=$fetch_evento['id'];?>" data-dropdown-toggle="dropdownDotsHorizontal<?=$fetch_evento['id'];?>" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none  focus:ring-gray-50   " type="button"> 
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                  </button>

                  


                  <!--FORM POSTERGAR CITA MODAL-->

                  
                    <div id="postergar-modal<?=$fetch_evento['id'];?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow ">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="postergar-modal<?=$fetch_evento['id'];?>">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-center text-xl font-medium text-gray-900 ">Postergar Cita</h3>
                                  <form class="space-y-6" action="" method="post" >
                                    <input hidden name="idEvento" type="text" value="<?=$fetch_evento['id'];?>" >

                                    



                                        <!--PHP SCRIPT DATE FORMT YYYY-MM-DD to YYYY/MM/DD-->
                                        <?php

                                          $explodedInicioDate=explode("-", $inicioCorto);
                                          $implodedInicioDate=$explodedInicioDate[0].'/'.$explodedInicioDate[1].'/'.$explodedInicioDate[2];
                                          
                                          $explodedIFinDate=explode("-", $finCorto);
                                          $implodedFinDate=$explodedIFinDate[0].'/'.$explodedIFinDate[1].'/'.$explodedIFinDate[2]

                                        ?>

                                        <div>
                                            <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Paciente</label>
                                            <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " > <?=$fetch_evento['nombreEvento'];?> </p>
                                        </div>
                                      <label for="" style="margin-bottom:-1rem" class="block  text-sm font-medium text-gray-900 ">Fecha</label> 

                                      <div date-rangepicker datepicker-buttons class="flex items-center">
                                        <div class="relative">
                                          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                          </div>
                                          <input required  name="fechaInicioPostergar" value="<?=$implodedInicioDate;?> " type="text" class=" flex wrap bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5       " placeholder="Fecha inicio">
                                        </div>
                                        <span class="mx-4 text-gray-500"> a </span>
                                        <div class="relative">
                                          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                          </div>
                                          <input required  name="fechaFinPostergar" type="text" value="<?=$implodedFinDate;?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5       " placeholder="Fecha fin">
                                      </div>
                                      </div>
                                      <div class="grid grid-cols-2 gap-2">
                                        <div>
                                        <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Hora inicio</label>
                                        <input name="horaInicioPostergar" value="<?=$exactTime;?>" required pattern="[0-9]{2}:[0-9]{2}" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " />
                                      
                                        </div>
                                        <div>
                                        <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Hora fin</label>
                                          <input name="horaFinPostergar" value="<?=$exactTimeEnd;?>" required pattern="[0-9]{2}:[0-9]{2}" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " /> 
                                      
                                        </div>
                                            
                                      </div>
                                  
                                       
                                                        
                                    
                                        <button type="submit" name="submitPostergarEvento"class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Postergar</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                  <!--FIN MODAL-->

                   <!--FORM INFORMAR PACIENTE MODAL-->

                  
                   <div id="informarPaciente-modal<?=$fetch_evento['id'];?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow ">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="informarPaciente-modal<?=$fetch_evento['id'];?>">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-center text-xl font-medium text-gray-900 ">Informar Paciente</h3>
                                  <form class="space-y-6" action="" method="post" >



                                       

                                        <div>
                                            <label for="nombrePaciente" class="block mb-2 text-sm font-medium text-gray-900 ">Paciente</label>
                                            <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " > <?=$fetch_evento['nombreEvento'];?> </p>
                                        </div>

                                      
                                     
                                          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Tu mensaje</label>
                                          <textarea id="linkWhatsappMessage<?=$fetch_evento['nombreEvento'].$fetch_evento['id'];?>" value=""  onkeyup="createUrl('result<?=$fetch_evento['nombreEvento'].$fetch_evento['id'];?>','linkWhatsappMessage<?=$fetch_evento['nombreEvento'].$fetch_evento['id'];?>','<?=$fetch_evento['nombreEvento'];?>' )"  rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500      " >Hola <?=$fetch_evento['nombreEvento'];?>, tu cita ha sido programada para <?=$year.'-'.$monthString.'-'.$day;?> a las <?=$exactTime;?> Horas. Para confirmar, postergar(Horarios disponibles) o cancelar tu cita ingresa al siguiente enlace con tu dni: <?=$clientURL;?>. Tu contraseña es:<?=$fetcH_;?> </textarea>
                                          
                                          <!--OBTENER EL TELEFONO DE PACIENTE-->
                                          <?php
                                          $select_telefono = $conn->prepare("SELECT * FROM `pacientes` WHERE id = ? ");
                                          $select_telefono->execute([$fetch_evento['idPaciente']]);   
                                          $fetch_telefono=$select_telefono->fetch(PDO::FETCH_ASSOC);
                                          $telefonoPaciente=$fetch_telefono['telefonoPaciente'];

                                          
                                          
                                          ?>
                                          <label class="relative inline-flex items-center cursor-pointer">
                                            <input   name="yesno"  id="allowSend<?=$fetch_evento['nombreEvento'].$fetch_evento['id'];?>" value="" type="checkbox"  class=" sendclass sr-only peer" onclick="send('allowSend<?=$fetch_evento['nombreEvento'].$fetch_evento['id'];?>','result<?=$fetch_evento['nombreEvento'].$fetch_evento['id'];?>','<?=$telefonoPaciente;?>','linkWhatsappMessage<?=$fetch_evento['nombreEvento'].$fetch_evento['id'];?>','<?=$fetch_evento['nombreEvento'];?>')" >
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-900 ">Listo</span>                                        
                                          </label>
                                          
                                            <a target="_blank" type="submit" style="visibility:hidden" id="result<?=$fetch_evento['nombreEvento'].$fetch_evento['id'];?>" class="  w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Enviar</a>
                                           
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                  <!--FIN MODAL-->



                  <!-- Dropdown menu -->
                  <div id="dropdownDotsHorizontal<?=$fetch_evento['id'];?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44  ">
                      <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownMenuIconHorizontalButton<?=$fetch_evento['id'];?>">
                        <li>
                          <button  data-modal-target="informarPaciente-modal<?=$fetch_evento['id'];?>" data-modal-toggle="informarPaciente-modal<?=$fetch_evento['id'];?>" class="flex items-center gap-4 w-full px-2 py-2 hover:bg-gray-100  ">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                          </svg>
                            <p>Informar paciente </p>
                            

                          </button>

                        </li>
                        <li>




                        <button   data-modal-target="postergar-modal<?=$fetch_evento['id'];?>" data-modal-toggle="postergar-modal<?=$fetch_evento['id'];?>"  class="flex items-center gap-4 w-full px-2 py-2 hover:bg-gray-100  ">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>                            <p>Postergar Cita</p>
                            

                        </button>   

                        

                        
                        
                        

                           </li>
                        
                        
                        
                      </ul>
                      <div class="py-1">
                      <form action="" method="post">
                      <input hidden name="idEvento" type="text" value="<?=$fetch_evento['id'];?>" >

                        <button  name="submitCancelarCita" type="submit" class=" w-full flex gap-4 items-center justify-start block px-2 py-2 bg-red-500 text-white hover:bg-gray-100   width-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>    
                        <p>Cancelar Cita</p>                     
                        </button> 
                      </form>




                      </div>
                  </div>

                           

        

                      </td>
                  </tr>