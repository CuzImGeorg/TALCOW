

function loadDoc(str) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("maindiv").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", str, true);
    xhttp.send();
}
function exce(str) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        }
    };
    xhttp.open("GET", str, true);
    xhttp.send();
}

function reboot() {
    //TODO make reboot btn work
}

function loadMrgUser() {

    loadDoc("index.php?controller=ajax&aktion=mgruser");

}

function loadSysInfo() {
    loadDoc("index.php?controller=ajax&aktion=sysInfo");
}

function loadUserPermissions() {
    loadDoc("index.php?controller=ajax&aktion=loadUserPermissions");
}

function loadUserPermissionsByUserId(uid) {
    loadDoc("index.php?controller=ajax&aktion=loadUserPermissions&uid=" + uid );
}

function loadPermissions() {
    loadDoc("index.php?controller=ajax&aktion=loadPermissions");
}

function reboot() {
    loadDoc("index.php?controller=execute&aktion=reboot");

}


