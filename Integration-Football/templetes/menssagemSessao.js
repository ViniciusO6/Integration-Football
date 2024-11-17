document.addEventListener("DOMContentLoaded", () => {
    const toast = document.querySelector(".toast");
    const progress = document.querySelector(".progress");
    const closeIcon = document.querySelector(".close");
    let timer1, timer2;
  
    if (toast) {
        // Exibir o toast automaticamente e definir um timer para ocultá-lo
        timer1 = setTimeout(() => {
            toast.classList.remove("active");
        }, 5000); // Oculta o toast após 5 segundos
  
        timer2 = setTimeout(() => {
            progress.classList.remove("active");
        }, 5000);
    }
  
    // Fechar o toast manualmente ao clicar no ícone de fechar
    closeIcon.addEventListener("click", () => {
        toast.classList.remove("active");
  
        setTimeout(() => {
            progress.classList.remove("active");
        }, 300);
  
        clearTimeout(timer1);
        clearTimeout(timer2);
    });
  });