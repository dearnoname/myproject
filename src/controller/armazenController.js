const controller = {};



controller.list = (req, res) => {
	req.getConnection((err, conn) => {
		conn.query('SELECT a.idmaterial, a.nomematerial ,a.precovenda, a.precocompra, a.quantidade , a.dataadquirido , b.nomefornecedor FROM tmaterial AS a INNER JOIN tfornecedor AS b WHERE a.idfornecedor = b.idfornecedor AND estatus = 1 ', (err, materiales) =>{
			if (err)
			 {
				res.json(err);
			}

			res.render('armazen', 
			{
				data: materiales
				
			});
		});
	});
};





module.exports = controller;