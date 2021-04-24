<?php
$error = "";
if(isset($_GET['err'])){
        $error = $_GET['err'];
}

?>
<!DOCTYPE html>
<html lang = "en">
<head>
<title>Password Prototype</title>
<link rel="stylesheet" href="prototype.css">
<script>
        function showHint(str) {
        if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
        } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
        }
        }
</script>
</head>
<body>

<div class="index-box">
        <?php  
                if (!$error == '') {
                        if($error == 1){
                                echo "This username has already been used";
                        }else if($error == 2){
                                echo "This username is too short";
                        }
                }
        ?>
        <form action="username_authenticator.php"
                method="post"> 
                
        Enter Username: <input name="username" id="username"  onkeyup="showHint(this.value)" type = "text" maxlength="16" size="16"/>
        <!--limit username length to make display consistent-->
        <input type="submit" value="Signup"/>
        </form>
        <p> <span id="txtHint"></span></p>
</div>
</body>
</html>