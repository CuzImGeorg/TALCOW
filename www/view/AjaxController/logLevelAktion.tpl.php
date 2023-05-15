
<h1>Log Level</h1>
<br>
<table class="logleveltable">
    <tr>
        <td>Name</td><td>Description</td>
    </tr>
    <?php foreach ($logs as $l) { ?>
        <tr>
            <td><button  onclick="loadLogThenLoadByLevel('<?=$l->getName()?>')"><?=$l->getName()?></button></td><td><?=$l->getDescription()?></td>
        </tr>
    <?php  } ?>

</table>

