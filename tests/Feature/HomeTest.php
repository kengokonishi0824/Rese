<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    private static $isSetUp = false;

    protected function setUp() : void {
        parent::setUp();
        
        if(!self::$isSetUp) {
            Artisan::call('migrate:fresh --seed'); 
            self::$isSetUp = true;  
        }
    }

    /**
     * /homeにアクセスできるか確認する
     */
    public function testCanAccess()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    public function testIsRestrauntsDisplayed()
    {
        $response = $this->get('/');
        $restaurant = Restaurant::find(1);
        $response->assertSeeText($restaurant->name);
    }
}
