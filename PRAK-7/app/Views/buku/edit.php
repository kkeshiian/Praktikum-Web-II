<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">Edit Buku</h1>

    <?php if (isset($validation)) : ?>
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <?= $validation->listErrors() ?>
    </div>
    <?php endif; ?>

    <form method="post" action="/buku/update/<?= $buku['id'] ?>" class="space-y-5">
        <input
            type="text"
            name="judul"
            placeholder="Judul"
            value="<?= old('judul', $buku['judul'] ?? '') ?>"
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            required
        />
        <input
            type="text"
            name="penulis"
            placeholder="Penulis"
            value="<?= old('penulis', $buku['penulis'] ?? '') ?>"
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            required
        />
        <input
            type="text"
            name="penerbit"
            placeholder="Penerbit"
            value="<?= old('penerbit', $buku['penerbit'] ?? '') ?>"
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            required
        />
        <input
            type="number"
            name="tahun_terbit"
            placeholder="Tahun Terbit"
            value="<?= old('tahun_terbit', $buku['tahun_terbit'] ?? '') ?>"
            min="1801"
            max="<?= date('Y') ?>"
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
            required
        />

        <button
            type="submit"
            class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded font-semibold transition"
        >
            Update
        </button>
    </form>
</div>

</body>
</html>
