<?php

require 'dbcon.php';
if (isset($_POST['save_admin'])) {

    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
        $_SESSION['message'] = "Only letters and white space allowed";
        header('location:dashboard/add_admin.php');
        exit(0);
        
    }

    if (strlen($password) < 5) {  
        $_SESSION['message'] = "Password must be at least 5 characters";
        header('location:dashboard/add_admin.php');
        exit(0);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email format";
        header('location:dashboard/add_admin.php');
        exit(0);
        
    }



    $sql = "INSERT into tbl_admin (username,email,password) value ('$username','$email','$password')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['message'] = "The data insertion is Successfully";
        header('location:dashboard/admin.php');
        exit(0);
    } else {
        $_SESSION['message'] = "The data insertion is not successful";
        header('lcoation:dashboard/add_admin.php');
        exit(0);
    }
}


if (isset($_POST['delete_admin'])) {
    $admin_id = mysqli_real_escape_string($conn, $_POST['delete_admin']);
    $sql = "DELETE from tbl_admin where id='$admin_id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['message'] = "The admin is Deleted Sucessfully";
        header('location:dashboard/admin.php');
        exit(0);
    } else {
        $_SESSION['message'] = "The admin is Not Deleted";
        header('location:dashboard/admin.php');
        exit(0);
    }
}

if (isset($_POST['update_admin'])) {
    $admin_id = mysqli_real_escape_string($conn, $_POST['admin_id']);
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "UPDATE tbl_admin set username='$username',email='$email',password='$password' where id='$admin_id'";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['message'] = "The Admin Data Updatation is Sucessfull";
        header('location:dashboard/admin.php');
        exit(0);
    } else {
        $_SESSION['message'] = "The Admin Data Updatation is Sucessfull";
        header('location:dashboard/edit_admin.php');
        exit(0);
    }
}


if (isset($_POST['user_login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $sql = "SELECT * from tbl_admin where email='$email' and password='$password'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        $_SESSION['login'] = true;
        $_SESSION['name'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['id'] = $data['id'];
        header('location:dashboard/dashboard.php');
        // header('location:testing.php');

        $_SESSION['message'] = "the login in is Sucessfull";
        exit(0);
    } else {
        $_SESSION['message'] = "The login is unsuccessfull";
        header('location:frontend/login.php');
        exit(0);
    }
}


if (isset($_POST['save_category'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);


    if (isset($_POST['featured'])) {
        $featured = mysqli_real_escape_string($conn, $_POST['featured']);
    } else {
        $featured = "No";
    }

    if ((isset($_POST['active']))) {
        $active = mysqli_real_escape_string($conn, $_POST['active']);
    } else {
        $active = "No";
    }

    // To check wether images comes on the array
    // print_r($_FILES['image']);
    // die();


    // For the images updation
    if (isset($_FILES['image']['name'])) {

        // uploading the image here
        // For uploading we need image name,source path and destination
        $image_name = $_FILES['image']['name'];

        // upload the image if only the image is selected 
        if ($image_name !== "") {
            // change the name of image 
            $ext = end(explode('.', $image_name));

            // Name of the image will be
            $image_name = "Item_Category_" . rand(000, 999) . '.' . $ext; //e.g. "Item_Category_866.jpg"


            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "images/category/" . $image_name;

            // Now here we can upload files here 
            $upload = move_uploaded_file($source_path, $destination_path);

            // for checking wether the image is uploaded or not 

            if ($upload == false) {
                $_SESSION['message'] = "The files upload is unsucessfull Please try again!!";
                header('location:frontend/add_category.php');
                die();
            }
        }
    } else {
        // dont upload the image and set the image_name as blank 
        $image_name = "";
    }


    $sql = "INSERT into tbl_category set
    title='$title',
    img_name='$image_name',
    featured='$featured',
    active='$active'
    
    ";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['message'] = "The category is Inserted Sucessfully";
        header('location:dashboard/category.php');
        echo $title;
        exit(0);
    } else {
        $_SESSION['messsage'] = "The category was not Inserted ";
        header('location:dashboard/add_category.php');
        exit(0);
    }
}


if (isset($_POST['delete_image'])) {
    $cat_id = mysqli_real_escape_string($conn, $_POST['delete_image']);
    $sql = "DELETE from tbl_category where id=$cat_id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['message'] = "The Item is deleted Sucessfully";
        header('location:dashboard/category.php');
        exit(0);
    } else {
        $_SESSION['message'] = "The Item was Not deleted";
        header('location:dashboard/category.php');
        exit(0);
    }
}


if (isset($_POST['update_category'])) {
    $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    // $current_image = mysqli_real_escape_string($conn, $_POST['image']);
    $current_image = $_POST['current_image'];
    $featured = mysqli_real_escape_string($conn, $_POST['featured']);
    $active = mysqli_real_escape_string($conn, $_POST['active']);

    // echo $cat_id;
    // echo $title;
    // echo $current_image; 
    // echo $featured;
    // echo $active;

    // die();

    if (isset($_FILES['image']['name'])) {

        // get image details 
        $image_name = $_FILES['image']['name'];

        // check wether the image is available or nt 
        if ($image_name !== "") {

            // if the image was touched or changed 
            // image is available 
            // uploading the new image here 

            $ext = end(explode('.', $image_name));

            // Name of the image will be
            $image_name = "Item_Category_" . rand(000, 999) . '.' . $ext; //e.g. "Item_Category_866.jpg"


            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "images/category/" . $image_name;

            // Now here we can upload files here 
            $upload = move_uploaded_file($source_path, $destination_path);

            // for checking wether the image is uploaded or not 
            // if was not uploaded then it will be stoped with the code below

            if ($upload == false) {
                $_SESSION['message'] = "The files upload is unsucessfull Please try again!!";
                header('location:dashboard/update_category.php');
                die();
            }

            // Removing the current image for the new image 

            if (!$current_image == "") {
                $remove_path = "images/category/" . $current_image;
                $remove = unlink($remove_path);

                if ($remove == false) {
                    $_SESSION = "The image is not Replaced";
                    header('location:dashboard/update_category');
                    die();
                }
            }
        } else {
            // if the image was not there or was empty this will be same with the message no image 
            $image_name = $current_image;
        }
    }

    $sql = "UPDATE tbl_category set title='$title',img_name='$image_name',featured='$featured',active='$active' where id='$cat_id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['message'] = "The Category is Updated Sucessfully";
        header('location:dashboard/category.php');
        exit(0);
    } else {
        $_SESSION['message'] = "The Category was not Updated";
        header('location:dashboard/update_category.php');
        exit(0);
    }
}


if (isset($_POST['save_item'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);


    // check if the featured value is active or not 
    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = "No";
    }

    // check if the avtive value is provided or not 

    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }

    // check if the image button is clicked or not and uploaded the image only if the image button is selected 
    if (isset($_FILES['image']['name'])) {
        // we will get the selected image here 
        $image_name = $_FILES['image']['name'];

        // check if the image is selected or not and if seleced then upload 

        if ($image_name !== "") {
            // Image is selected 
            // 1.rename the image
            // get the extension name of the file and break it 
            $ext = end(explode('.', $image_name));  //what is does is it divide the name and extension of the file or image 
            // after the breaking try to rename the image

            $image_name = "Item_category_" . rand(000, 999) . "." . $ext;
            // 2.upload the image 

            // before upload the image we need 3 things 
            // 1.image_source 
            // 2.image_path 
            // 3.image_destination 

            // Src path of the image 
            $src = $_FILES['image']['tmp_name'];

            // Destination path of the image 
            $dst = "images/food/" . $image_name;

            // Now finally uploading the image 
            $upload = move_uploaded_file($src, $dst);

            // check whether the image is uploaded or not 
            if ($upload == false) {
                // display the message and stop the process 
                $_SESSION['message'] = "There was an error while uploading the image";
                header('location:dashboard/add_item.php');
                exit(0);
            }
        }
    } else {
        $image_name = ""; //setting the default value as null 
    }


    $sql = "INSERT into tbl_item (title,description,price,image_name,category_id,featured,active) value ('$title','$description',$price,'$image_name','$category','$featured','$active')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['message'] = "The item is Inserted sucessfully";
        header('location:dashboard/item.php');
        exit(0);
    } else {
        $_SESSION['message'] = "The item was not Inserted ";
        header('location:dashboard/add_item.php');
        exit(0);
    }
}


if (isset($_POST['update_item'])) {
    $id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $current_image = mysqli_real_escape_string($conn, $_POST['current_image']);
    $featured = mysqli_real_escape_string($conn, $_POST['featured']);
    $active = mysqli_real_escape_string($conn, $_POST['active']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    // echo $description;
    // echo $price;
    // echo $current_image;
    // echo $featured;
    // echo $active;
    // echo $category;
    // A. upload the image 
    // update the image if selected 
    // check if the button is clicked or not 
    if (isset($_FILES['image']['name'])) {
        // upload button is clicked
        $image_name = $_FILES['image']['name']; // new image name if selected

        // check for whether the file is available or not 

        if ($image_name !== "") {
            // image is available
            // rename the image 
            $ext = end(explode('.', $image_name));
            $image_name = "Item_name_" . rand(000, 999) . '.' . $ext;
            // get the source path and destination 
            $src_path = $_FILES['image']['tmp_name'];
            $dest_path = "images/food/" . $image_name;


            // now upload the image 
            $upload_image = move_uploaded_file($src_path, $dest_path);

            // check whether the image is uploaded or not 

            if ($upload_image == false) {
                $_SESSION['message'] = "The image was not uploaded";
                header('location:dashboard/update_item.php');
                exit(0);
            }
            // B. Remove the image 
            if (!$current_image == "") {
                // current image is available

                $remove_path = "images/food/" . $current_image;
                $remove = unlink($remove_path);


                // check if the image was remove or not 
                if ($remove == false) {
                    $_SESSION['message'] = "The Image was not removed";
                    header('location:dashboard/update_item.php');
                    exit(0);
                }
            }
        } else {
            // the button was not clicked so 
            $image_name = $current_image;
        }
    }

    // Remove the image if the new image is uploaded and current image exist 
    // update the data in the database 

    $sql = "UPDATE tbl_item set title='$title',description='$description',price=$price,image_name='$image_name',featured='$featured',active='$active',category_id='$category' where id=$id";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['message'] = "The item updation was successfull";
        header('location:dashboard/item.php');
        exit(0);
    } else {
        $_SESSION['message'] = "The item updation was Not successfull";
        header('location:dashboard/update_item.php');
        exit(0);
    }
}


if (isset($_POST['delete_item'])) {
    $id = mysqli_real_escape_string($conn, $_POST['delete_item']);
    $sql = "DELETE from tbl_item where id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['message'] = "The item is Deleted Sucessfully";
        header('location:dashboard/item.php');
        exit(0);
    } else {
        $_SESSION['message'] = "The item was not deleted";
        header('location:dashboard/update_item.php');
        exit(0);
    }
}
