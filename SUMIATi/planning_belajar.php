<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning Belajar - EduTech Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { background-color: #0b0f19; }</style>
</head>
<body class="text-gray-100 font-sans min-h-screen flex flex-col justify-between">

    <header class="border-b border-gray-800 bg-gray-900 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold tracking-wider text-cyan-400 flex items-center gap-2">
                <span>⚡</span> SUMIATi<span class="text-white font-light">CENTER</span>
            </a>
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="index.php" class="text-gray-400 hover:text-cyan-400 transition-colors">Beranda</a>
                <a href="perpustakaan_ti.php" class="text-gray-400 hover:text-cyan-400 transition-colors">Perpustakaan TI</a>
                <a href="e-learning.php" class="text-gray-400 hover:text-cyan-400 transition-colors">E-Learning</a>
                <a href="latihan_project.php" class="text-gray-400 hover:text-cyan-400 transition-colors">Latihan Project</a>
                <a href="planning_belajar.php" class="text-amber-400">Planning Belajar</a>
            </nav>
        </div>
    </header>

    <main class="mb-auto container mx-auto px-6 py-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-amber-400 flex items-center gap-2">
                    <span>🗺️</span> Study Planning Dashboard
                </h1>
                <p class="text-gray-400 text-sm mt-1">Kelola target belajar, subjek TI, dan pantau progres belajarmu secara personal.</p>
            </div>
            
            <div class="bg-gray-900 border border-gray-800 p-4 rounded-xl flex items-center gap-4 w-full md:w-auto">
                <div class="relative flex items-center justify-center">
                    <svg class="w-16 h-16 transform -rotate-90">
                        <circle cx="32" cy="32" r="28" stroke="currentColor" class="text-gray-800" stroke-width="6" fill="transparent" />
                        <circle cx="32" cy="32" r="28" stroke="currentColor" class="text-amber-500" stroke-width="6" fill="transparent" 
                                stroke-dasharray="175" id="progressCircle" stroke-dashoffset="175" />
                    </svg>
                    <span class="absolute text-sm font-bold" id="progressText">0%</span>
                </div>
                <div>
                    <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Progres</h4>
                    <p class="text-xl font-bold text-white" id="progressCount">0/0 Target</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl border-t-4 border-amber-500 h-fit">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2" id="formTitle">
                    <span>➕</span> Tambah Plan Baru
                </h3>
                
                <form id="planForm" onsubmit="savePlan(event)" class="space-y-4">
                    <input type="hidden" id="planId">
                    
                    <div>
                        <label class="block text-xs text-gray-400 font-medium mb-1">Nama Target / Materi</label>
                        <input type="text" id="planTitle" required placeholder="Contoh: Belajar Subnetting & IP Address" 
                               class="w-full bg-gray-950 border border-gray-800 rounded-lg px-3 py-2 text-sm text-gray-100 focus:outline-none focus:border-amber-500">
                    </div>
                    
                    <div>
                        <label class="block text-xs text-gray-400 font-medium mb-1">Kategori / Subjek</label>
                        <select id="planCategory" class="w-full bg-gray-950 border border-gray-800 rounded-lg px-3 py-2 text-sm text-gray-100 focus:outline-none focus:border-amber-500">
                            <option value="Jaringan & Keamanan">Jaringan & Keamanan (Cybersec/OSI)</option>
                            <option value="Web Development">Web Development (Frontend/Backend)</option>
                            <option value="Pemrograman Dasar">Pemrograman Dasar (Python/C++)</option>
                            <option value="Data Science & AI">Data Science & AI (OpenCV/ML)</option>
                        </select>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs text-gray-400 font-medium mb-1">Target Selesai</label>
                            <input type="date" id="planDeadline" required 
                                   class="w-full bg-gray-950 border border-gray-800 rounded-lg px-3 py-2 text-sm text-gray-100 focus:outline-none focus:border-amber-500">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 font-medium mb-1">Prioritas</label>
                            <select id="planPriority" class="w-full bg-gray-950 border border-gray-800 rounded-lg px-3 py-2 text-sm text-gray-100 focus:outline-none focus:border-amber-500">
                                <option value="Tinggi">🔴 Tinggi</option>
                                <option value="Sedang">🟡 Sedang</option>
                                <option value="Rendah">🟢 Rendah</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" id="btnSubmit" 
                            class="w-full py-2.5 bg-amber-500 hover:bg-amber-600 text-gray-950 font-bold rounded-lg text-sm transition-colors mt-2">
                        Simpan Planning
                    </button>
                    <button type="button" id="btnCancel" onclick="resetForm()" 
                            class="w-full py-2 bg-gray-800 hover:bg-gray-700 text-gray-400 rounded-lg text-xs transition-colors hidden">
                        Batal Edit
                    </button>
                </form>
            </div>

            <div class="lg:col-span-2 space-y-4">
                <div class="bg-gray-900 border border-gray-800 p-4 rounded-xl flex flex-wrap gap-2 items-center justify-between">
                    <span class="text-xs text-gray-400 font-medium">Filter Kategori:</span>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="filterPlans('Semua')" class="px-3 py-1 text-xs rounded-full font-medium bg-amber-500 text-gray-950" id="filter-Semua">Semua</button>
                        <button onclick="filterPlans('Jaringan & Keamanan')" class="px-3 py-1 text-xs rounded-full font-medium bg-gray-800 text-gray-400 hover:bg-gray-700" id="filter-Jaringan">Networking</button>
                        <button onclick="filterPlans('Web Development')" class="px-3 py-1 text-xs rounded-full font-medium bg-gray-800 text-gray-400 hover:bg-gray-700" id="filter-Web">Web Dev</button>
                    </div>
                </div>

                <div id="plansContainer" class="space-y-3"></div>
            </div>
        </div>

        <div class="mt-16 border-t border-gray-900 pt-10">
            <h2 class="text-xl font-bold text-gray-300 mb-6 flex items-center gap-2">
                <span>💡</span> Tech Learner Motivation Hub
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl relative overflow-hidden group hover:border-amber-500/50 transition-all">
                    <div class="absolute top-0 right-0 p-4 opacity-10 text-6xl font-mono select-none group-hover:scale-110 transition-transform">
                        &lt;/&gt;
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-amber-500/10 flex items-center justify-center text-amber-400 mb-4 font-bold text-lg">
                        01
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Coding adalah Seni Menolak Menyerah</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        <span class="text-amber-400 font-mono">Error</span> bukan tanda bahwa kamu bodoh. Error adalah cara komputer berkomunikasi bahwa kamu sedikit lagi akan menemukan jawabannya. Setiap <span class="text-cyan-400 font-mono">bug</span> yang kamu perbaiki adalah bukti perkembanganmu.
                    </p>
                </div>

                <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl relative overflow-hidden group hover:border-cyan-500/50 transition-all">
                    <div class="absolute top-0 right-0 p-4 opacity-10 text-6xl font-mono select-none group-hover:scale-110 transition-transform">
                        💾
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-cyan-500/10 flex items-center justify-center text-cyan-400 mb-4 font-bold text-lg">
                        02
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Analogi Sistem Kehidupan</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Jika kamu merasa lelah dan <span class="text-cyan-400 font-mono">stuck</span>, ingatlah bahwa sistem operasi tercanggih pun butuh waktu untuk <span class="text-amber-400 font-mono">reboot</span>. Jangan lakukan <span class="text-red-400 font-mono">shutdown</span> pada impianmu, cukup <span class="text-green-400 font-mono">sleep</span> sebentar.
                    </p>
                </div>

                <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl relative overflow-hidden group hover:border-purple-500/50 transition-all">
                    <div class="absolute top-0 right-0 p-4 opacity-10 text-6xl font-mono select-none group-hover:scale-110 transition-transform">
                        🌐
                    </div>
                    <div class="w-10 h-10 rounded-lg bg-purple-500/10 flex items-center justify-center text-purple-400 mb-4 font-bold text-lg">
                        03
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Menjadi Arsitek Masa Depan</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Dunia tidak kekurangan teknologi, dunia kekurangan orang yang mampu mengendalikannya. Apa yang kamu ulik hari ini—mulai dari <span class="text-purple-400 font-mono">CRUD</span> dasar hingga arsitektur jaringan—adalah fondasi masa depanmu.
                    </p>
                </div>
            </div>

            <div class="mt-8 bg-gradient-to-r from-gray-900 to-gray-950 border border-gray-800 p-8 rounded-2xl text-center relative border-l-4 border-l-amber-500">
                <span class="text-4xl absolute -top-4 left-6 bg-[#0b0f19] px-2 select-none text-gray-700">“</span>
                <p class="text-lg italic text-gray-200 font-medium" id="teksQuote">
                    "Progres belajar itu mirip seperti mengunduh file besar dengan koneksi internet yang stabil. Biarpun persentasenya jalan lambat, yang penting tidak pernah kamu Cancel."
                </p>
                <div class="mt-4 text-xs tracking-wider text-amber-500 uppercase font-bold">
                    — EduTech Center Engine Motivator
                </div>
            </div>
        </div>

    </main>

    <footer class="border-t border-gray-900 bg-gray-950 py-6 text-center text-xs text-gray-500 mt-12">
        <div class="container mx-auto px-6">
            <p>© 2026 EduTech Center. All rights reserved.</p>
        </div>
    </footer>

    <script>
        let plans = JSON.parse(localStorage.getItem('eduTechPlans')) || [];
        let currentFilter = 'Semua';

        // Array Quotes Motivasi TI
        const TIQuotes = [
            "Jangan takut dengan baris kode yang panjang, mulailah dari satu fungsi kecil terlebih dahulu.",
            "Komputer melakukan apa yang kamu perintahkan, bukan apa yang kamu inginkan. Cari tahu letak logikanya!",
            "Seorang Senior Developer adalah Junior Developer yang tidak pernah berhenti mencoba setelah ribuan kali mengalami error.",
            "Konektivitas jaringan yang putus bisa disambung kembali, begitu juga dengan fokus belajarmu yang sempat hilang.",
            "Progres belajar itu mirip seperti mengunduh file besar dengan koneksi internet yang stabil. Biarpun persentasenya jalan lambat, yang penting tidak pernah kamu Cancel."
        ];

        function tampilkanQuoteAcak() {
            const randomIndex = Math.floor(Math.random() * TIQuotes.length);
            const quoteElement = document.getElementById('teksQuote');
            if (quoteElement) {
                quoteElement.innerText = `"${TIQuotes[randomIndex]}"`;
            }
        }

        // 1. READ & RENDER DATA
        function renderPlans() {
            const container = document.getElementById('plansContainer');
            container.innerHTML = '';
            
            let filteredPlans = plans;
            if (currentFilter !== 'Semua') {
                filteredPlans = plans.filter(p => p.category === currentFilter);
            }

            if (filteredPlans.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-12 bg-gray-900/50 border border-gray-800 rounded-2xl">
                        <p class="text-gray-500 text-sm">Belum ada planning belajar di kategori ini. Yuk buat sekarang!</p>
                    </div>`;
                updateProgress();
                return;
            }

            filteredPlans.forEach(plan => {
                const priorityClass = plan.priority === 'Tinggi' ? 'bg-red-500/10 text-red-400 border-red-500/20' : 
                                      plan.priority === 'Sedang' ? 'bg-amber-500/10 text-amber-400 border-amber-500/20' : 
                                      'bg-green-500/10 text-green-400 border-green-500/20';

                const cardClass = plan.isCompleted ? 'border-gray-800 bg-gray-900/40 opacity-60' : 'border-gray-800 bg-gray-900 hover:border-gray-700';
                const textTitleClass = plan.isCompleted ? 'line-through text-gray-500 font-medium' : 'text-white font-bold';

                container.innerHTML += `
                    <div class="border p-5 rounded-xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 transition-all ${cardClass}">
                        <div class="flex items-start gap-3">
                            <input type="checkbox" ${plan.isCompleted ? 'checked' : ''} onclick="toggleStatus('${plan.id}')"
                                   class="mt-1 w-4 h-4 rounded text-amber-500 bg-gray-950 border-gray-800 focus:ring-0 cursor-pointer">
                            <div>
                                <h4 class="text-base ${textTitleClass}">${escapeHtml(plan.title)}</h4>
                                <div class="flex flex-wrap gap-2 items-center mt-2">
                                    <span class="text-[10px] px-2 py-0.5 rounded border ${priorityClass}">${plan.priority}</span>
                                    <span class="text-xs text-gray-500">📂 ${plan.category}</span>
                                    <span class="text-xs text-gray-500">📅 Target: ${plan.deadline}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 w-full sm:w-auto justify-end border-t border-gray-800 sm:border-0 pt-3 sm:pt-0">
                            <button onclick="editPlan('${plan.id}')" class="px-3 py-1.5 text-xs bg-gray-800 hover:bg-gray-700 text-cyan-400 rounded-lg transition-colors">Edit</button>
                            <button onclick="deletePlan('${plan.id}')" class="px-3 py-1.5 text-xs bg-gray-800 hover:bg-red-950/40 text-red-400 rounded-lg transition-colors">Hapus</button>
                        </div>
                    </div>`;
            });

            updateProgress();
        }

        // 2. CREATE & UPDATE (SAVE EVENT)
        function savePlan(e) {
            e.preventDefault();
            const id = document.getElementById('planId').value;
            const title = document.getElementById('planTitle').value;
            const category = document.getElementById('planCategory').value;
            const deadline = document.getElementById('planDeadline').value;
            const priority = document.getElementById('planPriority').value;

            if (id) {
                plans = plans.map(p => p.id === id ? { ...p, title, category, deadline, priority } : p);
            } else {
                const newPlan = {
                    id: Date.now().toString(),
                    title,
                    category,
                    deadline,
                    priority,
                    isCompleted: false
                };
                plans.push(newPlan);
            }

            saveToLocalStorage();
            resetForm();
            renderPlans();
        }

        // 3. EDIT TRIGGER
        function editPlan(id) {
            const plan = plans.find(p => p.id === id);
            if (!plan) return;

            document.getElementById('planId').value = plan.id;
            document.getElementById('planTitle').value = plan.title;
            document.getElementById('planCategory').value = plan.category;
            document.getElementById('planDeadline').value = plan.deadline;
            document.getElementById('planPriority').value = plan.priority;

            document.getElementById('formTitle').innerHTML = '<span>✏️</span> Edit Planning';
            document.getElementById('btnSubmit').innerText = 'Perbarui Planning';
            document.getElementById('btnCancel').classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // 4. DELETE
        function deletePlan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus jadwal target belajar ini?')) {
                plans = plans.filter(p => p.id !== id);
                saveToLocalStorage();
                renderPlans();
            }
        }

        // 5. UPDATE STATUS
        function toggleStatus(id) {
            plans = plans.map(p => p.id === id ? { ...p, isCompleted: !p.isCompleted } : p);
            saveToLocalStorage();
            renderPlans();
        }

        // UTILITIES
        function resetForm() {
            document.getElementById('planForm').reset();
            document.getElementById('planId').value = '';
            document.getElementById('formTitle').innerHTML = '<span>➕</span> Tambah Plan Baru';
            document.getElementById('btnSubmit').innerText = 'Simpan Planning';
            document.getElementById('btnCancel').classList.add('hidden');
        }

        function filterPlans(category) {
            currentFilter = category;
            const buttons = {
                'Semua': 'filter-Semua',
                'Jaringan & Keamanan': 'filter-Jaringan',
                'Web Development': 'filter-Web'
            };
            
            Object.keys(buttons).forEach(key => {
                const btn = document.getElementById(buttons[key]);
                if (btn) {
                    if (key === category) {
                        btn.className = "px-3 py-1 text-xs rounded-full font-medium bg-amber-500 text-gray-950";
                    } else {
                        btn.className = "px-3 py-1 text-xs rounded-full font-medium bg-gray-800 text-gray-400 hover:bg-gray-700";
                    }
                }
            });
            renderPlans();
        }

        function updateProgress() {
            const total = plans.length;
            const completed = plans.filter(p => p.isCompleted).length;
            const percentage = total === 0 ? 0 : Math.round((completed / total) * 100);

            document.getElementById('progressText').innerText = `${percentage}%`;
            document.getElementById('progressCount').innerText = `${completed}/${total} Target`;

            const circle = document.getElementById('progressCircle');
            const offset = 175 - (175 * percentage) / 100;
            circle.style.strokeDashoffset = offset;
        }

        function saveToLocalStorage() {
            localStorage.setItem('eduTechPlans', JSON.stringify(plans));
        }

        function escapeHtml(text) {
            return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
        }

        // Inisialisasi awal saat halaman dimuat
        window.onload = function() {
            renderPlans();
            tampilkanQuoteAcak();
        };
    </script>
</body>
</html>