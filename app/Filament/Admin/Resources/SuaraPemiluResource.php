<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SuaraPemiluResource\Pages;
use App\Filament\Admin\Resources\SuaraPemiluResource\RelationManagers;
use App\Models\Caketum;
use App\Models\SuaraPemilu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuaraPemiluResource extends Resource
{
    protected static ?string $model = SuaraPemilu::class;

    protected static ?string $navigationIcon = 'heroicon-o-speaker-wave';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Caketum::query())
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Calon Ketua Umum'),
                TextColumn::make('suara')
                    ->label('Jumlah Suara')
                    ->getStateUsing(fn(Caketum $caketum) => $caketum->suaraPemilu->count() ?? 0)
                    ->weight(FontWeight::Bold),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSuaraPemilus::route('/'),
        ];
    }
}
