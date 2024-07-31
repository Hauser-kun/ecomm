<?php
include 'dash_header.php';
?>

<?php

include 'message.php';

?>

<div class="mt-10">
    <form action="../code.php" method="POST" class="max-w-2xl mx-10" enctype="multipart/form-data">
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" />
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Description</label>
            <textarea placeholder="Description" type="description" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> </textarea>
        </div>
        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Price" />
        </div>
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
            <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>


        <div class="mb-5">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select type="file" name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php

                // for displaying the category items
                // we need to access database and fetch the data 
                // creating connection and reaching to database 
                $sql = "SELECT * from tbl_category where active='Yes'";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0) {
                    // Display the item 
                    foreach ($res as $cat_item) {


                ?>
                        <option value="<?= $cat_item['id'] ?>"> <?= $cat_item['title'] ?> </option>


                    <?php
                    }
                } else {
                    // Dont display the item 
                    ?>
                    <option value="1">No Category</option>
                <?php
                }

                ?>
            </select>
        </div>


        <div class="mb-5 w-full text-sm text-left rtl:text-right text-bla-500 dark:text-gray-400">
            <label for="featured" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Featured</label>
            <input type="radio" value="Yes" name="featured" class="mx-2 " /> Select
            <input type="radio" value="No" name="featured" class="mx-2" />UnSelect
        </div>
        <div class="mb-5 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <label for="active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Active Status</label>
            <input type="radio" value="Yes" name="active" class="mx-2" /> Active
            <input type="radio" value="No" name="active" class="mx-2" />Deactive
        </div>

        <button type="submit" name="save_item" value="save_item" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Item</button>
    </form>

</div>

<?php
// if(isset($_POST['save_item'])){
//         $title=mysqli_real_escape_string($conn,$_POST['title']);
//         $description=mysqli_real_escape_string($conn,$_POST['description']);
//         $price=mysqli_real_escape_string($conn,$_POST['price']);
//         $category=mysqli_real_escape_string($conn,$_POST['category']);
//         $featured=mysqli_real_escape_string($conn,$_POST['featured']);
//         $active=mysqli_real_escape_string($conn,$_POST['active']);

//         echo $title;
//         echo $description;
//         echo $price;
//         echo $category;
//         echo $featured;
//         echo $active;
//         die();
// }

?>