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

/**
 * return object
 */

$moduleDirName  = \basename(\dirname(__DIR__));
$moduleDirNameUpper  = \mb_strtoupper($moduleDirName);
return (object)[
    'name'           => \mb_strtoupper($moduleDirName) . ' Module Configurator',
    'paths'          => [
        'dirname'    => $moduleDirName,
        'admin'      => \XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/admin',
        'modPath'    => \XOOPS_ROOT_PATH . '/modules/' . $moduleDirName,
        'modUrl'     => \XOOPS_URL . '/modules/' . $moduleDirName,
        'uploadPath' => \XOOPS_UPLOAD_PATH . '/' . $moduleDirName,
        'uploadUrl'  => \XOOPS_UPLOAD_URL . '/' . $moduleDirName,
    ],
    'uploadFolders'  => [
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName,
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/testimonials',
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/images',
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/images/testimonials',
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/files',
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/files/testimonials',
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/temp',
    ],
    'copyBlankFiles'  => [
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/images',
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName . '/images/testimonials',
    ],
    'copyTestFolders'  => [
        [\XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/testdata/uploads',
        \XOOPS_UPLOAD_PATH . '/' . $moduleDirName],
    ],
    'templateFolders'  => [
        '/templates/',
    ],
    'oldFiles'  => [
    ],
    'oldFolders'  => [
    ],
    'renameTables'  => [
    ],
    'moduleStats'  => [
    ],
    'modCopyright' => "<a href='https://xoops.org' title='XOOPS Project' target='_blank'><img src='" . \XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . "/assets/images/logo/logoModule.png' alt='XOOPS Project'></a>",
];
