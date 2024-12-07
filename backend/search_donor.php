<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LifeDrops - Blood Donation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <!-- Navigation Bar -->
    <section class="nav_section">
        <div class="nav_body container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../">LifeDrops</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#search-section">Search Donor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#register-section">Register Donor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#info-section">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#articles-section">Articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#developers-section">Meet Developers</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section id="search_result pt-5">
        <div class="container search_body pt-5">
        <br><br>
        <?php
        include 'db.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $blood_group = $_POST['blood_group'];
            $area = $_POST['area'];

            $sql = "SELECT * FROM donors WHERE blood_group = '$blood_group' AND area = '$area'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>Search Result</h2>";
                echo "<br>";
                while ($row = $result->fetch_assoc()) {
                    echo "<p>Name: " . $row['name'] . "<br>";
                    echo "Blood Group: " . $row['blood_group'] . "<br>";
                    echo "Area: " . $row['area'] . "<br>";
                    echo "Contact No: " . $row['contact_no'] . "<br>";
                    echo "Alt Contact: " . $row['alt_contact_no'] . "</p><hr>";
                }
            } else {
                echo "<br>";
                echo "<br>";
                echo "<h3>We are Really Sorry! No Donor Registered to Serve you.</h3>";
                echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";
                echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";
                echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";
            }
        }
        ?>
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- Footer -->
    <footer class="bg-danger text-white py-3">
        <div class="text-center">
            <p>© 2024 LifeDrops. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>