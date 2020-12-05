<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Bland;
use App\Models\Users;
use App\Models\History;
use App\Models\Product;
use App\Models\Cart;
use Carbon\Traits\Date;
use App\Models\Category;
use Brick\Math\BigInteger;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //簡単なテストデータ用
        // Users::factory([
        //     'name' => 'test',
        //     'email' => 'test@test.com',
        // ])->create();

        $blands = [
            ['bland_name' => 'リーガル'],
            ['bland_name' => 'スコッチグレイン'],
            ['bland_name' => 'ユニオンインペリアル'],
            ['bland_name' => '三陽山長'],
            ['bland_name' => 'シェットランドフォックス'],
            ['bland_name' => 'エドワードグリーン'],
            ['bland_name' => 'チャーチ'],
            ['bland_name' => 'トリッカーズ'],
            ['bland_name' => 'クロケットジョーンズ'],
            ['bland_name' => 'ジョンロブ'],
        ];
        DB::table('blands')->insert($blands);

        $categories = [
            ['name_jp' => 'ストレートチップ'],
            ['name_jp' => 'ウイングチップ'],
            ['name_jp' => 'ダブルモンク'],
            ['name_jp' => 'ローファー'],
        ];
        DB::table('categories')->insert($categories);
        $sizes = [
            ['size' => '24.5'],
            ['size' => '25.0'],
            ['size' => '25.5'],
            ['size' => '26.0'],
            ['size' => '26.5'],
            ['size' => '27.0'],
            ['size' => '27.5'],
            ['size' => '28.0'],
            ['size' => '28.5'],
        ];
        DB::table('sizes')->insert($sizes);

        $blands = Bland::all();
        $sizes = Size::all();
        $categories = Category::all();

        $products = [
            [
                'product_name' => 'PETER D',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 85800,
                'detail' => '履き口部分を広くすることで着脱のしやすい仕様。バックルは英国的な雰囲気が出るようシンプルに、やや小ぶりのサイズ感が洗練された上品な足元を演出してくれます。
                ラストは甲が広くて踵が小ぶりという日本人の足型に合いやすい125ラストを採用。ソールには実用性と品の良さを兼ね備えた梅雨時期でも使いやすいダイヤモンドラバーソールを使用し、高いグリップ力を備えながら見た目はスマートに。アッパーに採用されたきめの細かい上質なブラックスエードは、履きこむごとに柔らかく味わい深くなっていきます。
                スーツやジャケパン、カジュアルスタイルまで、幅広い着こなしに合わせやすい汎用性の高い1足です。',
                'image' => 'public/img/products/20-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'FAWKES 3 D',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 83600,
                'detail' =>
                    'かかと周りにまでぐるりとコバがあしらわれたオールアラウンドグッドイヤーウェルト製法など、カントリーテイストを彷彿させるディテール。一般的なグッドイヤーウェルトではなく、アッパーをウェルトの上側に縫い付けたヴェルトショーン仕様を採用し、ホコリや雨水が入りにくい作りとなっています。ソールにはグリップ力があり悪路にも強いコマンドソールを使っているため、雨の日でも滑りにくくオールシーズン快適に歩くことができます。',
                'image' => 'public/img/products/01-0.jpg', //ばらけて入れていく
                'stock' => 10,
            ],
            [
                'product_name' => 'BRECON C',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'ラストは甲が広くて踵が小ぶりという日本人の足型に合いやすい125ラストを採用。ソールには実用性と品の良さを兼ね備えた梅雨時期でも使いやすいダイヤモンドラバーソールを使用し、高いグリップ力を備えながら見た目はスマートに。
                スーツやジャケパン、カジュアルスタイルまで、幅広い着こなしに合わせやすい汎用性の高い1足です。',
                'image' => 'public/img/products/02-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'DALIA WOMEN',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 81400,
                'detail' => 'エッジに施されたスタッズがアクセントになったサンダルDALIA(ダリア)。
                フロント2か所のワイドストラップと、バックストラップによりホールド感のある履き心地。また重厚感のあるルックスながらトゥの開きが程よい抜け感を演出してくれます。
                レザーは鹿革風に加工された、ソフトな質感の高級レザー「プレステージカーフ」を使用し、プレステージ(名声)が意味する通り気品さを感じさせます。アウトソールはレザー仕様となっており、通気性や吸湿性に優れ、履き込むにつれて馴染みがよくなります。',
                'image' => 'public/img/products/03-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'MALVERN C',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 80030,
                'detail' => 'トラディショナルな外羽根プレーントゥモデルのMALVERN C(マルバーン)。
                英国軍へ納入実績のあるラスト4436、通称“ミリタリーラスト”の復刻モデルです。アッパーレザーに傷・汚れ(水濡れ)にも強い大粒のシボが特徴のグレインカーフ、アウトソールにグリップ力のあるコマンドソールを採用することにより、荒れた路面や雨にも対応できるようにしています。また、大きめのヒールリフトとオールアラウンドグッドイヤーウェルト製法が堅牢性と安定性を向上させ、さらにダブルソールにすることにより、ヘビーユースにも耐えられ長く愛用することができます。',
                'image' => 'public/img/products/04-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'HUDSON',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78000,
                'detail' =>
                    'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーのメンズコレクション。「Purely Made in England」というポリシーを掲げるジョセフチーニーより。',
                'image' => 'public/img/products/05-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'FENCHURCH',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 48400,
                'detail' =>
                    '11028 LAST(木型)はチーニーが展開しているラストの中ではロングノーズです。パンチドキャップトゥがすっきりと端正な見映えになっていてドレススタイルには最適な1足。羽根部分のアデレード（竪琴型）と呼ばれる仕様は、ピンキングとパンチングを施したラインがアッパーの側面を横断していないので、サイドビューはすっきりとしたエレガントな印象。上から見ても横から見ても洒脱なクォーターブローグに仕上がっています。さりげない華やかさがあるデザインは幅広いビジネスシーンで活躍すること間違いありません。ビジネス用の2足目としても人気の高いモデルです。',
                'image' => 'public/img/products/06-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => '[限定]MAYAR C',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78100,
                'detail' => 'マイヤーのコンセプトは、「都会で履くエレガントなカントリーシューズ」。
                外羽根や独特のステッチワーク、かかと周りにまでぐるりとコバがあしらわれたオールアラウンドグッドイヤーウェルト製法など、カントリーテイストを彷彿させるディテールながら、ブラックのグレインカーフレザーを使用することで、エレガントさとタフさを兼ね備えました。ソールにはグリップ力があり悪路にも強いコマンドソールを採用し、雨の日でも滑りにくい仕様。さらにコバを、ホコリや水が浸入しにくいストームウェルト仕様にすることで、オールシーズン快適に歩くことが出来る全天候対応モデルを実現しました。
                雨の日でも気負うことなく履け、ジャケパンスタイルやジーンズスタイルとの相性も良く、数あるカントリーコレクションの中でも幅広いシチュエーションにマッチしてくれるシューズです。',
                'image' => 'public/img/products/07-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'FRANCIS',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 75900,
                'detail' => 'オン・オフでご使用いただけるクラシックかつトラディショナルな王道のセミブローグモデルのFRANCIS(フランシス)。
                16世紀頃のスコットランドやアイルランドで履かれたブローギング(飾り穴)が施された靴は、通気性や水はけを良くする工夫としてあしらわれ、今では装飾性の高い意匠となって継承されています。控えめながらも華やかさが感じられるブローギングとトゥのメダリオンからは英国テイストが醸し出されています。
                ',
                'image' => 'public/img/products/08-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'GEOFFREY',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 75900,
                'detail' => 'フォーマルスタイルにおける王道のストレートチップドレスシューズのGEOFFREY(ジェフェリー)。
                アッパーは、ボックスカーフ使いで足馴染みも良く、古くからある6184 LAST(木型)を採用。日本人の足にも相性の良い小ぶりなヒールカップ、細身のEウィズ仕様により心地の良いフィッティングとなっております。ややショートノーズに丸みを帯びたセミスクエアトゥが古き良き英国靴を彷彿とさせ、品格が感じられるデザインが特徴。ブラックのインソール、アウトソールの仕様によりグッとエレガントな印象となりドレススタイルに華を添えてくれます。
                ',
                'image' => 'public/img/products/09-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'ROGER',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 75900,
                'detail' => 'フォーマルスタイルにおすすめのクォーターブローグシューズのROGER(ロジャー)。
                アッパーは、ボックスカーフ使いで足馴染みも良く、古くからある6184 LAST(木型)を採用。日本人の足にも相性の良い小ぶりなヒールカップ、細身のEウィズ仕様により心地の良いフィッティングとなっております。ややショートノーズに丸みを帯びたセミスクエアトゥが古き良き英国靴を彷彿とさせ、品格が感じられるデザインが特徴。
                スーツスタイルとの相性が良く、優美なシルエットに適度な装飾が色気を感じさせてくれる大人の一足です。',
                'image' => 'public/img/products/10-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'CAIRNGORM H',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78000,
                'detail' => 'ジョセフ チーニーを代表するシューズ"CAIRNGORM 2R(ケンゴン)"にドレスとカジュアルの要素を融合したハイブリッドモデルが登場。
                外羽根や独特のステッチワーク、頑強なグッドイヤーウェルト製法など従来のケンゴンのディテールを残しつつ、ビジネスシーンでもお使いいただけるよう、内ハトメ仕様などスマートな要素を取り入れました。ラストは、ビジネスの代表125 LASTとカジュアルの代表12508 LASTの中間に位置する175 LASTを採用。ケンゴンのボリューム感はそのままにドレスとカジュアルの要素を融合することで、オンオフ問わず着用いただけます。また、コバはホコリや水が浸入しにくいストームウェルト仕様。雨の日にも履くことができる全天候対応モデルです。
                ',
                'image' => 'public/img/products/11-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'WILFORD JR',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 60803,
                'detail' => '16世紀頃のスコットランドやアイルランドで履かれたブローギング(飾り穴)が施された靴は、通気性や水はけを良くする工夫としてあしらわれ、今では装飾性の高い意匠となって継承されています。控えめながらも華やかさが感じられるブローギングとトゥのメダリオンからは英国テイストが醸し出されています。内羽根式のセミブローグは都会的な印象を与え、オンからオフまで幅広い着こなしに合わせることができます。ソールはエレガントにシングルレザー。
',
                'image' => 'public/img/products/12-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'DIPLOMAT(LAST 173) ',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 91300,
                'detail' => 'ラスト173を採用し、英国の風格が飾り穴から醸し出されるセミブローグモデルのDIPLOMAT(ディプロマット)。
                "外交官"の名を持つ、普遍的なオックスフォードシューズで、爪革やアイレットには精巧なブローグ(飾り穴)を施し、上品な装飾性で英国の風格を醸し出しています。すっきりした美しいシルエットに加え、インソールと中底の間に敷き詰められた練りコルクによって、履き心地の良さを実現。上質で柔らかいスエードのアッパーは、ウールスーツのビジネスシーンからチノパンやコーデュロイパンツなどのカジュアルなジャケパンスタイルまで幅広いスタイリングにあわせることが出来ます。',
                'image' => 'public/img/products/13-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'OLD',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 48400,
                'detail' =>
                    '装飾の少ないシンプルなデザインでスッキリとした、革の表情も楽しめるプレーントゥシューズのOLD(オールド)。 ロングノーズの木型を引き立てる2アイレット・Vフロントのパターンはスーツスタイルを足元から綺麗に見せてくれます。シティコレクションの中で最もベーシックでオールマイティな一足。外羽プレーントゥは、足に対しての調節幅が広く履きやすいので、外回りの多いビジネスマンを支えてくれるアイテムです。',
                'image' => 'public/img/products/14-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'PENZANCE 2',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 48439,
                'detail' => 'カーフレザーをアッパーに使用したグルカサンダルのPENZANCE 2(ペンザス 2)。
                グッドイヤーウェルテッド製法特有の足馴染みの良さと全敷のインソールでクッション性が良く、素足で履いても疲れ難い一足。凹凸感があるシボ革が表示豊かで、どこか上品でエレガント。肌の見える面積が少ないグルカサンダルはサンダルが苦手な方でも取り入れやすく、靴下の柄や色でコーディネートを楽しめるのも魅力の一つです。',
                'image' => 'public/img/products/15-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'CARTMEL(LAST173) ',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 91300,
                'detail' => '英国を代表する老舗シューズブランドチャーチより、上品でクラシックなイメージのラスト173を使用したダービーキャップトゥシューズ。
                チャーチのドレスシューズ「コンサル」などの定番に長く使用されているラストで、ほどよく丸みを帯びたトゥシェイプからクラシックな印象が漂います。エレガントで美しいレザーによるアッパーが、洗練されたデザインをさらに印象付けています。
                上品でバランスのよい仕上がりは正統派の英国靴さながら。外羽根式のシューズであるため、コンサル(内羽根式)と比較したときに、よりジャケパンスタイルと相性が良く、幅広いシーンで活躍してくれます。',
                'image' => 'public/img/products/16-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'BUCKINGHAM',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 87106,
                'detail' => 'ビスポークシューズの雰囲気を感じさせる特別仕様で英国のクラフトマンシップをご堪能いただける一足。程よい長さのロングノーズシルエットにバランスの良い甲の高さ、イギリスの伝統らしさが光るやや膨らみのあるエッグトゥ。それでいて絶妙にシェイプが利いた幅から得られる総合的なフィット感は、チーニーの中でも格別タイトフィットな仕上がり。足に吸い付くような至高のフィット感が得られます。また、アウトソール素材にオークバークを採用している点もピスポーク仕様を語る上では見逃せません。樫の木の樹脂から抽出したタンニンを時間を掛けて丁寧に鞣すことで、しなやかさと優れた耐久性が生まれます。屈強性に富んだソールは、摩擦にも強くすり減りが少ないのがポイントです。
                装飾を省くことで洗練されたエレガントな一足。ステッチの開始点を深くすることで、縦のラインが強調され、よりロングノーズのシルエットを引き立てます。',
                'image' => 'public/img/products/17-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'HOLYROOD',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 87100,
                'detail' => 'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーのメンズコレクション。「Purely Made in England」というポリシーを掲げるジョセフチーニーのインペリアルコレクション、ストレートチップシューズHOLYROOD(ホーリーロード)。
                コバの張り出しを少なくした、非常にエレガントなダブルモンクシューズ。バックルはシルバーを採用することで、メリハリのある足元を生み出します。甲周りをホールドするモンクストラップは通常よりも幅が狭く曲線美ある華奢な印象。ストラップの各パーツの形状をシャープに仕上げており、美しさと上品さに拘った細かな配慮があらゆる場所に施されています。
                光沢感のあるシルバーバックルがスタイリングに更なる高級感を与え、スーツ、ジャケットスタイルをよりエレガントに仕上げてくれます。',
                'image' => 'public/img/products/18-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'HARRY',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78100,
                'detail' => '伝統的な製法、技術により靴をつくり続けるジョセフ チーニーのタッセルローファーHARRY(ハリー)。
                木型にはラスト214を採用しスマートなルックス。細身のトゥで、定番のローファー「ハドソン」や「ハワード」よりも甲の高さが抑えられています。
                甲革のエッジ部分（足首に一番近いところ）は華麗なる曲線を描き、履き口に沿って通された革紐は見る者を惹きつけるデザイン。また、甲と同じモカシン縫いが踵の両サイドにおいても施され、ジョセフ チーニーの確かな職人技が感じられます。ソールにはレザーソールを採用してとことんシックに。
                どの角度から注目されたとしても隙がない万全なローファーは、カジュアルシーンだけでなく、ビジネスシーンにおいても積極的に取り入れることができる一足です。',
                'image' => 'public/img/products/19-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'BROAD II',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 48100,
                'detail' => 'オーセンティックで、バランスのいいウィングチップシューズのBROAD ??(ブロード)。
                ロングノーズの木型のエレガントな印象と、足元を華やかに見せるブローギングの相性がよくスタイリッシュに仕上がります。フルブローグとしては主張が強すぎないメダリオンとブローギングのデザインはスーツスタイルやジャケパンスタイルとも好相性。ビジネスユースとしても、休日の上品カジュアルなコーディネートにも使えるため登場回数が多くなりそうな一足です。',
                'image' => 'public/img/products/20-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'CAIRNGORM 2R/',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 81000,
                'detail' => 'トラディショナルな外羽根キャップトゥモデルのCAIRNGORM 2R(ケンゴン)。
                無骨ながら愛嬌のある表情とミルスペックを満たす履き心地。外羽根でアイレット、踵に向かって落ちるV字の切り替え、独特のステッチワーク、表情が絶妙なシボ感、頑強なグッドイヤーウェルト製法、ヴェルトショーン仕様等まさに“カントリーシック”な1足。重厚な見た目からは想像できない、柔らかな足あたりと履き心地の良さも大きな特徴の一つ。日常使いから、カジュアルなビジネスシーンまでお使いいただける頼りがいのある１足。そして、ロゴにブーツメーカーと冠するチーニーが生み出した唯一無二の１足となっています。',
                'image' => 'public/img/products/21-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'LIME',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 40000,
                'detail' => 'ジョセフチーニーのストレートチップモデルLIME(ライム)。
                ロングノーズのエレガントな雰囲気が漂いながらもボールジョイントに比較的ゆとりがある11028 LAST(木型)。「本格的な英国靴をより多くの方に着用してほしい」というメーカーの願いから生み出されたシティコレクション。ライムはその中でキャップトゥのデザインで最もクラシックなデザイン。冠婚葬祭に対応できる1足であり、様々なビジネスシーンでも対応できる汎用性の高さが魅力の一足。アッパー部分のステッチのきめ細やかさもディテールを一層際立たせます。',
                'image' => 'public/img/products/22-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'FENCHURCH',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 64900,
                'detail' => 'シティコレクションのクォーターブローグモデルFENCHURCH(フェンチャーチ)。
                11028 LAST(木型)はチーニーが展開しているラストの中ではロングノーズです。パンチドキャップトゥがすっきりと端正な見映えになっていてドレススタイルには最適な1足。羽根部分のアデレード（竪琴型）と呼ばれる仕様は、ピンキングとパンチングを施したラインがアッパーの側面を横断していないので、サイドビューはすっきりとしたエレガントな印象。上から見ても横から見ても洒脱なクォーターブローグに仕上がっています。さりげない華やかさがあるデザインは幅広いビジネスシーンで活躍すること間違いありません。ビジネス用の2足目としても人気の高いモデルです。',
                'image' => 'public/img/products/23-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'ALDERTON',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 48100,
                'detail' => '外羽根ながらプレーントゥでフォーマルな印象のALDERTON(アルダートン)。
                1886 コレクションでは、アッパーのレザーを従来よりさらにキメの細かい上質なカーフを使用しライニングからアウトソールまで全てブラックに統一。ヒールカップが小ぶりなため、各コレクションの中でもフィット感は抜群。クラッシックな顔つきでありながら、どこかモードな雰囲気を感じられます。またアウトソールのダブルソール仕様が、堅牢で耐久性に優れたものにし、見た目のボリューム感を引き出しています。履き込むことで自分の足に馴染み、履けば履くほどシューズの良さを体現できるコレクションです。外羽根式のデザインは、ビジネスシーンから、カジュアルシーンでまで幅広い着こなしが出来る、バランスの取れた1足となっています。',
                'image' => 'public/img/products/24-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'ASTWELL/',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'ブローグが施された一本ラインが入るパンチドキャップトゥのASTWELL(アストウェル)。
                1886 コレクションでは、アッパーのレザーを従来よりさらにキメの細かい上質なカーフを使用しライニングからアウトソールまで全てブラックに統一。ヒールカップが小ぶりのため、各コレクションの中でもフィット感は抜群。クラッシックな顔つきでありながら、どこかモードな雰囲気を感じられます。またアウトソールのダブルソール仕様が、堅牢で耐久性に優れたものにし、見た目のボリューム感を引き出しています。履き込むことで自分の足に馴染み、履けば履くほどシューズの良さを体現できるコレクション。外羽根式のデザインの為、オンからオフまで幅広い着こなしに合わせることができる１足です。',
                'image' => 'public/img/products/25-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'AVON C',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 81400,
                'detail' => '大振りな飾り穴がカントリーテイストを一層引き立てるAVON C(エイボンC)。
                バランスの良いフォルムに穴取りの大きいブローグ、ぽってりとしたラウンドトゥ、頑強なグッドイヤーウェルト製法、厚みのあるソールなど、無骨さと洗練さを兼ね備えたトラディショナルなカントリーシューズ。アッパーレザーに傷・汚れ(水濡れ)にも強い大粒のシボが特徴のグレインカーフ、アッパーとソールの隙間をふさぐように取り付けられたスプリットウェルト、さらにアウトソールにはグリップ力のあるコマンドソールを採用することにより、荒れた路面や雨にも対応できるようにしています。

                ブローギングのないミリタリーシューズが武骨でたくましい印象なのに対して、こちらは素朴でクラシックな顔つきが魅力。上品なウールパンツからラギッドなデニムまで幅広くマッチします。ヨーロッパでは以前から高い人気を博してきたモデルで、日本でも近年注目度が高まっているモデルです。',
                'image' => 'public/img/products/26-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'GRAFTON (LAST 173)',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 103400,
                'detail' => 'チャーチ愛用者はご存知の方も多い外羽根式フルブローグの名作GRAFTON(グラフトン)。
                ストームウェルト仕様で、ほんのりとカントリージェントルマンな趣きを漂わせています。コバをぐるりと一周するストームウェルト仕様は、汚れや水の侵入を防ぎ、程よくバランスのとれたボリューム感を演出。厚さ1cmほどのダブルソールや、耐久性にも優れているポリッシュドバインダーカーフなどのタフなデザインは、天候に左右されることなく履くことができます。
                スーツスタイルからデニムなどのカジュアルスタイルまで幅広いコーディネートに合う一足で',
                'image' => 'public/img/products/27-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => '商品29',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => 'aaa',
                'image' => 'public/img/products/28-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'CHETWYND (LAST 173) /',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 96800,
                'detail' => 'オーセンティックで、バランスの取れたウィングチップのCHETWYND(チェットウィンド)。
                世界的にも有名なウィングチップモデルで、ビジネスシーンからカジュアルシーンまで汎用性の高さも人気の理由。長年、愛用する事で足に馴染み欠かせない一足となるでしょう。特にブラウン系のエボニーカラーはカジュアルシーンでも使われることも多く、グレースーツからコットンチノパンツなど幅広くコーディネートが可能なところも非常に魅力的。
                トゥ付近は、ラスト73ゆずりのフォルム。角ばりすぎず、丸すぎずで、バランスの良い仕上がりになっています。全体としてクラシック過ぎない印象は、ラスト100を彷彿とさせるもの。ラスト173は、チャーチの歴史を築いてきた名ラストのDNAを受け継いでいます。
                ',
                'image' => 'public/img/products/29-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'ALFRED',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78100,
                'detail' => 'オックスフォードといわれる1番人気で定番のストレートチップモデルALFRED(アルフレッド)。
                キメの細かいカーフ素材が125 LAST(木型)に沿って優美な曲線を描いています。アルフレッドのデザインの最大の特徴はシンプルだからこそ際立つ、甲革の立上りの端正な美しさ。耐水性・耐久性に優れたグリップ力のあるダイナイトソール仕様のため、雨の日や歩行距離が長くなりそうな日にも心強い1足です',
                'image' => 'public/img/products/30-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'CONSUL',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 91300,
                'detail' => '
                ラスト173による優美なフォルムとトゥキャップのボリュームバランス、絶妙に張り出したコバも、まさに英国靴といった絶妙さ。靴好きならひと目でチャーチと分かるシルエットは、まさにブランドのアイコニックモデルと言っても過言ではありません。
                爪革にダブルステッチを施した上品なアッパーと、クォーターライニングによるすっきりとしたデザインが際立つ一方で、実用性にも優れた一足。エレガントなレザーソールも相まって、ビジネススタイルをより端正な姿に仕上げてくれることでしょう。トレンドを超越するタイムレスな、ブランドのアイコン的モデルです。当店でも定番の一つとしてシーズン問わず愛されているモデルで、冠婚葬祭でも問題なく使用できることから、モデル選びに迷われた際、このコンサルを選ばれる方も少なくはありません。',
                'image' => 'public/img/products/31-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'HUDSON',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 59400,
                'detail' => '
                ジョセフ チーニーのローファーラインナップにおいて最定番に位置づけられるモデルのHUDSON(ハドソン)。使われているラスト5203は、ブランドの定番に位置づけられるローファー専用のラスト。英国靴らしい程よい丸みとボリューム感があり、品格も十分に兼ね備えたフォルムが特徴。',
                'image' => 'public/img/products/31-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'WILFRED',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78100,
                'detail' => 'ビジネスシーンからカジュアルシーンにと幅広く使用できるセミブローグモデルのWILFRED(ウィルフレッド)。
                16世紀頃のスコットランドやアイルランドで履かれたブローギング(飾り穴)が施された靴は、通気性や水はけを良くする工夫としてあしらわれ、今では装飾性の高い意匠となって継承されています。控えめながらも華やかさが感じられるブローギングとトゥのメダリオンからは英国テイストが醸し出されています。内羽根式のセミブローグは都会的な印象を与え、オンからオフまで幅広い着こなしに合わせることができます。ソールに関しては気品がある雰囲気があり、使い込む事で経年変化が楽しめるシングルレザーソールです。
                MOCHAカラーは茶系の表現力に定評のあるジョセフ チーニーならではのカラ－となっております',
                'image' => 'public/img/products/32-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'CONSUL',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 91300,
                'detail' => 'ビジネスを含む幅広いシーンで活躍してくれるストレートチップのCONSUL(コンサル)。
                チャーチのドレスシューズの中でも代表的な1足です。足を入れたその時から姿勢が正される、クラシックなオックスフォードシューズの典型とも言える一足。イギリス人大使や政治家の多くがオックスフォードシューズを履いていたことにちなんでCONSUL(コンサル)"領事"と名付けられました。',
                'image' => 'public/img/products/34-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'NIRAH 2 WOMEN/',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 98600,
                'detail' => '
                人気モデル KETSBY(ケツビー)のアッパー部分をプレーンに、そしてコバ部分にスタッズ(メット)をはめ込んだモデルです。
                アッパーには定番のポリッシュドバインダーよりもやや光沢が抑えられたロイスカーフを使用しており、マニッシュさが抑えられた印象。ソールにはダイナイトソール（ゴム）を使用した本格仕様。雨の日でも安心してお使いいただけます。',
                'image' => 'public/img/products/35-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'WILFRED',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 105000,
                'detail' => '
                クラシカルな雰囲気に、人目を惹く斬新なデザインが、現代的でスタイリッシュな一足。英国紳士靴メーカーならではのトラッド&クラシカルな印象で、コーディネートの主役にも。パンツやスカート、ドレスに合わせても、上品さが漂うシューズです。',
                'image' => 'public/img/products/36-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'long tips',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 90000,
                'detail' => '
                スッキリとしたフォルムでプレーンなこのシューズは、スカートからパンツスタイルまで合わせやすく、流行にされないので長くお履きいただけます。ソールはラバーソール（ゴム製のソール）素材を使用しているため、滑りにくく初めてのレザーシューズとしても安心です。',
                'image' => 'public/img/products/01-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => '45491H',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 100000,
                'detail' => '1884年アメリカはマサチューセッツ州にて、Charles H.Alden氏によってスタートしたシューズメーカー【Alden】(オールデン)。
                ',
                'image' => 'public/img/products/02-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'N9402',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78000,
                'detail' => 'こちらの商品は手作業で製品を作り上げているため若干の色ムラ・しわ・大きさや
                ハンドステッチ等の不均一感、シューレース穴位置の非対称等見受けられる場合がございます。
                また天然素材（牛革）を使用しておりますため、
                使用する革の部位によりスウェードの毛羽立ち加減や風合いなどに個体差が見受けられたり、',
                'image' => 'public/img/products/03-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'Atlantic Works ',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 31900,
                'detail' => '定番のベネシャンモカシンに新色登場です。
                高い技術でモカシンを作り続けている全米でも数少ないファクトリー、Atlantic Worksに製作を依頼したカラーレスベネシャンモカシン。今シーズンは､ホーウィン社のクロムエクセルレザー“キャロライナブラウン” という色を採用しております｡ 肉厚ですが､革独自が持つしなやかな柔らかさと 馴染み易さ、プルアップレザーの独特な色の濃淡が特徴です｡
                90年代後半、BEAMS PLUSのオープン以前から現在まで10年以上販売を続けているベストセラーモデルであり、オリジナルデザインはフレンチカナディアンのヘビーウェイトレザーソールモカシンです。',
                'image' => 'public/img/products/04-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'SHIRLEY 55 WOMEN',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 86900,
                'detail' => '
                アッパーにはチャーチ定番のポリッシュ素材を使用。通常のカーフよりも光沢感が増しており、傷や汚れが付きにくく、お手入れもしやすい特徴があります。さらに、ヒールとソールにはラバーソール（ゴム製のソール）を使用しているため、滑りにくさはもちろん、水が靴の内部に侵入しにくい作りとなっているため、永くご愛用いただけます',
                'image' => 'public/img/products/05-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'PERLA',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 47700,
                'detail' => 'アッパーのゴールドカラービットモチーフが上品な印象をプラスしてくれるトラッドスタイル定番のローファー。
                ローファーのクラシックさをブラッシュアップさせ、パンプスのように履ける仕様に。甲部分のビットが女性らしさをプラスし、足元に添えるだけできちんとした上品な装いにしてくれます。ソールは実用性と品の良さを兼ね備えたダイヤモンドラバーソールを使用。
                シンプルなデザインは様々なアイテムとのスタイリングもしやすく、トレンドも気にせず履けるので永く愛用していただけます。',
                'image' => 'public/img/products/06-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'DALIA WOMEN',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 81400,
                'detail' => 'エッジに施されたスタッズがアクセントになったサンダルDALIA(ダリア)。
                フロント2か所のワイドストラップと、バックストラップによりホールド感のある履き心地。また重厚感のあるルックスながらトゥの開きが程よい抜け感を演出してくれます。
                レザーは鹿革風に加工された、ソフトな質感の高級レザー「プレステージカーフ」を使用し、プレステージ(名声)が意味する通り気品さを感じさせます。アウトソールはレザー仕様となっており、通気性や吸湿性に優れ、履き込むにつれて馴染みがよくなります。',
                'image' => 'public/img/products/07-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'RHONDA WOMEN',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 81400,
                'detail' => 'エッジに施されたスタッズがアクセントになったクロスサンダルRHONDA(ロンダ)。
                甲の上で大胆にクロスした太めのストラップと、シルバーのバッグルストラップが足元をクールに演出。 レザーは鹿革風に加工された、ソフトな質感の高級レザー「プレステージカーフ」を使用し、プレステージ(名声)が意味する通り気品さを感じさせます。アウトソールはレザー仕様となっており、通気性や吸湿性に優れ、履き込むにつれて馴染みがよくなります。
                適度なフィット感と安定感のあるローヒールにより歩きやすく、夏シーズンにはその使いやすさからつい手が伸びてしまいそうです。',
                'image' => 'public/img/products/08-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'KELSEY WOMEN',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78100,
                'detail' =>
                    '安定感のあるローヒールタイプ。洗練されたシルバートーンのバックルがアクセント。甲部分の編み込まれたレザーと、かかとのヒールカウンターが足をしっかりと包み込み、フィット感と歩行のしやすさを高めてくれます。更に、インソールとヒールにクッションが入っており、快適さと歩行の安定性を高めています。',
                'image' => 'public/img/products/09-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'NIRAH 2 WOMEN',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 100000,
                'detail' => '小振りなスタッズが大人の女性らしいエレガントさを放つサイドゴアブーツNIRAH 2(ニラ)。
                人気モデル KETSBY(ケツビー)のアッパー部分をプレーンに、そしてコバ部分にスタッズ(メット)をはめ込んだモデルです。',
                'image' => 'public/img/products/10-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'LORA',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50000,
                'detail' => 'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーに、待望のウィメンズコレクション。

                どんな場面でも活躍してくれるプレーントゥのLORA(ローラ)。チャーチSHANNON(シャノン)と比べると、よりサービスシューズに近いフォルムをしています。マニッシュスタイルにはもってこいのシューズです。幅は広くもなく、狭くもなくといったフィット感ですが、つま先の捨て寸が多めに取られているので、すっきりと細めでスタイリッシュなフォルムに仕上がっています。',
                'image' => 'public/img/products/11-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'FILEY',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 69400,
                'detail' => 'グットイヤー・ウェルト・シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーのウィメンズコレクション。
                ハンドクラフトでつくりあげられた春夏らしいシンプルなグルカサンダルFILEY(フィリー)。
                グッドイヤーウェルト製法によって作られ、履き込むことで自分の足に馴染み、フィット感が高まります。 ソールが磨り減ってしまった場合でも、修理やメンテナンスを行ってあげることで末永くご愛用いただけます。',
                'image' => 'public/img/products/12-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'MAYER',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 57000,
                'detail' =>
                    'グッドイヤーウェルト製法によって作られ、履き込むことで自分の足に馴染み、フィット感が高まります。 ソールが磨り減ってしまった場合でも、修理やメンテナンスを行ってあげることで末永くご愛用いただけます。',
                'image' => 'public/img/products/13-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'MILLY',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 85000,
                'detail' => 'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーに、待望のウィメンズコレクション。

                ブラックの内羽根式ウィングチップシューズMILLY(ミリー)はトラッドからモードまで、幅広い着こなしで活躍するアイテムです。 クラシックな飾り穴がスタイルに存在感を持たせてくれるので、デニムにはもちろん、その他のパンツやワンピースに合わせても大人の雰囲気を楽しめます。幅は広くもなく、狭くもなくといったフィット感ですが、つま先の捨て寸が多めに取られているので、すっきりと細めでスタイリッシュなフォルムに仕上がっています。',
                'image' => 'public/img/products/16-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'BONNIE',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 89000,
                'detail' => '
                ジョセフチーニーのウィメンズシューズはメンズシューズ同様に、レザーのカッティングからファイナルポリッシュまでの全工程をノーザンプトンの自社工場で完結。熟練の職人によって8週間で160以上の工程を経て作られています。グッドイヤーウェルト製法によって作られたシューズはソールの付け替えが可能なため永く愛用いただけます。',
                'image' => 'public/img/products/18-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'ORIBELLA(WHITE) WOMEN',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50000,
                'detail' => 'キルトタッセルが英国らしい雰囲気をかもしだすクラシックなORIBELLA(オリベラ)。
                ベルトに施されたさりげないブローギングが上品な雰囲気を引き出し、春夏にかけて汎用性の高いアイテムとなっています。',
                'image' => 'public/img/products/19-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'BONNIE  ',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 56000,
                'detail' => 'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーのウィメンズコレクション。

                トラッドスタイル定番のローファーBONNIE(ボニー)。ジョセフチーニーのメンズコレクションでは定番のアイテムです。ウィメンズのローファーはすっきり上品な印象。無骨に見えがちな甲のU字ステッチは革の立ち上がりが少ない縫製で、凹凸の少ないすべらかな仕上がりになっています。カジュアルさが抑えられた、あくまで上品な大人のローファーです。',
                'image' => 'public/img/products/20-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'BONNIE',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 56000,
                'detail' => 'トラッドスタイル定番のローファー。ジョセフチーニーのメンズコレクションでも定番のアイテムを女性らしいコンビカラーにアレンジしたBONNIE(ボニー)。すっきり上品な印象で、無骨に見えがちな甲のU字ステッチは革の立ち上がりが少ない縫製を採用することで、凹凸の少ないなめらかな仕上がりになっています。カジュアルさが抑えられた、あくまで上品な大人の女性に相応しいローファーです。
                ',
                'image' => 'public/img/products/21-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'MILLY',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 85000,
                'detail' => 'グットイヤー･ウェルト･シューズの生産地として名高い英国ノーサンプトンにて、伝統的な製法、技術により靴をつくり続けるチーニーに、待望のウィメンズコレクション。
                幅は広くもなく、狭くもなくといったフィット感ですが、つま先の捨て寸が多めに取られているので、すっきりと細めでスタイリッシュなフォルムに仕上がっています。',
                'image' => 'public/img/products/22-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'LANA WOMEN',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50900,
                'detail' => 'ダブルモンクとウィングチップが目を惹くLANA(ラナ)。
                どことなくメンズライクでトラッド感のある、いかにもチャーチらしい佇まいです。パンツスタイルに合わせてマニッシュに、膝下丈のふんわりスカートに合わせてガーリーにと、さまざまな履きこなしが楽しめます。靴下やカラータイツなど、レッグウエアとのコーディネートも楽しめるアイテムです',
                'image' => 'public/img/products/23-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'KETSBY WOMEN ',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 69000,
                'detail' => 'チャーチウィメンズの人気モデル、履いたり脱いだりしやすいサイドゴアタイプのウィングチップショートブーツKETSBY(ケツビー)。
                スッキリとしたフォルムに前後のメダリオンがクラシックさを演出するこのシューズは、スカートからパンツスタイルまで合わせやすく、流行にされないので長くお履きいただけます。ソールはラバーソール（ゴム製のソール）素材を使用しているため、滑りにくく初めてのレザーシューズとしても安心です。',
                'image' => 'public/img/products/24-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'ストレートチップ',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 30000,
                'detail' => 'オーセンティックなシルエットに拘ったハイクラスな革底ドレスシューズ。
                艶感のあるインポートレザーを贅沢し使用し、足当たりの優しいソフトな鏡面加工レザーです。',
                'image' => 'public/img/products/25-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'サイドゴアブーツ',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 32000,
                'detail' => 'グッドイヤーウエルト式製法で作られるゴアテックス フットウェアのリーガルならではの高付加価値ブーツです。
                少し厚めのアウトソール。重厚さとドレッシーな佇まいに拘りました。
                王道ドレス顔の機能ブーツです。',
                'image' => 'public/img/products/26-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'プレーントウ',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50000,
                'detail' => 'グッドイヤーウエルトの中物のコルクをクッション材のオーソライトに変更し、踏み込んだ時の沈み込む感覚が 新しい履き心地で、足なじみの早さもポイントのドレスシューズ。
                つま先裏のトラスニットで優しい足当たりを実現、カカトのパッドや型押しライニングでスポーティー要素もプラス。
                ビジネスシーンの中にコンフォタブル（快適）を提供する1足',
                'image' => 'public/img/products/28-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' =>
                    'M5633 BOURTON / MARRON ANTIQUE (DAINITE SOLE)',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 60000,

                'detail' => '1829年創業のTricker’sは革靴の聖地である英国ノーサンプトンで最古のシューズファクトリーとして、現在でも当時と変わらぬ伝統の技法を守り続けています。
                「質実剛健」と称されるそのものづくりは「ロイヤルワラント(英国王室御用達)」を授かるほどの職人技です。
                厳選された素材がもたらす味わい深いエイジングと履き込むほどに足に馴染むフィット感は大きな魅力です。',
                'image' => 'public/img/products/29-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'M2754 HENRY / 1001 BURNISHED',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 40000,
                'detail' => 'HENRYはサイドゴアのカントリーブーツ。
                カントリーブーツやカントリーシューズは、かつて英国の上流階級がカントリーサイド（田舎）に狩りに出かけていくために考案されたのが始まりと言われています。
                こちらのモデルはもともと水はけを良くするための仕様だったと言われるブローギング、水を侵入しにくくするストームウェルト、耐久性の高いダブルソールなど、その意匠を色濃く引き継ぎ、重厚かつエレガントな佇まいです。
                使用しているラストは「4444」で、幅にゆとりを持たせているのが特徴。',
                'image' => 'public/img/products/30-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'M6119 LAMBOURN / BLACK CALF (LEATHER SOLE)',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 10000,
                'detail' => '
                LAMBOURNはシンプルでエレガントなサイドゴアブーツ。
                セミスクエアトゥのシルエットと装飾のないミニマルなデザインに気品が漂います。
                ビジネスシーンにもカジュアルスタイルにもすんなりとマッチし、コーディネートを足元からぐっと引き締めてくれます。
                シューレースがないため脱ぎ履きがしやすく、足首回りがすっきりと収まります。
                ソールにはシングルレザーソールを採用し、ドレッシーな印象です。
                ',
                'image' => 'public/img/products/31-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' =>
                    'CHURCHILL / BLACK VELVET SILVER SKULL (HALF RUBBER SOLE)',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 100000,
                'detail' => 'そしてその「ロイヤルワラント」を授かるきっかけになったのが、このCHURCHILLというモデルであると言われています。
                CHURCHILLは、元々貴族や紳士達がルームシューズとして着用していたモデル。
                もともとが室内履きという出自ならではのリラックス感が魅力の一つです。',
                'image' => 'public/img/products/32-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'CHURCHILL / BLACK VELVET SILVER SKULL (HALF RUBBER SOLE)
                ',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 69000,
                'detail' => '
                そしてその「ロイヤルワラント」を授かるきっかけになったのが、このCHURCHILLというモデルであると言われています。
                CHURCHILLは、元々貴族や紳士達がルームシューズとして着用していたモデル。',
                'image' => 'public/img/products/32-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'L5679 ANNE / MARRON ANTIQUE (LEATHER SOLE)',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 50400,
                'detail' => '
                ANNEはTrickerらしさを感じさせるカントリーシューズです。
                カントリーブーツやカントリーシューズは、かつて英国の上流階級がカントリーサイド（田舎）に狩りに出かけていくために考案されたのが始まりと言われています。
                メンズの定番BOURTONよりも羽根（靴ひもを通す部分）からトゥまでが長いため、メンズとは若干異なる雰囲気です。
                ソールもメンズのダブルソールに対してレディースはシングルソールを使用。
                厚すぎず、程よいボリューム感がコーディネートの幅を広げてくれます。
                ソックスとの組み合わせも楽しめる短靴タイプは季節を問わず履いていただけるアイテムです。',
                'image' => 'public/img/products/34-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' =>
                    'L5679 ANNE / WHITE SCOTCH GRAIN (LEATHER SOLE)',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 87900,
                'detail' => '
                ウイングチップやメダリオンが英国らしい気品を感じさせるとともに、ラウンドトゥのシルエットやコバの張り出したソール周り、レースアップのディテールがワークテイストを演出します。
                レディースはメンズに比べてブローグ（穴飾り）の穴が小さく、やや上品な印象。
                メンズの定番BOURTONよりも羽根（靴ひもを通す部分）からトゥまでが長いため、メンズとは若干異なる雰囲気です。
                ソールもメンズのダブルソールに対してレディースはシングルソールを使用。
                ',
                'image' => 'public/img/products/36-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'L2754 SILVIA / BLACK CALF (COMMANDO SOLE)',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 40000,
                'detail' => 'すっきりした足首回りや着脱のしやすさはサイドゴアブーツならではです。
                ブリティッシュテイストを活かしたマニッシュなスタイルにはもちろん、スカートやワンピースなどの女性らしいアイテムとも好相性で、幅広いコーディネートに合わせていただけます。',
                'image' => 'public/img/products/10-0.jpg',
                'stock' => 10,
            ],
            [
                'product_name' => 'L7590 / ACORN ANTIQUE (DAINITE SOLE)',
                'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
                'bland_id' => $blands->pluck('id')[
                    rand(0, $blands->count() - 1)
                ],
                'category_id' => $categories->pluck('id')[
                    rand(0, $categories->count() - 1)
                ],
                'price' => 78900,
                'detail' => 'こちらのモデルはシングルストラップのフルブローグシューズです。
                ウイングチップやメダリオンが英国らしい気品を感じさせ、甲のキルティタンが端正な印象。
                自然な丸みのラウンドトゥで、マニッシュになりすぎない柔らかなシルエットに仕上がっています。

                ',
                'image' => 'public/img/products/11-0.jpg',
                'stock' => 10,
            ],
        ];

        DB::table('products')->insert($products);

        // foreach ($products as $product) {
        //     DB::table('products')->insert([
        //         [
        //             'product_name' => $product,
        //             'size_id' => $sizes->pluck('id')[
        //                 rand(0, $sizes->count() - 1)
        //             ],
        //             'bland_id' => $blands->pluck('id')[
        //                 rand(0, $blands->count() - 1)
        //             ],
        //             'category_id' => $categories->pluck('id')[
        //                 rand(0, $categories->count() - 1)
        //             ],
        //             'price' => 10000,
        //             'detail' => 'aaa',
        //             'image' => 'aaa',
        //             'stock' => 10,
        //         ],
        //     ]);
        // }
        // Product::factory()->create([
        //     'product_name' => $product,
        //     // 'bland_id' => $blands->pluck('id')[
        //     //     rand(0, $blands->count() - 1)
        //     // ],
        //     // 'category_id' => $categories->pluck('id')[
        //     //     rand(0, $categories->count() - 1)
        //     // ],
        //     // 'size_id' => $sizes->pluck('id')[rand(0, $sizes->count() - 1)],
        // ]);

        $users = Users::factory()->create([
            'email' => 'test@example.com',
        ]);

        // $users = Users::factory()
        //     ->times(2)
        //     ->create();
        // //======
        // //これ↓必要？→これがなかたら、historyの重複コレクションを作るときにエラーが出る
        // $products = Product::factory()
        //     ->times(2)
        //     ->create();
        // //======

        // foreach ($blands as $bland) {
        //     $bland = Bland::factory()->create([
        //         'bland_name' => $bland,
        //     ]);

        //     foreach ($sizes as $size) {
        //         $size = Size::factory()->create([
        //             'size' => $size,
        //         ]);
        //         foreach ($categories as $category) {
        //             $category = Category::factory()->create([
        //                 'name_jp' => $category,
        //             ]);
        //             Product::factory()->create([
        //                 'bland_id' => $bland->id,
        //                 'category_id' => $category->id,
        //                 'size_id' => $size->id,
        //             ]);
        //         }
        //     }
        // }

        // //Cartテーブルの重複したデータを持つロジ
        // foreach ($products as $index => $product) {
        //     if ($index > 0) {
        //         break;
        //     }
        //     foreach ($users as $user) {
        //         Cart::factory()
        //             ->times(2)
        //             ->create([
        //                 'user_id' => $user->id,
        //                 'product_id' => $product->id,
        //             ]);
        //     }
        // }

        // //Hitoryテーブルの重複したデータを持つロジ
        // foreach ($users as $index => $user) {
        //     if ($index > 0) {
        //         break;
        //     }
        //     foreach ($products as $product) {
        //         History::factory()
        //             ->times(2)
        //             ->create([
        //                 'user_id' => $user->id,
        //                 'product_id' => $product->id,
        //             ]);
        //     }
        // }
    }
}
//Productsの重複した外部キーデータを持つロジ
// foreach ($blands as $index => $bland) {
//     if ($index > 0) {
//         break;
//     }
//     foreach ($sizes as $index => $size) {
//         if ($index > 0) {
//             break;
//         }
//         foreach ($categories as $category) {
//             Product::factory()
//                 ->times(2)
//                 ->create([

//                     'bland_id' => $bland->id,
//                     'category' => $category->id,
//                     'size_id' => $size->id,
//                 ]);
//         }
//     }
// }

//Hitoryテーブルの重複したデータを持つロジ
// foreach ($users as $index => $user) {
//     if ($index > 0) {
//         break;
//     }
//     foreach ($products as $product) {
//         History::factory()
//             ->times(3)
//             ->create([
//                 //===
//                 'user_id' => $user->id,
//                 'product_id' => $product->id,
//                 //↑がよく分からん(解決済み)
//                 //$userのuser_idをHistoryテーブル内に重複してデータを作る？？
//                 //user_id=1 purchased_date 2020/11/11
//                 //user_id=1 purchased_date 2019/5/14 みたい感じ？
//                 //OK!!あってるぜ！
//                 //===

//             ]);
//     }
// }？？
