insert into provincias values('1', 'Azuay');
insert into provincias values('2', 'Bolívar');
insert into provincias values('3', 'Cañar');
insert into provincias values('4', 'Carchi');
insert into provincias values('5', 'Cotopaxi');
insert into provincias values('6', 'Chimborazo');
insert into provincias values('7', 'El Oro');
insert into provincias values('8', 'Esmeraldas');
insert into provincias values('9', 'Guayas');
insert into provincias values('10', 'Imbabura');
insert into provincias values('11', 'Loja');
insert into provincias values('12', 'Los Ríos');
insert into provincias values('13', 'Manabí');
insert into provincias values('14', 'Morona Santiago');
insert into provincias values('15', 'Napo');
insert into provincias values('16', 'Pastaza');
insert into provincias values('17', 'Pichincha');
insert into provincias values('18', 'Tungurahua');
insert into provincias values('19', 'Zamora Chinchipe');
insert into provincias values ('20', 'Galápagos');
insert into provincias values('21', 'Sucumbíos');
insert into provincias values('22', 'Orellana');
insert into provincias values('23', 'Santo Domingo de los Tsachilas');
insert into provincias values('24', 'Santa Elena');
insert into ciudades values ('17', 'CIU-00', 'Quito');
insert into ciudades values ('20', 'CIU-01', 'Puerto Ayora');

insert into universidades values ('UNI-00', 'Pontificia Universidad Catolica del Ecuador', 'B', '12 de Octubre', 'Vicente Ramon Roca', '1076', 'PR', 'Fernando Ponce Leon', 'Fernando Barredo Heinert', 'Santiago Jaramillo Herdoiza', '1790105601001');
insert into universidades values ('UNI-01', 'Escuela Politecnica Nacional', 'A', 'Ladron de Guevera', '', 'E11-253', 'PU', 'Florinella Muñoz', 'Iván Bernal', 'Ximena Díaz Reinoso', '1760005620001');

insert into sedes values ('UNI-00', 'CIU-00', 'SED-00', 'Quito', 'Fernando Ponce León', 'Santiago Jaramillo Herdoiza');
insert into sedes values ('UNI-01', 'CIU-00', 'SED-01', 'Quito', 'Florinella Muñoz', 'Ximena Díaz Reinoso');

insert into periodos values ('2019-01', 'SED-00', '2019-01-18', '2019-04-23', 'A');
insert into periodos values ('2018-02', 'SED-01', '2019-02-18', '2019-05-20', 'I');

insert into facultades values ('FAC-00', 'Ingenieria', 'Gustavo Chafla', 'Charles Escobar', 'Freddy Proaño');
insert into facultades values ('FAC-01', 'Medicina', 'Francisco Pérez', 'Ruth Jimbo', 'Pilar Olmos');

insert into facultadesxsedes values ('SED-00', 'FAC-00');
insert into facultadesxsedes values ('SED-00', 'FAC-01');

insert into escuelas values ('FAC-00', 'ESC-00', 'Sistemas', 'Damian Nicolalde');
insert into escuelas values ('FAC-00', 'ESC-01', 'Civil', 'Patricio Castro');

insert into carreras values ('ESC-00', 'CAR-00', 'Sistemas', 8, 'Miguel Ortiz');
insert into carreras values ('ESC-01', 'CAR-01', 'Civil', 10, 'Patricio Castro');

insert into estudiantes values ('1718926213', 'CAR-00', 'José Antonio', 'Salgado Proaño', 'jsalgado158@puce.edu.ec');
insert into estudiantes values ('1721635942', 'CAR-00', 'María Isabel', 'Granja Oramas', 'mgranja414@puce.edu.ec');

insert into profesores values ('1706772082', 'CAR-00', 'Marco Patricio', 'Naranjo Chiriboga', 'mpnaranjo@puce.edu.ec', '0994241513');
insert into profesores values ('1710664176', 'CAR-00', 'Juan Carlos', 'Rivera Gaibor', 'jcrivera@puce.edu.ec', '0994241514');
insert into profesores values ('0102007176', 'CAR-00', 'Jorge Arturo', 'Aguilar Jaramillo', 'jaaguilar@puce.edu.ec', '0994241515');

insert into asignaturas values ('CAR-00', '11402', 'Economía', 3, 7, 'Comprender la importancia los conceptos fundamentales de la ciencia económica y el conocimiento de cómo funcionan los sistemas económicos, como soporte del desarrollo de la actividad socio económica y empresarial, basado en actividades tecnológicas su alcance para el manejo eficiente de la empresa, como también examinar el marco metodológico para evaluar, analizar e interpretar los resultados de la auditoría.', 
'Aplicar modelos matemáticos para la resolución de problemas, considerando el orden y la precisión. 
Diseñar en forma sistémica los procesos administrativos, financieros, productivos, sociales, ambientales, legales y técnicos; y, los datos generados, para dar solución a las necesidades de la organización y el mejoramiento continuo de sus procesos.
', 'Las clases combinan un enfoque conceptual con la participación activa del alumno en la realización de ejercicios en los que el alumno podrá practicar los contenidos teóricos adquiridos en las clases. Se valora la asistencia y participación en clase, mediante un sistema de evaluación continua.');

insert into asignaturas values ('CAR-00', '15050', 'Simulación', 4, 7, 'Dotar al estudiante de los conocimientos básicos para modelar un sistema y realizar la simulación del mismo, utilizando como herramientas a las funciones de distribución de probabilidad discretas y continuas, así como, con funciones empíricas adaptadas a las características de los eventos a evaluarse.', 'Aplicar modelos matemáticos para la resolución de problemas, considerando el orden y la precisión.
Emplear herramientas computacionales de cálculo numérico y simbólico, aplicando análisis matemático.
Solucionar problemas aplicando el razonamiento lógico, con algoritmos y procedimientos adecuados.
Analizar metodologías y herramientas tecnológicas, que mejor se ajusten a las necesidades de las organizaciones.
Experimentar diferentes alternativas de soluciones a problemas para la optimización de los procesos tecnológicos y búsqueda de nuevas oportunidades. Bajo la luz de los principios ignacianos, éticos y profesionales', 
'En esta asignatura se revisarán los fundamentos teóricos para realizar la simulación de sistemas de carácter determinístico y estocástico, tomando como base el uso de las variables aleatorias.');

insert into asignaturasxprofesor values ('11402', '1706772082','2018-02');
insert into asignaturasxprofesor values ('15050', '1710664176','2018-02');

insert into asignaturasxestudiantes values ('1718926213', '15050', '1710664176','2018-02');
insert into asignaturasxestudiantes values ('1721635942', '15050', '1710664176','2018-02');

insert into unidades_estudio values ('11402', '11402-1','Los 10 principios de la economía', 1);
insert into unidades_estudio values ('11402', '11402-2','La interdependencia y las ganancias', 2);
insert into unidades_estudio values ('15050', '15050-1','Introducción', 1);
insert into unidades_estudio values ('15050', '15050-2','Prueba de bondad de ajuste', 2);

insert into temas_estudio values ('11402', '11402-1', '11402-1-1', '¿Cómo los individuos toman decisiones?', 1, '', 'T');
insert into temas_estudio values ('11402', '11402-2', '11402-1-2', '¿Cómo interactúan los individuos?', 2,'Desbloquea tema 2', 'E');
insert into temas_estudio values ('11402', '11402-2', '11402-1-3', '¿Cómo funciona la economía en su conjunto?', 3,'Desbloquea tema 3', 'E');
insert into temas_estudio values ('11402', '11402-1', '11402-2-1', 'Una parábola para la economía moderna.', 1,'Desbloquea tema 2', 'E');
insert into temas_estudio values ('11402', '11402-2', '11402-2-2', 'La ventaja comparativa es la fuerza motriz de la especialización.', 2,'', 'E');
insert into temas_estudio values ('15050', '15050-1', '15050-1-1',  'Estructura de los modelos de simulación', 1,'', 'E');
insert into temas_estudio values ('15050', '15050-1', '15050-2-1',  'Prueba de bondad de ajuste Chi-cuadrado', 1,'', 'E');
insert into temas_estudio values ('15050', '15050-1', '15050-2-2',  'Prueba de bondad de ajuste Anderson-Darling', 2,'', 'E');
insert into temas_estudio values ('15050', '15050-1', '15050-2-3',  'Prueba de bondad de ajuste Kolmogorov-Smirnov', 3,'', 'E');

insert into evaluaciones values ('11402-1-1','11402-1-1-01',  'Variable que produce un efecto multiplicador', 'Producto Interno Bruto','Inversión', 'Inflación','Gasto público','Inversión','El efecto multiplicador de la inversión es el incremento total de gasto que experimenta el conjunto de la economía al aumentar la inversión.');
insert into evaluaciones values ('11402-1-1','11402-1-1-02',  'Expresa el valor monetario de la producción de bienes y servicios de demanda final de un país o región durante un período determinado', 'Producto Interno Bruto','Inversión', 'Inflación','Gasto público','Producto Interno Bruto','El P.I.B. es un indicador macroeconómico que mide el comportamiento general y del tamaño de la economía de un país.');

insert into evaluaciones values ('11402-1-1','11402-1-1-03',  'Aumento generalizado y sostenido del nivel de precios existentes en el mercado durante un período de tiempo', 'Producto Interno Bruto','Inversión', 'Inflación','Gasto público','Inflación','Proceso económico provocado por el desequilibrio existente entre la producción y la demanda.');

insert into contenidos values('11402-1-1-C1','11402-1-1','11402','La inversión es una variable que produce un efecto multiplicador','','','','Sabías que....');
insert into contenidos values('11402-1-2-C1','11402-1-2','11402','El P.I.B.Expresa el valor monetario de la producción de bienes y servicios de demanda final de un país o región durante un período.','','','','');

insert into glosarios values('11402-1-1-C1-1','11402-1-1-C1','Economía','Ciencia social que estudia la forma de administrar los recursos disponibles');
insert into glosarios values('11402-1-1-C1-2','11402-1-1-C1','Elasticidad','Sensibilidad de variación que presenta una variable a los cambios experimentados por otra');
insert into glosarios values('11402-1-2-C1-1','11402-1-2-C1','Dolarización','Proceso por el cuál un país adopta de manera oficial o extraoficial el uso de la moneda estadounidense');

insert into talleres values('11402-1-1-01','11402-1-1','11402-1-1-01.pdf','11402-1-1-S01.pdf');
insert into talleres values('11402-1-2-01','11402-1-2','11402-1-2-01.pdf','11402-1-2-S01.pdf');

insert into anotaciones_estudiante values('1718926213', '11402-1-1-C1','Este tema es muy interesante, hay que estudiar esto para la prueba del día lunes. NO OLVIDAR!.', '1-11402-1-1-C1.jpg');


