<!--
    
The following code was gathered through a youtube tutorial, all images headers titles and paragraphs were changed in order to fit the
style of the website, the CSS will also be changed accordingly, the nav bar has been added.

This is 2 out of 3 of the same code used but in all 3 codes the images headers and paragragh change in order to fit the objective of this project

The use of <br> brackets was used to make new lines and make it neater and fit all the information in the food-items div

-->

<!DOCTYPE html>
<html>

<head>
    <title>Grid Food Menu</title>
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
            <img src="images/lose_breakfast1.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Greek yogurt with berries and nuts</h5>
                    <h5 class="calories"> (Approx. 300 calories) </h5>
                </div>
                <p>1 cup of Greek yogurt (140 calories)<br>
                    1/2 cup of berries (40 calories)<br>
                    1/4 cup of nuts (120 calories)</p>
            </div>
        </div>

        <div class="food-items">
            <img src="images/lose_snack.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Hummus and veggies</h5>
                    <h5 class="calories"> (Approx. 150 calories) </h5>
                </div>
                <p>2 tablespoons of hummus (70 calories)<br>
                    1 cup of mixed vegetables (80 calories).</p>
            </div>
        </div>

        <div class="food-items">
            <img src="images/lose_lunch.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Grilled chicken with a Greek salad</h5>
                    <h5 class="calories"> (Approx. 400 calories) </h5>
                </div>
                <p>4 oz of grilled chicken (140 calories)<br>
                    2 cups of mixed greens (20 calories)<br>
                    1/2 cup of cherry tomatoes (15 calories)<br>
                    1/4 cup of feta cheese (80 calories)<br>
                    2 tablespoons of Greek dressing (45 calories)<br>
                    1/4 cup of sliced cucumbers (10 calories)<br>
                    1/4 cup of sliced red onions (10 calories)</p>
            </div>
        </div>

        <div class="food-items">
            <img src="images/lose_snack2.jpg">
            <div class="details">
                <div class="details-sub">
                    <h5>Apple slices with almond butter</h5>
                    <h5 class="calories"> (Approx. 200 calories) </h5>
                </div>
                <p>1 medium apple (95 calories)<br>
                    2 tablespoons of almond butter (105 calories)</p>
            </div>
        </div>

        <div class="food-items">
            <img src="images/lose_dinner.jpeg">
            <div class="details">
                <div class="details-sub">
                    <h5>Baked salmon with roasted vegetables</h5>
                    <h5 class="calories"> (Approx. 400 calories) </h5>
                </div>
                <p> 4oz of baked salmon (240 calories)<br>
                    1 cup of roasted vegetables (160 calories)</p>
            </div>
        </div>
    </div>
</body>

</html>