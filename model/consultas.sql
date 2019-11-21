--total adquirido do produto --
select sum(quantidade) from tmaterial WHERE nomematerial = "aluminio"
--media aprox de costo unitario -- 
SELECT
   nomematerial,
   SUM(precocompra) AS precocompra,
   SUM(quantidade)        AS quantidade,
   AVG(precovenda) AS media
FROM
   tmaterial WHERE nomematerial ="aluminio"
--exibicion de compra unitaria --
SELECT * FROM tmaterial WHERE nomematerial ="aluminio"