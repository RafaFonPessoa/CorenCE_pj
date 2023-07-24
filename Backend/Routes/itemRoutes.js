const express = require('express');
const router = express.Router();
const Item = require('../Models/Item');

// Rota para criar um novo item
router.post('/item', async (req, res) => {
  const { itemName, itemQuantity } = req.body;

  try {
    // Cria uma nova instância do modelo Item com os dados do item
    const newItem = new Item({ itemName, itemQuantity });

    // Salva o novo item no banco de dados
    await newItem.save();

    res.status(201).json({ message: 'Item criado com sucesso!' });
  } catch (error) {
    res.status(500).json({ message: 'Erro ao criar o item.' });
  }
});

// Rota para obter todos os itens
router.get('/items', async (req, res) => {
  try {
    // Busca todos os itens no banco de dados
    const items = await Item.find();

    res.status(200).json(items);
  } catch (error) {
    res.status(500).json({ message: 'Erro ao obter os itens.' });
  }
});

module.exports = router;
