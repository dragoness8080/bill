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
  `realname` VARCHAR(100) NULL COMMENT '姓名',
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

/**
支付类型表
 */
CREATE TABLE IF NOT EXISTS `consumption`(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL COMMENT '消费类型',
  `order_by` INT(10) NULL DEFAULT 0 COMMENT '排行ID',
  PRIMARY KEY (`id`)
);

/**
消费日志表
 */
CREATE TABLE IF NOT EXISTS `consumption_log`(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` TEXT COMMENT '消费标题',
  `introduce` TEXT COMMENT '消费说明',
  `pay_time` INT(6) NOT NULL COMMENT '消费时间',
  `create_tiem` INT(6) NULL DEFAULT 0 COMMENT '记录时间',
  `money` DECIMAL(10,2) NOT NULL COMMENT '消费金额',
  PRIMARY KEY (`id`)
);