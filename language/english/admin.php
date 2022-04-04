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
require_once __DIR__ . '/main.php';

// ---------------- Admin Index ----------------
\define('_AM_TESTIMONIAL_STATISTICS', 'Statistics');
// There are
\define('_AM_TESTIMONIAL_THEREARE_TESTIMONIALS', "There are <span class='bold'>%s</span> testimonials in the database");
// ---------------- Admin Files ----------------
// There aren't
\define('_AM_TESTIMONIAL_THEREARENT_TESTIMONIALS', "There aren't testimonials");
// Save/Delete
\define('_AM_TESTIMONIAL_FORM_OK', 'Successfully saved');
\define('_AM_TESTIMONIAL_FORM_DELETE_OK', 'Successfully deleted');
\define('_AM_TESTIMONIAL_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
\define('_AM_TESTIMONIAL_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
// Buttons
\define('_AM_TESTIMONIAL_ADD_TESTIMONIAL', 'Add New Testimonial');
// Lists
\define('_AM_TESTIMONIAL_LIST_TESTIMONIALS', 'List of Testimonials');
// ---------------- Admin Classes ----------------
// Testimonial add/edit
\define('_AM_TESTIMONIAL_TESTIMONIAL_ADD', 'Add Testimonial');
\define('_AM_TESTIMONIAL_TESTIMONIAL_EDIT', 'Edit Testimonial');
// Elements of Testimonial
\define('_AM_TESTIMONIAL_TESTIMONIAL_ID', 'Id');
\define('_AM_TESTIMONIAL_TESTIMONIAL_TITLE', 'Testimonial Title');
\define('_AM_TESTIMONIAL_TESTIMONIAL_DESCR', 'Testimonial Comment');
\define('_AM_TESTIMONIAL_TESTIMONIAL_IMG', 'Testimonial Image');
\define('_AM_TESTIMONIAL_TESTIMONIAL_IMG_UPLOADS', 'Img in %s :');
\define('_AM_TESTIMONIAL_TESTIMONIAL_PROFESSION', 'Profession');
\define('_AM_TESTIMONIAL_TESTIMONIAL_DATE', 'Date');
// General
\define('_AM_TESTIMONIAL_FORM_UPLOAD', 'Upload file');
\define('_AM_TESTIMONIAL_FORM_UPLOAD_NEW', 'Upload new file: ');
\define('_AM_TESTIMONIAL_FORM_UPLOAD_SIZE', 'Max file size: ');
\define('_AM_TESTIMONIAL_FORM_UPLOAD_SIZE_MB', 'MB');
\define('_AM_TESTIMONIAL_FORM_UPLOAD_IMG_WIDTH', 'Max image width: ');
\define('_AM_TESTIMONIAL_FORM_UPLOAD_IMG_HEIGHT', 'Max image height: ');
\define('_AM_TESTIMONIAL_FORM_IMAGE_PATH', 'Files in %s :');
\define('_AM_TESTIMONIAL_FORM_ACTION', 'Action');
\define('_AM_TESTIMONIAL_FORM_EDIT', 'Modification');
\define('_AM_TESTIMONIAL_FORM_DELETE', 'Clear');
// Clone feature
\define('_AM_TESTIMONIAL_CLONE', 'Clone');
\define('_AM_TESTIMONIAL_CLONE_DSC', 'Cloning a module has never been this easy! Just type in the name you want for it and hit submit button!');
\define('_AM_TESTIMONIAL_CLONE_TITLE', 'Clone %s');
\define('_AM_TESTIMONIAL_CLONE_NAME', 'Choose a name for the new module');
\define('_AM_TESTIMONIAL_CLONE_NAME_DSC', 'Do not use special characters! <br>Do not choose an existing module dirname or database table name!');
\define('_AM_TESTIMONIAL_CLONE_INVALIDNAME', 'ERROR: Invalid module name, please try another one!');
\define('_AM_TESTIMONIAL_CLONE_EXISTS', 'ERROR: Module name already taken, please try another one!');
\define('_AM_TESTIMONIAL_CLONE_CONGRAT', 'Congratulations! %s was sucessfully created!<br>You may want to make changes in language files.');
\define('_AM_TESTIMONIAL_CLONE_IMAGEFAIL', 'Attention, we failed creating the new module logo. Please consider modifying assets/images/logo_module.png manually!');
\define('_AM_TESTIMONIAL_CLONE_FAIL', 'Sorry, we failed in creating the new clone. Maybe you need to temporally set write permissions (CHMOD 777) to modules folder and try again.');
// ---------------- Admin Others ----------------
\define('_AM_TESTIMONIAL_ABOUT_MAKE_DONATION', 'Submit');
\define('_AM_TESTIMONIAL_SUPPORT_FORUM', 'Support Forum');
\define('_AM_TESTIMONIAL_DONATION_AMOUNT', 'Donation Amount');
\define('_AM_TESTIMONIAL_MAINTAINEDBY', ' is maintained by ');
// ---------------- End ----------------
