# SQL Dump for testimonial module
# PhpMyAdmin Version: 4.0.4
# https://www.phpmyadmin.net
#
# Host: form.erenyumak.com
# Generated on: Sat Apr 02, 2022 to 20:58:11
# Server version: 5.5.5-10.2.43-MariaDB
# PHP Version: 7.4.27

#
# Structure table for `testimonial_testimonials` 6
#

CREATE TABLE `testimonial_testimonials` (
  `testi_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `testi_title` VARCHAR(255) NOT NULL DEFAULT '',
  `testi_descr` MEDIUMTEXT NULL ,
  `testi_img` VARCHAR(200) NOT NULL DEFAULT '',
  `testi_profession` VARCHAR(255) NOT NULL DEFAULT '',
  `testi_date` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`testi_id`)
) ENGINE=InnoDB;

