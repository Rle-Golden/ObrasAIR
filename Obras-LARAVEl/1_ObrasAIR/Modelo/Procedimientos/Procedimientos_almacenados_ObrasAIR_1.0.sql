use obrasair; 

-- Procedimientos de actualizar --
delimiter $$ 
create procedure a_usuario
(   in id_usuarioA int,
    in p_nombre_usuarioA varchar(20),
    in s_nombre_usuarioA varchar(20),
    in p_apellido_usuarioA varchar(20),
    in s_apellido_usuarioA varchar(20),
    in telefono_usuarioA bigint,
    in mail_usuarioA varchar(45),
    in password_usuarioA varchar(10),
    in estado_usuarioA tinyint
)
begin 
   update usuario
   set p_nombre_usuario = p_nombre_usuarioA,
    s_nombre_usuario = s_nombre_usuarioA,
    p_apellido_usuario = p_apellido_usuarioA,
    s_apellido_usuario = s_apellido_usuarioA,
    telefono_usuario = telefono_usuarioA,
    mail_usuario = mail_usuarioA,
    password_usuario = password_usuarioA,
    estado_usuario = estado_usuarioA
   where id_usuario = id_usuarioA;
end $$

delimiter $$

delimiter $$ 

create procedure a_rol
(   in id_rolA int,
	in nombre_rolA enum ('Administrador', 'Aspirante', 'Representante de la empresa')
)
begin 
    update rol 
    set 
    nombre_rol = nombre_rolA
    where id_rol = id_rolA;
end $$ 

delimiter $$

delimiter $$ 

create procedure a_rol_usuario
(
    in id_usuario int,
    in id_rol int,
    in estado int
)
begin
    update usuario_has_rol
    set estado_rol_usuario = estado
    where usuario_id_usuario = id_usuario
    and rol_id_rol = id_rol;
end $$

delimiter $$

delimiter $$ 

create procedure  a_profesion(
    in id_profesionA int,
    in nombre_profesionA varchar(50)
)
begin
    update profesion
    set nombre_profesion = nombre_profesionA
    where id_profesion = id_profesionA;
    end $$

delimiter $$ 

delimiter $$ 

create procedure a_aspirante(
    in usuario_id int,
    in id_asp int,
    in experiencia int,
    in presentacion text,
    in id_profesion int
)
begin
    update aspirante
    set
        meses_exp_aspirante = experiencia,
        presentacion_aspirante = presentacion,
        profesion_id_profesion = id_profesion
    where usuario_id_usuario = usuario_id
    and id_aspirante = id_asp;
end $$

delimiter $$

delimiter $$

create procedure a_tipo_formacion(
    in id_tipoA int,
    in nombreA varchar(150)
)
begin
    update tipo_formacion
    set nombre_tipo_formacion = nombreA
    where id_tipo_formacion = id_tipoA;
end $$

delimiter $$

delimiter $$ 

create procedure a_modalidad_formacion(
    in id_modalidadA int,
    in nombreA varchar(150)
)
BEGIN
    UPDATE modalidad_formacion
    SET nombre_modalidad_formacion = nombreA
    WHERE id_modalidad_formacion = id_modalidadA;
END $$

delimiter $$

delimiter $$

create procedure a_formacion_academica(
    IN p_usuario_id INT,
    IN p_id_aspirante INT,
    IN p_id_formacion INT,
    IN p_nombre VARCHAR(100),
    IN p_descripcion TEXT,
    IN p_instituto VARCHAR(45),
    IN p_tipo_formacion INT,
    IN p_modalidad INT
)
BEGIN
    UPDATE formacion_academica
    SET 
        nombre_formacion_academico = p_nombre,
        descripcion_formacion_academica = p_descripcion,
        instituto_formacion_academica = p_instituto,
        tipo_formacion_id_tipo_formacion = p_tipo_formacion,
        modalidad_formacion_id_modalidad_formacion = p_modalidad
    WHERE aspirante_usuario_id_usuario = p_usuario_id
    AND aspirante_id_aspirante = p_id_aspirante
    AND id_formacion_academica = p_id_formacion;
end $$ 

delimiter $$

delimiter $$

CREATE PROCEDURE a_empresa(
    IN nit BIGINT,
    IN nombre VARCHAR(100),
    IN sector VARCHAR(30),
    IN descripcion TEXT,
    IN direccion VARCHAR(30)
)
BEGIN
    UPDATE empresa
    SET 
        nombre_empresa = nombre,
        sector_empresa = sector,
        descripcion_empresa = descripcion,
        direccion_empresa = direccion
    WHERE nit_empresa = nit;
end $$

delimiter $$

delimiter $$

create procedure a_representante_empresa(
    IN p_usuario_id INT,
    IN p_id_representante INT,
    IN p_cargo VARCHAR(15),
    IN p_nit_empresa BIGINT
)
begin
    update representante_empresa
    set 
        cargo_empresa = p_cargo,
        empresa_nit_empresa = p_nit_empresa
    where usuario_id_usuario = p_usuario_id
    and id_representante = p_id_representante;
end $$

delimiter $$
   
delimiter $$ 

create procedure a_departamento(
    in p_id_departamento bigint,
    in p_nombre_d varchar(35)
)
BEGIN
    UPDATE departamento
    SET nombre_departamento = p_nombre_d
    WHERE id_departamento = p_id_departamento;
end $$

delimiter $$

delimiter $$

CREATE PROCEDURE a_municipio(
    IN p_id_departamento BIGINT,
    IN p_id_municipio BIGINT,
    IN p_nombre_m VARCHAR(35)
)
BEGIN
    UPDATE municipio
    SET nombre_municipio = p_nombre_m
    WHERE departamento_id_departamento = p_id_departamento
    AND id_municipio = p_id_municipio;
end $$

delimiter $$

delimiter $$

CREATE PROCEDURE a_direccion(
    IN p_id_direccion INT,
    IN p_tipo_via VARCHAR(10),
    IN p_numero_via BIGINT,
    IN p_letra VARCHAR(5),
    IN p_numero_cruce INT,
    IN p_id_departamento BIGINT,
    IN p_id_municipio BIGINT
)
BEGIN
    UPDATE direccion
    SET 
        tipo_via = p_tipo_via,
        numero_via = p_numero_via,
        letra_via = p_letra,
        numero_cruce = p_numero_cruce,
        municipio_depapartamento_id_departamento = p_id_departamento,
        municipio_id_municipio = p_id_municipio
    WHERE id_direccion = p_id_direccion;
end $$

delimiter $$

delimiter $$

CREATE PROCEDURE a_tipo_contrato(
    IN p_id_tipo INT,
    IN p_nombre_tc VARCHAR(35)
)
BEGIN
    UPDATE tipo_contrato
    SET nombre_tipo_contrato = p_nombre_tc
    WHERE id_tipo_contrato = p_id_tipo;
end $$

delimiter $$

delimiter $$ 

CREATE PROCEDURE a_oferta_laboral(
    IN id_oferta INT,
    IN nombre VARCHAR(45),
    IN descripcion TEXT,
    IN requisito TEXT,
    IN horas INT,
    IN tipo_contrato INT,
    IN salario DECIMAL(10,2),
    IN direccion INT
)
BEGIN
    UPDATE oferta_laboral
    SET 
        nombre_oferta_laboral = nombre,
        descripcion_oferta_laboral = descripcion,
        requisito_oferta_laboral = requisito,
        intensidad_horaria = horas,
        tipo_contrato_id_tipo_contrato = tipo_contrato,
        salario_oferta_laboral = salario,
        direccion_id_direccion = direccion
    WHERE id_oferta_laboral = id_oferta;
end $$

delimiter $$ 

delimiter $$

CREATE PROCEDURE a_postulacion(
    IN p_id_postulacion INT,
    IN nuevo_estado INT
)
BEGIN
    UPDATE postulacion
    SET estado_psotulacion = nuevo_estado
    WHERE id_postulacion = p_id_postulacion;
end $$

delimiter $$

-- Procedimiento de consultar --

delimiter $$

create procedure c_usuario()
begin
    select 
        id_usuario,
        p_nombre_usuario,
        s_nombre_usuario,
        p_apellido_usuario,
        s_apellido_usuario,
        telefono_usuario,
        mail_usuario,
        password_usuario,
        estado_usuario
    from usuario;
end $$

delimiter $$

delimiter $$ 

create procedure c_rol ()
begin  
	select 
		id_rol,
        nombre_rol
	from rol;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_usuario_has_rol()
begin 
	select 
		rol_id_rol,
        usuario_id_usuario,
        estado_rol_usuario
	from usuario_has_rol;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_profesion ()
begin 
	select 
		id_profesion,
		nombre_profesion
	from profesion;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_aspirante ()
begin 
	select 
		usuario_id_usuario,
        id_aspirante,
        meses_exp_aspirante,
        curriculum_aspirante,
        presentacion_aspirante,
        profesion_id_profesion
	from aspirante; 
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_tipo_formacion ()
begin 
	select 
		id_tipo_formacion,
        nombre_tipo_formacion
	from tipo_formacion;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_modalidad_formacion ()
begin 
	select 
		id_modalidad_formacion,
        nombre_modalidad_formacion
	from modalidad_formacion;
end $$ 

delimiter $$

delimiter $$ 

create procedure c_formacion_academica ()
begin 
	select 
		aspirante_usuario_id_usuario,
        aspirante_id_aspirante,
        id_formacion_academica,
        nombre_formacion_academico,
        descripcion_formacion_academica,
        instituto_formacion_academica,
        tipo_formacion_id_tipo_formacion,
        modalidad_formacion_id_modalidad_formacion,
        certificado_formacion_academica
	from formacion_academica;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_empresa ()
begin 
	select 
		nit_empresa,
        nombre_empresa,
        sector_empresa,
        descripcion_empresa,
        direccion_empresa 
	from empresa;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_representante_empresa ()
begin 
	select 
		usuario_id_usuario,
        id_representante,
        cargo_empresa,
        empresa_nit_empresa 
	from representante_empresa;
end $$ 

delimiter $$

delimiter $$ 

create procedure c_departamento ()
begin 
	select 
		id_departamento,
        nombre_departamento 
	from departamento; 
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_municipio ()
begin 
	select 
		departamento_id_departamento,
        id_municipio,
        nombre_municipio
	from municipio;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_direccion ()
begin 
	select 
		id_direccion,
        tipo_via,
        numero_via,
        letra_via,
        numero_cruce,
        municipio_depapartamento_id_departamento,
        municipio_id_municipio
	from direccion;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_tipo_contrato ()
begin 
	select 
		id_tipo_contrato,
        nombre_tipo_contrato
	from tipo_contrato;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure  c_oferta_laboral ()
begin 
	select 
		id_oferta_laboral,
        representante_empresa_usuario_id_usuario,
        representante_empresa_id_representante,
        nombre_oferta_laboral,
        descripcion_oferta_laboral,
        requisito_oferta_laboral,
        intensidad_horaria,
        tipo_contrato_id_tipo_contrato,
        salario_oferta_laboral,
        direccion_id_direccion
	from oferta_laboral;
end $$ 

delimiter $$ 

delimiter $$ 

create procedure c_postulacion ()
begin 
	select 
		id_postulacion,
        oferta_laboral_id_oferta_laboral,
        aspirante_usuario_id_usuario,
        aspirante_id_aspirante,
        fecha_registrada_postulacion,
        estado_psotulacion 
	from postulacion;
end $$ 

delimiter $$ 


-- Procedimiento insertar -- 

DELIMITER $$

CREATE PROCEDURE sp_insert_usuario(
    IN p_nombre VARCHAR(20),
    IN s_nombre VARCHAR(20),
    IN p_apellido VARCHAR(20),
    IN s_apellido VARCHAR(20),
    IN telefono BIGINT,
    IN mail VARCHAR(45),
    IN pass VARCHAR(10),
    IN estado TINYINT
)
BEGIN
    INSERT INTO usuario(p_nombre_usuario, s_nombre_usuario, p_apellido_usuario, s_apellido_usuario,telefono_usuario, mail_usuario, password_usuario, estado_usuario)
    VALUES(p_nombre, s_nombre, p_apellido, s_apellido, telefono, mail, pass, estado);
END$$

DELIMITER $$ 

DELIMITER $$

CREATE PROCEDURE sp_insert_rol(
    IN nombre ENUM('Administrador','Aspirante','Representante de la empresa')
)
BEGIN
    INSERT INTO rol(nombre_rol)
    VALUES(nombre);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_usuario_rol(
    IN idRol INT,
    IN idUsuario INT,
    IN estado TINYINT
)
BEGIN
    INSERT INTO usuario_has_rol(rol_id_rol, usuario_id_usuario, estado_rol_usuario)
    VALUES(idRol, idUsuario, estado);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_profesion(
    IN id INT,
    IN nombre VARCHAR(50)
)
BEGIN
    INSERT INTO profesion(id_profesion, nombre_profesion)
    VALUES(id, nombre);
END$$

DELIMITER $$ 

DELIMITER $$

CREATE PROCEDURE sp_insert_aspirante(
    IN idUsuario INT,
    IN idAspirante INT,
    IN mesesExp INT,
    IN curriculum LONGBLOB,
    IN presentacion TEXT,
    IN idProfesion INT
)
BEGIN
    INSERT INTO aspirante(usuario_id_usuario, id_aspirante,meses_exp_aspirante, curriculum_aspirante,presentacion_aspirante, profesion_id_profesion)
    VALUES(idUsuario, idAspirante, mesesExp, curriculum, presentacion, idProfesion);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_tipo_formacion(
    IN nombre VARCHAR(150)
)
BEGIN
    INSERT INTO tipo_formacion(nombre_tipo_formacion)
    VALUES(nombre);
END$$

DELIMITER $$ 

DELIMITER $$

CREATE PROCEDURE sp_insert_modalidad_formacion(
    IN nombre VARCHAR(150)
)
BEGIN
    INSERT INTO modalidad_formacion(nombre_modalidad_formacion)
    VALUES(nombre);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_formacion(
    IN idUsuario INT,
    IN idAspirante INT,
    IN idFormacion INT,
    IN nombre VARCHAR(100),
    IN descripcion TEXT,
    IN instituto VARCHAR(45),
    IN idTipo INT,
    IN idModalidad INT,
    IN certificado LONGBLOB
)
BEGIN
    INSERT INTO formacion_academica(aspirante_usuario_id_usuario,aspirante_id_aspirante,id_formacion_academica,nombre_formacion_academico,descripcion_formacion_academica,instituto_formacion_academica,tipo_formacion_id_tipo_formacion,modalidad_formacion_id_modalidad_formacion,certificado_formacion_academica)
    VALUES(idUsuario, idAspirante, idFormacion, nombre, descripcion, instituto, idTipo, idModalidad, certificado);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_empresa(
    IN nit BIGINT,
    IN nombre VARCHAR(100),
    IN sector VARCHAR(30),
    IN descripcion TEXT,
    IN direccion VARCHAR(30)
)
BEGIN
    INSERT INTO empresa(nit_empresa, nombre_empresa, sector_empresa,descripcion_empresa, direccion_empresa)
    VALUES(nit, nombre, sector, descripcion, direccion);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_representante(
    IN idUsuario INT,
    IN idRep INT,
    IN cargo VARCHAR(15),
    IN nitEmpresa BIGINT
)
BEGIN
    INSERT INTO representante_empresa(usuario_id_usuario, id_representante,cargo_empresa, empresa_nit_empresa)
    VALUES(idUsuario, idRep, cargo, nitEmpresa);
END$$

DELIMITER $$ 

DELIMITER $$

CREATE PROCEDURE sp_insert_departamento(
    IN id BIGINT,
    IN nombre VARCHAR(35)
)
BEGIN
    INSERT INTO departamento(id_departamento, nombre_departamento)
    VALUES(id, nombre);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_municipio(
    IN idDep BIGINT,
    IN idMun BIGINT,
    IN nombre VARCHAR(35)
)
BEGIN
    INSERT INTO municipio(departamento_id_departamento,id_municipio,nombre_municipio)
    VALUES(idDep, idMun, nombre);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_direccion(
    IN tipoVia VARCHAR(10),
    IN numVia BIGINT,
    IN letra VARCHAR(5),
    IN numCruce INT,
    IN idDep BIGINT,
    IN idMun BIGINT
)
BEGIN
    INSERT INTO direccion(tipo_via, numero_via, letra_via,numero_cruce,municipio_depapartamento_id_departamento,municipio_id_municipio)
    VALUES(tipoVia, numVia, letra, numCruce, idDep, idMun);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_tipo_contrato(
    IN nombre VARCHAR(35)
)
BEGIN
    INSERT INTO tipo_contrato(nombre_tipo_contrato)
    VALUES(nombre);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_oferta(
    IN idUsuario INT,
    IN idRep INT,
    IN nombre VARCHAR(45),
    IN descripcion TEXT,
    IN requisito TEXT,
    IN intensidad INT,
    IN idContrato INT,
    IN salario DECIMAL(10,2),
    IN idDireccion INT
)
BEGIN
    INSERT INTO oferta_laboral(representante_empresa_usuario_id_usuario,representante_empresa_id_representante,nombre_oferta_laboral,descripcion_oferta_laboral,requisito_oferta_laboral,intensidad_horaria,tipo_contrato_id_tipo_contrato,salario_oferta_laboral,direccion_id_direccion)
    VALUES(idUsuario, idRep, nombre, descripcion, requisito, intensidad, idContrato, salario, idDireccion);
END$$

DELIMITER $$

DELIMITER $$

CREATE PROCEDURE sp_insert_postulacion(
    IN idOferta INT,
    IN idUsuario INT,
    IN idAspirante INT,
    IN estado TINYINT
)
BEGIN
    INSERT INTO postulacion(oferta_laboral_id_oferta_laboral,aspirante_usuario_id_usuario,aspirante_id_aspirante,estado_psotulacion)
    VALUES(idOferta, idUsuario, idAspirante, estado);
END$$

DELIMITER $$ 