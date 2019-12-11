<?php

namespace App\Http\Services;

use Exception;
use Goutte\Client;

class FabelioService
{
    /**
     * Get Fabelio product information.
     *
     * @param string $url
     * @return array $json
     */
    public function getProductInfo(string $url)
    {
        if (!$url) {
            throw new Exception('url cannot be empty!');
        }

        $client = new Client;
        $crawler = $client->request('GET', $url);

        // scrap page for informations
        $productId = $crawler->filter('#productId')->attr('value');
        $title = $crawler->filter('.base')->extract(['_text'])[0];
        $altTitle = $crawler->filter('.page-title__secondary')->extract(['_text'])[0];
        $description = $crawler->filter('#description')->html();
        $additionalInfo = $crawler->filter('.product-info__attributes')->html();
        $price = $crawler->filter("#product-price-{$productId} > span")->extract(['_text'])[0];

        // post processing
        $description = str_replace(["<br>"], '', $description);
        $price = (int) str_replace(['Rp ', '.'], '', $price);

        // scrap image
        $images = file_get_contents("https://fabelio.com/swatches/ajax/media/?product_id={$productId}");

        $json = [
            'product_id' => $productId,
            'title' => $title,
            'alt_title' => $altTitle,
            'description' => $description,
            'additional_info' => $additionalInfo,
            'price' => $price,
            'url' => $url,
            'images' => $images
        ];

        return $json;
    }

    /**
     * Get Fabelio price update
     *
     * @param string $productId
     * @return integer $price
     */
    public function getPriceUpdate(string $productId)
    {
        if (!$productId) {
            throw new Exception('product id cannot be empty!');
        }

        $json = file_get_contents("https://fabelio.com/insider/data/product/id/{$productId}");
        $json = json_decode($json);

        $price = $json->product->unit_sale_price ?? $json->product->unit_price;
        $price = (int) str_replace('.00', '', $price);

        return $price;
    }
}
