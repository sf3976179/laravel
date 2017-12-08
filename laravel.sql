-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?07 �?13 �?09:47
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
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `ac_name` varchar(100) NOT NULL COMMENT '分类名称',
  `ac_parent_id` int(10) NOT NULL DEFAULT '0' COMMENT '父级id',
  `ac_subtitle` varchar(100) NOT NULL COMMENT '父标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章分类表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `ac_name`, `ac_parent_id`, `ac_subtitle`) VALUES
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
-- 表的结构 `article_content`
--

CREATE TABLE IF NOT EXISTS `article_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ac_id` varchar(20) NOT NULL DEFAULT '0' COMMENT '文章分类ID',
  `main_title` varchar(100) NOT NULL COMMENT '文章大标题',
  `subtitle` varchar(100) NOT NULL COMMENT '文章小标题',
  `ac_display` tinyint(3) NOT NULL DEFAULT '0' COMMENT '文章显示方式 0：公开 1：私人',
  `content` text COMMENT '文章内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章内容表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `article_content`
--

INSERT INTO `article_content` (`id`, `ac_id`, `main_title`, `subtitle`, `ac_display`, `content`) VALUES
(1, '1', '文章主标题1', '文章副标题1', 0, '文章内容1'),
(2, '2,3', '文章主标题2', '文章副标题2', 0, '文章内容2'),
(3, '2', '文章主标题3', '文章副标题3', 0, '文章内容3'),
(4, '3', '文章主标题4', '文章副标题4', 0, '文章内容4'),
(5, '7', '文章主标题5', '文章副标题5', 0, '文章内容5'),
(6, '0', '文章主标题5', '文章主标题5', 0, '文章主标题5'),
(7, '0', '文章主标题5', '文章主标题5', 0, '文章主标题5'),
(8, '0', '文章主标题5', '文章主标题5', 0, '文章主标题5'),
(9, '0', '文章主标题5', '文章主标题5', 0, '文章主标题5'),
(10, '0', '文章主标题5', '文章主标题5', 0, '文章主标题5'),
(11, '0', '文章主标题5', '文章主标题5', 0, '文章主标题5'),
(12, '0', '文章主标题5', '文章主标题5', 0, '文章主标题5');

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '樱桃不是红', '1148178607@qq.com', '$2y$10$hRf18b9PKILct0AtfomA2OSUDcIpxnE0P.iChnFPXBV.7.j9JKo1e', NULL, NULL, NULL),
(2, '张三', 'zhangsan@qq.com', '$2y$10$8Bi87Q5e27XKTbUXRZZk2eX1166GnEJGmligNmt/LpZyjHvxjn9XG', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
