<?php
// 1. Masukkan API Key Google Anda di sini
$api_key = "AIzaSyCdqXlDQEV7NBZ-dsO5mwwWXNtgOTmwHpg"; 

$search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
$error_message = '';
$courses = [];
$page_title = "Rekomendasi Kelas TI Terbaru";

// Jika user tidak mencari apapun, pasang default pencarian ke tutorial dasar pemrograman
$query_to_api = !empty($search_query) ? $search_query : "belajar pemrograman dasar indonesia";

// 2. Setup URL API YouTube (menyaring video, durasi di atas 20 menit agar berupa course, max 12 hasil)
$api_url = "https://www.googleapis.com/youtube/v3/search?" . http_build_query([
    'part'       => 'snippet',
    'q'          => $query_to_api . " tutorial", // Menambahkan kata tutorial agar relevan
    'type'       => 'video',
    'videoDuration' => 'long', // Hanya mengambil video berdurasi panjang (> 20 menit)
    'maxResults' => 12,
    'key'        => $api_key
]);

// 3. Eksekusi Request ke API YouTube menggunakan cURL
if ($api_key !== "PASTE_YOUR_YOUTUBE_API_KEY_HERE") {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_message = "Gagal terhubung ke server video pembelajaran.";
    } else {
        $data = json_decode($response, true);
        
        if (isset($data['items']) && is_array($data['items']) && !empty($data['items'])) {
            foreach ($data['items'] as $item) {
                $courses[] = [
                    'id'          => $item['id']['videoId'],
                    'title'       => $item['snippet']['title'],
                    'channel'     => $item['snippet']['channelTitle'],
                    'description' => $item['snippet']['description'],
                    'image'       => $item['snippet']['thumbnails']['high']['url'],
                    'published'   => date("d M Y", strtotime($item['snippet']['publishedAt']))
                ];
            }
            if(!empty($search_query)) {
                $page_title = "Hasil Pencarian Video: \"" . htmlspecialchars($search_query) . "\"";
            }
        } else {
            $error_message = "Tidak ada video tutorial TI yang ditemukan atau kuota API habis.";
        }
    }
    curl_close($ch);
} else {
    // Pesan jika API Key belum dipasang oleh developer
    $error_message = "Sistem E-Learning belum dikonfigurasi. Mohon masukkan YouTube API Key Anda pada baris kode nomor 4.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning - EduTech Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { background-color: #060913; }</style>
</head>
<body class="text-gray-100 font-sans min-h-screen flex flex-col justify-between">

    <!-- GLOBAL NAVBAR -->
    <header class="border-b border-gray-800 bg-gray-900/80 backdrop-blur-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold tracking-wider text-purple-400 flex items-center gap-2">
                <span>⚡</span> SUMIATi<span class="text-white font-light">CENTER</span>
            </a>
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="index.php" class="text-gray-400 hover:text-purple-400 transition-colors">Beranda</a>
                <a href="perpustakaan_ti.php" class="text-gray-400 hover:text-purple-400 transition-colors">Perpustakaan TI</a>
                <a href="e-learning.php" class="text-purple-400 border-b-2 border-purple-500 pb-1">E-Learning</a>
                <a href="latihan_project.php" class="text-gray-400 hover:text-purple-400 transition-colors">Latihan Project</a>
                <a href="planning_belajar.php" class="text-gray-400 hover:text-purple-400 transition-colors">Planning Belajar</a>
            </nav>
        </div>
    </header>

    <!-- HERO SECTION SEARCH -->
    <main class="mb-auto">
        <div class="relative overflow-hidden bg-gradient-to-b from-purple-950/20 via-transparent to-transparent py-16 border-b border-gray-900">
            <div class="container mx-auto px-6 text-center max-w-3xl">
                <span class="px-3 py-1 bg-purple-500/10 border border-purple-500/30 text-purple-400 rounded-full text-xs font-mono tracking-widest uppercase">Live YouTube API Stream</span>
                <h1 class="text-4xl md:text-5xl font-extrabold mt-4 mb-4 bg-gradient-to-r from-white to-purple-400 bg-clip-text text-transparent">Kelas Video Interaktif</h1>
                
                <form action="e-learning.php" method="GET" class="bg-gray-900 border border-gray-800 p-2.5 rounded-2xl flex gap-2 max-w-xl mx-auto shadow-2xl mt-6">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari materi (misal: Python, React, Cyber Security...)" 
                        value="<?php echo htmlspecialchars($search_query); ?>"
                        class="w-full bg-transparent px-4 py-2 text-sm text-gray-200 focus:outline-none"
                        required
                    >
                    <button type="submit" class="bg-purple-600 hover:bg-purple-500 text-white font-semibold text-sm px-5 py-2 rounded-xl transition-colors">Cari</button>
                    <?php if (!empty($search_query)): ?>
                        <a href="e-learning.php" class="bg-gray-800 hover:bg-gray-700 text-sm px-4 py-2 rounded-xl flex items-center">Reset</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <!-- GRID VIDEO TUTORIAL -->
        <div class="container mx-auto px-6 py-12">
            <h3 class="text-xl font-semibold mb-8 text-gray-300"><?php echo $page_title; ?></h3>
            
            <?php if (!empty($error_message)): ?>
                <div class="bg-purple-950/30 border border-purple-500/40 text-purple-200 p-4 rounded-xl text-center my-6 max-w-xl mx-auto text-sm">
                    💡 <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($courses as $course): ?>
                    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden flex flex-col justify-between group hover:border-purple-500/40 transition-all duration-300">
                        
                        <!-- Video Thumbnail -->
                        <div class="relative aspect-video bg-gray-950 overflow-hidden">
                            <img src="<?php echo $course['image']; ?>" alt="Thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-90">
                            <span class="absolute bottom-2 right-2 bg-purple-600 text-[10px] text-white font-bold px-2 py-0.5 rounded uppercase font-mono tracking-wider shadow">Full Course</span>
                        </div>

                        <!-- Video Info -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="font-bold text-sm text-gray-100 group-hover:text-purple-400 transition-colors line-clamp-2 leading-snug mb-2" title="<?php echo htmlspecialchars($course['title']); ?>">
                                    <?php echo htmlspecialchars($course['title']); ?>
                                </h4>
                                <p class="text-xs text-purple-400 font-medium mb-3">🎬 Channel: <?php echo htmlspecialchars($course['channel']); ?></p>
                                <p class="text-gray-400 text-xs line-clamp-2 leading-relaxed mb-4"><?php echo htmlspecialchars($course['description']); ?></p>
                            </div>

                            <div class="pt-4 border-t border-gray-800/60 flex items-center justify-between">
                                <span class="text-[11px] text-gray-500 font-mono">📅 <?php echo $course['published']; ?></span>
                                <!-- Membuka Link Player YouTube Langsung -->
                                <a href="https://www.youtube.com/watch?v=<?php echo $course['id']; ?>" target="_blank" class="px-4 py-2 bg-purple-600/10 border border-purple-500/30 text-purple-400 hover:bg-purple-600 hover:text-white text-xs font-semibold rounded-xl transition-all flex items-center gap-1">
                                    Tonton Kelas <span>➔</span>
                                </a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <!-- GLOBAL FOOTER -->
    <footer class="border-t border-gray-900 bg-gray-950 py-6 text-center text-xs text-gray-500 mt-12">
        <div class="container mx-auto px-6">
            <p>© 2026 EduTech Center. Powered by YouTube Global Network API.</p>
        </div>
    </footer>

</body>
</html>