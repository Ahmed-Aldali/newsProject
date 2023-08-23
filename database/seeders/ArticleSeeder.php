<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sport Articles
        $articles = new Article();
        $jsonTitle = [
            'ar' => 'ساديو ماني يوقع للنصر',
            'en' => 'Sadio Mane signs for AlNaser'
        ];
        $jsonShortDec = [
            'ar' => 'كشف مصدر في نادي النصر السعودي ، أن السنغالي ساديو ماني، نجم نادي بايرن ميونخ وقع على عقود انتقاله إلى العالمي.',
            'en' => 'A source in the Saudi Al-Nasr club revealed that Senegalese Sadio Mane, the star of Bayern Munich, signed his transfer contracts to the world.'
        ];
        $jsonLongDec = [
            'ar' => 'كشف مصدر في نادي النصر السعودي لكووورة، أن السنغالي ساديو ماني، نجم نادي بايرن ميونخ وقع على عقود انتقاله إلى العالمي.
            وكانت شبكة "سكاي سبورت" الألمانية، قد ذكرت أن ماني الذي يتواجد مع بايرن في جولته التحضيرية في سنغافورة، قد يسافر مباشرة إلى الرياض بعد نهاية الجولة التحضيرية يوم الأحد، من أجل إنهاء صفقة انتقاله للنصر. ',
            'en' => 'A source in the Saudi Al-Nasr Club revealed to Koura that Senegalese Sadio Mane, the star of Bayern Munich, signed his transfer contracts to the world.
            And the German "Sky Sport" network had reported that Mane, who is with Bayern on his preparatory tour in Singapore, may travel directly to Riyadh after the end of the preparatory tour on Sunday, in order to finalize his transfer to Al-Nasr.'
        ];


        $articles->image = 'sport1.jpg';
        $articles->title = json_encode($jsonTitle);
        $articles->short_description = json_encode($jsonShortDec);
        $articles->full_description = json_encode($jsonLongDec);
        $articles->category_id = '1';
        $articles->author_id = '6';

        $tagNames = ['النصر','ساديو_ماني','السعودية'];
        $value = array_values(array_unique($tagNames));
        $articles->tags = json_encode($value); 

        $articles->save();

        // -----------------
        $articles = new Article();
        $jsonTitle = [
            'ar' => 'عرض هزيل يبقي ماجواير في اليونايتد',
            'en' => 'A meager show keeps Maguire at United'
        ];
        $jsonShortDec = [
            'ar' => 'رفض مانشستر يونايتد، اليوم الجمعة، عرضًا من وست هام، بقيمة 20 مليون إسترليني، لضم المدافع هاري ماجواير.',
            'en' => "Manchester United rejected West Ham's £20m bid for defender Harry Maguire on Friday."
        ];
        $jsonLongDec = [
            'ar' => 'رفض مانشستر يونايتد، اليوم الجمعة، عرضًا من وست هام، بقيمة 20 مليون إسترليني، لضم المدافع هاري ماجواير

            وبحسب صحيفة "ذا أتلتيك"، يبحث النادي اللندني عن تدعيم صفوفه هذا الصيف، عقب رحيل ديكلان رايس لصفوف آرسنال مقابل 105 ملايين إسترليني.

            ويرغب ديفيد مويس، مدرب وست هام، في ضم ماجواير، إلا أن هناك شكوكًا حول استمرار المطارق في المفاوضات، بالنظر إلى ارتفاع أجره إلى جانب المطالب المادية المرتفعة التي يريدها مانشستر يونايتد، إضافة إلى عدم اتضاح مدى رغبة المدافع نفسه في الانتقال',
            'en' => 'Manchester United rejected today, Friday, a £ 20 million offer from West Ham for defender Harry Maguire.

            According to The Athletic, the London club is looking to bolster its ranks this summer, following the departure of Declan Rice to Arsenal for 105 million pounds.

            David Moyes, West Ham coach, wants to include Maguire, but there are doubts about the continuation of the Hammers in negotiations, given the high wages in addition to the high material demands that Manchester United want, in addition to the lack of clarity over the desire of the defender himself to transfer.'
        ];


        $articles->image = 'sport2.jpg';
        $articles->title = json_encode($jsonTitle);
        $articles->short_description = json_encode($jsonShortDec);
        $articles->full_description = json_encode($jsonLongDec);
        $articles->category_id = '1';
        $articles->author_id = '6';

        $tagNames = ['مانشتر_يونايتد','ماجواير','بريميرليج'];
        $value = array_values(array_unique($tagNames));
        $articles->tags = json_encode($value); 

        $articles->save();

// -----------------

// $articles = new Article();
// $jsonTitle = [
//     'ar' => '',
//     'en' => ''
// ];
// $jsonShortDec = [
//     'ar' => '',
//     'en' => ""
// ];
// $jsonLongDec = [
//     'ar' => '',
//     'en' => ''
// ];


// $articles->image = 'sport2.jpg';
// $articles->title = json_encode($jsonTitle);
// $articles->short_description = json_encode($jsonShortDec);
// $articles->full_description = json_encode($jsonLongDec);
// $articles->category_id = '1';
// $articles->author_id = '6';

// $tagNames = ['',''];
// $value = array_values(array_unique($tagNames));
// $articles->tags = json_encode($value); 

// $articles->save();










 // technology
 $articles = new Article();
        $jsonTitle = [
            'ar' => 'شاهد- إزالة شعار الطائر الأزرق من مبنى تويتر.. هل أخذ ماسك الشعار من ميتا؟
            ',
            'en' => 'Watch - removing the blue bird logo from the Twitter building.. Did he take the logo mask from Mita?'
        ];
        $jsonShortDec = [
            'ar' => 'تداول عدد من المدونين والعاملين في تويتر مقاطع فيديو لإزالة شعار الطائر الأزرق التقليدي والاستعاضة عنه بالعلامة التجارية الجديدة "إكس" (X) من واجهة المبنى الرئيسي في الولايات المتحدة',
            'en' => 'A number of bloggers and Twitter workers circulated videos to remove the traditional blue bird logo and replace it with the new brand "X" (X) from the facade of the main building in the United States.'
        ];
        $jsonLongDec = [
            'ar' => 'تداول عدد من المدونين والعاملين في تويتر مقاطع فيديو لإزالة شعار الطائر الأزرق التقليدي والاستعاضة عنه بالعلامة التجارية الجديدة "إكس" (X) من واجهة المبنى الرئيسي في الولايات المتحدة.

            وأقر الملياردير الأميركي ومالك المنصة إيلون ماسك أول أمس الأحد تعديل شعار المنصة والاستعاضة عن الطائر الأزرق بحرف "إكس" أبيض على خلفية سوداء، وجاء ذلك بعد أشهر من إعلان ماسك تعديل اسم الشركة إلى "إكس كورب".

            ويستمد تويتر -الذي أُسّس في العام 2006- اسمه من صوت الطيور، واستخدم علامته التجارية منذ أيامه الأولى عندما اشترت الشركة سهم رمز لطائر أزرق مقابل 15 دولارا بحسب موقع "كرييتف بلوك".

            ووصف ماسك الشعار الجديد بأنه "حد أدنى من فن الديكور"، وأشار إلى أنه بموجب الهوية الجديدة للموقع ستطلق على المناشير تسمية "إكس"',
            'en' => 'A number of bloggers and Twitter workers circulated videos to remove the traditional blue bird logo and replace it with the new brand "X" (X) from the facade of the main building in the United States.

            Yesterday, Sunday, the American billionaire and owner of the platform, Elon Musk, approved the amendment of the platforms logo and the replacement of the blue bird with a white "X" on a black background, and this came months after Musk announced the amendment of the companys name to "XCorp".

            Twitter - which was founded in 2006 - derives its name from the sound of birds, and has used its trademark since its early days when the company bought a blue bird symbol share for $ 15, according to the "Creative Block" website.

            Musk described the new logo as "a minimum of decorative art," and indicated that, under the new identity of the site, the posts would be called "X".'
        ];


        $articles->image = 'technology1.jpg';
        $articles->title = json_encode($jsonTitle);
        $articles->short_description = json_encode($jsonShortDec);
        $articles->full_description = json_encode($jsonLongDec);
        $articles->category_id = '4';
        $articles->author_id = '7';

        $tagNames = ['twitter','تويتر'];
        $value = array_values(array_unique($tagNames));
        $articles->tags = json_encode($value); 

        $articles->save();






    }
}