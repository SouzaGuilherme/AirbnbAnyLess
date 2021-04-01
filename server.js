const app = require('./app');

require('dotenv').config({path: '.env'});

app.set('port', process.env.PORT || 7777);
const server = app.listen(app.get('port'), ()=>{
    console.log("Servidor rodando na porta: " + server.address().port);
});

