<h1>Log Actions</h1>

<table class="logtable">

    <tr><td><input type="checkbox" checked> show debug</input></td></tr>
    <tr><td><input type="checkbox" checked> show warning</input></td></tr>
    <tr><td><input type="checkbox" checked> show error</input></td></tr>
    <tr><td><input type="checkbox" checked> show critical</input></td></tr>
    <tr>
        <td>User Name</td><td>Action Name</td><td> Level</td><td>Description</td><td>Time</td><td>Delete</td>
    </tr>
    <?php foreach ($logs as $l) { ?>
        <tr>
        <td><button onclick="loadMrgUserById(<?=$l->findeUser()->getId()?>)"><?=$l->findeUser()->getName()?></button></td><td><?=$l->getLog_action()->getName()?></td><td><?=$l->getLog_level()->getName()?></td><td><?=$l->getDescription()?></td><td><?=$l->getTimestamp() ?></td><td>Todo Remove </td>
        </tr>
    <?php  } ?>

</table>

