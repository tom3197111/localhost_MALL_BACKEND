<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserInfoSeed::class);
        $this->call(configSeeder::class);
        $this->call(CompanyInfoSeed::class);
        $this->call(BannerSeeder::class);
        $this->call(ShippingInterfaceSeeder::class);
    }
}
