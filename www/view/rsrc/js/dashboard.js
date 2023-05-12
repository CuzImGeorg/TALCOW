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

function loadDocWithElementID(str, elementid) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(elementid).innerHTML = this.responseText;
            console.log(this.responseText);
        }
    };

    xhttp.open("POST", str, true);
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
let b2 = false;
function loadLogByUserId(uid) {
    if(b2) {
        loadLogs();
        b2 =false;
    }else {
        loadDoc("index.php?controller=ajax&aktion=log&uid=" + uid);
        b2 = true;
    }
}

function loadLogByLogLevel() {
    let sql = "" +  Number(document.getElementById("cb0").checked) +
                    Number(document.getElementById("cb1").checked) +
                    Number(document.getElementById("cb2").checked) +
                    Number(document.getElementById("cb3").checked);
    if( document.getElementById("cb0").checked &&
        document.getElementById("cb1").checked &&
        document.getElementById("cb2").checked &&
        document.getElementById("cb3").checked) {
        document.getElementById("cb-1").checked = true;
    }else {
        document.getElementById("cb-1").checked = false;
    }
    loadDocWithElementID("index.php?controller=ajax&aktion=log&lvl=" + sql, "logtable");
}

function laodLogByName(name){
    loadDocWithElementID("index.php?controller=ajax&aktion=log&name=" + name, "logtable");

}

function cbAllcheck() {
    let checkAll = document.getElementById("cb-1").checked;
    document.getElementById("cb0").checked = checkAll;
    document.getElementById("cb1").checked = checkAll;
    document.getElementById("cb2").checked = checkAll;
    document.getElementById("cb3").checked = checkAll;
    loadLogByLogLevel()
}

let b3 = true;
function updateCbLogLevel(checkName) {
    if(b3) {
        console.log(document.getElementById("lcb0").innerHTML);
        document.getElementById("cb0").checked = document.getElementById("lcb0").innerHTML === checkName;
        document.getElementById("cb1").checked = document.getElementById("lcb1").innerHTML === checkName;
        document.getElementById("cb2").checked = document.getElementById("lcb2").innerHTML === checkName;
        document.getElementById("cb3").checked = document.getElementById("lcb3").innerHTML === checkName;
        b3 = false;
    }else {
        document.getElementById("cb0").checked = true;
        document.getElementById("cb1").checked = true;
        document.getElementById("cb2").checked = true;
        document.getElementById("cb3").checked = true;
        b3 = true;
    }

    loadLogByLogLevel()

}

function loadlogAktions() {
    loadDoc("index.php?controller=ajax&aktion=logAktions");
}

function loadloglevel() {
    loadDoc("index.php?controller=ajax&aktion=logLevel");
}


