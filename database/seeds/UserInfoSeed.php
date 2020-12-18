
<?php

use Illuminate\Database\Seeder;

class UserInfoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $data =[
                    'name' => 'hi4402600',
                    'email' => 'hi4402600@yhaoo.com.tw',
                    'password' => 'a11111',
                    'created_at' => date("Y/m/d h-m-s") ,
                    'updated_at' => date("Y/m/d h-m-s") ,

                ];
        DB::table('users')->insert($data);

    }
}
