<div class="my-6">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Keranjang Belanja</h5>
</div>
<div class=" py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <?php echo form_open('home/update'); ?>
                <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <th scope="col" class="px-6 py-3">QTY</th>
                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                        <th scope="col" class="px-6 py-3" style="text-align:right">Harga</th>
                        <th scope="col" class="px-6 py-3" style="text-align:right">Sub-Total</th>
                        <th scope="col" class="px-6 py-3">Delete</th>
                </thead>
                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items): ?>

                        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 ">
                                        <input name="<?= $i.'[qty]' ?>" class="w-16 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" value="<?= $items['qty'] ?>" min=1>
                                </td>
                                <td class="px-6 py-4">
                                        <?php echo $items['name']; ?>
                                </td>
                                
                                <td class="px-6 py-4" style="text-align:right">Rp <?php echo $this->cart->format_number($items['price'],0,',','.'); ?></td>
                                <td class="px-6 py-4" style="text-align:right">Rp <?php echo $this->cart->format_number($items['subtotal'],0,',','.'); ?></td>
                                <td>
                                        <a href="<?= base_url('home/delete/'.$items['rowid']); ?>" class="self-center bg-red-400 p-2 ml-3 rounded-lg whitespace-nowrap text-black">delete</a>
                                </td>
                        </tr>

                <?php $i++; ?>

                <?php endforeach; ?>

                <tr>
                        <td colspan="2"> </td>
                        <td class="right"><strong>Total:</strong></td>
                        <td class="right">Rp <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>

                </table>
                <button class="ml-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Update Cart</button>
                <a href="<?= base_url('home/checkout'); ?>" class="ml-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">Check Out</a>
        </div>
</div>