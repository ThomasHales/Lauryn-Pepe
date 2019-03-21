//bookRouter
const Joi = require('joi');
const express = require('express');
const router = express.Router();

router.use(express.json());


//Sample database
const books = [
    {id: 1, name: "Hamlet",},
    {id: 2, name: "Grimgar",},
    {id: 3, name: "NGNL",}
];


//GET

router.get('/api/books', function(req, res){
    //replace this with info from database later
    res.send(books);
});

router.get('/api/books/:id', function(req,res){
    const book = books.find(c => c.id === parseInt(req.params.id));
    if(!book){
        res.status(404).send('The book with the given ID was not found');
        return;
    } 
    res.send(book);

});


//POST

//Sample post request of adding a book
router.post('/api/books', function(req, res){
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
router.put('/api/books/:id', function(req,res){

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
router.delete('/api/books/:id', function(req, res){
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

//Functions

//This function checks that the book is a valid entry
// (Name is a String and >3 chars)
function validateBook(book){
    const schema = {
        name: Joi.string().min(3).required()
    };
    return Joi.validate(book, schema);
}


module.exports = router