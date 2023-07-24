const mongoose = require('mongoose');

const dbUrl = 'mongodb+srv://cpdcorence:cpdCE2023@cluster0.so1rcjf.mongodb.net/?retryWrites=true&w=majority';

// Conexão com o banco de dados MongoDB
mongoose
  .connect(dbUrl)
  .then(() => {
    console.log('Conexão estabelecida com o MongoDB');
  })
  .catch((err) => {
    console.error('Erro ao tentar se conectar com o MongoDB', err);
});

const db = mongoose.connection;

module.exports = db;
