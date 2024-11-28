<?php

namespace App\Filament\Admin\Pages;

use App\Models\StatusPemilu;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class EditStatusPemiluPage extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = []; 

    public function mount()
    {
        $this->form->fill([
            'status' => StatusPemilu::first()->status,
        ]);
    }

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.admin.pages.edit-status-pemilu-page';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('status')
                    ->label('Status Pemilu')
                    ->default(false)
            ])->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save()
    {
        StatusPemilu::first()->update([
            'status' => $this->data['status'],
        ]);

        Notification::make()
            ->title('Status Pemilu berhasil diubah')
            ->success()
            ->send();
    }

    public function getTitle(): string|Htmlable
    {
        return 'Edit Status Pemilu';
    }
}
