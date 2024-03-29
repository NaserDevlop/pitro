<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventsResource\Pages;
use App\Filament\Resources\EventsResource\RelationManagers;
use App\Models\Events;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsResource extends Resource
{
    protected static ?string $model = Events::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('serial-no')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('month')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('day')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('start-date')
                    ->required(),
                Forms\Components\DatePicker::make('end-date')
                    ->required(),
                Forms\Components\Textarea::make('info')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('note')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('has_email')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('serial-no')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('month')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('day')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start-date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end-date')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('has_email')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvents::route('/create'),
            'edit' => Pages\EditEvents::route('/{record}/edit'),
        ];
    }
}
