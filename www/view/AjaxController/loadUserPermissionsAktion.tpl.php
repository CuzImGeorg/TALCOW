<h1>User Permission</h1>
<br>
<table class="userpermissiontable">
    <tr>
        <td>User Name</td><td>Permission Name</td><td>Create Time</td><td>Created By User </td><td>Remove</td>
    </tr>
    <?php foreach ($perms as $p) { ?>
    <tr>
        <td><button onclick=" loadUserPermissionsByUserId(<?=$p->findeUser()->getId()?>)"><?=$p->findeUser()->getname()?></button></td><td><?=$p->findeBerechtigung()->getName()?></td><td><?=$p->getCreateTime() ?></td><td><?=$p->findeNachUseredit()->getName()?></td><td>Todo Remove </td>
    </tr>
    <?php  } ?>

</table>

