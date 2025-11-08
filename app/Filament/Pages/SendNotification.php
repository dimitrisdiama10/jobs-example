<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use BackedEnum;


class SendNotification extends Page 
{
    use InteractsWithSchemas;
    use InteractsWithFormActions;
    protected string $view = 'filament.pages.send-notification';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBell;

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill();
    }

       public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->required(),

                        Textarea::make('body')
                            ->required(),

                        Select::make('users')
                            ->multiple()
                            ->searchable()
                            ->getSearchResultsUsing(fn (string $search) => User::query()
                                ->where('name', 'like', "%{$search}%")
                                ->limit(50)
                                ->pluck('name', 'id')
                            )
                            ->getOptionLabelsUsing(fn (array $values) => User::query()
                                ->whereIn('id', $values)
                                ->pluck('name', 'id')
                            ),
                    ]),
            ])->statePath('data');
    }

     public function getFormActions(): array
    {
        return [
            Action::make('send')
                ->icon(Heroicon::OutlinedPaperAirplane)
                ->action(function (): void {
                    $data = $this->form->getState();

                    User::when($data['users'], fn (Builder $query, array $ids) => $query->whereIn('id', $ids))
                        ->chunkById(100, function (Collection $users) use ($data) {
                            Notification::make()
                                ->title($data['title'])
                                ->body($data['body'])
                                ->success()
                                ->sendToDatabase($users)
                                ->send();
                        });
                }),
        ];
    }

    }



