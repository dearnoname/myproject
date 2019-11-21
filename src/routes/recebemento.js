const express = require('express');
const validator = require('express-validator')
const router = express.Router();



const recebementoController = require ('../controller/recebementoController')


router.get('/', recebementoController.list);
router.get('/update/:idmaterial', recebementoController.update);
module.exports = router;