<?php

namespace App\Filament\Voter\Pages;

use App\Livewire\Voter\Pages\PemiluPage\Components\VisiMisiComponent;
use App\Models\Caketum;
use Filament\Forms\Form;
use Filament\Pages\Page;
use App\Models\SuaraPemilu;
use App\Models\StatusPemilu;
use Filament\Actions\Action;
use Filament\Infolists\Infolist;
use Illuminate\Support\Facades\Auth;
use Filament\Infolists\Components\Tabs;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Infolists\Components\Livewire;
use Icetalker\FilamentPicker\Forms\Components\Picker;

class PemiluPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.voter.pages.pemilu-page';

    public array $data = [];

    public function mount()
    {
        $this->form->fill();
        if(StatusPemilu::first()->status == false) {
            Notification::make()
                ->danger()
                ->title('Pemilu sudah selesai')
                ->send();
            return redirect()->route('filament.voter.pages.dashboard');
        }
        if(SuaraPemilu::whereUserId(Auth::user()->id)->exists()) {
            Notification::make()
                ->danger()
                ->title('Anda sudah memberikan suara')
                ->send();
            return redirect()->route('filament.voter.pages.dashboard');
        }
    }

    public function infolist(Infolist $infolist): Infolist
    {
        $caketum = Caketum::all();
        $tabs = [];
        foreach($caketum as $c) {
            // $tabs[] = Tabs\Tab::make($c->id)->label($c->nama)
            //     ->schema([
            //         // 
            //     ]);
            if($c->id === $caketum->first()->id)
            {
                $tabs[] = Tabs\Tab::make($c->id)->label($c->nama)
                    ->schema([
                        Livewire::make(VisiMisiComponent::class, ['caketum' => $c->id]),
                    ]);
            } else {
                $tabs[] = Tabs\Tab::make($c->id)->label($c->nama)
                    ->schema([
                        Livewire::make(VisiMisiComponent::class, ['caketum' => $c->id])->lazy(),
                    ]);
            }
        }
        return $infolist
            ->schema([
                Tabs::make()
                    ->tabs($tabs)->contained(false),
            ]);
    }


    public function getTitle(): string|Htmlable
    {
        return 'Pemilu';
    }

    public function form(Form $form): Form
    {
        $caketum = Caketum::with('media')->get();
        $options = [];
        foreach($caketum as $c) {
            $options[$c->id] = $c->nama;
        }
        $images = [];
        foreach($caketum as $c) {
            $images[$c->id] = $c->getFirstMediaUrl('caketum-image');
        }
        return $form
            ->schema([
                Picker::make('caketum_id')
                    ->label('Daftar Calon Ketua Umum')
                    ->options($options)
                    ->imageSize(250)
                    ->images($images)
                    ->required(),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Submit Vote'))
                ->submit('save'),
        ];
    }

    public function save()
    {
        try {
            SuaraPemilu::create([
                'user_id' => Auth::user()->id,
                'caketum_id' => $this->data['caketum_id'],
            ]);
            Notification::make()
                ->success()
                ->title('Suara berhasil disimpan')
                ->send();
            return redirect()->route('filament.voter.pages.dashboard');
        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Suara gagal disimpan')
                ->send();
        }
    }

}
