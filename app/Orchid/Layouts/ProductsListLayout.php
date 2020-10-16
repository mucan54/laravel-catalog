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
                    return '<a onclick="location.href =\'/admin/qrdownload/'.$products->sku.'\';">'.$qrcode->size(80)->generate(url("/qr/".$products->sku."/".substr(md5($products->sku), 0, 5))).'</a>';
                }),
                TD::set('Ürün Resmi')
                ->render(function (ModelsProducts $products) {
                    if($products->attachment()->first()!==null)
                    return '<img src=\''.$products->attachment()->first()->url().'\' height=\'100px\'>';
                    else
                    return '';
                }),
            TD::set('sku', 'SKU')
                ->render(function (ModelsProducts $post) {
                    return Link::make($post->sku)
                        ->route('platform.products.edit', $post);
                })->sort()->filter(TD::FILTER_TEXT),
            TD::set('created_at', 'Eklenme T.')->sort(),
            TD::set('updated_at', 'Düzenlenme T.')->sort(),
        ];
    }

}
