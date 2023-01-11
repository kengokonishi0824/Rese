<?php

namespace Tests\Feature;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RestaurantTest extends TestCase
{
    use RefreshDatabase; // テスト後にDBの状態をリセットする

    private static $isSetUp = false;

    protected function setUp() : void {
        parent::setUp();
        
        if(!self::$isSetUp) {
            Artisan::call('migrate:fresh --seed'); 
            self::$isSetUp = true;  
        }
    }

    /**
     * 名前の完全一致検索が正しく動くことを確認する
     *
     * @return void
     */
    public function testExactSearchRestaurntByName()
    {
        $restaurant = Restaurant::create([
            "name" => "foobar",
            "prefecture_id" => "1",
            "category_id" => "1"
        ]);
        $searchedByName = Restaurant::doSearch("foobar", null, null);

        $this->assertEquals(1, $searchedByName->count());
        $this->assertTrue($searchedByName->first()->is($restaurant));

        $restaurant->delete();
    }

    public function testPatternMatchSearchRestaurntByName()
    {
        $restaurant = Restaurant::create([
            "name" => "foobar",
            "prefecture_id" => "2",
            "category_id" => "2"
        ]);
        $searchedByName = Restaurant::doSearch("oob", null, null);

        $this->assertEquals($searchedByName->count(), 1);
        $this->assertTrue($searchedByName->first()->is($restaurant));
    }

    public function testAllNull()
    {
        $searchedByNull = Restaurant::doSearch(null, null, null);
        $this->assertEquals($searchedByNull, Restaurant::all());
    }

    public function testSpecialCharacter()
    {
        $searchedBy🤔 = Restaurant::doSearch("🤔", null, null);
        $this->assertEquals(0, $searchedBy🤔->count());
    }

    public function testInvalidPrefectureId()
    {
        $searchedByInvalid = Restaurant::doSearch(null, new Restaurant(), null);
        $this->assertEquals(0, $searchedByInvalid->count());
    }

    public function testInvalidCategoryId()
    {
        $searchedByInvalid = Restaurant::doSearch(null, null, "invalid_id");
        $this->assertEquals(0, $searchedByInvalid->count());
    }
}
