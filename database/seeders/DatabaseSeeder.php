<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([ GroupSeeder::class ]);
        $this->call([ TherapySeeder::class ]);
        $this->call([ DepartmentSeeder::class ]);
        $this->call([ TherapistSeeder::class ]);
        $this->call([ SectionSeeder::class ]);
        $this->call([ LanguageSeeder::class ]);
        $this->call([ VenueSeeder::class ]);
        $this->call([ SliderSeeder::class ]);
        $this->call([ StateSeeder::class ]);
        $this->call([ AppiconeSeeder::class ]);
        $this->call([ DoctorSeeder::class ]);
        $this->call([ AppnotificationTitleSeeder::class ]);
        $this->call([ AccommodationSeeder::class ]);
        $this->call([ UserSeeder::class ]);
        $this->call([ RoleSeeder::class ]);
        $this->call([ UsersRoleSeeder::class ]);
        $this->call([ PermissionsSeeder::class ]);
        $this->call([ UsersPermissionSeeder::class ]);
        $this->call([ InternSeeder::class ]);
        $this->call([ PatientProfileSeeder::class ]);
        $this->call([ UserVisitSeeder::class ]);
        $this->call([ userDailychartsSeeder::class ]);
        $this->call([ AppSettingPageSeeder::class ]);
        $this->call([ PaymentMode::class ]);
        $this->call([ CountrySeeder::class ]);
        $this->call([ PatientDefaultDailyChartSeeder::class ]);
        $this->call([ UserdeviceTokenSeeder::class ]);
        $this->call([ UserSectionmapingSeeder::class ]);
        $this->call([ weekDaySeeder::class ]);
        $this->call([ weeklyScheduleSeeder::class ]);
        $this->call([ PaymentDetailsTableSeeder::class ]);
    }
}
