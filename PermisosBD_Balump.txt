CREATE USER 'Balump_Admin_TI'@'localhost'
IDENTIFIED BY 'balump123'

CREATE USER 'Balump_Cliente'@'localhost'
IDENTIFIED BY 'balump123'

CREATE USER 'Balump_Entrenador'@'localhost'
IDENTIFIED BY 'balump123'

CREATE USER 'Balump_Administrador'@'localhost'
IDENTIFIED BY 'balump123'

CREATE USER 'Balump_Avanzado'@'localhost'
IDENTIFIED BY 'balump123'

CREATE USER 'Balump_Seleccionador'@'localhost'
IDENTIFIED BY 'balump123'

GRANT ALL PRIVILEGES ON heracles_bd TO 'Balump_Admin_TI'@'localhost';

GRANT SELECT ON heracles_bd.cliente TO 'Balump_Cliente'@'localhost';

GRANT SELECT ON heracles_bd.cliente TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.cliente TO 'Balump_Administrador'@'localhost';
GRANT INSERT ON heracles_bd.cliente TO 'Balump_Administrador'@'localhost';
GRANT UPDATE ON heracles_bd.cliente TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.cliente TO 'Balump_Avanzado'@'localhost';
GRANT INSERT ON heracles_bd.cliente TO 'Balump_Avanzado'@'localhost';
GRANT UPDATE ON heracles_bd.cliente TO 'Balump_Avanzado'@'localhost';
GRANT DELETE ON heracles_bd.cliente TO 'Balump_Avanzado'@'localhost';

GRANT SELECT ON heracles_bd.cliente TO 'Balump_Seleccionador'@'localhost';


GRANT SELECT ON heracles_bd.entrenador TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.entrenador TO 'Balump_Administrador'@'localhost';
GRANT INSERT ON heracles_bd.entrenador TO 'Balump_Administrador'@'localhost';
GRANT UPDATE ON heracles_bd.entrenador TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.entrenador TO 'Balump_Avanzado'@'localhost';
GRANT INSERT ON heracles_bd.entrenador TO 'Balump_Avanzado'@'localhost';
GRANT UPDATE ON heracles_bd.entrenador TO 'Balump_Avanzado'@'localhost';
GRANT DELETE ON heracles_bd.entrenador TO 'Balump_Avanzado'@'localhost';


GRANT SELECT ON heracles_bd.ejercicio TO 'Balump_Cliente'@'localhost';

GRANT SELECT ON heracles_bd.ejercicio TO 'Balump_Entrenador'@'localhost';
GRANT INSERT ON heracles_bd.ejercicio TO 'Balump_Entrenador'@'localhost';
GRANT UPDATE ON heracles_bd.ejercicio TO 'Balump_Entrenador'@'localhost';
GRANT DELETE ON heracles_bd.ejercicio TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.ejercicio TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.ejercicio TO 'Balump_Avanzado'@'localhost';
GRANT INSERT ON heracles_bd.ejercicio TO 'Balump_Avanzado'@'localhost';
GRANT UPDATE ON heracles_bd.ejercicio TO 'Balump_Avanzado'@'localhost';
GRANT DELETE ON heracles_bd.ejercicio TO 'Balump_Avanzado'@'localhost';


GRANT SELECT ON heracles_bd.calificacion TO 'Balump_Entrenador'@'localhost';
GRANT INSERT ON heracles_bd.calificacion TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.calificacion TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.calificacion TO 'Balump_Avanzado'@'localhost';
GRANT INSERT ON heracles_bd.calificacion TO 'Balump_Avanzado'@'localhost';
GRANT UPDATE ON heracles_bd.calificacion TO 'Balump_Avanzado'@'localhost';
GRANT DELETE ON heracles_bd.calificacion TO 'Balump_Avanzado'@'localhost';


GRANT SELECT ON heracles_bd.cronograma TO 'Balump_Cliete'@'localhost';

GRANT SELECT ON heracles_bd.cronograma TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.cronograma TO 'Balump_Administrador'@'localhost';
GRANT INSERT ON heracles_bd.cronograma TO 'Balump_Administrador'@'localhost';
GRANT UPDATE ON heracles_bd.cronograma TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.cronograma TO 'Balump_Avanzado'@'localhost';
GRANT INSERT ON heracles_bd.cronograma TO 'Balump_Avanzado'@'localhost';
GRANT UPDATE ON heracles_bd.cronograma TO 'Balump_Avanzado'@'localhost';
GRANT DELETE ON heracles_bd.cronograma TO 'Balump_Avanzado'@'localhost';


GRANT SELECT ON heracles_bd.deportes TO 'Balump_Cliete'@'localhost';

GRANT SELECT ON heracles_bd.deportes TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.deportes TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.deportes TO 'Balump_Avanzado'@'localhost';
GRANT INSERT ON heracles_bd.deportes TO 'Balump_Avanzado'@'localhost';
GRANT UPDATE ON heracles_bd.deportes TO 'Balump_Avanzado'@'localhost';
GRANT DELETE ON heracles_bd.deportes TO 'Balump_Avanzado'@'localhost';

GRANT SELECT ON heracles_bd.deportes TO 'Balump_Seleccionador'@'localhost';


GRANT SELECT ON heracles_bd.grupo_muscular TO 'Balump_Cliete'@'localhost';

GRANT SELECT ON heracles_bd.grupo_muscular TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.grupo_muscular TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.grupo_muscular TO 'Balump_Avanzado'@'localhost';
GRANT INSERT ON heracles_bd.grupo_muscular TO 'Balump_Avanzado'@'localhost';
GRANT UPDATE ON heracles_bd.grupo_muscular TO 'Balump_Avanzado'@'localhost';
GRANT DELETE ON heracles_bd.grupo_muscular TO 'Balump_Avanzado'@'localhost';

GRANT SELECT ON heracles_bd.grupo_muscular TO 'Balump_Seleccionador'@'localhost';


GRANT SELECT ON heracles_bd.fisioterapia TO 'Balump_Cliete'@'localhost';

GRANT SELECT ON heracles_bd.fisioterapia TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.fisioterapia TO 'Balump_Administrador'@'localhost';
GRANT INSERT ON heracles_bd.fisioterapia TO 'Balump_Administrador'@'localhost';
GRANT UPDATE ON heracles_bd.fisioterapia TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.fisioterapia TO 'Balump_Avanzado'@'localhost';
GRANT INSERT ON heracles_bd.fisioterapia TO 'Balump_Avanzado'@'localhost';
GRANT UPDATE ON heracles_bd.fisioterapia TO 'Balump_Avanzado'@'localhost';
GRANT DELETE ON heracles_bd.fisioterapia TO 'Balump_Avanzado'@'localhost';

GRANT SELECT ON heracles_bd.fisioterapia TO 'Balump_Seleccionador'@'localhost';


GRANT SELECT ON heracles_bd.deportista TO 'Balump_Cliete'@'localhost';

GRANT SELECT ON heracles_bd.deportista TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.deportista TO 'Balump_Administrador'@'localhost';
GRANT INSERT ON heracles_bd.deportista TO 'Balump_Administrador'@'localhost';
GRANT UPDATE ON heracles_bd.deportista TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.deportista TO 'Balump_Avanzado'@'localhost';
GRANT INSERT ON heracles_bd.deportista TO 'Balump_Avanzado'@'localhost';
GRANT UPDATE ON heracles_bd.deportista TO 'Balump_Avanzado'@'localhost';
GRANT DELETE ON heracles_bd.deportista TO 'Balump_Avanzado'@'localhost';

GRANT SELECT ON heracles_bd.deportista TO 'Balump_Seleccionador'@'localhost';


GRANT SELECT ON heracles_bd.sede TO 'Balump_Cliete'@'localhost';

GRANT SELECT ON heracles_bd.sede TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.sede TO 'Balump_Administrador'@'localhost';

GRANT SELECT ON heracles_bd.sede TO 'Balump_Avanzado'@'localhost';

GRANT SELECT ON heracles_bd.sede TO 'Balump_Seleccionador'@'localhost';
GRANT INSERT ON heracles_bd.sede TO 'Balump_Seleccionador'@'localhost';
GRANT UPDATE ON heracles_bd.sede TO 'Balump_Seleccionador'@'localhost';
GRANT DELETE ON heracles_bd.sede TO 'Balump_Seleccionador'@'localhost';


GRANT SELECT ON heracles_bd.estado TO 'Balump_Cliete'@'localhost';

GRANT SELECT ON heracles_bd.estado TO 'Balump_Entrenador'@'localhost';
GRANT INSERT ON heracles_bd.estado TO 'Balump_Entrenador'@'localhost';
GRANT UPDATE ON heracles_bd.estado TO 'Balump_Entrenador'@'localhost';
GRANT DELETE ON heracles_bd.estado TO 'Balump_Entrenador'@'localhost';

GRANT SELECT ON heracles_bd.estado TO 'Balump_Seleccionador'@'localhost';