<?php
/**
 * ****************************************************************************
 * Module généré par TDMCreate de la TDM "http://www.tdmxoops.net"
 * ****************************************************************************
 * xfaq - MODULE FOR XOOPS AND IMPRESS CMS
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
 * @license         Dolphin
 * @package         xfaq
 * @author 			Mojtaba Jamali (http://mydolphin.ir)
 *
 * Version : 1.00:
 * ****************************************************************************
 */
 	
//Menu
define("_AM_XFAQ_MANAGER_INDEX","Index");

define("_AM_XFAQ_THEREARE_TOPIC","Il y a <span style=\"color: #ff0000; font-weight: bold\">%s</span> Topics dans la Base de donn&#233;e");
define("_AM_XFAQ_THEREARE_TOPIC_ONLINE","Il y a <span style='color: #ff0000; font-weight: bold'>%s</span> Topics en attente");
define("_AM_XFAQ_THEREARE_FAQ","Il y a <span style=\"color: #ff0000; font-weight: bold\">%s</span> Faqs dans la Base de donn&#233;e");
define("_AM_XFAQ_THEREARE_FAQ_ONLINE","Il y a <span style='color: #ff0000; font-weight: bold'>%s</span> Faqs en attente");

define("_AM_XFAQ_MANAGER_ABOUT","A propos");
define("_AM_XFAQ_MANAGER_PREFERENCES","Preferences");
define("_AM_XFAQ_MANAGER_UPDATE","Mise a jour");
define("_AM_XFAQ_MANAGER_PERMISSIONS","Permissions");

//Index
define("_AM_XFAQ_MANAGER_TOPIC","Topic");
define("_AM_XFAQ_MANAGER_FAQ","Faq");


//General
define("_AM_XFAQ_FORMOK","Enregistre avec succes");
define("_AM_XFAQ_FORMDELOK","Supprim&eacute; avec succ&egrave;s");
define("_AM_XFAQ_FORMSUREDEL", "Etes-vous s&ucirc;r de vouloir supprimer : <b><span style=\"color : Red\"> %s </span></b>");
define("_AM_XFAQ_FORMSURERENEW", "Etes-vous s&ucirc;r de vouloir renevouler : <b><span style=\"color : Red\"> %s </span></b>");
define("_AM_XFAQ_FORMUPLOAD","Upload");
define("_AM_XFAQ_FORMIMAGE_PATH","Fichier present dans %s");
define("_AM_XFAQ_FORMACTION","Action");
define("_AM_XFAQ_OFF","Hors ligne");
define("_AM_XFAQ_ON","En ligne");
define("_AM_XFAQ_EDIT","Editer");
define("_AM_XFAQ_DELETE","Supprimer");
define("_AM_XFAQ_TOPIC_ADD","Ajouter un topic");
define("_AM_XFAQ_TOPIC_EDIT","Editer un topic");
define("_AM_XFAQ_TOPIC_ID","Id");
define("_AM_XFAQ_TOPIC_PID","Pid");
define("_AM_XFAQ_TOPIC_TITLE","Title");
define("_AM_XFAQ_TOPIC_DESC","Desc");
define("_AM_XFAQ_TOPIC_IMG","Img");
define("_AM_XFAQ_TOPIC_WEIGHT","Weight");
define("_AM_XFAQ_TOPIC_SUBMITTER","Submitter");
define("_AM_XFAQ_TOPIC_DATE_CREATED","Date_created");
define("_AM_XFAQ_TOPIC_ONLINE","Online");
define("_AM_XFAQ_FAQ_NO_TOPIC","No topic exist for you to send questions.");

define("_AM_XFAQ_FAQ_ADD","Add new faq");
define("_AM_XFAQ_FAQ_EDIT","Edit faq");
define("_AM_XFAQ_FAQ_DELETE","Delete faq");
define("_AM_XFAQ_FAQ_ID","Id");
define("_AM_XFAQ_FAQ_QUESTION","Question");
define("_AM_XFAQ_FAQ_ANSWER","Answer");
define("_AM_XFAQ_FAQ_TOPIC","Topic");
define("_AM_XFAQ_FAQ_URL","Url");
define("_AM_XFAQ_FAQ_OPEN","Open");
define("_AM_XFAQ_FAQ_ANSUSER","Ansuser");
define("_AM_XFAQ_FAQ_SUBMITTER","Submitter");
define("_AM_XFAQ_FAQ_DATE_CREATED","Date_created");
define("_AM_XFAQ_FAQ_ONLINE","Online");
define("_AM_XFAQ_FAQ_USER_FAQ","Your faqs");
define("_AM_XFAQ_FAQ_USER_FAQ","You don't have permission to access this area.<br/>Please login!");
define("_AM_XFAQ_FAQ_NO_ANSWER","There are no answer for this question until now!");

//Blocks.php
define("_AM_XFAQ_TOPIC_BLOCK_DAY","topics d'aujourdh'ui");
define("_AM_XFAQ_TOPIC_BLOCK_RANDOM","topics aleatoires");
define("_AM_XFAQ_TOPIC_BLOCK_RECENT","topics recents");
define("_AM_XFAQ_FAQ_BLOCK_DAY","faqs d'aujourdh'ui");
define("_AM_XFAQ_FAQ_BLOCK_RANDOM","faqs aleatoires");
define("_AM_XFAQ_FAQ_BLOCK_RECENT","faqs recents");

//Permissions
define("_AM_XFAQ_PERMISSIONS_ACCESS","Permission for view");
define("_AM_XFAQ_PERMISSIONS_SUBMIT","Permission for submit");

//About.php
define("_AM_XFAQ_ABOUT_RELEASEDATE","Release Date");
define("_AM_XFAQ_ABOUT_AUTHOR","Author");
define("_AM_XFAQ_ABOUT_CREDITS","Crédits");
define("_AM_XFAQ_ABOUT_README","Générale Information");
define("_AM_XFAQ_ABOUT_MANUAL","Aide");
define("_AM_XFAQ_ABOUT_LICENSE","Licence");
define("_AM_XFAQ_ABOUT_MODULE_STATUS","Status");
define("_AM_XFAQ_ABOUT_WEBSITE","Web Site");
define("_AM_XFAQ_ABOUT_AUTHOR_NAME","Author Name");
define("_AM_XFAQ_ABOUT_AUTHOR_WORD","Author Word");
define("_AM_XFAQ_ABOUT_CHANGELOG","Change Log");
define("_AM_XFAQ_ABOUT_MODULE_INFO","Module Info");
define("_AM_XFAQ_ABOUT_AUTHOR_INFO","Author Info");
define("_AM_XFAQ_ABOUT_DISCLAIMER","Disclaimer");
define("_AM_XFAQ_ABOUT_DISCLAIMER_TEXT","GPL Licensed - No Warranty");
	
?>