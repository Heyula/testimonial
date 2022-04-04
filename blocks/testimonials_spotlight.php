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

use XoopsModules\Testimonial;
use XoopsModules\Testimonial\Helper;
use XoopsModules\Testimonial\Constants;

require_once \XOOPS_ROOT_PATH . '/modules/testimonial/include/common.php';

/**
 * Function show block
 * @param  $options
 * @return array
 */
function b_testimonial_testimonials_spotlight_show($options)
{
    $block       = [];
    $typeBlock   = $options[0];
    $limit       = $options[1];
    $lenghtTitle = $options[2];
    $helper      = Helper::getInstance();
    $testimonialsHandler = $helper->getHandler('Testimonials');
    $crTestimonials = new \CriteriaCompo();
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    if (\count($options) > 0 && (int)$options[0] > 0) {
        $crTestimonials->add(new \Criteria('testi_id', '(' . \implode(',', $options) . ')', 'IN'));
        $limit = 0;
    }

    $crTestimonials->setSort('testi_id');
    $crTestimonials->setOrder('DESC');
    $crTestimonials->setLimit($limit);
    $testimonialsAll = $testimonialsHandler->getAll($crTestimonials);
    unset($crTestimonials);
    if (\count($testimonialsAll) > 0) {
        foreach (\array_keys($testimonialsAll) as $i) {
            /**
             * If you want to use the parameter for limits you have to adapt the line where it should be applied
             * e.g. change
             *     $block[$i]['title'] = $testimonialsAll[$i]->getVar('art_title');
             * into
             *     $myTitle = $testimonialsAll[$i]->getVar('art_title');
             *     if ($limit > 0) {
             *         $myTitle = \substr($myTitle, 0, (int)$limit);
             *     }
             *     $block[$i]['title'] =  $myTitle;
             */
            $block[$i]['id'] = $testimonialsAll[$i]->getVar('testi_id');
            $block[$i]['title'] = \htmlspecialchars($testimonialsAll[$i]->getVar('testi_title'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['descr'] = \strip_tags($testimonialsAll[$i]->getVar('testi_descr'));
            $block[$i]['img'] = $testimonialsAll[$i]->getVar('testi_img');
            $block[$i]['profession'] = \htmlspecialchars($testimonialsAll[$i]->getVar('testi_profession'), ENT_QUOTES | ENT_HTML5);
            $block[$i]['date'] = \formatTimestamp($testimonialsAll[$i]->getVar('testi_date'));
        }
    }

    return $block;

}

/**
 * Function edit block
 * @param  $options
 * @return string
 */
function b_testimonial_testimonials_spotlight_edit($options)
{
    $helper = Helper::getInstance();
    $testimonialsHandler = $helper->getHandler('Testimonials');
    $GLOBALS['xoopsTpl']->assign('testimonial_upload_url', \TESTIMONIAL_UPLOAD_URL);
    $form = \_MB_TESTIMONIAL_DISPLAY_SPOTLIGHT . ' : ';
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' >";
    $form .= "<input type='text' name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' >&nbsp;<br>";
    $form .= \_MB_TESTIMONIAL_TITLE_LENGTH . " : <input type='text' name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' ><br><br>";
    \array_shift($options);
    \array_shift($options);
    \array_shift($options);

    $crTestimonials = new \CriteriaCompo();
    $crTestimonials->add(new \Criteria('testi_id', 0, '!='));
    $crTestimonials->setSort('testi_id');
    $crTestimonials->setOrder('ASC');
    $testimonialsAll = $testimonialsHandler->getAll($crTestimonials);
    unset($crTestimonials);
    $form .= \_MB_TESTIMONIAL_TESTIMONIALS_TO_DISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (!\in_array(0, $options) && !\in_array('0', $options) ? '' : "selected='selected'") . '>' . \_MB_TESTIMONIAL_ALL_TESTIMONIALS . '</option>';
    foreach (\array_keys($testimonialsAll) as $i) {
        $testi_id = $testimonialsAll[$i]->getVar('testi_id');
        $form .= "<option value='" . $testi_id . "' " . (!\in_array($testi_id, $options) ? '' : "selected='selected'") . '>' . $testimonialsAll[$i]->getVar('testi_title') . '</option>';
    }
    $form .= '</select>';

    return $form;

}
