<?php

namespace App\Filament\Resources\Events\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('background_image')
                    ->disk('public')
                    ->label(__('Image')),
                TextColumn::make('name')
                    ->searchable()
                    ->label(__('Name')),
                TextColumn::make('title')
                    ->searchable()
                    ->label(__('Title')),
                TextColumn::make('status')
                    ->searchable()
                    ->label(__('Status')),
                TextColumn::make('created_at')
                    ->since()
                    ->label(__('Created at')),
                TextColumn::make('updated_at')
                    ->label(__('Updated at')),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
