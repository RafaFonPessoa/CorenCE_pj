document.getElementById("btn-adicionar-item").addEventListener("click", function () {
    document.getElementById("add-item-modal").style.display = "block";
});

document.getElementsByClassName("close")[0].addEventListener("click", function () {
    document.getElementById("add-item-modal").style.display = "none";
});

document.getElementById("btn-adicionar").addEventListener("click", function () {
    const nome = document.getElementById("item-nome").value;
    const quantidade = document.getElementById("item-quantidade").value;

    if (nome.trim() === "" || quantidade.trim() === "") {
        alert("Preencha todos os campos para adicionar o item!");
        return;
    }

    // Submeter o formulário para adicionar o item
    const form = document.createElement("form");
    form.action = "../php/cad_itens.php";
    form.method = "post";

    const inputNome = document.createElement("input");
    inputNome.type = "hidden";
    inputNome.name = "nome";
    inputNome.value = nome;
    form.appendChild(inputNome);

    const inputQuantidade = document.createElement("input");
    inputQuantidade.type = "hidden";
    inputQuantidade.name = "quantidade";
    inputQuantidade.value = quantidade;
    form.appendChild(inputQuantidade);

    document.body.appendChild(form);
    form.submit();
});
