--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.19
-- Dumped by pg_dump version 9.4.19
-- Started on 2018-08-21 20:41:23

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2036 (class 1262 OID 16393)
-- Name: impostos_produtos; Type: DATABASE; Schema: -; Owner: -
--

CREATE DATABASE impostos_produtos WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';


\connect impostos_produtos

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2038 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 176 (class 1259 OID 16404)
-- Name: produto; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE public.produto (
    id integer NOT NULL,
    nome character varying(255),
    preco numeric(7,2),
    tipo_id integer
);


--
-- TOC entry 175 (class 1259 OID 16402)
-- Name: produto_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.produto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2039 (class 0 OID 0)
-- Dependencies: 175
-- Name: produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.produto_id_seq OWNED BY public.produto.id;


--
-- TOC entry 180 (class 1259 OID 16425)
-- Name: produtos_venda; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE public.produtos_venda (
    id integer NOT NULL,
    venda_id integer,
    produto_id integer,
    quantidade integer,
    valor_produto numeric(10,2),
    valor_imposto numeric(8,2)
);


--
-- TOC entry 179 (class 1259 OID 16423)
-- Name: produtos_venda_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.produtos_venda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2040 (class 0 OID 0)
-- Dependencies: 179
-- Name: produtos_venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.produtos_venda_id_seq OWNED BY public.produtos_venda.id;


--
-- TOC entry 174 (class 1259 OID 16396)
-- Name: tipo; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE public.tipo (
    id integer NOT NULL,
    nome character varying(120),
    percentualimposto numeric(5,3)
);


--
-- TOC entry 173 (class 1259 OID 16394)
-- Name: tipo_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.tipo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2041 (class 0 OID 0)
-- Dependencies: 173
-- Name: tipo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.tipo_id_seq OWNED BY public.tipo.id;


--
-- TOC entry 178 (class 1259 OID 16417)
-- Name: venda; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE public.venda (
    id integer NOT NULL,
    hora_venda timestamp without time zone,
    valor_total numeric(10,2),
    valor_imposto numeric(8,2)
);


--
-- TOC entry 177 (class 1259 OID 16415)
-- Name: venda_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.venda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2042 (class 0 OID 0)
-- Dependencies: 177
-- Name: venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.venda_id_seq OWNED BY public.venda.id;


--
-- TOC entry 1900 (class 2604 OID 16407)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produto ALTER COLUMN id SET DEFAULT nextval('public.produto_id_seq'::regclass);


--
-- TOC entry 1902 (class 2604 OID 16428)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produtos_venda ALTER COLUMN id SET DEFAULT nextval('public.produtos_venda_id_seq'::regclass);


--
-- TOC entry 1899 (class 2604 OID 16399)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tipo ALTER COLUMN id SET DEFAULT nextval('public.tipo_id_seq'::regclass);


--
-- TOC entry 1901 (class 2604 OID 16420)
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.venda ALTER COLUMN id SET DEFAULT nextval('public.venda_id_seq'::regclass);


--
-- TOC entry 2026 (class 0 OID 16404)
-- Dependencies: 176
-- Data for Name: produto; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.produto (id, nome, preco, tipo_id) FROM stdin;
2	Maça	3.12	2
3	Cerveja	3.27	5
4	Banana	4.58	2
5	Sabão em pó	8.90	3
6	Massa	1.34	2
\.


--
-- TOC entry 2043 (class 0 OID 0)
-- Dependencies: 175
-- Name: produto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.produto_id_seq', 6, true);


--
-- TOC entry 2030 (class 0 OID 16425)
-- Dependencies: 180
-- Data for Name: produtos_venda; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.produtos_venda (id, venda_id, produto_id, quantidade, valor_produto, valor_imposto) FROM stdin;
5	3	3	1	3.27	1.13
6	3	3	1	3.27	1.13
7	3	5	1	8.90	1.99
8	3	4	1	4.58	0.46
\.


--
-- TOC entry 2044 (class 0 OID 0)
-- Dependencies: 179
-- Name: produtos_venda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.produtos_venda_id_seq', 8, true);


--
-- TOC entry 2024 (class 0 OID 16396)
-- Dependencies: 174
-- Data for Name: tipo; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tipo (id, nome, percentualimposto) FROM stdin;
2	Alimentação	10.000
5	Bebidas Alcoolicas	34.500
3	Produtos de Limpeza 2	22.400
\.


--
-- TOC entry 2045 (class 0 OID 0)
-- Dependencies: 173
-- Name: tipo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tipo_id_seq', 6, true);


--
-- TOC entry 2028 (class 0 OID 16417)
-- Dependencies: 178
-- Data for Name: venda; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.venda (id, hora_venda, valor_total, valor_imposto) FROM stdin;
3	2018-08-21 20:35:02.942	20.02	4.71
\.


--
-- TOC entry 2046 (class 0 OID 0)
-- Dependencies: 177
-- Name: venda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.venda_id_seq', 3, true);


--
-- TOC entry 1906 (class 2606 OID 16409)
-- Name: produto_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_pkey PRIMARY KEY (id);


--
-- TOC entry 1910 (class 2606 OID 16430)
-- Name: produtos_venda_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY public.produtos_venda
    ADD CONSTRAINT produtos_venda_pkey PRIMARY KEY (id);


--
-- TOC entry 1904 (class 2606 OID 16401)
-- Name: tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY public.tipo
    ADD CONSTRAINT tipo_pkey PRIMARY KEY (id);


--
-- TOC entry 1908 (class 2606 OID 16422)
-- Name: venda_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY public.venda
    ADD CONSTRAINT venda_pkey PRIMARY KEY (id);


--
-- TOC entry 1911 (class 2606 OID 16410)
-- Name: produto_tipo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_tipo_id_fkey FOREIGN KEY (tipo_id) REFERENCES public.tipo(id);


--
-- TOC entry 1912 (class 2606 OID 16436)
-- Name: produtos_venda_produto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produtos_venda
    ADD CONSTRAINT produtos_venda_produto_id_fkey FOREIGN KEY (produto_id) REFERENCES public.produto(id);


--
-- TOC entry 1913 (class 2606 OID 16441)
-- Name: produtos_venda_venda_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produtos_venda
    ADD CONSTRAINT produtos_venda_venda_id_fkey FOREIGN KEY (venda_id) REFERENCES public.venda(id) ON DELETE CASCADE;


-- Completed on 2018-08-21 20:41:25

--
-- PostgreSQL database dump complete
--

