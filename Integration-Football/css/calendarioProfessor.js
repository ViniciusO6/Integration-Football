const currentDate = document.querySelector("#mes-ano"),
  daysTag = document.querySelector("#dias"),
  prevNextIcon = document.querySelectorAll("#btns img");

let date = new Date();
currYear = date.getFullYear();
currMonth = date.getMonth();
currMonthNumber = date.getMonth() + 1;

const months = [
  "Janeiro",
  "Fevereiro",
  "Março",
  "Abril",
  "Maio",
  "Junho",
  "Julho",
  "Agosto",
  "Setembro",
  "Outubro",
  "Novembro",
  "Dezembro",
];

const renderCalendar = () => {
  let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
  let diaTag = "";

  for (let i = firstDayofMonth; i > 0; i--) {
    diaTag += `<div id="dia"><p class="inactive">${
      lastDateofLastMonth - i + 1
    }</p></div>`;
  }

  for (let i = 1; i <= lastDateofMonth; i++) {
    let isToday =
      i === date.getDate() &&
      currMonth === new Date().getMonth() &&
      currYear === new Date().getFullYear()
        ? "active"
        : "";

    diaTag += `<div class="${isToday} dia${currYear}-${
      currMonth + 1
    }-${i} tooltip evento${currYear}-${
      currMonth + 1
    }-${i}" "onmouseover="showTooltip(event)" onmouseout="hideTooltip(event)" id="dia"><p>${i}  <span id="texto-evento${currYear}-${
      currMonth + 1
    }-${i}" class="tooltip-text">Atividade Pratica!</span>  </p></div>`;
  }

  for (let i = lastDayofMonth; i < 6; i++) {
    diaTag += `<div id="dia"><p class="inactive">${
      i - lastDayofMonth + 1
    }</p></div>`;
  }

  currentDate.innerText = `${months[currMonth]} ${currYear}`;
  daysTag.innerHTML = diaTag;
};
renderCalendar(); //anotação: passar por parametro os dias de atividade para adicionar como #id, e de alguma forma indicar o dia correto

prevNextIcon.forEach((icon) => {
  icon.addEventListener("click", () => {
    console.log(icon);
    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
    if (currMonth > 11) {
      currMonth = 11;
    } else if (currMonth < 1) {
      currMonth = 0;
    }
    renderCalendar();
  });
});

function abrirPrevia(IDAtividade, IDCard) {
  const DivAtividade = document.querySelector("#" + IDAtividade);
  const DivCardArquivo = document.querySelector("#" + IDCard);

  DivAtividade.classList.toggle("atividade-aberto");
  DivCardArquivo.classList.toggle("aberto");
}

// Código do Input
document.getElementById("input-arquivo").addEventListener("click", function () {
  document.getElementById("files").click();
});

document.getElementById("files").addEventListener("change", function () {
  var file = document.getElementById("files").files[0];

  if (file) {
    document.getElementById("file-text").innerHTML = file.name;
  } else {
    document.getElementById("fileName").textContent = "";
  }
});
