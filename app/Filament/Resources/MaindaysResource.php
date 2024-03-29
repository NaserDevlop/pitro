<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaindaysResource\Pages;
use App\Filament\Resources\MaindaysResource\RelationManagers;
use App\Models\Maindays;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaindaysResource extends Resource
{
    protected static ?string $model = Maindays::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaindays::route('/'),
            'create' => Pages\CreateMaindays::route('/create'),
            'edit' => Pages\EditMaindays::route('/{record}/edit'),
        ];
    }
}
