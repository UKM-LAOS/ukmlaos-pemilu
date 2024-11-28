<?php

namespace App\Filament\Admin\Resources\CaketumResource\Pages;

use App\Filament\Admin\Resources\CaketumResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;

class ManageCaketa extends ManageRecords
{
    protected static string $resource = CaketumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Manage Calon Ketua Umum';
    }
}
