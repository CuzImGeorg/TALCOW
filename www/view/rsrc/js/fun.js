
function newUserPermission() {

    if(!document.getElementById("upun").hasAttribute("hidden")) {
        document.getElementById("btnsub").setAttribute("hidden", "");
        document.getElementById("upun").setAttribute("hidden", "");
        document.getElementById("upp").setAttribute("hidden", "");
        document.getElementById("btnup").innerHTML = "+";
    }else {
        document.getElementById("btnsub").removeAttribute("hidden");
        document.getElementById("upun").removeAttribute("hidden");
        document.getElementById("upp").removeAttribute("hidden");
        document.getElementById("btnup").innerHTML = "-";
    }
}

function newUser() {
    if(!document.getElementById("nun").hasAttribute("hidden")) {
        document.getElementById("nun").setAttribute("hidden", "");
        document.getElementById("up").setAttribute("hidden", "");
        document.getElementById("btnnusub").setAttribute("hidden", "");
        document.getElementById("ud").setAttribute("hidden", "");

        document.getElementById("btnu").innerHTML = "+";
    }else {
        document.getElementById("nun").removeAttribute("hidden");
        document.getElementById("up").removeAttribute("hidden");
        document.getElementById("btnnusub").removeAttribute("hidden");
        document.getElementById("ud").removeAttribute("hidden");
        document.getElementById("btnu").innerHTML = "-";
    }
}

function newService(){
    if(!document.getElementById("sn").hasAttribute("hidden")) {
        document.getElementById("sn").setAttribute("hidden", "");
        document.getElementById("sd").setAttribute("hidden", "");
        document.getElementById("btnas").setAttribute("hidden", "");
        document.getElementById("st").setAttribute("hidden", "");
        document.getElementById("r1").setAttribute("hidden", "");
        document.getElementById("r2").setAttribute("hidden", "");
        document.getElementById("l1").setAttribute("hidden", "");
        document.getElementById("l2").setAttribute("hidden", "");
        document.getElementById("btnsrv").innerHTML = "+";



    }else {
        document.getElementById("sn").removeAttribute("hidden");
        document.getElementById("sd").removeAttribute("hidden");
        document.getElementById("st").removeAttribute("hidden");
        document.getElementById("btnas").removeAttribute("hidden");
        document.getElementById("r1").removeAttribute("hidden");
        document.getElementById("r2").removeAttribute("hidden");
        document.getElementById("l1").removeAttribute("hidden");
        document.getElementById("l2").removeAttribute("hidden");
        document.getElementById("btnsrv").innerHTML = "-";


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

function newUserSubmit(){
    execGet("index.php?controller=execute&aktion=newUser&name=" + document.getElementById("nun").value + "&pw=" + document.getElementById("up").value + "&desc=" + document.getElementById("ud").value);
    loadMrgUser();
}

async function loadLogThenLoadByLevel (name) {
    b3 = true;
    loadLogs();
    await delay(50).then();
    updateCbLogLevel(name);
}

function delay(time) {
    return new Promise(resolve => setTimeout(resolve, time));
}

function addServiceMontor() {
    execGet("index.php?controller=execute&aktion=addServiceMontor&name=" + document.getElementById("sn").value + "&desc=" + document.getElementById("sd").value + "&st=" + document.getElementById("r1").checked);
}

function updateServiceList() {
    loadDocWithElementID("index.php?controller=ajax&aktion=updateServiceList","dl")
}
