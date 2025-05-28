PROVA SISFRETE

Tabelas: Clientes, Pedidos, Produtos, Categorias de Produtos e Pagamentos

Relacionamentos N entre produtos e categorias.
Relacionamentos 1 entre clientes e pedidos, e entre pedidos e produtos.

-----------------------------------------------------------------------

--Criei dois indices para tornar a busca do codigo do cliente e do numero do pedido mais rapida no banco de dados como vamos ter um grande volume de pedidos e de clientes seria interessante adicionar isso, para impedir que o banco de dados olhe linha por linha até achar o cod_cliente/num_pedido
CREATE INDEX idx_cod_cliente ON tb_clientes(cod_cliente);
CREATE INDEX idx_num_pedido ON tb_pedidos(num_pedido);
CREATE INDEX idx_cod_item ON tb_itens(cod_item);


--Tabela de clientes, tendo como chave primaria o codigo de cada cliente (o campo é auto incremento) e em seguida as informações de cada cliente e um ultimo campo para verificar se o cliente está ativo ou não
CREATE TABLE tb_clientes (
	
	cod_cliente SERIAL PRIMARY KEY,
	nome_cliente CHAR (50),
	num_cpf_cnpj CHAR (19),
	ins_estadual CHAR (16),
	end_cliente CHAR(40),
	den_bairro CHAR(19),
	cod_cep CHAR(9),
	cidade CHAR(15),
	telefone CHAR (15),
	data_cadastro DATE,
	ativo CHAR (1)

);

--Tabela de pagamentos, tendo como chave primaria a condição de pagamento, podendo ser (BOLETO, CARTÃO, PIX, DEBITO)
CREATE TABLE tb_pagamentos (

	cod_cond_pgto INTEGER (3) PRIMARY KEY,
	tipo_pgto CHAR(5),
	den_cnd_pgto CHAR(50),
	situacao CHAR(5)

);


--Tabela de cabeçalho do pedido, tendo como chave primaria o num_pedido, e tendo duas chaves estrangeiras, que conecta com a tabela de clientes/pagamentos para encontrar o campo de cod_cliente/cod_cond_pgto
CREATE TABLE tb_pedidos (

	num_pedido INTEGER (5) PRIMARY KEY,
	cod_cliente INTEGER (5),
	data_pedido DATE,
	cod_transp CHAR(15),
	cod_cond_pgto INTEGER (3),
	tip_venda INTEGER (2)
	sit_pedido CHAR(1),
	FOREIGN KEY (cod_cliente) REFERENCES clientes(cod_cliente),
    FOREIGN KEY (cod_cond_pgto) REFERENCES pagamentos(cod_cond_pgto)

);


--Tabela de itens do pedido, tendo como chave primaria o numero de pedido e a sequencia, e com duas chaves estrangeiras relacionando com as tabelas de pedidos/itens para encontrar os campos de num_pedido/cod_item
CREATE TABLE tb_ped_itens (

	num_pedido INTEGER (5),
	num_sequencia INTEGER (5),
	cod_item INTEGER (5),
	pct_desc_adic DECIMAL(4,2),
	pre_unit DECIMAL(17,6),
	qtd_pecas_solic INTEGER(10),
	PRIMARY KEY (num_pedido, num_sequencia),
    FOREIGN KEY (num_pedido) REFERENCES pedidos(num_pedido),
    FOREIGN KEY (cod_item) REFERENCES itens(cod_item)

);


--Tabela onde contem informações sobre os itens
CREATE TABLE tb_itens (

	cod_item INTEGER (5) PRIMARY KEY,
	den_item CHAR(150),
	den_item_reduz CHAR(20),
	tip_item CHAR(1),
	cod_uni_med CHAR(3),
	ativo CHAR(1)

);


--Tabela de categoria de itens
CREATE TABLE tb_categoria (

	num_categoria INTEGER (1) PRIMARY KEY,
	grupo CHAR(50),
	sub_grupo CHAR(20),
	pre_unit_base DECIMAL(17,6)

);


--Tabela que faz o relacionamento entre item e categoria ( N : N ), tendo como chave estrangeira os campos cod_item/num_categoria nas tabelas de itens/categoria
CREATE TABLE tb_item_categoria (

    cod_item INTEGER(5),
    num_categoria INTEGER(1),
    PRIMARY KEY (cod_item, num_categoria),
    FOREIGN KEY (cod_item) REFERENCES itens(cod_item),
    FOREIGN KEY (num_categoria) REFERENCES categoria(num_categoria)

);