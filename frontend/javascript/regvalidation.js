function regvalidation() {
    const user = document.querySelector("input[name='user']").value.trim();
    const password = document.querySelector("input[name='password']").value.trim();
    const confpass = document.querySelector("input[name='confpass']").value.trim();

    if (user === "" || password === "" || confpass === "") {
        alert("Por favor, preencha todos os campos!");
        return false;
    }

    if (confpass !== password) {
        alert("As senhas estão diferentes! Tente novamente!");
        return false;
    }

    return true;
}
