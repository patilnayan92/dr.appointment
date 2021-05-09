<?php 
    
    require_once "config.php";
    // Check existence of id parameter before processing further

    if(isset($_POST['updateDoctor'])){
        $id = $_POST['id'];
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        
        $qualification = $_POST['qualification'];
        $specification = $_POST['specification'];
        $fee = $_POST['fee'];

        $docimage = $_FILES['docimage']['name'];
        $tmp_docimage = $_FILES['docimage']['tmp_name'];

        move_uploaded_file($tmp_docimage, "./docimages/$docimage");

        if(empty($docimage)){
            
            $query = "SELECT * FROM users WHERE id=$id";
            $select_image = mysqli_query($link, $query);
            while($row = mysqli_fetch_assoc($select_image)){
                
                $docimage = $row['image'];
            }
        }

        $query = "UPDATE users SET name='$name',email ='$email', mobile='$mobile', qualification='$qualification', specification='$specification', fee='$fee', image='$docimage' WHERE id = $id ";
      
        
        $update_doctor = mysqli_query($link, $query);
        if($update_doctor) {
            $message = "Doctor Updated Successfully!";
            echo "<script type='text/javascript'>alert('$message');
                window.location.href='doctors.php';</script>";
        } else {
            $error = "Something went wrong";
            echo "<script type='text/javascript'>alert('$error');
                window.location.href='doctors.php';</script>";
        }

    }
   	
 ?>