

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

function reboot() {
    //TODO make reboot btn work
}

function loadMrgUser() {

    loadDoc("index.php?controller=ajax&aktion=mgruser");

}

function loadSysInfo() {
    loadDoc("index.php?controller=ajax&aktion=sysInfo");
}