<h1>User</h1>
<br>
<table class="usertable">
    <?php   if($this->hasPermission("createUser") || $this->hasPermission("sudo") ) { ?>

    <tr><td><button class="btnnewUser"  id="btnu" onclick="newUser()">+</button></td></tr>
    <tr class="newUserPermission">

        <td><input type="text" hidden id="nun"  placeholder="Name"></td>
        <td><input type="text" hidden  id="up"   placeholder="Password"></td>
        <td><input type="text" hidden  id="ud"   placeholder="Description"></td>
        <td><button type="button" hidden id="btnnusub" onclick="newUserSubmit()"  >Submit</button</td>
    <tr>
    <?php } ?> ?>
<tr>
    <td>Name</td>
    <td>Description</td>
    <td>Create Date</td>
    <td>Active</td>
        <?php if($this->hasPermission("viewuserpermissions") || $this->hasPermission("sudo")) { ?>
            <td>Permissions</td>
        <?php } ?>

        <?php if($this->hasPermission("changeusername") || $this->hasPermission("sudo")) { ?>
            <td>Change Username</td>
        <?php } ?>

    <td>Change Password</td>
    <td>Deactivate</td>

</tr>
    <?php foreach ($user as $index => $u) { ?>
        <tr>
            <td><?=$u->getName()?></td>
            <td><?=$u->getDescription()?></td>
            <td><?=$u->getCreatedate()?></td>
            <td><?=$u->isActive()?></td>

            <?php if($this->hasPermission("viewuserpermissions") || $this->hasPermission("sudo")) { ?>
                <td><button onclick="b1 = false; loadUserPermissionsByUserId(<?=$u->getId()?>)"> Perms </button> </td>
            <?php } ?>

            <?php if($this->hasPermission("changeusername") || $this->hasPermission("sudo")) { ?>
                <td><button type="button" class="btnunc" id="btnunc<?=$index?>" onclick="usernameChange(<?=$index?>, <?=$u->getId()?>)">Change Name</button>  <input hidden id="inun<?=$index?>" type="text" placeholder="New Username">  </td>
            <?php } ?>

            <td><button type="button" class="btnunc" id="btnp<?=$index?>" onclick="userpwChange(<?=$index?>, <?=$u->getId()?>)">Change Password</button>  <input hidden id="inp<?=$index?>" type="text" placeholder="New Password">  </td>
            <td>TODO deactivate</td>
        </tr>
    <?php  } ?>

</table>

