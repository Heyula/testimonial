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

require_once __DIR__ . '/common.php';

// ---------------- Admin Main ----------------
\define('_MI_TESTIMONIAL_NAME', 'Testimonial');
\define('_MI_TESTIMONIAL_DESC', 'Testimonial Module');
// ---------------- Admin Menu ----------------
\define('_MI_TESTIMONIAL_ADMENU1', 'Dashboard');
\define('_MI_TESTIMONIAL_ADMENU2', 'Testimonials');
\define('_MI_TESTIMONIAL_ADMENU3', 'Clone');
\define('_MI_TESTIMONIAL_ADMENU4', 'Feedback');
\define('_MI_TESTIMONIAL_ABOUT', 'About');
// ---------------- Admin Nav ----------------
\define('_MI_TESTIMONIAL_ADMIN_PAGER', 'Admin pager');
\define('_MI_TESTIMONIAL_ADMIN_PAGER_DESC', 'Admin per page list');
// User
\define('_MI_TESTIMONIAL_USER_PAGER', 'User pager');
\define('_MI_TESTIMONIAL_USER_PAGER_DESC', 'User per page list');
// Blocks
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK', 'Testimonials block');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_DESC', 'Testimonials block description');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_TESTIMONIAL', 'Testimonials block  TESTIMONIAL');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_TESTIMONIAL_DESC', 'Testimonials block  TESTIMONIAL description');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_LAST', 'Testimonials block last');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_LAST_DESC', 'Testimonials block last description');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_NEW', 'Testimonials block new');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_NEW_DESC', 'Testimonials block new description');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_HITS', 'Testimonials block hits');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_HITS_DESC', 'Testimonials block hits description');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_TOP', 'Testimonials block top');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_TOP_DESC', 'Testimonials block top description');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_RANDOM', 'Testimonials block random');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_RANDOM_DESC', 'Testimonials block random description');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_SPOTLIGHT', 'Testimonials block spotlight');
\define('_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_SPOTLIGHT_DESC', 'Testimonials block spotlight description');
// Config
\define('_MI_TESTIMONIAL_EDITOR_ADMIN', 'Editor admin');
\define('_MI_TESTIMONIAL_EDITOR_ADMIN_DESC', 'Select the editor which should be used in admin area for text area fields');
\define('_MI_TESTIMONIAL_EDITOR_USER', 'Editor user');
\define('_MI_TESTIMONIAL_EDITOR_USER_DESC', 'Select the editor which should be used in user area for text area fields');
\define('_MI_TESTIMONIAL_EDITOR_MAXCHAR', 'Text max characters');
\define('_MI_TESTIMONIAL_EDITOR_MAXCHAR_DESC', 'Max characters for showing text of a textarea or editor field in admin area');
\define('_MI_TESTIMONIAL_KEYWORDS', 'Keywords');
\define('_MI_TESTIMONIAL_KEYWORDS_DESC', 'Insert here the keywords (separate by comma)');
\define('_MI_TESTIMONIAL_SIZE_MB', 'MB');
\define('_MI_TESTIMONIAL_MAXSIZE_IMAGE', 'Max size image');
\define('_MI_TESTIMONIAL_MAXSIZE_IMAGE_DESC', 'Define the max size for uploading images');
\define('_MI_TESTIMONIAL_MIMETYPES_IMAGE', 'Mime types image');
\define('_MI_TESTIMONIAL_MIMETYPES_IMAGE_DESC', 'Define the allowed mime types for uploading images');
\define('_MI_TESTIMONIAL_MAXWIDTH_IMAGE', 'Max width image');
\define('_MI_TESTIMONIAL_MAXWIDTH_IMAGE_DESC', 'Set the max width to which uploaded images should be scaled (in pixel)<br>0 means, that images keeps the original size. <br>If an image is smaller than maximum value then the image will be not enlarge, it will be save in original width.');
\define('_MI_TESTIMONIAL_MAXHEIGHT_IMAGE', 'Max height image');
\define('_MI_TESTIMONIAL_MAXHEIGHT_IMAGE_DESC', 'Set the max height to which uploaded images should be scaled (in pixel)<br>0 means, that images keeps the original size. <br>If an image is smaller than maximum value then the image will be not enlarge, it will be save in original height');
\define('_MI_TESTIMONIAL_NUMB_COL', 'Number Columns');
\define('_MI_TESTIMONIAL_NUMB_COL_DESC', 'Number Columns to View');
\define('_MI_TESTIMONIAL_DIVIDEBY', 'Divide By');
\define('_MI_TESTIMONIAL_DIVIDEBY_DESC', 'Divide by columns number');
\define('_MI_TESTIMONIAL_TABLE_TYPE', 'Table Type');
\define('_MI_TESTIMONIAL_TABLE_TYPE_DESC', 'Table Type is the bootstrap html table');
\define('_MI_TESTIMONIAL_PANEL_TYPE', 'Panel Type');
\define('_MI_TESTIMONIAL_PANEL_TYPE_DESC', 'Panel Type is the bootstrap html div');
\define('_MI_TESTIMONIAL_IDPAYPAL', 'Paypal ID');
\define('_MI_TESTIMONIAL_IDPAYPAL_DESC', 'Insert here your PayPal ID for donations');
\define('_MI_TESTIMONIAL_SHOW_BREADCRUMBS', 'Show breadcrumb navigation');
\define('_MI_TESTIMONIAL_SHOW_BREADCRUMBS_DESC', 'Show breadcrumb navigation which displays the current page in context within the site structure');
\define('_MI_TESTIMONIAL_ADVERTISE', 'Advertisement Code');
\define('_MI_TESTIMONIAL_ADVERTISE_DESC', 'Insert here the advertisement code');
\define('_MI_TESTIMONIAL_MAINTAINEDBY', 'Maintained By');
\define('_MI_TESTIMONIAL_MAINTAINEDBY_DESC', 'Allow url of support site or community');
\define('_MI_TESTIMONIAL_BOOKMARKS', 'Social Bookmarks');
\define('_MI_TESTIMONIAL_BOOKMARKS_DESC', 'Show Social Bookmarks in the single page');
// ---------------- End ----------------
