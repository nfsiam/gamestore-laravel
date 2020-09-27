const express = require('express');
const router = express.Router();
var path = require('path');
const jwt = require('jsonwebtoken');
require('dotenv').config({ path: path.resolve(__dirname, '../../.env') });


router.post('/chat_token', function (req, res) {
    console.log(req.body.username);
    console.log(req.body.convid);

    const ctoken = jwt.sign({
        sender: req.body.sender,
        receiver: req.body.receiver,
        convid: req.body.convid
    }, process.env.JWT_SECRET_KEY);

    res.json({
        ctoken: ctoken
    });
});

module.exports = router;