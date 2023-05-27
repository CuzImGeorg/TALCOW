<h1>User Permission</h1>
<datalist id="dl" ></datalist>
<datalist id="dl2" ></datalist>

<button class="btnnewUserPermission"  id="btnup" onclick="newUserPermission()">+</button>
<div class="newUserPermission">
    <input type="text" id="upun" list="dl" onclick="updateUsernameList()" hidden   placeholder="Name">
    <input type="text" list="dl2" id="upp" onclick="updatePermissionList()" hidden placeholder="Permission">
    <button hidden="hidden" type="button"  id="btnsub" onclick="btnAddUserBerechtigung()"  >Submit</button>
</div>


<table class="userpermissiontable">

    <tr>
        <th id="uspeun">User Name</th>
        <th id="uspepn">Permission Name</th>
        <th id="uspect">Create Time</th>
        <th id="uspecbu">Created By User </th>
        <th id="usper">Remove</th>
    </tr>
    <?php foreach ($perms as $p) { ?>
    <tr>
        <td><button onclick=" loadUserPermissionsByUserId(<?=$p->findeUser()->getId()?>)"><?=$p->findeUser()->getname()?></button></td>
        <td><?=$p->findeBerechtigung()->getName()?></td>
        <td><?=$p->getCreateTime() ?></td>
        <td><?=$p->findeNachUseredit()->getName()?></td>
        <td>Todo Remove </td>
    </tr>
    <?php  } ?>

</table>

