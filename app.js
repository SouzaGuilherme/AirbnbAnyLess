const express = require('express');

// [Rotas]
const router = express.Router();

// [Rotas] [Home Page]
router.get('/', (request, response)=>{
    response.send('Hello World!');
});

// [Configurações]
const app = express();
app.use('/', router);



module.exports = app;