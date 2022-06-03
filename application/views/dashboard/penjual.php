<div class="p-3 flex">
    <aside class="w-64" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a href="<?= base_url('penjual') ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-symbols-outlined">storefront</span>
                <span class="flex-1 ml-3 whitespace-nowrap">Toko</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('penjual/produk') ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-symbols-outlined">inventory_2</span>
                <span class="flex-1 ml-3 whitespace-nowrap">Produk</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('penjual/penjualan') ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-symbols-outlined">receipt</span>
                <span class="flex-1 ml-3 whitespace-nowrap">Penjualan</span>
                </a>
            </li>
        </ul>
    </div>
    </aside>
    <div class="flex-col w-full h-full ml-3">
        <div class="py-4 px-3 flex flex-row-reverse bg-gray-50 items-center rounded dark:bg-gray-800">
            <a href="<?= base_url('auth/logout') ?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</a>
            <p class="text-white text-base font-normal mr-3">Selamat datang <?= $username; ?></p>
        </div>
    

