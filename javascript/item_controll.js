const incrementButtons = document.querySelectorAll(".btn-increment");

incrementButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        const itemID = button.dataset.itemId;
        const increment = parseInt(button.dataset.increment);

        // Enviar solicitação AJAX para o arquivo upd_item_quant.php
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/upd_item_quant.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Recarregar a página para mostrar os valores atualizados
                    location.reload();
                } else {
                    // Exibe uma notificação de erro caso haja problema na comunicação com o servidor
                    showNotification("Erro ao comunicar com o servidor.");
                }
            }
        };
        xhr.send("item_id=" + itemID + "&increment=" + increment);
    });
});

const removeButtons = document.querySelectorAll(".btn-remove");

removeButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        const itemID = button.dataset.itemId;

        // Enviar solicitação AJAX para o arquivo remove_item.php
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/remove_item.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Remoção bem-sucedida, recarrega a página para atualizar a lista de itens
                    location.reload();
                } else {
                    // Exibe uma notificação de erro
                    showNotification("Erro ao remover o item.");
                }
            }
        };
        xhr.send("item_id=" + itemID);
    });
});

const searchInput = document.getElementById("search-bar");

searchInput.addEventListener("input", () => {
    const searchTerm = searchInput.value.trim().toLowerCase();

    // Enviar solicitação AJAX para o arquivo search_items.php
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/search_items.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Atualizar a lista de itens com os resultados filtrados
                document.querySelector(".item-list").innerHTML = xhr.responseText;
            } else {
                // Exibe uma notificação de erro caso haja problema na comunicação com o servidor
                showNotification("Erro ao comunicar com o servidor.");
            }
        }
    };
    xhr.send("search_term=" + searchTerm);
});

// Função para exibir uma notificação na parte superior da página
function showNotification(message) {
    const notification = document.createElement("div");
    notification.classList.add("notification");
    notification.textContent = message;
    document.body.appendChild(notification);

    // Remover a notificação após alguns segundos
    setTimeout(() => {
        notification.remove();
    }, 3000);
}



