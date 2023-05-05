
<h1>Log Level</h1>
<br>
<table class="logleveltable">
    <tr>
        <td>Name</td><td>Description</td>
    </tr>
    <?php foreach ($logs as $l) { ?>
        <tr>
            <td><?=$l->getName()?></td><td><?=$l->getDescription()?></td>
        </tr>
    <?php  } ?>

</table>

