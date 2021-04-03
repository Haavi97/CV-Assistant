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
    <title>Home</title>
</head>

<!--NAVIGATION BAR-->
<nav>
    <img src="style/logo.png" style="padding:20px;"></img>
    <ul>
        <?php
        echo $nav_menu
        ?>
    </ul>
</nav>

<!--PAGE CONTENT-->
<body>
    <div id="about">
        <span id="welcome" style="text-align:center;">
            <h1>Makes your life easier with IDWOD</h1>
            <p> Etiam accumsan sapien a dolor varius, et molestie dolor ullamcorper. Etiam interdum maximus risus, ut sagittis sapien tincidunt eu. Cras nec ornare tortor, sed tincidunt velit. Cras sit amet urna eget neque bibendum tristique. Curabitur imperdiet, nunc vel fermentum eleifend, risus risus vulputate turpis, id malesuada magna massa in mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc efficitur vitae risus in pretium. Proin sit amet ultrices turpis, ut cursus sapien.</p>
            <p> Etiam accumsan sapien a dolor varius, et molestie dolor ullamcorper. Etiam interdum maximus risus, ut sagittis sapien tincidunt eu. Cras nec ornare tortor, sed tincidunt velit. Cras sit amet urna eget neque bibendum tristique. Curabitur imperdiet, nunc vel fermentum eleifend, risus risus vulputate turpis, id malesuada magna massa in mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc efficitur vitae risus in pretium. Proin sit amet ultrices turpis, ut cursus sapien.</p>
            <p> Etiam accumsan sapien a dolor varius, et molestie dolor ullamcorper. Etiam interdum maximus risus, ut sagittis sapien tincidunt eu. Cras nec ornare tortor, sed tincidunt velit. Cras sit amet urna eget neque bibendum tristique. Curabitur imperdiet, nunc vel fermentum eleifend, risus risus vulputate turpis, id malesuada magna massa in mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc efficitur vitae risus in pretium. Proin sit amet ultrices turpis, ut cursus sapien.</p>
        </span>
        <div class="wrapper" style="padding-bottom:200px;">
            <button class="button">Read more</button>
        </div>
    </div>
    <div id="cv_img">
        <img src="style/cv1.png"></img>
    </div>

<!--PAGE FOOTER-->
    <footer>
        <span id="footertext">Endla 14 Kristiine, Tallinn, Harjumaa</span>
        <a href="tel:372-948-9494">+ 372 948 9494</a>
        <br>
        <span id="footertext">Estonia Zip Code 29302 </span>
        <a href="mailto:support@idwod.com">support@idwod.com</a>
    </footer>

</body>
</html>