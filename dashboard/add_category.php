<?php
include 'dash_header.php'
?>


<?php

include 'message.php';

?>



<div class="mt-10">
    <form action="../code.php" method="POST" class="max-w-2xl mx-10" enctype="multipart/form-data">
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title " />
        </div>


        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
            <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div>
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


        <button type="submit" name="save_category" value="add_category" class="text-white bg-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-blue-800">Add Category</button>
    </form>

</div>



