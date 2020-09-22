const socketio = require('socket.io');
const socketioJwt = require('socketio-jwt');
const moment = require('moment');
const conversation = require('./models/conversation');

module.exports = (server, key) => {
    const io = socketio(server);
    io.use(socketioJwt.authorize({
        secret: key,
        handshake: true
    }));

    io.on('connection', (socket) => {
        console.log('Token: ', socket.decoded_token);

        socket.join(socket.decoded_token.convid);

        socket.on('msgEvent', (msgObj) => {
            msgObj['time'] = moment().valueOf();
            msgObj.id = socket.decoded_token.sender;

            const message = {
                convid: socket.decoded_token.convid,
                sender: socket.decoded_token.sender,
                receiver: socket.decoded_token.receiver,
                msg: msgObj.msg,
                attachment: null
            };

            conversation.insertMSG(message, (status) => {
                if (status) {
                    io.to(socket.decoded_token.convid).emit('message', msgObj);
                }
            });

        });
    });
};