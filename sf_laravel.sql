-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?12 �?15 �?10:07
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `laravel`
--

-- --------------------------------------------------------

--
-- 表的结构 `sf_admin_interface_menu`
--

CREATE TABLE IF NOT EXISTS `sf_admin_interface_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `p_id` int(10) DEFAULT NULL COMMENT '上级id',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `post_type` varchar(10) NOT NULL COMMENT '数据发送方式',
  `url` varchar(100) NOT NULL COMMENT '接口地址',
  `data` text NOT NULL COMMENT '接口数据',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='后台接口菜单' AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `sf_admin_interface_menu`
--

INSERT INTO `sf_admin_interface_menu` (`id`, `p_id`, `name`, `post_type`, `url`, `data`) VALUES
(1, NULL, '文章接口', '0', '', ''),
(2, NULL, '会员接口', '0', '', ''),
(3, 1, '文章点赞', 'GET', 'http://localhost/lumen/public/api/articleLiked/1', '{"headers":"token_moOFSzgiNacbBPOYrnREqn9Z3HuDvKq9F6VMDHFOzoCIHcqKOCDybyMA2dtf","body":"name_\\u5f20\\u4e09_\\u59d3\\u540d\\u540d\\u79f0,age_18_\\u5e74\\u9f84,city_\\u5929\\u6d25","Description":"get\\u4f20\\u503c(url\\u540e\\u9762\\u8ddf\\u6587\\u7ae0id),\\n                    headers\\u4f20token(\\u767b\\u5f55\\u9a8c\\u8bc1key)"}'),
(4, 1, '文章评论', 'POST', 'http://localhost/lumen/public/api/articleComment', '{"headers":"token_moOFSzgiNacbBPOYrnREqn9Z3HuDvKq9F6VMDHFOzoCIHcqKOCDybyMA2dtf","body":"parent_id-5-\\u9009\\u586b,article_id-2,comment-\\u6587\\u7ae02\\u5199\\u7684\\u4e0d\\u9519\\uff01\\uff01\\uff01","Description":"parent_id\\u4e3a\\u7236\\u7ea7id\\uff08\\u9009\\u586b\\uff09\\uff0carticle_id\\u4e3a\\u6587\\u7ae0id\\uff0ccomment\\u4e3a\\u6587\\u7ae0\\u8bc4\\u8bba"}'),
(5, 1, '文章内容增加', '0', '', ''),
(6, 1, '文章列表', '0', '', ''),
(7, NULL, '商品接口', '0', '', ''),
(8, 2, '会员信息', '0', '', ''),
(9, 2, '会员列表', '0', '', ''),
(10, 7, '商品分类增加', '0', '', ''),
(11, 1, '图片上传', '0', '', ''),
(12, 1, '文章分类录入', '0', '', ''),
(13, 2, '用户登录', '0', '', ''),
(14, 2, '用户注册', '0', '', ''),
(15, 2, '用户签到', '0', '', ''),
(16, 7, '商品分类列表', '0', '', ''),
(17, 7, '商品增加', '0', '', ''),
(18, 7, '商品规格属性增加', '0', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `sf_article`
--

CREATE TABLE IF NOT EXISTS `sf_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `ac_name` varchar(100) NOT NULL COMMENT '分类名称',
  `ac_parent_id` int(10) NOT NULL DEFAULT '0' COMMENT '父级id',
  `ac_subtitle` varchar(100) NOT NULL COMMENT '父标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章分类表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `sf_article`
--

INSERT INTO `sf_article` (`id`, `ac_name`, `ac_parent_id`, `ac_subtitle`) VALUES
(1, '文章分类1', 0, '副标题1'),
(2, '文章分类2', 0, '副标题2'),
(3, '文章分类3', 0, '副标题3'),
(4, '文章分类1.1', 1, '副标题4'),
(5, '文章分类1.2', 1, '副标题5'),
(6, '文章分类2.1', 2, '副标题6'),
(7, '文章分类2.2', 2, '副标题7'),
(8, '文章分类2.3', 2, '副标题8'),
(9, '文章分类3.1', 3, '副标题9');

-- --------------------------------------------------------

--
-- 表的结构 `sf_article_content`
--

CREATE TABLE IF NOT EXISTS `sf_article_content` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '会员ID',
  `ac_id` varchar(20) NOT NULL DEFAULT '0' COMMENT '文章分类ID',
  `main_title` varchar(100) NOT NULL COMMENT '文章大标题',
  `subtitle` varchar(100) NOT NULL COMMENT '文章小标题',
  `ac_tag` varchar(255) DEFAULT NULL COMMENT '自定义标签',
  `image_name` varchar(200) DEFAULT NULL COMMENT '图片名称',
  `ac_display` tinyint(3) NOT NULL DEFAULT '0' COMMENT '文章显示方式 0：公开 1：私人',
  `content` text COMMENT '文章内容',
  `add_time` int(10) NOT NULL COMMENT '文章添加时间',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章内容表' AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `sf_article_content`
--

INSERT INTO `sf_article_content` (`article_id`, `user_id`, `ac_id`, `main_title`, `subtitle`, `ac_tag`, `image_name`, `ac_display`, `content`, `add_time`) VALUES
(1, 1, '2,6', '《中国新歌声2》找回爆款感了？', '陈奕迅周杰伦互怼《淘汰》，刘欢被叶炫清唱哭，华少回归！', '中国新歌声,陈奕迅加盟,华少回归', '20170717013823408.jpg', 0, '<p><br/></p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">《中国新歌声》也许正在从一档高收视却渐露疲态的“过时的爆款“，重新找回真正的爆款的感觉。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">昨晚《中国新歌声2》首播有三宝：周杰伦陈奕迅互怼、刘欢被一首《从前慢》唱哭、华少回归。</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s6.sinaimg.cn/mw690/006b2MC4zy7cEJxnpGJ75" alt="" title="" style="max-width: 100%;"/></a></div></div><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s14.sinaimg.cn/mw690/006b2MC4zy7cEJCKdvn1d" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">段子手们终于从节目中找到了可供发挥的点。与过去导师开场一人一首别人的歌不同，这一次，《过把瘾》、《菊花台》等9首耳熟能详的歌由所有导师分组对唱，成为《中国新歌声》史上最长版本，也是难得一见的四位乐坛巨星同台的重量级“对决”——</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s10.sinaimg.cn/mw690/006b2MC4zy7cEJdKedH49" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">网友检验后一致认定：这一轮，还是陈奕迅老师胜出了。</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s4.sinaimg.cn/mw690/006b2MC4zy7cEJhVl3dc3" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">也有眼尖的网友发现周杰伦胖了，也更贫了，不过还是很喜欢。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">但节目最大的亮点，还是首期就发现了叶炫清。对于已经很久没出现爆款话题选手的这款王牌综艺来说，单靠导师阵容的大变化，已经很难撑住国内王牌音乐综艺的招牌。</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s12.sinaimg.cn/mw690/006b2MC4zy7cEHYrZdpbb" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">少有人意识到，《中国新歌声》正在面对一场尴尬的中年危机。上一届《新歌声》首播全国网收视率2.24%，总决赛的收视率为3.956%，虽取得整季《新歌声》最高收视纪录，但对比第四季《中国好声音》总决赛的收视率6.843%，依然出现断崖式的下跌。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">更令人尴尬的是，在周杰伦加盟的话题效应释放殆尽之后，节目的百度指数、豆瓣讨论度，都出现大幅度下降。简单来说，《新歌声》的收视率依然傲视群雄，但已经遭遇了严重的收视人群固化和观众审美疲劳。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">这一季，首播逐渐找回感觉的《中国新歌声2》，能做回真正的爆款音综吗？</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s5.sinaimg.cn/mw690/006b2MC4zy7cEIeY1Okb4" alt="" title="" style="max-width: 100%;"/></a><a style="color: rgb(153, 153, 153);" href="http://undefined">&nbsp;</a></div></div><h2 style="margin: 0px 0px 18px; padding: 0px; font-size: 24px; line-height: 38px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; white-space: normal;">新意思与旧套路：节目模式一成不变，新导师陈奕迅和胖了的周杰伦斗嘴，刘欢走心成亮点</h2><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">在缺席了一整季之后，观众终于又听到了中国好舌头华少熟悉的声音。但某种意义上说，节目目前最大的问题是熟悉感太多，变化太少。</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s13.sinaimg.cn/mw690/006b2MC4zy7cEI43sUAcc" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">从首期节目看，节目模式从上一季的换汤不换药，变成了汤也不换药也不换，迎面而来的，依然是导师选手们满满的套路、导师抢人存在感胜过选手演唱等等感觉，这当然影响了节目的新鲜感和冲击力。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">从模式来看，导师抢人及选手讲故事的时间依然很长，除了陈奕迅给唱自己的《无条件》却遭遇淘汰的选手，给出了专业的音乐上的点评，其它时间基本都被导师的插科打诨和选手充满套路的“我太激动了”占据，但对于观众来说，这样的电视效果显然有些太熟悉了。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">好的地方，是导师之间的相声段落，终于因为相声大师的变更，让段子讲出了新变化。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">段子最精彩的部分基本集中在陈奕迅和周杰伦的互怼。一次盲选中，等学员的歌曲结束，感到自己错过了优秀学员的Eason就开始后悔，对着已经加入杰伦战队的学员说：“好后悔，现在按可以吗？”老江湖周杰伦立刻无情地打击：“来不及了。”Eason继续对学员“真情告白”：“谢谢老天爷安排今天遇到你。”却被周杰伦立刻反弹：“你讲出这么洒狗血的话？”</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s5.sinaimg.cn/mw690/006b2MC4zy7cEIY4qYQ44" alt="" title="" style="max-width: 100%;"/></a><a style="color: rgb(153, 153, 153);" href="http://undefined">&nbsp;</a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">更精彩的是《淘汰》梗，这首歌是周杰伦为陈奕迅量身打造的歌曲，可当一位演唱这首《淘汰》的学员登场并被两人一起争抢时，周杰伦首先说：歌手都出来了，作者怎么能不拍？实力演绎“看热闹不嫌事儿大”的那英问周杰伦：“那你当时为什么要写一首《淘汰》给另外一位天王呢？”另一边Eason立刻乘胜追击，调侃杰伦写歌原来是想要“淘汰”自己，不料自己哼唱时却忘记了《淘汰》歌词，让杰伦连连质问起Eason：“我这么用心写的歌词，你竟然忘记？”</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s8.sinaimg.cn/mw690/006b2MC4zy7cEJN7caP07" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">总的来说，号称在家里想了很多好笑梗的陈奕迅，正像那英预言的，这个舞台上不一定好使，整体表现话不多，也没有把那个鬼马陈奕迅完全发挥出来，但和周杰伦的互怼部分，还是让人对陈奕迅后续的导师发挥充满期待。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">至于一向严肃的“老干部”刘欢，这次则化身为“网瘾大叔”，不仅对freestyle&nbsp;的梗轻松接住，还多次和几位导师亲切互动，显示出从《中国好歌曲》到《中国新歌声》的无缝衔接。</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s8.sinaimg.cn/mw690/006b2MC4zy7cEI7Iw3Z07" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">除此之外，刘欢还是全场最走心的导师，一首《从前慢》唱到刘欢当场流泪。刘欢直言：“从录制节目到现在，叶炫清是第一个打动我的人。”</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s14.sinaimg.cn/mw690/006b2MC4zy7cEJHURTn8d" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">尽管节目模式充满套路感，但导师之间的段子和新导师带来的新鲜感，还是将模式疲惫的尴尬变成有笑有泪的一场秀，问题在于导师的新鲜感可以撑多久？</p><h2 style="margin: 0px 0px 18px; padding: 0px; font-size: 24px; line-height: 38px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; white-space: normal;">选手的亮面与暗面：叶炫清成最大黑马，被陈奕迅周杰伦争抢的朱文婷遭耳帝质疑</h2><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">不过，纵使导师带来了一样 的套路不一样的演出，但首期节目最大的惊喜，还是终于在过去的影子中，发现了新的爆款选手。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">可以看到，今年的选人、选歌节目组都花了大力气，在上一季话题选手告急之后，首场比赛就想涵盖几乎所有类型的歌手和曲风的意图也很明显，从抒情、Bbox、嘻哈到爵士，只是在汪峰离开后，少了摇滚选手的演出，昨晚首批选手们的表现，成功呼应了往季：整体平淡，爆款突出。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">从本场最大的惊喜说起——作为出生在越剧故乡绍兴嵊州，家里三代都唱越剧的小姑娘，叶炫清最大的亮点就是走心，她说&nbsp;“我一听到这首歌，就想到了我的爷爷奶奶。想到他们之间恩爱的感情，从相识到现在。”叶炫清还大方地表示，明年正值两位老人的金婚，这首《从前慢》正是送给他们的纪念礼物。</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s11.sinaimg.cn/mw690/006b2MC4zy7cEIbw6fgfa" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">从音乐表现看，《从前慢》看似音域跨度不太大，但却很考验歌手对音乐气氛的控制，叶炫清很好地把握了音乐节奏、音准，但更重要的是唱出了音乐背后的情怀。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">再说开场的次仁拉吉的《穷开心》，很多人说让人想起第一季的吉克隽逸，音乐性表现地确实不错，可惜的是缺少了过往选手改编周杰伦的《双截棍》那种石破天惊的惊艳感。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">B-box世界亚军张泽《天气那么热》用B-box编曲也是相当带感，不足的地方是歌唱的部分有待加强，但被那英封为“嘴神”之后，这些新音乐元素的注入对于节目当然是一股新声音。</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s2.sinaimg.cn/mw690/006b2MC4zy7cEJJNrFv21" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">要说freestyle还是董姿彦的《恋曲1990》更有惊喜，爵士唱出小清新风，音乐一气呵成音乐感爆棚，一段freestyle自然不做作，有当年魏雪漫的惊艳。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">可是也有些选手的表现，遭到网友质疑认为节目成色不足。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">首当其冲是被四拍的朱文婷，一首《淘汰》虽然赢尽导师好评，但很明显高音部分其实不如低音部分亮眼，虽然是节目最需要的大嗓门歌手，但还没有拿出顶级大嗓门歌手的爆发力。耳帝对她的点评就更加不留情面：第一期节目这种水准还能四拍，很难想象以后的节目。</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s11.sinaimg.cn/mw690/006b2MC4zy7cEJ0FBzk3a" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">符荣鹏《无条件》除了粤语不够标准，第一段副歌不稳，更大的问题是太过紧张，没有唱出整首歌的完整感和情境感。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">综上，虽然看得出节目组在大力选人，但在音乐类综艺做了这么多年之后，带给人惊喜的更多还是叶炫清这样的新歌手，或者董姿彦这样的华裔歌手，而在被《从前慢》惊艳了一把耳朵之后，后续的选手能不能为节目刺激新的生命力，显然还继续观察，对于《新歌声》来说，没有比持续打造新的爆款选手更加重要的事情。</p><h2 style="margin: 0px 0px 18px; padding: 0px; font-size: 24px; line-height: 38px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; white-space: normal;">老爆款与新歌声：上一季被质疑充满疲态霸占收视冠军，《新歌声》能找回爆款感吗？</h2><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">没人可以否认，上一季的《中国新歌声》无论是口碑，收视，还是话题度都大不如前，但它依然是国内音乐类综艺的王牌。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">一方面，不断推新的音乐类综艺节目并没有消除观众的审美疲劳，除了打造出进口小哥、让林忆莲等老牌歌手翻红、帮助《成都》被更多人认识的《歌手》和凭借怀旧情怀和薛之谦制造话题的《金曲捞》之外，其它的音乐类综艺你刚唱罢我登场，却少有传唱度较广的金曲，也没有出现新的爆款挑战《新歌声》的霸主地位。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">但观众的审美疲劳却在不断加深，节目的环节设置上未见明显变化，整体模式并未有太大突破，第一季那样话题学员爆棚的情况再未出现过。只靠导师相声团的演出，节目能够撑多久的爆款呢？</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s15.sinaimg.cn/mw690/006b2MC4zy7cEIdaYns9e" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">从第二季回归看，《新歌声》终于出现了一丝复苏的苗头，除了新导师陈奕迅和老导师周杰伦互怼逗趣的相声段子，还出现了叶炫清这样的走心演唱的选手，但即使是王牌综艺《新歌声》也必须面对市场的过大浪淘金，单靠巨星的输出只会造成供给不足，节目要走出上一季的中年危机， “内容为王”依然是不变的道理，只有更多的选手和新歌成为爆款，引发话题进入二次传播，节目才能找回内容的生命力和 “现象级”的传播。</p><div style="color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal; line-height: 28px; padding-top: 5px;"><div style="padding: 0px 0px 34px; text-align: center; overflow: hidden; position: relative;"><a href="http://undefined" target="_blank" style="color: rgb(153, 153, 153);"><img src="http://s9.sinaimg.cn/mw690/006b2MC4zy7cEJ2DQO438" alt="" title="" style="max-width: 100%;"/></a></div></div><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">音乐综艺越来越多，但成为现象级却越来越难。最首要的原因是爆款模式越来越少，而曾经的爆款已经纷纷陷入疲态，当导师斗嘴+盲选已经成为《新歌声》的固定看点，只要按照此前的规律和经验做，收视肯定不会差到哪儿去，但实际上，节目正在离爆款渐行渐远。</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">陈奕迅和刘欢的加盟，当然有助于延缓节目的衰老症和中年疲惫感，但面对节目模式逐渐老化、新鲜感被同类综艺不断稀释、新人挖掘越来越难的情况，这款王牌综艺，该如何对抗观众的审美疲劳，用一批high歌狠狠地再次惊艳四座？</p><p style="margin-top: 0px; margin-bottom: 22px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;Microsoft Yahei&quot;, Simsun; font-size: 17px; white-space: normal;">这是一个快时代里，凭借一首《从前慢》重新叫醒观众耳朵的《中国新歌声2》，必须面对的问题。毕竟对于这款王牌音乐综艺来说，再逗趣的导师，也没有爆款级的“新歌声”管用。</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', 1500255507),
(27, 0, '2,6', '火影忍者护额多种佩戴法 我爱罗竟然绑在葫芦上！', '【游侠导读】不同忍者村的忍者佩戴护额的图案也不同，表示了自己的来历和身份。一起来看看吧！', '火影忍者,内容太多,无聊,新的文章,吐槽', '20170717075531927.jpg', 0, '<p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; border: 0px none; font-family: 微软雅黑; color: rgb(68, 68, 68); white-space: normal;"><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>火影忍者中的每一位忍者身上都会佩戴一种东西，那就是护额。忍者一般佩戴在额头，腰间，或手臂处。不同忍者村的忍者佩戴护额的图案也不同，表示了自己的来历和身份。戴在额头上主要是为了防止致命的袭击。为了突出个性，很多忍者都戴在身上的不同地方。</p><p style="margin-top: 10px; margin-bottom: 10px; padding: 0px; border: 0px none; font-family: 微软雅黑; color: rgb(68, 68, 68); white-space: normal;">　　小樱把护额戴在头上，只是别人都是水平戴着，她却竖直系着，是想突出大额头吗？</p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002781601492.jpg" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002781633694.jpg" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002781646286.jpg" style=""/></p><p><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;"><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>日向雏田的护额戴法有意思，直接戴在自己的脖子上，这样真的好吗，别人看护额的时候，视线会下移的，那胸器...厉害了。</span></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002782036418.jpg" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/1500278205793.jpg" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002782062879.jpg" style=""/></p><p><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;"><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>我爱罗的护额也很独特，直接戴在系葫芦的戴子上，看来我爱罗对待葫芦就如同自己的生命。</span></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002782417413.png" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002782427172.jpg" style=""/></p><p><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;">&nbsp; &nbsp; &nbsp; 卡卡西的护额是斜着戴在头上，并且挡住一只眼，那只眼正是带土的，卡卡西一般是隐藏起来的。</span></p><p><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;"></span></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002783175600.jpeg" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002783198837.jpeg" style=""/></p><p><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;"><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>小李的护额戴在腰上，还配了红腰带，这颜色搭配够醒目。</span><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;"><br/></span></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002783693659.jpg" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/1500278371317.jpg" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002783727805.jpg" style=""/></p><p><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;"><span style="color: rgb(68, 68, 68); font-family: 微软雅黑; white-space: normal;">&nbsp; &nbsp; &nbsp;&nbsp;</span>井野的戴法和小李的一样，都是戴在腰上，不同的是配了蓝色的腰带。</span>&nbsp;</p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002784231757.jpg" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002784241675.jpg" style=""/></p><p><img src="http://localhost/laravel/public/ueditor/php/upload/20170717/15002784255767.jpg" style=""/></p><p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', 1500278864);

-- --------------------------------------------------------

--
-- 表的结构 `sf_migrations`
--

CREATE TABLE IF NOT EXISTS `sf_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `sf_migrations`
--

INSERT INTO `sf_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_05_012429_add_votes_to_users_table', 1),
(4, '2017_07_07_024257_create_sessions_table', 1),
(5, '2017_11_29_054804_create_laravel_table', 1),
(6, '2017_12_15_074149_entrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sf_password_resets`
--

CREATE TABLE IF NOT EXISTS `sf_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `sf_permissions`
--

CREATE TABLE IF NOT EXISTS `sf_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='存储权限表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sf_permissions`
--

INSERT INTO `sf_permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-post', 'Create Posts', 'create new blog posts', '2017-12-15 01:54:05', '2017-12-15 01:54:05'),
(2, 'edit-user', 'Edit Users', 'edit existing users', '2017-12-15 01:54:05', '2017-12-15 01:54:05');

-- --------------------------------------------------------

--
-- 表的结构 `sf_permission_role`
--

CREATE TABLE IF NOT EXISTS `sf_permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='存储角色与权限之间的多对多关系';

-- --------------------------------------------------------

--
-- 表的结构 `sf_roles`
--

CREATE TABLE IF NOT EXISTS `sf_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='存储角色表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `sf_roles`
--

INSERT INTO `sf_roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(11, 'owner', 'Project Owner', 'User is the owner of a given project', '2017-12-15 01:46:15', '2017-12-15 01:46:15'),
(12, 'admin', 'User Administrator', 'User is allowed to manage and edit other users', '2017-12-15 01:46:32', '2017-12-15 01:46:32');

-- --------------------------------------------------------

--
-- 表的结构 `sf_role_user`
--

CREATE TABLE IF NOT EXISTS `sf_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='存储角色与用户之间的多对多关系';

-- --------------------------------------------------------

--
-- 表的结构 `sf_sessions`
--

CREATE TABLE IF NOT EXISTS `sf_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sf_user`
--

CREATE TABLE IF NOT EXISTS `sf_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_sex` tinyint(1) DEFAULT NULL COMMENT '会员性别（1：男 2：女）',
  `user_image` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '会员头像',
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '会员地址',
  `user_phone` char(11) CHARACTER SET utf8 DEFAULT NULL COMMENT '会员手机号',
  `user_tag` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '个人标签',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` int(10) DEFAULT '0' COMMENT '会员积分',
  `user_profile` text CHARACTER SET utf8 COMMENT '个人介绍',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '更新时间',
  `lastlogin_at` int(10) NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `sf_user`
--

INSERT INTO `sf_user` (`id`, `name`, `user_login`, `password`, `user_sex`, `user_image`, `address`, `user_phone`, `user_tag`, `remember_token`, `score`, `user_profile`, `created_at`, `updated_at`, `lastlogin_at`) VALUES
(1, 'sf', 'admin', '$2y$10$DeW7qrVMFnkozRa.VUWsvuWdFBq9sbCw1aNec4k.QVrdTzaI94S42', 1, '20171019013314615.png', '天津市和平区', '13120312032', 'H1Z1,绝地求生,OW', 'N5KNnBhZ88qdXcq8LJE02Xo11aroNhVcN9Z7KhVY', 0, '<p>&nbsp; &nbsp;大神。。。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', 1500255567, 0, 1500255507),
(2, '樱桃不是红', 'admin1', '$2y$2y$10$DeW7qrVMFnkozRa.VUWsvuWdFBq9sbCw1aNec4k.QVrdTzaI94S42', 1, '20171019013314615.png', '天津市和平区', '13120312032', 'H1Z1,绝地求生,OW', 'N5KNnBhZ88qdXcq8LJE02Xo11aroNhVcN9Z7KhVY', 0, '<p>&nbsp; &nbsp;大神。。。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', 1500255567, 0, 1500255507),
(3, '李四', 'asdasdas@11qe', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1500255517, 0, 1500255523),
(4, '请问', 'wrwe', '', NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, 1500255567, 0, 1500255507),
(5, 'Safari', 'esqeqwe', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1500255527, 0, 1500255507),
(6, '撒旦', 'asdas', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1500255501, 0, 1500255507),
(7, '阿瑟大', '23333', '', NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, 1500255532, 0, 1500255532),
(8, 'safas', '123333', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1500255507, 0, 1500255507),
(9, 'asfas', '12323232323', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1500255507, 0, 1500255507),
(10, 'asds', '123123123', '', NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, 1500255507, 0, 1500255507),
(11, '诶我去多群', '1222223', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1500255507, 0, 1500255507),
(12, 'weq', '21312312', '', NULL, NULL, NULL, NULL, NULL, NULL, 332, NULL, 1500255507, 0, 1500255501),
(13, 'wqe', '3123123', '', NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, 1500255507, 0, 1500255507),
(14, '请问请问', '123312', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1500255507, 0, 1500255507),
(15, '驱蚊器', '312312312', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1500255507, 0, 1500255507),
(16, 'sf', 'sf123456@qq.com', '$2y$10$pBUjAJAk9qOqBUN/qHqMOe/p8tFcC0.mhdGqC9nIHeuXsA/l8SqB2', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0),
(22, '张三', 'zhangsan@qq.com', '$2y$10$8Bi87Q5e27XKTbUXRZZk2eX1166GnEJGmligNmt/LpZ', NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 1500255527, 0, 1500255507);

-- --------------------------------------------------------

--
-- 表的结构 `sf_users`
--

CREATE TABLE IF NOT EXISTS `sf_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sf_users`
--

INSERT INTO `sf_users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'zhangsan', '', '', NULL, NULL, NULL);

--
-- 限制导出的表
--

--
-- 限制表 `sf_permission_role`
--
ALTER TABLE `sf_permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `sf_permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `sf_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `sf_role_user`
--
ALTER TABLE `sf_role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `sf_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `sf_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
