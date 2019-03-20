const Joi = require('joi');
const express = require('express');
const app = express();

app.use(express.json());

//Sample database
const books = [
    {id: 1, name: "Hamlet",},
    {id: 2, name: "Grimgar",},
    {id: 3, name: "NGNL",}
];


//GET

//Sample get request at localhost:3000/
app.get('/', function(req, res){
    res.send('Hello World');
});

app.get('/api/books', function(req, res){
    //replace this with info from database later
    res.send(books);
});

app.get('/api/books/:id', function(req,res){
    const book = books.find(c => c.id === parseInt(req.params.id));
    if(!book){
        res.status(404).send('The book with the given ID was not found');
        return;
    } 
    res.send(book);

});


//POST

//Sample post request of adding a book
app.post('/api/books', function(req, res){
    //Validatiing input
    const schema = {
        name: Joi.string().min(3).required()
    };
    const result = validateBook(req.body);
    if(result.error){
        //400 Bad Request
        res.status(400).send(result.error.details[0].message);
        return;
    }
    
    const book = {
        id: books.length + 1,
        name: req.body.name
    };
    books.push(book);
    res.send(book);
});

//PUT
//Sample put method of changing a book
app.put('/api/books/:id', function(req,res){

    //check if book exists
    const book = books.find(c => c.id === parseInt(req.params.id));
    if(!book){
        res.status(404).send('The book with the given ID was not found');
        return;
    }

    //validate data
    const result = validateBook(req.body);
    if(result.error){
        //400 Bad Request
        res.status(400).send(result.error.details[0].message);
        return;
    }

    //Update Book
    book.name = req.body.name;
    res.send(book);

});

//DELETE
//Sample Delete request
app.delete('/api/books/:id', function(req, res){
    const book = books.find(c => c.id === parseInt(req.params.id));
    console.log(book);
    if(!book){
        res.status(404).send('The book with the given ID was not found');
        return;
    }
    //Delete
    const index = books.indexOf(book);
    books.splice(index, 1);

    res.send(book);
});


//PORT
//This way port will change based on the environment variables set on the
//machine running it
const port = process.env.PORT || 3000;
app.listen(port, function(){
    console.log(`Listening on port ${port}...`);
});

//Functions

//This function checks that the book is a valid entry
// (Name is a String and >3 chars)
function validateBook(book){
    const schema = {
        name: Joi.string().min(3).required()
    };
    return Joi.validate(book, schema);
}
