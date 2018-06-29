/*
Navicat MySQL Data Transfer

Source Server         : newObj
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ttyk

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-04-24 00:51:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `add_good_info`
-- ----------------------------
DROP TABLE IF EXISTS `add_good_info`;
CREATE TABLE `add_good_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `comm_id` int(11) NOT NULL COMMENT '评论id，与comment表同步',
  `comm_user` int(11) NOT NULL COMMENT '评论人 学生',
  `comm_tea` int(11) NOT NULL COMMENT '被评论人 老师',
  `add_good_user` int(11) NOT NULL COMMENT '点赞者id',
  `add_good_identify` int(11) NOT NULL COMMENT '点赞者身份，0学生，1教师',
  `add_good_state` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000' COMMENT '当前点赞状态，0未点赞，1已点赞。',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of add_good_info
-- ----------------------------
INSERT INTO `add_good_info` VALUES ('2', '15', '1', '7', '1', '1', '0000000000');
INSERT INTO `add_good_info` VALUES ('3', '14', '1', '7', '1', '1', '0000000001');

-- ----------------------------
-- Table structure for `attention`
-- ----------------------------
DROP TABLE IF EXISTS `attention`;
CREATE TABLE `attention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL COMMENT '学生id',
  `t_id` text COMMENT '老师id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of attention
-- ----------------------------
INSERT INTO `attention` VALUES ('61', '2', '5');
INSERT INTO `attention` VALUES ('62', '1', '7');
INSERT INTO `attention` VALUES ('64', '1', '6');
INSERT INTO `attention` VALUES ('65', '1', '5');
INSERT INTO `attention` VALUES ('66', '1', '1');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL AUTO_INCREMENT,
  `comm_user` int(11) DEFAULT NULL COMMENT '用户id',
  `comm_tea` int(11) DEFAULT NULL COMMENT '授课者id',
  `comm_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言内容',
  `comm_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '留言时间',
  `comm_good` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数目',
  PRIMARY KEY (`comm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '2', '1', '你的形象给了你高贵的个性，你的语言给了你敏锐的头脑，你的冷静给了你非凡的气质。', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('2', '1', '1', '你居然处惊不交，了不起。你为什么没有脾气，真奇怪  ', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('3', '3', '2', '你很有气质，有内涵，不爱讲话更显的很文静。你可是大家眼中的才女。', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('4', '4', '2', '确实很牛X', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('5', '1', '3', '如听君一席话，胜读十年书。人和名字一样美。气质非凡，年轻有为„', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('6', '2', '3', '内涵方面：心胸宽阔、乐于助人 身体方面：孔武有力、窈窕淑女', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('7', '3', '4', '有获得成功的坚定决心  举止优雅、性格好。', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('8', '4', '4', '思想成熟、上进心强，并具极丰富的人际关系技巧。精力旺盛、思想新潮思想成熟、上进心强，并具极丰富的人际关系技巧。精力旺盛、思想新潮思想成熟、上进心强，并具极丰富的人际关系技巧。精力旺盛、思想新潮', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('9', '1', '5', '你这种学习精神是可以成为我的榜样。', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('10', '2', '5', '你今天做的菜真香，我本来不想吃饭的，现在胃口大开，你简直是个大厨师', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('11', '3', '6', '如听君一席话，胜读十年书。人和名字一样美。气质非凡，年轻有为', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('12', '4', '6', '你很有品位 你很有天赋 你看上去帅呆了 你穿那种颜色很好看 你真幽默 你的个性很好', '2017.09.02', '0');
INSERT INTO `comment` VALUES ('13', '1', '1', '测试，能不能看到啊？', '2018-02-25 17:23:23', '0');
INSERT INTO `comment` VALUES ('14', '1', '7', '我喜欢你啊。', '2018-02-25 17:32:56', '2');
INSERT INTO `comment` VALUES ('15', '1', '7', '你看不到么？', '2018-02-25 17:38:29', '2');
INSERT INTO `comment` VALUES ('16', '1', '1', '我在测试，', '2018-03-04 19:10:09', '0');
INSERT INTO `comment` VALUES ('17', '1', '4', '测试数据哦。', '2018-03-05 20:52:36', '0');
INSERT INTO `comment` VALUES ('18', '1', '6', 'ceshi', '2018-04-07 16:03:46', '0');

-- ----------------------------
-- Table structure for `honor`
-- ----------------------------
DROP TABLE IF EXISTS `honor`;
CREATE TABLE `honor` (
  `honor_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `person` int(11) DEFAULT NULL COMMENT '授课者id',
  `honor_time` varchar(11) CHARACTER SET utf8 DEFAULT NULL COMMENT '获奖时间',
  `honor_medal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '奖项名字',
  `honor_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '奖项图像信息',
  PRIMARY KEY (`honor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of honor
-- ----------------------------
INSERT INTO `honor` VALUES ('1', '1', '2016.08.01', '教师资格证书', '/static/honorImg/1.jpg');
INSERT INTO `honor` VALUES ('2', '1', '2016.08.01', '大学英语四级（425分过）', '/static/honorImg/4.jpg');
INSERT INTO `honor` VALUES ('3', '2', '2016.08.01', '研究生证书', '/static/honorImg/3.jpg');
INSERT INTO `honor` VALUES ('4', '2', '2016.08.01', '大学英语六级（425分过）', '/static/honorImg/4.jpg');
INSERT INTO `honor` VALUES ('5', '3', '2016.08.01', '普通话证书', '/static/honorImg/1.jpg');
INSERT INTO `honor` VALUES ('6', '3', '2016.08.01', '国家二级计算机', '/static/honorImg/2.jpg');
INSERT INTO `honor` VALUES ('7', '4', '2016.08.01', '牛人证书', '/static/honorImg/3.jpg');
INSERT INTO `honor` VALUES ('8', '4', '2016.08.01', '傻子证书', '/static/honorImg/4.jpg');
INSERT INTO `honor` VALUES ('9', '5', '2016.08.01', '国家一级运动员', '/static/honorImg/1.jpg');
INSERT INTO `honor` VALUES ('10', '5', '2016.08.01', '模特证书', '/static/honorImg/1.jpg');
INSERT INTO `honor` VALUES ('11', '6', '2016.08.01', '旅游证书', '/static/honorImg/2.jpg');
INSERT INTO `honor` VALUES ('12', '6', '2016.08.01', '翻译官', '/static/honorImg/3.jpg');
INSERT INTO `honor` VALUES ('13', '6', '2016.08.01', '建筑师证书', '/static/honorImg/4.jpg');

-- ----------------------------
-- Table structure for `join_class`
-- ----------------------------
DROP TABLE IF EXISTS `join_class`;
CREATE TABLE `join_class` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `c_id` int(11) DEFAULT NULL COMMENT '课程id',
  `s_id` int(11) DEFAULT NULL COMMENT '用户id',
  `t_id` int(11) DEFAULT NULL COMMENT '授课者id',
  `t_name` varchar(255) DEFAULT NULL COMMENT '授课者姓名',
  `c_subject` varchar(255) DEFAULT NULL COMMENT '课程信息',
  `join_time` varchar(255) DEFAULT NULL COMMENT '用户加入课程的时间',
  `start_time` varchar(255) DEFAULT NULL COMMENT '课程开始时间',
  `end_time` varchar(255) DEFAULT NULL COMMENT '课程结束时间',
  `c_address` varchar(255) DEFAULT NULL COMMENT '课程地址',
  `t_tel` varchar(255) DEFAULT NULL COMMENT '授课者电话',
  `j_state` int(11) DEFAULT NULL COMMENT '当前课程状态，0待开始，1进行中，2完结，3审核中，4被拒绝',
  `j_img` varchar(255) DEFAULT NULL,
  `j_read` int(11) unsigned zerofill NOT NULL DEFAULT '00000000000' COMMENT '审核结果是否被用户查阅，默认未被查阅，状态0；已查阅状态为1.',
  `j_check` int(11) unsigned zerofill DEFAULT '00000000000' COMMENT '审核结果状态。默认0，已审核通过状态1，拒绝为2.',
  `j_checktime` datetime DEFAULT NULL COMMENT '审核处理时间。',
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of join_class
-- ----------------------------
INSERT INTO `join_class` VALUES ('17', '9', '2', '5', '田可', '吃牛', '2017-08-22 13:41:32', '2017.9.20', null, '学府写字楼901室', '13234663826', '0', null, '00000000000', '00000000000', null);
INSERT INTO `join_class` VALUES ('18', '9', '3', '5', '田可', '吃牛', '2017-08-25 18:30:18', '2017.9.20', null, '学府写字楼901室', '13234663826', '0', null, '00000000000', '00000000000', null);
INSERT INTO `join_class` VALUES ('19', '13', '1', '1', '单伟', '语文', '2018-02-25 17:23:35', '面议', null, '面议', '面议', '1', null, '00000000000', '00000000001', '2018-03-04 18:01:27');
INSERT INTO `join_class` VALUES ('23', '8', '1', '4', '郑文华', '数学', '2018-03-01 22:31:14', '2017.9.20', null, '学府写字楼901室', '13234663826', '3', null, '00000000000', '00000000000', '2018-03-03 12:00:15');
INSERT INTO `join_class` VALUES ('24', '6', '1', '3', '陈大江', '音乐', '2018-03-02 10:22:50', '2017.9.20', null, '学府写字楼901室', '13234663826', '3', null, '00000000000', '00000000002', '2018-03-04 10:50:33');
INSERT INTO `join_class` VALUES ('26', '1', '1', '1', '单伟', '前端开发', '2018-04-21 12:09:01', '2017-09-20 00:00:00', '2018-04-21 12:00:34', '学府写字楼912室', '13234663826', '2', null, '00000000000', '00000000001', '2018-04-21 12:10:32');
INSERT INTO `join_class` VALUES ('28', '1', '2', '1', '单伟', '前端开发', '2018-04-21 12:13:20', '2017-09-20 00:00:00', '2018-04-21 12:00:34', '学府写字楼912室', '13234663826', '2', null, '00000000000', '00000000001', '2018-04-21 12:32:24');
INSERT INTO `join_class` VALUES ('29', '1', '3', '1', '单伟', '前端开发', '2018-04-21 12:16:00', '2017-09-20 00:00:00', '2018-04-21 12:00:34', '学府写字楼912室', '13234663826', '2', null, '00000000000', '00000000001', '2018-04-21 12:30:31');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '默认用户' COMMENT '用户名',
  `account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '账号',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `sex` varchar(255) COLLATE utf8_unicode_ci DEFAULT '1' COMMENT '性别',
  `beans` int(11) DEFAULT '0' COMMENT '豆豆数目',
  `says` varchar(255) COLLATE utf8_unicode_ci DEFAULT '该用户还没有写签名。' COMMENT '个性签名....',
  `tickets` int(11) DEFAULT '0' COMMENT '优惠券',
  `attention_num` int(11) DEFAULT '0' COMMENT '关注授课者数目',
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT '/static/teaImg/36默认头像.png' COMMENT '头像',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '电话',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT '尚未填写' COMMENT '住址',
  `identify` int(11) DEFAULT '0' COMMENT '身份标识位',
  `skin` varchar(255) COLLATE utf8_unicode_ci DEFAULT '../../../static/img/skin/2.jpg' COMMENT '皮肤',
  `age` int(11) NOT NULL COMMENT '年龄',
  `is_admin` int(11) DEFAULT '0' COMMENT '是否是管理员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '单伟同学', 'ss', 'ss', '女', '700', '一蓑烟雨任平生', '6', '4', '/static/stuImg/user.png', '18954776666', '哈尔滨', '0', '/static/img/skin/2.jpg', '0', '0');
INSERT INTO `student` VALUES ('2', '玉罗刹同学', 'aa', 'aa', '女', '1200', '一顾倾人城,再顾倾人国', '7', '4', '/static/stuImg/user.png', '13351784272', '哈尔滨', '0', '/static/img/skin/5.jpg', '0', '0');
INSERT INTO `student` VALUES ('3', '陈江同学', 'cc', 'cc', '男', '500', '学习使我快乐.', '1', '0', '/static/stuImg/user.png', '13353422342', '四川', '0', '/static/img/skin/4.jpg', '0', '0');
INSERT INTO `student` VALUES ('4', '流川枫同学', 'qq', 'qq', '男', '200', '樱木花道是谁?', '1', '3', '/static/stuImg/user.png', '13333333333', '哈尔滨', '0', '/static/img/skin/1.jpg', '10', '0');
INSERT INTO `student` VALUES ('5', '李飞', 'lifei', 'lifei', '男', '0', '', '0', '0', '/static/stuImg/36默认头像.png', '18954776616', '地球', '0', '../../../static/img/skin/2.jpg', '0', '0');

-- ----------------------------
-- Table structure for `teacher`
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '用户' COMMENT '姓名',
  `sex` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '性别',
  `school` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学校',
  `xueli` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学历',
  `exp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '教育经历',
  `area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '活动地区',
  `dowell` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '科目 首页六大类中的一种',
  `major` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '主要科目',
  `jianjie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '个人简介',
  `years` int(11) DEFAULT '0' COMMENT '执教经验',
  `img` varchar(255) CHARACTER SET utf8 DEFAULT '/static/teaImg/36默认头像.png' COMMENT '头像',
  `price1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '价格1',
  `price2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '价格2',
  `real_name` int(11) DEFAULT NULL COMMENT '是否实名',
  `grade` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '教授年级',
  `wx_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '微信头像',
  `identify` int(11) DEFAULT '1' COMMENT '身份标识位',
  `account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '账号',
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '密码',
  `skin` varchar(255) COLLATE utf8_unicode_ci DEFAULT '../../../static/img/skin/2.jpg' COMMENT '个人中心皮肤',
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '教师手机号码',
  `is_admin` int(11) unsigned DEFAULT '0' COMMENT '是否是管理员 管理员为1，非管理员为0',
  `is_check` int(10) unsigned DEFAULT '0' COMMENT '是否通过审核 未通过为0，通过为1.管理员为2',
  `reg_time` datetime DEFAULT NULL COMMENT '注册时间',
  `is_checktime` datetime DEFAULT NULL COMMENT '审核通过时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', '单老师', '女', '哈佛大学', '博士', '从事IT行业大牛，人人称赞', '道外区', '语文', '说人话', '主攻高中生物，对高中生物教材，习题以及高考串讲相关内容有详细了解，具备丰富的一对一，一对多经验。其次高中物理，对物理学科有独特的教学方法，主讲知识点以及答题技巧，只讲精髓通俗易懂，让学生不再惧怕物理学科，补习学生反馈进步很大。另外英语具备大学四六级考试证书，可以带小学初中的英语教学，并以与相应的普通口语教学。', '8', '/static/teaImg/36默认头像.png', '666', '80', '1', '一年级二年级', '/static/wxImg/1.gif', '1', 'sw', 'sw', '/static/img/skin/4.jpg', '18954776616', '0', '1', null, null);
INSERT INTO `teacher` VALUES ('2', '刘老师', '男', '剑桥大学', '博士', '烤串行业一条龙', '道里区', '数学', '计算机', '主攻高中生物，对高中生物教材，习题以及高考串讲相关内容有详细了解，具备丰富的一对一，一对多经验。其次高中物理，对物理学科有独特的教学方法，主讲知识点以及答题技巧，只讲精髓通俗易懂，让学生不再惧怕物理学科，补习学生反馈进步很大。另外英语具备大学四六级考试证书，可以带小学初中的英语教学，并以与相应的普通口语教学', '4', '/static/teaImg/36默认头像.png', '77', '70', '1', '三年级四年级', '/static/wxImg/1.gif', '1', 'lhy', 'lhy', null, '0', '0', '1', null, null);
INSERT INTO `teacher` VALUES ('3', '陈老师', '男', '加里敦大学', '本科', '学府四道街扛把子', '南岗区', '英语', '自动化', '主攻高中生物，对高中生物教材，习题以及高考串讲相关内容有详细了解，具备丰富的一对一，一对多经验。其次高中物理，对物理学科有独特的教学方法，主讲知识点以及答题技巧，只讲精髓通俗易懂，让学生不再惧怕物理学科，补习学生反馈进步很大。另外英语具备大学四六级考试证书，可以带小学初中的英语教学，并以与相应的普通口语教学', '3', '/static/teaImg/36默认头像.png', '888', '60', '1', '五年级六年级七年级', '/static/wxImg/1.gif', '1', 'cdj', 'cdj', null, '0', '0', '1', null, null);
INSERT INTO `teacher` VALUES ('4', '郑老师', '女', '黑龙江大学', '本科', '学府第一美女', '香坊区', '化学', '会计', '主攻高中生物，对高中生物教材，习题以及高考串讲相关内容有详细了解，具备丰富的一对一，一对多经验。其次高中物理，对物理学科有独特的教学方法，主讲知识点以及答题技巧，只讲精髓通俗易懂，让学生不再惧怕物理学科，补习学生反馈进步很大。另外英语具备大学四六级考试证书，可以带小学初中的英语教学，并以与相应的普通口语教学', '2', '/static/teaImg/36默认头像.png', '999', '50', '1', '七年级八年级', '/static/wxImg/1.gif', '1', 'zwh', 'zwh', '/static/img/skin/1.jpg', '0', '0', '1', null, null);
INSERT INTO `teacher` VALUES ('5', '田老师', '女', '哈理工大学', '本科', '虽面目可憎，但内心龌龊', '平房区', '物理', '软件工程', '主攻高中生物，对高中生物教材，习题以及高考串讲相关内容有详细了解，具备丰富的一对一，一对多经验。其次高中物理，对物理学科有独特的教学方法，主讲知识点以及答题技巧，只讲精髓通俗易懂，让学生不再惧怕物理学科，补习学生反馈进步很大。另外英语具备大学四六级考试证书，可以带小学初中的英语教学，并以与相应的普通口语教学', '2', '/static/teaImg/36默认头像.png', '200', '40', '1', '九年级高一', '/static/wxImg/1.gif', '1', 'tk', 'tk', null, '0', '0', '1', null, null);
INSERT INTO `teacher` VALUES ('6', '王老师', '女', '平壤帝国大学', '大专', '棒子国大王，人称猪三百', '呼兰区', '艺术特长', '核武器', '举头三尺有神明', '10', '/static/teaImg/36默认头像.png', '200', '40', '1', '高二高三', '/static/wxImg/1.gif', '1', 'jsp', 'jsp', null, '0', '0', '1', null, null);
INSERT INTO `teacher` VALUES ('7', '赵老师', '女', '东北林业大学', '本科', '可爱淘', '香坊区', '英语', '计算机', '主攻高中', '1', '/static/teaImg/36默认头像.png', '300', '400', '1', '高一啊', '/static/wxImg/1.gif', '1', 'zrr', 'zrr', null, '0', '0', '1', null, null);
INSERT INTO `teacher` VALUES ('8', '管理员', '女', '东北林业', '本科', '可爱淘', '香坊区', '管理', '计算机', '哈哈', '10', '/static/teaImg/36默认头像.png', '22', '22', '1', '所有', '/static/wxImg/1.gif', '1', 'admin', 'admin', '/static/img/skin/5.jpg', '18888888888', '1', '2', '2018-04-27 22:20:49', '2018-04-27 22:20:55');
INSERT INTO `teacher` VALUES ('16', '赵睿', '男', '东北林业大学', '本科', null, '青海', '语文', '计算机', '123', '2', '/static/teaImg/36默认头像.png', null, null, null, null, null, '1', 'zhaorui', 'zhaorui', '../../../static/img/skin/2.jpg', '18954776616', '0', '1', '2018-04-22 00:00:00', '2018-04-22 21:58:51');

-- ----------------------------
-- Table structure for `tea_class`
-- ----------------------------
DROP TABLE IF EXISTS `tea_class`;
CREATE TABLE `tea_class` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) DEFAULT NULL COMMENT '授课者id',
  `c_name` varchar(255) DEFAULT NULL COMMENT '授课者姓名',
  `c_grade` varchar(255) DEFAULT NULL COMMENT '课程适应年级',
  `c_subject` varchar(255) DEFAULT NULL COMMENT '课程名',
  `c_describe` varchar(255) DEFAULT NULL COMMENT '课程描述',
  `c_price` int(11) DEFAULT NULL COMMENT '课程价格',
  `c_method` varchar(255) DEFAULT NULL COMMENT '授课方式',
  `c_try` int(11) DEFAULT NULL COMMENT '是否可以试听',
  `c_time` varchar(255) DEFAULT NULL COMMENT '课程注册时间',
  `start_time` datetime DEFAULT NULL COMMENT '课程开始时间',
  `end_time` datetime DEFAULT NULL COMMENT '课程结束时间',
  `c_address` varchar(255) DEFAULT NULL COMMENT '授课地点',
  `c_num` int(11) DEFAULT '0' COMMENT '选择该门课程的人数',
  `t_tel` varchar(255) NOT NULL COMMENT '联系电话',
  `c_state` int(11) DEFAULT '3' COMMENT '课程状态 0待开始，1进行中，2完结，3审核中，4被拒绝',
  `c_check` int(10) unsigned DEFAULT '0' COMMENT '课程当前注册状态，默认0，是否通过审核 1通过2未通过',
  `c_checktime` datetime DEFAULT NULL COMMENT '课程审核时间',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tea_class
-- ----------------------------
INSERT INTO `tea_class` VALUES ('1', '1', '单老师', '高三', '语文', '很好', '222', '面议', '1', '2018-04-21 12:48:49', '2018-01-10 00:00:00', '2018-05-01 00:00:00', '黑大', '0', '18954776616', '1', '1', null);
INSERT INTO `tea_class` VALUES ('3', '2', '刘红玉', '初一', '物理', '物理大牛', '50', '电话预约', '1', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼912室', '1', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('4', '2', '刘红玉', '初二', '化学', '带你飞的更高', '40', '电话预约', '0', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼901室', '1', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('5', '3', '陈大江', '初三', '文学', '文艺青年欢乐多', '88', '见面详谈', '1', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼901室', '0', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('6', '3', '陈大江', '高三', '音乐', '说了是文艺青年', '77', '电话预约', '0', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼901室', '1', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('7', '4', '郑文华', '六年级', '语文', '美女一枚', '66', '电话预约', '1', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼901室', '1', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('8', '4', '郑文华', '五年级', '数学', '本来吃亏', '55', '电话预约', '0', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼901室', '1', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('9', '5', '田可', '一年级', '吃牛', '牛仔天上飞', '33', '电话预约', '1', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼901室', '3', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('10', '5', '田可', '二年级', '生物', '牛羊成群', '45', '电话预约', '0', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼901室', '0', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('11', '6', '金三胖', '大一', '核武器', '就问你怕不怕', '999', '见面详谈', '1', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼901室', '0', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('12', '6', '金三胖', '大二', '理发', '看我发型就懂', '555', '见面详谈', '0', '2017.9.9', '2017-09-20 00:00:00', null, '学府写字楼901室', '1', '13234663826', null, '1', null);
INSERT INTO `tea_class` VALUES ('13', '16', '赵睿', '高一', '语文', '学习语文文言文。', '100', '远程', '1', '2018-04-24 00:05:02', '2018-04-24 00:00:00', '2018-05-01 00:00:00', '东北林业大学', '0', '18954776616', '3', '1', '2018-04-24 00:17:37');
