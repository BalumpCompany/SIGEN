INSERT INTO usuario VALUES ('cliente', 'Usuario1', 'Cliente', 'cliente@gmail.com', '$2y$10$gmjz7ZQXRppBaviw1Qi02.1pvXZ4qkS2oyYQJGEv.Q4o1HjTee8pu', 'Cliente');
INSERT INTO usuario VALUES ('admin', 'Usuario2', 'Admin', 'Admin@gmail.com', '$2y$10$gmjz7ZQXRppBaviw1Qi02.1pvXZ4qkS2oyYQJGEv.Q4o1HjTee8pu', 'Admin');
INSERT INTO usuario VALUES ('coach', 'Usuario3', 'Coach', 'coach@gmail.com', '$2y$10$gmjz7ZQXRppBaviw1Qi02.1pvXZ4qkS2oyYQJGEv.Q4o1HjTee8pu', 'Coach');
INSERT INTO usuario VALUES ('avanzado', 'Usuario4', 'Avanzado', 'avanzado@gmail.com', '$2y$10$gmjz7ZQXRppBaviw1Qi02.1pvXZ4qkS2oyYQJGEv.Q4o1HjTee8pu', 'Avanzado');
INSERT INTO usuario VALUES ('seleccionador', 'Usuario5', 'Seleccionador', 'seleccionador@gmail.com', '$2y$10$gmjz7ZQXRppBaviw1Qi02.1pvXZ4qkS2oyYQJGEv.Q4o1HjTee8pu', 'Seleccionador');
INSERT INTO cliente VALUES (NULL,'Cliente','Cliente',CURRENT_DATE,1,CURRENT_DATE);
INSERT INTO escliente VALUES ('cliente',NULL);
INSERT INTO entrenador VALUES (NULL,'Entrenador');
INSERT INTO esentrenador VALUES ('coach',NULL);
INSERT INTO seleccionador VALUES (NULL,'Seleccionador');
INSERT INTO esseleccionador VALUES ('seleccionador',NULL);