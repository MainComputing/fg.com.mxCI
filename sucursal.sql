ALTER TABLE sucursal ADD COLUMN foto VARCHAR( 100 ) AFTER num_emp;

CREATE OR REPLACE VIEW sucursal_v AS (
SELECT s.id, s.nombre_suc, s.num_emp, s.foto,d.id id_dir, d.calle, d.num_ext, d.num_int, d.cp, d.colonia, m.nombre municipio, e.nombre estado
FROM sucursal s, direccion d, municipio m, estado e
WHERE s.direccion_id = d.id
AND m.id = d.municipio_id
AND e.id = m.id_estado
GROUP BY s.id
)