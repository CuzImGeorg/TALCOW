
function newUserPermission() {
    if(!document.getElementById("upun").hasAttribute("hidden")) {
        document.getElementById("upun").setAttribute("hidden", "");
        document.getElementById("upp").setAttribute("hidden", "");
        document.getElementById("btnup").innerHTML = "+";
    }else {
        document.getElementById("upun").removeAttribute("hidden");
        document.getElementById("upp").removeAttribute("hidden");
        document.getElementById("btnup").innerHTML = "-";
    }
}

function execGet(str) {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", str, true);
    xhttp.send();
}



function updateUsernameList () {
    loadDocWithElementID("index.php?controller=ajax&aktion=updateUsernameList", "dl", );
}

function updatePermissionList() {
    loadDocWithElementID("index.php?controller=ajax&aktion=updatePermissionList", "dl2");
}

function reboot() {
    execGet("index.php?controller=execute&aktion=reboot");
}

function removeLog(lid) {
    execGet("index.php?controller=execute&aktion=removeLog&lid=" + lid );
    loadLogByLogLevel();
}

function btnAddUserBerechtigung() {
    execGet("index.php?controller=execute&aktion=btnAddUserBerechtigung&name=" + document.getElementById("upun").value +"&perm=" + document.getElementById("upp").value);
    loadUserPermissions();
}