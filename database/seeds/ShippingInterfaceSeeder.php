<?php

use Illuminate\Database\Seeder;

class ShippingInterfaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ShippingInterface')->delete();
        $data = [
        			[
        		        'LogisticsType' => 'UNIMART',
        		        'Types_of' => '1',
        		        'post_fee' => '50',
        		        'logo_img' => 'public\images\Logistics/boj7cdJ2g4OzEdjr9FhIfMCSA-3g2lzK9-IneffiJ3k.jpg',
        		    ],
        		    [
        		        'LogisticsType' => 'FAMI',
        		        'Types_of' => '1',
        		        'post_fee' => '100',
        		        'logo_img' => 'public\images\Logistics/600_phpDOkoHF.png',
        		    ],
        		    [
        		        'LogisticsType' => 'HILIFE',
        		        'Types_of' => '1',
        		        'post_fee' => '200',
        		        'logo_img' => 'public\images\Logistics/1200px-Hi-Life.svg.png',
        		    ],
        		    [
        		        'LogisticsType' => 'Black_cat',
        		        'Types_of' => '0',
        		        'post_fee' => '300',
        		        'logo_img' => 'public\images\Logistics/b_acat-removebg-preview.png',
        		    ],
        		];
        DB::table('ShippingInterface')->insert($data);
    }
}
