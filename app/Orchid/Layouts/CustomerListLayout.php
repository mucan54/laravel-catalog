<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use App\Models\Customer;

class CustomerListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'customer';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('username', 'Kullanıcı ID')
            ->render(function (Customer $post) {
                return Link::make($post->username)
                    ->route('platform.customer.edit', $post);
        }),
            TD::set('name', 'Kullanıcı İsmi'),
            TD::set('email', 'Kullanıcı Mail'),
            TD::set('password', 'Şifre'),
            TD::set('created_at', 'Oluşturulma T.'),
            TD::set('updated_at', 'Değiştirilme T.'),
        ];
    }
}
