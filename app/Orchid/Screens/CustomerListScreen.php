<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use App\Orchid\Layouts\CustomerListLayout;
use App\Models\Customer;


class CustomerListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'CustomerListScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'CustomerListScreen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'customer' => Customer::paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Create new')
                ->icon('pencil')
                ->route('platform.customer.edit')
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            CustomerListLayout::class
        ];
    }
}
