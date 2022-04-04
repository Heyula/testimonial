<?php

declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Testimonial module for xoops
 *
 * @copyright    2021 XOOPS Project (https://xoops.org)
 * @license      GPL 2.0 or later
 * @package      testimonial
 * @since        1.0
 * @min_xoops    2.5.9
 * @author       B.Heyula - Email:eren@aymak.net - Website:http://erenyumak.com
 */
if (!\defined('XOOPS_ICONS32_PATH')) {
    \define('XOOPS_ICONS32_PATH', \XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/icons/32');
}
if (!\defined('XOOPS_ICONS32_URL')) {
    \define('XOOPS_ICONS32_URL', \XOOPS_URL . '/Frameworks/moduleclasses/icons/32');
}
\define('TESTIMONIAL_DIRNAME', 'testimonial');
\define('TESTIMONIAL_PATH', \XOOPS_ROOT_PATH . '/modules/' . \TESTIMONIAL_DIRNAME);
\define('TESTIMONIAL_URL', \XOOPS_URL . '/modules/' . \TESTIMONIAL_DIRNAME);
\define('TESTIMONIAL_ICONS_PATH', \TESTIMONIAL_PATH . '/assets/icons');
\define('TESTIMONIAL_ICONS_URL', \TESTIMONIAL_URL . '/assets/icons');
\define('TESTIMONIAL_IMAGE_PATH', \TESTIMONIAL_PATH . '/assets/images');
\define('TESTIMONIAL_IMAGE_URL', \TESTIMONIAL_URL . '/assets/images');
\define('TESTIMONIAL_UPLOAD_PATH', \XOOPS_UPLOAD_PATH . '/' . \TESTIMONIAL_DIRNAME);
\define('TESTIMONIAL_UPLOAD_URL', \XOOPS_UPLOAD_URL . '/' . \TESTIMONIAL_DIRNAME);
\define('TESTIMONIAL_UPLOAD_FILES_PATH', \TESTIMONIAL_UPLOAD_PATH . '/files');
\define('TESTIMONIAL_UPLOAD_FILES_URL', \TESTIMONIAL_UPLOAD_URL . '/files');
\define('TESTIMONIAL_UPLOAD_IMAGE_PATH', \TESTIMONIAL_UPLOAD_PATH . '/images');
\define('TESTIMONIAL_UPLOAD_IMAGE_URL', \TESTIMONIAL_UPLOAD_URL . '/images');
\define('TESTIMONIAL_UPLOAD_SHOTS_PATH', \TESTIMONIAL_UPLOAD_PATH . '/images/shots');
\define('TESTIMONIAL_UPLOAD_SHOTS_URL', \TESTIMONIAL_UPLOAD_URL . '/images/shots');
\define('TESTIMONIAL_ADMIN', \TESTIMONIAL_URL . '/admin/index.php');
$localLogo = \TESTIMONIAL_IMAGE_URL . '/b.heyula_logo.png';
// Module Information
$copyright = "<a href='http://erenyumak.com' title='XOOPS Project' target='_blank'><img src='" . $localLogo . "' alt='XOOPS Project' ></a>";
require_once \XOOPS_ROOT_PATH . '/class/xoopsrequest.php';
require_once \TESTIMONIAL_PATH . '/include/functions.php';
