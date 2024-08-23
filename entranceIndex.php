<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrance</title>
</head>
<style>
    .supDiv
    {
        background-color: #9ca8a7;
        width: 25%;
        height: 250px;
        position: absolute;
        left: 37%;
        top: 10%;
        border-radius: 8px;
    }
    form
    {
        position: absolute;
        left: 30px;
        top: 35px;
    }
    button
    {
        width: 120px;
        height: 30px;
        border-radius: 7px;
        border: none;
        background-color: #e8e5e5;
    }
    button:hover
    {
        background-color: #858080;
    }
</style>
<body>
<div class="supDiv">
    <form action="entranceSave.php" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required> <br> <br>
        <label for="login">Login: </label>
        <input type="text" name="login" id="login" required> <br> <br>
        <label for="password">Password: </label>
        <input type="text" name="password" id="password" required> <br> <br>
        <button type="submit" name="saveAsTxt">Save Txt Doc</button>
        <button type="submit" name="saveAsXml">Save Xml Doc</button>
        <button type="submit" name="showResult" formaction="reg.php">Show Result</button>
    </form>
</div>
</body>
</html>