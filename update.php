<?php
    include "congfig.php";

    if(isset($_POST['update'])) {
        $firstname = $_POST['firstname'];
        $user_id = $_POST['id'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];

        $sql = "UPDATE 'users' SET 'firstname' = '$firstname', 'lastname'='$lastname', ''email='$email', 'password'='$password', 'gender'='$gender', WHERE 'id'='$user_id'";

        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "Record Update Succesfully";
        }
        else{
            echo "Error:". $sql . "<br>" . $conn->error;
        }
    }

    if(isset($_GET['id'])) {
        $user_id = $_GET['id'];

        $sql = "SELECT *FROM 'users' WHERE 'id'='$user_id'";

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $password = $row['password'];
                $gender = $row['gender'];
                $id = $row['id'];
            }
        ?>

            <h2>User Update Form</h2>
            <form action="" method="post">
            <fieldset>
                <legend>Personal Information</legend>
                First name:<br>
                <input type="text" name="firstname" value="<?php echo $firstname; ?>">
                <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                <br>
                Last Name:<br>
                <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                <br>
                Email:<br>
                <input type="email" name="email" value="<?php echo $email; ?>">
                <br>
                Password:<br>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <br>
                Last Name:<br>
                <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                <br>
                Gender:<br>
                <input type="radio" name="gender" value="male" <?php if($gender == 'male'){ echo "checked";} ?> >Male
                <input type="radio" name="gender" value="female" <?php if($gender == 'female'){ echo "checked";} ?> >Female
                <br><br>
                <input type="submit" value="update" name="update">
            </fieldset>
            </form>
                
            </body>
            </html>

            <?php
        }else{
            // If the 'id' value is not valid, redirect the user back to view.php page
            header('Location: view.php');
        }
    }
    ?>