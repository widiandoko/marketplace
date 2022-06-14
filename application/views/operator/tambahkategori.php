<div class="mt-3 py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Tambah Kategori</h5>
            <?= form_open_multipart('operator/tambah'); ?>
                <div class="relative mt-3 overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Kategori</label>
                        <input name=nama_kategori type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
        
    
</body>
</html>