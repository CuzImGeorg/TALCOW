<?php if(!isset($_GET["lvl"])) { ?>
<h1>Log</h1>

<table >
    <tr><td><input id="cb-1" type="checkbox" onclick="b3 = true;cbAllcheck()" checked/></td></tr>
    <tr><td><input id="cb0" type="checkbox" onclick="b3 = true;loadLogByLogLevel()" checked/><label id="lcb0" for="cb0">debug</label></td></tr>
    <tr><td><input id="cb1" type="checkbox" onclick="b3 = true;loadLogByLogLevel()" checked/><label  id="lcb1" for="cb1">warning</label></td></tr>
    <tr><td><input id="cb2" type="checkbox" onclick="b3 = true;loadLogByLogLevel()" checked/><label id="lcb2" for="cb2">error</label></td></tr>
    <tr><td><input id="cb3" type="checkbox" onclick="b3 = true;loadLogByLogLevel()" checked/><label id="lcb3" for="cb3">critical</label></td></tr>
</table>

<table class="logtable" id="logtable">

<?php } ?>



    <tr>
        <td>User Name</td><td>Action Name</td><td> Level</td><td>Description</td><td>Time</td><td>Delete</td>
    </tr>
    <?php foreach ($logs as $l) { ?>
        <tr>
            <td><button onclick="loadLogByUserId(<?=$l->findeUser()->getId()?>)"><?=$l->findeUser()->getName()?></button></td><td><?=$l->getLog_action()->getName()?></td><td><button  onclick='updateCbLogLevel("<?=$l->getLog_level()->getName()?>")'><?=$l->getLog_level()->getName()?></button></td><td><?=$l->getDescription()?></td><td><?=$l->getTimestamp() ?></td><td><button onclick="removeLog(<?=$l->getId()?>)">Remove</button> </td>
        </tr>
    <?php  } ?>

 <?php if(!isset($_GET["lvl"])) { ?>
    </table>

<?php } ?>
