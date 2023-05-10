<?php if(!isset($_GET["lvl"])) { ?>
<h1>Log Actions</h1>

<table >
    <tr><td><input id="cb-1" type="checkbox" onclick="cbAllcheck()" checked/></td></tr>
    <tr><td><input id="cb0" type="checkbox" onclick="loadLogByLogLevel()" checked/><label for="cb0"> show debug</label></td></tr>
    <tr><td><input id="cb1" type="checkbox" onclick="loadLogByLogLevel()" checked/> <label for="cb1">warning</label></td></tr>
    <tr><td><input id="cb2" type="checkbox" onclick="loadLogByLogLevel()" checked/><label for="cb2"> error</label></td></tr>
    <tr><td><input id="cb3" type="checkbox" onclick="loadLogByLogLevel()" checked/><label for="cb3"> critical</label></td></tr>
</table>

<table class="logtable" id="logtable">

<?php } ?>



    <tr>
        <td>User Name</td><td>Action Name</td><td> Level</td><td>Description</td><td>Time</td><td>Delete</td>
    </tr>
    <?php foreach ($logs as $l) { ?>
        <tr>
            <td><button onclick="loadLogByUserId(<?=$l->findeUser()->getId()?>)"><?=$l->findeUser()->getName()?></button></td><td><?=$l->getLog_action()->getName()?></td><td><?=$l->getLog_level()->getName()?></td><td><?=$l->getDescription()?></td><td><?=$l->getTimestamp() ?></td><td><button onclick="removeLog(<?=$l->getId()?>)">Remove</button> </td>
        </tr>
    <?php  } ?>

 <?php if(!isset($_GET["lvl"])) { ?>
    </table>

<?php } ?>
