var http = require('http');
var express 	= require('express');
var app = express();
var home = require('./controller/home')
var server = http.createServer(app);

app.get('/', function(req, res){
	res.redirect("/home");
});


app.use('/home', home);

server.listen(3000, () => {
    console.log('Server running at 3000');

});