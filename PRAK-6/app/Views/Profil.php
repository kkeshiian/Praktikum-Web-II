<div class="flex justify-center items-center mt-10">
    <div class="bg-white shadow-xl rounded-xl w-full max-w-3xl p-8">
        <div class="flex flex-col items-center text-center">
            <img src="<?= base_url('asset/' . $mahasiswa['gambar']) ?>" alt="Profile Picture"
                class="w-36 h-36 rounded-full shadow-md border-4 border-blue-500 object-cover mb-4">
            <h2 class="text-2xl font-bold text-gray-800"><?= $mahasiswa['nama'] ?></h2>
            <p class="text-sm text-gray-500"><?= $mahasiswa['nim'] ?> | <?= $mahasiswa['prodi'] ?></p>
        </div>

        <div class="mt-6 border-t pt-4">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Tentang Saya</h3>
            <p class="text-gray-600 mb-4"><?= $mahasiswa['hobi'] ?></p>

            <h3 class="text-lg font-semibold text-gray-700 mb-2">Keahlian</h3>
            <div class="flex flex-wrap gap-2 mb-4">
                <?php foreach ($mahasiswa['skill'] as $skill): ?>
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm rounded-full"><?= $skill ?></span>
                <?php endforeach; ?>
            </div>
        </div>
        <h3 class="text-lg font-semibold text-gray-700 mb-4 mt-6">Portfolio Projects</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <img src="<?= base_url('asset/' . $mahasiswa['greenwatch']) ?>" alt="greenwatch" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h4 class="text-md font-bold text-gray-800 mb-1">GreenWatch</h4>
                    <p class="text-sm text-gray-600">Sistem website untuk monitoring kondisi greenhouse secara real-time.</p>
                </div>
            </div>
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <img src="<?= base_url('asset/' . $mahasiswa['coldstorage']) ?>" alt="greenwatch" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h4 class="text-md font-bold text-gray-800 mb-1">Sistem Monitoring Cold Storage</h4>
                    <p class="text-sm text-gray-600">Sistem website untuk monitoring kondisi kulkas penyimpanan secara real-time.</p>
                </div>
            </div>
        </div>
    </div>
</div>
