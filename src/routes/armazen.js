const express = require('express');
const router = express.Router();



const armazenController = require ('../controller/armazenController')


router.get('/armazen', armazenController.list);



module.exports = router;