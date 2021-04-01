<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
class LikeSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
//
$like = [];
for($i=1;$i<=10; $i++) {
	$a =range(1, 10);
	 shuffle($a);
	for($j=0;$j<rand(0,10);$j++){
$like[] = [
"uid"=>$i,
"sid"=>$a[$j]
];
}
}
DB::table('storelike')->insert($like);
}
}