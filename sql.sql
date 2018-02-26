/**
管理员表
 */
CREATE TABLE IF NOT EXISTS `manager`(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL COMMENT '用户名',
  `password` VARCHAR(40) NOT NULL COMMENT '密码',
  `createtime` INT(6) NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`)
);

/**
会员表
 */
CREATE TABLE IF NOT EXISTS `member`(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL COMMENT '用户名',
  `password` VARCHAR(40) NOT NULL COMMENT '密码',
  `createtime` INT(6) NULL DEFAULT 0 COMMENT '创建时间',
  `avatar` VARCHAR(255) NULL COMMENT '图像',
  `weixin` VARCHAR(200) NULL COMMENT '微信号',
  `qq` VARCHAR(20) NULL COMMENT 'QQ号',
  `gender` TINYINT NULL DEFAULT -1 COMMENT '性别，默认－1,男0，女1',
  `birthday` DATE NULL COMMENT '出生年月',
  `oid` INT(10) NULL DEFAULT 0 COMMENT '职业ID',
  PRIMARY KEY (`id`)
);

/**
职业表
 */
CREATE TABLE IF NOT EXISTS `occupation`(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `parent_id` INT(10) NULL DEFAULT 0 COMMENT '上级ID',
  `title` VARCHAR(255) NOT NULL COMMENT '职业名称',
  `order_by` INT(10) NULL DEFAULT 0 COMMENT '排序ID',
  PRIMARY KEY (`id`)
);