<h1>User Permission</h1>
<datalist id="dl" >

</datalist>
<table class="userpermissiontable">
    <tr><td><button class="btnnewUserPermission"  id="btnup" onclick="newUserPermission()">+</button></td></tr>
    <tr class="newUserPermission">

       <td><input id="upun" list="dl" onclick="updateUsernameList()" hidden name="unsel" id="unsel" placeholder="Name"></td>
        <td><input type="text" id="upp" hidden placeholder="Permission"></td>
    <tr>
    <tr>
        <td>User Name</td><td>Permission Name</td><td>Create Time</td><td>Created By User </td><td>Remove</td>
    </tr>
    <?php foreach ($perms as $p) { ?>
    <tr>
        <td><button onclick=" loadUserPermissionsByUserId(<?=$p->findeUser()->getId()?>)"><?=$p->findeUser()->getname()?></button></td><td><?=$p->findeBerechtigung()->getName()?></td><td><?=$p->getCreateTime() ?></td><td><?=$p->findeNachUseredit()->getName()?></td><td>Todo Remove </td>
    </tr>
    <?php  } ?>

</table>

