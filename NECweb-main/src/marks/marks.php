<?php
require("../components/sidebar.php");
if(isset($_POST['marks']) && isset($_POST['enrollment_number'])){
            $sql = "UPDATE marks SET marks = $_POST[marks] WHERE enrollment_number = '$_POST[enrollment_number]';";
            $result = mysqli_query($conn, $sql);
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks</title>
    <link rel="stylesheet" href="../style/global.css">
</head>

<body>
    <div>
        <?php
        sidebar($name,$department,$course,$image)
        ?>
    </div>
    <!-- drop down -->
    <div class ="bar">
        <div class="header">
                <a herf = "#">SELECT SEMESTER 🔽</a>
                <div class="dropdown">
                    <div class="text"><a herf="#">3rd sem</a></div>
                    <div class="text"><a herf="#">4th sem</a></div>
                    <div class="text"><a herf="#">5th sem</a></div>
                    <div class="text"><a herf="#">6th sem</a></div>
                </div>
            </div>
            <div class="header">
                <a herf="#">SELECT SESSION 🔽</a>
                <div class="dropdown">
                    <div class="text"><a herf="#">Dec-22 May-23</a></div>
                    <div class="text"><a herf="#">May-23 Oct-23</a></div>
                </div>
            </div>
    </div> 
    <div>
    <!--dropdown end -->

    <main>

        <?php
    // select all rows from the table
    $sql = "SELECT e.enrollment_number, s.name, e.semester, e.session, e.marks, e.faculty_id, e.course_id  FROM marks e  JOIN students s ON e.enrollment_number = s.enrollment_number WHERE e.faculty_id = '$faculty_id';";
    $result = mysqli_query($conn, $sql);
    // display the data in a formatted manner
    echo "<table style='border-collapse: collapse; width: 100%;background-color:white;color:black;'>";
    echo "<tr style='background-color: #052963;color:white;'><th style='border: 1px solid black; padding: 8px;'>Enrollment Number</th><th style='border: 1px solid black; padding: 8px;'>Name</th><th style='border: 1px solid black; padding: 8px;'>Semester</th><th style='border: 1px solid black; padding: 8px;'>Session</th><th style='border: 1px solid black; padding: 8px;'>Marks</th></tr>";
   while ($row = mysqli_fetch_assoc($result)) {
        $marks = $row['marks'] == 0 ? "<form method='POST' action='marks.php'><input name='enrollment_number' style='display:none' value='{$row['enrollment_number']}' required><input type='text' id='marks' name='marks' placeholder='Enter marks' required><input type='submit' id='submit' value='submit'></form>" : $row['marks'];
        echo "<tr><td style='border: 1px solid #052963; padding: 8px;'>" . $row['enrollment_number'] . "</td><td style='border: 1px solid #052963; padding: 8px;'>" . $row['name'] . "</td><td style='border: 1px solid #052963; padding: 8px;'>" . $row['semester'] . "</td><td style='border: 1px solid #052963; padding: 8px;'>" . $row['session'] . "</td><td style='border: 1px solid #052963; padding: 8px;'>" . $marks . "</td></tr>";
}

    echo "</table>";
?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#submit").on("click", function(e) {
                e.preventDefault();
                $.ajax({
                    url: "marks.php",
                    type: "POST",
                    data: $("form").serialize(),
                    success: function(data) {
                        $("#result").html(data);
                    }
                });
            });
        });
        </script>
    </main>
</body>

</html>