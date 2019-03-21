const CustomerModel = require('../models/customer-model');
const express = require('express');
const router = express.Router();

//creating a new customer
router.post('/api/customer',function(req,res){
    if(!req.body){
        return res.status(400).send('Body is missing')
    }
    const model = new Customer(req.body);
    model.save(function(err, result){
        if(!result){
            return res.status(500).send(err.message);
        }
        res.status(201).send(result);
    });
});

module.exports = router;