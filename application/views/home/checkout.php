<div class="my-6">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Check Out</h5>
</div>
<div class=" py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    QTY
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Berat (gram)
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            $berat_total = 0;
        ?>
        <?php echo form_open('home/proses_checkout'); ?>
        <?php foreach ($this->cart->contents() as $items): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?php echo $items['qty']; ?>
                </th>
                <td class="px-6 py-4">
                    Rp <?php echo $this->cart->format_number($items['price'],0,',','.'); ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $items['name']; ?>
                </td>
                <td class="px-6 py-4">
                    Rp <?php echo $this->cart->format_number($items['subtotal'],0,',','.'); ?></td>
                </td>
                <td class="px-6 py-4">
                    <?php
                        $berat = $items['berat'];
                        $berat1 = $berat * $items['qty']; 
                        echo $berat1;
                        $berat_total = $berat_total + $berat1;
                        echo form_hidden('username',$items['username']);
                    ?>
                </td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php 
        $no_order = date('Ymd').strtoupper(random_string('alnum',8));
    ?>
</div>
    <div class="text-md my-3 text-gray-300">
    <strong>Total Harga:</strong> Rp <?php echo $this->cart->format_number($this->cart->total()); ?>
    </div>
    <div class="text-md my-3 text-gray-300">
        <?php
            $total_harga = $this->cart->total();
            $ongkir = ($berat_total/1000)*40000;
        ?>
        <strong>Ongkir:</strong> <?php echo 'Rp '.number_format($ongkir,0,',','.'); ?>
    </div>
    <div class="text-md my-3 text-gray-300">
        <strong>Total Pembayaran:</strong> <?php echo 'Rp '.number_format($total_harga + $ongkir,0,',','.');  ?>
    </div>
    <div class="text-md my-3 text-gray-300">
        <strong>No Order:</strong> <?php echo $no_order; ?>
    </div>
    <div class="mb-6 w-96">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Penerima</label>
        <input name=nama_penerima type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-6 w-96">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No HP Penerima</label>
        <input name=no_penerima type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-6 w-96">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat</label>
        <input name=alamat type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <?php
            echo form_hidden('no_order',$no_order);
            echo form_hidden('total_harga',$total_harga + $ongkir);
            echo form_hidden('status',0);
    $i = 1;
        foreach ($this->cart->contents() as $items) {
            echo form_hidden('qty'.$i++,$items['qty']);
        }
    ?>
    <button class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Pesan</button>
</div>