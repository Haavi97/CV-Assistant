<?php
include 'main.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="style/icon.png">
    <script src="functions.js"></script>
    <style>
        .faq:hover {
            cursor: pointer;
        }
    </style>
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
    
    <div id="pagecontent">
        <h1 style="position: relative;"> Frequently Asked Questions</h1>
        <div style="position:relative;">
            <ul>
                <li class="link">
                    <h2 class="faq" onclick="toggleQContent(this)">▼ Creating and Deleting Account</h2>
                    <p hidden>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec libero lorem, laoreet vel malesuada eleifend, convallis quis eros. 
                    Nullam porttitor velit vel erat tincidunt, quis pharetra nisi hendrerit. 
                    Aenean at ullamcorper metus. Vestibulum at leo a odio pharetra mollis. 
                    Suspendisse interdum lectus id pulvinar sagittis. 
                    Sed rutrum orci eget faucibus lacinia.</p>
                </li>
                <li class="link">
                    <h2 class="faq" onclick="toggleQContent(this)">▼ Payment</h2>
                    <p hidden>Nam vehicula malesuada quam, in auctor nibh suscipit viverra. 
                    Fusce velit velit, fringilla eu justo eget, vestibulum tempor orci. 
                    Donec sed magna ut eros ornare viverra. Donec a malesuada nibh, eget interdum massa. 
                    Phasellus semper lacus et semper sodales. 
                    Aliquam vehicula sodales sapien, sit amet pellentesque libero sagittis vitae. 
                    Maecenas mollis massa id urna semper, vel congue tortor vulputate. 
                    Mauris luctus finibus sem eu volutpat. In facilisis blandit eros, 
                    sit amet tempor nunc porta id.</p>
                </li>
                <li class="link">
                    <h2 class="faq" onclick="toggleQContent(this)">▼ Creating and Editing CV</h2>
                    <p hidden>
                    Nullam a sagittis neque, nec viverra dolor. 
                    Phasellus gravida urna ut purus finibus aliquet. 
                    Nullam pellentesque turpis sit amet dui pulvinar mollis. 
                    Donec placerat sollicitudin nisl eget condimentum. 
                    Praesent orci arcu, lobortis non auctor vel, eleifend et est. Cras erat est, 
                    bibendum vel malesuada in, faucibus sit amet sem. Pellentesque nisl sapien, 
                    consequat sodales scelerisque et, ultricies a ipsum.
                    </p>
                </li>
                <li class="link">
                    <h2 class="faq" onclick="toggleQContent(this)">▼ Endosersement & Recommendation System</h2>
                    <p hidden>
                    Integer porta, mi egestas pharetra ornare, mauris lorem bibendum ipsum, 
                    quis tincidunt quam elit vitae est. Class aptent taciti sociosqu ad litora 
                    torquent per conubia nostra, per inceptos himenaeos. Curabitur mollis tortor 
                    enim, sed venenatis orci dapibus sed. Quisque auctor augue sit amet dui 
                    pellentesque, sit amet gravida massa maximus. Phasellus accumsan, nulla nec 
                    sollicitudin dictum, libero eros eleifend risus, nec dictum lacus magna non tellus. 
                    Pellentesque lectus erat, tincidunt quis pellentesque eu, volutpat ac neque. 
                    Cras hendrerit velit mollis augue dictum vulputate.
                    </p>
                </li>
                <li class="link">
                    <h2 class="faq" onclick="toggleQContent(this)">▼ Privacy Policy</h2>
                    <p hidden>
                    Cras rhoncus diam ut semper consequat. Praesent viverra convallis diam eget lacinia. 
                    Integer vitae imperdiet ligula. Sed laoreet consectetur lectus ut tincidunt. 
                    Ut vehicula sodales ligula eu hendrerit. Phasellus volutpat, diam ac rutrum accumsan, 
                    urna augue commodo urna, vel lobortis libero tortor sed lacus. 
                    Pellentesque ac dui id leo tristique cursus. Suspendisse a posuere tortor, 
                    ornare venenatis risus. Donec rutrum pharetra turpis nec mollis. Aliquam vehicula nunc 
                    leo, et feugiat turpis pharetra eu. Suspendisse eget leo lectus. Vivamus eget tempor erat. 
                    Quisque tincidunt eget ipsum sed condimentum. Phasellus molestie felis ac tortor finibus, 
                    vitae sodales urna vulputate. Praesent elementum ante id quam feugiat posuere.
                    </p>
                </li>
            </ul>

        </div>
    </div>

    <!--PAGE FOOTER-->
    <?php
    echo $page_footer;
    ?>
</body>

</html>