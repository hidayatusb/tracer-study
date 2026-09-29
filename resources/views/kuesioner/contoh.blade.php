<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Kuesioner | Tracer Study FMIPA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .peer:checked + .choice .choice-dot {
            border-color: #4a2798;
            background: #4a2798;
            box-shadow: inset 0 0 0 4px #fff;
        }
    </style>
</head>

<body class="min-h-screen bg-[#F4F0FA] font-poppins text-navy">
    <div class="mx-auto max-w-3xl px-4 py-8 sm:py-12">
        <div class="mb-6 flex items-center justify-between gap-4">
            <a href="/"><img src="/images/logots.png" alt="Tracer Study FMIPA UNSULBAR" class="h-12 w-auto"></a>
            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-primary shadow-sm">Contoh tampilan</span>
        </div>

        <div class="overflow-hidden rounded-3xl bg-white shadow-xl shadow-primary/10">
            <div class="bg-primary px-6 py-8 text-white sm:px-10">
                <p class="text-sm font-medium text-secondary">Tracer Study FMIPA UNSULBAR</p>
                <h1 class="mt-1 text-2xl font-bold sm:text-3xl">Kuesioner Alumni</h1>
                <p class="mt-2 max-w-xl text-sm text-white/80">Bantu kami mengetahui jejak lulusan. Isi singkat ini hanya contoh tampilan dan belum menyimpan jawaban.</p>

                <ol id="progress" class="mt-6 grid grid-cols-3 gap-3 text-xs font-medium">
                    <li data-progress="0" class="rounded-xl bg-white/15 px-3 py-2">1. Identitas</li>
                    <li data-progress="1" class="rounded-xl bg-white/10 px-3 py-2 text-white/70">2. Status</li>
                    <li data-progress="2" class="rounded-xl bg-white/10 px-3 py-2 text-white/70">3. Detail</li>
                </ol>
            </div>

            <form id="contoh-kuesioner" class="px-6 py-8 sm:px-10" novalidate>
                <section data-step="0">
                    <h2 class="text-lg font-semibold">Identitas alumni</h2>
                    <p class="mt-1 text-sm text-softnavy">Lengkapi data diri sebelum masuk ke pertanyaan.</p>

                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        <label class="block sm:col-span-2">
                            <span class="mb-1.5 block text-sm font-medium">Nama lengkap</span>
                            <input name="namalengkap" required placeholder="Nama sesuai ijazah"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium">Program studi</span>
                            <select name="kodeprodi" required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                                <option value="">Pilih program studi</option>
                                <option value="1">Statistika</option>
                                <option value="2">Matematika</option>
                            </select>
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium">Tahun lulus</span>
                            <input name="tahunlulus" required inputmode="numeric" placeholder="2024"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium">No. HP / WhatsApp</span>
                            <input name="nohp" required placeholder="08123456789"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium">Email</span>
                            <input name="email" type="email" required placeholder="nama@email.com"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </label>
                    </div>
                </section>

                <section data-step="1" class="hidden">
                    <h2 class="text-lg font-semibold">Status Anda saat ini</h2>
                    <p class="mt-1 text-sm text-softnavy">Pilih satu jawaban. Pertanyaan berikutnya menyesuaikan pilihan ini.</p>

                    <div class="mt-6 grid gap-3" id="status-options">
                        @foreach ([
                            '1' => ['Bekerja', 'Full time atau part time'],
                            '2' => ['Wiraswasta', 'Memiliki atau menjalankan usaha'],
                            '3' => ['Melanjutkan pendidikan', 'Sedang studi lanjut'],
                            '4' => ['Mencari kerja', 'Belum bekerja, sedang melamar'],
                            '5' => ['Belum memungkinkan bekerja', 'Ada alasan lain sehingga belum bekerja'],
                        ] as $value => [$judul, $deskripsi])
                            <label class="block cursor-pointer">
                                <input class="peer sr-only" type="radio" name="p1" value="{{ $value }}" @if ($value === '1') required @endif>
                                <span class="choice flex items-start gap-3 rounded-2xl border border-gray-200 px-4 py-4 transition peer-checked:border-primary peer-checked:bg-primary/5 peer-focus-visible:ring-4 peer-focus-visible:ring-primary/10">
                                    <span class="choice-dot mt-0.5 h-5 w-5 shrink-0 rounded-full border border-gray-300 bg-white"></span>
                                    <span>
                                        <span class="block text-sm font-semibold">{{ $judul }}</span>
                                        <span class="mt-0.5 block text-sm text-softnavy">{{ $deskripsi }}</span>
                                    </span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                    <p id="status-error" class="mt-3 hidden text-sm text-red-600">Pilih status Anda terlebih dahulu.</p>
                </section>

                <section data-step="2" class="hidden">
                    <div data-panel="kerja" class="hidden space-y-8">
                        <div>
                            <h2 class="text-lg font-semibold">Pekerjaan pertama</h2>
                            <p class="mt-1 text-sm text-softnavy">Apakah Anda mendapat pekerjaan dalam 6 bulan setelah lulus, termasuk bekerja sebelum lulus?</p>
                            <div class="mt-4 grid gap-3 sm:grid-cols-2">
                                <label class="block cursor-pointer">
                                    <input class="peer sr-only" type="radio" name="p2" value="1">
                                    <span class="block rounded-2xl border border-gray-200 px-4 py-3 text-sm font-semibold peer-checked:border-primary peer-checked:bg-primary/5">Ya, dalam 6 bulan</span>
                                </label>
                                <label class="block cursor-pointer">
                                    <input class="peer sr-only" type="radio" name="p2" value="2">
                                    <span class="block rounded-2xl border border-gray-200 px-4 py-3 text-sm font-semibold peer-checked:border-primary peer-checked:bg-primary/5">Tidak, lebih dari 6 bulan</span>
                                </label>
                            </div>
                            <label class="mt-4 block hidden" data-follow="ya">
                                <span class="mb-1.5 block text-sm font-medium">Dalam berapa bulan Anda mendapat pekerjaan?</span>
                                <input name="p2c" inputmode="numeric" placeholder="contoh: 2"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                            </label>
                            <label class="mt-4 block hidden" data-follow="tidak">
                                <span class="mb-1.5 block text-sm font-medium">Berapa bulan sampai mendapat pekerjaan pertama?</span>
                                <input name="p2d" inputmode="numeric" placeholder="contoh: 8"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                            </label>
                            <label class="mt-4 block">
                                <span class="mb-1.5 block text-sm font-medium">Rata-rata pendapatan per bulan (take home pay)</span>
                                <input name="p2e" placeholder="contoh: 3000000"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                            </label>
                        </div>

                        <div>
                            <h2 class="text-lg font-semibold">Tempat bekerja</h2>
                            <p class="mt-1 text-sm text-softnavy">Jenis perusahaan atau instansi tempat Anda bekerja sekarang.</p>
                            <div class="mt-4 grid gap-3 sm:grid-cols-2">
                                @foreach ([
                                    '1' => 'Instansi pemerintah',
                                    '2' => 'BUMN / BUMD',
                                    '3' => 'Institusi multilateral',
                                    '4' => 'Organisasi non-profit',
                                    '5' => 'Perusahaan swasta',
                                    '6' => 'Usaha sendiri',
                                    '7' => 'Lainnya',
                                ] as $value => $label)
                                    <label class="block cursor-pointer {{ $value === '7' ? 'sm:col-span-2' : '' }}">
                                        <input class="peer sr-only" type="radio" name="p4" value="{{ $value }}">
                                        <span class="block rounded-2xl border border-gray-200 px-4 py-3 text-sm font-medium peer-checked:border-primary peer-checked:bg-primary/5">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <label class="mt-4 block hidden" data-follow="lainnya">
                                <span class="mb-1.5 block text-sm font-medium">Tuliskan jenis instansi</span>
                                <input name="p4h" placeholder="Jenis instansi lainnya"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                            </label>
                            <label class="mt-4 block">
                                <span class="mb-1.5 block text-sm font-medium">Nama perusahaan atau kantor</span>
                                <input name="p5" placeholder="Nama tempat bekerja"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                            </label>
                        </div>

                        <div data-panel="wiraswasta" class="hidden">
                            <h2 class="text-lg font-semibold">Posisi di usaha</h2>
                            <div class="mt-4 grid gap-3 sm:grid-cols-2">
                                @foreach (['1' => 'Founder', '2' => 'Co-Founder', '3' => 'Staff', '4' => 'Freelance'] as $value => $label)
                                    <label class="block cursor-pointer">
                                        <input class="peer sr-only" type="radio" name="p6" value="{{ $value }}">
                                        <span class="block rounded-2xl border border-gray-200 px-4 py-3 text-sm font-medium peer-checked:border-primary peer-checked:bg-primary/5">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <h2 class="text-lg font-semibold">Kesesuaian dengan bidang studi</h2>
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach (['1' => 'Sangat erat', '2' => 'Erat', '3' => 'Cukup erat', '4' => 'Kurang erat', '5' => 'Tidak sama sekali'] as $value => $label)
                                    <label class="cursor-pointer">
                                        <input class="peer sr-only" type="radio" name="p10" value="{{ $value }}">
                                        <span class="inline-flex rounded-full border border-gray-200 px-4 py-2 text-sm font-medium peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div data-panel="studi" class="hidden">
                        <h2 class="text-lg font-semibold">Studi lanjut</h2>
                        <p class="mt-1 text-sm text-softnavy">Ceritakan pendidikan yang sedang Anda jalani.</p>
                        <div class="mt-6 grid gap-4">
                            <label class="block">
                                <span class="mb-1.5 block text-sm font-medium">Sumber biaya</span>
                                <select name="p8a" class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                                    <option value="">Pilih sumber biaya</option>
                                    <option value="1">Biaya sendiri</option>
                                    <option value="2">Beasiswa</option>
                                </select>
                            </label>
                            <label class="block">
                                <span class="mb-1.5 block text-sm font-medium">Perguruan tinggi</span>
                                <input name="p8b" placeholder="Nama perguruan tinggi"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                            </label>
                            <label class="block">
                                <span class="mb-1.5 block text-sm font-medium">Program studi</span>
                                <input name="p8c" placeholder="Nama program studi"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                            </label>
                            <label class="block">
                                <span class="mb-1.5 block text-sm font-medium">Tanggal masuk</span>
                                <input name="p8d" type="date"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10">
                            </label>
                        </div>
                    </div>

                    <div data-panel="mencari" class="hidden">
                        <h2 class="text-lg font-semibold">Terima kasih sudah menjawab</h2>
                        <p class="mt-2 text-sm leading-relaxed text-softnavy">Karena Anda belum bekerja atau belum memungkinkan bekerja, pertanyaan tentang instansi dan kesesuaian bidang tidak ditampilkan. Anda bisa menyelesaikan contoh kuesioner ini.</p>
                    </div>

                    <p id="detail-error" class="mt-4 hidden text-sm text-red-600">Lengkapi jawaban yang masih kosong.</p>
                </section>

                <section data-step="done" class="hidden py-8 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-8 w-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                    <h2 class="mt-4 text-2xl font-bold">Contoh kuesioner selesai</h2>
                    <p class="mx-auto mt-2 max-w-md text-sm text-softnavy">Jawaban tidak disimpan. Halaman ini hanya memperlihatkan alur form yang lebih ringkas.</p>
                    <button type="button" id="ulang" class="mt-6 rounded-xl bg-primary px-5 py-3 text-sm font-semibold text-white">Isi lagi</button>
                </section>

                <div id="actions" class="mt-8 flex items-center justify-between gap-3 border-t border-divider pt-6">
                    <button type="button" id="kembali" class="rounded-xl px-4 py-3 text-sm font-semibold text-softnavy hover:bg-gray-50">Kembali</button>
                    <button type="button" id="lanjut" class="rounded-xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-primary/20">Lanjut</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const form = document.getElementById('contoh-kuesioner');
        const steps = [...form.querySelectorAll('[data-step]')].filter((step) => step.dataset.step !== 'done');
        const done = form.querySelector('[data-step="done"]');
        const actions = document.getElementById('actions');
        const progressItems = [...document.querySelectorAll('[data-progress]')];
        const statusError = document.getElementById('status-error');
        const detailError = document.getElementById('detail-error');
        let current = 0;

        const panel = (name) => form.querySelector(`[data-panel="${name}"]`);
        const follow = (name) => form.querySelector(`[data-follow="${name}"]`);

        function status() {
            return form.querySelector('input[name="p1"]:checked')?.value ?? '';
        }

        function showFollow(element, visible) {
            element.classList.toggle('hidden', !visible);
            element.querySelectorAll('input, select').forEach((field) => {
                field.disabled = !visible;
                field.required = visible;
            });
        }

        function syncConditional() {
            const value = status();
            const kerja = value === '1' || value === '2';
            const studi = value === '3';
            const mencari = value === '4' || value === '5';

            panel('kerja').classList.toggle('hidden', !kerja);
            panel('wiraswasta').classList.toggle('hidden', value !== '2');
            panel('studi').classList.toggle('hidden', !studi);
            panel('mencari').classList.toggle('hidden', !mencari);

            panel('kerja').querySelectorAll('input').forEach((field) => {
                field.disabled = !kerja;
            });
            panel('studi').querySelectorAll('input, select').forEach((field) => {
                field.disabled = !studi;
                field.required = studi;
            });

            const p2 = form.querySelector('input[name="p2"]:checked')?.value;
            showFollow(follow('ya'), kerja && p2 === '1');
            showFollow(follow('tidak'), kerja && p2 === '2');
            showFollow(follow('lainnya'), kerja && form.querySelector('input[name="p4"]:checked')?.value === '7');

            ['p2', 'p2e', 'p4', 'p5', 'p10'].forEach((name) => {
                form.querySelectorAll(`[name="${name}"]`).forEach((field) => {
                    if (name === 'p2c' || name === 'p2d' || name === 'p4h') {
                        return;
                    }
                    field.required = kerja && !field.disabled;
                });
            });
            form.querySelectorAll('[name="p6"]').forEach((field) => {
                field.disabled = value !== '2';
                field.required = value === '2';
            });
        }

        function showStep(index) {
            steps.forEach((step, stepIndex) => step.classList.toggle('hidden', stepIndex !== index));
            done.classList.add('hidden');
            actions.classList.remove('hidden');
            document.getElementById('kembali').classList.toggle('invisible', index === 0);
            document.getElementById('lanjut').textContent = index === steps.length - 1 ? 'Selesai' : 'Lanjut';
            progressItems.forEach((item, itemIndex) => {
                const active = itemIndex === index;
                const complete = itemIndex < index;
                item.classList.toggle('bg-white/15', active || complete);
                item.classList.toggle('text-white/70', !active && !complete);
                item.classList.toggle('bg-white/10', !active && !complete);
            });
            current = index;
        }

        function validate(step) {
            statusError.classList.add('hidden');
            detailError.classList.add('hidden');
            if (step.dataset.step === '1' && !status()) {
                statusError.classList.remove('hidden');
                return false;
            }

            const fields = [...step.querySelectorAll('input, select, textarea')].filter((field) => {
                return !field.disabled && !field.closest('.hidden') && field.willValidate;
            });

            for (const field of fields) {
                if (!field.checkValidity()) {
                    if (step.dataset.step === '2') {
                        detailError.classList.remove('hidden');
                    }
                    field.reportValidity();
                    return false;
                }
            }

            return true;
        }

        document.getElementById('lanjut').addEventListener('click', () => {
            syncConditional();
            if (!validate(steps[current])) {
                return;
            }
            if (current === steps.length - 1) {
                steps.forEach((step) => step.classList.add('hidden'));
                done.classList.remove('hidden');
                actions.classList.add('hidden');
                progressItems.forEach((item) => {
                    item.classList.add('bg-white/15');
                    item.classList.remove('text-white/70', 'bg-white/10');
                });
                return;
            }
            showStep(current + 1);
            syncConditional();
        });

        document.getElementById('kembali').addEventListener('click', () => {
            if (current > 0) {
                showStep(current - 1);
            }
        });

        document.getElementById('ulang').addEventListener('click', () => {
            form.reset();
            syncConditional();
            showStep(0);
        });

        form.addEventListener('change', syncConditional);
        syncConditional();
        showStep(0);
    </script>
</body>

</html>
