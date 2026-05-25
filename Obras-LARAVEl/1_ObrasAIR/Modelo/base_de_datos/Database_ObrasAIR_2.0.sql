drop database obrasair;

create database obrasair;
use obrasair;

create table rol (
    id_rol bigint,
    nombre_rol enum('Administrador', 
                    'Representante de empresa', 
                    'Aspirante') not null,

    primary key (id_rol)
);

create table usuario (
    tipo_documento enum (   '(CC) Cedula de Ciudadania', 
                            '(CE) Cedula de Extranjeria', 
                            '(PA) Pasaporte', 
                            '(PPT) Permiso por Proteccion Temporal', 
                            '(PEP) Permiso Especial de Permanencia') not null,
    numero_documento bigint,
    primer_nombre varchar(20) not null,
    segundo_nombre varchar(20),
    primer_apellido varchar(20) not null,
    segundo_apellido varchar(20),
    celular bigint not null,
    email varchar(50) not null,
    password varchar(255) not null,
    confirmar_password varchar(255) not null,
    estado_usuario tinyint not null default 1,

    primary key (numero_documento)
);

create table rol_has_usuario (
    rol_id_rol bigint,
    usuario_numero_documento bigint,
    estado_rhu tinyint not null default 1,

    primary key (rol_id_rol, usuario_numero_documento),

    constraint rhu_fk_rol foreign key (rol_id_rol) references rol (id_rol),
    constraint rhu_fk_usuario foreign key (usuario_numero_documento) references usuario (numero_documento)
);

create table empresa (
    nit_empresa bigint,
    nombre_empresa varchar(100) not null,
    sector_empresa varchar(30) not null,
    descripcion_empresa text not null,
    direccion_empresa varchar(35) not null,

    primary key (nit_empresa)
);

create table representante_empresa (
    usuario_numero_documento bigint,
    empresa_nit_empresa bigint not null,
    cargo_empresa varchar(15) not null,
    estado_re tinyint not null default 1,

    primary key (usuario_numero_documento),

    constraint re_fk_usuario foreign key (usuario_numero_documento) references usuario (numero_documento),
    constraint re_fk_empresa foreign key (empresa_nit_empresa) references empresa (nit_empresa)
);

create table tipo_contrato (
    id_tipo_contrato int,
    nombre_tipo_contrato varchar(35) not null,

    primary key (id_tipo_contrato)
);

create table oferta_laboral (
    id_oferta_laboral int,
    representante_empresa_usuario_numero_documento bigint,
    tipo_contrato_id_tipo_contrato int not null,
    nombre_oferta_laboral varchar(45) not null,
    descripcion_oferta_laboral text not null,
    direccion_oferta_laboral varchar(35) not null,
    intensidad_horaria int not null,
    requisitos_oferta_laboral text not null,
    salario_oferta_laboral decimal(10,2) not null,

    primary key (id_oferta_laboral, representante_empresa_usuario_numero_documento),

    constraint ol_fk_re foreign key (representante_empresa_usuario_numero_documento) references representante_empresa (usuario_numero_documento),
    constraint ol_fk_tp foreign key (tipo_contrato_id_tipo_contrato) references tipo_contrato (id_tipo_contrato)
);

create table aspirante (
    usuario_numero_documento bigint,
    profesion_aspirante varchar(50) not null,
    meses_experiencia int not null,
    descripcion_aspirante text not null,
    hoja_vida longblob not null,
    estado_aspirante tinyint default 1,

    primary key (usuario_numero_documento),
    
    constraint aspirante_fk_usuario foreign key (usuario_numero_documento) references usuario (numero_documento)
);

create table formacion_academica (
    id_formacion_academica int,
    aspirante_usuario_numero_documento bigint,
    nombre_formacion_academica varchar(50) not null,
    instituo_formacion_academica varchar(40) not null,
    tipo_formacion_academica varchar(40) not null,
    modalidad_formacion_academica varchar(40) not null,
    certificado_formacion_academica longblob  not null,
    descripcion_formacion_academica text not null,

    primary key (id_formacion_academica, aspirante_usuario_numero_documento),

    constraint fa_fk_aspirante foreign key (aspirante_usuario_numero_documento) references aspirante (usuario_numero_documento)
);

create table postulacion (
    id_postulacion int,
    oferta_laboral_id_oferta_laboral int,
    aspirante_usuario_numero_documento bigint,
    fecha_postulacion timestamp default current_timestamp not null,
    estado_psotulacion enum('Preseleccionado', 
                            'En revision', 
                            'Rechazado', 
                            'Retirado',
                            'Contratado') not null,

    primary key (id_postulacion, oferta_laboral_id_oferta_laboral, aspirante_usuario_numero_documento),

    constraint postulacion_fk_ol foreign key (oferta_laboral_id_oferta_laboral) references oferta_laboral (id_oferta_laboral),
    constraint postulacion_fk_aspirante foreign key (aspirante_usuario_numero_documento) references aspirante (usuario_numero_documento)
);

create table auditoria (
    id_auditoria int,
    nombre_tabla varchar(25) not null,
    accion_realizada varchar(15) not null,
    descripcion_auditoria text not null,
    fecha_auditoria timestamp not null default current_timestamp,

    primary key (id_auditoria) 
);