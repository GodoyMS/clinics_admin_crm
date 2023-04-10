document.addEventListener('DOMContentLoaded',runTime)

function changeName(){

        const HeadertoolBarHTMLCOLLECTION=document.getElementsByClassName('fc-header-toolbar');
        let HeadertoolBarArray = Array.from(HeadertoolBarHTMLCOLLECTION);
        HeadertoolBarArray.forEach(element => {

            element.style="flex-wrap:wrap;font-size:10px;justify-content:center;column-gap:2rem;row-gap:1rem";


        }
            );

        

                                                                     //grid-template-columns: repeat(3, minmax(0, 1fr));

        const footertoolBarHTMLCOLLECTION=document.getElementsByClassName('fc-footer-toolbar');
        let footertoolBarArray = Array.from(footertoolBarHTMLCOLLECTION);

        footertoolBarArray.forEach(element => {

            element.style="flex-wrap:wrap;font-size:10px;justify-content:center;row-gap:0.5rem;column-gap:2rem";


        }
            );

 }
 function changeNameBig(){

    const HeadertoolBarHTMLCOLLECTION=document.getElementsByClassName('fc-header-toolbar');
    let HeadertoolBarArray = Array.from(HeadertoolBarHTMLCOLLECTION);
    HeadertoolBarArray.forEach(element => {
        element.style="flex-wrap:wrap;font-size:20px";  }   );
    

    const footertoolBarHTMLCOLLECTION=document.getElementsByClassName('fc-footer-toolbar');
        let footertoolBarArray = Array.from(footertoolBarHTMLCOLLECTION);

        footertoolBarArray.forEach(element => {
            element.style="flex-wrap:wrap;font-size:20px;justify-content:center;row-gap:0.5rem;column-gap:2rem";  }   );
}

function myFunction(x) {
    if (x.matches) { // If media query matches
        changeName()
    } else {
        changeNameBig();
    }
  }
  

  function runTime(){
    var x = window.matchMedia("(max-width: 600px)")
    myFunction(x) // Call listener function at run time
    x.addEventListener('change',myFunction)

  }

