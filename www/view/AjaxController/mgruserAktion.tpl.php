
<h1>User</h1>
<br>
<table class="usertable">
    <tr><td><button class="btnnewUser"  id="btnu" onclick="newUser()">+</button></td></tr>
    <tr class="newUserPermission">

        <td><input type="text" hidden id="nun"  placeholder="Name"></td>
        <td><input type="text" hidden  id="up"   placeholder="Password"></td>
        <td><input type="text" hidden  id="ud"   placeholder="Description"></td>
        <td><button type="button" hidden id="btnnusub" onclick="newUserSubmit()"  >Submit</button</td>
    <tr>
<tr>
    <td>Name</td><td>Description</td><td>Create Date</td><td>Active</td><td>Permissions</td><td>Password</td><td>Deactivate</td>
</tr>
    <?php foreach ($user as $u) { ?>
        <tr>
            <td><?=$u->getName()?></td>
            <td><?=$u->getDescription()?></td>
            <td><?=$u->getCreatedate()?></td>
            <td><?=$u->isActive()?></td>
            <td><button onclick="b1 = false; loadUserPermissionsByUserId(<?=$u->getId()?>)"> Perms </button> </td>
            <td>TODO Change password</td>
            <td>TODO deactivate</td>
        </tr>
    <?php  } ?>

</table>

