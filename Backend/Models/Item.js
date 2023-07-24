const mongoose = require('mongoose');

const itemSchema = new mongoose.Schema({
  name: {
    type: String,
    required: true,
    unique: true,
  },
  quantity: {
    type: Number,
    required: true,
    default: 0,
  },
});

const Item = mongoose.model('Item', itemSchema);

module.exports = Item;