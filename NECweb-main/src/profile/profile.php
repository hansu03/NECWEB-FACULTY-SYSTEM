<?php
require("../components/sidebar.php");
if (!isset($_SESSION['faculty_id'])) {
    header("Location: ../login/index.php");
}


$user_id = $_SESSION['faculty_id'];
$query = "SELECT * FROM faculty WHERE faculty_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $gender = $row['gender'];
    $age = $row['age'];
    $contact = $row['contact'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../style/global.css">
</head>

<body>
    <div>
        <?php
    sidebar($name, $department, $course, $image)
    ?>
    </div>
    <main>
        <div class="profile">
            <div class="card">
                <div class="profile-content">
                    <h2>Update Profile</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <label>Name:</label>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                        <br><br>
                        <label>Gender:</label>
                        <input type="radio" name="gender" value="M" <?php if ($gender == "M") echo "checked"; ?>> Male
                        <input type="radio" name="gender" value="F" <?php if ($gender == "F") echo "checked"; ?>> Female
                        <br><br>
                        <label>Age:</label>
                        <input type="date" name="age" value="<?php echo $age; ?>">
                        <br><br>
                        <label>Contact:</label>
                        <input type="text" name="contact" value="<?php echo $contact; ?>">
                        <br><br>
                        <label>Profile Picture:</label>
                        <input type="file" name="image">
                        <br><br>
                        <input type="submit" name="update" value="Update">
                        <?php 
                        // Process the form data when the user clicks on the "update" button
                            if (isset($_POST['update'])) {
                                $new_name = $_POST['name'];
                                $new_gender = $_POST['gender'];
                                $new_age = $_POST['age'];
                                $new_contact = $_POST['contact'];
                                $original_name = $_FILES['image']['name'];
                                $timestamp = time();
                                $new_image = $timestamp . '_' . $original_name;

                                // Update the user's profile data in the database
                                $query = "UPDATE faculty SET name='$new_name', gender='$new_gender', age='$new_age', contact='$new_contact'";
                                if (empty($new_image) || strpos($new_image,'image/')!=0) {
                                    
                                }else{
                                    $query .= ", image='$new_image'";
                                    move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/$new_image");
                                }
                                $query .= " WHERE faculty_id= '$user_id'";
                                $result = mysqli_query($conn, $query);
                                // if(mysqli_num_rows($result) > 0){
                                    echo "<script>alert('Profile Updated Successfully');</script>";
                                // }
                                // Redirect to the updated profile page
                            header("Location: profile.php");
                            }
                            ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>