<?php
include 'dash_header.php';

?>

<div class="">
    <h2 class="mx-5 p-3"> <span class="font-bold">Manage Order</span>

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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white">
                    Silver
                </td>
                <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                    Laptop
                </td>
                <td class="px-6 py-4  text-gray-900 whitespace-nowrap">
                    $2999
                </td>
                <td class="px-3">
                <a  class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 ">Update</a>
                <a  class="text-white bg-red-600 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-1.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 ">Delete</a>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>