<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>Title : {{ $mailData['title'] }}</h3>
    <h3>Mail : {{ $mailData['mail'] }}</h3>
    <h3>Contact : {{ $mailData['contact'] }}</h3>
    <h3>Name : {{ $mailData['Name'] }}</h3>
    <br>
    <p style="font-size: 16px">{{ $mailData['message'] }}</p>


</body>

</html>
