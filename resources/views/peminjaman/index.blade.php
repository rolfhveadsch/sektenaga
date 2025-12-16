@extends('layouts.app')

@section('header', 'Form Peminjaman')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Form Peminjaman Barang</h2>
                <p class="mt-1 text-sm text-slate-500">Isi formulir berikut untuk mencatat peminjaman baru.</p>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-soft overflow-hidden">
            <form id="peminjamanForm" class="p-8 space-y-8">
                <input type="hidden" id="peminjam_id" name="peminjam_id">
                <input type="hidden" id="barang_id" name="barang_id">

                <!-- Section: Data Peminjam -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 pb-2 border-b border-slate-100">
                        <div class="h-8 w-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900">Data Peminjam</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="role" class="block text-sm font-medium text-slate-700 mb-1">Status
                                Peminjam</label>
                            <select id="role" name="role"
                                class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm transition-colors text-slate-900"
                                onchange="resetPeminjamInput()">
                                <option value="student">Siswa</option>
                                <option value="teacher">Guru</option>
                            </select>
                        </div>

                        <div>
                            <label id="label_peminjam_code" for="peminjam_code"
                                class="block text-sm font-medium text-slate-700 mb-1">NISN</label>
                            <div class="relative">
                                <input type="text" id="peminjam_code"
                                    class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm pr-20 transition-colors"
                                    placeholder="Masukkan ID..." required>
                                <button type="button" onclick="checkPeminjam()"
                                    class="absolute right-1 top-1 bottom-1 px-4 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Check
                                </button>
                            </div>
                            <div id="peminjam_info" class="mt-2 hidden">
                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-sm font-medium border border-emerald-100">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span id="peminjam_name"></span>
                                </div>
                            </div>
                            <p id="peminjam_error" class="mt-2 text-sm text-red-600 hidden"></p>
                        </div>
                    </div>
                </div>

                <!-- Section: Data Barang -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 pb-2 border-b border-slate-100">
                        <div class="h-8 w-8 rounded-full bg-orange-50 flex items-center justify-center text-orange-600">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900">Data Barang</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="barang_code" class="block text-sm font-medium text-slate-700 mb-1">Kode
                                Barang</label>
                            <div class="relative">
                                <input type="text" id="barang_code"
                                    class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm pr-20 transition-colors"
                                    placeholder="Kode Barang..." required>
                                <button type="button" onclick="checkBarang()"
                                    class="absolute right-1 top-1 bottom-1 px-4 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Check
                                </button>
                            </div>
                            <div id="barang_info" class="mt-2 hidden">
                                <div
                                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-sm font-medium border border-emerald-100">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span id="barang_name"></span>
                                </div>
                            </div>
                            <p id="barang_error" class="mt-2 text-sm text-red-600 hidden"></p>
                        </div>

                        <div>
                            <label for="tanggal_pinjam" class="block text-sm font-medium text-slate-700 mb-1">Tanggal
                                Pinjam</label>
                            <input type="datetime-local" id="tanggal_pinjam" name="tanggal_pinjam"
                                class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="tanggal_kembali" class="block text-sm font-medium text-slate-700 mb-1">Rencana
                                Kembali</label>
                            <input type="datetime-local" id="tanggal_kembali" name="tanggal_kembali"
                                class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                        </div>
                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-slate-700 mb-1">Keterangan
                                (Opsional)</label>
                            <input type="text" id="keterangan" name="keterangan"
                                class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                placeholder="Contoh: Untuk Praktikum...">
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="pt-6 flex items-center justify-end gap-4 border-t border-slate-100">
                    <button type="button" onclick="resetForm()"
                        class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-medium hover:bg-slate-50 transition-colors">
                        Reset Form
                    </button>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 shadow-md shadow-blue-200 transition-all hover:shadow-lg hover:-translate-y-0.5">
                        Submit Peminjaman
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Set default date to today
        document.addEventListener('DOMContentLoaded', () => {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
            document.getElementById('tanggal_pinjam').value = formattedDateTime;
        });

        function resetPeminjamInput() {
            const role = document.getElementById('role').value;
            const label = document.getElementById('label_peminjam_code');
            label.textContent = role === 'student' ? 'NISN' : 'NIP';

            document.getElementById('peminjam_code').value = '';
            document.getElementById('peminjam_id').value = '';
            document.getElementById('peminjam_info').classList.add('hidden');
            document.getElementById('peminjam_error').classList.add('hidden');
        }

        function resetForm() {
            document.getElementById('peminjamanForm').reset();
            document.getElementById('peminjam_id').value = '';
            document.getElementById('barang_id').value = '';
            document.getElementById('peminjam_info').classList.add('hidden');
            document.getElementById('barang_info').classList.add('hidden');

            // Set tanggal_pinjam to current datetime
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
            document.getElementById('tanggal_pinjam').value = formattedDateTime;

            resetPeminjamInput();
        }

        async function checkPeminjam() {
            const role = document.getElementById('role').value;
            const code = document.getElementById('peminjam_code').value;
            const errorEl = document.getElementById('peminjam_error');
            const infoEl = document.getElementById('peminjam_info');
            const nameEl = document.getElementById('peminjam_name');
            const idInput = document.getElementById('peminjam_id');

            if (!code) return;

            // Show loading state could be added here

            try {
                const response = await fetch(`{{ route('peminjaman.check') }}?role=${role}&code=${code}`);
                const data = await response.json();

                if (response.ok) {
                    idInput.value = data.id;
                    nameEl.textContent = data.nama;
                    infoEl.classList.remove('hidden');
                    errorEl.classList.add('hidden');
                } else {
                    throw new Error(data.error || 'Data not found');
                }
            } catch (error) {
                idInput.value = '';
                infoEl.classList.add('hidden');
                errorEl.textContent = error.message;
                errorEl.classList.remove('hidden');
            }
        }

        async function checkBarang() {
            const code = document.getElementById('barang_code').value;
            const errorEl = document.getElementById('barang_error');
            const infoEl = document.getElementById('barang_info');
            const nameEl = document.getElementById('barang_name');
            const idInput = document.getElementById('barang_id');

            if (!code) return;

            try {
                const response = await fetch(`{{ route('inventories.check') }}?code=${code}`);
                const data = await response.json();

                if (response.ok) {
                    idInput.value = data.id;
                    nameEl.textContent = data.nama_barang;
                    infoEl.classList.remove('hidden');
                    errorEl.classList.add('hidden');
                } else {
                    throw new Error(data.error || 'Item not found');
                }
            } catch (error) {
                idInput.value = '';
                infoEl.classList.add('hidden');
                errorEl.textContent = error.message;
                errorEl.classList.remove('hidden');
            }
        }

        document.getElementById('peminjamanForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            // Validate IDs
            if (!document.getElementById('peminjam_id').value) {
                window.toast.error('Silakan cek validitas Peminjam terlebih dahulu');
                return;
            }
            if (!document.getElementById('barang_id').value) {
                window.toast.error('Silakan cek validitas Barang terlebih dahulu');
                return;
            }

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('/peminjaman', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (!response.ok) {
                    throw new Error(result.message || 'Gagal menyimpan peminjaman');
                }

                window.toast.success('Peminjaman berhasil dicatat!');
                resetForm();

            } catch (error) {
                console.error(error);
                window.toast.error(error.message);
            }
        });

        // Auto check on enter for convenience
        document.getElementById('peminjam_code').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                checkPeminjam();
            }
        });

        document.getElementById('barang_code').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                checkBarang();
            }
        });
    </script>
@endpush
