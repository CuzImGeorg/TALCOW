
<h1>User</h1>
<br>
<table class="usertable">
<tr>
    <td>Name</td><td>Description</td><td>Create Date</td><td>Active</td><td>Permissions</td><td>Tpl</td>
</tr>
    <?php foreach ($user as $u) { ?>
        <td><?=$u->getName()?></td><td><?=$u->getDescription()?></td><td><?=$u->getCreatedate()?></td><td><?=$u->isActive()?></td><td><button onclick="loadUserPermissionsByUserId(<?=$u->getId()?>)"> Perms </button> </td><td>TODO deactivate</td>
    <?php  } ?>

</table>

