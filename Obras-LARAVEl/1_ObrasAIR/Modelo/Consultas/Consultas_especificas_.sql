use obrasair;

delimiter $$ 

create procedure a_usuario

begin
select 
    p_nombre_usuario,
    p_apellido_usuario,
    nombre_rol
from usuario
inner join usuario_has_rol 
on id_usuario = usuario_id_usuario
inner join rol
on rol_id_rol = id_rol;

select 
    nombre_empresa,
    p_nombre_usuario,
    p_apellido_usuario,
    cargo_empresa
from empresa 
inner join  representante_empresa 
on nit_empresa = empresa_nit_empresa
inner join usuario 
on usuario_id_usuario = id_usuario;

select
    nombre_oferta_laboral,
    salario_oferta_laboral,
    nombre_tipo_contrato
from oferta_laboral 
inner join tipo_contrato 
on tipo_contrato_id_tipo_contrato = id_tipo_contrato;

select
    nombre_oferta_laboral,
    tipo_via,
    numero_via,
    letra_via
from oferta_laboral
inner join direccion 
on direccion_id_direccion = id_direccion;

select 
    p_nombre_usuario,
    p_apellido_usuario,
    nombre_profesion
from aspirante
inner join usuario 
on usuario_id_usuario = id_usuario
inner join profesion
on profesion_id_profesion = id_profesion;

select 
	id_postulacion,
    nombre_oferta_laboral,
    fecha_registrada_postulacion
from postulacion 
inner join oferta_laboral
on oferta_laboral_id_oferta_laboral = id_oferta_laboral;

select * 
from direccion
where tipo_via like 'carrera%';

select
    nombre_oferta_laboral,
    salario_oferta_laboral
from oferta_laboral
where salario_oferta_laboral > 2000000;

select *
from usuario
where estado_usuario = 1;

select
    nombre_tipo_contrato,
    COUNT(*) AS total_ofertas
from oferta_laboral
inner join tipo_contrato 
on tipo_contrato_id_tipo_contrato = id_tipo_contrato
group by nombre_tipo_contrato;

SELECT
    nombre_oferta_laboral,
    salario_oferta_laboral,
    nombre_tipo_contrato,
    nombre_empresa,
    p_nombre_usuario
from oferta_laboral
inner join tipo_contrato 
on tipo_contrato_id_tipo_contrato = id_tipo_contrato
inner join representante_empresa
on representante_empresa_usuario_id_usuario = usuario_id_usuario
and representante_empresa_id_representante = id_representante
inner join empresa 
on empresa_nit_empresa = nit_empresa
inner join usuario
on usuario_id_usuario = id_usuario;