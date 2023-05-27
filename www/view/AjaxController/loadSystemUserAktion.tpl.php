<h1>System User</h1>
<table>
    <tr>
        <th>User Name</th>
        <th>Change Password</th>
        <th>Remove</th>
    </tr>
<?php foreach ($users as $index => $user) { ?>
    <tr>
        <td><?=$user?></td>
        <td><button id="sysucp<?=$index?>" type="button" onclick="changesysuserpw('<?=$user?>', <?=$index?>)">Change Password</button></td>
        <td><input id="sysunp<?=$index?>" hidden type="text" placeholder="New Password"></input></td>
        <td><button type="button" onclick="dluser('<?=$user?>')">Remove User</button></td>
    </tr>
<?php } ?>

</table>
