<?php

use Illuminate\Database\Seeder;

class Ingredient_RecipeTableSeeder extends Seeder
{
    public function run()
    {
		$recipe_ids = 	[
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'7',
							'8',
							'9'		
						];
						
		$ingred_ids = 	[
							['1','2','3','8','9','10'],
							['1','4','5','6','7'],
							['1','7','5','11','12','13','14','15'],
							['4','16','17','18','19','20','22','38'],
							['1','2','7','22','23','24','25','26'],
							['1','2','5','7','27','28'],
							['9','29','30','31','32','33'],
							['34','35'],
							['1','2','22','36','37']
						];
	
        for($i = 0; $i<9;$i++){
			for($j=0;$j<count($ingred_ids[$i]);$j++)
				{
					DB::table('ingred_recipe')->insert([
					'recipe_id' => $recipe_ids[$i],
					'ingred_id' => $ingred_ids[$i][$j],
					]);
				}
        }
    }
}
