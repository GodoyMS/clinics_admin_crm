/*** 
const id=Array.prototype.slice.call(document.querySelectorAll(".sendclass"))
id.forEach(element => {
    console.log(element.value);
    function send(){

        if (document.getElementById(element.value).checked) {
            document.querySelector('.result').style.visibility='visible';
           document.querySelector('#linkWhatsappMessage').disabled=true;
           const selectElement = document.querySelector('#linkWhatsappMessage');
    
           const plainText=createUrl()[0];
           const result=createUrl()[1];
             result.setAttribute('href',`https://api.whatsapp.com/send?phone=<?=$number;?>&text=${plainText}`);
    
       }else{
           document.querySelector('.result').style.visibility='hidden';
           document.querySelector('#linkWhatsappMessage').disabled=false;
    
    
       }

    }
    
 
    
    
});
*/


function createUrl(a,b,c){   //resulteventoid- linkwhatsappmessageeventoid-nombreEvento
        
    const plainText= document.getElementById(b).value;
    const result = document.getElementById(a)  ;  
    const asd= c;
    const array=[plainText,result,c];
    console.log(asd);
    return array;                                                         

}

function send(x,y,z,z1,z2){ //alloweventoid- resulteventid - telefono - linkwhatsappeventoid --nombreevento
    //console.log(x);
    
    if (document.getElementById(x).checked) {

        document.getElementById(y).style.visibility='visible';
       document.getElementById(z1).disabled=true;

       const element= document.getElementById(z1).value;      

       const plainText1=createUrl(z1,x,z)[0];
       console.log(plainText1);
       const nombrePaciente=createUrl(z1,x,z2)[2]

       const result1=createUrl(y,x,z)[1];
       //console.log(result);
       result1.setAttribute('href',`https://api.whatsapp.com/send?phone=${z}&text=${element}`);

   }else{

        document.getElementById(y).style.visibility='hidden';

       document.getElementById(z1).disabled=false;
       document.getElementById(z1).getAttribute



   }

}




/*

function send(){
    const editText= document.querySelector('#linkWhatsappMessage');
 
const id=Array.prototype.slice.call(document.querySelectorAll(".sendclass"));

id.forEach(element => {
    console.log(element.value);
    
    if (document.getElementById(element.value).checked) {
        document.querySelector('.result').style.visibility='visible';
       document.querySelector('#linkWhatsappMessage').disabled=true;
       const selectElement = document.querySelector('#linkWhatsappMessage');

       const plainText=createUrl()[0];
       const result=createUrl()[1];
         result.setAttribute('href',`https://api.whatsapp.com/send?phone=<?=$number;?>&text=${plainText}`);

   }else{
       document.querySelector('.result').style.visibility='hidden';
       document.querySelector('#linkWhatsappMessage').disabled=false;


   }
    
    
});

}
*/
