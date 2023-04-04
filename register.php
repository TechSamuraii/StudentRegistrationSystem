<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $country = $_POST['country'];

    // Validate form data
    $errors = array();
    if(empty($name)){
      $errors[] = "Name is required";
    }
    if(empty($email)){
      $errors[] = "Email is required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors[] = "Invalid email format";
    }
    if(empty($phone)){
      $errors[] = "Phone number is required";
    }
    if(empty($gender)){
      $errors[] = "Gender is required";
    }
    if(empty($address)){
      $errors[] = "Address is required";
    }
    if(empty($country)){
      $errors[] = "Country is required";
    }

    // If form data is valid, save to database
    if(empty($errors)){
      // Connect to database
      $servername = "localhost";
      $username = "root"; // replace with your actual username
      $password = ""; // replace with your actual password
      $dbname = "student_registration";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Save form data to database
      $stmt = $conn->prepare("INSERT INTO students (name, email, phone, gender, address, country) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssss", $name, $email, $phone, $gender, $address, $country);
      $stmt->execute();
      if ($stmt->error) {
        printf("Error message: %s\n", $stmt->error);
      }
      $stmt->close();
      $conn->close();

      // Redirect to success page
      header("Location: success.php");
      exit();
    }
  }
?>
