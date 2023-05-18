<table>
    <tr>
        <td>User Name</td><td>Change Password</td><td>Remove</td>
    </tr>
<?php foreach ($users as $user) { ?>
    <tr>
        <td><?=$user?></td>
        <td><button type="button" onclick="">Change Password</button></td>
        <td><button type="button" onclick="dluser('<?=$user?>')">Remove User</button></td>

    </tr>
<?php } ?>

</table>
