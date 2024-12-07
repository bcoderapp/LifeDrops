<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blood_group = $_POST['blood_group'];
    $area = $_POST['area'];

    $sql = "SELECT * FROM donors WHERE blood_group = '$blood_group' AND area = '$area'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>Name: " . $row['name'] . "<br>";
            echo "Blood Group: " . $row['blood_group'] . "<br>";
            echo "Area: " . $row['area'] . "<br>";
            echo "Contact No: " . $row['contact_no'] . "<br>";
            echo "Alt Contact: " . $row['alt_contact_no'] . "</p><hr>";
        }
    } else {
        echo "We are Really Sorry! No Donor Registered to Serve you.";
    }
}
?>