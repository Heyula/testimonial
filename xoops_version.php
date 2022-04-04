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

// 
$moduleDirName      = \basename(__DIR__);
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);
// ------------------- Informations ------------------- //
$modversion = [
    'name'                => \_MI_TESTIMONIAL_NAME,
    'version'             => '2.0',
    'description'         => \_MI_TESTIMONIAL_DESC,
    'author'              => 'B.Heyula',
    'author_mail'         => 'eren@aymak.net',
    'author_website_url'  => 'http://erenyumak.com',
    'author_website_name' => 'XOOPS Project',
    'credits'             => 'XOOPS Development Team',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'https://www.gnu.org/licenses/gpl-3.0.en.html',
    'help'                => 'page=help',
    'release_info'        => 'release_info',
    'release_file'        => \XOOPS_URL . '/modules/testimonial/docs/release_info file',
    'release_date'        => '2022/04/02',
    'manual'              => 'link to manual file',
    'manual_file'         => \XOOPS_URL . '/modules/testimonial/docs/install.txt',
    'min_php'             => '7.0',
    'min_xoops'           => '2.5.9',
    'min_admin'           => '1.2',
    'min_db'              => ['mysql' => '5.6', 'mysqli' => '5.6'],
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => \basename(__DIR__),
    'dirmoduleadmin'      => 'Frameworks/moduleclasses/moduleadmin',
    'sysicons16'          => '../../Frameworks/moduleclasses/icons/16',
    'sysicons32'          => '../../Frameworks/moduleclasses/icons/32',
    'modicons16'          => 'assets/icons/16',
    'modicons32'          => 'assets/icons/32',
    'demo_site_url'       => 'https://xoops.org',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'https://xoops.org/modules/newbb',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    'release'             => '05/25/2020',
    'module_status'       => 'Stable',
    'system_menu'         => 1,
    'hasAdmin'            => 1,
    'hasMain'             => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    'onInstall'           => 'include/install.php',
    'onUninstall'         => 'include/uninstall.php',
    'onUpdate'            => 'include/update.php',
];
// ------------------- Templates ------------------- //
$modversion['templates'] = [
    // Admin templates
    ['file' => 'testimonial_admin_about.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'testimonial_admin_header.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'testimonial_admin_index.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'testimonial_admin_testimonials.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'testimonial_admin_clone.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'testimonial_admin_footer.tpl', 'description' => '', 'type' => 'admin'],
    // User templates
    ['file' => 'testimonial_header.tpl', 'description' => ''],
    ['file' => 'testimonial_index.tpl', 'description' => ''],
    ['file' => 'testimonial_testimonials.tpl', 'description' => ''],
    ['file' => 'testimonial_testimonials_list.tpl', 'description' => ''],
    ['file' => 'testimonial_testimonials_item.tpl', 'description' => ''],
    ['file' => 'testimonial_breadcrumbs.tpl', 'description' => ''],
    ['file' => 'testimonial_footer.tpl', 'description' => ''],
];
// ------------------- Mysql ------------------- //
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables
$modversion['tables'] = [
    'testimonial_testimonials',
];
// ------------------- Default Blocks ------------------- //
// Testimonials last
$modversion['blocks'][] = [
    'file'        => 'testimonials.php',
    'name'        => \_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_LAST,
    'description' => \_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_LAST_DESC,
    'show_func'   => 'b_testimonial_testimonials_show',
    'edit_func'   => 'b_testimonial_testimonials_edit',
    'template'    => 'testimonial_block_testimonials.tpl',
    'options'     => 'last|5|25|0',
];

// Testimonials random
$modversion['blocks'][] = [
    'file'        => 'testimonials.php',
    'name'        => \_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_RANDOM,
    'description' => \_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_RANDOM_DESC,
    'show_func'   => 'b_testimonial_testimonials_show',
    'edit_func'   => 'b_testimonial_testimonials_edit',
    'template'    => 'testimonial_block_random.tpl',
    'options'     => 'random|5|25|0',
];
// ------------------- Spotlight Blocks ------------------- //
// Testimonials spotlight
$modversion['blocks'][] = [
    'file'        => 'testimonials_spotlight.php',
    'name'        => \_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_SPOTLIGHT,
    'description' => \_MI_TESTIMONIAL_TESTIMONIALS_BLOCK_SPOTLIGHT_DESC,
    'show_func'   => 'b_testimonial_testimonials_spotlight_show',
    'edit_func'   => 'b_testimonial_testimonials_spotlight_edit',
    'template'    => 'testimonial_block_testimonials_spotlight.tpl',
    'options'     => 'spotlight|5|25|0',
];
// ------------------- Config ------------------- //
// Editor Admin
\xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name'        => 'editor_admin',
    'title'       => '\_MI_TESTIMONIAL_EDITOR_ADMIN',
    'description' => '\_MI_TESTIMONIAL_EDITOR_ADMIN_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'dhtml',
    'options'     => array_flip($editorHandler->getList()),
];
// Editor User
\xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name'        => 'editor_user',
    'title'       => '\_MI_TESTIMONIAL_EDITOR_USER',
    'description' => '\_MI_TESTIMONIAL_EDITOR_USER_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'dhtml',
    'options'     => array_flip($editorHandler->getList()),
];
// Editor : max characters admin area
$modversion['config'][] = [
    'name'        => 'editor_maxchar',
    'title'       => '\_MI_TESTIMONIAL_EDITOR_MAXCHAR',
    'description' => '\_MI_TESTIMONIAL_EDITOR_MAXCHAR_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 50,
];
// Keywords
$modversion['config'][] = [
    'name'        => 'keywords',
    'title'       => '\_MI_TESTIMONIAL_KEYWORDS',
    'description' => '\_MI_TESTIMONIAL_KEYWORDS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'testimonial, testimonials',
];
// create increment steps for file size
require_once __DIR__ . '/include/xoops_version.inc.php';
$iniPostMaxSize       = testimonialReturnBytes(\ini_get('post_max_size'));
$iniUploadMaxFileSize = testimonialReturnBytes(\ini_get('upload_max_filesize'));
$maxSize              = min($iniPostMaxSize, $iniUploadMaxFileSize);
if ($maxSize > 10000 * 1048576) {
    $increment = 500;
}
if ($maxSize <= 10000 * 1048576) {
    $increment = 200;
}
if ($maxSize <= 5000 * 1048576) {
    $increment = 100;
}
if ($maxSize <= 2500 * 1048576) {
    $increment = 50;
}
if ($maxSize <= 1000 * 1048576) {
    $increment = 10;
}
if ($maxSize <= 500 * 1048576) {
    $increment = 5;
}
if ($maxSize <= 100 * 1048576) {
    $increment = 2;
}
if ($maxSize <= 50 * 1048576) {
    $increment = 1;
}
if ($maxSize <= 25 * 1048576) {
    $increment = 0.5;
}
$optionMaxsize = [];
$i = $increment;
while ($i * 1048576 <= $maxSize) {
    $optionMaxsize[$i . ' ' . _MI_TESTIMONIAL_SIZE_MB] = $i * 1048576;
    $i += $increment;
}
// Uploads : maxsize of image
$modversion['config'][] = [
    'name'        => 'maxsize_image',
    'title'       => '\_MI_TESTIMONIAL_MAXSIZE_IMAGE',
    'description' => '\_MI_TESTIMONIAL_MAXSIZE_IMAGE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 3145728,
    'options'     => $optionMaxsize,
];
// Uploads : mimetypes of image
$modversion['config'][] = [
    'name'        => 'mimetypes_image',
    'title'       => '\_MI_TESTIMONIAL_MIMETYPES_IMAGE',
    'description' => '\_MI_TESTIMONIAL_MIMETYPES_IMAGE_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => ['image/gif', 'image/jpeg', 'image/png'],
    'options'     => ['bmp' => 'image/bmp','gif' => 'image/gif','pjpeg' => 'image/pjpeg', 'jpeg' => 'image/jpeg','jpg' => 'image/jpg','jpe' => 'image/jpe', 'png' => 'image/png'],
];
$modversion['config'][] = [
    'name'        => 'maxwidth_image',
    'title'       => '\_MI_TESTIMONIAL_MAXWIDTH_IMAGE',
    'description' => '\_MI_TESTIMONIAL_MAXWIDTH_IMAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 800,
];
$modversion['config'][] = [
    'name'        => 'maxheight_image',
    'title'       => '\_MI_TESTIMONIAL_MAXHEIGHT_IMAGE',
    'description' => '\_MI_TESTIMONIAL_MAXHEIGHT_IMAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 800,
];
// Admin pager
$modversion['config'][] = [
    'name'        => 'adminpager',
    'title'       => '\_MI_TESTIMONIAL_ADMIN_PAGER',
    'description' => '\_MI_TESTIMONIAL_ADMIN_PAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
// User pager
$modversion['config'][] = [
    'name'        => 'userpager',
    'title'       => '\_MI_TESTIMONIAL_USER_PAGER',
    'description' => '\_MI_TESTIMONIAL_USER_PAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
// Number column
$modversion['config'][] = [
    'name'        => 'numb_col',
    'title'       => '\_MI_TESTIMONIAL_NUMB_COL',
    'description' => '\_MI_TESTIMONIAL_NUMB_COL_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 1,
    'options'     => [1 => '1', 2 => '2', 3 => '3', 4 => '4'],
];
// Divide by
$modversion['config'][] = [
    'name'        => 'divideby',
    'title'       => '\_MI_TESTIMONIAL_DIVIDEBY',
    'description' => '\_MI_TESTIMONIAL_DIVIDEBY_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 1,
    'options'     => [1 => '1', 2 => '2', 3 => '3', 4 => '4'],
];
// Table type
$modversion['config'][] = [
    'name'        => 'table_type',
    'title'       => '\_MI_TESTIMONIAL_TABLE_TYPE',
    'description' => '\_MI_TESTIMONIAL_DIVIDEBY_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 'bordered',
    'options'     => ['bordered' => 'bordered', 'striped' => 'striped', 'hover' => 'hover', 'condensed' => 'condensed'],
];
// Panel by
$modversion['config'][] = [
    'name'        => 'panel_type',
    'title'       => '\_MI_TESTIMONIAL_PANEL_TYPE',
    'description' => '\_MI_TESTIMONIAL_PANEL_TYPE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'default',
    'options'     => ['default' => 'default', 'primary' => 'primary', 'success' => 'success', 'info' => 'info', 'warning' => 'warning', 'danger' => 'danger'],
];
// Paypal ID
$modversion['config'][] = [
    'name'        => 'donations',
    'title'       => '\_MI_TESTIMONIAL_IDPAYPAL',
    'description' => '\_MI_TESTIMONIAL_IDPAYPAL_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'textbox',
    'default'     => 'XYZ123',
];
// Show Breadcrumbs
$modversion['config'][] = [
    'name'        => 'show_breadcrumbs',
    'title'       => '\_MI_TESTIMONIAL_SHOW_BREADCRUMBS',
    'description' => '\_MI_TESTIMONIAL_SHOW_BREADCRUMBS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Advertise
$modversion['config'][] = [
    'name'        => 'advertise',
    'title'       => '\_MI_TESTIMONIAL_ADVERTISE',
    'description' => '\_MI_TESTIMONIAL_ADVERTISE_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => '',
];
// Bookmarks
$modversion['config'][] = [
    'name'        => 'bookmarks',
    'title'       => '\_MI_TESTIMONIAL_BOOKMARKS',
    'description' => '\_MI_TESTIMONIAL_BOOKMARKS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0,
];
// Make Sample button visible?
$modversion['config'][] = [
    'name'        => 'displaySampleButton',
    'title'       => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON',
    'description' => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Maintained by
$modversion['config'][] = [
    'name'        => 'maintainedby',
    'title'       => '\_MI_TESTIMONIAL_MAINTAINEDBY',
    'description' => '\_MI_TESTIMONIAL_MAINTAINEDBY_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'https://xoops.org/modules/newbb',
];
