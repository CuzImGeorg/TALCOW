<h1>Permission</h1>
<br>
<table class="permissiontable">
    <tr>
        <td>Name</td><td>Description</td><td>User</td><td>Remove</td>
    </tr>
    <?php foreach ($perms as $p) { ?>
        <td><?=$p->getname()?></td><td><?=$p->getDescription()?></td><td>Todo User</td>

    <?php  } ?>

</table>

