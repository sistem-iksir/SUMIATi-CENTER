<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Project & Mini Games - EduTech Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #060913; }
        .emerald-glow { box-shadow: 0 0 20px rgba(16, 185, 129, 0.1); }
    </style>
</head>
<body class="text-gray-100 font-sans min-h-screen flex flex-col justify-between">

    <header class="border-b border-gray-800 bg-gray-900/80 backdrop-blur-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold tracking-wider text-emerald-400 flex items-center gap-2">
                <span>⚡</span> SUMIATi<span class="text-white font-light">CENTER</span>
            </a>
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="index.php" class="text-gray-400 hover:text-emerald-400 transition-colors">Beranda</a>
                <a href="perpustakaan_ti.php" class="text-gray-400 hover:text-emerald-400 transition-colors">Perpustakaan TI</a>
                <a href="e-learning.php" class="text-gray-400 hover:text-emerald-400 transition-colors">E-Learning</a>
                <a href="latihan_project.php" class="text-emerald-400 border-b-2 border-emerald-500 pb-1">Latihan Project</a>
                <a href="planning_belajar.php" class="text-gray-400 hover:text-emerald-400 transition-colors">Planning Belajar</a>
            </nav>
        </div>
    </header>

    <main class="mb-auto">
        <div class="relative overflow-hidden bg-gradient-to-b from-emerald-950/20 via-transparent to-transparent py-12 border-b border-gray-900">
            <div class="container mx-auto px-6 text-center max-w-3xl">
                <span class="px-3 py-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-full text-xs font-mono tracking-widest uppercase">Sandbox & Coding Arena</span>
                <h1 class="text-4xl md:text-5xl font-extrabold mt-4 mb-4 bg-gradient-to-r from-white to-emerald-400 bg-clip-text text-transparent">Latihan Proyek & Mini Games</h1>
                <p class="text-gray-400 text-sm md:text-base max-w-xl mx-auto">
                    Pertajam insting koding Anda melalui repositori studi kasus dunia kerja atau uji ketelitian dengan mini game interaktif di bawah ini.
                </p>
            </div>
        </div>

        <div class="container mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <h3 class="text-xl font-bold border-l-4 border-emerald-500 pl-3 text-gray-200 mb-6">📁 Repositori Proyek Mandiri</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 flex flex-col justify-between group hover:border-emerald-500/40 transition-all">
                        <div>
                            <div class="flex justify-between items-start mb-3">
                                <span class="bg-blue-500/10 border border-blue-500/30 text-blue-400 text-[10px] uppercase font-mono px-2 py-0.5 rounded">Frontend</span>
                                <span class="text-xs text-gray-500 font-mono">⏱️ 3 Hari</span>
                            </div>
                            <h4 class="font-bold text-gray-200 group-hover:text-emerald-400 transition-colors mb-2">E-Commerce Katalog dengan Tailwind</h4>
                            <p class="text-gray-400 text-xs line-clamp-3 leading-relaxed mb-4">Buat antarmuka responsif toko online lengkap dengan fitur filter kategori, keranjang belanja (Local Storage), dan dark mode toggle.</p>
                        </div>
                        <a href="https://github.com/mdn/learning-area" target="_blank" class="w-full text-center py-2 bg-gray-950 hover:bg-emerald-600 text-emerald-400 group-hover:text-white border border-gray-800 group-hover:border-emerald-500 text-xs font-semibold rounded-xl transition-all">Ambil Brief Proyek</a>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 flex flex-col justify-between group hover:border-emerald-500/40 transition-all">
                        <div>
                            <div class="flex justify-between items-start mb-3">
                                <span class="bg-purple-500/10 border border-purple-500/30 text-purple-400 text-[10px] uppercase font-mono px-2 py-0.5 rounded">Backend</span>
                                <span class="text-xs text-gray-500 font-mono">⏱️ 5 Hari</span>
                            </div>
                            <h4 class="font-bold text-gray-200 group-hover:text-emerald-400 transition-colors mb-2">RESTful API Sistem Presensi Absensi</h4>
                            <p class="text-gray-400 text-xs line-clamp-3 leading-relaxed mb-4">Bangun struktur backend kokoh menggunakan Node.js/PHP untuk manajemen data karyawan, pencatatan waktu masuk, dan JWT Auth.</p>
                        </div>
                        <a href="https://github.com/mdn/learning-area" target="_blank" class="w-full text-center py-2 bg-gray-950 hover:bg-emerald-600 text-emerald-400 group-hover:text-white border border-gray-800 group-hover:border-emerald-500 text-xs font-semibold rounded-xl transition-all">Ambil Brief Proyek</a>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 flex flex-col justify-between group hover:border-emerald-500/40 transition-all">
                        <div>
                            <div class="flex justify-between items-start mb-3">
                                <span class="bg-amber-500/10 border border-amber-500/30 text-amber-400 text-[10px] uppercase font-mono px-2 py-0.5 rounded">Mobile</span>
                                <span class="text-xs text-gray-500 font-mono">⏱️ 7 Hari</span>
                            </div>
                            <h4 class="font-bold text-gray-200 group-hover:text-emerald-400 transition-colors mb-2">Aplikasi Pengingat Tugas & Kuis TI</h4>
                            <p class="text-gray-400 text-xs line-clamp-3 leading-relaxed mb-4">Integrasikan Flutter/React Native dengan notifikasi lokal berkala untuk melatih manajemen state aplikasi mobile yang kompleks.</p>
                        </div>
                        <a href="https://github.com/mdn/learning-area" target="_blank" class="w-full text-center py-2 bg-gray-950 hover:bg-emerald-600 text-emerald-400 group-hover:text-white border border-gray-800 group-hover:border-emerald-500 text-xs font-semibold rounded-xl transition-all">Ambil Brief Proyek</a>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5 flex flex-col justify-between group hover:border-emerald-500/40 transition-all">
                        <div>
                            <div class="flex justify-between items-start mb-3">
                                <span class="bg-rose-500/10 border border-rose-500/30 text-rose-400 text-[10px] uppercase font-mono px-2 py-0.5 rounded">Cyber Security</span>
                                <span class="text-xs text-gray-500 font-mono">⏱️ 2 Hari</span>
                            </div>
                            <h4 class="font-bold text-gray-200 group-hover:text-emerald-400 transition-colors mb-2">Audit & Penetrasi Celah SQL Injection</h4>
                            <p class="text-gray-400 text-xs line-clamp-3 leading-relaxed mb-4">Disediakan web rentan simulasi untuk diaudit. Amankan kode query SQL tersebut menggunakan metode prepared statements.</p>
                        </div>
                        <a href="https://github.com/mdn/learning-area" target="_blank" class="w-full text-center py-2 bg-gray-950 hover:bg-emerald-600 text-emerald-400 group-hover:text-white border border-gray-800 group-hover:border-emerald-500 text-xs font-semibold rounded-xl transition-all">Ambil Brief Proyek</a>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-xl font-bold border-l-4 border-emerald-500 pl-3 text-gray-200 mb-6">🎮 Mini Game: Bug Hunter</h3>
                
                <div class="bg-gray-900 border border-emerald-500/30 rounded-2xl p-6 emerald-glow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xs font-mono text-emerald-400 bg-emerald-500/10 px-2 py-1 rounded border border-emerald-500/20">Mission #01</span>
                            <span id="score-board" class="text-xs font-mono font-bold text-amber-400">Skor: 0</span>
                        </div>
                        
                        <p class="text-xs text-gray-400 mb-3 leading-relaxed">
                            Analisis kode JavaScript di bawah! **Klik langsung pada baris kode yang mengandung kesalahan logika/sintaks** agar aplikasi bisa berjalan.
                        </p>

                        <div class="bg-gray-950 p-4 rounded-xl font-mono text-xs border border-gray-800 space-y-1.5 select-none my-4">
                            <div onclick="checkBug(1)" class="hover:bg-gray-900 p-1 rounded cursor-pointer transition-colors flex"><span class="text-gray-600 w-5 block text-right mr-3">1</span> <span class="text-purple-400">function</span> <span class="text-blue-400">hitungLuas</span>(p, l) {</div>
                            <div onclick="checkBug(2)" id="target-bug" class="hover:bg-gray-900 p-1 rounded cursor-pointer transition-colors flex"><span class="text-gray-600 w-5 block text-right mr-3">2</span> <span class="text-purple-400">return</span> p * * l; <span class="text-gray-500">// <-- Baris ini?</span></div>
                            <div onclick="checkBug(3)" class="hover:bg-gray-900 p-1 rounded cursor-pointer transition-colors flex"><span class="text-gray-600 w-5 block text-right mr-3">3</span> }</div>
                            <div onclick="checkBug(4)" class="hover:bg-gray-900 p-1 rounded cursor-pointer transition-colors flex"><span class="text-gray-600 w-5 block text-right mr-3">4</span> console.<span class="text-blue-400">log</span>(hitungLuas(5, 4));</div>
                        </div>

                        <div id="game-feedback" class="text-center py-2 rounded-xl text-xs font-medium hidden"></div>
                    </div>

                    <button onclick="resetGame()" id="btn-next" class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-500 text-gray-950 font-bold text-xs rounded-xl transition-colors mt-2 uppercase tracking-wider hidden">
                        Main Lagi / Misi Baru
                    </button>
                </div>
            </div>

        </div>
    </main>

    <script>
        let score = 0;

        function checkBug(lineNumber) {
            const feedback = document.getElementById('game-feedback');
            const targetLine = document.getElementById('target-bug');
            const btnNext = document.getElementById('btn-next');
            const scoreBoard = document.getElementById('score-board');

            if (lineNumber === 2) {
                // Berhasil menemukan bug
                score += 10;
                scoreBoard.innerText = "Skor: " + score;
                targetLine.classList.remove('hover:bg-gray-900');
                targetLine.classList.add('bg-emerald-950/50', 'text-emerald-400', 'border', 'border-emerald-500/30');
                
                feedback.innerText = "🎉 Sempurna! Anda menemukan bug (Double operator perkalian '**').";
                feedback.className = "text-center py-2 rounded-xl text-xs font-medium bg-emerald-500/10 text-emerald-400 block my-3 border border-emerald-500/20";
                btnNext.classList.remove('hidden');
            } else {
                // Salah baris
                feedback.innerText = "❌ Kurang tepat! Baris tersebut sudah bersih dari bug. Periksa lagi.";
                feedback.className = "text-center py-2 rounded-xl text-xs font-medium bg-red-500/10 text-red-400 block my-3 border border-red-500/20";
            }
        }

        function resetGame() {
            const feedback = document.getElementById('game-feedback');
            const targetLine = document.getElementById('target-bug');
            const btnNext = document.getElementById('btn-next');
            
            feedback.classList.add('hidden');
            btnNext.classList.add('hidden');
            targetLine.className = "hover:bg-gray-900 p-1 rounded cursor-pointer transition-colors flex";
        }
    </script>

    <footer class="border-t border-gray-900 bg-gray-950 py-6 text-center text-xs text-gray-500 mt-12">
        <div class="container mx-auto px-6">
            <p>© 2026 EduTech Center. Gamification & Project Sandbox Module.</p>
        </div>
    </footer>

</body>
</html>