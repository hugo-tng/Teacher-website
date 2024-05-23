<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Major</title>
    <style>
        .custom-material {
            background-color: #D9D9D9;
            padding: 20px;
            border-radius: 10px;
        }
        #selectMajor {
            height: 30px;
            width: 200px;
            font-size: 14px;
        }
        .major-list {
            list-style-type: none;
            padding: 0;
        }
        .major-list li {
            /* cursor: pointer;
            margin-bottom: 10px;
            font-size: 16px;
            color: #00215E; */
            cursor: pointer;
            margin-bottom: 10px;
            font-size: 16px;
            color: #00215E;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s ease; 
        }
        .major-list li:hover {
            /* text-decoration: underline; */
            color: #fff;
            background-color: #00215E;
        }
        #materialInfo {
            /* margin-top: 15px;
            font-size: 16px;
            border-radius: 10px; */
            margin-top: 45px;
            margin-bottom: 20px;
            font-size: 16px;
            background-color: #fff;
            border-radius: 10px;
            width: 65%;
        }
    </style>
</head>
<body>
    <header><?php require_once("header.php"); ?></header>
    <div class="container custom-material">
        <div class="row">
            <div class="col-md-4">
                <!-- <label for="selectMajor" class="fs-4">Select major:</label>
                <select id="selectMajor" class="form-select">
                    <option value=""></option>
                    <?php
                        require_once("../entities/major.class.php");
                            $majors = Major::list_major();
                            foreach ($majors as $major) {
                                echo '<option class="fs-5" value="' . $major['maMon'] . '">' . $major['tenMon'] . '</option>';
                        }
                    ?>
                </select> -->
                <label for="selectMajor" class="fs-3">Major</label>
                <ul class="major-list" id="majorList">
                    <?php
                        require_once("../entities/major.class.php");
                        $majors = Major::list_major();
                        foreach ($majors as $major) {
                            echo '<li onclick="loadMajors(\'' . $major['maMon'] . '\')">' . $major['tenMon'] . '</li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-8 p-4" id="materialInfo">
            </div>
        </div>
    </div>
    <footer><?php require_once("footer.php"); ?></footer>
    <!-- <script>
        document.getElementById('selectMajor').addEventListener('change', function() {
            var selectedMajor = this.value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('materialInfo').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "get_material_info.php?maMon=" + selectedMajor, true);
            xhttp.send();
        });
    </script> -->
    <script>
        function loadMajors(maMon) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('materialInfo').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "get_material_info.php?maMon=" + maMon, true);
            xhttp.send();
        }
    </script>
</body>
</html>
