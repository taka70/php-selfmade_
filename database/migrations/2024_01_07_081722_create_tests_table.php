<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // テーブル作成
        Schema::create('countries', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // データ挿入
        DB::table('countries')->insert([
            ['id' => 1, 'name' => '北インド'],
            ['id' => 2, 'name' => '南インド'],
            ['id' => 3, 'name' => 'スリランカ'],
            ['id' => 4, 'name' => 'タイ'],
            ['id' => 5, 'name' => 'ネパール'],
            ['id' => 6, 'name' => 'パキスタン'],
            ['id' => 7, 'name' => 'カンボジア'],
            ['id' => 8, 'name' => 'ミャンマー'],
            ['id' => 9, 'name' => 'シンガポール'],
            ['id' => 10, 'name' => 'ドイツ'],
            ['id' => 11, 'name' => 'イギリス'],
            ['id' => 12, 'name' => 'フランス'],
            ['id' => 13, 'name' => '日本'],
        ]);

        // Prefectures テーブルの作成とデータ挿入
        Schema::create('prefectures', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('prefectures')->insert([
            ['id' => 1, 'name' => '北海道'],
            ['id' => 2, 'name' => '青森県'],
            ['id' => 3, 'name' => '岩手県'],
            ['id' => 4, 'name' => '宮城県'],
            ['id' => 5, 'name' => '秋田県'],
            ['id' => 6, 'name' => '山形県'],
            ['id' => 7, 'name' => '福島県'],
            ['id' => 8, 'name' => '茨城県'],
            ['id' => 9, 'name' => '栃木県'],
            ['id' => 10, 'name' => '群馬県'],
            ['id' => 11, 'name' => '埼玉県'],
            ['id' => 12, 'name' => '千葉県'],
            ['id' => 13, 'name' => '東京都'],
            ['id' => 14, 'name' => '山梨県'],
            ['id' => 15, 'name' => '神奈川県'],
            ['id' => 16, 'name' => '新潟県'],
            ['id' => 17, 'name' => '富山県'],
            ['id' => 18, 'name' => '石川県'],
            ['id' => 19, 'name' => '福井県'],
            ['id' => 20, 'name' => '長野県'],
            ['id' => 21, 'name' => '岐阜県'],
            ['id' => 22, 'name' => '静岡県'],
            ['id' => 23, 'name' => '愛知県'],
            ['id' => 24, 'name' => '三重県'],
            ['id' => 25, 'name' => '滋賀県'],
            ['id' => 26, 'name' => '京都府'],
            ['id' => 27, 'name' => '大阪府'],
            ['id' => 28, 'name' => '兵庫県'],
            ['id' => 29, 'name' => '奈良県'],
            ['id' => 30, 'name' => '和歌山県'],
            ['id' => 31, 'name' => '鳥取県'],
            ['id' => 32, 'name' => '島根県'],
            ['id' => 33, 'name' => '岡山県'],
            ['id' => 34, 'name' => '広島県'],
            ['id' => 35, 'name' => '山口県'],
            ['id' => 36, 'name' => '徳島県'],
            ['id' => 37, 'name' => '香川県'],
            ['id' => 38, 'name' => '愛媛県'],
            ['id' => 39, 'name' => '高知県'],
            ['id' => 40, 'name' => '福岡県'],
            ['id' => 41, 'name' => '佐賀県'],
            ['id' => 42, 'name' => '長崎県'],
            ['id' => 43, 'name' => '熊本県'],
            ['id' => 44, 'name' => '大分県'],
            ['id' => 45, 'name' => '宮崎県'],
            ['id' => 46, 'name' => '鹿児島県'],
            ['id' => 47, 'name' => '沖縄県'],
        ]);


        // spices テーブルの作成とデータ挿入
        Schema::create('spices', function ($table) {
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->string('effect', 50)->nullable();
            $table->string('subject', 50)->nullable();
            $table->string('habitat', 50)->nullable();
            $table->string('part', 50)->nullable();
            $table->string('alias', 100)->nullable();
            $table->string('characteristic', 255)->nullable();
            $table->string('photo', 50)->nullable();
            $table->timestamps(); // created_at と updated_at のカラムを作成
        });

        DB::table('spices')->insert([
            [
                'id' => 1,
                'name' => 'アニス／Anise',
                'effect' => '消化促進作用、鎮咳作用、鎮痛作用',
                'subject' => 'セリ科',
                'habitat' => '地中海東部沿岸、エジプト',
                'part' => '種子',
                'alias' => '茴芹（ういきん）',
                'characteristic' => '香りの主成分アネトールによる、個性的な甘い香味が特徴。紀元前４千年頃の古代エジプトでは、ミイラの防腐保存剤として使われていた。パンや菓子類との相性がいい。',
                'photo' => 'img/spice/Anise.png'
            ],
            [
                'id' => 2,
                'name' => 'カルダモン／Cardamom',
                'effect' => '消化促進',
                'subject' => 'ショウガ科',
                'habitat' => 'インド',
                'part' => '果実',
                'alias' => '小豆く(しょうずく)',
                'characteristic' => '甘くエキゾチックで、わずかに刺激性のある強い香り。「スパイスの女王」と呼ばれいる。北欧などでは、アルコール臭を消すためにカルダモンを噛む風習もある。',
                'photo' => 'img/spice/Cardamom.png'
            ],
            [
                'id' => 3,
                'name' => 'クミン／Cumin',
                'effect' => '整腸、解毒作用',
                'subject' => 'セリ科',
                'habitat' => 'エジプト',
                'part' => '種子',
                'alias' => '馬芹(うまぜり)、ジーラ',
                'characteristic' => 'カレーを思わせる、エスニックな芳香。長さ約5～6mmほどの長楕円形。世界各地で肉や野菜料理、煮物、',
                'photo' => 'img/spice/Cumin.png'
            ],
            [
                'id' => 4,
                'name' => 'クローブ／Clove',
                'effect' => '整腸、酸化・老化防止',
                'subject' => 'フトモモ科',
                'habitat' => 'モルッカ諸島（インドネシア）',
                'part' => 'つぼみ',
                'alias' => '丁字(ちょうじ)、丁香(ちょうこう)、 百里香(ひゃくりこう)',
                'characteristic' => '甘く濃厚な香りと刺激的な風味をもつ。つぼみが開花する直前に摘みとり、日陰に干して乾燥させ、スパイスとして利用。肉との相性がよく、カレー、ポトフなどによく使われる。',
                'photo' => 'img/spice/Clove.png'
            ],
            [
                'id' => 5,
                'name' => 'コリアンダー／Coriander',
                'effect' => '食欲増進、血液浄化',
                'subject' => 'セリ科',
                'habitat' => '地中海沿岸',
                'part' => '種子',
                'alias' => '香菜(シャンツァイ)、パクチー、カメムシソウ',
                'characteristic' => '種子は甘く爽やかでほのかにスパイシーな香り。葉、茎、根は強烈な臭気。数千年前の古代エジプト時代から、薬用や調味料として人類が用いてきた最古のスパイスのひとつ。',
                'photo' => 'img/spice/Coriander.png'
            ],
            [
                'id' => 6,
                'name' => 'サフラン／Saffron',
                'effect' => '鎮静、鎮痛、通経作用',
                'subject' => 'アヤメ科',
                'habitat' => '南ヨーロッパ、西アジア',
                'part' => '雌しべ',
                'alias' => '蕃紅花(ばんこうか)',
                'characteristic' => 'エキゾチックな芳香をもち、料理の黄色の色づけに使われる。1つの花から3本しかとれない雌しべの部分を1本1本を手で摘みとるため、世界一高価なスパイスと言われる。',
                'photo' => 'img/spice/Saffron.png'
            ],
            [
                'id' => 7,
                'name' => 'シナモン／Cinnamon',
                'effect' => '抗酸化作用、アンチエイジング',
                'subject' => 'クスノキ科',
                'habitat' => 'ベトナム',
                'part' => '樹皮',
                'alias' => '肉桂(にっけい)、桂皮(けいひ)、カシア',
                'characteristic' => '甘くエキゾチックな香り。幹や枝の皮をはぎ取り乾燥したもの。古代エジプトでは防腐作用があると考えられ、ミイラ作りにシナモンが使われていたというエピソードも。',
                'photo' => 'img/spice/Cinnamon.png'
            ],
            [
                'id' => 8,
                'name' => 'ターメリック／Turmeric',
                'effect' => '抗酸化作用、美肌',
                'subject' => 'ショウガ科',
                'habitat' => '熱帯アジア',
                'part' => '根茎',
                'alias' => 'ウコン、クルクマ',
                'characteristic' => '黄色い色素成分のクルクミンが含まれ、黄色の色づけに活躍。独特のやや土臭いような香りは、加熱することで弱まり、料理の味に厚みを与える。カレー粉の原料としても。',
                'photo' => 'img/spice/Turmeric.png'
            ],
            [
                'id' => 9,
                'name' => 'チリーペッパー／Chilli',
                'effect' => '血行促進、消化促進、新陳代謝促進',
                'subject' => 'ナス科',
                'habitat' => '熱帯アメリカ',
                'part' => '果実、葉',
                'alias' => 'レッドペッパー、唐辛子',
                'characteristic' => '世界中の様々な料理の辛みづけに広く用いられる。その数は3千近い品種に及ぶといわれる。15世紀末のコロンブスのアメリカ大陸到達によって世界中に広まったそう。',
                'photo' => 'img/spice/Chilli_pepper.png'
            ],
            [
                'id' => 10,
                'name' => 'ナツメッグ／Nutmeg',
                'effect' => '健胃薬、消化促進、美肌',
                'subject' => 'ニクズク科',
                'habitat' => 'モルッカ諸島（インドネシア）',
                'part' => '種子の仁',
                'alias' => 'にくずく（肉豆く）、にくずく花（肉豆く花）',
                'characteristic' => '甘くスパイシーで刺激のある香り。一ポンド（約454g）で13世紀末のイギリスでは羊3頭、14世紀末のドイツでは7頭の牝牛と交換できたほど、高価だった。',
                'photo' => 'img/spice/Nutmeg.png'
            ],
            [
                'id' => 11,
                'name' => 'パプリカ／Paprika',
                'effect' => '美肌、血中コレステロールのコントロール',
                'subject' => 'ナス科',
                'habitat' => '熱帯アメリカ',
                'part' => '果実',
                'alias' => 'ハンガリアンペッパー、スパニッシュペッパー、ピメント',
                'characteristic' => '鮮やかな赤色と甘さのある特有の香り。ビタミンCが多く含まれている。ポテトサラダやタコのマリネなど、色の淡い料理の仕上げに振ると華やかに。',
                'photo' => 'img/spice/Paprika.png'
            ],
            [
                'id' => 12,
                'name' => 'フェンネル／Fennel',
                'effect' => 'むくみ解消・デトックス、新陳代謝促進',
                'subject' => 'セリ科',
                'habitat' => '地中海沿岸',
                'part' => '葉、株元、種子',
                'alias' => '茴香（ういきょう）、小茴香（しょうういきょう）、フヌイユ',
                'characteristic' => '種子、葉ともに、アニスに似た個性的な甘い香りをもつ。広く魚料理に使われることから、タイム同様「魚のハーブ」と呼ばれることも。カレー粉の原料でもある。',
                'photo' => 'img/spice/Fennel.png'
            ],
           
        ]);

        // products テーブルの作成
        Schema::create('products', function ($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('price');
            $table->integer('country_id');
            $table->integer('reasonable');
            $table->integer('painfulness');
            $table->integer('local_taste');
            $table->string('product_text', 255)->nullable();
            $table->string('photo', 50)->nullable();
            $table->timestamps(); // created_at と updated_at のカラムを作成
        });

        // products テーブルへのダミーデータ挿入
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'スパイシー欧風ビーフカレー',
                'price' => 490,
                'country_id' => 13,
                'reasonable' => 2,
                'painfulness' => 2,
                'local_taste' => 1,
                'product_text' => null,
                'photo' => 'img/product/curry1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'グリーンカレー',
                'price' => 390,
                'country_id' => 4,
                'reasonable' => 1,
                'painfulness' => 3,
                'local_taste' => 3,
                'product_text' => null,
                'photo' => 'img/product/curry2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'プラウンマサラ（海老のクリーミーカレー）',
                'price' => 390,
                'country_id' => 2,
                'reasonable' => 1,
                'painfulness' => 1,
                'local_taste' => 2,
                'product_text' => null,
                'photo' => 'img/product/curry3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'キーマカレー',
                'price' => 290,
                'country_id' => 1,
                'reasonable' => 1,
                'painfulness' => 2,
                'local_taste' => 2,
                'product_text' => null,
                'photo' => 'img/product/curry4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'マトンのキーマカレー',
                'price' => 390,
                'country_id' => 1,
                'reasonable' => 1,
                'painfulness' => 2,
                'local_taste' => 2,
                'product_text' => null,
                'photo' => 'img/product/curry5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'ほたてと海老のビスクカレー',
                'price' => 490,
                'country_id' => 13,
                'reasonable' => 2,
                'painfulness' => 1,
                'local_taste' => 1,
                'product_text' => null,
                'photo' => 'img/product/curry6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'チキンティッカマサラ',
                'price' => 390,
                'country_id' => 11,
                'reasonable' => 1,
                'painfulness' => 1,
                'local_taste' => 1,
                'product_text' => null,
                'photo' => 'img/product/curry7.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'ケララチキン',
                'price' => 390,
                'country_id' => 2,
                'reasonable' => 1,
                'painfulness' => 1,
                'local_taste' => 2,
                'product_text' => null,
                'photo' => 'img/product/curry8.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'ゲーンパー（森のカレー）',
                'price' => 390,
                'country_id' => 4,
                'reasonable' => 1,
                'painfulness' => 2,
                'local_taste' => 3,
                'product_text' => null,
                'photo' => 'img/product/curry9.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'スパイシー欧風ビーフカレー',
                'price' => 490,
                'country_id' => 13,
                'reasonable' => 2,
                'painfulness' => 2,
                'local_taste' => 1,
                'product_text' => null,
                'photo' => 'img/product/curry10.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => '北インドのカレーセット',
                'price' => 590,
                'country_id' => 1,
                'reasonable' => 3,
                'painfulness' => 2,
                'local_taste' => 3,
                'product_text' => null,
                'photo' => 'img/product/curry11.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'name' => '南インドのカレーセット',
                'price' => 590,
                'country_id' => 2,
                'reasonable' => 3,
                'painfulness' => 2,
                'local_taste' => 3,
                'product_text' => null,
                'photo' => 'img/product/curry12.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        
        // stores テーブルの作成
        Schema::create('stores', function ($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('postal_code');
            $table->string('prefecture', 50);
            $table->string('address1', 50);
            $table->string('address2', 50);
            $table->integer('tel');
            $table->integer('user_id');
            $table->timestamps(); // created_at と updated_at のカラムを作成
        });

        // dishes テーブルの作成
        Schema::create('dishes', function ($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('price');
            $table->integer('country_id');
            $table->integer('reasonable');
            $table->integer('painfulness');
            $table->integer('local_taste');
            $table->string('dish_text', 255)->nullable();
            $table->integer('store_id');
            $table->string('photo', 50)->nullable();
            $table->timestamps(); // created_at と updated_at のカラムを作成
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('stores');
        Schema::dropIfExists('spices');
        Schema::dropIfExists('prefectures');
        Schema::dropIfExists('countries');
    }
};
