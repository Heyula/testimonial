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

use Xmf\Request;
use XoopsModules\Testimonial;
use XoopsModules\Testimonial\Constants;
use XoopsModules\Testimonial\Common;

require __DIR__ . '/header.php';
// Get all request values
$op      = Request::getCmd('op', 'list');
$testiId = Request::getInt('testi_id');
$start   = Request::getInt('start');
$limit   = Request::getInt('limit', $helper->getConfig('adminpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'testimonial_admin_testimonials.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('testimonials.php'));
        $adminObject->addItemButton(\_AM_TESTIMONIAL_ADD_TESTIMONIAL, 'testimonials.php?op=new');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $testimonialsCount = $testimonialsHandler->getCountTestimonials();
        $testimonialsAll = $testimonialsHandler->getAllTestimonials($start, $limit);
        $GLOBALS['xoopsTpl']->assign('testimonials_count', $testimonialsCount);
        $GLOBALS['xoopsTpl']->assign('testimonial_url', \TESTIMONIAL_URL);
        $GLOBALS['xoopsTpl']->assign('testimonial_upload_url', \TESTIMONIAL_UPLOAD_URL);
        // Table view testimonials
        if ($testimonialsCount > 0) {
            foreach (\array_keys($testimonialsAll) as $i) {
                $testimonial = $testimonialsAll[$i]->getValuesTestimonials();
                $GLOBALS['xoopsTpl']->append('testimonials_list', $testimonial);
                unset($testimonial);
            }
            // Display Navigation
            if ($testimonialsCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($testimonialsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', \_AM_TESTIMONIAL_THEREARENT_TESTIMONIALS);
        }
        break;
    case 'new':
        $templateMain = 'testimonial_admin_testimonials.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('testimonials.php'));
        $adminObject->addItemButton(\_AM_TESTIMONIAL_LIST_TESTIMONIALS, 'testimonials.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $testimonialsObj = $testimonialsHandler->create();
        $form = $testimonialsObj->getFormTestimonials();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'clone':
        $templateMain = 'testimonial_admin_testimonials.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('testimonials.php'));
        $adminObject->addItemButton(\_AM_TESTIMONIAL_LIST_TESTIMONIALS, 'testimonials.php', 'list');
        $adminObject->addItemButton(\_AM_TESTIMONIAL_ADD_TESTIMONIAL, 'testimonials.php?op=new');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Request source
        $testiIdSource = Request::getInt('testi_id_source');
        // Get Form
        $testimonialsObjSource = $testimonialsHandler->get($testiIdSource);
        $testimonialsObj = $testimonialsObjSource->xoopsClone();
        $form = $testimonialsObj->getFormTestimonials();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('testimonials.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($testiId > 0) {
            $testimonialsObj = $testimonialsHandler->get($testiId);
        } else {
            $testimonialsObj = $testimonialsHandler->create();
        }
        // Set Vars
        $uploaderErrors = '';
        $testimonialsObj->setVar('testi_title', Request::getString('testi_title'));
        $testimonialsObj->setVar('testi_descr', Request::getText('testi_descr'));
        // Set Var testi_img
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['testi_img']['name'];
        $imgMimetype    = $_FILES['testi_img']['type'];
        $imgNameDef     = Request::getString('testi_title');
        $uploader = new \XoopsMediaUploader(\TESTIMONIAL_UPLOAD_IMAGE_PATH . '/testimonials/', 
                                                    $helper->getConfig('mimetypes_image'), 
                                                    $helper->getConfig('maxsize_image'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if ($uploader->upload()) {
                $savedFilename = $uploader->getSavedFileName();
                $maxwidth  = (int)$helper->getConfig('maxwidth_image');
                $maxheight = (int)$helper->getConfig('maxheight_image');
                if ($maxwidth > 0 && $maxheight > 0) {
                    // Resize image
                    $imgHandler                = new Testimonial\Common\Resizer();
                    $imgHandler->sourceFile    = \TESTIMONIAL_UPLOAD_IMAGE_PATH . '/testimonials/' . $savedFilename;
                    $imgHandler->endFile       = \TESTIMONIAL_UPLOAD_IMAGE_PATH . '/testimonials/' . $savedFilename;
                    $imgHandler->imageMimetype = $imgMimetype;
                    $imgHandler->maxWidth      = $maxwidth;
                    $imgHandler->maxHeight     = $maxheight;
                    $result                    = $imgHandler->resizeImage();
                }
                $testimonialsObj->setVar('testi_img', $savedFilename);
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            if ($filename > '') {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
            $testimonialsObj->setVar('testi_img', Request::getString('testi_img'));
        }
        $testimonialsObj->setVar('testi_profession', Request::getString('testi_profession'));
        $testimonialDateObj = \DateTime::createFromFormat(\_SHORTDATESTRING, Request::getString('testi_date'));
        $testimonialsObj->setVar('testi_date', $testimonialDateObj->getTimestamp());
        // Insert Data
        if ($testimonialsHandler->insert($testimonialsObj)) {
            if ('' !== $uploaderErrors) {
                \redirect_header('testimonials.php?op=edit&testi_id=' . $testiId, 5, $uploaderErrors);
            } else {
                \redirect_header('testimonials.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_AM_TESTIMONIAL_FORM_OK);
            }
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $testimonialsObj->getHtmlErrors());
        $form = $testimonialsObj->getFormTestimonials();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'testimonial_admin_testimonials.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('testimonials.php'));
        $adminObject->addItemButton(\_AM_TESTIMONIAL_ADD_TESTIMONIAL, 'testimonials.php?op=new');
        $adminObject->addItemButton(\_AM_TESTIMONIAL_LIST_TESTIMONIALS, 'testimonials.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $testimonialsObj = $testimonialsHandler->get($testiId);
        $testimonialsObj->start = $start;
        $testimonialsObj->limit = $limit;
        $form = $testimonialsObj->getFormTestimonials();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'testimonial_admin_testimonials.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('testimonials.php'));
        $testimonialsObj = $testimonialsHandler->get($testiId);
        $testiTitle = $testimonialsObj->getVar('testi_title');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('testimonials.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($testimonialsHandler->delete($testimonialsObj)) {
                \redirect_header('testimonials.php', 3, \_AM_TESTIMONIAL_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $testimonialsObj->getHtmlErrors());
            }
        } else {
            $customConfirm = new Common\Confirm(
                ['ok' => 1, 'testi_id' => $testiId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_AM_TESTIMONIAL_FORM_SURE_DELETE, $testimonialsObj->getVar('testi_title')));
            $form = $customConfirm->getFormConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}
require __DIR__ . '/footer.php';
