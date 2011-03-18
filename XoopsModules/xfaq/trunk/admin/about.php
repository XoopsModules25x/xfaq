<?php
/**
 * ****************************************************************************
 * Module généré par TDMCreate de la TDM "http://www.tdmxoops.net"
 * ****************************************************************************
 * xfaq - MODULE FOR XOOPS CMS
 * Copyright (c) Mojtaba Jamali (http://mydolphin.ir)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Mojtaba Jamali (http://mydolphin.ir)
 * @license         GPL
 * @package         xfaq
 * @author 			Mojtaba Jamali (http://mydolphin.ir)
 *
 * Version : 1.00:
 * ****************************************************************************
 */
include "header1.php";

$module_info =& $module_handler->get( $xoopsModule->getVar("mid") );

$xoopsTpl->assign("module_name",            $xoopsModule->getVar("name") );
$xoopsTpl->assign("module_dirname",         $xoopsModule->getVar("dirname") );
$xoopsTpl->assign("module_image",           $module_info->getInfo("image") );
$xoopsTpl->assign("module_version",         $module_info->getInfo("version") );
$xoopsTpl->assign("module_description",         $module_info->getInfo("description") );
//$xoopsTpl->assign("module_release",         $module_info->getInfo("release") );
$xoopsTpl->assign("module_author",          $module_info->getInfo("author") );
$xoopsTpl->assign("module_credits",         $module_info->getInfo("credits") );
$xoopsTpl->assign("module_license_url",     $module_info->getInfo("license_url") );
$xoopsTpl->assign("module_license",         $module_info->getInfo("license") );
$xoopsTpl->assign("module_status",          $module_info->getInfo("module_status") );
$xoopsTpl->assign("module_website_url",     $module_info->getInfo("module_website_url") );
$xoopsTpl->assign("module_website_name",    $module_info->getInfo("module_website_name") );
$xoopsTpl->assign("author_website_url",     $module_info->getInfo("author_website_url") );
$xoopsTpl->assign("author_website_name",    $module_info->getInfo("author_website_name") );

global $xoopsModule;
$xoopsTpl->assign("module_update_date", formatTimestamp($xoopsModule->getVar("last_update"),"m") );

if ( is_readable( $changelog = XOOPS_ROOT_PATH . "/modules/" . $xoopsModule->getVar("dirname") . "/docs/changelog.txt" ) ){
    $xoopsTpl->assign("changelog",          implode("<br />", file( $changelog ) ) );
}

$xoopsTpl->display("db: admin/" . $xoopsModule->getVar("dirname") . "_admin_about.html");

include "footer1.php";
?>