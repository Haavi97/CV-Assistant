<?php
include 'main.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="style/icon.png">
    <script src="functions.js"></script>
    <title>Home</title>
</head>

<!--PAGE CONTENT-->

<body>
    <!--NAVIGATION BAR-->
    <nav>
        <img src="style/logo.png" style="padding:20px;" alt="Logo">
        <ul>
            <?php
            echo $nav_menu;
            ?>
        </ul>
    </nav>
    
    <div id="about">
        <div id="welcome" style="text-align:center;">
            <h1>Makes your life easier with IDWOD</h1>
            <p>
            Etiam accumsan sapien a dolor varius, et molestie dolor ullamcorper. Etiam interdum maximus risus, ut sagittis sapien tincidunt eu. Cras nec ornare tortor, sed tincidunt velit. Cras sit amet urna eget neque bibendum tristique. Curabitur imperdiet, nunc vel fermentum eleifend, risus risus vulputate turpis, id malesuada magna massa in mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc efficitur vitae risus in pretium. Proin sit amet ultrices turpis, ut cursus sapien.<br>
            <span id="dots">...</span><br><span id="more" style="display: none;">Etiam accumsan sapien a dolor varius, et molestie dolor ullamcorper. Etiam interdum maximus risus, ut sagittis sapien tincidunt eu. Cras nec ornare tortor, sed tincidunt velit. Cras sit amet urna eget neque bibendum tristique. Curabitur imperdiet, nunc vel fermentum eleifend, risus risus vulputate turpis, id malesuada magna massa in mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc efficitur vitae risus in pretium. Proin sit amet ultrices turpis, ut cursus sapien.<br>
            Etiam accumsan sapien a dolor varius, et molestie dolor ullamcorper. Etiam interdum maximus risus, ut sagittis sapien tincidunt eu. Cras nec ornare tortor, sed tincidunt velit. Cras sit amet urna eget neque bibendum tristique. Curabitur imperdiet, nunc vel fermentum eleifend, risus risus vulputate turpis, id malesuada magna massa in mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc efficitur vitae risus in pretium. Proin sit amet ultrices turpis, ut cursus sapien.</span></p>
        </div>
        <div class="wrapper">
            <button onclick="readmore()" id="myBtn">Read more</button>
        </div>
        <div style="padding-bottom:200px;">
            <h3>Not registered yet?</h3>
            <form action="create.php">
                <input type="submit" class="button" value="Go to registration form" />
            </form>
        </div>
        <hr>
    </div>
    
    <div id="cv_img">
        <img src="style/cv1.png" alt="Example of CV">
    </div>

    <!--PAGE FOOTER-->
    <?php
    echo $page_footer;
    ?>

</body>

</html>