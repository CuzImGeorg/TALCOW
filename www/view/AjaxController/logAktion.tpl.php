<?php if(!isset($_POST["lvl"]) && !isset($_POST["name"])) { ?>
<h1>Log</h1>

<table>
    <tr><td><input id="cb-1" type="checkbox" onclick="b3 = true;cbAllcheck()" checked/></td></tr>
    <tr><td><input id="cb0" type="checkbox" onclick="b3 = true;loadLogByLogLevel()" checked/><label id="lcb0" for="cb0">debug</label></td></tr>
    <tr><td><input id="cb1" type="checkbox" onclick="b3 = true;loadLogByLogLevel()" checked/><label  id="lcb1" for="cb1">warning</label></td></tr>
    <tr><td><input id="cb2" type="checkbox" onclick="b3 = true;loadLogByLogLevel()" checked/><label id="lcb2" for="cb2">error</label></td></tr>
    <tr><td><input id="cb3" type="checkbox" onclick="b3 = true;loadLogByLogLevel()" checked/><label id="lcb3" for="cb3">critical</label></td></tr>
</table>

<table class="logtable" id="logtable">

<?php } ?>
        <tr>
        <th id="ltun">User Name</th>
        <th id="ltan">Action Name</th>
        <th id="ltl"> Level</th>
        <th id="ltd">Description</th>
        <th id="ltt">Time</th>
        <?php if($this->hasPermission("deletelog") || $this->hasPermission("sudo")) { ?>
            <th>Delete</th>
        <?php } ?>
    </tr>
    <?php foreach ($logs as $l) { ?>
        <tr>
            <td><button onclick="loadLogByUserId(<?=$l->findeUser()->getId()?>)"><?=$l->findeUser()->getName()?></button></td>
            <td><button onclick='loadLogByName("<?=$l->getLog_action()->getName()?>")'><?=$l->getLog_action()->getName()?></button></td>
            <td><button  onclick='updateCbLogLevel("<?=$l->getLog_level()->getName()?>")'><?=$l->getLog_level()->getName()?></button></td>
            <td><?=$l->getDescription()?></td>
            <td><?=$l->getTimestamp() ?></td>
            <?php if($this->hasPermission("deletelog") || $this->hasPermission("sudo")) { ?>
                <td><button onclick="removeLog(<?=$l->getId()?>)">Remove</button> </td>
            <?php } ?>
        </tr>
    <?php  } ?>

 <?php if(!isset($_GET["lvl"]) && !isset($_GET["name"])) { ?>
    </table>

<?php }
?>


