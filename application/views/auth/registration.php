<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.2/dist/datepicker.js"></script>
    <title><?= $judul ?></title>
</head>
<body class="bg-gray-900">
<div class="flex justify-center items-center h-screen w-screen">
    <div class="bg-gray-800 p-4 border border-gray-600 rounded-lg w-96">
        <form method="post" action="<?= base_url('auth/register'); ?>">
            <div class="mb-6">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Buat Akun!</h5>
            </div>
            <div class="mb-6">
                <input type="text" name="username" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="username" required="">
                <?= form_error('username', '<small class="text-red-400">', '</small>'); ?>
            </div>
            <div class="mb-6">
                <input type="password" name="password1" class="mb-3 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="password" required="">
                <input type="password" name="password2" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="konfirmasi password" required="">
                <?= form_error('password1', '<small class="text-red-400">', '</small>'); ?>
            </div>

            <!--nik-->
            <div class="mb-6">
                <input type="text" name="nik" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="NIK" required="">
            </div>

            <div class="flex items-center mb-4">
                <input type="radio" name="jenis_kelamin" value="L" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                <label class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Laki-laki
                </label>
            </div>

            <div class="flex items-center mb-4">
                <input type="radio" name="jenis_kelamin" value="P" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                <label class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Perempuan
                </label>
            </div>

            <div class="mb-6">
                <input type="text" name="alamat" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="alamat" required="">
            </div>

            <div class="mb-6">
                <input type="number" name="telp" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="telp" required="">
            </div>

            <div class="mb-6">
                <input type="text" name="nama_toko" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="nama toko (hanya untuk penjual)" required="">
            </div>

            <div class="relative mb-6">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
            </div>
            <input datepicker name="tanggal_lahir" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tanggal lahir">
            </div>
            
            <div class="flex items-center mb-4">
                <input type="radio" name="role_id" value="3" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                <label class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                pembeli
                </label>
            </div>

            <div class="flex items-center mb-4">
                <input type="radio" name="role_id" value="2" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                <label class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                penjual
                </label>
            </div>
            <button type="submit" class="text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
            <div class="text-white mt-4 text-sm">
                <a href="<?= base_url(); ?>auth/login">sudah punya akun? login</a>
            </div>
            <div class="text-white mt-4 text-sm">
                <a href="<?= base_url(); ?>home">home</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>

    