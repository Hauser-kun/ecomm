<?php
include 'dash_header.php';

?>


<div class="">
    <h2 class="mx-5 p-3"> <span class="font-bold">Manage Food</span>

        <a href="add_item.php" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 float-right">Add Item </a>
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
                    title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
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
            $sql2 = "SELECT* from tbl_item ";
            $sn = 1;
            $res2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($res2) > 0) {
                foreach ($res2 as $item) {
            ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $sn++ ?>
                        </th>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $item['title'] ?>
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                            <?= $item['description'] ?>
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                            <?= $item['price'] ?>
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                            <?php
                            if(!$item['image_name']==""){

                                ?>
                               <img src="<?= "../images/food/".$item['image_name']  ?>" width="50" alt="">

                               <?php
                            }
                            else{
                                echo "No images";
                            }

                            ?>
                        </td>
                       
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                            <?= $item['featured'] ?>
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                            <?= $item['active'] ?>
                        </td>
                        <td class="px-3 flex">
                            <a href="update_item.php?id=<?= $item['id'] ?>" style="cursor:pointer;" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 mx-2 my-2">Update</a>
                            <form action="../code.php" method="POST">
                                <button value="<?= $item['id'] ?>" style="cursor:pointer;" type="submit" name="delete_item" class="text-white bg-red-600 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 mx-2 my-2 ">Delete</button>
                            </form>
                        </td>
                    </tr>



            <?php
                }
            }

            ?>


        </tbody>
    </table>
</div>