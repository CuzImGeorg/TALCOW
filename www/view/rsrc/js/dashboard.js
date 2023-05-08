/*
* TAB LOGS
 */


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
function exec(str) {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", str, true);
    xhttp.send();
}


function loadMrgUser() {

    loadDoc("index.php?controller=ajax&aktion=mgruser");

}

function loadMrgUserById(uid) {
    loadDoc("index.php?controller=ajax&aktion=mgruser&uid=" + uid);
}

function loadSysInfo() {
    loadDoc("index.php?controller=ajax&aktion=sysInfo");
}

function loadUserPermissions() {
    loadDoc("index.php?controller=ajax&aktion=loadUserPermissions");
}

let b1 = false;
function loadUserPermissionsByUserId(uid) {
    if(b1) {
        loadUserPermissions();
        b1 = false;
    }else {
        loadDoc("index.php?controller=ajax&aktion=loadUserPermissions&uid=" + uid );
        b1 = true;
    }


}

function loadPermissions() {
    loadDoc("index.php?controller=ajax&aktion=loadPermissions");
}

function loadLogs() {
    loadDoc("index.php?controller=ajax&aktion=log");
}


function reboot() {
    exec("index.php?controller=execute&aktion=reboot");

}

function loadlogAktions() {
    loadDoc("index.php?controller=ajax&aktion=logAktions");
}

function loadloglevel() {
    loadDoc("index.php?controller=ajax&aktion=logLevel");
}


