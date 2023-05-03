<h1>User Permission</h1>
<br>
<?php var_dump($perms);?>
<table class="userpermissiontable">
    <tr>
        <td>User Name</td><td>Permission Name</td><td>Create Time</td><td>Created By User </td><td>Remove</td>
    </tr>
    <?php foreach ($perms as $p) { ?>

        <td><?=$p->findeUser()->getname()?></td><td><?=$p->findeBerechtigung()->getName()?></td><td><?=$p->getCreateTime() ?></td><td>Todo User</td><td>Todo Remove </td>

    <?php  } ?>

</table>

