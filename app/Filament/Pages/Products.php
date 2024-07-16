<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Products extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static string $view = 'filament.pages.products';

    public function mount()
    {
        return true;
    }
}
