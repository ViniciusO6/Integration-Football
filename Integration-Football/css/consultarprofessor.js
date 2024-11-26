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
