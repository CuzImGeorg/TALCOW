<h1>PostgreSQL</h1>
<table>
    <tr>
        <td>Name</td>
        <td>Tables</td>
        <td>Host</td>
        <td>Port</td>
        <td>User</td>
        <td>Description</td>
        <td>Useredit</td>
    </tr>
    <?php foreach ($databases as $index => $database) { ?>
        <tr>
            <td><?=$database["db"]->getPgdatabase()?></td>
            <td onclick="databasetablehideshow(<?=$index?>)">Tables</td>
            <td><?=$database["db"]->getPghost()?></td>
            <td><?=$database["db"]->getPgport()?></td>
            <td><?=$database["db"]->getPguser()?></td>
            <td><?=$database["db"]->getDescription()?></td>
            <td><?=$database["db"]->findeUser()->getName()?></td>
        </tr>
    <?php } ?>
</table>
<div style="min-height: 20px"><br></div>

<?php foreach ($databases as $index => $database) { ?>
    <table id="mpgschematable<?=$index?>" name="mpgschematable" class="mpgschematable">
        <tr>
            <td onclick="databasetablehideshow(<?=$index?>)">Tables for <?=$database["db"]->getPgdatabase()?></td>
        </tr>
        <?php foreach ($database["tables"] as $table) { ?>
            <tr>
                <td><?=$table["tablename"]?></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
