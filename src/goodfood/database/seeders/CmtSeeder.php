<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
class CmtSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
//
$cmt=["いいですね","美味しかった","まあまあ","2回目ない","安い","高い","店員優しい","遅い","場所いい"];
$data = [];
for($i=1;$i<=10; $i++) {
	$a =range(1, 10);
	 shuffle($a);
	for($j=0;$j<rand(0,10);$j++){
$data[] = [
"uid"=>$i,
"sid"=>$a[$j],
"votes"=>rand(1,5),
"created_at"=>now(),
"cmt"=>$cmt[rand(0,count($cmt)-1)]
];
}
}
DB::table('storecmt')->insert($data);
}
}