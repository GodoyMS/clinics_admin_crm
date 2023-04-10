

document.addEventListener("DOMContentLoaded", function(e) {
    changeNames();
    maintainAgendasNames();

 })
function changeNames(){
    const agendaWeek =  document.getElementsByClassName("fc-listWeek-button");
    let agendaWeekText = Array.from(agendaWeek)[0];
    let agendaWeekTextSecond = Array.from(agendaWeek)[1];

    agendaWeekText.textContent="Agenda sem";
    agendaWeekTextSecond.textContent="Agenda sem";



    const agendaDay =  document.getElementsByClassName("fc-listDay-button");
    let agendaDayText = Array.from(agendaDay)[0];
    let agendaDayTextSecond = Array.from(agendaDay)[1];
    agendaDayText.textContent="Agenda del día";

    agendaDayTextSecond.textContent="Agenda del día";


};

function maintainAgendasNames(){
    const body=document.querySelector('body');
    
    const buttonAgendaDAY=document.getElementsByClassName("fc-listDay-button");
    const buttonAgendaWeek=document.getElementsByClassName("fc-listWeek-button");
    const arry = Array.from(buttonAgendaWeek)[0];
    const arrySecond = Array.from(buttonAgendaWeek)[1];


    const arry1 = Array.from(buttonAgendaDAY)[0];
    const arry1Second = Array.from(buttonAgendaDAY)[1];

    body.addEventListener('click',()=>{
        arry.innerHTML="Agenda sem";
        arrySecond.innerHTML="Agenda sem";

        arry1.innerHTML="Agenda del dia"
        arry1Second.innerHTML="Agenda del día";
    })
}
