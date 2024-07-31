<?php
include 'dash_header.php';

?>


<?php
include 'message.php';
?>


<div class="">
    <h2 class="mx-5 p-3"> <span class="font-bold">Admin Manage</span>

        <a href="add_admin.php" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 float-right">Add Admin</a>
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
                    username
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    Password
                </th>

            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * from tbl_admin";
            $sn = 1;
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                foreach ($res as $admin) {

            ?>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $sn++ ?>
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $admin['username'] ?>
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                            <?= $admin['email'] ?>
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                            <?= $admin['password'] ?>
                        </td>
                        <td class=" flex text-gray-900 whitespace-nowrap">

                            <a href="edit_admin.php?id=<?=$admin['id']?>" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 mx-2 my-2 ">Update</a>
                            <form action="../code.php" method="POST">
                                <button value="<?=$admin['id']?>" name="delete_admin" style="cursor: pointer;" class="text-white bg-red-600 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 mx-2 my-2 ">Delete</button>
                            </form>


                        </td>
                      

                            

                       

                    </tr>



            <?php

                }
            }
            else {


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