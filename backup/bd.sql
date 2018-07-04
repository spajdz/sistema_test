CREATE TABLE `usuarios` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `perfil_id` BIGINT(20) NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `perfiles` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `perfil` VARCHAR(45) NULL,
  `activo` TINYINT(1) NULL,
  PRIMARY KEY (`id`));

  ALTER TABLE `usuarios`
  ADD KEY `IX_FK_USUARIO_PERFIL` (`perfil_id`);

  ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_USUARIOS_PERFIL` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
  
INSERT INTO `perfiles` (`perfil`, `activo`) VALUES ('Administrador', '1');
INSERT INTO `perfiles` (`perfil`, `activo`) VALUES ('Usuario', '1');
INSERT INTO `perfiles` (`perfil`, `activo`) VALUES ('Perfil Desactivado', '0');
