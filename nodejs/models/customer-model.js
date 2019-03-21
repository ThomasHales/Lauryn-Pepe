require('dotenv').config({path: __dirname+'../.env'})
const mongoose = require('mongoose');
const Joi = require('joi');
const joigoose = require('joigoose')(mongoose, {convert: false});

const server = process.env.DB_SERVER;
const database = process.env.DB_NAME;
const user = process.env.DB_USER;
const pass = process.env.DB_PASS;

//mongoose.connect(`mongodb://${user}:${pass}@${server}/${database}`, {useNewUrlParser: true});
mongoose.connect(`mongodb+srv://${user}:${pass}@lauryn-pepe-za439.mongodb.net/test?retryWrites=true`,{useNewUrlParser: true})


const joiCustomerSchema = new Joi.object({
    name: Joi.string(),
    email: Joi.string().email().required()
});

const CustomerSchema = new mongoose.Schema(joigoose.convert(joiCustomerSchema));

module.exports = mongoose.model('Customer', CustomerSchema);