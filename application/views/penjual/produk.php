        <div class="mt-3 py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Produk</h5>
            <div class="relative mt-3 overflow-x-auto shadow-md sm:rounded-lg">
                <a href="<?= base_url('penjual/tambahproduk'); ?>">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                </a>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3 w-96">
                                Deskripsi Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Berat
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $p) { ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <?php echo $p->nama_produk; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $p->deskripsi_produk; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $p->nama_kategori; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo "Rp ".number_format($p->harga_produk,0,',','.'); ?>
                            </td>
                            <td class="px-6 py-4">
                                <img src="<?= base_url(); ?>uploads/<?php echo $p->gambar_produk; ?>" width="90">
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $p->berat; ?>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>penjual/editproduk/<?= $p->id_produk; ?>">edit</a>
                            </td>    
                            <td onclick="javascript: return confirm('anda yakin hapus?')">
                                <a href="<?= base_url(); ?>penjual/deleteproduk/<?= $p->id_produk; ?>">hapus</a>
                            </td>
                            <div></div>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>              
            </div>
        </div>
    </div>
</div>
        
    
</body>
</html>