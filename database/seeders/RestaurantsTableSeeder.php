<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Prefecture;
use App\Models\Category;


class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '仙人',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'

    ];
    Restaurant::create($param);
        
    $param = [
            'name' => '牛助',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg'

    ];
    Restaurant::create($param);

    $param = [
            'name' => '戦慄',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => '気軽に立ち寄れる昔懐かしの大衆居酒屋です。キンキンに冷えたビールを、なんと199円で。鳥かわ煮込み串は販売総数100000本突破の名物料理です。仕事帰りに是非御来店ください。',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg'

    ];
    Restaurant::create($param);

    $param = [
            'name' => 'ルーク',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => '都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg'

    ];
    Restaurant::create($param);

    $param = [
            'name' => '志摩屋',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => 'ラーメン屋とは思えない店内にはカウンター席はもちろん、個室も用意してあります。ラーメンはこってり系・あっさり系ともに揃っています。その他豊富な一品料理やアルコールも用意しており、居酒屋としても利用できます。ぜひご来店をお待ちしております。',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg'

    ];
    Restaurant::create($param);

    $param = [
            'name' => '香',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => '大小さまざまなお部屋をご用意してます。デートや接待、記念日や誕生日など特別な日にご利用ください。皆様のご来店をお待ちしております。',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg'

    ];
    Restaurant::create($param);

    $param = [
            'name' => 'JJ',
            'prefecture_id' => Prefecture::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'overview' => 'イタリア製ピザ窯芳ばしく焼き上げた極薄のミラノピッツァや厳選されたワインをお楽しみいただけます。女子会や男子会、記念日やお誕生日会にもオススメです。',
            'picture' =>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg'

    ];
    Restaurant::create($param);
    }
}
