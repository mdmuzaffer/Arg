<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Therapy;

class TherapySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         $therapy = [

            ['department_id' =>3, 'group_id'=>0, 'therapy_name'=>'Cold Underwater Massage', 'description'=>'',  'order'=>1, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Neutral Underwater Massage', 'description'=>'', 'order'=>2, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Cold Hip Bath', 'description'=>'', 'order'=>3, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Cold Hip Bath', 'description'=>'',  'order'=>4, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Hot Hip Bath', 'description'=>'',  'order'=>5, 'is_default'=>0, 'status'=>'1'],

            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Neutral Hip Bath', 'description'=>'', 'order'=>6, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Cold Spinal Bath', 'description'=>'', 'order'=>7, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Hot Spinal Bath', 'description'=>'',  'order'=>8 ,'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Warm Spinal Bath', 'description'=>'',  'order'=>9, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Cold Spinal Spray', 'description'=>'', 'order'=>10, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Hot Spinal Spray', 'description'=>'',  'order'=>11, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Warm Spinal Spray', 'description'=>'',  'order'=>12, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Cold Foot Bath', 'description'=>'',  'order'=>13, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Hot Foot Bath', 'description'=>'',  'order'=>14, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Warm Foot Bath', 'description'=>'',  'order'=>15, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Cold Foot And Arm Bath', 'description'=>'',  'order'=>16, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Hot Foot And Arm Bath', 'description'=>'',  'order'=>17, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Warm Foot And Arm Bath', 'description'=>'',  'order'=>18, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Cold Circular Jet', 'description'=>'',  'order'=>19, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Douches', 'description'=>'',  'order'=>20, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Cold Immersion Bath', 'description'=>'',  'order'=>21, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Neutral Immersion Bath', 'description'=>'',  'order'=>22, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Hot Immersion Bath', 'description'=>'',  'order'=>23, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Steam Bath', 'description'=>'',  'order'=>24, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Sauna Bath', 'description'=>'',  'order'=>25, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Atapasnan', 'description'=>'',  'order'=>26, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Full Mud Bath', 'description'=>'',  'order'=>27, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Local Mud Apllication', 'description'=>'',  'order'=>28, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Mud Pack To Eye', 'description'=>'', 'order'=>29, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Mud Pack To Abdomen', 'description'=>'', 'order'=>30, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Ganji Turmeric Bath', 'description'=>'', 'order'=>31, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Local Application of Ganji Turmeric', 'description'=>'', 'order'=>32, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Mustard Pack', 'description'=>'',  'order'=>33, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Gastro Hepatic Pack', 'description'=>'',  'order'=>34, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Full Body Massage', 'description'=>'', 'order'=>35, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Leg Pack', 'description'=>'', 'order'=>36, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Throat Pack', 'description'=>'', 'order'=>37, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Arm Pack', 'description'=>'',  'order'=>38, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Salt Glow Massage', 'description'=>'', 'order'=>39, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Neutral Enema', 'description'=>'', 'order'=>40, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Cold Enema', 'description'=>'', 'order'=>41, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Neem Enema', 'description'=>'', 'order'=>42, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Oil Enema', 'description'=>'', 'order'=>43, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Sitz bath', 'description'=>'', 'order'=>44, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Sponge Bath', 'description'=>'', 'order'=>45, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Vibro Massage', 'description'=>'', 'order'=>46, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Partial Massage', 'description'=>'', 'order'=>47, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Hot Sand Fomentation', 'description'=>'', 'order'=>48, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Facial Steam', 'description'=>'', 'order'=>49, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Ice Massage', 'description'=>'',  'order'=>50, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Affusion', 'description'=>'',  'order'=>51, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Local Compresses', 'description'=>'', 'order'=>52, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Local Steam', 'description'=>'', 'order'=>53, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Colon Hydrotherapy', 'description'=>'', 'order'=>54, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Kidney Pack', 'description'=>'', 'order'=>55, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Oil application to whole body', 'description'=>'', 'order'=>56, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Ginger turmeric application', 'description'=>'', 'order'=>57, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Local oil application', 'description'=>'', 'order'=>58, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 3, 'group_id'=>0, 'therapy_name'=>'Infrared Radiation', 'description'=>'', 'order'=>59, 'is_default'=>0, 'status'=>'1'],


            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Vamana', 'description'=>'', 'order'=>60, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Virechana', 'description'=>'', 'order'=>61, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Yoga basti', 'description'=>'', 'order'=>62, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Kala basti', 'description'=>'', 'order'=>63, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Karma basti', 'description'=>'', 'order'=>64, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Matrabasti', 'description'=>'', 'order'=>65, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Nasya', 'description'=>'', 'order'=>66, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Sarvangaabhyanga', 'description'=>'', 'order'=>67, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Ekangaabhyanga', 'description'=>'', 'order'=>68, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Patrapindasweda', 'description'=>'',  'order'=>69, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Shashtikashaalipindasweda', 'description'=>'', 'order'=>70, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Churnapindasweda', 'description'=>'', 'order'=>71, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Valukasweda', 'description'=>'', 'order'=>72, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Udwartana', 'description'=>'', 'order'=>73, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Nadisweda', 'description'=>'', 'order'=>74, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Avagahasweda', 'description'=>'', 'order'=>75, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Ishtikaswedana', 'description'=>'', 'order'=>76, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Pattasweda', 'description'=>'',  'order'=>77, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Shirodhara', 'description'=>'',  'order'=>78, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Takradhara', 'description'=>'',  'order'=>79, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Sarvangadhara', 'description'=>'',  'order'=>80, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Ekangadhara', 'description'=>'',  'order'=>81, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Seka', 'description'=>'',  'order'=>82, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Lepa', 'description'=>'',  'order'=>83, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Pichu', 'description'=>'',  'order'=>84, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Talam', 'description'=>'',  'order'=>85, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Kati basti', 'description'=>'',  'order'=>86, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Janu basti', 'description'=>'',  'order'=>87, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Greevabasti', 'description'=>'',  'order'=>88, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Kasherukabasti', 'description'=>'',  'order'=>89, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Prushtabasti', 'description'=>'',  'order'=>90, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Nabhimandalabasti', 'description'=>'',  'order'=>91, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Shirobasti', 'description'=>'',  'order'=>92, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Netra tarpana', 'description'=>'',  'order'=>93, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Netra Seka', 'description'=>'',  'order'=>94, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 2, 'group_id'=>0, 'therapy_name'=>'Bidalaka', 'description'=>'',  'order'=>95, 'is_default'=>0, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Special Technique', 'section_id'=>1, 'description'=>'', 'order'=>96,'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],


            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Neurology & Oncology Special Technique', 'section_id'=>1, 'description'=>'', 'order'=>96,'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],


            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Cardiology & Pulmonology Special Technique', 'section_id'=>2,'description'=>'', 'order'=>97, 'is_default'=>0, 'is_language'=>1,'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Psychiatry Special Technique', 'section_id'=>3, 'description'=>'',   'order'=>98, 'is_default'=>0, 'is_language'=>1,'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Rheumatology Special Technique', 'section_id'=>4, 'description'=>'',   'order'=>99, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Spinal disorders Special Technique', 'section_id'=>5, 'description'=>'',   'order'=>100, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Metabolic disorders Special Technique', 'section_id'=>6, 'description'=>'',   'order'=>101, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Gastroenterology Special Technique', 'section_id'=>7, 'description'=>'',   'order'=>102, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Endocrinology Special Technique', 'section_id'=>8, 'description'=>'',   'order'=>103, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Promotion of Positive Health Special Technique', 'section_id'=>9, 'description'=>'',   'order'=>104, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],


            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Menstrual disorder Yoga Special Technique', 'description'=>'', 'order'=>105, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Pregancy Yoga Special Technique', 'description'=>'', 'order'=>106, 'is_default'=>0, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Endocrinology Yoga Special Technique', 'section_id'=>10, 'description'=>'', 'order'=>107, 'is_default'=>0,'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'06:00:00','end_time' =>'06:50:00', 'therapy_name'=>'Promotion of positive health Yoga Special Technique', 'section_id'=>11, 'description'=>'', 'order'=>108, 'is_default'=>0, 'app_type'=>2, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'05:20:00','end_time' =>'05:50:00', 'therapy_name'=>'OM meditation', 'description'=>'',  'order'=>109, 'is_default'=>1,'is_language'=>1, 'app_type'=>1, 'status'=>'1'],
            
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'07:00:00','end_time' =>'08:00:00', 'therapy_name'=>'Maitri Milan', 'description'=>'', 'order'=>110, 'is_default'=>1, 'default_venue'=>12,'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:30:00','end_time' =>'17:00:00', 'therapy_name'=>'Milk & Malt', 'description'=>'', 'order'=>110, 'is_default'=>1, 'default_venue'=>11,'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'17:00:00','end_time' =>'18:00:00', 'therapy_name'=>'IAYT Lecture', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Tuesday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'KRIYA', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Wednesday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'DIET', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Thursday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'PRANAMAYA KOSHA', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Friday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'YAMA & NIYAMA', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Saturday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'MANOMAYA & VIJNYANMAYA KOSHA', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Sunday', 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'10:10:00','end_time' =>'10:50:00', 'therapy_name'=>'DISCHARGE LECTURE', 'description'=>'', 'order'=>111, 'is_default'=>0, 'is_language'=>1, 'is_day'=>'Monday', 'app_type'=>1, 'status'=>'1'],

            

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'11:00:00','end_time' =>'11:50:00', 'therapy_name'=>'Pranayama', 'description'=>'',   'order'=>112, 'is_default'=>1, 'is_language'=>1, 'app_type'=>1, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Pranic energiazation Technique', 'description'=>'', 'order'=>113, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'15:00:00','end_time' =>'15:50:00', 'therapy_name'=>'Cyclic Meditation', 'description'=>'', 'order'=>114, 'is_default'=>1, 'is_language'=>1, 'app_type'=>1, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'18:00:00','end_time' =>'18:25:00', 'therapy_name'=>'Bhajan', 'description'=>'',   'order'=>115, 'is_default'=>1, 'default_venue'=>12, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Mind Sound Resonence Technique', 'description'=>'', 'order'=>116, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'18:30:00','end_time' =>'19:30:00', 'therapy_name'=>'Trataka & MSRT', 'description'=>'',   'order'=>117, 'is_default'=>1, 'is_language'=>1, 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Sleep Special Technique', 'description'=>'', 'order'=>118, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Chair Breathing Practice', 'description'=>'', 'order'=>119, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Headache special technique', 'description'=>'', 'order'=>120, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Voice culture', 'description'=>'', 'order'=>121, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Jala Neti', 'description'=>'', 'order'=>122, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Sutra Neti', 'description'=>'', 'order'=>123, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Vaman Dhouti', 'description'=>'', 'order'=>124, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'therapy_name'=>'Laghu shank Prakshalana', 'description'=>'', 'order'=>125, 'is_default'=>0, 'status'=>'1'],

            ['department_id' => 5, 'group_id'=>0, 'therapy_name'=>'Acupuncture', 'description'=>'', 'order'=>126, 'is_default'=>0, 'status'=>'1'],

            ['department_id' => 5, 'group_id'=>0, 'therapy_name'=>'Electro Acupuncture', 'description'=>'', 'order'=>127, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 5, 'group_id'=>0, 'therapy_name'=>'Acupressure', 'description'=>'', 'order'=>128, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 5, 'group_id'=>0, 'therapy_name'=>'Cupping', 'description'=>'', 'order'=>129, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 5, 'group_id'=>0, 'therapy_name'=>'Cupping Massage', 'description'=>'', 'order'=>130, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 5, 'group_id'=>0, 'therapy_name'=>'Auriculotherapy', 'description'=>'', 'order'=>131, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 5, 'group_id'=>0, 'therapy_name'=>'Moxibustion', 'description'=>'', 'order'=>132, 'is_default'=>0, 'status'=>'1'],

            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Muscle Stimulator', 'description'=>'', 'order'=>133, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Traction', 'description'=>'',  'order'=>134, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Tread mill', 'description'=>'',  'order'=>135, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Squeezing ball', 'description'=>'',  'order'=>136, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'SWD', 'description'=>'',  'order'=>137, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'PEG board', 'description'=>'',  'order'=>138, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Marine Wheel', 'description'=>'',  'order'=>139, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'T Pulley', 'description'=>'',  'order'=>140, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Ankle pressure', 'description'=>'',  'order'=>141, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Physio Ball', 'description'=>'',  'order'=>142, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Gait training', 'description'=>'',  'order'=>143, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Quadriceps chair', 'description'=>'',  'order'=>144, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Cycle', 'description'=>'',  'order'=>145, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Dumble', 'description'=>'',  'order'=>146, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'T band', 'description'=>'',  'order'=>147, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Finger gripping excercise', 'description'=>'',  'order'=>4, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Tilt table', 'description'=>'',  'order'=>148, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Wax Therapy', 'description'=>'',  'order'=>149, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Shortwave Diathermy SWD', 'description'=>'',  'order'=>150, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Moist Heat', 'description'=>'',  'order'=>151, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Ultra Sound therapy UST', 'description'=>'',  'order'=>152, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Interferential Therapy IFT', 'description'=>'',  'order'=>153, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'TENS', 'description'=>'',  'order'=>154, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Cryotherapy', 'description'=>'',  'order'=>155, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Electrical Stimulation', 'description'=>'',  'order'=>156, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Intermittent Cervical Traction', 'description'=>'',  'order'=>157, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Intermittent Lumbar Traction', 'description'=>'',  'order'=>158, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Continuos Passive motion Device', 'description'=>'',  'order'=>159, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Breathing exercises', 'description'=>'',  'order'=>160, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Chest percussions', 'description'=>'',  'order'=>161, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Passive exercises Stretching', 'description'=>'',  'order'=>162, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Active exercises Stretching', 'description'=>'',  'order'=>163, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Manual joint Mobilization', 'description'=>'',  'order'=>164, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Shoulder Rehabilitation', 'description'=>'',  'order'=>165, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Hand Rehabilitation', 'description'=>'',  'order'=>166, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Walking aids Rehabilitation', 'description'=>'',  'order'=>167, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Balance', 'description'=>'',  'order'=>168, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Neuro Developmental Therapy NDT', 'description'=>'',  'order'=>169, 'is_default'=>0, 'status'=>'1'],
            ['department_id' => 4, 'group_id'=>0, 'therapy_name'=>'Posture and ergonomics', 'description'=>'',  'order'=>170, 'is_default'=>0, 'status'=>'1'],

            ['department_id' => 6, 'group_id'=>0, 'start_time' =>'09:00:00','end_time' =>'16:30:00', 'therapy_name'=>'Admission works and Consultation with Doctors', 'description'=>'',  'order'=>171, 'section_id'=>1, 'is_default'=>1, 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 6, 'group_id'=>0, 'start_time' =>'09:00:00','end_time' =>'10:00:00', 'therapy_name'=>'Parameters & Consultation', 'description'=>'',  'order'=>171, 'section_id'=>1, 'is_default'=>1, 'app_type'=>1, 'status'=>'1'],

            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'17:15:00','end_time' =>'18:00:00', 'therapy_name'=>'Tuning to nature', 'description'=>'',  'order'=>171, 'is_default'=>1, 'default_venue'=>13, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'20:30:00','end_time' =>'21:00:00', 'therapy_name'=>'Happy Assembly (Wednesday, Friday & Sunday)', 'description'=>'',  'order'=>172, 'is_default'=>1, 'default_venue'=>8, 'status'=>'1'],
            
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Neurology & Oncology Special Technique', 'section_id'=>1, 'description'=>'',  'order'=>173,'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Cardiology & Pulmonology Special Technique', 'section_id'=>2,'description'=>'', 'order'=>174, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Psychiatry Special Technique', 'section_id'=>3, 'description'=>'',   'order'=>175, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Rheumatology Special Technique', 'section_id'=>4, 'description'=>'',   'order'=>176, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Spinal disorders Special Technique', 'section_id'=>5, 'description'=>'',   'order'=>177, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Metabolic disorders Special Technique', 'section_id'=>6, 'description'=>'',   'order'=>178, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Gastroenterology Special Technique', 'section_id'=>7, 'description'=>'',   'order'=>179, 'is_default'=>0,'is_language'=>1,  'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Endocrinology Special Technique', 'section_id'=>8, 'description'=>'', 'order'=>180, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Promotion of Positive Health Special Technique', 'section_id'=>9, 'description'=>'',   'order'=>181, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Endocrinology Yoga Special Technique', 'section_id'=>10, 'description'=>'',   'order'=>182, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'12:00:00','end_time' =>'13:00:00', 'therapy_name'=>'Promotion of positive health Yoga Special Technique', 'section_id'=>11, 'description'=>'',   'order'=>183, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],


            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Neurology & Oncology Special Technique', 'section_id'=>1, 'description'=>'',  'order'=>184,'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Cardiology & Pulmonology Special Technique', 'section_id'=>2,'description'=>'', 'order'=>185, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Psychiatry Special Technique', 'section_id'=>3, 'description'=>'',   'order'=>186, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Rheumatology Special Technique', 'section_id'=>4, 'description'=>'',   'order'=>187, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Spinal disorders Special Technique', 'section_id'=>5, 'description'=>'',   'order'=>188, 'is_default'=>0,'is_language'=>1,  'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Metabolic disorders Special Technique', 'section_id'=>6, 'description'=>'',   'order'=>189, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Gastroenterology Special Technique', 'section_id'=>7, 'description'=>'',   'order'=>190, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Endocrinology Special Technique', 'section_id'=>8, 'description'=>'',   'order'=>191, 'is_default'=>0,'is_language'=>1,  'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Promotion of Positive Health Special Technique', 'section_id'=>9, 'description'=>'',   'order'=>192, 'is_default'=>0,'is_language'=>1,  'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Endocrinology Yoga Special Technique', 'section_id'=>10, 'description'=>'', 'order'=>193, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],
            ['department_id' => 1, 'group_id'=>0, 'start_time' =>'16:00:00','end_time' =>'17:00:00', 'therapy_name'=>'Promotion of positive health Yoga Special Technique', 'section_id'=>11, 'description'=>'', 'order'=>194, 'is_default'=>0, 'is_language'=>1, 'app_type'=>2, 'status'=>'1'],


            ['department_id' => 7, 'group_id'=>1, 'therapy_name'=>'Normal Diet', 'description'=>'', 'order'=>195, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>1, 'therapy_name'=>'Kichidi', 'description'=>'', 'order'=>196, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>1, 'therapy_name'=>'Fruits', 'description'=>'', 'order'=>197, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>1, 'therapy_name'=>'Boiled Vegetable', 'description'=>'', 'order'=>198, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>1, 'therapy_name'=>'Rava/ Rice ganji', 'description'=>'', 'order'=>199, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>1, 'therapy_name'=>'Others', 'description'=>'', 'order'=>200, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],


            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Ash Gourd', 'description'=>'',  'order'=>201, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Juice', 'description'=>'',  'order'=>202, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Sprouts Juice', 'description'=>'', 'order'=>203, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Barley Water', 'description'=>'', 'order'=>204, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Carrot Juice', 'description'=>'', 'order'=>205, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Bitter gourd', 'description'=>'', 'order'=>206, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Lemon Honey', 'description'=>'',  'order'=>208, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Juice', 'description'=>'', 'order'=>209, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Cucumber', 'description'=>'',  'order'=>210, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Beetroot Juice', 'description'=>'', 'order'=>212, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Watermelon', 'description'=>'',  'order'=>213, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Papaya', 'description'=>'',  'order'=>214, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Plantain Pith', 'description'=>'',  'order'=>215, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Boiled Apple', 'description'=>'',  'order'=>217, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>2, 'therapy_name'=>'Others', 'description'=>'',  'order'=>218, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],

            ['department_id' => 7, 'group_id'=>3, 'therapy_name'=>'Boiled Diet +Boiled Vegetable+Butter milk +Fruits', 'description'=>'', 'order'=>219, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>3, 'therapy_name'=>'Raw Diet + Butter Milk', 'description'=>'',  'order'=>220, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>3, 'therapy_name'=>'Rava or Raice ganji', 'description'=>'',  'order'=>221, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>3, 'therapy_name'=>'Kichidi', 'description'=>'',  'order'=>222, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>3, 'therapy_name'=>'Others', 'description'=>'',  'order'=>223, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],

            ['department_id' => 7, 'group_id'=>4, 'therapy_name'=>' Barley water', 'description'=>'',  'order'=>224, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>4, 'therapy_name'=>'Veg Soup', 'description'=>'',  'order'=>225, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>4, 'start_time' =>'17:00:00','end_time' =>'17:10:00', 'therapy_name'=>'Kashayam', 'description'=>'',  'order'=>226, 'is_default'=>1, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],


            ['department_id' => 7, 'group_id'=>5, 'therapy_name'=>'Boiled Diet+Boiled Vegetable+Butter Milk+Fruits', 'description'=>'',  'order'=>227, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>5, 'therapy_name'=>' Raw Diet + Butter Milk', 'description'=>'',  'order'=>228, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],

            ['department_id' => 7, 'group_id'=>5, 'therapy_name'=>' Rava/ Rice ganji', 'description'=>'',  'order'=>229, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>5, 'therapy_name'=>'Kichidi', 'description'=>'',  'order'=>230, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>5, 'therapy_name'=>'Others', 'description'=>'',  'order'=>231, 'is_default'=>0, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],

            ['department_id' => 7, 'group_id'=>1, 'therapy_name'=>'Normal Breakfast', 'start_time' =>'08:00:00','end_time' =>'08:50:00', 'description'=>'',  'order'=>232, 'is_default'=>1, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>3, 'therapy_name'=>'Normal Lunch', 'start_time' =>'13:00:00','end_time' =>'14:00:00', 'description'=>'',  'order'=>233, 'is_default'=>1, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],
            ['department_id' => 7, 'group_id'=>5, 'therapy_name'=>'Normal Dinner', 'start_time' =>'19:30:00','end_time' =>'20:20:00','description'=>'',  'order'=>234, 'is_default'=>1, 'default_venue'=>11, 'app_type'=>3, 'status'=>'1'],

        ];

        foreach ($therapy as $key => $value) {
            Therapy::create($value);
        }
    }
}
