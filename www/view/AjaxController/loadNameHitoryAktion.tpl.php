<h1>Name History for User: <?=$user->getName()?></h1>
<br>
<table class="permissiontable">
    <tr>
        <td>Old Name</td>
        <td>New Name</td>
        <td>Time</td>
    </tr>
    <?php foreach ($unh as $un) { ?>
        <tr>
            <td><?=$un->getOldname()?></td>
            <td><?=$un->getNewname()?></td>
            <td><?=$un->getChangetime()?></td>

        </tr>
    <?php  } ?>

</table>
<br>
<button onclick="loadMrgUser()">← Users</button>

