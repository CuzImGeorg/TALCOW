
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

function execPost(str, data) {
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", str, true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           console.log(xhttp.responseText);
        }
    };
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
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
    execPost("index.php?controller=execute&aktion=removeLog", "lid=" +lid);
    loadLogByLogLevel();
}

function btnAddUserBerechtigung() {
    execPost("index.php?controller=execute&aktion=btnAddUserBerechtigung", "name=" + document.getElementById("upun").value +"&perm=" + document.getElementById("upp").value );
    loadUserPermissions();
}

function newUserSubmit(){
    execPost("index.php?controller=execute&aktion=newUser", "name=" +document.getElementById("nun").value + "&pw=" + document.getElementById("up").value + "&desc=" + document.getElementById("ud").value)
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
    execPost("index.php?controller=execute&aktion=addServiceMontor", "name=" + document.getElementById("sn").value + "&desc=" + document.getElementById("sd").value + "&st=" + document.getElementById("r1").checked );
}



async function dluser(name) {
    execPost("index.php?controller=execute&aktion=deluser", "name=" +name);
    await delay(5);
    loadSystemUser();
}

async function usernameChange(index, uid) {
    let btn = document.getElementById("btnunc"+ index);
    if(btn.innerHTML !== "Submit") {
        btn.innerHTML = "Submit";
        btn.style.background = "#4ace1f";
        document.getElementById("inun" + index).removeAttribute("hidden");
    }
    else {
        btn.innerHTML = "Change Name";
        btn.style.background = "#d0d0d7";
        let input = document.getElementById("inun" + index);
        if(input.value.length > 0 && input.value !== "New Username") {
            console.log("test");
            execPost("index.php?controller=execute&aktion=changeUserName" , "uid=" + uid +"&name=" + input.value);
            await delay(5);
            loadMrgUser();
        }
        input.value = "";
        input.setAttribute("hidden", "");
    }
}

async function userpwChange(index) {
    let btn = document.getElementById("btnp"+ index);
    if(btn.innerHTML !== "Submit") {
        btn.innerHTML = "Submit";
        btn.style.background = "#4ace1f";
        document.getElementById("inp" + index).removeAttribute("hidden");
    }
    else {
        btn.innerHTML = "Change Password";
        btn.style.background = "#d0d0d7";
        let input = document.getElementById("inp" + index);
        if(input.value.length > 0 && input.value !== "New Password") {
            execPost("index.php?controller=execute&aktion=changeUserpw" , "uid=" + uid +"&pw=" + input.value);
            await delay(5);
            loadMrgUser();
        }
        input.value = "";
        input.setAttribute("hidden", "");
    }
}

function loadInstalledModules() {
    if(document.getElementById("btnm").innerHTML === "+") {
        document.getElementsByName("m").forEach(value => value.removeAttribute("hidden"));
        document.getElementById("btnm").innerHTML = "-";
    }else {
        document.getElementsByName("m").forEach(value => value.setAttribute("hidden", ""));
        document.getElementById("btnm").innerHTML = "+";
    }
}

async function changesysuserpw(un, index) {
    let input = document.getElementById("sysunp"+index);
    let btn = document.getElementById("sysucp"+index);
    if(input.hasAttribute("hidden")) {
        input.removeAttribute("hidden");
        btn.innerHTML = "Submit";
        btn.style.background = "#4ace1f";
    }else {
        if(input.value.length > 0 && input.value !== "New Password") {
            execPost("index.php?controller=execute&aktion=changesysuserpw" , "un=" + un + "&pwd=" + input.value);
            await delay(5);
            loadSystemUser();
        }
        input.value = "";
        btn.innerHTML = "Change Password";
        btn.style.background = "#d0d0d7";
       input.setAttribute("hidden", "");
    }
}
function dropdb(name) {
    execPost("index.php?controller=execute&aktion=dropdb","name=" +name);
    loadPostgreSQL();
}

function databasetablehideshow(index) {
    let table =  document.getElementById("mpgschematable"+index);
    if(table.hasAttribute("hidden")){
        document.getElementsByName("mpgschematable").forEach(value => value.setAttribute("hidden", ""));
        document.getElementsByName("database").forEach(value => value.setAttribute("hidden", ""));
        document.getElementsByName("closeout").forEach(value => value.setAttribute("hidden", ""));
        document.getElementById("database"+index).removeAttribute("hidden");
        document.getElementById("btntable"+index).innerHTML = "Close";
        document.getElementById("sqlinput"+index).removeAttribute("hidden");
        document.getElementById("btnsqlinput"+index).removeAttribute("hidden");
        document.getElementsByName("sqloutput").forEach(value => value.setAttribute("hidden", ""))
        table.removeAttribute("hidden");

    }else {
        table.setAttribute("hidden", "");
        document.getElementsByName("database").forEach(value => value.removeAttribute("hidden", ""));
        document.getElementsByName("sqloutput").forEach(value => value.setAttribute("hidden", ""));
        document.getElementById("btntable"+index).innerHTML = "Select";
        document.getElementById("sqlinput"+index).setAttribute("hidden", "");
        document.getElementById("btnsqlinput"+index).setAttribute("hidden", "");
        document.getElementById("sqloutput"+index).innerHTML ="";
        document.getElementById("sqlinput"+index).innerHTML ="";
        document.getElementById("closeout"+index).setAttribute("hidden", "");




    }
}
function execSQL(index, id) {
    document.getElementById("sqloutput"+index).removeAttribute("hidden");
    document.getElementById("closeout"+index).removeAttribute("hidden");
    loadDocWithElementIDPOST("index.php?controller=ajax&aktion=sqlquery", "sqloutput"+index, "did=" + id +"&sql=" +  document.getElementById("sqlinput"+index).value);
}

function closeout(index) {
    document.getElementById("sqloutput"+index).innerHTML ="";
    document.getElementById("sqloutput"+index).setAttribute("hidden","");
    document.getElementById("closeout"+index).setAttribute("hidden","");

}


let tables = [];
function loadTableColumns(db) {


    let sql = "";
    sql += " table_name = \'" + tables[0] +"\'";
    let i = true;
    for (let a of tables) {
        if(i) {
            i = false;
        }else {
            sql += "OR table_name = \'" + a +"\'";
        }
    }
    console.log(sql);
loadDocWithElementIDPOST("index.php?controller=ajax&aktion=getTables", "tablecolumns", "name=" +sql + "&db=" +db);
}

function tablemoreless(index, name, db){
    let btn = document.getElementById("tablemoreless"+index);
    if(btn.innerHTML=== "More") {
        btn.innerHTML = "Less";
        tables.push(name);
    }else {
        btn.innerHTML = "More";
        delete tables[tables.indexOf(name)];
    }


    loadTableColumns(db);
}

function dropTable(db, name, cascade) {
    execPost("index.php?controller=execute&aktion=dropTable","db=" + db+ "&name=" +name +"&cas=" + cascade);
    loadPostgreSQL();
}

function addConnection() {
    let name = document.getElementById("name");
    let host = document.getElementById("host");
    let port = document.getElementById("port");
    let user = document.getElementById("user");
    let pw = document.getElementById("pw");
    let description = document.getElementById("desc");

    if(name.value.length > 0 && host.value.length > 0 && port.value.length > 0 && user.value.length > 0 && description.value.length > 0 && pw.value.length > 0) {
        execPost("index.php?controller=execute&aktion=addConnection", "name=" +name.value + "&host=" + host.value + "&port=" + port.value + "&desc="  + description.value + "&pw=" +pw.value + "&user=" + user.value);
        name.value = "";
        host.value = "";
        port.value = "";
        user.value = "";
        pw.value = "";
        description.value = "";
    }
    loadPostgreSQL();

}

function removeSrvMon(name) {
    execPost("index.php?controller=execute&aktion=removeSrvMon","name=" +name);
    loadServiceMonitor();
}

