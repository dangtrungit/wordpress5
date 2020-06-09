CREATE TABLE `wp6_zendvn_mp_article`
(
    `id` INT
(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR
(255) CHARACTER
SET utf8
COLLATE utf8_general_ci NOT NULL,
    `picture` VARCHAR
(255) CHARACTER
SET utf8
COLLATE utf8_general_ci NOT NULL,
    `content` TEXT CHARACTER
SET utf8
COLLATE utf8_general_ci NOT NULL,
    `status` TINYINT
(4) NOT NULL DEFAULT '0',
    PRIMARY KEY
(`id`)
) ENGINE = INNODB CHARSET = utf8 COLLATE utf8_unicode_ci;

-- Lệnh reset ID
    "SET @num := 0;
    UPDATE your_table SET id = @num := (@num+1);
    ALTER TABLE your_table AUTO_INCREMENT =1;"
