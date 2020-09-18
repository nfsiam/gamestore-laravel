global.msgQueue = [];
const express = require('express');
const http = require('http');
const cors = require('cors');
const bodyParser = require('body-parser');


const app = express();
app.use(bodyParser());

const server = http.createServer(app);

//socket chat server
require('./server')(server);

app.get('/login/:un', function (req, res) {
    req.session.username = req.params.un;
    res.send('success');
});


server.listen(3000, () => {
    console.log('Server running at 3000');
});