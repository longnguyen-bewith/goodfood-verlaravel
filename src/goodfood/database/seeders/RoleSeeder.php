<?php
namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
    public function run()
    {
//
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $role = ["和食", "洋食", "中華料理", "焼肉", "麺料理 ", "カフェ", "その他 "];
            shuffle($role);
            for ($j = 0; $j <= rand(0, 6); $j++) {
                $data[] = [
                    "sid"  => $i,
                    "role" => $role[$j],
                ];
            }
        }
        DB::table('role')->insert($data);
    }
}
