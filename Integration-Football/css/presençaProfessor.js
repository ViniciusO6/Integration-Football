// Função para permitir apenas um checkbox selecionado
function selectOnlyThis(checkbox, name) {
  // Obtém todos os checkboxes com o mesmo nome
  const checkboxes = document.getElementsByName(name);

  // Desmarca todas as opções
  checkboxes.forEach((item) => {
    if (item !== checkbox) item.checked = false;
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const dataEntregaInput = document.getElementById("input-data");

  // Define as datas mínima e máxima
  const hoje = new Date();
  const anoAtual = hoje.getFullYear();
  const mes = String(hoje.getMonth() + 1).padStart(2, "0");
  const dia = String(hoje.getDate()).padStart(2, "0");

  // Ajuste do intervalo mínimo e máximo para hoje e o final do ano
  const dataMin = `${anoAtual}-${mes}-${dia}`; // dataMin no formato yyyy-mm-dd
  const dataMax = `${anoAtual}-12-31`; // dataMax no formato yyyy-mm-dd

  dataEntregaInput.value = dataMin;

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

function validarChamada() {
  const linhas = document.querySelectorAll(".nomes-alunos");
  let valido = true;
  console.log("validar");

  linhas.forEach((linha, index) => {
    const checkboxes = linha.querySelectorAll('input[type="checkbox"]');
    const algumMarcado = Array.from(checkboxes).some(
      (checkbox) => checkbox.checked
    );

    if (!algumMarcado) {
      valido = false;
    }
  });

  if (!valido) {
    console.log("Erro");
    document.getElementById("erro-chamada").style.opacity = "1";
    return false;
  } else {
    return true;
  }
}
