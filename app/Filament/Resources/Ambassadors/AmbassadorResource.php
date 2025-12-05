<?php

namespace App\Filament\Resources\Ambassadors;

use App\Filament\Resources\Ambassadors\Pages\CreateAmbassador;
use App\Filament\Resources\Ambassadors\Pages\EditAmbassador;
use App\Filament\Resources\Ambassadors\Pages\ListAmbassadors;
use App\Filament\Resources\Ambassadors\Pages\ViewAmbassador;
use App\Filament\Resources\Ambassadors\Schemas\AmbassadorForm;
use App\Filament\Resources\Ambassadors\Schemas\AmbassadorInfolist;
use App\Filament\Resources\Ambassadors\Tables\AmbassadorsTable;
use App\Models\Ambassador;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class AmbassadorResource extends Resource
{
    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->hasRole(['super-admin']);
    }
    protected static ?string $model = Ambassador::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Ambassadors';

    public static function form(Schema $schema): Schema
    {
        return AmbassadorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AmbassadorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AmbassadorsTable::configure($table);
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
            'index' => ListAmbassadors::route('/'),
            'create' => CreateAmbassador::route('/create'),
            'view' => ViewAmbassador::route('/{record}'),
            'edit' => EditAmbassador::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
