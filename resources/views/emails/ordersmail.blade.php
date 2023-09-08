<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            height: auto;
            width: 100%;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .container .row h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>{{ $mailData['title'] }}</h1>
            <p>Customer Name: {{ $mailData['name'] }}</p>
            <p>Address: {{ $mailData['add'] }}</p>
            <p>GSTIN No.: {{ $mailData['gstin'] }}</p>
            <p>Style Reference: {{ $mailData['styleref'] }}</p>
            <p>Email: {{ $mailData['email'] }}</p>
            <p>Phone: {{ $mailData['phone'] }}</p>
        </div>
    </div>
</body>

</html>
