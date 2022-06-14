<div class="mt-3 py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Detail Transaksi</h5>
    <?php foreach ($transaksi as $t) { ?>
    <div class="text-lg my-3 text-gray-300">
        <strong>No Order:</strong> <?php echo $t->no_order; ?>       
    </div>
    <div class="text-lg my-3 text-gray-300">
        <strong>Total Pembayaran:</strong> <?php echo "Rp ".number_format($t->total_harga,0,',','.'); ?>       
    </div>
    <div class="text-lg my-3 text-gray-300">
        <strong>Nama Penerima:</strong> <?php echo $t->nama_penerima; ?>     
    </div>
    <div class="text-lg my-3 text-gray-300">
        <strong>No Penerima:</strong> <?php echo $t->no_penerima; ?>     
    </div>
    <div class="text-lg my-3 text-gray-300">
        <strong>Alamat:</strong> <?php echo $t->alamat; ?>     
    </div>
    <div class="text-lg my-3 text-gray-300">
        <strong>Status:</strong>    <?php 
                                        if($t->status==0){
                                            echo 'belum dibayar';
                                        }else{
                                            echo 'sudah dibayar';
                                        }                  
                                    ?>     
    </div>
    
        <div class="relative w-96 overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            qty
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($detail_transaksi as $d) { ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <?php echo $d->nama_produk; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $d->qty; ?>
                        </td>
                    </tr>              
                <?php } ?>
                </tbody>
            </table>
        </div>
    
<?php } ?>
</div>