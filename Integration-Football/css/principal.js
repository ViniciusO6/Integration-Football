const currentDate = document.querySelector("#mes-ano"),
daysTag = document.querySelector("#dias"),
prevNextIcon = document.querySelectorAll("#btns img");


let date = new Date();
currYear = date.getFullYear();
currMonth = date.getMonth();

const months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); 
    let diaTag = "";
    
    for(let i = firstDayofMonth; i > 0; i--){
        diaTag += `<div id="dia"><p class="inactive">${lastDateofLastMonth -i +1}</p></div>`;      
    }
 
    for(let i = 1; i <= lastDateofMonth; i++){
        let isToday = i === date.getDate() && currMonth === new Date().getMonth()
                    && currYear === new Date().getFullYear() ? "active" : "";

        diaTag += `<div class="${isToday}" id="dia"><p>${i}</p></div>`;  
    }

    for(let i = lastDayofMonth; i < 6; i++){
        diaTag += `<div id="dia"><p class="inactive">${i -  lastDayofMonth +1}</p></div>`;       
    }


    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = diaTag;
}
renderCalendar()

prevNextIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        console.log(icon);
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
        renderCalendar();
    });
});