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
// Inicializa o campo file-text com o texto padrão
document.getElementById("file-text").value = "";

// Abrir seletor de arquivos ao clicar no botão "Escolher arquivo"
document.getElementById("input-arquivo").addEventListener("click", function () {
  document.getElementById("files").click();
});

// Atualiza o campo de texto e exibe o botão "Cancelar" após selecionar um arquivo
document.getElementById("files").addEventListener("change", function () {
  var file = document.getElementById("files").files[0];
  var fileText = document.getElementById("file-text");
  var cancelarBtn = document.getElementById("cancelar");

  if (file) {
    fileText.value = file.name; // Exibe o nome do arquivo
    fileText.style.width = "80%"; // Reduz a largura do campo para 80%
    cancelarBtn.style.display = "block"; // Exibe o botão "Cancelar"
  }
});

// Limpa o campo de texto e oculta o botão "Cancelar" ao clicar no botão "Cancelar"
document.getElementById("cancelar").addEventListener("click", function () {
  var fileText = document.getElementById("file-text");
  var cancelarBtn = document.getElementById("cancelar");

  document.getElementById("files").value = ""; // Limpa o campo de arquivo
  fileText.value = ""; // Limpa o campo de texto
  fileText.style.width = "100%"; // Redefine a largura para 100%
  cancelarBtn.style.display = "none"; // Oculta o botão "Cancelar"
});

document.addEventListener("DOMContentLoaded", function () {
  const dataEntregaInput = document.getElementById("data_entrega");

  // Define as datas mínima e máxima
  const hoje = new Date();
  const anoAtual = hoje.getFullYear();
  const mes = String(hoje.getMonth() + 1).padStart(2, "0");
  const dia = String(hoje.getDate()).padStart(2, "0");

  // Ajuste do intervalo mínimo e máximo para hoje e o final do ano
  const dataMin = `${anoAtual}-${mes}-${dia}`; // dataMin no formato yyyy-mm-dd
  const dataMax = `${anoAtual}-12-31`; // dataMax no formato yyyy-mm-dd

  // Aplica os valores de limite no campo de data
  dataEntregaInput.min = dataMin;
  dataEntregaInput.max = dataMax;

  // Função para formatar a data de forma legível (para exibição)
  const formatarData = (data) => {
    const [ano, mes, dia] = data.split("-");
    return `${dia}/${mes}/${ano}`; // Formato "dd/mm/aaaa"
  };

  // Adiciona o evento de verificação para quando o campo perde o foco
  dataEntregaInput.addEventListener("blur", function () {
    const dataSelecionada = this.value; // Obtém o valor como string no formato yyyy-mm-dd

    // Compara as datas diretamente como strings (sem horas, minutos ou segundos)
    if (dataSelecionada < dataMin || dataSelecionada > dataMax) {
      this.value = ""; // Limpa o campo
      alert(
        `Selecione uma data entre hoje (${formatarData(
          dataMin
        )}) e o final do ano (${formatarData(dataMax)}).`
      );
    }
  });
});

function ficaInvisivel() {
  const telaDeletar = document.getElementById("tela-deletar");
  const sombra = document.getElementById("sombra");
  const sair = document.getElementById("Sair");

  telaDeletar.classList.toggle("invisivel");
  sombra.classList.toggle("invisivel");

  // // Bloqueia a rolagem ao mostrar o modal de exclusão
  // if (!telaDeletar.classList.contains("invisivel")) {
  //   document.body.style.overflow = "hidden";
  // } else {
  //   // Libera a rolagem ao esconder o modal de exclusão
  //   document.body.style.overflow = "auto";
  // }
}

function deletar(element) {
  ficaInvisivel();
  const idAtividade = document.getElementById("id");
  const valorCard = element.children[1].value;
  let id = valorCard;
  idAtividade.value = id;
  console.log(valorCard);
}
