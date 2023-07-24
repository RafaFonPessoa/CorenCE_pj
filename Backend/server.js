// backend/server.js
const express = require('express');
const mongoose = require('mongoose');
const cors = require('cors'); 
const db = require('./DB/conn')
const bcrypt = require('bcrypt')

//models
const User = require('./Models/User')
const Item = require('./Models/Item')

const app = express();
const PORT = 5500;

// Middleware para interpretar o corpo das requisições como JSON
app.use(express.json());

// Middleware para habilitar o CORS
app.use(cors()); // Adicione esta linha

// Rota para criar um novo usuário
app.post('/api/signup', async (req, res) => {
    const { username, password } = req.body;

    try {
        // Verifica se o usuário já existe no banco de dados
        const existingUser = await User.findOne({ username });

        if (existingUser) {
            return res.status(409).json({ message: 'Usuário já existe. Por favor, cadastre outro usuário.' });
        }

        // Cria uma nova instância do modelo User com os dados do usuário
        const newUser = new User({ username, password });

        // Salva o novo usuário no banco de dados
        await newUser.save();

        res.status(201).json({ message: 'Usuário cadastrado com sucesso!' });
    } catch (error) {
        res.status(500).json({ message: 'Erro ao cadastrar o usuário.' });
    }
});

// Rota para fazer login
app.post('/api/login', async (req, res) => {
    const { username, password } = req.body;

    try {
        // Verifica se o usuário existe no banco de dados
        const user = await User.findOne({ username });

        if (!user) {
            return res.status(404).json({ message: 'Usuário não encontrado.' });
        }

        // Compara a senha fornecida com a senha armazenada no banco de dados usando o bcrypt
        const match = await bcrypt.compare(password, user.password);

        if (!match) {
            return res.status(401).json({ message: 'Senha incorreta.' });
        }

        res.status(200).json({ message: 'Login bem-sucedido!' });
    } catch (error) {
        res.status(500).json({ message: 'Erro ao fazer login.' });
    }
});

app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});
