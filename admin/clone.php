<?php declare(strict_types=1);
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
 * @copyright      module for xoops
 * @license         GNU GPL 2.0 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @since          1.0
 * @min_xoops      2.5.11
 * @author         Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com>
 * @version        $Id: 1.0 images.php 1 Mon 2018-03-19 10:04:51Z XOOPS Project (www.xoops.org) $
 */

use Xmf\Request;

require __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op = Request::getString('op', 'list');

$templateMain = 'testimonial_admin_clone.tpl';

switch ($op) {
    case 'list':
    default:
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('clone.php'));
        require_once $GLOBALS['xoops']->path('class/xoopsformloader.php');
        $form  = new \XoopsThemeForm(\sprintf(\_AM_TESTIMONIAL_CLONE_TITLE, $helper->getModule()->getVar('name', 'E')), 'clone', 'clone.php', 'post', true);
        $clone = new \XoopsFormText(\_AM_TESTIMONIAL_CLONE_NAME, 'clone', 20, 20, '');
        $clone->setDescription(\_AM_TESTIMONIAL_CLONE_NAME_DSC);
        $form->addElement($clone, true);
        $form->addElement(new \XoopsFormHidden('op', 'submit'));
        $form->addElement(new \XoopsFormButton('', '', \_SUBMIT, 'submit'));
        $GLOBALS['xoopsTpl']->assign('form', $form->render());

        break;
    case 'submit':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('clone.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        $clone = Request::getString('clone', '', 'POST');
        //check if name is valid
        if (empty($clone) || \preg_match('/[^a-zA-Z0-9\_\-]/', $clone)) {
            \redirect_header('clone.php', 3, \sprintf(\_AM_TESTIMONIAL_CLONE_INVALIDNAME, $clone));
        }

        // Check wether the cloned module exists or not
        $dirClone = $GLOBALS['xoops']->path('modules/' . $clone);
        if ($clone && \is_dir($dirClone)) {
            \redirect_header('clone.php', 3, \sprintf(\_AM_TESTIMONIAL_CLONE_EXISTS, $clone));
        }

        $patterns = [
            \mb_strtolower(\TESTIMONIAL_DIRNAME)           => \mb_strtolower($clone),
            \mb_strtoupper(\TESTIMONIAL_DIRNAME)           => \mb_strtoupper($clone),
            \ucfirst(\mb_strtolower(\TESTIMONIAL_DIRNAME)) => \ucfirst(\mb_strtolower($clone)),
        ];

        $patKeys   = \array_keys($patterns);
        $patValues = \array_values($patterns);
        cloneFileFolder(\TESTIMONIAL_PATH);
        $logocreated = createLogo(\mb_strtolower($clone));

        //change module name in modinfo.php
        // file, read it
        $content = \file_get_contents($dirClone . '/language/english/modinfo.php');
        $content = \str_replace('Testimonial', \mb_strtolower($clone), $content);
        file_put_contents($dirClone . '/language/english/modinfo.php', $content);

        $msg = '';
        if (\is_dir($GLOBALS['xoops']->path('modules/' . \mb_strtolower($clone)))) {
            $msg .= \sprintf(\_AM_TESTIMONIAL_CLONE_CONGRAT, "<a href='" . \XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin&op=installlist'>" . \ucfirst(\mb_strtolower($clone)) . '</a>') . "<br>\n";
            if (!$logocreated) {
                $msg .= \_AM_TESTIMONIAL_CLONE_IMAGEFAIL;
            }
        } else {
            $msg .= \_AM_TESTIMONIAL_CLONE_FAIL;
        }
        $GLOBALS['xoopsTpl']->assign('result', $msg);
        break;
}
require __DIR__ . '/footer.php';

// recursive cloning script
/**
 * @param $path
 */
function cloneFileFolder($path): void
{
    global $patKeys;
    global $patValues;

    //remove \XOOPS_ROOT_PATH and add after replace, otherwise there can be a bug if \XOOPS_ROOT_PATH contains same pattern
    $newPath = \XOOPS_ROOT_PATH . \str_replace($patKeys[0], $patValues[0], \mb_substr($path, \mb_strlen(\XOOPS_ROOT_PATH)));

    if (\is_dir($path)) {
        // create new dir
        if (!\mkdir($newPath) && !\is_dir($newPath)) {
            throw new \RuntimeException(\sprintf('Directory "%s" was not created', $newPath));
        }

        // check all files in dir, and process it
        $handle = \opendir($path);
        if ($handle) {
            while (false !== ($file = \readdir($handle))) {
                if (0 !== \mb_strpos($file, '.')) {
                    cloneFileFolder("{$path}/{$file}");
                }
            }
            \closedir($handle);
        }
    } else {
        $noChangeExtensions = ['jpeg', 'jpg', 'gif', 'png', 'zip', 'ttf'];
        if (\in_array(\mb_strtolower(\pathinfo($path, \PATHINFO_EXTENSION)), $noChangeExtensions)) {
            // image
            \copy($path, $newPath);
        } else {
            // file, read it
            $content = \file_get_contents($path);
            $content = \str_replace($patKeys, $patValues, $content);
            \file_put_contents($newPath, $content);
        }
    }
}

/**
 * @param $dirname
 *
 * @return bool
 */
function createLogo($dirname)
{
    if (!\extension_loaded('gd')) {
        return false;
    }
    $requiredFunctions = [
        'imagecreatefrompng',
        'imagecolorallocate',
        'imagefilledrectangle',
        'imagepng',
        'imagedestroy',
        'imagefttext',
        'imagealphablending',
        'imagesavealpha',
    ];
    foreach ($requiredFunctions as $func) {
        if (!\function_exists($func)) {
            return false;
        }
    }
    //            unset($func);

    if (!\file_exists($imageBase = $GLOBALS['xoops']->path('modules/' . $dirname . '/assets/images/logoModule.png'))
        || !\file_exists($font = $GLOBALS['xoops']->path('modules/' . $dirname . '/assets/images/VeraBd.ttf'))) {
        return false;
    }

    $imageModule = \imagecreatefrompng($imageBase);
    // save existing alpha channel
    \imagealphablending($imageModule, false);
    \imagesavealpha($imageModule, true);

    //Erase old text
    $greyColor = \imagecolorallocate($imageModule, 237, 237, 237);
    \imagefilledrectangle($imageModule, 5, 35, 85, 46, $greyColor);

    // Write text
    $textColor     = \imagecolorallocate($imageModule, 0, 0, 0);
    $spaceToBorder = (int)((80 - \mb_strlen($dirname) * 6.5) / 2);
    \imagefttext($imageModule, 8.5, 0, $spaceToBorder, 45, $textColor, $font, \ucfirst($dirname), []);

    // Set transparency color
    //$white = imagecolorallocatealpha($imageModule, 255, 255, 255, 127);
    //imagefill($imageModule, 0, 0, $white);
    //imagecolortransparent($imageModule, $white);

    \imagepng($imageModule, $GLOBALS['xoops']->path('modules/' . $dirname . '/assets/images/logoModule.png'));
    \imagedestroy($imageModule);

    return true;
}
