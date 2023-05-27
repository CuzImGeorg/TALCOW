
<h1>Log Level</h1>
<br>
<table class="logleveltable">
    <tr>
        <th id="lln">Name</th>
        <th id="lld">Description</th>
    </tr>
    <?php foreach ($logs as $l) { ?>
        <tr>
            <td ><button id="btnln"  onclick="loadLogThenLoadByLevel('<?=$l->getName()?>')"><?=$l->getName()?></button></td><td><?=$l->getDescription()?></td>
        </tr>
    <?php  } ?>

</table>

