<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  <nav class="bg-indigo-600 text-white px-6 py-4 flex justify-between items-center shadow-md">
    <div class="text-xl font-semibold">
      <a href="/" class="hover:text-indigo-300 transition-colors">Aplikasi Buku</a>
    </div>
    <ul class="flex space-x-6 text-base font-medium">
      <li><a href="/buku" class="hover:text-indigo-300 transition-colors">Data Buku</a></li>
      <li><a href="/buku/create" class="hover:text-indigo-300 transition-colors">Tambah Buku</a></li>
      <li><a href="/logout" class="hover:text-indigo-300 transition-colors">Logout</a></li>
    </ul>
  </nav>

  <main class="flex-grow container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Buku</h1>

    <div class="overflow-x-auto bg-white rounded shadow-md">
      <table class="min-w-full text-sm text-gray-700">
        <thead class="bg-gray-200 text-gray-600">
          <tr>
            <th class="px-6 py-3 text-left">Judul</th>
            <th class="px-6 py-3 text-left">Penulis</th>
            <th class="px-6 py-3 text-left">Penerbit</th>
            <th class="px-6 py-3 text-left">Tahun Terbit</th>
            <th class="px-6 py-3 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($buku as $b): ?>
            <tr class="border-t">
              <td class="px-6 py-4"><?= esc($b['judul']) ?></td>
              <td class="px-6 py-4"><?= esc($b['penulis']) ?></td>
              <td class="px-6 py-4"><?= esc($b['penerbit']) ?></td>
              <td class="px-6 py-4"><?= esc($b['tahun_terbit']) ?></td>
              <td class="px-6 py-4">
                <a href="/buku/edit/<?= $b['id'] ?>" class="text-indigo-600 hover:underline mr-4">Edit</a>
                <a href="/buku/delete/<?= $b['id'] ?>" onclick="return confirm('Yakin ingin hapus?')" class="text-red-600 hover:underline">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>
