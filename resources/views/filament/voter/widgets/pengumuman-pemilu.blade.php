<x-filament-widgets::widget>
    <x-filament::section>
        <div class="w-full">
            <h1 class="font-bold text-xl">Selamat Datang Sobat LAOS</h1>
            <br>
            <p>Bersama kita sukseskan pemilihan calon ketua UKM LAOS Periode {{ \Carbon\Carbon::now()->year + 1 }} / {{ \Carbon\Carbon::now()->year + 2 }} untuk UKM LAOS yang lebih maju dan lebih baik.
            </p>
            <br>
            <strong>Status Kegiatan Pemilu: {{ $statusPemilu->status ? 'Aktif' : 'Ditutup' }}</strong>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
