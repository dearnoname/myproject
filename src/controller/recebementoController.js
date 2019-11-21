const controller = {};



controller.list = (req, res) => {
	req.getConnection((err, conn) => {
		conn.query('SELECT a.idmaterial, a.nomematerial ,a.precovenda, a.precocompra, a.quantidade , a.dataadquirido , b.nomefornecedor FROM tmaterial AS a INNER JOIN tfornecedor AS b WHERE a.idfornecedor = b.idfornecedor AND estatus = 0 ', (err, materiales) =>{
			if (err)
			 {
				res.json(err);
			}

			res.render('recebemento', 
			{
				data: materiales
				
			});
		});
	});
};


controller.update = (req, res) => {
	const {idmaterial } = req.params;
	req.getConnection((err,conn) => 
	{


		conn.query('UPDATE tmaterial SET estatus = "1" WHERE idmaterial = ? ' ,  [ idmaterial ] , (err, rows) =>{
			
			res.redirect('/');
		});
	});

};




module.exports = controller;