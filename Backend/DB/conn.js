//Conexão com o banco de dados SQL

const mysql = requier('mysql') 

const connection = mysql.createConnection({
    host: "127.0.0.1",
    user: "root",
    password: "root",
    database: "coren"
})

module.exports = connection