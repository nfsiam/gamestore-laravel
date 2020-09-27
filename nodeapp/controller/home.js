const express = require('express');

var giftapproval =  require.main.require("./models/giftapproval");
const router = express.Router();

router.get('/:username', function (req, res){

    console.log("I am here");
    giftapproval.getResult(req.params.username,(result)=>{
           console.log(result);
           return  res.json(result);
           
    });

    console.log('here');

});



module.exports = router;