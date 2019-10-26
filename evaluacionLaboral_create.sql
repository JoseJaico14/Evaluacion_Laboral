DROP DATABASE IF EXISTS evaluacionDesempenio;
CREATE DATABASE IF NOT EXISTS evaluacionDesempenio;
USE evaluacionDesempenio;

DROP TABLE IF EXISTS 	alternativa,
						bitacora, 
                        condicion,
                        detalle_alternativa,
                        detalle_ficha,
                        encuesta,
                        ficha,
                        ficha_encuesta,
                        grupo_alternativa,
                        pregunta,
                        respuesta_marcada,
                        respuestas_correctas,
                        rol,
                        sesion,
                        usuario;
                        
/*==============================================================*/
/* Table: alternativa                                           */
/*==============================================================*/
create table alternativa
(
   id       			int not null AUTO_INCREMENT,
   alternativa          varchar(1024) not null,
   peso                 int,
   estado               int not null,
   created_at           datetime not null,
   update_at            datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: bitacora                                              */
/*==============================================================*/
create table bitacora
(
   id           		int not null AUTO_INCREMENT,
   ip                   varchar(50),
   usuario              varchar(50),
   tabla                varchar(1024),
   campo                varchar(1024),
   valor_anterior       varchar(1024),
   valor_actual         varchar(1024),
   created_at           datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: ficha                                                 */
/*==============================================================*/
create table ficha
(
   id              		int not null AUTO_INCREMENT,
   nombre               varchar(1024) not null,
   descripcion          varchar(1024),
   estado               int not null,
   created_at           datetime not null,
   updated_at           datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: grupo_alternativa                                     */
/*==============================================================*/
create table grupo_alternativa
(
   id   				int not null AUTO_INCREMENT,
   descripcion          varchar(1024),
   estado               int not null,
   created_at           datetime not null,
   updated_at           datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: rol                                                   */
/*==============================================================*/
create table rol
(
   id                	int not null AUTO_INCREMENT,
   nombre               varchar(1024) not null,
   descripcion          varchar(1024),
   estado               int not null,
   created_at           datetime not null,
   update_at            datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: usuario                                               */
/*==============================================================*/
create table usuario
(
   id            		int not null AUTO_INCREMENT,
   usuario              varchar(100) not null,
   clave             	varchar(1024) not null,
   remember_token       varchar(1024) not null,
   nombre_completo      varchar(1024),
   email                varchar(1024),
   idrol                int not null,
   estado               int not null,
   created_at           datetime not null,
   updated_at           datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: detalle_alternativa                                   */
/*==============================================================*/
create table detalle_alternativa
(
   id 					int not null AUTO_INCREMENT,
   grupo_alternativa_id int not null,
   alternativa_id       int not null,
   created_at           datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: detalle_ficha                                         */
/*==============================================================*/
create table detalle_ficha
(
   id       			int not null AUTO_INCREMENT,
   ficha_id             int not null,
   usuario_id           int not null,
   fechainicio          datetime,
   fechatermino         datetime,
   estado               int not null,
   createad_at          datetime not null,
   update_at            datetime not null,
   condicion            char(4) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: ficha_encuesta                                        */
/*==============================================================*/
create table ficha_encuesta
(
   id      				int not null AUTO_INCREMENT,
   ficha_id             int not null,
   encuesta_id          int not null,
   created_at           datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: encuesta                                              */
/*==============================================================*/
create table encuesta
(
   id          			int not null AUTO_INCREMENT,
   ficha_encuesta_id      int not null,
   encuesta             varchar(1024) not null,
   descripcion          varchar(1024),
   tipo                 varchar(5) not null,
   estado               int not null,
   created_at           datetime not null,
   update_at            datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: pregunta                                              */
/*==============================================================*/
create table pregunta
(
   id          			int not null AUTO_INCREMENT,
   grupo_alternativa_id   int not null,
   encuesta_id           int not null,
   pregunta             varchar(1024) not null,
   tipo                 varchar(5) not null,
   created_at           datetime not null,
   update_at            datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: respuesta_marcada                                     */
/*==============================================================*/
create table respuesta_marcada
(
   id   				int not null AUTO_INCREMENT,
   detalle_ficha_id     int not null,
   alternativa_id       int not null,
   idpregunta           int not null,
   created_at           datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: respuestas_correctas                                  */
/*==============================================================*/
create table respuestas_correctas
(
   id  					int not null AUTO_INCREMENT,
   alternativa_id        int not null,
   pregunta_id           int not null,
   created_at           datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: sesion                                                */
/*==============================================================*/
create table sesion
(
   id             		int not null AUTO_INCREMENT,
   usuario_id            int not null,
   accion               varchar(5) not null,
   created_at           datetime not null,
   primary key (id)
);


ALTER TABLE detalle_alternativa
   ADD FOREIGN KEY (grupo_alternativa_id)  REFERENCES grupo_alternativa (id)    ON DELETE CASCADE,
   ADD FOREIGN KEY (alternativa_id)  REFERENCES alternativa (id)    ON DELETE CASCADE;
   
ALTER TABLE detalle_ficha
   ADD FOREIGN KEY (ficha_id)  REFERENCES ficha (id)    ON DELETE CASCADE,
   ADD FOREIGN KEY (usuario_id)  REFERENCES usuario (id)    ON DELETE CASCADE;

ALTER TABLE ficha_encuesta
   ADD FOREIGN KEY (ficha_id)  REFERENCES ficha (id)    ON DELETE CASCADE,
   ADD FOREIGN KEY (encuesta_id)  REFERENCES encuesta (id)    ON DELETE CASCADE;
   
ALTER TABLE encuesta
  ADD FOREIGN KEY (ficha_encuesta_id)  REFERENCES ficha_encuesta (id)    ON DELETE CASCADE;
  
ALTER TABLE pregunta
   ADD FOREIGN KEY (grupo_alternativa_id)  REFERENCES grupo_alternativa (id)    ON DELETE CASCADE,
   ADD FOREIGN KEY (encuesta_id)  REFERENCES encuesta (id)    ON DELETE CASCADE;
   
ALTER TABLE respuesta_marcada
   ADD FOREIGN KEY (detalle_ficha_id)  REFERENCES detalle_ficha (id)    ON DELETE CASCADE,
   ADD FOREIGN KEY (alternativa_id)  REFERENCES alternativa (id)    ON DELETE CASCADE;
   
ALTER TABLE respuestas_correctas
   ADD FOREIGN KEY (alternativa_id)  REFERENCES alternativa (id)    ON DELETE CASCADE,
   ADD FOREIGN KEY (pregunta_id)  REFERENCES pregunta (id)    ON DELETE CASCADE;
   
ALTER TABLE sesion
   ADD  FOREIGN KEY (usuario_id)  REFERENCES usuario (id)    ON DELETE CASCADE;
