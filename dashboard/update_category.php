<?php
include 'dash_header.php'
?>


<?php

include 'message.php';

?>



<div class="mt-10">
    <?php

    if (isset($_GET['id'])) {
        $cat_id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * from tbl_category where id=$cat_id";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $cat_item = mysqli_fetch_array($res);
    ?>

            <form action="../code.php" method="POST" class="max-w-2xl mx-10" enctype="multipart/form-data">
                <input type="hidden" name="cat_id" value="<?= $cat_item['id'] ?>">
                <input type="hidden" name="current_image" value="<?= $cat_item['img_name'] ?>">
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" value="<?= $cat_item['title'] ?>" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title " />
                </div>


                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>

                    <?php
                    if (!$cat_item['img_name'] == "") {
                        // Display image 
                    ?>
                        <img class="my-3 " src="<?= "../images/category/" . $cat_item['img_name'] ?>" width="200px" alt="Image">
                    <?php

                    } else {
                        echo "No Image Added";
                    }


                    ?>
                    <h2 class="text-xl font-bold my-3">Current Image ⬆️</h2>
                    <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div>
                </div>


                <div class="mb-5 w-full text-sm text-left rtl:text-right text-bla-500 dark:text-gray-400">
                    <label for="featured" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Featured</label>
                    <input type="radio" <?php
                                        if ($cat_item['featured'] == 'Yes') {
                                            echo "checked";
                                        }

                                        ?> value="Yes" name="featured" class="mx-2 " /> Select
                    <input type="radio" <?php
                                        if ($cat_item['featured'] == 'No') {
                                            echo 'checked';
                                        }
                                        ?> value="No" name="featured" class="mx-2" />UnSelect
                </div>
                <div class="mb-5 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <label for="active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Active Status</label>
                    <input type="radio" <?php
                                        if ($cat_item['active'] == 'Yes') {
                                            echo 'checked';
                                        }

                                        ?> value="Yes" name="active" class="mx-2" /> Active
                    <input type="radio" <?php
                                        if ($cat_item['active'] == 'No') {
                                            echo 'checked';
                                        }

                                        ?> value="No" name="active" class="mx-2" />Deactive
                </div>


                <button type="submit" name="update_category"  class="text-white bg-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-blue-800">Update Category</button>
            </form>
         


    <?php

        }
    }


    ?>





</div>