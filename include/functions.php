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
 * function add selected cats to block
 *
 * @param  $cats
 * @return string
 */
function testimonial_block_addCatSelect($cats)
{
    $cat_sql = '(';
    if (\is_array($cats)) {
        $cat_sql .= current($cats);
        array_shift($cats);
        foreach ($cats as $cat) {
            $cat_sql .= ',' . $cat;
        }
    }
    $cat_sql .= ')';
    return $cat_sql;
}

/**
 * Add content as meta tag to template
 * @param $content
 * @return void
 */

function testimonialMetaKeywords($content)
{
    global $xoopsTpl, $xoTheme;
    $myts = MyTextSanitizer::getInstance();
    $content= $myts->undoHtmlSpecialChars($myts->displayTarea($content));
    if(isset($xoTheme) && \is_object($xoTheme)) {
        $xoTheme->addMeta( 'meta', 'keywords', \strip_tags($content));
    } else {    // Compatibility for old Xoops versions
        $xoopsTpl->assign('xoops_meta_keywords', \strip_tags($content));
    }
}

/**
 * Add content as meta description to template
 * @param $content
 * @return void
 */
 
function testimonialMetaDescription($content)
{
    global $xoopsTpl, $xoTheme;
    $myts = MyTextSanitizer::getInstance();
    $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
    if(isset($xoTheme) && \is_object($xoTheme)) {
        $xoTheme->addMeta( 'meta', 'description', \strip_tags($content));
    } else {    // Compatibility for old Xoops versions
        $xoopsTpl->assign('xoops_meta_description', \strip_tags($content));
    }
}

/**
 * Rewrite all url
 *
 * @param string  $module  module name
 * @param array   $array   array
 * @param string  $type    type
 * @return null|string $type    string replacement for any blank case
 */
function testimonial_RewriteUrl($module, $array, $type = 'content')
{
    $comment = '';
    $helper = \XoopsModules\Testimonial\Helper::getInstance();
    $testimonialsHandler = $helper->getHandler('testimonials');
    $lenght_id = $helper->getConfig('lenght_id');
    $rewrite_url = $helper->getConfig('rewrite_url');

    if (0 != $lenght_id) {
        $id = $array['content_id'];
        while (\strlen($id) < $lenght_id) {
            $id = '0' . $id;
        }
    } else {
        $id = $array['content_id'];
    }

    if (isset($array['topic_alias']) && $array['topic_alias']) {
        $topic_name = $array['topic_alias'];
    } else {
        $topic_name = testimonial_Filter(xoops_getModuleOption('static_name', $module));
    }

    switch ($rewrite_url) {

        case 'none':
            if($topic_name) {
                 $topic_name = 'topic=' . $topic_name . '&amp;';
            }
            $rewrite_base = '/modules/';
            $page = 'page=' . $array['content_alias'];
            return \XOOPS_URL . $rewrite_base . $module . '/' . $type . '.php?' . $topic_name . 'id=' . $id . '&amp;' . $page . $comment;
            break;

        case 'rewrite':
            if($topic_name) {
                $topic_name .= '/';
            }
            $rewrite_base = xoops_getModuleOption('rewrite_mode', $module);
            $rewrite_ext = xoops_getModuleOption('rewrite_ext', $module);
            $module_name = '';
            if(xoops_getModuleOption('rewrite_name', $module)) {
                $module_name = xoops_getModuleOption('rewrite_name', $module) . '/';
            }
            $page = $array['content_alias'];
            $type .= '/';
            $id .= '/';
            if ('content/' === $type) {
                $type = '';
            }
            if ('comment-edit/' === $type || 'comment-reply/' === $type || 'comment-delete/' === $type) {
                return \XOOPS_URL . $rewrite_base . $module_name . $type . $id . '/';
            }

            return \XOOPS_URL . $rewrite_base . $module_name . $type . $topic_name  . $id . $page . $rewrite_ext;
            break;

         case 'short':
            if($topic_name) {
                $topic_name .= '/';
            }
            $rewrite_base = xoops_getModuleOption('rewrite_mode', $module);
            $rewrite_ext = xoops_getModuleOption('rewrite_ext', $module);
            $module_name = '';
            if(xoops_getModuleOption('rewrite_name', $module)) {
                $module_name = xoops_getModuleOption('rewrite_name', $module) . '/';
            }
            $page = $array['content_alias'];
            $type .= '/';
            if ('content/' === $type) {
                $type = '';
            }
            if ('comment-edit/' === $type || 'comment-reply/' === $type || 'comment-delete/' === $type) {
                return \XOOPS_URL . $rewrite_base . $module_name . $type . $id . '/';
            }

            return \XOOPS_URL . $rewrite_base . $module_name . $type . $topic_name . $page . $rewrite_ext;
            break;
    }
    return null;
}
/**
 * Replace all escape, character, ... for display a correct url
 *
 * @param string $url      string to transform
 * @param string $type     string replacement for any blank case
 * @return string $url
 */
function testimonial_Filter($url, $type = '') {

    // Get regular expression from module setting. default setting is : `[^a-z0-9]`i
    $helper = \XoopsModules\Testimonial\Helper::getInstance();
    $testimonialsHandler = $helper->getHandler('testimonials');
    $regular_expression = $helper->getConfig('regular_expression');

    $url = \strip_tags($url);
    $url .= \preg_replace('`\[.*\]`U', '', $url);
    $url .= \preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $url);
    $url .= \htmlentities($url, ENT_COMPAT, 'utf-8');
    $url .= \preg_replace('`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', "\1", $url);
    $url .= \preg_replace([$regular_expression, '`[-]+`'], '-', $url);
    $url = ('' == $url) ? $type : \strtolower(\trim($url, '-'));
    return $url;
}