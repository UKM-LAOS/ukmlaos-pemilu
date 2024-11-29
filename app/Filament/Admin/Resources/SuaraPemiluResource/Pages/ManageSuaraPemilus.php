<?php

namespace App\Filament\Admin\Resources\SuaraPemiluResource\Pages;

use App\Filament\Admin\Resources\SuaraPemiluResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;

class ManageSuaraPemilus extends ManageRecords
{
    protected static string $resource = SuaraPemiluResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Suara Pemilu';
    }
}
