<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTech Center - Platform Belajar TI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0b0f19; }
    </style>
</head>
<body class="text-gray-100 font-sans min-h-screen flex flex-col justify-between">

    <!-- GLOBAL NAVBAR -->
    <header class="border-b border-gray-800 bg-gray-900 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold tracking-wider text-cyan-400 flex items-center gap-2">
                <span>⚡</span> SUMIATi<span class="text-white font-light">CENTER</span>
            </a>
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="index.php" class="text-cyan-400">Beranda</a>
                <a href="perpustakaan_ti.php" class="text-gray-400 hover:text-cyan-400 transition-colors">Perpustakaan TI</a>
                <a href="e-learning.php" class="text-gray-400 hover:text-cyan-400 transition-colors">E-Learning</a>
                <a href="latihan_project.php" class="text-gray-400 hover:text-cyan-400 transition-colors">Latihan Project</a>
                <a href="planning_belajar.php" class="text-gray-400 hover:text-cyan-400 transition-colors">Planning Belajar</a>
            </nav>
        </div>
    </header>

    <!-- MAIN DASHBOARD CONTENT -->
    <main class="mb-auto">
        <!-- Hero Dashboard -->
        <section class="bg-gradient-to-b from-gray-900 to-[#0b0f19] py-16 border-b border-gray-900 text-center">
            <div class="container mx-auto px-6 max-w-3xl">
                <span class="px-3 py-1 text-xs font-mono bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 rounded-full uppercase tracking-widest">Dashboard Student</span>
                <h1 class="text-4xl md:text-5xl font-extrabold mt-4 mb-4">Selamat Datang di SUMIATi</h1>
                 <p class="text-blue-400 text-base md:text-lg font-medium">- Sumber Materi Edukasi Mahasiswa TI -</p>
                <p class="text-gray-400 text-base md:text-lg">Silakan pilih modul ekosistem pembelajaran digital Anda di bawah ini untuk memulai.</p>
            </div>
        </section>

        <!-- Grid 4 Card Menu Utama -->
        <section class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Card 1: Perpustakaan TI -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex flex-col justify-between hover:border-cyan-500/50 hover:shadow-lg hover:shadow-cyan-500/5 transition-all group">
                    <div>
                        <div class="text-3xl mb-4 bg-gray-800 w-12 h-12 flex items-center justify-center rounded-lg text-cyan-400">📚</div>
                        <h3 class="text-xl font-bold mb-2 group-hover:text-cyan-400 transition-colors">Perpustakaan TI</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">E-book teknologi terlengkap yang terintegrasi langsung dengan database API global.</p>
                    </div>
                    <a href="perpustakaan_ti.php" class="text-sm text-cyan-400 font-semibold flex items-center gap-1 group-hover:underline">Buka Perpustakaan →</a>
                </div>

                <!-- Card 2: E-Learning -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex flex-col justify-between hover:border-purple-500/50 hover:shadow-lg hover:shadow-purple-500/5 transition-all group">
                    <div>
                        <div class="text-3xl mb-4 bg-gray-800 w-12 h-12 flex items-center justify-center rounded-lg text-purple-400">🎓</div>
                        <h3 class="text-xl font-bold mb-2 group-hover:text-purple-400 transition-colors">E-Learning</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">Kelas online interaktif, video tutorial coding, dan modul materi terstruktur.</p>
                    </div>
                    <a href="e-learning.php" class="text-sm text-purple-400 font-semibold flex items-center gap-1 group-hover:underline">Mulai Belajar →</a>
                </div>

                <!-- Card 3: Latihan Project -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex flex-col justify-between hover:border-emerald-500/50 hover:shadow-lg hover:shadow-emerald-500/5 transition-all group">
                    <div>
                        <div class="text-3xl mb-4 bg-gray-800 w-12 h-12 flex items-center justify-center rounded-lg text-emerald-400">🛠️</div>
                        <h3 class="text-xl font-bold mb-2 group-hover:text-emerald-400 transition-colors">Latihan Project</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">Uji kemampuan koding Anda dengan studi kasus dunia kerja dan proyek nyata.</p>
                    </div>
                    <a href="latihan_project.php" class="text-sm text-emerald-400 font-semibold flex items-center gap-1 group-hover:underline">Lihat Brief Proyek →</a>
                </div>

                <!-- Card 4: Planning Belajar -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex flex-col justify-between hover:border-amber-500/50 hover:shadow-lg hover:shadow-amber-500/5 transition-all group">
                    <div>
                        <div class="text-3xl mb-4 bg-gray-800 w-12 h-12 flex items-center justify-center rounded-lg text-amber-400">🗺️</div>
                        <h3 class="text-xl font-bold mb-2 group-hover:text-amber-400 transition-colors">Planning Belajar</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4">Gambarkan roadmap belajar Anda dari level pemula hingga siap kerja.</p>
                    </div>
                    <a href="planning_belajar.php" class="text-sm text-amber-400 font-semibold flex items-center gap-1 group-hover:underline">Atur Jadwal →</a>
                </div>

            </div>
        </section>
    </main>

    <!-- GLOBAL FOOTER -->
    <footer class="border-t border-gray-900 bg-gray-950 py-6 text-center text-xs text-gray-500 mt-12">
        <div class="container mx-auto px-6">
            <p>© 2026 EduTech Center. All rights reserved. Tema Desain: Cyber Dark Matte UI.</p>
        </div>
    </footer>

</body>
</html>