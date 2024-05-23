<?php
    $page = $_SERVER['PHP_SELF'];
    $path = explode("/", $page);
    $current = $path[count($path) - 1];
    $name = explode(".", $current)[0];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Homepage</title>
    <style>
        .header-logo{
            width: 100px;
        }
        body{
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .navbar-item-custom{
            color: white;
            text-decoration: none;
            font-size: larger;
        }
        .custom-navbar {
            display: flex;
            justify-content: flex-start;
            background-color: #00265B;
            padding: 10px 0; 
        }

        .custom-navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .custom-navbar .navbar-item {
            margin-right: 15px;
        }

        .custom-navbar .btn {
            margin-left: auto;
        }
        #signin-dropdown {
            display: none;
        }
        #<?php echo $name ?> {
            color: #F5DD61;
            text-transform: uppercase;
        }
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }
    </style>
</head>
<body>
    <header>

        <div class="d-flex align-items-center container">
            <a href="https://www.tdtu.edu.vn/" title="TDTU Homepage">
                <img src="../img/TDTU-logo.jpg" alt="TDT-logo" class="header-logo">
            </a>
            <div class="ms-3"> 
                <h4>Ton Duc Thang University</h4>
                <h5>Falcuty of Information Technology</h5>
            </div>
            <p class="ms-auto fs-5">
                <?php
                $currentDate = date('d/m/Y');
                echo $currentDate;
                ?>
            </p>
        </div>
        <div class="menu" id="myMenu">
            <nav class="navbar navbar-dark header-navbg custom-navbar container-fluid">
                <div class="container fs-5">
                    <a class="navbar-item navbar-item-custom" href="teacherpage.php" id="teacherpage" >Homepage</a>
                    <a class="navbar-item navbar-item-custom" href="majorial.php" id="majorial">Major</a>
                    <a class="navbar-item navbar-item-custom" href="research.php" id="research">Research</a>
                    <a class="navbar-item navbar-item-custom" href="news.php" id="news">News</a>
                    <a class="navbar-item navbar-item-custom" href="contact.php" id="contact">Contact</a>
                    <a class="navbar-item navbar-item-custom" href="edit.php" id="edit">Upload</a>
                    <button id="signin-btn" class="btn ms-auto border border-2" type="button">
                        <img src="../img/teacher-avatar.jpg" alt="toggler image" class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                        <a class="navbar-item" style="text-decoration: none; color: white; font-size: larger;">H Phuc</a>
                    </button>
                </div>
            </nav>
            <div id="signin-dropdown" class="dropdown-content">
                <div class="container">
                    <form id="signin-form" class="row" action="../student/index.php">
                        <div class="col-md-4 offset-md-8">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn">Log out</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </header>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var signinBtn = document.getElementById("signin-btn");
            var signinDropdown = document.getElementById("signin-dropdown");
            // var signinForm = document.getElementById("signin-form");
            var dropdownVisible = false;
            signinBtn.addEventListener("click", function() {
                if (!dropdownVisible) {
                    signinDropdown.style.display = "block";
                    signinBtn.innerHTML = "Close";
                    signinBtn.style.color = "#fff";
                    signinBtn.style.backgroundColor = "#00265B";
                    dropdownVisible = true;
                } else {
                    signinDropdown.style.display = "none";
                    signinBtn.innerHTML = "";
                    var img = document.createElement("img");
                    img.src = "../img/teacher-avatar.jpg";
                    img.alt = "toggler image";
                    img.className = "img-fluid rounded-circle";
                    img.style.width = "50px";
                    img.style.height = "50px";
                    var a = document.createElement("a");
                    a.className = "navbar-item";
                    a.style.textDecoration = "none";
                    a.style.color = "white";
                    a.style.fontSize = "larger";
                    a.innerText = "H Phuc";
                    signinBtn.appendChild(img);
                    signinBtn.appendChild(a);
                    signinBtn.style.backgroundColor = "#00265B";
                    dropdownVisible = false;
                }
            });
        });
    </script>
    <script>
        window.onscroll = function() {
            myFunction()
        };

        // Get the header
        var header = document.getElementById("myHeader");

        // Get the offset position of the navbar
        var sticky = header.offsetTop;

        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
    <div class="row py-3"></div>
</body>
</html>