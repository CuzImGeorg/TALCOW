
<h1>Log Level</h1>
<br>
<table class="logleveltable">
    <tr>
        <td id="lln">Name</td>
        <td id="lld">Description</td>
    </tr>
    <?php foreach ($logs as $l) { ?>
        <tr>
            <td ><button id="btnln"  onclick="loadLogThenLoadByLevel('<?=$l->getName()?>')"><?=$l->getName()?></button></td><td><?=$l->getDescription()?></td>
        </tr>
    <?php  } ?>

</table>

