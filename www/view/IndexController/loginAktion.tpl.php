<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="src/view/css/style.registry.css">
        <link rel="shortcut icon" type="image/x-icon" href="src/rsrc/logo.png" />
        <script src="src/rsrc/js/registry.js"></script>
    </head>
    <body>
       <form  action="index.php?aktion=login" method="POST" >

            <label for="nickname">Nickname<br></label>
            <input class="inputs" type="text" name="nickname" id="nickname" placeholder="Nickname"  required />

            <br>
            <label for="password">Password<br></label>
            <input type="password" class="inputs" name="password" id="password"  placeholder="Password" required>
            <br>
            <input class="mainbtn" type="submit"  value="Login" />


       </form>
    </body>
</html>
