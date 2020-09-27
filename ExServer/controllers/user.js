const express = require('express');

var userlist = require.main.require("./models/user");
const router = express.Router();

router.get('/:id', function (req, res) {

    console.log("I am here" + req.params.id);
    userlist.getResult('', (result) => {
        console.log(result);
        return res.json(result);

    });

    console.log('here');

});



module.exports = router;