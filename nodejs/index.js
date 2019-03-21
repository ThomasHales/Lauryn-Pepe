const express = require('express');
const app = express();
const bookRoute = require('./routes/book');
const customerRoute = require('./routes/customer');
const bodyParser = require('body-parser');

require('dotenv').config({path: __dirname+'/.env'})

app.use(bodyParser.json())

app.use(function(req,res,next){
    console.log(`${new Date().toString()} => ${req.originalUrl}`)
    next()
});

//Book Route
app.use(customerRoute);
app.use(bookRoute);
app.use(express.static('public'));

//Handler for Error 404
app.use(function(req,res){
    res.status(404).send('Resourse not found');
});

//Handler for Error 500
app.use(function(err,req,res){
    console.err(err.stack);
    res.status(500).send('Internal Server Error')
});

//PORT
//This way port will change based on the environment variables set on the
//machine running it
const port = process.env.PORT || 3000;
console.log(process.env.PORT)
app.listen(port, function(){
    console.log(`Listening on port ${port}...`);
});