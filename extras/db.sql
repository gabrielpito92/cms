USE specialvetcosmet_bd_desenv;

DROP TABLE IF EXISTS usuarios, produtos, imagens_produtos, categorias, categorias_produto, volumes, volumes_produto, distribuidores, prepostos, distribuidores_alternativo, estados, cidades, bairros_cidades, cidades_distribuidores;

CREATE TABLE usuarios (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL,
    ativo VARCHAR(1) NOT NULL,
    tipo_login VARCHAR(1) NOT NULL
);

CREATE TABLE produtos (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    produto VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    ativo VARCHAR(1) NOT NULL
);

CREATE TABLE imagens_podutos (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    id_produto INT(6) NOT NULL,
    imagem VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_produto) REFERENCES produtos(id),
    CONSTRAINT cons_img_produto UNIQUE (id_produto, imagem)
);

CREATE TABLE categorias (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    categoria VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL
);

CREATE TABLE categorias_produtos (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    id_categoria INT(6) NOT NULL,
    id_produto INT(6) NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id),
    FOREIGN KEY (id_produto) REFERENCES produtos(id),
    CONSTRAINT cons_cat_produto UNIQUE (id_categoria, id_produto)
);

CREATE TABLE volumes (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    volume VARCHAR(100) NOT NULL
);

CREATE TABLE volumes_produto (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    id_volume INT(6) NOT NULL,
    id_produto INT(6) NOT NULL,
    a_vista FLOAT NOT NULL,
    a_prazo FLOAT NOT NULL,
    FOREIGN KEY (id_volume) REFERENCES volumes(id),
    FOREIGN KEY (id_produto) REFERENCES produtos(id),
    CONSTRAINT cons_vol_produto UNIQUE (id_volume, id_produto)
);

CREATE TABLE distribuidores (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    codigo INT(6) NOT NULL,
    referencia INT(6) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(14) NOT NULL,
    tipo_pessoa VARCHAR(14) NOT NULL,
    empresa VARCHAR(100),
    cnpj VARCHAR(18),
    cpf VARCHAR(15) NOT NULL,
    ativo VARCHAR(1) NOT NULL
);

CREATE TABLE prepostos (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    id_distribuidor INT(6) NOT NULL,
    codigo INT(6) NOT NULL,
    referencia INT(6) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(14) NOT NULL,
    tipo_pessoa VARCHAR(14) NOT NULL,
    empresa VARCHAR(100),
    cnpj VARCHAR(18),
    cpf VARCHAR(15) NOT NULL,
    ativo VARCHAR(1) NOT NULL,
    FOREIGN KEY (id_distribuidor) REFERENCES distribuidores(id)
);

CREATE TABLE distribuidores_alternativo (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    id_distribuidor INT(6) NOT NULL,    
    codigo INT(6) NOT NULL,
    referencia INT(6) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(14) NOT NULL,
    tipo_pessoa VARCHAR(14) NOT NULL,
    empresa VARCHAR(100),
    cnpj VARCHAR(18),
    cpf VARCHAR(15) NOT NULL,
    ativo VARCHAR(1) NOT NULL,
    FOREIGN KEY (id_distribuidor) REFERENCES distribuidores(id)
);

CREATE TABLE estados (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    uf VARCHAR(2) NOT NULL
);

CREATE TABLE cidades (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    id_estado INT(6) NOT NULL,
    qtd_petshop INT(6) NOT NULL,
    FOREIGN KEY (id_estado) REFERENCES estados(id)
);

CREATE TABLE bairros_cidades (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    id_cidade INT(6) NOT NULL,
    nome_bairro VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_cidade) REFERENCES cidades(id)
);

CREATE TABLE cidades_distribuidores (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    id_distribuidor INT(6) NOT NULL,
    id_cidade INT(6) NOT NULL,
    id_bairro INT(6) NOT NULL,
    FOREIGN KEY (id_distribuidor) REFERENCES distribuidores(id),
    FOREIGN KEY (id_cidade) REFERENCES cidades(id),
    FOREIGN KEY (id_bairro) REFERENCES bairros_cidades(id)
);


-- Essa senha criptografada corresponde ao valor "a"
INSERT INTO usuarios (id, nome, senha, email, ativo, tipo_login)
VALUES (1, 'Pedro Gabriel Pito Lopes', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'gabrielpito92@gmail.com', '1', '1');