
<div>
<h1 id="title">System Info</h1>
<p id="hostname"> Hostname: <?=$hostname?></p>
<p id="srvDate"> Date: <?=$date?> </p>
<p id="srvTime"> Time: <?=$time?> </p>
<p id="uptime"> Uptime:  <?=$uptime?> <?php if($this->hasPermission("rebootsystem") || $this->hasPermission("sudo" )) { ?> <button id="rebootbtn" onclick="reboot()">Reboot</button> <?php } ?>   </p>

</div>