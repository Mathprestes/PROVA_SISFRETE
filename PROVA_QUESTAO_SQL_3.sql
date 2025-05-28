/*

Eu otimizaria consultas usando mais o metodo de relacionamento de joins, tornando a consulta mais rapida, 
eliminando tabelas que não estão sendo usadas ou com algum relacionamento confuso que torne a consulta mais demorada,
verificar os filtros se estão de acordo, para que nao trave o processamento da consulta

*/

--Consulta que tras o total de pedidos de cada cliente e a receita de cada um deles, estou ordenando por nome do cliente, pelo numero do pedido e pelo valor da receita em ordem decrescente, e filtros para garantir que o cliente esta ativo e de que a situacao do pedido esteja como N, e o filtro do periodo
SELECT 
	cli.cod_cliente,
	cli.nome_cliente,
	cli.num_cpf_cnpj,
	COUNT(ped.num_pedido) qtd_pedido,
	SUM(pedit.qtd_pecas_solic) AS qtd_item,
	SUM(pedit.pre_unit) AS receita
FROM tb_clientes cli
INNER JOIN tb_pedidos ped ON (ped.cod_cliente = cli.cod_cliente)
INNER JOIN tb_ped_itens pedit ON (pedit.num_pedido = ped.num_pedido)
WHERE 
	cli.ativo = 'S'
	AND ped.sit_pedido = 'A'
	AND ped.data_pedido BETWEEN '2024-01-01' AND '2025-05-28'
GROUP BY 1,2,3
ORDER BY 2,5,6 DESC;


--Essa consulta que eu montei traz todas as vendas de cada cliente cadastrado no banco de dados, está ordenado por nome do cliente, por condição de pagamento para sabermos a quantidade de vendas para cada condição, e também pela descrição do item, ai vamos ter a quantidade vendida e valor total
SELECT 
	cli.cod_cliente,
	cli.nome_cliente,
	cli.num_cpf_cnpj,
	ped.num_pedido,
    pag.tipo_pgto,
	pag.den_cnd_pgto,
	pedit.cod_item,
	item.den_item,
	item.tip_item,
	item.cod_uni_med,
	SUM(pedit.qtd_pecas_solic) AS qtd_item,
	SUM(pedit.pre_unit) AS val_tot_item
FROM tb_clientes cli
INNER JOIN tb_pedidos ped ON (ped.cod_cliente = cli.cod_cliente)
INNER JOIN tb_pagamentos pag ON (pag.cod_cond_pgto = ped.cod_cond_pgto AND pag.situacao = 'ATIVO')
INNER JOIN tb_ped_itens pedit ON (pedit.num_pedido = ped.num_pedido)
INNER JOIN tb_itens item ON (item.cod_item = pedit.cod_item)
WHERE 
	cli.ativo = 'S'
	AND ped.sit_pedido = 'A'  
	AND item.ativo = 'S'
	AND ped.data_pedido BETWEEN '2024-01-01' AND '2025-05-28'
GROUP BY 1,2,3,4,5,6,7,8,9
ORDER BY 2,5,7
	

--Tabela de vendas por categoria, ornado pelo nome da categoria e pela descrição do item
SELECT 
	ctg.grupo, 
	ctg.sub_grupo,
	pedit.cod_item,
	item.den_item,
	item.den_item_reduz,
	item.tip_item,
	item.cod_uni_med,
	SUM(pedit.qtd_pecas_solic) AS qtd_item,
	SUM(pedit.pre_unit) AS val_tot_item
FROM tb_pedidos ped
INNER JOIN tb_ped_itens pedit ON (pedit.num_pedido = ped.num_pedido)
INNER JOIN tb_itens item ON (item.cod_item = pedit.cod_item)
INNER JOIN tb_item_categoria itemctg ON (itemctg.cod_item = item.cod_item)
INNER JOIN tb_categoria ctg ON (ctg.num_categoria = itemctg.num_categoria)
WHERE 
	ped.sit_pedido = 'A'  
	AND item.ativo = 'S'
	AND ped.data_pedido BETWEEN '2024-01-01' AND '2025-05-28'
GROUP BY 1,2,3,4,5,6,7
ORDER BY 1,4