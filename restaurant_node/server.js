var express = require('express');
var application = express();
var server = require('http').createServer(application);
var socketio = require('socket.io').listen(server);
var fs = require('fs');
server.listen(process.env.PORT || 3000);

application.get('/', function (request, reponse) {
	reponse.send('Hello World.');
});

socketio.sockets.on('connection', function (socket) {
	console.log('Someone just connected.');
	socket.on('send-processing-request', function (message) {
		console.log(message);
		socketio.sockets.emit('receive-processing-request', {});
	});

	socket.on('send-payment-request', function (message) {
		console.log(message);
		socketio.sockets.emit('receive-payment-request', {});
	});

	socket.on('notify-processing-complete', function (message) {
		console.log(message);
		socketio.sockets.emit('receive-processing-complete', {});
	});
});