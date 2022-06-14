<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <title><?php echo $judul; ?></title>
</head>
<body class="bg-gray-900">
    
<div class="container mx-auto flex flex-col h-screen">    
    <nav class="border-gray-200 mt-4 px-2 sm:px-4 py-2.5 rounded bg-gray-800">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <div>
                <a href="<?= base_url('home'); ?>" class="">
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Market Place</span>
                </a>
                <span class="self-center bg-gray-700 p-2 ml-3 rounded-lg whitespace-nowrap text-white">welcome <?= $username; ?></span>
                    <a href="<?= base_url("home/keranjang"); ?>">
                        <span class="self-center bg-yellow-200 p-2 ml-3 rounded-lg whitespace-nowrap">keranjang</span>
                    </a>
                    <?php
                        $keranjang = $this->cart->contents();
                        $jml_item = 0;
                        foreach($keranjang as $key => $value) {
                            $jml_item = $jml_item + $value["qty"];
                        }
                    ?>
                    <span class="self-center bg-red-400 p-2 ml-3 rounded-lg whitespace-nowrap"><?= $jml_item ?></span>
            </div>
        <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul class="flex flex-col items-center mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <form method="post" action="<?= base_url("home/search"); ?>">
                            <input type="text" name="search" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="search" required="">
                        </form>
                    </li>
                    <li>
                        <a href="<?= base_url('home'); ?>" class="block py-2 pr-4 pl-3 md:hover:bg-transparent md:border-0 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white border-gray-700">Beranda</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 md:hover:bg-transparent md:border-0 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white border-gray-700">Kategori</a>
                    </li>
                    <li>
                        <a href="<?= base_url('home/pesanan'); ?>" class="block py-2 pr-4 pl-3 md:hover:bg-transparent md:border-0 md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white border-gray-700">Pesanan</a>
                    </li>
                    <div id="dropdownNavbar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                          </li>
                          <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                          </li>
                          <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                          </li>
                        </ul>
                    </div>
                    <?php   
                        if(isset($role_id))                  
                        {
                            if($role_id == 3)
                            {
                                echo '<a href="index.php/auth/logout" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</a>';
                            }
                            else
                            {
                                echo '<a href="index.php/auth/login" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>';
                            }
                        }
                        else
                        {
                            echo '<a href="index.php/auth/login" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>