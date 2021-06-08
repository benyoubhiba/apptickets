
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
    <input type="text" name="" id="username" placeholder="username">
    <input type="text" name="" id="password" placeholder="password">
    <input type="button" value="cnx" id="cnx">
</body>
</html>
<script defer>
    document.querySelector('#cnx').addEventListener("click",login);
    function login(){
        var username = document.querySelector('#username').value
        var password = document.querySelector('#password').value
        $.ajax({
        url: 'api/login.php',
        method : 'post',
        data:{
            username: username,
            password: password,
        },
        success: function(res){
            console.log(res);
            res = JSON.parse(res);

            if(res=="0"){
                alert("erreure des donnee")
            }

            if (res.type == "admin") {
                window.location.href = "admin/admin.php"
            }
            if(res.type=="user"){
                window.location.href = "tsprofil/accueil.php"
            }


        }
    })
    }
</script>
