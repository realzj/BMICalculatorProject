<!--
    
The following code was gathered through a youtube tutorial, all images headers titles and paragraphs were changed in order to fit the
style of the website, the CSS will also be changed accordingly, the nav bar has been added.

This is 1 out of 3 of the same code used but in all 3 codes the images headers and paragragh change in order to fit the objective of this project

The use of <br> brackets was used to make new lines and make it neater and fit all the information in the food-items div
-->

<!DOCTYPE html>
<html>

<head>
    <title>Calorie Surplus Diet</title>
    <link rel="stylesheet" href="css/plans.css">
</head>

<body>
    <nav class="nav">
        <div class="logo">CalorieCalc</div>
        <div class="nav-items">
            <a href="index.php">Home</a>
            <a href="registration.php">Sign up</a>
            <a href="login.php">Log in</a>

        </div>
    </nav>
    <div class="menu">
        <div class="food-items">
            <img src="images/gain_breakfast.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5> Scrambled eggs with avocado and whole-grain toast</h5>
                    <h5 class="calories"> (Approx. 500 calories) </h5>
                </div>
                <p>2 eggs (140 calories)<br>
                    1/2 of an avocado (120 calories)<br>
                    2 slices of whole-grain bread (140 calories)<br>
                    1 cup of whole milk (70 calories)</p>
            </div>
        </div>

        <div class="food-items">
            <img src="images/gain_snack.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Cottage cheese with fruit and nuts </h5>
                    <h5 class="calories"> (Approx. 400 calories) </h5>
                </div>
                <p>1 cup of cottage cheese (220 calories)<br>
                    1/2 cup of fruit (70 calories)<br>
                    1/4 cup of nuts (110 calories)</p>
            </div>
        </div>

        <div class="food-items">
            <img src="images/gain_lunch.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Grilled chicken with quinoa and vegetables</h5>
                    <h5 class="calories"> (Approx. 600 calories) </h5>
                </div>
                <p>4 oz of grilled chicken breast (140 calories)<br>
                    1 cup of cooked quinoa (200 calories)<br>
                    1 cup of mixed vegetables (100 calories)<br>
                    2 tablespoons of olive oil (100 calories)<br>
                    1 cup of fruit juice (60 calories)</p>
            </div>
        </div>

        <div class="food-items">
            <img src="images/gain_snack.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5> Greek yogurt with protein powder and berries </h5>
                    <h5 class="calories"> (Approx. 500 calories) </h5>
                </div>
                <p>1 cup of Greek yogurt (140 calories)<br>
                    1 scoop of protein powder (50 calories)<br>
                    1/2 cup of berries (50 calories)<br>
                    1/4 cup of granola (100 calories)<br>
                    1/4 cup of nuts (60 calories)</p>
            </div>
        </div>

        <div class="food-items">
            <img src="images/gain_dinner.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Beef stir-fry with brown rice and vegetables </h5>
                    <h5 class="calories"> (Approx. 700 calories) </h5>
                </div>
                <p> 6 oz of beef sirloin (300 calories)<br>
                    1 cup of brown rice (200 calories)<br>
                    1 cup of mixed vegetables</p>
            </div>
        </div>
    </div>
</body>

</html>