<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistika | Tracer Study FMIPA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            background: #f4f0fa;
        }

        .peer:checked + .choice {
            border-color: #4a2798;
            background: rgba(74, 39, 152, 0.06);
        }

        .peer:checked + .choice .choice-dot {
            border-color: #4a2798;
            background: #4a2798;
            box-shadow: inset 0 0 0 4px #fff;
        }
    </style>
</head>

<body class="min-h-screen font-poppins text-navy">
    <div class="mx-auto max-w-3xl px-4 py-8 sm:py-12">
        <div class="overflow-hidden rounded-3xl bg-white shadow-xl shadow-primary/10">
            <div class="bg-primary px-6 py-8 text-white sm:px-10">
                <p class="text-sm font-medium text-secondary">Tracer Study STATISTIKA FMIPA UNSULBAR</p>
                <h1 class="mt-1 text-2xl font-bold sm:text-3xl">Kuesioner Alumni Statistika</h1>
                <p class="mt-2 text-sm text-white/80">Isian menyesuaikan status alumni yang dipilih.</p>
            </div>

            <form id="form-statistika" action="{{ route('statistika.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-8 sm:px-10">
                @csrf

                @if (session('berhasil'))
                    <div class="mb-6 rounded-2xl bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('berhasil') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl bg-red-50 px-4 py-3 text-sm text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid gap-5">
                    <label class="block">
                        <span class="mb-1.5 block text-sm font-medium">Nama lengkap</span>
                        <input name="namalengkap" value="{{ old('namalengkap') }}" required placeholder="Nama sesuai ijazah"
                            class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                    </label>

                    <fieldset>
                        <legend class="mb-3 text-sm font-medium">Status alumni</legend>
                        <div class="grid gap-3">
                            <label class="block cursor-pointer">
                                <input class="peer sr-only" type="radio" name="status" value="bekerja" @checked(old('status') === 'bekerja')>
                                <span class="choice flex items-center gap-3 rounded-2xl border border-gray-200 px-4 py-4">
                                    <span class="choice-dot h-5 w-5 shrink-0 rounded-full border border-gray-300 bg-white"></span>
                                    <span>
                                        <span class="block text-sm font-semibold">Sudah bekerja</span>
                                        <span class="block text-sm text-softnavy">Isi pekerjaan, tempat, gaji, dan bukti dokumen.</span>
                                    </span>
                                </span>
                            </label>
                            <label class="block cursor-pointer">
                                <input class="peer sr-only" type="radio" name="status" value="belum" @checked(old('status') === 'belum')>
                                <span class="choice flex items-center gap-3 rounded-2xl border border-gray-200 px-4 py-4">
                                    <span class="choice-dot h-5 w-5 shrink-0 rounded-full border border-gray-300 bg-white"></span>
                                    <span>
                                        <span class="block text-sm font-semibold">Belum bekerja</span>
                                        <span class="block text-sm text-softnavy">Tidak perlu mengisi data pekerjaan atau kuliah.</span>
                                    </span>
                                </span>
                            </label>
                            <label class="block cursor-pointer">
                                <input class="peer sr-only" type="radio" name="status" value="kuliah" @checked(old('status') === 'kuliah')>
                                <span class="choice flex items-center gap-3 rounded-2xl border border-gray-200 px-4 py-4">
                                    <span class="choice-dot h-5 w-5 shrink-0 rounded-full border border-gray-300 bg-white"></span>
                                    <span>
                                        <span class="block text-sm font-semibold">Lanjut kuliah</span>
                                        <span class="block text-sm text-softnavy">Isi tempat kuliah dan bukti dokumen.</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <p id="status-error" class="mt-3 hidden text-sm text-red-600">Pilih status alumni terlebih dahulu.</p>
                    </fieldset>

                    <div id="panel-bekerja" class="hidden grid gap-5 rounded-2xl border border-gray-100 bg-gray-50 p-4">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium">Pekerjaan</span>
                            <input name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Contoh: Analis data"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium">Tempat bekerja</span>
                            <input name="tempat_bekerja" value="{{ old('tempat_bekerja') }}" placeholder="Nama perusahaan atau instansi"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium">Pendapatan / gaji</span>
                            <input name="pendapatan" value="{{ old('pendapatan') }}" inputmode="numeric" placeholder="Contoh: 4500000"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </label>
                    </div>

                    <div id="panel-kuliah" class="hidden rounded-2xl border border-gray-100 bg-gray-50 p-4">
                        <label class="block">
                            <span class="mb-1.5 block text-sm font-medium">Tempat lanjut kuliah</span>
                            <input name="tempat_kuliah" value="{{ old('tempat_kuliah') }}" placeholder="Nama perguruan tinggi dan program studi"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10">
                        </label>
                    </div>

                    <div id="panel-belum" class="hidden rounded-2xl border border-gray-100 bg-gray-50 px-4 py-4 text-sm text-softnavy">
                        Status belum bekerja tidak meminta data pekerjaan, gaji, atau tempat kuliah.
                    </div>

                    <div id="panel-bukti" class="hidden">
                        <label class="block">
                            <span id="bukti-label" class="mb-1.5 block text-sm font-medium">Bukti dokumen</span>
                            <input id="bukti" name="bukti" type="file" accept=".pdf,.jpg,.jpeg,.png"
                                class="block w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm file:mr-3 file:rounded-lg file:border-0 file:bg-primary/10 file:px-3 file:py-1.5 file:text-sm file:font-semibold file:text-primary">
                            <span id="bukti-hint" class="mt-1.5 block text-xs text-softnavy"></span>
                        </label>
                    </div>
                </div>

                <div class="mt-8 border-t border-divider pt-6">
                    <button type="submit" class="rounded-xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-primary/20">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const form = document.getElementById('form-statistika');
        const statusError = document.getElementById('status-error');
        const buktiLabel = document.getElementById('bukti-label');
        const buktiHint = document.getElementById('bukti-hint');

        const panels = {
            bekerja: document.getElementById('panel-bekerja'),
            kuliah: document.getElementById('panel-kuliah'),
            belum: document.getElementById('panel-belum'),
            bukti: document.getElementById('panel-bukti'),
        };

        function status() {
            return form.querySelector('input[name="status"]:checked')?.value ?? '';
        }

        function toggle(panel, show) {
            panel.classList.toggle('hidden', !show);
            panel.querySelectorAll('input, select, textarea').forEach((field) => {
                field.disabled = !show;
                field.required = show;
            });
        }

        function sync() {
            const value = status();
            const bekerja = value === 'bekerja';
            const kuliah = value === 'kuliah';

            toggle(panels.bekerja, bekerja);
            toggle(panels.kuliah, kuliah);
            toggle(panels.belum, value === 'belum');
            toggle(panels.bukti, bekerja || kuliah);

            buktiLabel.textContent = kuliah ? 'Bukti dokumen kuliah' : 'Bukti dokumen';
            buktiHint.textContent = kuliah
                ? 'Unggah kartu mahasiswa atau surat keterangan kuliah. Format PDF, JPG, atau PNG.'
                : 'Unggah surat keterangan kerja atau slip gaji. Format PDF, JPG, atau PNG.';

            if (value) {
                statusError.classList.add('hidden');
            }
        }

        form.addEventListener('change', sync);

        form.addEventListener('submit', (event) => {
            if (!status()) {
                event.preventDefault();
                statusError.classList.remove('hidden');
            }
        });

        sync();
    </script>
</body>

</html>
