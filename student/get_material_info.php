<?php
require_once("../config/db.class.php");
require_once("../entities/material.class.php");

if (isset($_GET['maMon'])) {
    $selectedMajor = $_GET['maMon'];
    $materials = Material::list_material_by_major($selectedMajor);

    echo '<table class="table">';
    echo '<thead><tr><th>Link</th><th>Type</th></tr></thead>';
    echo '<tbody>';
    foreach ($materials as $material) {
        echo '<tr>';
        echo '<td><a href="' . $material['taiLieu'] . '" target="_blank">' . $material['taiLieu'] . '</a></td>';
        echo '<td>' . $material['loaiTaiLieu'] . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
}
?>
