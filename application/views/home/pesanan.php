<div class="my-6">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Pesanan Saya</h5>
</div>
<div class=" py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No Order
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Pembayaran
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Penerima
                </th>
                <th scope="col" class="px-6 py-3">
                    No Penerima
                </th>
                <th scope="col" class="px-6 py-3">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    detail
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($transaksi as $t) { ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    <?php echo $t->no_order; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo "Rp ".number_format($t->total_harga,0,',','.'); ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $t->nama_penerima; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $t->no_penerima; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $t->alamat; ?>
                </td>
                <td class="px-6 py-4">
                    <?php 
                        if($t->status==0){
                            echo 'belum dibayar';
                        }else{
                            echo 'sudah dibayar';
                        }                  
                    ?>
                </td>
                <td class="px-6 py-4">
                    <a href="<?php echo base_url('home/detailtransaksi/'.$t->no_order) ?>">detail</a>
                </td>
                
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</div>