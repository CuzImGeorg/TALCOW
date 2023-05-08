

function loadDocWithElementID(str, elementid, args) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(elementid).innerHTML = this.responseText;
            console.log(this.responseText);
        }
    };

    xhttp.open("POST", str, true);
    xhttp.send(args);
}


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

function updateUsernameList () {
    let data = new FormData();
    data.append('name', document.getElementById("upun").value);
    loadDocWithElementID("index.php?controller=ajax&aktion=updateUsernameList", "dl", data);
}