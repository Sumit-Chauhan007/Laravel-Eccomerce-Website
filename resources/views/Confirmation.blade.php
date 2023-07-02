<!DOCTYPE html>
<html lang="en">

<head>
    <base href="public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(to right, #ffbf5a, #ff9422);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>

<body>
    <div class="container" align="center"
        style="background-color:white;margin:70px auto;height:500px;width:60%;box-shadow: 17px 15px 24px grey">
        <img width="150" style="margin-top:50px" src="party.png" alt="">
        <h1>Your Order is Complete</h1>
        <p style="color:grey;">You will be receiving a confirmation email with order details.</p>
    </div>

    <script>
        setTimeout(() => {
            window.location.href = '/myOrders';
        }, 2000);
    </script>
</body>

</html>
