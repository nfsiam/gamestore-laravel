global.msgQueue = [];
const express = require('express');
const http = require('http');
const path = require('path');
const cors = require('cors');
const bodyParser = require('body-parser');

const chat = require('./controllers/chat');
var user = require('./controllers/user');
var home = require('./controllers/home');


require('dotenv').config({ path: path.resolve(__dirname, '../.env') });


const app = express();
app.use(bodyParser());

const server = http.createServer(app);

//socket chat server
require('./server')(server, process.env.JWT_SECRET_KEY);

app.use('/api/chat', chat);
app.use('/user', user);
app.use('/home', home);

server.listen(3000, () => {
    console.log('Server running at 3000');
});