<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
    $number='51913464041';
      
    echo $url;  
?>   

  <input   id="linkWhatsappMessage" value="This is a template message" type="text" onkeyup="createUrl()">


  <!--TOGGLE-->
  <input name="yesno" id="allowSend" type="checkbox" value="" class="sr-only peer" onclick="allowSend(value)">


 
 



<a target="_blank" style="visibility:hidden" class="result" >this is a link </a>

<script>

function allowSend(){
    const editText= document.querySelector('#linkWhatsappMessage');
    if (document.getElementById('allowSend').checked) {
        document.querySelector('.result').style.visibility='visible';
        document.querySelector('#linkWhatsappMessage').disabled=false;
        const selectElement = document.querySelector('#linkWhatsappMessage');

        const plainText=createUrl()[0];
        const result=createUrl()[1];
        result.setAttribute('href',`https://api.whatsapp.com/send?phone=<?=$number;?>&text=${plainText}`);

    }else{
        document.querySelector('.result').style.visibility='hidden';
        document.querySelector('#linkWhatsappMessage').disabled=false;


    }

}

function createUrl(){  
        const selectElement = document.querySelector('#linkWhatsappMessage');
        const plainText= selectElement.value;
        const result = document.querySelector('.result')  ;  
        const array=[plainText,result];
        return array; 
        

}



</script>
    
</body>
</html>