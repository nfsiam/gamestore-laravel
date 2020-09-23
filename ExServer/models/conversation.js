var db = require('./db');

module.exports = {
    insertMSG: (message, callback) => {
        console.log('stime', message.stime);
        const sql = "Insert into conversations(convid,sender,receiver,msg,attachment,stime) values(?,?,?,?,?,?)";
        db.execute(sql, [message.convid, message.sender, message.receiver, message.msg, message.attachment, message.stime], function (status) {
            if (!status) {
                callback(false);
            } else {
                callback(true);
            }
        });
    }
}