<h1>PostgreSQL</h1>
<div style="margin-left: 20px">

    <h4 style="margin-bottom: 1px">Add Connection</h4>
    <input id="name" type="text" required placeholder="Database Name">
    <input id="host" type="text" required placeholder="Host" value="localhost">
    <input id="port" type="number"  required placeholder="Port" value="5432">
    <input id="user" type="text" required placeholder="User" value="postgres">
    <input id="pw" type="text" required placeholder="Password">
    <input id="desc" type="text" required placeholder="Description">
    <button type="button" onclick="addConnection()" >Submit</button>
</div>
<br>
<div style="margin-left: 20px">
    <table>
        <tr>
            <th>Name</th>
            <th>Tables</th>
            <th>Host</th>
            <th>Port</th>
            <th>User</th>
            <th>Description</th>
            <th>Useredit</th>
            <?php if($this->hasPermission("droppgdataabse") || $this->hasPermission("sudo")) {?>
                <th>DROP</th>
            <?php } ?>
        </tr>
        <?php foreach ($databases as $index => $database) { ?>
            <tr id="database<?=$index?>" name="database">
                <td><?=$database["db"]->getPgdatabase()?></td>
                <td><button id="btntable<?=$index?>" onclick="databasetablehideshow(<?=$index?>)">Select</button></td>
                <td><?=$database["db"]->getPghost()?></td>
                <td><?=$database["db"]->getPgport()?></td>
                <td><?=$database["db"]->getPguser()?></td>
                <td><?=$database["db"]->getDescription()?></td>
                <td><?=$database["db"]->findeUser()->getName()?></td>
                <?php if(($this->hasPermission("droppgdataabse") || $this->hasPermission("sudo")) && $database["db"]->getPghost() == "localhost" && $database["db"]->getPgdatabase() != "talcow") {?>
                    <td><button onclick="dropdb('<?=$database["db"]->getPgdatabase()?>')">DROP</button></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    <div style="min-height: 20px"><br></div>

    <?php foreach ($databases as $index => $database) { ?>
        <?php if($database["tables"] != null) { ?>
        <?php if(($this->hasPermission("execSQL") || $this->hasPermission("sudo")) && $database["db"]->getPghost() == "localhost" ) {?>
            <input type="text" hidden  placeholder="SQL" id="sqlinput<?=$index?>" name="mpgschematable" class="slqinput" >
            <button type="button" hidden name="mpgschematable" onclick="execSQL(<?=$index?>, <?=$database["db"]->getId()?>)" class="btnsqlinput" id="btnsqlinput<?=$index?>">Execute</button>
            <br/>
            <div hidden="" name="sqloutput" class="sqloutput" id="sqloutput<?=$index?>"></div>
            <button type="button" hidden onclick="closeout(<?=$index?>)" id="closeout<?=$index?>" name="closeout" class="closeout">Close Output</button>

        <?php } ?>
        <table style="width: 70%" hidden id="mpgschematable<?=$index?>" name="mpgschematable" class="mpgschematable">
            <caption><h2 style="margin-bottom: 5px; margin-top: 5px">Tables for <?=$database["db"]->getPgdatabase()?></h2></caption>
            <tr>
                <th id="pgs">Select</th>
                <th id="pgn">Name</th>
                <th id="pgd">DROP</th>
                <th id="pgdc">DROP CASCADE</th>
            </tr>
            <?php  foreach ($database["tables"] as $index => $table) { ?>
                <tr>
                    <td><button id="tablemoreless<?=$index?>" onclick="tablemoreless(<?=$index?>,'<?=$table["tablename"]?>', '<?=$database["db"]->getPgdatabase()?>')">More</button></td>
                    <td><?=$table["tablename"]?></td>
                    <?php if(($this->hasPermission("droppgtables") || $this->hasPermission("sudo")) && $database["db"]->getPghost() == "localhost" ) {?>
                        <td><button onclick="dropTable('<?=$database["db"]->getPgdatabase()?>', '<?=$table["tablename"]?>', false)">DROP</button></td>
                    <?php } ?>
                    <?php if(($this->hasPermission("droppgtablescascase") || $this->hasPermission("sudo")) && $database["db"]->getPghost() == "localhost" ) {?>
                        <td><button onclick="dropTable('<?=$database["db"]->getPgdatabase()?>', '<?=$table["tablename"]?>', true)">DROP CASCADE</button></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        <?php } ?>

    <?php } ?>

    <div id="tablecolumns"></div>
</div>


