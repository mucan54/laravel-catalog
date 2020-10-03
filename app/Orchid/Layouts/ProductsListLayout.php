<?php

namespace App\Orchid\Layouts;

use App\Models\Products as ModelsProducts;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use SimpleSoftwareIO\QrCode\Generator;

class ProductsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'products';
    

    protected $allowedFilters = [
        'name',
        'sku',
        'category'
    ];

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        

        return [
            TD::set('Ürün QR')
                ->render(function (ModelsProducts $products) {
                     $qrcode = new Generator;
                    return '<a href=\'test\'>'.$qrcode->size(80)->generate(url("/qr/".$products->sku."/".substr(md5($products->sku), 0, 5))).'</a>';
                }),
                TD::set('Ürün Resmi')
                ->render(function (ModelsProducts $products) {
                    return '<img src=\''.$products->hero().'\' height=\'80px\'>';
                }),
            TD::set('name', 'Ürün Adı')
                ->render(function (ModelsProducts $post) {
                    return Link::make($post->name)
                        ->route('platform.products.edit', $post);
                })->sort()->filter(TD::FILTER_TEXT),
            TD::set('sku', 'SKU')->sort()->filter(TD::FILTER_TEXT),
            TD::set('Kategori')->render(function (ModelsProducts $products) {
                return $products->cat->name;
            })->sort()->filter(TD::FILTER_TEXT),
            TD::set('created_at', 'Eklenme T.')->sort(),
            TD::set('updated_at', 'Düzenlenme T.')->sort(),
        ];
    }

}
