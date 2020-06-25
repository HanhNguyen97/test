
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `makh` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(30),
    `account` VARCHAR(30),
    `password` VARCHAR(30),
    `email` VARCHAR(30),
    `dateregister` DATE,
    `birthday` DATE,
    `gender` VARCHAR(100),
    `address` VARCHAR(500),
    `describe` VARCHAR(1000),
    `state` TINYINT,
    `delete` TINYINT,
    `phonenumber` VARCHAR(30),
    `avatar` VARCHAR(100),
    `code` VARCHAR(1000),
    PRIMARY KEY (`makh`)
) ENGINE=InnoDB CHARACTER SET='utf8' COLLATE='utf8_unicode_ci';

-- ---------------------------------------------------------------------
-- admin
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `account` VARCHAR(30),
    `password` VARCHAR(30),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8' COLLATE='utf8_unicode_ci';

-- ---------------------------------------------------------------------
-- items
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `item_name` VARCHAR(300),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8' COLLATE='utf8_unicode_ci';

-- ---------------------------------------------------------------------
-- posts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `itemid` INTEGER,
    `title` VARCHAR(500),
    `content` VARCHAR(30000),
    `describe` VARCHAR(1000),
    `image` VARCHAR(200),
    `date_create` DATETIME,
    `delete` TINYINT,
    PRIMARY KEY (`id`),
    INDEX `posts_fi_4a4f3b` (`itemid`),
    CONSTRAINT `posts_fk_4a4f3b`
        FOREIGN KEY (`itemid`)
        REFERENCES `items` (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8' COLLATE='utf8_unicode_ci';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
