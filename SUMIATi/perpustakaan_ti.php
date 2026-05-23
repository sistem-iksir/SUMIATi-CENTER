<?php
// 1. Ambil kata kunci pencarian jika ada
$search_keyword = isset($_GET['search']) ? trim($_GET['search']) : '';
$error_message = '';
$books = [];
$page_title = "Rekomendasi Buku TI (Ilmu Komputer)";

// 2. Tentukan Endpoint URL API Open Library
if (!empty($search_keyword)) {
    // Mencari buku berdasarkan kata kunci + spesifik subjek komputer agar tetap relevan dengan TI
    $api_url = "https://openlibrary.org/search.json?q=" . urlencode($search_keyword) . "&subject=computer_science&limit=20";
    $page_title = "Hasil Pencarian TI: \"" . htmlspecialchars($search_keyword) . "\"";
} else {
    // Default: Mengambil buku di rak "Computer Science" (Ilmu Komputer)
    $api_url = "https://openlibrary.org/subjects/computer_science.json?limit=20";
}

// 3. Eksekusi cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 15); // Batas waktu ditambah ke 15 detik karena datanya besar
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    $error_message = "Gagal terhubung ke database Open Library global.";
} else {
    $data = json_decode($response, true);
    
    // 4. Normalisasi Data karena struktur JSON pencarian dan subjek di Open Library agak berbeda
    if (!empty($search_keyword)) {
        // Struktur data dari endpoint pencarian (?q=...)
        if (isset($data['docs']) && is_array($data['docs']) && !empty($data['docs'])) {
            foreach ($data['docs'] as $doc) {
                // Ambil ISBN pertama jika ada untuk merender gambar sampul
                $isbn = isset($doc['isbn'][0]) ? $doc['isbn'][0] : '';
                $books[] = [
                    'title' => $doc['title'],
                    'isbn' => $isbn,
                    // Open Library menyediakan sub-layanan Covers API gratis untuk gambar sampul
                    'image' => !empty($isbn) ? "https://covers.openlibrary.org/b/isbn/{$isbn}-M.jpg" : "https://via.placeholder.com/180x240/111827/06b6d4?text=No+Cover",
                    'url' => isset($doc['key']) ? "https://openlibrary.org" . $doc['key'] : "#"
                ];
            }
        } else {
            $error_message = "Buku TI tidak ditemukan dengan kata kunci tersebut.";
        }
    } else {
        // Struktur data dari endpoint subjek (/subjects/...)
        if (isset($data['works']) && is_array($data['works']) && !empty($data['works'])) {
            foreach ($data['works'] as $work) {
                $cover_id = isset($work['cover_id']) ? $work['cover_id'] : '';
                $books[] = [
                    'title' => $work['title'],
                    'isbn' => isset($work['availability']['isbn']) ? $work['availability']['isbn'] : 'N/A',
                    'image' => !empty($cover_id) ? "https://covers.openlibrary.org/b/id/{$cover_id}-M.jpg" : "https://via.placeholder.com/180x240/111827/06b6d4?text=No+Cover",
                    'url' => isset($work['key']) ? "https://openlibrary.org" . $work['key'] : "#"
                ];
            }
        } else {
            $error_message = "Gagal memuat katalog subjek TI.";
        }
    }
}
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan TI Digital - EduTech Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { background-color: #0b0f19; }</style>
</head>
<body class="text-gray-100 font-sans min-h-screen flex flex-col justify-between">

    <!-- GLOBAL NAVBAR -->
    <header class="border-b border-gray-800 bg-gray-900 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold tracking-wider text-cyan-400 flex items-center gap-2">
                <span>⚡</span> SUMIATi<span class="text-white font-light">CENTER</span>
            </a>
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="index.php" class="text-gray-400 hover:text-cyan-400 transition-colors">Beranda</a>
                <a href="perpustakaan_ti.php" class="text-cyan-400">Perpustakaan TI</a>
                <a href="e-learning.php" class="text-gray-400 hover:text-cyan-400 transition-colors">E-Learning</a>
                <a href="latihan_project.php" class="text-gray-400 hover:text-cyan-400 transition-colors">Latihan Project</a>
                <a href="planning_belajar.php" class="text-gray-400 hover:text-cyan-400 transition-colors">Planning Belajar</a>
            </nav>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="mb-auto">
        <div class="bg-gray-900/40 border-b border-gray-800 py-8 mb-8">
            <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-cyan-400">Perpustakaan TI Digital</h2>
                    <p class="text-xs text-gray-400">Terhubung langsung secara live ke Open Library Global API</p>
                </div>
                
                <!-- Search Bar -->
                <form action="perpustakaan_ti.php" method="GET" class="w-full md:w-1/2 flex gap-2">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari modul (misal: Python, Java, Security...)" 
                        value="<?php echo htmlspecialchars($search_keyword); ?>"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:border-cyan-400 text-sm"
                        required
                    >
                    <button type="submit" class="px-5 py-2 bg-cyan-500 hover:bg-cyan-600 text-gray-950 font-semibold text-sm rounded-lg transition-colors">Cari</button>
                    <?php if (!empty($search_keyword)): ?>
                        <a href="perpustakaan_ti.php" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-sm flex items-center">Reset</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="container mx-auto px-6">
            <h3 class="text-xl font-semibold mb-6 text-gray-300"><?php echo $page_title; ?></h3>
            
            <?php if (!empty($error_message)): ?>
                <div class="bg-red-950/30 border border-red-500/40 text-red-200 p-4 rounded-lg text-center my-6 max-w-xl mx-auto">
                    ⚠️ <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <!-- GRID KATALOG BUKU -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php if (empty($error_message)): ?>
                    <?php foreach ($books as $book): ?>
                        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden flex flex-col justify-between group hover:border-cyan-500/30 transition-all">
                            <div class="p-4 bg-gray-950 h-64 flex justify-center items-center overflow-hidden">
                                <img 
                                    src="<?php echo htmlspecialchars($book['image']); ?>" 
                                    alt="Cover Buku" 
                                    class="h-full object-contain group-hover:scale-105 transition-transform duration-300" 
                                    onerror="this.src='https://via.placeholder.com/180x240/111827/06b6d4?text=No+Cover'"
                                    loading="lazy"
                                >
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-sm line-clamp-2 mb-2 text-gray-100 group-hover:text-cyan-400 transition-colors" title="<?php echo htmlspecialchars($book['title']); ?>">
                                    <?php echo htmlspecialchars($book['title']); ?>
                                </h4>
                                <span class="text-[10px] bg-gray-800 text-gray-400 px-2 py-1 rounded font-mono">ID: <?php echo htmlspecialchars(basename($book['url'])); ?></span>
                            </div>
                            <div class="p-4 pt-0 border-t border-gray-800/40 mt-auto flex justify-end">
                                <a href="<?php echo htmlspecialchars($book['url']); ?>" target="_blank" class="text-xs text-cyan-400 hover:underline pt-3">Detail Buku ↗</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- GLOBAL FOOTER -->
    <footer class="border-t border-gray-900 bg-gray-950 py-6 text-center text-xs text-gray-500 mt-12">
        <div class="container mx-auto px-6">
            <p>© 2026 EduTech Center. Powered by Open Library API.</p>
        </div>
    </footer>

</body>
</html>