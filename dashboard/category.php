<?php
include 'dash_header.php';

?>


<?php
include 'message.php';
?>


<div class="">
    <h2 class="mx-5 p-3"> <span class="font-bold">Manage Category</span>

        <a href="add_category.php" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 float-right">Add Category</a>
    </h2>

</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 mx-4">
    <table class="w-full text-sm text-left rtl:text-right text-white bg-gray-800 hover:bg-gray-900">
        <thead class="text-xs text-white-700 uppercase bg-dark dark:bg-dark-900 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    S.N
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Featured
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>

            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tbl_category ";
            $sn = 1;
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                foreach ($res as $cat_items) {

            ?>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $sn++ ?>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $cat_items['title'] ?>
                        </th>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white">

                            <?php
                            if (!$cat_items['img_name'] == "") {
                                // Display image 
                            ?>
                                <img src="<?= "../images/category/" . $cat_items['img_name'] ?>" width="50px" alt="Image">
                            <?php

                            } else {
                                echo "No Image Added";
                            }


                            ?>
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                            <?= $cat_items['featured'] ?>
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                            <?= $cat_items['active'] ?>
                        </td>
                        <td class="px-3 flex">
                            <a href="update_category.php?id=<?= $cat_items['id'] ?>" style="cursor:pointer;" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 mx-2 my-2">Update</a>
                            <form action="../code.php" method="POST">
                                <button value="<?= $cat_items['id'] ?>" style="cursor:pointer;" type="submit" name="delete_image" class="text-white bg-red-600 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 mx-2 my-2 ">Delete</button>
                            </form>


                        </td>
                    </tr>


                <?php





                }
            } else {


                ?>

                <td class="px-6 py-4  text-white whitespace-nowrap">
                    No DATA IS ADDED
                </td>



            <?php
            }

            ?>




        </tbody>
    </table>
</div>