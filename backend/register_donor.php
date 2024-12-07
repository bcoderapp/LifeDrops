<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $area = $_POST['area'];
    $contact_no = $_POST['contact_no'];
    $alt_contact_no = $_POST['alt_contact_no'];

    // Check if the donor already exists in the database
    $stmt = $conn->prepare("SELECT * FROM donors WHERE name = ? AND blood_group = ? AND contact_no = ?");
    $stmt->bind_param("sss", $name, $blood_group, $contact_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Donor already exists
        $message = "You are already Registered.";
    } else {
        // Insert new donor into the database
        $stmt = $conn->prepare("INSERT INTO donors (name, blood_group, area, contact_no, alt_contact_no) 
                                VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $blood_group, $area, $contact_no, $alt_contact_no);

        if ($stmt->execute()) {
            $message = "Donor registered successfully.";
        } else {
            $message = "Error: " . $conn->error;
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>
    <style>
        /* Modal styling */
        #modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        #modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
        }

        #modal-content p {
            margin-bottom: 20px;
            font-size: 16px;
        }

        #modal-content button {
            padding: 10px 50px;
            background-color: #dc3545;
            color: white;
            border: 1px solid #dc3545;
            border-radius: 5px;
            cursor: pointer;
        }

        #modal-content button:hover {
            border: 1px solid #dc3545;
            color: #dc3545;
            background-color: #fff;
        }
        #modal-content button a{
            text-decoration: none;
            color: #fff;
        }
        #modal-content button:hover a{
            color: #dc3545 !important;
        }
    </style>
</head>
<body>
    <!-- Modal structure -->
    <div id="modal">
        <div id="modal-content">
            <p id="modal-message"></p>
            <button onclick="closeModal()"><a href="../">Close</a></button>
        </div>
    </div>

    <script>
        // Show the modal with a message
        function showModal(message) {
            document.getElementById('modal-message').innerText = message;
            document.getElementById('modal').style.display = 'flex';
        }

        // Close the modal
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        // Automatically show the modal if there's a message from PHP
        <?php if (!empty($message)) : ?>
        showModal("<?php echo $message; ?>");
        <?php endif; ?>
    </script>
</body>
</html>
