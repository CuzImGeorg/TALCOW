<h1>Modules</h1>
<table class="modultable" id="modultable">

    <tr id="mttr">
        <th id="mn">Name</th>
        <th id="mu">Installed By User</th>
        <th id="mv">Value</th>
        <th id="ma">Activate</th>
        <th id="mi">Install</th>
    </tr>
    <?php foreach ($moduls as $m) { ?>
    <tr>
        <td><?=$m->getName()?></td>
        <td><?=$m->findeUser()->getName()?></td>
        <td><?=$m->getValue()->getName()?></td>

        <?php if($m->getName() === "global") { ?>
            <td >N/A</td>
            <td >N/A</td>
        <?php } else {?>

        <?php if($m->getValue()->getName() === "active") { ?>
            <td><button class="btnm">Deactivate</button></td>
            <td><button class="btnm2">Uninstall</button></td>
        <?php } ?>

        <?php if($m->getValue()->getName() === "installed") { ?>
            <td><button class="btnm">Activate</button></td>
            <td><button class="btnm2">Uninstall</button></td>
        <?php } ?>

        <?php if($m->getValue()->getName() === "not installed") { ?>
            <td >N/A</td>
            <td><button class="btnm2">Install</button></td>
        <?php } ?>
        <?php } ?>
    </tr>

    <?php } ?>

</table>

