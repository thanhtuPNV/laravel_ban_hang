<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
        <!-- sentData được truyền từ app\Mail\SendMail.php -->
    <h3>{{ $sentData['hello'] }}</h3><br>
    <p>{{ $sentData['hello1'] }}</p>
    <p>{{ $sentData['title'] }}</p>
    <p>{{ $sentData['body'] }}</p>
    <h3>{{ $sentData['sign'] }}</h3>
    <h3>{{ $sentData['sign1'] }}</h3><br>
    <h3>{{ $sentData['sign2'] }}</h3><br>
    <h3>{{ $sentData['sign3'] }}</h3>
    <h3>{{ $sentData['sign4'] }}</h3>
    <h3>{{ $sentData['sign5'] }}</h3>
    <h3>{{ $sentData['sign6'] }}</h3>
</body>
</html>