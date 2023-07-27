function CadValid() {
    const user = document.getElementById("user-input").value;
    const password = document.getElementById("password-input").value;
    const confpass = document.getElementById("confpass-input").value;

    if (user.trim() === "" || password.trim() === "" || confpass.trim() === "") {
        alert("Preencha todos os campos para efetuar o cadastro!");
        return false;
    }

    if (confpass !== password) {
        alert("As senhas estão diferentes!");
        return false;
    }

    return true;
}