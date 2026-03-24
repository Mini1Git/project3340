<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/stylealternate.css">
    <link rel="stylesheet" href="stylesheets/styletablet.css">
    <link rel="stylesheet" href="stylesheets/formstyle.css">
    <link rel="stylesheet" href="stylesheets/stylemobile.css">
</head>
<body>

<div class="formparent">
    <form class="register" action = "registerRestaurantBackend.php" method="POST">
        <h2>Register your restaurant</h2>
        <label>
            <input type="text" name="restaurant_name" placeholder="Restaurant Name" required>
        </label>
        <label>
            <input type = "text" name "cuisine_type" placeholder="Cuisine Type" required>
        </label>
        <label>
            <input type = "email" name = "restaurant_email" placeholder="Restaurant Email" required>
        </label>
        <label>
            <input type = "tel" name = "restaurant_number" placeholder = "Restaurant Phone Number" minlength="9" maxlength="15">
        </label>
        <label>
            <input type = "text", name = "restaurant_address" placeholder = "Address" required>
        </label>





        <input type="submit" value="Register">

    </form>
</div>

</body>

<script>


</script>


</html>