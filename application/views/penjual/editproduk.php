<div class="mt-3 py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Edit Produk</h5>
            <?php foreach ($produk as $p) { ?>
            <?= form_open_multipart('penjual/edit/'.$p->id_produk); ?>
                <div class="relative mt-3 overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Produk</label>
                        <input name=nama_produk type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $p->nama_produk; ?>">
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deskripsi Produk</label>
                        <textarea name="deskripsi_produk" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value=""><?php echo $p->deskripsi_produk; ?></textarea>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harga Produk</label>
                        <input name="harga_produk" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $p->harga_produk; ?>">
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gambar Produk</label>
                        <input type="hidden" name="old_gambar_produk" value="<?php echo $p->gambar_produk; ?>">
                        <input name="gambar_produk" id="gambar_produk" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Berat Produk</label>
                        <input name="berat_produk" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $p->berat; ?>">
                    <div class="mb-6">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pilih Kategori</label>
                        <select name="id_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih kategori</option>
                            <?php foreach ($kategori as $k) { ?>
                            <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                </div>
            <?php } ?>
            <?= form_close(); ?>
        </div>
    </div>
</div>
        
    
</body>
</html>