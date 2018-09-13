SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `member` (
  `member_user` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '�˺�',
  `member_password` char(32) COLLATE gbk_bin NOT NULL COMMENT '����',
  `member_name` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '��ʵ����',
  `member_bmsj` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '����ʱ��',
  `member_sex` varchar(2) COLLATE gbk_bin NOT NULL COMMENT '�Ա�',
  `member_qq` varchar(12) COLLATE gbk_bin NOT NULL COMMENT 'QQ��',
  `member_phone` varchar(15) COLLATE gbk_bin NOT NULL COMMENT '�ֻ���',
  `member_email` varchar(50) COLLATE gbk_bin NOT NULL COMMENT 'email',
  `member_csny` varchar(50) COLLATE gbk_bin NOT NULL COMMENT '��������',
  `member_sfzh` varchar(50) COLLATE gbk_bin NOT NULL COMMENT '���֤��',
  `member_mz` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '����',
  `member_yxdz` varchar(50) COLLATE gbk_bin NOT NULL COMMENT '��Ч��ַ',
  `member_cszb` varchar(20) COLLATE gbk_bin NOT NULL COMMENT '�������',
  `member_jkzm` varchar(30) COLLATE gbk_bin NOT NULL COMMENT '����֤��',
  `member_sybx` varchar(30) COLLATE gbk_bin NOT NULL COMMENT '��ҵ����',
  `member_zu` varchar(50) COLLATE gbk_bin NOT NULL COMMENT '��ע',
  PRIMARY KEY (`member_user`),
  UNIQUE KEY `member_account` (`member_user`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk COLLATE=gbk_bin;

