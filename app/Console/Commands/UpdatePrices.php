<?php

namespace App\Console\Commands;

use App\Product;
use App\PriceHistory;
use Carbon\Carbon;
use Facades\App\Http\Services\FabelioService as Fabelio;
use Illuminate\Console\Command;

class UpdatePrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update price for fabelio products';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $products = Product::all();
        $ids = [];

        foreach ($products as $product) {
            if ($product->updated_at->diffInMinutes() >= 60) {
                // fetch for new price
                $price = Fabelio::getPriceUpdate($product->product_id);

                // update price in product
                Product::where('id', $product->id)->update(['price' => $price]);

                PriceHistory::insert([
                    'product_id' => $product->id,
                    'price' => $price,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $ids[] = $product->product_id;
            }
        }

        if (count($ids) > 0) {
            $this->info('Price for product(s) [' . implode(', ', $ids) . '] updated');

            return 1;
        }

        $this->info('No price update');

        return 0;
    }
}
