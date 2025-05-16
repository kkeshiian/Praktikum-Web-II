    <!-- Hero Section -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold text-blue-700 mb-4">Halo, Saya <?= $mahasiswa['nama'] ?></h1>
            <p class="text-gray-600 text-xl mb-6">Mahasiswa <?= $mahasiswa['prodi'] ?> | NIM: <?= $mahasiswa['nim'] ?></p>
            <a href="<?= base_url('/profil') ?>" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-blue-700 transition">Lihat Profil</a>
        </div>
    </section>

    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Keahlian Saya</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <?php foreach ($mahasiswa['skill'] as $skill): ?>
                    <div class="bg-blue-100 text-blue-700 px-5 py-3 rounded-full text-sm font-semibold shadow hover:bg-blue-200 transition"><?= $skill ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-blue-600 py-16 text-white text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-4">Ini tahu lebih lanjut?</h2>
            <p class="mb-6 text-lg">Kunjungi halaman profil saya untuk mengenal saya lebih lanjut.</p>
            <a href="<?= base_url('/profil') ?>" class="bg-white text-blue-600 px-6 py-3 rounded-full text-lg font-semibold hover:bg-gray-100 transition">Lihat Profil Lengkap</a>
        </div>
    </section>
