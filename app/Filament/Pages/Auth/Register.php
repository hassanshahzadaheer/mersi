<?php

namespace App\Filament\Pages;


use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;
use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister
{
    protected function getForms(): array
    {

        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getUserTypeFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getUserTypeFormComponent(): Component
    {
        return Select::make('user_type')
            ->label(__('User Type'))
            ->options([
                'government_client' => 'Government Client',
                'commercial_client' => 'Commercial Sector Client',
                'mersi_client' => 'Mersi Solutions SaaS Client',
            ])
            ->default('commercial_client')
            ->required();
    }

}
