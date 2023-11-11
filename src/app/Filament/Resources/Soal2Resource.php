<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Soal2Resource\Pages;
use App\Filament\Resources\Soal2Resource\RelationManagers;
use App\Models\Soal2;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Soal2Resource extends Resource
{
    protected static ?string $model = Soal2::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //menampilkan form input
                TextInput::make('name')
                ->label('Name')
                ->required()
                ->maxLength(255),
                TextInput::make('stock')
                ->label('Stock')
                ->required()
                ->maxLength(255),
                TextInput::make('price')
                ->label('Price')
                ->required()
                ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //tampilkan untuk pagination
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('stock')->sortable()->searchable(),
                TextColumn::make('price'),
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
            'index' => Pages\ListSoal2s::route('/'),
            'create' => Pages\CreateSoal2::route('/create'),
            'edit' => Pages\EditSoal2::route('/{record}/edit'),
        ];
    }    
}
