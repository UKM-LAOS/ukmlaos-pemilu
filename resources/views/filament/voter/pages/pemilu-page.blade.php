<x-filament-panels::page>
    <div class="flex justify-center flex-col items-center">
        <strong style="margin-bottom: 10px">Visi & Misi</strong>
        {{ $this->infolist }}
        <strong style="margin: 10px 0 10px 0">Form Voting</strong>
        <x-filament-panels::form wire:submit="save">
            {{ $this->form }}

            <div class="flex justify-center">
                <x-filament-panels::form.actions :actions="$this->getFormActions()" />
            </div>
        </x-filament-panels::form>
    </div>
</x-filament-panels::page>
