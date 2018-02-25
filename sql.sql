CREATE TABLE `manager`(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL COMMENT '用户名',
  `password` VARCHAR(40) NOT NULL COMMENT '密码',
  `createtime` INT(6) NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`)
);