<datalist id="dl"></datalist>
<h1>Services </h1>
<h4>Add Service To Monitor</h4>

<button style="margin-left: 5px; margin-bottom: 4px;" class="btnnewService"  id="btnsrv" onclick="newService()">+</button> <br>
<input  id="sn" list="dl" type="text" hidden style="margin-left: 5px; margin-bottom: 2px; " placeholder="Service Name">
<input id="sd" type="text" hidden placeholder="Description">
<button id="btnas" type="button" hidden onclick="addServiceMontor()">Add Service</button>
<br>
<div id="st" hidden style="margin-left: 5px;">Service Type:</div> <br/>
<input type="radio" id="r1" hidden name="r1" placeholder="Service Type" ><label id="l1" hidden for="r1">systemCtl</label> <br>
<input type="radio" id="r2" hidden name="r1" ><label id="l2" hidden for="r2">service</label>



<h4>Configurated Services</h4>
<table>
    <tr>
        <td>Service Name </td>
        <td>Service Status </td>
        <td>Service Description</td>
        <td>Start/Stop</td>
        <td>Remove</td>
    </tr>
<?php foreach ($monitors as $monitor) { ?>
    <tr>
        <td><?=$monitor["service"]->getServicename()?></td>
        <td style="color: <?=$monitor["color"]?>"><?=$monitor["active"]?></td>
        <td><?=$monitor["service"]->getDescription()?></td>
        <td><button type="button"><?=$monitor["btn"]?></button></td>
        <td><button type="button"  >Remove</button></td>

    </tr>

<?php } ?>
</table>
