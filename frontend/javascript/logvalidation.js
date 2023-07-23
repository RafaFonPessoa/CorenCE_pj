function logvalidation() {
    const user = document.querySelector("input[name='user']").value
    const password = document.querySelector("input[name='password']").value

    if(user.trim() === "" || password.trim() === ""){
        alert("Por favor, preencha todos os campos!")
        return false //Impede o envio do formulário ao PHP
    }

    return true 
}