<?php

declare(strict_types=1);


namespace XoopsModules\Testimonial;

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

use XoopsModules\Testimonial;

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Testimonials
 */
class Testimonials extends \XoopsObject
{
    /**
     * @var int
     */
    public $start = 0;

    /**
     * @var int
     */
    public $limit = 0;

    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('testi_id', \XOBJ_DTYPE_INT);
        $this->initVar('testi_title', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('testi_descr', \XOBJ_DTYPE_OTHER);
        $this->initVar('testi_img', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('testi_profession', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('testi_date', \XOBJ_DTYPE_INT);
    }

    /**
     * @static function &getInstance
     *
     * @param null
     */
    public static function getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
    }

    /**
     * The new inserted $Id
     * @return inserted id
     */
    public function getNewInsertedIdTestimonials()
    {
        $newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
        return $newInsertedId;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormTestimonials($action = false)
    {
        $helper = \XoopsModules\Testimonial\Helper::getInstance();
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $isAdmin = \is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid()) : false;
        $isAdmin = \is_object($GLOBALS['xoopsUser']) && $GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid());
        // Permissions for uploader
        $grouppermHandler = \xoops_getHandler('groupperm');
        $groups = \is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getGroups() : \XOOPS_GROUP_ANONYMOUS;
        $permissionUpload = $grouppermHandler->checkRight('upload_groups', 32, $groups, $GLOBALS['xoopsModule']->getVar('mid')) ? true : false;
        // Title
        $title = $this->isNew() ? \_AM_TESTIMONIAL_TESTIMONIAL_ADD : \_AM_TESTIMONIAL_TESTIMONIAL_EDIT;
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Text testiTitle
        $form->addElement(new \XoopsFormText(\_AM_TESTIMONIAL_TESTIMONIAL_TITLE, 'testi_title', 50, 255, $this->getVar('testi_title')), true);
        // Form Editor DhtmlTextArea testiDescr
        $editorConfigs = [];
        if ($isAdmin) {
            $editor = $helper->getConfig('editor_admin');
        } else {
            $editor = $helper->getConfig('editor_user');
        }
        $editorConfigs['name'] = 'testi_descr';
        $editorConfigs['value'] = $this->getVar('testi_descr', 'e');
        $editorConfigs['rows'] = 5;
        $editorConfigs['cols'] = 40;
        $editorConfigs['width'] = '100%';
        $editorConfigs['height'] = '400px';
        $editorConfigs['editor'] = $editor;
        $form->addElement(new \XoopsFormEditor(\_AM_TESTIMONIAL_TESTIMONIAL_DESCR, 'testi_descr', $editorConfigs), true);
        // Form Image testiImg
        // Form Image testiImg: Select Uploaded Image 
        $getTestiImg = $this->getVar('testi_img');
        $testiImg = $getTestiImg ?: 'blank.gif';
        $imageDirectory = '/uploads/testimonial/images/testimonials';
        $imageTray = new \XoopsFormElementTray(\_AM_TESTIMONIAL_TESTIMONIAL_IMG, '<br>');
        $imageSelect = new \XoopsFormSelect(\sprintf(\_AM_TESTIMONIAL_TESTIMONIAL_IMG_UPLOADS, ".{$imageDirectory}/"), 'testi_img', $testiImg, 5);
        $imageArray = \XoopsLists::getImgListAsArray( \XOOPS_ROOT_PATH . $imageDirectory );
        foreach ($imageArray as $image1) {
            $imageSelect->addOption(($image1), $image1);
        }
        $imageSelect->setExtra("onchange='showImgSelected(\"imglabel_testi_img\", \"testi_img\", \"" . $imageDirectory . '", "", "' . \XOOPS_URL . "\")'");
        $imageTray->addElement($imageSelect, false);
        $imageTray->addElement(new \XoopsFormLabel('', "<br><img src='" . \XOOPS_URL . '/' . $imageDirectory . '/' . $testiImg . "' id='imglabel_testi_img' alt='' style='max-width:100px' >"));
        // Form Image testiImg: Upload new image
        if ($permissionUpload) {
            $maxsize = $helper->getConfig('maxsize_image');
            $imageTray->addElement(new \XoopsFormFile('<br>' . \_AM_TESTIMONIAL_FORM_UPLOAD_NEW, 'testi_img', $maxsize));
            $imageTray->addElement(new \XoopsFormLabel(\_AM_TESTIMONIAL_FORM_UPLOAD_SIZE, ($maxsize / 1048576) . ' '  . \_AM_TESTIMONIAL_FORM_UPLOAD_SIZE_MB));
            $imageTray->addElement(new \XoopsFormLabel(\_AM_TESTIMONIAL_FORM_UPLOAD_IMG_WIDTH, $helper->getConfig('maxwidth_image') . ' px'));
            $imageTray->addElement(new \XoopsFormLabel(\_AM_TESTIMONIAL_FORM_UPLOAD_IMG_HEIGHT, $helper->getConfig('maxheight_image') . ' px'));
        } else {
            $imageTray->addElement(new \XoopsFormHidden('testi_img', $testiImg));
        }
        $form->addElement($imageTray, true);
        // Form Text testiProfession
        $form->addElement(new \XoopsFormText(\_AM_TESTIMONIAL_TESTIMONIAL_PROFESSION, 'testi_profession', 50, 255, $this->getVar('testi_profession')), true);
        // Form Text Date Select testiDate
        $testiDate = $this->isNew() ? \time() : $this->getVar('testi_date');
        $form->addElement(new \XoopsFormTextDateSelect(\_AM_TESTIMONIAL_TESTIMONIAL_DATE, 'testi_date', '', $testiDate));
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save'));
        $form->addElement(new \XoopsFormHidden('start', $this->start));
        $form->addElement(new \XoopsFormHidden('limit', $this->limit));
        $form->addElement(new \XoopsFormButtonTray('', \_SUBMIT, 'submit', '', false));
        return $form;
    }

    /**
     * Get Values
     * @param null $keys
     * @param null $format
     * @param null $maxDepth
     * @return array
     */
    public function getValuesTestimonials($keys = null, $format = null, $maxDepth = null)
    {
        $helper  = \XoopsModules\Testimonial\Helper::getInstance();
        $utility = new \XoopsModules\Testimonial\Utility();
        $ret = $this->getValues($keys, $format, $maxDepth);
        $ret['id']          = $this->getVar('testi_id');
        $ret['title']       = $this->getVar('testi_title');
        $ret['descr']       = $this->getVar('testi_descr', 'e');
        $editorMaxchar = $helper->getConfig('editor_maxchar');
        $ret['descr_short'] = $utility::truncateHtml($ret['descr'], $editorMaxchar);
        $ret['img']         = $this->getVar('testi_img');
        $ret['profession']  = $this->getVar('testi_profession');
        $ret['date']        = \formatTimestamp($this->getVar('testi_date'), 's');
        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayTestimonials()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar($var);
        }
        return $ret;
    }
}
