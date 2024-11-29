function AbrirJustificativa(
  element,
  IDarquivoDiv,
  IDarquivoInterno,
  IDaprovado,
  IDreprovado
) {
  const arquivoDiv = document.querySelector("#" + IDarquivoDiv);
  const arquivoInterno = document.querySelector("#" + IDarquivoInterno);

  const Aprov = document.querySelector("#" + IDaprovado);
  const Reprov = document.querySelector("#" + IDreprovado);

  arquivoDiv.classList.toggle("fechado");
  arquivoInterno.classList.toggle("fechado");
  Aprov.classList.toggle("clicado");
  Reprov.classList.toggle("clicado");
  element.classList.toggle("ativo");
}

function Limpar() {
  const Modalidade = document.getElementById("select-modalidade");
  const Turma = document.getElementById("select-turma");

  Modalidade.selectedIndex = 0;
  Turma.selectedIndex = 0;
}
