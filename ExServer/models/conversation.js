var db = require('./db');

module.exports = {
    insertMSG: (message, callback) => {
        const sql = "Insert into conversations(convid,sender,receiver,msg,attachment,stime) values(?,?,?,?,?,UNIX_TIMESTAMP())";
        db.execute(sql, [message.convid, message.sender, message.receiver, message.msg, message.attachment], function (status) {
            if (!status) {
                callback(false);
            } else {
                callback(true);
            }
        });
    }
}