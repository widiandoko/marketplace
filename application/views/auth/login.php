<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <title><?= $judul ?></title>
</head>
<body class="bg-gray-900">
<div class="flex justify-center items-center h-screen w-screen">
    <div class="bg-gray-800 p-4 border border-gray-600 rounded-lg w-96">
        <form method="post" action="<?= base_url('auth/login'); ?>">
            <div class="mb-6">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Login</h5>
            </div>
            <div class="mb-6">
                <input type="text" name="username" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="username" required="">
                <?= form_error('username', '<small class="text-red-400">', '</small>'); ?>
            </div>
            <div class="mb-6">
                <input type="password" name="password" class="mb-3 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="password" required="">
                <?= form_error('password', '<small class="text-red-400">', '</small>'); ?>
            </div>
            <button type="submit" class="text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
            <div class="text-white mt-4 text-sm">
                <a href="<?= base_url(); ?>auth/register">belum punya akun? daftar</a>
            </div>
            <div class="text-white mt-4 text-sm">
                <a href="<?= base_url(); ?>home">home</a>
            </div>
    </div>
</div>
</body>
</html>

    