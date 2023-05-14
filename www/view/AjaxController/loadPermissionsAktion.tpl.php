<h1>Permission</h1>
<br>
<table class="permissiontable">
    <tr>
        <td>Name</td><td>Description</td><td>User</td>
    </tr>
    <?php foreach ($perms as $p) { ?>
    <tr>
        <td><button onclick="loadUserPermissionsByBerechtigungsName('<?=$p->getName()?>')"><?=$p->getName()?></button></td><td><?=$p->getDescription()?></td>
    </tr>
    <?php  } ?>

</table>

