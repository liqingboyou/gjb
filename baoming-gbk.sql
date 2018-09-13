SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `member` (
  `member_user` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '账号',
  `member_password` char(32) COLLATE gbk_bin NOT NULL COMMENT '密码',
  `member_name` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '真实姓名',
  `member_bmsj` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '报名时间',
  `member_sex` varchar(2) COLLATE gbk_bin NOT NULL COMMENT '性别',
  `member_qq` varchar(12) COLLATE gbk_bin NOT NULL COMMENT 'QQ号',
  `member_phone` varchar(15) COLLATE gbk_bin NOT NULL COMMENT '手机号',
  `member_email` varchar(50) COLLATE gbk_bin NOT NULL COMMENT 'email',
  `member_csny` varchar(50) COLLATE gbk_bin NOT NULL COMMENT '出生年月',
  `member_sfzh` varchar(50) COLLATE gbk_bin NOT NULL COMMENT '身份证号',
  `member_mz` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '民族',
  `member_yxdz` varchar(50) COLLATE gbk_bin NOT NULL COMMENT '有效地址',
  `member_cszb` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '参赛组别',
  `member_jkzm` varchar(30) COLLATE gbk_bin NOT NULL COMMENT '健康证明',
  `member_sybx` varchar(30) COLLATE gbk_bin NOT NULL COMMENT '商业保险',
  `member_zu` varchar(50) COLLATE gbk_bin NOT NULL COMMENT '备注',
  PRIMARY KEY (`member_user`),
  UNIQUE KEY `member_account` (`member_user`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk COLLATE=gbk_bin;

