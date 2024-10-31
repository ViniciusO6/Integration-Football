// Função para permitir apenas um checkbox selecionado
function selectOnlyThis(checkbox, name) {
  // Obtém todos os checkboxes com o mesmo nome
  const checkboxes = document.getElementsByName(name);

  // Desmarca todas as opções
  checkboxes.forEach((item) => {
    if (item !== checkbox) item.checked = false;
  });
}
