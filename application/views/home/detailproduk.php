<div class="my-6">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Detail Produk</h5>
</div>
<div class="mb-5 py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
<?php 
foreach ($produk as $p) { 
    echo form_open('home/add');
        echo form_hidden('id',$p->id_produk);
        echo form_hidden('price',$p->harga_produk);
        echo form_hidden('name',$p->nama_produk);
        echo form_hidden('berat',$p->berat);
        echo form_hidden('username',$p->username);
        echo form_hidden('redirect_page',str_replace('index.php','',current_url()));
?>
    <div class="flex mt-3">
        <div class="w-1/2">
            <img class="mb-5 object-cover rounded-t-lg" src="<?= base_url(); ?>uploads/<?php echo $p->gambar_produk; ?>" alt="product image">
        </div>
        <div class="w-1/2">
            <div class="font-bold text-white text-4xl mb-5"><?= $p->nama_produk ?></div>
            <div class="text-gray-200 text-2xl mb-5"><?= $p->deskripsi_produk ?></div>
            <div class="text-gray-200 text-2xl mb-5"><?php echo "Rp ".number_format($p->harga_produk,0,',','.'); ?></div>
            <div class="flex">
                <input name="qty" class="w-16 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="number" value="1" min=1>
                <button href="" class="self-center ml-3 bg-yellow-200 border-gray-600 p-2 rounded-md whitespace-nowrap">
                    keranjang
                </button>
            </div>
        </div>
    </div>
    
<?php } ?>
</div>