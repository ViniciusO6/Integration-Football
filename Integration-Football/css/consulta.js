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
    fileText.style.width = "100%"; // Reduz a largura do campo para 80%
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
