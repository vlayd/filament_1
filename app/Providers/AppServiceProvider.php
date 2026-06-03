<?php

namespace App\Providers;

use App\Filament\Commands\FileGenerators\Resources\CustomResourceFormSchemaClassGenerator;
use App\Filament\Commands\FileGenerators\Resources\CustomResourceInfolistSchemaClassGenerator;
use App\Filament\Commands\FileGenerators\Resources\CustomResourceTableClassGenerator;
use Filament\Commands\FileGenerators\Resources\Schemas\ResourceFormSchemaClassGenerator;
use Filament\Commands\FileGenerators\Resources\Schemas\ResourceInfolistSchemaClassGenerator;
use Filament\Commands\FileGenerators\Resources\Schemas\ResourceTableClassGenerator;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ResourceTableClassGenerator::class, CustomResourceTableClassGenerator::class);
        $this->app->bind(ResourceInfolistSchemaClassGenerator::class, CustomResourceInfolistSchemaClassGenerator::class);
        $this->app->bind(ResourceFormSchemaClassGenerator::class, CustomResourceFormSchemaClassGenerator::class);

        Table::configureUsing(function (Table $table) {
            $table
                ->striped()
                ->defaultSort('created_at', 'desc')
                ->reorderableColumns();
        });

        Column::configureUsing(function (Column $column) {
            $column->toggleable();
        });

        TextColumn::configureUsing(function (TextColumn $textColumn) {
            // $textColumn->alignCenter();
            if (Str::contains($textColumn->getName(), ['created_at', 'updated_at'])) {
                $textColumn->since();
            }

            if (Str::contains($textColumn->getName(), ['status'])) {
                $textColumn->badge();
            }

            if (Str::contains($textColumn->getName(), ['title', 'name', 'email'])) {
                $textColumn
                    ->searchable()
                    ->sortable();
            }
        });
    }
}
