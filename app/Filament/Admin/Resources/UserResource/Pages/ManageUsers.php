<?php

namespace App\Filament\Admin\Resources\UserResource\Pages;

use App\Filament\Admin\Resources\UserResource;
use App\Imports\Admin\ImportVoter;
use Exception;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Actions\CreateAction::make()
                ->label('Import Voter')
                ->color('success')
                ->form([
                    FileUpload::make('file')
                        ->label('File Voter')
                        ->rules(['required', 'mimes:xlsx,xls,csv'])
                        ->directory('Admin/ImportVoter')
                ])
                ->using(function (array $data)
                {
                    try
                    {
                        $file = File::allFiles(public_path('storage/Admin/ImportVoter'))[0];
                        Excel::import(new ImportVoter, $file);
                        File::delete($file);
                    } catch(Exception $e)
                    {
                        Notification::make()
                            ->title($e->getMessage())
                            ->danger()
                            ->send();
                    }

                    
                })
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Daftar Voter';
    }
}
