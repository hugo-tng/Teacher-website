<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Upload</title>
    <style>
        .custom-form {
            background-color: #D9D9D9;
            font-size: 25px;
            padding: 20px;
        }
        .errorMessage {
            color: rgb(185, 0, 0);
            font-size: 20px;
            font-style: italic;
        }
        .lblinput input {
            width: 50%;
        }
    </style>
    <script src="./script.js"></script>
</head>
<body>
    <header class="row"> <?php require_once("header.php"); ?></header>
    <div class="container custom-form rounded p-4">
        <div class="row">
            <div class="col-md-4">
                <form id="myForm">
                    <label for="selectUserArray">Select</label>
                    <select id="selectUserArray" name="selectUserArray">
                        <option value="none"></option>
                        <option value="information">Information</option>
                        <option value="majorial">Major</option>
                        <option value="materials">Materials</option>
                        <option value="research">Research</option>
                        <option value="news">News</option>
                    </select>
                </form>
            </div>
            <div class="col-md-8">
                <div id="editFields"></div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('selectUserArray').addEventListener('change', function() {
            var selectedValue = this.value;
            var editFields = document.getElementById('editFields');
            editFields.innerHTML = '';
            if (selectedValue === 'information') {
                editFields.innerHTML = `
                <form id="myForm" method="post" action="../sql/add_teacher.php" onsubmit="return validate('info')">
                    <div class="row">
                        <div class="lbltitle">
                            <label>Teacher's ID</label>
                        </div>
                        <div class="lblinput">
                            <input type="text" id="tcID" name="txtMaGiangVien" value="<?php echo isset($_POST["txtMaGiangVien"])?$_POST["txtMaGiangVien"]:"";?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="lbltitle">
                            <label>Teacher's Name</label>
                        </div>
                        <div class="lblinput">
                        <input type="text" id="tcName" class="formcontrol" name="txtTenGiangVien" value="<?php echo isset($_POST["txtTenGiangVien"])?$_POST["txtTenGiangVien"]:"";?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="lbltitle">
                            <label>Contact</label>
                        </div>
                        <div class="lblinput">
                            <input type="text" id="tcContact" name="txtThongTinLienHe" value="<?php echo isset($_POST["txtThongTinLienHe"])?$_POST["txtThongTinLienHe"]:"";?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="lbltitle">
                            <label>Introduction</label>
                        </div>
                        <div class="lblinput">
                            <input type="text" id="tcIntro" name="txtGioiThieu" value="<?php echo isset($_POST["txtGioiThieu"])?$_POST["txtGioiThieu"]:"";?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="lbltitle">
                            <label>Position</label>
                        </div>
                        <div class="lblinput">
                            <input type="text" id="tcPos" name="txtChucVu" value="<?php echo isset($_POST["txtChucVu"])?$_POST["txtChucVu"]:"";?>">
                        </div>
                    </div>
                    <div class="d-none errorMessage my-3">Please enter your teacher's ID.</div>
                    <div class="row">
                        <div class="submit">
                            <input type="submit" name="btnsubmit" value="Upload"/>
                        </div>
                    </div>
                </form>
                `;
            } else if (selectedValue === 'materials') {
                editFields.innerHTML = `
                    <form method="post" action="../sql/add_material.php" onsubmit="return validate('materials')">
                        <div class="row">
                            <div class="lbltitle">
                                <label>Majors url</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" name="txtTaiLieu" value="<?php echo isset($_POST["txtTaiLieu"])?$_POST["txtTaiLieu"]:"";?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="lbltitle">
                                <label>Majors Type</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" name="txtLoaiTaiLieu" value="<?php echo isset($_POST["txtLoaiTaiLieu"])?$_POST["txtLoaiTaiLieu"]:"";?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="lbltitle">
                                <label>Majors ID</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" name="txtMonHocLienQuan" value="<?php echo isset($_POST["txtMonHocLienQuan"])?$_POST["txtMonHocLienQuan"]:"";?>">
                            </div>
                        </div>
                        <div class="d-none errorMessage my-3">Please enter your Major's ID.</div>
                        <div class="row mt-3">
                            <div class="submit">
                                <input type="submit" name="btnsubmit" value="Upload"/>
                            </div>
                        </div>
                    </form>
                `;
            } else if (selectedValue === 'majorial') {
                editFields.innerHTML = `
                    <form method="post" action="../sql/add_major.php" onsubmit="return validate('major')">
                        <div class="row">
                            <div class="lbltitle">
                                <label>Major's ID</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" id="mjID" name="txtMaMon" value="<?php echo isset($_POST["txtMaMon"])?$_POST["txtMaMon"]:"";?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="lbltitle">
                                <label>Major's Name</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" id="mjName" name="txtTenMon" value="<?php echo isset($_POST["txtTenMon"])?$_POST["txtTenMon"]:"";?>">
                            </div>
                        </div>
                        <div class="d-none errorMessage my-3">Please enter your Major's ID.</div>
                        <div class="row">
                            <div class="submit">
                                <input type="submit" name="btnsubmit" value="Upload"/>
                            </div>
                        </div>
                    </form>
                `;
            } else if (selectedValue === 'research') {
                editFields.innerHTML = `
                    <form method="post" action="../sql/add_research.php" onsubmit="return validate('research')">
                        <div class="row">
                            <div class="lbltitle">
                                <label>Research's title</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" id="rsID" name="txtTuaDe" value="<?php echo isset($_POST["txtTuaDe"])?$_POST["txtTuaDe"]:"";?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="lbltitle">
                                <label>Research's content</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" id="rsName" name="txtMoTa" value="<?php echo isset($_POST["txtMoTa"])?$_POST["txtMoTa"]:"";?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="lbltitle">
                                <label>Author</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" id="rsAu" name="txtMaGiangVien" value="<?php echo isset($_POST["txtMaGiangVien"])?$_POST["txtMaGiangVien"]:"";?>">
                            </div>
                        </div>
                        <div class="d-none errorMessage my-3">Please enter your Research's ID.</div>
                        <div class="row">
                            <div class="submit">
                                <input type="submit" name="btnsubmit" value="Upload"/>
                            </div>
                        </div>
                    </form>
                `;
            } else if (selectedValue === 'news') {
                editFields.innerHTML = `
                    <form method="post" action="../sql/add_news.php" onsubmit="return validate('news')">
                        <div class="row">
                            <div class="lbltitle">
                                <label>Title</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" id="ntt" name="txtTuaDe" value="<?php echo isset($_POST["txtTuaDe"])?$_POST["txtTuaDe"]:"";?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="lbltitle">
                                <label>Content</label>
                            </div>
                            <div class="lblinput">
                            <textarea id="nContent" name="txtNoiDung" style="width: 100%; height: 150px;"><?php echo isset($_POST["txtNoiDung"])?$_POST["txtNoiDung"]:"";?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="lbltitle">
                                <label>Major</label>
                            </div>
                            <div class="lblinput">
                                <input type="text" id="nMajor" name="txtMonHocLienQuan" value="<?php echo isset($_POST["txtMonHocLienQuan"])?$_POST["txtMonHocLienQuan"]:"";?>">
                            </div>
                        </div>
                        <div class="d-none errorMessage my-3">Please enter your New's title.</div>
                        <div class="row">
                            <div class="submit">
                                <input type="submit" name="btnsubmit" value="Upload"/>
                            </div>
                        </div>
                    </form>
                `;
            }
        });
    </script>
    <footer class="row"> <?php require_once("../student/footer.php"); ?> </footer>
</body>
</html>
<?php
    if (isset($_GET['inserted'])) {
        $msg = $_GET['inserted'];
        echo '<script>';
        echo 'alert("'.$msg.'");';
        echo 'window.location.href = "../teacher/teacherpage.php";';
        echo '</script>';
    }
?>