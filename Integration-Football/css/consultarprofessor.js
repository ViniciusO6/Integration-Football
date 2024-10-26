function AbrirJustificativa(element) {
  const arquivoDiv = document.getElementById("card-justificativa");
  const Aprov = document.getElementById("aprovado");
  const Reprov = document.getElementById("reprovado");

  arquivoDiv.classList.toggle("aberto");
  Aprov.classList.toggle("clicado");
  Reprov.classList.toggle("clicado");
  element.classList.toggle("ativo");
}
