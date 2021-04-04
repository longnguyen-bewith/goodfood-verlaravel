<?php
namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use SplFileObject;

class StoreSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
    public function run()
    {
//
        $file = new SplFileObject('./database/csv/store.csv');
        $file->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );
        $store = [];
        foreach ($file as $line) {
            $store[] = [
                "uid"        => rand(1, 10),
                "storename"  => $line[0],
                "address"    => $line[1],
                "opentime"   => $line[2],
                "closetime"  => $line[3],
                "created_at" => now(),
            ];
        }

        DB::table('store')->insert($store);
    }
}
