const express = require ('express');
const path = require('path');
const morgan = require('morgan');
const mysql = require('mysql');
const myConnection = require('express-myconnection');


const app = express();


// import
const recebementoRoute = require('./routes/recebemento.js')
const armazenRoute = require('./routes/armazen.js')
// settings


app.set('port', process.env.PORT || 3000);
app.set('view engine', 'ejs');
app.set('views',path.join(__dirname, 'views'));

//middlewares
app.use(morgan('dev'));
app.use(myConnection(mysql, {
	host: 'localhost',
	user: 'root',
	password: '',
	port: 3306,
	database: 'compras_ex'
}, 'single'))

app.use(express.urlencoded({extended: false}));

//routers

app.use('/', recebementoRoute);
app.use('/', armazenRoute);

//static files
app.use(express.static(path.join(__dirname, 'assets')));
// staring the server

app.listen(app.get('port'), () => {
	console.log('server on por 3000');
});