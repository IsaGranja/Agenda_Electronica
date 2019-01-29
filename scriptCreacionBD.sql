/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     29/1/2019 14:43:19                           */
/*==============================================================*/


drop index RELATIONSHIP_28_FK;

drop index ANOTREALESTU_FK;

drop table ANOTACIONES_ESTUDIANTE;

drop index CARR_TIENE_ASIG_FK;

drop index ASIGNATURAS_PK;

drop table ASIGNATURAS;

drop index ASIXESTCORRPER_FK;

drop index PROF_DICTA_ASIGXEST_FK;

drop index ASIG_TIENE_ASIGXESTU_FK;

drop index EST_TOMA_ASIGXEST_FK;

drop index ASIGNATURASXESTUDIANTES_PK;

drop table ASIGNATURASXESTUDIANTES;

drop index ASIXPROCORRPER_FK;

drop index PROF_DICTA_ASIGXPROF_FK;

drop index ASIGNATURASXPROFESOR_PK;

drop table ASIGNATURASXPROFESOR;

drop index ESC_TIENE_CARR_FK;

drop index CARRERAS_PK;

drop table CARRERAS;

drop index PROV_TIENE_CIUD_FK;

drop index CIUDADES_PK;

drop table CIUDADES;

drop index ASIG_TIENE_CONT_FK;

drop index TEM_TIENE_CONT_FK;

drop index CONTENIDOS_PK;

drop table CONTENIDOS;

drop index FACUSXSED_TIENE_ESC_FK;

drop index ESCUELAS_PK;

drop table ESCUELAS;

drop index CARR_TIENE_EST_FK;

drop index ESTUDIANTES_PK;

drop table ESTUDIANTES;

drop index TEM_TIENE_EVAL_FK;

drop index EVALUACIONES_PK;

drop table EVALUACIONES;

drop index FACULTADES_PK;

drop table FACULTADES;

drop index SED_TIENE_FACUXSED_FK;

drop index FACULTADESXSEDES_PK;

drop table FACULTADESXSEDES;

drop index CONT_TIENE_GLO_FK;

drop index GLOSARIOS_PK;

drop table GLOSARIOS;

drop index SED_TIENE_PER_FK;

drop index PERIODOS_PK;

drop table PERIODOS;

drop index CARR_CONF_POR_PROF_FK;

drop index PROFESORES_PK;

drop table PROFESORES;

drop index PROVINCIAS_PK;

drop table PROVINCIAS;

drop index CIU_TIENE_SED_FK;

drop index UNI_TIENE_SED_FK;

drop index SEDES_PK;

drop table SEDES;

drop index TEM_CONTIENE_TALL_FK;

drop index TALLERES_PK;

drop table TALLERES;

drop index UNIDADES_TIENE_TEMAS_FK;

drop index ASIG_TIENE_TEM_FK;

drop index TEMAS_ESTUDIO_PK;

drop table TEMAS_ESTUDIO;

drop index ASIG_TIENE_UNID_FK;

drop index UNIDADES_ESTUDIO_PK;

drop table UNIDADES_ESTUDIO;

drop index UNIVERSIDADES_PK;

drop table UNIVERSIDADES;

/*==============================================================*/
/* Table: ANOTACIONES_ESTUDIANTE                                */
/*==============================================================*/
create table ANOTACIONES_ESTUDIANTE (
   CEDESTUDIANTE        CHAR(10)             not null,
   CODCONTENIDO         VARCHAR(18)          null,
   ANOTESTUDIANTE       VARCHAR(500)         null
);

comment on table ANOTACIONES_ESTUDIANTE is
'Anotaciones ralizadas por un estudiante en base a un respectivo contenido';

comment on column ANOTACIONES_ESTUDIANTE.CEDESTUDIANTE is
'Clave primaria, longitud de cédula del estudiante de 10 caracteres.';

comment on column ANOTACIONES_ESTUDIANTE.CODCONTENIDO is
'Clave primaria codigo de contenido de 18 caracteres. Validar en base a la combinacion del codigo de tema + C + numero autoincremental';

comment on column ANOTACIONES_ESTUDIANTE.ANOTESTUDIANTE is
'Texto de las anotaciones realizadas por un estudiante';

/*==============================================================*/
/* Index: ANOTREALESTU_FK                                       */
/*==============================================================*/
create  index ANOTREALESTU_FK on ANOTACIONES_ESTUDIANTE (
CEDESTUDIANTE
);

/*==============================================================*/
/* Index: RELATIONSHIP_28_FK                                    */
/*==============================================================*/
create  index RELATIONSHIP_28_FK on ANOTACIONES_ESTUDIANTE (
CODCONTENIDO
);

/*==============================================================*/
/* Table: ASIGNATURAS                                           */
/*==============================================================*/
create table ASIGNATURAS (
   CODCARRERA           VARCHAR(6)           not null,
   CODASIGNATURA        VARCHAR(5)           not null,
   DESCASIGNATURA       VARCHAR(50)          not null,
   CREDASIGNATURA       INT2                 not null,
   NIVELASIGNATURA      INT4                 not null,
   OBJEASIGNATURA       VARCHAR(500)         null,
   RESULAPREASIGNATURA  VARCHAR(500)         null,
   CARACAPREASIGNATURA  VARCHAR(500)         null,
   constraint PK_ASIGNATURAS primary key (CODASIGNATURA)
);

comment on column ASIGNATURAS.CODCARRERA is
'Clave primaria codigo de carrera de 6 caracteres';

comment on column ASIGNATURAS.CODASIGNATURA is
'Clave primaria codigo de asignatura de 6 caracteres. Validar en funcion de la PUCE, son 5 numeros.';

comment on column ASIGNATURAS.DESCASIGNATURA is
'Nombre de la asignatura con longitud de 8 caracteres.';

comment on column ASIGNATURAS.CREDASIGNATURA is
'Numero de creditos de la asignatura.';

comment on column ASIGNATURAS.NIVELASIGNATURA is
'Nuemro de nivel de asignatura actual, tipo de dato entero numerico. Validar que nivel actual de asignatura sea maximo 15.';

comment on column ASIGNATURAS.OBJEASIGNATURA is
'Objetivo de la signatura de longitud variable de 500 caracteres.';

comment on column ASIGNATURAS.RESULAPREASIGNATURA is
'Plan de resultados de la asignatura con longitud variable de 500 caracteres.';

comment on column ASIGNATURAS.CARACAPREASIGNATURA is
'Caracterizacion de aprendizage de la asignatura con longitud variable de 500 caracteres.';

/*==============================================================*/
/* Index: ASIGNATURAS_PK                                        */
/*==============================================================*/
create unique index ASIGNATURAS_PK on ASIGNATURAS (
CODASIGNATURA
);

/*==============================================================*/
/* Index: CARR_TIENE_ASIG_FK                                    */
/*==============================================================*/
create  index CARR_TIENE_ASIG_FK on ASIGNATURAS (
CODCARRERA
);

/*==============================================================*/
/* Table: ASIGNATURASXESTUDIANTES                               */
/*==============================================================*/
create table ASIGNATURASXESTUDIANTES (
   CEDESTUDIANTE        CHAR(10)             not null,
   CODASIGNATURA        VARCHAR(6)           not null,
   CEDPROFESOR          CHAR(10)             not null,
   CODPERIODO           VARCHAR(7)           not null,
   constraint PK_ASIGNATURASXESTUDIANTES primary key (CODASIGNATURA, CEDPROFESOR)
);

comment on table ASIGNATURASXESTUDIANTES is
'Asignaturas de cada profesor y/o estudiante';

comment on column ASIGNATURASXESTUDIANTES.CEDESTUDIANTE is
'Cedula del estudiante con longitud de 10 caracteres.';

comment on column ASIGNATURASXESTUDIANTES.CODASIGNATURA is
'Clave primaria codigo de asignatura de 6 caracteres';

comment on column ASIGNATURASXESTUDIANTES.CEDPROFESOR is
'Clave primaria cedula de identidad del profesor de 10 caracteres';

comment on column ASIGNATURASXESTUDIANTES.CODPERIODO is
'Clave primaria, longitud de código de periodo de 6 caracteres con formato tipo AAAA-DD, siendo A año y D día';

/*==============================================================*/
/* Index: ASIGNATURASXESTUDIANTES_PK                            */
/*==============================================================*/
create unique index ASIGNATURASXESTUDIANTES_PK on ASIGNATURASXESTUDIANTES (
CODASIGNATURA,
CEDPROFESOR
);

/*==============================================================*/
/* Index: EST_TOMA_ASIGXEST_FK                                  */
/*==============================================================*/
create  index EST_TOMA_ASIGXEST_FK on ASIGNATURASXESTUDIANTES (
CEDESTUDIANTE
);

/*==============================================================*/
/* Index: ASIG_TIENE_ASIGXESTU_FK                               */
/*==============================================================*/
create  index ASIG_TIENE_ASIGXESTU_FK on ASIGNATURASXESTUDIANTES (
CODASIGNATURA
);

/*==============================================================*/
/* Index: PROF_DICTA_ASIGXEST_FK                                */
/*==============================================================*/
create  index PROF_DICTA_ASIGXEST_FK on ASIGNATURASXESTUDIANTES (
CEDPROFESOR
);

/*==============================================================*/
/* Index: ASIXESTCORRPER_FK                                     */
/*==============================================================*/
create  index ASIXESTCORRPER_FK on ASIGNATURASXESTUDIANTES (
CODPERIODO
);

/*==============================================================*/
/* Table: ASIGNATURASXPROFESOR                                  */
/*==============================================================*/
create table ASIGNATURASXPROFESOR (
   CODASIGNATURA        VARCHAR(4)           not null,
   CEDPROFESOR          CHAR(10)             not null,
   CODPERIODO           VARCHAR(7)           not null,
   constraint PK_ASIGNATURASXPROFESOR primary key (CODASIGNATURA)
);

comment on table ASIGNATURASXPROFESOR is
'Asignaturas dictadas por un profesor y asignaturas que tiene un profesor';

comment on column ASIGNATURASXPROFESOR.CODASIGNATURA is
'Clave primaria codigo de asignatura de 6 caracteres. Validar en funcion de la PUCE, son 4 numeros.';

comment on column ASIGNATURASXPROFESOR.CEDPROFESOR is
'Clave foranea de cedula del profesor';

comment on column ASIGNATURASXPROFESOR.CODPERIODO is
'Clave primaria, longitud de código de periodo de 6 caracteres con formato tipo AAAA-DD, siendo A año y D día';

/*==============================================================*/
/* Index: ASIGNATURASXPROFESOR_PK                               */
/*==============================================================*/
create unique index ASIGNATURASXPROFESOR_PK on ASIGNATURASXPROFESOR (
CODASIGNATURA
);

/*==============================================================*/
/* Index: PROF_DICTA_ASIGXPROF_FK                               */
/*==============================================================*/
create  index PROF_DICTA_ASIGXPROF_FK on ASIGNATURASXPROFESOR (
CEDPROFESOR
);

/*==============================================================*/
/* Index: ASIXPROCORRPER_FK                                     */
/*==============================================================*/
create  index ASIXPROCORRPER_FK on ASIGNATURASXPROFESOR (
CODPERIODO
);

/*==============================================================*/
/* Table: CARRERAS                                              */
/*==============================================================*/
create table CARRERAS (
   CODESCUELA           VARCHAR(6)           not null,
   CODCARRERA           VARCHAR(6)           not null,
   DESCCARRERA          VARCHAR(30)          not null,
   NIVCARRERA           INT4                 not null,
   DIRECCARRERA         VARCHAR(30)          not null,
   constraint PK_CARRERAS primary key (CODCARRERA)
);

comment on column CARRERAS.CODESCUELA is
'Clave foránea, longitud de código de escuela de 6 caracteres.';

comment on column CARRERAS.CODCARRERA is
'Clave primaria, longitud de código de carrera de 6 caracteres. ';

comment on column CARRERAS.DESCCARRERA is
'Nombre de la carrera, su longitud es de 30 caracteres.';

comment on column CARRERAS.NIVCARRERA is
'Número de niveles que posee la carrera.';

/*==============================================================*/
/* Index: CARRERAS_PK                                           */
/*==============================================================*/
create unique index CARRERAS_PK on CARRERAS (
CODCARRERA
);

/*==============================================================*/
/* Index: ESC_TIENE_CARR_FK                                     */
/*==============================================================*/
create  index ESC_TIENE_CARR_FK on CARRERAS (
CODESCUELA
);

/*==============================================================*/
/* Table: CIUDADES                                              */
/*==============================================================*/
create table CIUDADES (
   CODPROVINCIA         VARCHAR(6)           not null,
   CODCIUDAD            CHAR(6)              not null,
   DESCCIUDAD           VARCHAR(30)          not null,
   constraint PK_CIUDADES primary key (CODCIUDAD)
);

comment on column CIUDADES.CODPROVINCIA is
'Clave foránea, longitud de código de provincia de 6 caracteres.
';

comment on column CIUDADES.CODCIUDAD is
'Clave primaria, longitud de código de ciudad de 6 caracteres, codigo de provincia (2) , codigo de area (2), codigo de zona (2)
';

comment on column CIUDADES.DESCCIUDAD is
'Descripción de la ciudad, longitud de 30 caracteres.';

/*==============================================================*/
/* Index: CIUDADES_PK                                           */
/*==============================================================*/
create unique index CIUDADES_PK on CIUDADES (
CODCIUDAD
);

/*==============================================================*/
/* Index: PROV_TIENE_CIUD_FK                                    */
/*==============================================================*/
create  index PROV_TIENE_CIUD_FK on CIUDADES (
CODPROVINCIA
);

/*==============================================================*/
/* Table: CONTENIDOS                                            */
/*==============================================================*/
create table CONTENIDOS (
   CODCONTENIDO         VARCHAR(18)          not null,
   CODTEMA              VARCHAR(13)          not null,
   CODASIGNATURA        VARCHAR(4)           not null,
   TEXTOCONTENIDO       VARCHAR(500)         not null,
   IMAGENCONTENIDO      VARCHAR(20)          null,
   VIDEOCONTENIDO       VARCHAR(20)          null,
   AUDIOCONTENIDO       VARCHAR(20)          null,
   INFOAPOYOCONTENIDO   VARCHAR(300)         null,
   constraint PK_CONTENIDOS primary key (CODCONTENIDO)
);

comment on column CONTENIDOS.CODCONTENIDO is
'Clave primaria codigo de contenido de 18 caracteres. Validar en base a la combinacion del codigo de tema + C + numero autoincremental';

comment on column CONTENIDOS.CODASIGNATURA is
'Clave primaria codigo de asignatura de 6 caracteres. Validar en funcion de la PUCE, son 4 numeros.';

comment on column CONTENIDOS.TEXTOCONTENIDO is
'Contenido de tipo texto con longitud variables de hasta 1000 caracteres';

comment on column CONTENIDOS.IMAGENCONTENIDO is
'nombre de imagen + .jpg';

comment on column CONTENIDOS.VIDEOCONTENIDO is
'nombre de video  + .mp4';

comment on column CONTENIDOS.AUDIOCONTENIDO is
'nombre de audio + .mp3';

comment on column CONTENIDOS.INFOAPOYOCONTENIDO is
'Informacion de apoyo con longitud variable de 300 caracteres';

/*==============================================================*/
/* Index: CONTENIDOS_PK                                         */
/*==============================================================*/
create unique index CONTENIDOS_PK on CONTENIDOS (
CODCONTENIDO
);

/*==============================================================*/
/* Index: TEM_TIENE_CONT_FK                                     */
/*==============================================================*/
create  index TEM_TIENE_CONT_FK on CONTENIDOS (
CODTEMA
);

/*==============================================================*/
/* Index: ASIG_TIENE_CONT_FK                                    */
/*==============================================================*/
create  index ASIG_TIENE_CONT_FK on CONTENIDOS (
CODASIGNATURA
);

/*==============================================================*/
/* Table: ESCUELAS                                              */
/*==============================================================*/
create table ESCUELAS (
   CODFACULTAD          VARCHAR(6)           not null,
   CODESCUELA           VARCHAR(6)           not null,
   DESCESCUELA          VARCHAR(30)          not null,
   DIRECTORESCUELA      VARCHAR(30)          null,
   constraint PK_ESCUELAS primary key (CODESCUELA)
);

comment on column ESCUELAS.CODFACULTAD is
'Clave foránea, longitud de código de facultad es de 6 caracteres.';

comment on column ESCUELAS.CODESCUELA is
'Clave primaria, longitud de código de escuela de 6 caracteres. Codigo interno no validado.
';

comment on column ESCUELAS.DESCESCUELA is
'Descripción de la escuela, su longitud es de 30 caracteres.';

/*==============================================================*/
/* Index: ESCUELAS_PK                                           */
/*==============================================================*/
create unique index ESCUELAS_PK on ESCUELAS (
CODESCUELA
);

/*==============================================================*/
/* Index: FACUSXSED_TIENE_ESC_FK                                */
/*==============================================================*/
create  index FACUSXSED_TIENE_ESC_FK on ESCUELAS (
CODFACULTAD
);

/*==============================================================*/
/* Table: ESTUDIANTES                                           */
/*==============================================================*/
create table ESTUDIANTES (
   CEDESTUDIANTE        CHAR(10)             not null,
   CODCARRERA           VARCHAR(6)           not null,
   NOMESTUDIANTE        VARCHAR(30)          not null,
   APEESTUDIANTE        VARCHAR(30)          not null,
   CORREESTUDIANTE      VARCHAR(50)          not null,
   constraint PK_ESTUDIANTES primary key (CEDESTUDIANTE)
);

comment on column ESTUDIANTES.CEDESTUDIANTE is
'Clave primaria, longitud de cédula del estudiante de 10 caracteres.';

comment on column ESTUDIANTES.CODCARRERA is
'Clave primaria codigo de carrera de 6 caracteres';

comment on column ESTUDIANTES.NOMESTUDIANTE is
'Nombres del estudiantes con longitud de hasta 30 caracteres.';

comment on column ESTUDIANTES.APEESTUDIANTE is
'Apellidos del estudiante con longitud de hasta 30 caracteres.';

comment on column ESTUDIANTES.CORREESTUDIANTE is
'Correo del estudiante con longitud de hasta 50 caracteres.';

/*==============================================================*/
/* Index: ESTUDIANTES_PK                                        */
/*==============================================================*/
create unique index ESTUDIANTES_PK on ESTUDIANTES (
CEDESTUDIANTE
);

/*==============================================================*/
/* Index: CARR_TIENE_EST_FK                                     */
/*==============================================================*/
create  index CARR_TIENE_EST_FK on ESTUDIANTES (
CODCARRERA
);

/*==============================================================*/
/* Table: EVALUACIONES                                          */
/*==============================================================*/
create table EVALUACIONES (
   CODTEMA              VARCHAR(13)          not null,
   CODPREGUNTA          VARCHAR(22)          not null,
   ENUNPREGEVALUACION   VARCHAR(250)         not null,
   OP1EVALUACION        VARCHAR(80)          not null,
   OP2EVALUACION        VARCHAR(80)          not null,
   OP3EVALUACION        VARCHAR(80)          not null,
   OP4EVALUACION        VARCHAR(80)          not null,
   RESPEVALUACION       VARCHAR(80)          not null,
   RETROEVALUACION      VARCHAR(250)         not null,
   constraint PK_EVALUACIONES primary key (CODPREGUNTA)
);

comment on column EVALUACIONES.CODTEMA is
'Codigo de tema con longitud variable de 13 caracteres compuesto por el codigo de unidad + el numero de tema';

comment on column EVALUACIONES.CODPREGUNTA is
'El codigo de pregunta permite identificar la respectiva pregunta en cada evaluacion en base a el codigo de asignatura + el codigo de unidad + el codigo del tema + numero manual de 2 digitos ej 01 o10...';

comment on column EVALUACIONES.ENUNPREGEVALUACION is
'Pregunta de la evaluacion con longitud de hasta 30 caracteres';

comment on column EVALUACIONES.OP1EVALUACION is
'Respuesta tentativa 1 de la evaluacion, con longitud de hasta 30 caracteres';

comment on column EVALUACIONES.OP2EVALUACION is
'Respuesta tentativa 2 de la evaluacion, con longitud de hasta 30 caracteres';

comment on column EVALUACIONES.OP3EVALUACION is
'Respuesta tentativa 3 de la evaluacion, con longitud de hasta 30 caracteres';

comment on column EVALUACIONES.OP4EVALUACION is
'Respuesta tentativa 4 de la evaluacion, con longitud de hasta 30 caracteres';

comment on column EVALUACIONES.RESPEVALUACION is
'Respuesta definiva de la evaluacion, con longitud de hasta 30 caracteres';

/*==============================================================*/
/* Index: EVALUACIONES_PK                                       */
/*==============================================================*/
create unique index EVALUACIONES_PK on EVALUACIONES (
CODPREGUNTA
);

/*==============================================================*/
/* Index: TEM_TIENE_EVAL_FK                                     */
/*==============================================================*/
create  index TEM_TIENE_EVAL_FK on EVALUACIONES (
CODTEMA
);

/*==============================================================*/
/* Table: FACULTADES                                            */
/*==============================================================*/
create table FACULTADES (
   CODFACULTAD          VARCHAR(6)           not null,
   DESCFACULTAD         VARCHAR(30)          not null,
   DECAFACULTAD         VARCHAR(30)          null,
   SUBDECFACULTAD       VARCHAR(30)          null,
   SECREABOGFACULTAD    VARCHAR(30)          null,
   constraint PK_FACULTADES primary key (CODFACULTAD)
);

comment on column FACULTADES.CODFACULTAD is
'Clave primaria, longitud de código de facultad de 6 caracteres.';

comment on column FACULTADES.DESCFACULTAD is
'Descripción de la facultad, su longitud es de 30 caracteres. Validar nombre definido por CES.';

/*==============================================================*/
/* Index: FACULTADES_PK                                         */
/*==============================================================*/
create unique index FACULTADES_PK on FACULTADES (
CODFACULTAD
);

/*==============================================================*/
/* Table: FACULTADESXSEDES                                      */
/*==============================================================*/
create table FACULTADESXSEDES (
   CODSEDE              VARCHAR(6)           not null,
   CODFACULTAD          VARCHAR(6)           not null,
   constraint PK_FACULTADESXSEDES primary key (CODFACULTAD)
);

comment on table FACULTADESXSEDES is
'Facultad/es de cada sede';

comment on column FACULTADESXSEDES.CODSEDE is
'Clave primaria, longitud de código de sede de 6 caracteres.';

comment on column FACULTADESXSEDES.CODFACULTAD is
'Clave primaria, longitud de código de facultad de 6 caracteres.';

/*==============================================================*/
/* Index: FACULTADESXSEDES_PK                                   */
/*==============================================================*/
create unique index FACULTADESXSEDES_PK on FACULTADESXSEDES (
CODFACULTAD
);

/*==============================================================*/
/* Index: SED_TIENE_FACUXSED_FK                                 */
/*==============================================================*/
create  index SED_TIENE_FACUXSED_FK on FACULTADESXSEDES (
CODSEDE
);

/*==============================================================*/
/* Table: GLOSARIOS                                             */
/*==============================================================*/
create table GLOSARIOS (
   CODGLOSARIO          VARCHAR(22)          not null,
   CODCONTENIDO         VARCHAR(6)           not null,
   PALABRAGLOSARIO      VARCHAR(10)          not null,
   DEFGLOSARIO          VARCHAR(200)         not null,
   constraint PK_GLOSARIOS primary key (CODGLOSARIO)
);

comment on column GLOSARIOS.CODGLOSARIO is
'Clave primaria codigo de glosario de 22 caracteres. Validada en base al codigo del contenido + un serial autoincremental.';

comment on column GLOSARIOS.CODCONTENIDO is
'Clave primaria codigo de contenido de 6 caracteres';

comment on column GLOSARIOS.PALABRAGLOSARIO is
'Palabra del glosario con longitud de hasta 10 caracteres';

comment on column GLOSARIOS.DEFGLOSARIO is
'Definicion de la palabra del glosario con longitud de hasta 180 caracteres';

/*==============================================================*/
/* Index: GLOSARIOS_PK                                          */
/*==============================================================*/
create unique index GLOSARIOS_PK on GLOSARIOS (
CODGLOSARIO
);

/*==============================================================*/
/* Index: CONT_TIENE_GLO_FK                                     */
/*==============================================================*/
create  index CONT_TIENE_GLO_FK on GLOSARIOS (
CODCONTENIDO
);

/*==============================================================*/
/* Table: PERIODOS                                              */
/*==============================================================*/
create table PERIODOS (
   CODPERIODO           VARCHAR(7)           not null,
   CODSEDE              VARCHAR(6)           not null,
   FECINICIOPERIODO     DATE                 not null,
   FECFINALPERIODO      DATE                 not null,
   ESTPERIODO           CHAR(1)              not null,
   constraint PK_PERIODOS primary key (CODPERIODO)
);

comment on column PERIODOS.CODPERIODO is
'Clave primaria, longitud de código de periodo de 6 caracteres con formato tipo AAAA-DD, siendo A año y D día';

comment on column PERIODOS.CODSEDE is
'Clave foránea, longitud de código de sede de 6 caracteres.';

comment on column PERIODOS.FECINICIOPERIODO is
'Fecha de inicio de periodo académico.';

comment on column PERIODOS.FECFINALPERIODO is
'Fecha de fin de periodo académico.';

/*==============================================================*/
/* Index: PERIODOS_PK                                           */
/*==============================================================*/
create unique index PERIODOS_PK on PERIODOS (
CODPERIODO
);

/*==============================================================*/
/* Index: SED_TIENE_PER_FK                                      */
/*==============================================================*/
create  index SED_TIENE_PER_FK on PERIODOS (
CODSEDE
);

/*==============================================================*/
/* Table: PROFESORES                                            */
/*==============================================================*/
create table PROFESORES (
   CEDPROFESOR          CHAR(10)             not null,
   CODCARRERA           VARCHAR(6)           not null,
   NOMPROFESOR          VARCHAR(30)          not null,
   APEPROFESOR          VARCHAR(30)          not null,
   CORREPROFESOR        VARCHAR(30)          not null,
   CELUPROFESOR         CHAR(10)             not null,
   constraint PK_PROFESORES primary key (CEDPROFESOR)
);

comment on column PROFESORES.CEDPROFESOR is
'Clave primaria cedula de identidad del profesor de 10 caracteres';

comment on column PROFESORES.CODCARRERA is
'Clave primaria codigo de carrera de 6 caracteres';

comment on column PROFESORES.NOMPROFESOR is
'Nombre del profesor con longitud de 30 caracteres.';

comment on column PROFESORES.APEPROFESOR is
'Apellido del profesor con longitud de 30 caracteres.';

comment on column PROFESORES.CORREPROFESOR is
'Correo electrónico del profesor con longitud de 50 caracteres.';

/*==============================================================*/
/* Index: PROFESORES_PK                                         */
/*==============================================================*/
create unique index PROFESORES_PK on PROFESORES (
CEDPROFESOR
);

/*==============================================================*/
/* Index: CARR_CONF_POR_PROF_FK                                 */
/*==============================================================*/
create  index CARR_CONF_POR_PROF_FK on PROFESORES (
CODCARRERA
);

/*==============================================================*/
/* Table: PROVINCIAS                                            */
/*==============================================================*/
create table PROVINCIAS (
   CODPROVINCIA         CHAR(2)              not null,
   DESPROVINCIA         VARCHAR(30)          not null,
   constraint PK_PROVINCIAS primary key (CODPROVINCIA)
);

comment on column PROVINCIAS.CODPROVINCIA is
'Clave primaria, longitud de código de provincia de 2 caracteres, Se encuentra dada en base al numero de la provincia en base a la codificacion Nacional, no mayor a 24 debido a que en Ecuador no hay mas de 24 provincias.
 ';

comment on column PROVINCIAS.DESPROVINCIA is
'Descripción de la provincia, longitud de 30 caracteres.';

/*==============================================================*/
/* Index: PROVINCIAS_PK                                         */
/*==============================================================*/
create unique index PROVINCIAS_PK on PROVINCIAS (
CODPROVINCIA
);

/*==============================================================*/
/* Table: SEDES                                                 */
/*==============================================================*/
create table SEDES (
   CODUNIVERSIDAD       VARCHAR(6)           not null,
   CODCIUDAD            CHAR(6)              not null,
   CODSEDE              VARCHAR(6)           not null,
   DESCSEDE             VARCHAR(30)          not null,
   PRERECTSEDE          VARCHAR(30)          null,
   SECREGENSEDE         VARCHAR(30)          null,
   constraint PK_SEDES primary key (CODSEDE)
);

comment on column SEDES.CODUNIVERSIDAD is
'Clave foránea, longitud de código de universidad de 6 caracteres.';

comment on column SEDES.CODCIUDAD is
'Clave foránea, longitud de código de ciudad de 6 caracteres.';

comment on column SEDES.CODSEDE is
'Clave primaria, longitud de código de sede de 6 caracteres. Validar en funcion al CES.';

comment on column SEDES.DESCSEDE is
'Descripción de la sede, longitud de 30 caracteres.';

/*==============================================================*/
/* Index: SEDES_PK                                              */
/*==============================================================*/
create unique index SEDES_PK on SEDES (
CODSEDE
);

/*==============================================================*/
/* Index: UNI_TIENE_SED_FK                                      */
/*==============================================================*/
create  index UNI_TIENE_SED_FK on SEDES (
CODUNIVERSIDAD
);

/*==============================================================*/
/* Index: CIU_TIENE_SED_FK                                      */
/*==============================================================*/
create  index CIU_TIENE_SED_FK on SEDES (
CODCIUDAD
);

/*==============================================================*/
/* Table: TALLERES                                              */
/*==============================================================*/
create table TALLERES (
   CODTALLER            VARCHAR(6)           not null,
   CODTEMA              VARCHAR(13)          not null,
   ARCHIVOTALLER        VARCHAR(20)          not null,
   ARCHIVOSOLUCION      VARCHAR(20)          null,
   constraint PK_TALLERES primary key (CODTALLER)
);

comment on column TALLERES.CODTALLER is
'Clave primaria codigo de taller de 6 caracteres';

comment on column TALLERES.CODTEMA is
'El codigo de tema se compone uilizando el codigo de asignatura(obtenido del codigo de tema) + letra T+ numero serial de 2 digitos ej 01 o10...';

comment on column TALLERES.ARCHIVOTALLER is
'nombre del archivo del taller + extension de solucion del taller  .pdf
';

comment on column TALLERES.ARCHIVOSOLUCION is
'nombre del archivo del taller + ''S''  + extension de solucion del taller  .pdf
';

/*==============================================================*/
/* Index: TALLERES_PK                                           */
/*==============================================================*/
create unique index TALLERES_PK on TALLERES (
CODTALLER
);

/*==============================================================*/
/* Index: TEM_CONTIENE_TALL_FK                                  */
/*==============================================================*/
create  index TEM_CONTIENE_TALL_FK on TALLERES (
CODTEMA
);

/*==============================================================*/
/* Table: TEMAS_ESTUDIO                                         */
/*==============================================================*/
create table TEMAS_ESTUDIO (
   CODASIGNATURA        VARCHAR(4)           not null,
   CODUNIDAD            VARCHAR(6)           not null,
   CODTEMA              VARCHAR(13)          not null,
   DESCTEMA             VARCHAR(100)         not null,
   NUMTEMA              INT4                 not null,
   COMENTEMA            VARCHAR(100)         null,
   constraint PK_TEMAS_ESTUDIO primary key (CODTEMA)
);

comment on column TEMAS_ESTUDIO.CODASIGNATURA is
'Clave primaria codigo de asignatura de 6 caracteres. Validar en funcion de la PUCE, son 4 numeros.';

comment on column TEMAS_ESTUDIO.CODUNIDAD is
'Codigo de unidad como clave foranea';

comment on column TEMAS_ESTUDIO.CODTEMA is
'Codigo de tema con longitud variable de 13 caracteres compuesto por el codigo de unidad + el numero de tema';

comment on column TEMAS_ESTUDIO.DESCTEMA is
'Descripcion de tema con longitud variable de 100 caracteres';

comment on column TEMAS_ESTUDIO.NUMTEMA is
'Numero de tema con ingreso manual';

comment on column TEMAS_ESTUDIO.COMENTEMA is
'Comentario de tema con longitud variable de 100 caracteres';

/*==============================================================*/
/* Index: TEMAS_ESTUDIO_PK                                      */
/*==============================================================*/
create unique index TEMAS_ESTUDIO_PK on TEMAS_ESTUDIO (
CODTEMA
);

/*==============================================================*/
/* Index: ASIG_TIENE_TEM_FK                                     */
/*==============================================================*/
create  index ASIG_TIENE_TEM_FK on TEMAS_ESTUDIO (
CODASIGNATURA
);

/*==============================================================*/
/* Index: UNIDADES_TIENE_TEMAS_FK                               */
/*==============================================================*/
create  index UNIDADES_TIENE_TEMAS_FK on TEMAS_ESTUDIO (
CODUNIDAD
);

/*==============================================================*/
/* Table: UNIDADES_ESTUDIO                                      */
/*==============================================================*/
create table UNIDADES_ESTUDIO (
   CODASIGNATURA        VARCHAR(4)           not null,
   CODUNIDAD            VARCHAR(9)           not null,
   DESCUNIDAD           VARCHAR(50)          not null,
   NUMUNIDAD            INT4                 not null,
   constraint PK_UNIDADES_ESTUDIO primary key (CODUNIDAD)
);

comment on column UNIDADES_ESTUDIO.CODASIGNATURA is
'Clave primaria codigo de asignatura de 6 caracteres. Validar en funcion de la PUCE, son 4 numeros.';

comment on column UNIDADES_ESTUDIO.CODUNIDAD is
'El codigo de unidad tiene una longitud variable de 6 caracteres y se contruye en base al codigo de asignatura + un código serial autoincremental (el codigo de unidad)';

comment on column UNIDADES_ESTUDIO.DESCUNIDAD is
'Descripcion de la unidad (nombre) tipo de dato caracter variable de 50';

comment on column UNIDADES_ESTUDIO.NUMUNIDAD is
'Numero de unidad con tipo de dato numerico entero que se debe ingresar de forma manual. Validar que existan maximo 6';

/*==============================================================*/
/* Index: UNIDADES_ESTUDIO_PK                                   */
/*==============================================================*/
create unique index UNIDADES_ESTUDIO_PK on UNIDADES_ESTUDIO (
CODUNIDAD
);

/*==============================================================*/
/* Index: ASIG_TIENE_UNID_FK                                    */
/*==============================================================*/
create  index ASIG_TIENE_UNID_FK on UNIDADES_ESTUDIO (
CODASIGNATURA
);

/*==============================================================*/
/* Table: UNIVERSIDADES                                         */
/*==============================================================*/
create table UNIVERSIDADES (
   CODUNIVERSIDAD       VARCHAR(6)           not null,
   DESCUNIVERSIDAD      VARCHAR(50)          not null,
   CATEGUNIVERSIDAD     CHAR(1)              not null,
   DIR1UNIVERSIDAD      VARCHAR(50)          null,
   DIR2UNIVERSIDAD      VARCHAR(50)          null,
   NUMDIRUNIVERSIDAD    VARCHAR(20)          null,
   TIPOUNIVERSIDAD      CHAR(2)              not null,
   RECTUNIVERSIDAD      VARCHAR(30)          null,
   VISERECUNIVERSIDAD   VARCHAR(30)          null,
   SECREGENUNIVERSIDAD  VARCHAR(30)          null,
   RUCUNIVERSIDAD       CHAR(13)             not null,
   constraint PK_UNIVERSIDADES primary key (CODUNIVERSIDAD)
);

comment on column UNIVERSIDADES.CODUNIVERSIDAD is
'Clave primaria, longitud de código de universidad de 6 caracteres. Validar en función del CES.';

comment on column UNIVERSIDADES.DESCUNIVERSIDAD is
'Descripción de la universidad, longitud de 50 caracteres.';

comment on column UNIVERSIDADES.CATEGUNIVERSIDAD is
'Categoría de la universidad, la longitud es de 1 caracter. Validar en función del CES.';

comment on column UNIVERSIDADES.DIR1UNIVERSIDAD is
'Calle principal de la universidad, longitud de 50 caracteres.';

comment on column UNIVERSIDADES.DIR2UNIVERSIDAD is
'Calle transversal de la universidad, longitud de 50 caracteres.';

comment on column UNIVERSIDADES.NUMDIRUNIVERSIDAD is
'numeracion de lote de la respectiva direccion de la universidad en base al estandar del municipio, de 20 caracteres variables';

comment on column UNIVERSIDADES.TIPOUNIVERSIDAD is
'Tipo de la universidad, longitud de 2 caracteres. Puede ser pública PU o privada PR.';

comment on column UNIVERSIDADES.RECTUNIVERSIDAD is
'nombre del rector de la universidad con longitud varable de 30 caracteres';

comment on column UNIVERSIDADES.VISERECUNIVERSIDAD is
'nombre del viserector de la universidad, longitud de caracteres variable de 30';

comment on column UNIVERSIDADES.SECREGENUNIVERSIDAD is
'nombre de secretario general con longitud variable de 30 caracteres';

comment on column UNIVERSIDADES.RUCUNIVERSIDAD is
'RUC identificador de la universidad, longitud fija de 10 caracteres. Validado por el sistema.';

/*==============================================================*/
/* Index: UNIVERSIDADES_PK                                      */
/*==============================================================*/
create unique index UNIVERSIDADES_PK on UNIVERSIDADES (
CODUNIVERSIDAD
);

alter table ANOTACIONES_ESTUDIANTE
   add constraint FK_ANOTACIO_ANOTREALE_ESTUDIAN foreign key (CEDESTUDIANTE)
      references ESTUDIANTES (CEDESTUDIANTE)
      on delete restrict on update restrict;

alter table ANOTACIONES_ESTUDIANTE
   add constraint FK_ANOTACIO_RELATIONS_CONTENID foreign key (CODCONTENIDO)
      references CONTENIDOS (CODCONTENIDO)
      on delete restrict on update restrict;

alter table ASIGNATURAS
   add constraint FK_ASIGNATU_CARR_TIEN_CARRERAS foreign key (CODCARRERA)
      references CARRERAS (CODCARRERA)
      on delete restrict on update restrict;

alter table ASIGNATURASXESTUDIANTES
   add constraint FK_ASIGNATU_ASIG_TIEN_ASIGNATU foreign key (CODASIGNATURA)
      references ASIGNATURAS (CODASIGNATURA)
      on delete restrict on update restrict;

alter table ASIGNATURASXESTUDIANTES
   add constraint FK_ASIGNATU_ASIXESTCO_PERIODOS foreign key (CODPERIODO)
      references PERIODOS (CODPERIODO)
      on delete restrict on update restrict;

alter table ASIGNATURASXESTUDIANTES
   add constraint FK_ASIGNATU_EST_TOMA__ESTUDIAN foreign key (CEDESTUDIANTE)
      references ESTUDIANTES (CEDESTUDIANTE)
      on delete restrict on update restrict;

alter table ASIGNATURASXESTUDIANTES
   add constraint FK_ASIGNATU_PROF_DICT_PROFESOR foreign key (CEDPROFESOR)
      references PROFESORES (CEDPROFESOR)
      on delete restrict on update restrict;

alter table ASIGNATURASXPROFESOR
   add constraint FK_ASIGNATU_ASIG_TIEN_ASIGNATU foreign key (CODASIGNATURA)
      references ASIGNATURAS (CODASIGNATURA)
      on delete restrict on update restrict;

alter table ASIGNATURASXPROFESOR
   add constraint FK_ASIGNATU_ASIXPROCO_PERIODOS foreign key (CODPERIODO)
      references PERIODOS (CODPERIODO)
      on delete restrict on update restrict;

alter table ASIGNATURASXPROFESOR
   add constraint FK_ASIGNATU_PROF_DICT_PROFESOR foreign key (CEDPROFESOR)
      references PROFESORES (CEDPROFESOR)
      on delete restrict on update restrict;

alter table CARRERAS
   add constraint FK_CARRERAS_ESC_TIENE_ESCUELAS foreign key (CODESCUELA)
      references ESCUELAS (CODESCUELA)
      on delete restrict on update restrict;

alter table CIUDADES
   add constraint FK_CIUDADES_PROV_TIEN_PROVINCI foreign key (CODPROVINCIA)
      references PROVINCIAS (CODPROVINCIA)
      on delete restrict on update restrict;

alter table CONTENIDOS
   add constraint FK_CONTENID_ASIG_TIEN_ASIGNATU foreign key (CODASIGNATURA)
      references ASIGNATURAS (CODASIGNATURA)
      on delete restrict on update restrict;

alter table CONTENIDOS
   add constraint FK_CONTENID_TEM_TIENE_TEMAS_ES foreign key (CODTEMA)
      references TEMAS_ESTUDIO (CODTEMA)
      on delete restrict on update restrict;

alter table ESCUELAS
   add constraint FK_ESCUELAS_FACUSXSED_FACULTAD foreign key (CODFACULTAD)
      references FACULTADESXSEDES (CODFACULTAD)
      on delete restrict on update restrict;

alter table ESTUDIANTES
   add constraint FK_ESTUDIAN_CARR_TIEN_CARRERAS foreign key (CODCARRERA)
      references CARRERAS (CODCARRERA)
      on delete restrict on update restrict;

alter table EVALUACIONES
   add constraint FK_EVALUACI_TEM_TIENE_TEMAS_ES foreign key (CODTEMA)
      references TEMAS_ESTUDIO (CODTEMA)
      on delete restrict on update restrict;

alter table FACULTADESXSEDES
   add constraint FK_FACULTAD_FACU_PERT_FACULTAD foreign key (CODFACULTAD)
      references FACULTADES (CODFACULTAD)
      on delete restrict on update restrict;

alter table FACULTADESXSEDES
   add constraint FK_FACULTAD_SED_TIENE_SEDES foreign key (CODSEDE)
      references SEDES (CODSEDE)
      on delete restrict on update restrict;

alter table GLOSARIOS
   add constraint FK_GLOSARIO_CONT_TIEN_CONTENID foreign key (CODCONTENIDO)
      references CONTENIDOS (CODCONTENIDO)
      on delete restrict on update restrict;

alter table PERIODOS
   add constraint FK_PERIODOS_SED_TIENE_SEDES foreign key (CODSEDE)
      references SEDES (CODSEDE)
      on delete restrict on update restrict;

alter table PROFESORES
   add constraint FK_PROFESOR_CARR_CONF_CARRERAS foreign key (CODCARRERA)
      references CARRERAS (CODCARRERA)
      on delete restrict on update restrict;

alter table SEDES
   add constraint FK_SEDES_CIU_TIENE_CIUDADES foreign key (CODCIUDAD)
      references CIUDADES (CODCIUDAD)
      on delete restrict on update restrict;

alter table SEDES
   add constraint FK_SEDES_UNI_TIENE_UNIVERSI foreign key (CODUNIVERSIDAD)
      references UNIVERSIDADES (CODUNIVERSIDAD)
      on delete restrict on update restrict;

alter table TALLERES
   add constraint FK_TALLERES_TEM_CONTI_TEMAS_ES foreign key (CODTEMA)
      references TEMAS_ESTUDIO (CODTEMA)
      on delete restrict on update restrict;

alter table TEMAS_ESTUDIO
   add constraint FK_TEMAS_ES_ASIG_TIEN_ASIGNATU foreign key (CODASIGNATURA)
      references ASIGNATURAS (CODASIGNATURA)
      on delete restrict on update restrict;

alter table TEMAS_ESTUDIO
   add constraint FK_TEMAS_ES_UNIDADES__UNIDADES foreign key (CODUNIDAD)
      references UNIDADES_ESTUDIO (CODUNIDAD)
      on delete restrict on update restrict;

alter table UNIDADES_ESTUDIO
   add constraint FK_UNIDADES_ASIG_TIEN_ASIGNATU foreign key (CODASIGNATURA)
      references ASIGNATURAS (CODASIGNATURA)
      on delete restrict on update restrict;

