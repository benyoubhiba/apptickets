<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script/jquery.js" ></script>
    <title>Document</title>
</head>
<body>
    aaa
</body>
</html>

<script>
$.post({
    url: "api/test.php",
    data:{
        Pseudo : "test",
        Password : 123
    },
    success: function(res)
        {
            // res = JSON.parse(res)
            console.log(res);
        }
});
</script>