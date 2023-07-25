// Evento de clique ao botão "Adicionar Item" para abrir o modal
document.getElementById("btn-adicionar-item").addEventListener("click", function () {
    document.getElementById("add-item-modal").style.display = "block";
});

// Evento de clique ao botão de fechar (X) do modal para fechá-lo
document.getElementsByClassName("close")[0].addEventListener("click", function () {
    document.getElementById("add-item-modal").style.display = "none";
});

// Evento de clique à janela para fechar o modal quando clicar fora dele
window.addEventListener("click", function (event) {
    const modal = document.getElementById("add-item-modal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
