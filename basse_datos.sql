--
-- PostgreSQL database dump
--

-- Dumped from database version 11.8
-- Dumped by pg_dump version 11.8

-- Started on 2021-02-10 18:31:25

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE "prueba_caravela";
--
-- TOC entry 2871 (class 1262 OID 16553)
-- Name: prueba_caravela; Type: DATABASE; Schema: -; Owner: -
--

CREATE DATABASE "prueba_caravela" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Colombia.1252' LC_CTYPE = 'Spanish_Colombia.1252';


\connect "prueba_caravela"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 6 (class 2615 OID 16554)
-- Name: sys; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA "sys";


SET default_with_oids = false;

--
-- TOC entry 198 (class 1259 OID 16557)
-- Name: clientes; Type: TABLE; Schema: sys; Owner: -
--

CREATE TABLE "sys"."clientes" (
    "id" integer NOT NULL,
    "id_fiscal" integer,
    "id_empresa" integer,
    "correo" character varying(255),
    "telefono" character varying(50),
    "direccion" character varying(255),
    "contacto" character varying(100),
    "telefono_contacto" character varying(50),
    "email_contacto" character varying(255),
    "id_pais" integer,
    "activo" integer DEFAULT 1,
    "fecha_creacion" timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "fecha_inactivo" timestamp without time zone,
    "password" character varying(100)
);


--
-- TOC entry 197 (class 1259 OID 16555)
-- Name: clientes_id_seq; Type: SEQUENCE; Schema: sys; Owner: -
--

CREATE SEQUENCE "sys"."clientes_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2872 (class 0 OID 0)
-- Dependencies: 197
-- Name: clientes_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: -
--

ALTER SEQUENCE "sys"."clientes_id_seq" OWNED BY "sys"."clientes"."id";


--
-- TOC entry 201 (class 1259 OID 16573)
-- Name: empresa; Type: TABLE; Schema: sys; Owner: -
--

CREATE TABLE "sys"."empresa" (
    "id" integer NOT NULL,
    "nombre" character varying(100),
    "id_estatus" integer DEFAULT 1
);


--
-- TOC entry 202 (class 1259 OID 16576)
-- Name: empresa_id_seq; Type: SEQUENCE; Schema: sys; Owner: -
--

CREATE SEQUENCE "sys"."empresa_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2873 (class 0 OID 0)
-- Dependencies: 202
-- Name: empresa_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: -
--

ALTER SEQUENCE "sys"."empresa_id_seq" OWNED BY "sys"."empresa"."id";


--
-- TOC entry 200 (class 1259 OID 16569)
-- Name: facturas; Type: TABLE; Schema: sys; Owner: -
--

CREATE TABLE "sys"."facturas" (
    "id" integer NOT NULL,
    "id_fiscal" integer,
    "fecha_factura" "date",
    "valor_factura" character varying(100),
    "id_moneda" integer,
    "id_estado" integer,
    "id_pais_factura" integer
);


--
-- TOC entry 199 (class 1259 OID 16567)
-- Name: facturas_id_seq; Type: SEQUENCE; Schema: sys; Owner: -
--

CREATE SEQUENCE "sys"."facturas_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2874 (class 0 OID 0)
-- Dependencies: 199
-- Name: facturas_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: -
--

ALTER SEQUENCE "sys"."facturas_id_seq" OWNED BY "sys"."facturas"."id";


--
-- TOC entry 206 (class 1259 OID 16594)
-- Name: moneda; Type: TABLE; Schema: sys; Owner: -
--

CREATE TABLE "sys"."moneda" (
    "id" integer NOT NULL,
    "nombre" character varying(100),
    "id_estatus" integer DEFAULT 1
);


--
-- TOC entry 205 (class 1259 OID 16592)
-- Name: moneda_id_seq; Type: SEQUENCE; Schema: sys; Owner: -
--

CREATE SEQUENCE "sys"."moneda_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2875 (class 0 OID 0)
-- Dependencies: 205
-- Name: moneda_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: -
--

ALTER SEQUENCE "sys"."moneda_id_seq" OWNED BY "sys"."moneda"."id";


--
-- TOC entry 204 (class 1259 OID 16585)
-- Name: pais; Type: TABLE; Schema: sys; Owner: -
--

CREATE TABLE "sys"."pais" (
    "id" integer NOT NULL,
    "nombre" character varying(100),
    "id_estatus" integer DEFAULT 1
);


--
-- TOC entry 203 (class 1259 OID 16583)
-- Name: pais_id_seq; Type: SEQUENCE; Schema: sys; Owner: -
--

CREATE SEQUENCE "sys"."pais_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2876 (class 0 OID 0)
-- Dependencies: 203
-- Name: pais_id_seq; Type: SEQUENCE OWNED BY; Schema: sys; Owner: -
--

ALTER SEQUENCE "sys"."pais_id_seq" OWNED BY "sys"."pais"."id";


--
-- TOC entry 2711 (class 2604 OID 16560)
-- Name: clientes id; Type: DEFAULT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."clientes" ALTER COLUMN "id" SET DEFAULT "nextval"('"sys"."clientes_id_seq"'::"regclass");


--
-- TOC entry 2715 (class 2604 OID 16578)
-- Name: empresa id; Type: DEFAULT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."empresa" ALTER COLUMN "id" SET DEFAULT "nextval"('"sys"."empresa_id_seq"'::"regclass");


--
-- TOC entry 2714 (class 2604 OID 16572)
-- Name: facturas id; Type: DEFAULT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."facturas" ALTER COLUMN "id" SET DEFAULT "nextval"('"sys"."facturas_id_seq"'::"regclass");


--
-- TOC entry 2719 (class 2604 OID 16597)
-- Name: moneda id; Type: DEFAULT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."moneda" ALTER COLUMN "id" SET DEFAULT "nextval"('"sys"."moneda_id_seq"'::"regclass");


--
-- TOC entry 2717 (class 2604 OID 16588)
-- Name: pais id; Type: DEFAULT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."pais" ALTER COLUMN "id" SET DEFAULT "nextval"('"sys"."pais_id_seq"'::"regclass");


--
-- TOC entry 2857 (class 0 OID 16557)
-- Dependencies: 198
-- Data for Name: clientes; Type: TABLE DATA; Schema: sys; Owner: -
--

INSERT INTO "sys"."clientes" ("id", "id_fiscal", "id_empresa", "correo", "telefono", "direccion", "contacto", "telefono_contacto", "email_contacto", "id_pais", "activo", "fecha_creacion", "fecha_inactivo", "password") VALUES (1, 23424, 5, 'keymerj@gmail.com', '3143664570', 'bogota', 'asdfasdf', '3143664570', 'q@q.com', 1, 1, '2021-02-10 10:51:54.111668', NULL, '72ee45722c503553c513caefe05e6b9d');
INSERT INTO "sys"."clientes" ("id", "id_fiscal", "id_empresa", "correo", "telefono", "direccion", "contacto", "telefono_contacto", "email_contacto", "id_pais", "activo", "fecha_creacion", "fecha_inactivo", "password") VALUES (3, 342432423, 1, 'q@q.com', '3143664570', 'bogota', 'asdfasdf', '3143664570', 'q@q.com', 1, 0, '2021-02-10 11:33:25.271297', NULL, '72ee45722c503553c513caefe05e6b9d');
INSERT INTO "sys"."clientes" ("id", "id_fiscal", "id_empresa", "correo", "telefono", "direccion", "contacto", "telefono_contacto", "email_contacto", "id_pais", "activo", "fecha_creacion", "fecha_inactivo", "password") VALUES (5, 342432423, 1, 'q@q.comm', '3143664570', 'bogota', 'asdfasdf', '3143664570', 'q@q.com', 1, 0, '2021-02-10 11:34:25.179661', NULL, '72ee45722c503553c513caefe05e6b9d');
INSERT INTO "sys"."clientes" ("id", "id_fiscal", "id_empresa", "correo", "telefono", "direccion", "contacto", "telefono_contacto", "email_contacto", "id_pais", "activo", "fecha_creacion", "fecha_inactivo", "password") VALUES (6, 342432423, 1, 'q@q.commm', '3143664570', 'bogota', 'asdfasdf', '3143664570', 'q@q.com', 1, 0, '2021-02-10 11:34:38.275127', NULL, 'de2ea5936385d6c8b2f6f93639e871c6');
INSERT INTO "sys"."clientes" ("id", "id_fiscal", "id_empresa", "correo", "telefono", "direccion", "contacto", "telefono_contacto", "email_contacto", "id_pais", "activo", "fecha_creacion", "fecha_inactivo", "password") VALUES (7, 342432423, 1, 'q@q.commmm', '3143664570', 'bogota', 'asdfasdf', '3143664570', 'q@q.com', 1, 0, '2021-02-10 11:34:51.899691', NULL, 'de2ea5936385d6c8b2f6f93639e871c6');
INSERT INTO "sys"."clientes" ("id", "id_fiscal", "id_empresa", "correo", "telefono", "direccion", "contacto", "telefono_contacto", "email_contacto", "id_pais", "activo", "fecha_creacion", "fecha_inactivo", "password") VALUES (8, 21212121, 18, 'paolaromero86@gmail.com', '555555', '#####', 'zzz', '00000000', 'q@q.com', 1, 1, '2021-02-10 15:34:38.20605', NULL, '72ee45722c503553c513caefe05e6b9d');


--
-- TOC entry 2860 (class 0 OID 16573)
-- Dependencies: 201
-- Data for Name: empresa; Type: TABLE DATA; Schema: sys; Owner: -
--

INSERT INTO "sys"."empresa" ("id", "nombre", "id_estatus") VALUES (1, 'asdfsdf', 1);
INSERT INTO "sys"."empresa" ("id", "nombre", "id_estatus") VALUES (5, 'asdfsdfasdasfs', 1);
INSERT INTO "sys"."empresa" ("id", "nombre", "id_estatus") VALUES (18, 'Empresa prueba', 1);


--
-- TOC entry 2859 (class 0 OID 16569)
-- Dependencies: 200
-- Data for Name: facturas; Type: TABLE DATA; Schema: sys; Owner: -
--

INSERT INTO "sys"."facturas" ("id", "id_fiscal", "fecha_factura", "valor_factura", "id_moneda", "id_estado", "id_pais_factura") VALUES (2, 23424, '2021-10-02', '10500.25', 1, 1, 1);
INSERT INTO "sys"."facturas" ("id", "id_fiscal", "fecha_factura", "valor_factura", "id_moneda", "id_estado", "id_pais_factura") VALUES (1, 23424, '2021-02-10', '10500.25', 1, 1, 1);
INSERT INTO "sys"."facturas" ("id", "id_fiscal", "fecha_factura", "valor_factura", "id_moneda", "id_estado", "id_pais_factura") VALUES (3, 23424, '2021-02-10', '550000', 2, 2, 2);
INSERT INTO "sys"."facturas" ("id", "id_fiscal", "fecha_factura", "valor_factura", "id_moneda", "id_estado", "id_pais_factura") VALUES (4, 21212121, '2021-02-09', '335000', 1, 2, 1);


--
-- TOC entry 2865 (class 0 OID 16594)
-- Dependencies: 206
-- Data for Name: moneda; Type: TABLE DATA; Schema: sys; Owner: -
--

INSERT INTO "sys"."moneda" ("id", "nombre", "id_estatus") VALUES (1, 'COP', 1);
INSERT INTO "sys"."moneda" ("id", "nombre", "id_estatus") VALUES (2, 'USD', 1);


--
-- TOC entry 2863 (class 0 OID 16585)
-- Dependencies: 204
-- Data for Name: pais; Type: TABLE DATA; Schema: sys; Owner: -
--

INSERT INTO "sys"."pais" ("id", "nombre", "id_estatus") VALUES (1, 'Colombia', 1);
INSERT INTO "sys"."pais" ("id", "nombre", "id_estatus") VALUES (2, 'EEUU', 1);


--
-- TOC entry 2877 (class 0 OID 0)
-- Dependencies: 197
-- Name: clientes_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: -
--

SELECT pg_catalog.setval('"sys"."clientes_id_seq"', 8, true);


--
-- TOC entry 2878 (class 0 OID 0)
-- Dependencies: 202
-- Name: empresa_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: -
--

SELECT pg_catalog.setval('"sys"."empresa_id_seq"', 18, true);


--
-- TOC entry 2879 (class 0 OID 0)
-- Dependencies: 199
-- Name: facturas_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: -
--

SELECT pg_catalog.setval('"sys"."facturas_id_seq"', 4, true);


--
-- TOC entry 2880 (class 0 OID 0)
-- Dependencies: 205
-- Name: moneda_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: -
--

SELECT pg_catalog.setval('"sys"."moneda_id_seq"', 2, true);


--
-- TOC entry 2881 (class 0 OID 0)
-- Dependencies: 203
-- Name: pais_id_seq; Type: SEQUENCE SET; Schema: sys; Owner: -
--

SELECT pg_catalog.setval('"sys"."pais_id_seq"', 2, true);


--
-- TOC entry 2722 (class 2606 OID 16608)
-- Name: clientes clientes_correo_key; Type: CONSTRAINT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."clientes"
    ADD CONSTRAINT "clientes_correo_key" UNIQUE ("correo");


--
-- TOC entry 2724 (class 2606 OID 16566)
-- Name: clientes clientes_pkey; Type: CONSTRAINT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."clientes"
    ADD CONSTRAINT "clientes_pkey" PRIMARY KEY ("id");


--
-- TOC entry 2728 (class 2606 OID 16606)
-- Name: empresa empresa_nombre_key; Type: CONSTRAINT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."empresa"
    ADD CONSTRAINT "empresa_nombre_key" UNIQUE ("nombre");


--
-- TOC entry 2730 (class 2606 OID 16602)
-- Name: empresa empresa_pkey; Type: CONSTRAINT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."empresa"
    ADD CONSTRAINT "empresa_pkey" PRIMARY KEY ("id");


--
-- TOC entry 2726 (class 2606 OID 16604)
-- Name: facturas facturas_pkey; Type: CONSTRAINT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."facturas"
    ADD CONSTRAINT "facturas_pkey" PRIMARY KEY ("id");


--
-- TOC entry 2734 (class 2606 OID 16600)
-- Name: moneda moneda_pkey; Type: CONSTRAINT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."moneda"
    ADD CONSTRAINT "moneda_pkey" PRIMARY KEY ("id");


--
-- TOC entry 2732 (class 2606 OID 16591)
-- Name: pais pais_pkey; Type: CONSTRAINT; Schema: sys; Owner: -
--

ALTER TABLE ONLY "sys"."pais"
    ADD CONSTRAINT "pais_pkey" PRIMARY KEY ("id");


-- Completed on 2021-02-10 18:31:25

--
-- PostgreSQL database dump complete
--

