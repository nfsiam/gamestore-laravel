const socketio = require('socket.io');
const moment = require('moment');

module.exports = (server) => {
    const io = socketio(server);
    io.on('connection', (socket) => {

        socket.emit('prevMsg', global.msgQueue);

        socket.on('msgEvent', (msgObj) => {
            msgObj['time'] = moment().valueOf();

            while (global.msgQueue.length > 9) {
                global.msgQueue.shift();
            }
            global.msgQueue.push(msgObj);
            io.emit('message', msgObj);
        });
    });
};