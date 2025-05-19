<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Masuk ke Akun Anda</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="mb-4 text-red-600 bg-red-100 p-3 rounded">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="POST" class="space-y-6">
            <div>
                <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Masukkan username"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Masukkan password"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition-colors font-semibold"
            >
                Login
            </button>
        </form>
    </div>
</body>
</html>