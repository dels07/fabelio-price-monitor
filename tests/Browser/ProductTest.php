<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductTest extends DuskTestCase
{
    public function test_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Fabelio Price Monitor')
                ->assertSee('Add New Link');
        });
    }

    public function test_create_page()
    {
        $url = 'https://fabelio.com/ip/taby-bench.html';

        $this->browse(function (Browser $browser) use ($url) {
            $browser->visit('/')
                ->clickLink('Add New Link')
                ->assertPathIs('/add')
                ->assertSee('Add Link for Price Monitor')
                ->assertSee('Fabelio Page URL (https://fabelio.com/ip/xxx)')
                ->assertSee('Add Link')
                ->assertSee('See Product List')
                ->type('url', $url)
                ->press('Add Link')
                ->assertSee('Successfuly add product link into system. See list')
                ->clickLink('See Product List')
                ->assertPathIs('/');
        });
    }

    public function test_show_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Show Details')
                ->assertPathIs('/1')
                ->assertSee('Product Information')
                ->assertSee('Images (click to enlarge)')
                ->assertSee('Price History')
                ->assertSee('Description')
                ->assertSee('Other Info')
                ->assertSee('Back to Product List')
                ->clickLink('Back to Product List')
                ->assertPathIs('/');
        });
    }
}
