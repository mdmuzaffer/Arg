<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;
class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $slider = [

            ['slider_type' => 1, 'title'=>'Free medical camp', 'description'=>'Free medical camps are events where healthcare professionals and volunteers offer medical services, consultations, and treatment to people who cannot afford to pay for medical care', 'language_code'=>'en', 'images'=>'admin/assets/img/slider/medical_camp.png', 'status' => 1],

            ['slider_type' => 2, 'title'=>'Get Set to Get Fit', 'description'=>'summer holidays around corner! Much awaited break for the children. Would you consider a unique summer camp for your teenage children aged between 10 to 15 years ?', 'language_code'=>'en', 'images'=>'admin/assets/img/slider/get_set.png', 'status' => 1],

            ['slider_type' => 3, 'title'=>'World wide health seminar', 'description'=>'There are many health seminars that take place worldwide, covering a wide range of topics related to health and wellness', 'language_code'=>'en', 'images'=>'admin/assets/img/slider/world_wide.png', 'status' => 1],

            ['slider_type' => 5, 'title'=>'Yoga compitation in the campus', 'description'=>'Yoga is primarily a practice for personal growth and development, and while there may be yoga competitions or events that focus on performance, the traditional principles of yoga do not encourage competition', 'language_code'=>'en', 'images'=>'admin/assets/img/slider/yoga.png','status' => 1],

             ['slider_type' =>1, 'title'=>'निःशुल्क चिकित्सा शिविर', 'description'=>'नि:शुल्क चिकित्सा शिविर ऐसे आयोजन हैं जहां स्वास्थ्य देखभाल पेशेवर और स्वयंसेवक उन लोगों को चिकित्सा सेवाएं, परामर्श और उपचार प्रदान करते हैं जो चिकित्सा देखभाल के लिए भुगतान नहीं कर सकते।', 'language_code'=>'hi','images'=>'admin/assets/img/slider/yoga.png','status' => 1],

             ['slider_type' =>1, 'title'=>'फिट होने के लिए तैयार हो जाइए', 'description'=>'गर्मियों की छुट्टियाँ नजदीक! बच्चों के लिए बहुप्रतीक्षित अवकाश। क्या आप 10 से 15 वर्ष की आयु के अपने किशोर बच्चों के लिए एक अनोखे ग्रीष्मकालीन शिविर पर विचार करेंगे?', 'language_code'=>'hi','images'=>'admin/assets/img/slider/get_set.png','status' => 1],

             ['slider_type' =>1, 'title'=>'विश्व व्यापी स्वास्थ्य सेमिनार', 'description'=>'दुनिया भर में कई स्वास्थ्य सेमिनार होते हैं, जिनमें स्वास्थ्य और कल्याण से संबंधित विविध विषयों को शामिल किया जाता है', 'language_code'=>'hi','images'=>'admin/assets/img/slider/world_wide.png','status' => 1],



            ['slider_type' =>1, 'title'=>'ಉಚಿತ ವೈದ್ಯಕೀಯ ಶಿಬಿರ', 'description'=>'ಉಚಿತ ವೈದ್ಯಕೀಯ ಶಿಬಿರಗಳು ಆರೋಗ್ಯ ವೃತ್ತಿಪರರು ಮತ್ತು ಸ್ವಯಂಸೇವಕರು ವೈದ್ಯಕೀಯ ಸೇವೆಗಳು, ಸಮಾಲೋಚನೆಗಳು ಮತ್ತು ವೈದ್ಯಕೀಯ ಆರೈಕೆಗಾಗಿ ಪಾವತಿಸಲು ಸಾಧ್ಯವಾಗದ ಜನರಿಗೆ ಚಿಕಿತ್ಸೆಯನ್ನು ನೀಡುವ ಘಟನೆಗಳಾಗಿವೆ', 'language_code'=>'kn','images'=>'admin/assets/img/slider/yoga.png','status' => 1],

             ['slider_type' =>1, 'title'=>'ಫಿಟ್ ಆಗಲು ಹೊಂದಿಸಿ', 'description'=>'ಮೂಲೆಯಲ್ಲಿ ಬೇಸಿಗೆ ರಜಾದಿನಗಳು! ಮಕ್ಕಳಿಗಾಗಿ ಬಹು ನಿರೀಕ್ಷಿತ ವಿರಾಮ. 10 ರಿಂದ 15 ವರ್ಷ ವಯಸ್ಸಿನ ನಿಮ್ಮ ಹದಿಹರೆಯದ ಮಕ್ಕಳಿಗಾಗಿ ಅನನ್ಯ ಬೇಸಿಗೆ ಶಿಬಿರವನ್ನು ನೀವು ಪರಿಗಣಿಸುತ್ತೀರಾ?', 'language_code'=>'kn','images'=>'admin/assets/img/slider/get_set.png','status' => 1],

             ['slider_type' =>1, 'title'=>'ವಿಶ್ವಾದ್ಯಂತ ಆರೋಗ್ಯ ವಿಚಾರ ಸಂಕಿರಣ', 'description'=>'ವಿಶ್ವಾದ್ಯಂತ ಅನೇಕ ಆರೋಗ್ಯ ವಿಚಾರ ಸಂಕಿರಣಗಳು ನಡೆಯುತ್ತಿದ್ದು, ಆರೋಗ್ಯ ಮತ್ತು ಕ್ಷೇಮಕ್ಕೆ ಸಂಬಂಧಿಸಿದ ವಿಷಯಗಳ ವ್ಯಾಪಕ ಶ್ರೇಣಿಯನ್ನು ಒಳಗೊಂಡಿದೆ', 'language_code'=>'kn','images'=>'admin/assets/img/slider/world_wide.png','status' => 1],

        ];

         foreach ($slider as $key => $value) {
            Slider::create($value);
        }
        
    }
}
