<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Soal1Resource\Pages;
use App\Filament\Resources\Soal1Resource\RelationManagers;
use App\Models\Soal1;
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
use Filament\Forms\Components\KeyValue;


class Soal1Resource extends Resource
{
    protected static ?string $model = Soal1::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //ini untuk form input
                TextInput::make('title')
                ->label('Title')
                ->required()
                ->maxLength(255),
                Textarea::make('description')
                ->label('Description')
                ->required()
                ->maxLength(255)
                ->autosize()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //menampilkan pagination
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('description'),
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
            'index' => Pages\ListSoal1s::route('/'),
            'create' => Pages\CreateSoal1::route('/create'),
            'edit' => Pages\EditSoal1::route('/{record}/edit'),
        ];
    }    
}
