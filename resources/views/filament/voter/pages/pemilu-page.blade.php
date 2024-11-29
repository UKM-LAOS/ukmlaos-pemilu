<x-filament-panels::page>
    <strong>Visi & Misi</strong>
    {{ $this->infolist }}
    <strong>Form Voting</strong>
    <x-filament-panels::form wire:submit="save"> 
        {{ $this->form }}
 
        <x-filament-panels::form.actions 
            :actions="$this->getFormActions()"
        /> 
    </x-filament-panels::form>
</x-filament-panels::page>
