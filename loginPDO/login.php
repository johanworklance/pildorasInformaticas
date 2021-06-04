<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1{
        text-align:center;
    }
    table{
        width:25%;
        background-color: #ffc;
        border:2px dotted #f00;
        margin:auto;
    }
        .izq{
            text-align:left;
        }
        .der{
            text-align:right;
        }
        td{
            text-align:center;
            padding:10px;
        }
</style>
<body>
    <h1>Introduce tus datos:</h1>
    <form action="comprobarLogin.php" method="post">
        <table>
            <tr>    
                <td class="izq">Login:</td>
                <td class="der"><input type="text" name="login"></td>
            </tr>
            <tr>
                <td class="izq">Password:</td>
                <td class="der"><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="LOGIN"></td>
            </tr>
        </table>
    </form>
</body>
</html>