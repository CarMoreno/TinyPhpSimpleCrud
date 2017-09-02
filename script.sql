-- Table: libros

-- DROP TABLE libros;

CREATE TABLE libros
(
  codigo integer NOT NULL,
  nombre character varying(20) NOT NULL,
  descripcion character varying(30),
  CONSTRAINT libros_pkey PRIMARY KEY (codigo)
)