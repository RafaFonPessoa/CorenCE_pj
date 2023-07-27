function LogValid() {
    const user = document.getElementById("user-input").value;
    const password = document.getElementById("password-input").value;

    if (user.trim() === "" || password.trim() === "") {
        alert("Preencha todos os campos para fazer Login!");
        return false;
    }
    
    return true;
}