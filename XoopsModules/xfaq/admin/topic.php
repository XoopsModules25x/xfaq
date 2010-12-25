<?php
/**
 * ****************************************************************************
 * Module g�n�r� par TDMCreate de la TDM "http://www.tdmxoops.net"
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
 
include_once("./header.php");
	
xoops_cp_header();

if (isset($_REQUEST["op"])) {
	$op = $_REQUEST["op"];
} else {
	@$op = "show_list_topic";
}

//Menu admin
if ( !is_readable(XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php") ) {
xfaq_adminmenu(1, _AM_XFAQ_MANAGER_TOPIC);
} else {
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";
loadModuleAdminMenu (1, _AM_XFAQ_MANAGER_TOPIC);
}

//Sous menu
echo "<div class=\"CPbigTitle\" style=\"background-image: url(../images/deco/topic.png); background-repeat: no-repeat; background-position: left; padding-left: 50px;\">
		<strong>"._AM_XFAQ_MANAGER_TOPIC."</strong>
	</div><br /><br>";
switch ($op) 
{	
	case "save_topic":
		if ( !$GLOBALS["xoopsSecurity"]->check() ) {
           redirect_header("topic.php", 3, implode(",", $GLOBALS["xoopsSecurity"]->getErrors()));
        }
        if (isset($_REQUEST["topic_id"])) {
           $obj =& $topicHandler->get($_REQUEST["topic_id"]);
        } else {
           $obj =& $topicHandler->create();
        }
		$obj->setVar("topic_pid", $_REQUEST["topic_pid"]);
			$obj->setVar("topic_title", $_REQUEST["topic_title"]);
			$obj->setVar("topic_desc", $_REQUEST["topic_desc"]);
			$obj->setVar("topic_img", $_REQUEST["topic_img"]);
			$obj->setVar("topic_weight", $_REQUEST["topic_weight"]);
			$obj->setVar("topic_submitter", $_REQUEST["topic_submitter"]);
			$obj->setVar("topic_date_created", strtotime($_REQUEST["topic_date_created"]));
			$online = ($_REQUEST["topic_online"] == 1) ? "1" : "0";
			$obj->setVar("topic_online", $online);
			
		
        if ($topicHandler->insert($obj)) {
		
				$newcat_cid = $obj->get_new_enreg();
                //permission pour voir
                $perm_id = isset($_REQUEST['topic_id']) ? intval($_REQUEST['topic_id']) : $newcat_cid;
                $gperm_handler = &xoops_gethandler('groupperm');
                $criteria = new CriteriaCompo();
                $criteria->add(new Criteria('gperm_itemid', $perm_id, '='));
                $criteria->add(new Criteria('gperm_modid', $xoopsModule->getVar('mid'),'='));
                $criteria->add(new Criteria('gperm_name', 'xfaq_access', '='));
                $gperm_handler->deleteAll($criteria);
                if(isset($_REQUEST['groups_view'])) {
                    foreach($_REQUEST['groups_view'] as $onegroup_id) {
                        $gperm_handler->addRight('xfaq_access', $perm_id, $onegroup_id, $xoopsModule->getVar('mid'));
                    }
                }
                //permission pour editer
               $perm_id = isset($_REQUEST['topic_id']) ? intval($_REQUEST['topic_id']) : $newcat_cid;
                $gperm_handler = &xoops_gethandler('groupperm');
                $criteria = new CriteriaCompo();
                $criteria->add(new Criteria('gperm_itemid', $perm_id, '='));
                $criteria->add(new Criteria('gperm_modid', $xoopsModule->getVar('mid'),'='));
                $criteria->add(new Criteria('gperm_name', 'xfaq_submit', '='));
                $gperm_handler->deleteAll($criteria);
                if(isset($_POST['groups_submit'])) {
                    foreach($_POST['groups_submit'] as $onegroup_id) {
                        $gperm_handler->addRight('xfaq_submit', $perm_id, $onegroup_id, $xoopsModule->getVar('mid'));
                    }
                }
			
		
		
           redirect_header("topic.php?op=show_list_topic", 2, _AM_XFAQ_FORMOK);
        }
        //include_once("../include/forms.php");
        echo $obj->getHtmlErrors();
        $form =& $obj->getForm();
	break;
	
	case "edit_topic":
		$obj = $topicHandler->get($_REQUEST["topic_id"]);
		$form = $obj->getForm();
	break;
	
	case "delete_topic":
		$obj =& $topicHandler->get($_REQUEST["topic_id"]);
		if (isset($_REQUEST["ok"]) && $_REQUEST["ok"] == 1) {
			if ( !$GLOBALS["xoopsSecurity"]->check() ) {
				redirect_header("topic.php", 3, implode(",", $GLOBALS["xoopsSecurity"]->getErrors()));
			}
			if ($topicHandler->delete($obj)) {
				redirect_header("topic.php", 3, _AM_XFAQ_FORMDELOK);
			} else {
				echo $obj->getHtmlErrors();
			}
		} else {
			xoops_confirm(array("ok" => 1, "topic_id" => $_REQUEST["topic_id"], "op" => "delete_topic"), $_SERVER["REQUEST_URI"], sprintf(_AM_XFAQ_FORMSUREDEL, $obj->getVar("topic")));
		}
	break;
	
	case "update_online_topic":
		
	if (isset($_REQUEST["topic_id"])) {
		$obj =& $topicHandler->get($_REQUEST["topic_id"]);
	} 
	$obj->setVar("topic_online", $_REQUEST["topic_online"]);

	if ($topicHandler->insert($obj)) {
		redirect_header("topic.php", 3, _AM_XFAQ_FORMOK);
	}
	echo $obj->getHtmlErrors();
	
	break;
	
	case "default":
	default:

		$criteria = new CriteriaCompo();
		$criteria->setSort("topic_id");
		$criteria->setOrder("ASC");
		$numrows = $topicHandler->getCount();
		$topic_arr = $topicHandler->getall($criteria);
		
		//Affichage du tableau
		if ($numrows>0) 
		{			
			echo "<table width=\"100%\" cellspacing=\"1\" class=\"outer\">
				<tr>
					<th align=\"center\">"._AM_XFAQ_TOPIC_TITLE."</th>
						<th align=\"center\">"._AM_XFAQ_TOPIC_DESC."</th>
						<th align=\"center\">"._AM_XFAQ_TOPIC_IMG."</th>
						<th align=\"center\">"._AM_XFAQ_TOPIC_WEIGHT."</th>
						<th align=\"center\">"._AM_XFAQ_TOPIC_ONLINE."</th>
						
					<th align=\"center\" width=\"10%\">"._AM_XFAQ_FORMACTION."</th>
				</tr>";
					
			$class = "odd";
			
			foreach (array_keys($topic_arr) as $i) 
			{
				echo "<tr class=\"".$class."\">";
				$class = ($class == "even") ? "odd" : "even";
				echo "<td align=\"center\">".$topic_arr[$i]->getVar("topic_title")."</td>";	
					echo "<td align=\"center\">".$topic_arr[$i]->getVar("topic_desc")."</td>";	
					echo "<td align=\"center\">".$topic_arr[$i]->getVar("topic_img")."</td>";	
					echo "<td align=\"center\">".$topic_arr[$i]->getVar("topic_weight")."</td>";	
					
					$online = $topic_arr[$i]->getVar("topic_online");
				
					if( $online == 1 ) {
						echo "<td align=\"center\"><a href=\"./topic.php?op=update_online_topic&topic_id=".$topic_arr[$i]->getVar("topic_id")."&topic_online=0\"><img src=\"./../images/deco/on.gif\" border=\"0\" alt=\""._AM_XFAQ_ON."\" title=\""._AM_XFAQ_ON."\"></a></td>";	
					} else {
						echo "<td align=\"center\"><a href=\"./topic.php?op=update_online_topic&topic_id=".$topic_arr[$i]->getVar("topic_id")."&topic_online=1\"><img src=\"./../images/deco/off.gif\" border=\"0\" alt=\""._AM_XFAQ_OFF."\" title=\""._AM_XFAQ_OFF."\"></a></td>";
					}
							echo "<td align=\"center\" width=\"10%\">
								<a href=\"topic.php?op=edit_topic&topic_id=".$topic_arr[$i]->getVar("topic_id")."\"><img src=\"../images/deco/edit.gif\" alt=\""._AM_XFAQ_EDIT."\" title=\""._AM_XFAQ_EDIT."\"></a>
								<a href=\"topic.php?op=delete_topic&topic_id=".$topic_arr[$i]->getVar("topic_id")."\"><img src=\"../images/deco/delete.gif\" alt=\""._AM_XFAQ_DELETE."\" title=\""._AM_XFAQ_DELETE."\"></a>
							  </td>";
				echo "</tr>";
			}
			echo "</table><br><br>";
		}
		// Affichage du formulaire
    	$obj =& $topicHandler->create();
    	$form = $obj->getForm();	
}

xoops_cp_footer();
	
?>