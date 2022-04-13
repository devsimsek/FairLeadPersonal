/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;


# Dump of table author
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id`           int(11)      NOT NULL AUTO_INCREMENT,
    `email`     varchar(255)     NOT NULL DEFAULT '',
    `name`      varchar(255)     NOT NULL,
    `surname`   varchar(255)              DEFAULT NULL,
    `password`  longtext         NOT NULL,
    `image`     varchar(255)              DEFAULT 'placeholder.png',
    `details`   longtext,
    `rank`      int(11)          NOT NULL DEFAULT '0',
    `isActive`  int(11)          NOT NULL DEFAULT '0',
    `createdAt` varchar(255)              DEFAULT 'CURRENT_TIMESTAMP',
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users`
    DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `name`, `surname`, `password`, `image`, `details`, `rank`, `createdAt`, `isActive`)
VALUES (1, 'test@fairlead.com', 'Metin', 'Şimşek', 'testUser', 'placeholder.png', 'Test User, Remove in production.', 1,
        '2022-04-03 15:37:20', 1);

/*!40000 ALTER TABLE `users`
    ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`
(
    `id`           int(11)      NOT NULL AUTO_INCREMENT,
    `name`         varchar(255) NOT NULL DEFAULT '',
    `slug`         varchar(255) NOT NULL DEFAULT '',
    `isActive`     tinyint(1)   NOT NULL DEFAULT '1',
    `isNavigation` tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `slug` (`slug`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category`
    DISABLE KEYS */;

INSERT INTO `category` (`id`, `name`, `slug`, `isActive`, `isNavigation`)
VALUES (1, 'Covid-19', 'covid-19', 1, 1);

/*!40000 ALTER TABLE `category`
    ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table page
# ------------------------------------------------------------

DROP TABLE IF EXISTS `page`;

CREATE TABLE `page`
(
    `id`           int(11) NOT NULL AUTO_INCREMENT,
    `name`         varchar(255) DEFAULT NULL,
    `slug`         varchar(255) DEFAULT NULL,
    `content`      longtext,
    `isNavigation` tinyint(1)   DEFAULT '0',
    `isActive`     tinyint(1)   DEFAULT '0',
    `isLogin`      tinyint(1)   DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `slug` (`slug`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page`
    DISABLE KEYS */;

INSERT INTO `page` (`id`, `name`, `slug`, `content`, `isNavigation`, `isActive`, `isLogin`)
VALUES (1, 'About Us', 'about', '<h1>About Us</h1>\r\n\r\n<p>Example about us page.</p>\r\n', 1, 1, 0),
       (2, 'Panel Docs', 'panel-docs',
        '<h2>Welcome to Project FairLead!</h2>\r\n\r\n<p>With the panel you have access to, you can create, edit and delete (if its your own posts or if you are an editor) posts.</p>\r\n\r\n<p>It is simple to use.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Troubleshooting</h3>\r\n\r\n<p>If you have error please contact your editor.</p>\r\n\r\n<p>If you are editor and you don&#39;t know the solution, contact <a href=\"mailto:contact@fairlead.com\">fairlead developers</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\"><em>Thank you for buying fairlead software.</em><br />\r\n- Devsimsek, smskSoft</div>\r\n',
        0, 1, 0);

/*!40000 ALTER TABLE `page`
    ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table post
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post`
(
    `id`        int(11)      NOT NULL AUTO_INCREMENT,
    `author`  int(255)     NOT NULL,
    `title`     varchar(255)          DEFAULT NULL,
    `image`     varchar(255)          DEFAULT 'placeholder.png',
    `slug`      varchar(255) NOT NULL DEFAULT '',
    `category`  int(255)     NOT NULL,
    `summary`   varchar(400)          DEFAULT NULL,
    `content`   longtext,
    `isFlash`   tinyint(1)   NOT NULL DEFAULT '0',
    `isSlider`  tinyint(1)   NOT NULL DEFAULT '1',
    `isActive`  tinyint(1)   NOT NULL DEFAULT '1',
    `createdAt` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `parentCategoryID` (`category`),
    CONSTRAINT `parentCategoryID` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
    KEY `authorID` (`author`),
    CONSTRAINT `authorID` FOREIGN KEY (`author`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post`
    DISABLE KEYS */;

INSERT INTO `post` (`id`, `author`, `title`, `image`, `slug`, `category`, `summary`, `content`, `isFlash`, `isSlider`,
                    `isActive`, `createdAt`)
VALUES (1, 'devsimsek', 'GLOBAL PANDEMIC Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams Postponed, 168 Trains',
        'placeholder.png', 'covid-19-outbreak-live-updates', 1,
        'Want to see live updates about global pandemic? Then you need to see our post.', 'Live updates daily.', 1, 1,
        1, '2021-08-22 13:36:40');

/*!40000 ALTER TABLE `post`
    ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings`
(
    `id`       int(11)      NOT NULL AUTO_INCREMENT,
    `field`    varchar(255) NOT NULL DEFAULT '',
    `value`    varchar(255)          DEFAULT '',
    `category` varchar(255) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings`
    DISABLE KEYS */;

INSERT INTO `settings` (`id`, `field`, `value`, `category`)
VALUES (1, 'keywords', 'fairlead, news', 'seo'),
       (2, 'description',
        '<p>FairLead is your new entertainment, magazine, books, arts, sports, business and science news provider all in provided with english by young students from turkey!</p>\r\n',
        'seo');

/*!40000 ALTER TABLE `settings`
    ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table visit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `visit`;

CREATE TABLE `visit`
(
    `id`        int(11)      NOT NULL AUTO_INCREMENT,
    `count`     int(111)     NOT NULL DEFAULT '1',
    `page`      varchar(255) NOT NULL,
    `ipAddress` varchar(255) NOT NULL DEFAULT '',
    `visitedAt` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

LOCK TABLES `visit` WRITE;
UNLOCK TABLES;

/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
