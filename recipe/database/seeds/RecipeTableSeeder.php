<?php

use Illuminate\Database\Seeder;

class RecipeTableSeeder extends Seeder
{

    public function run()
    {
        $titles = [
					'Gnocchi alla bava',
					'Frittata con le cipolle',
					'Torta salata di zucchine',
					'Bastoncini di pollo aromatici',
					'Salsiccia con patate al forno',
					'Insalata di arance',
					'Caffelatte ghiacciato',
					'Biscotti muesli e banane',
					'Salmone al cartoccio'
                   ];
        $descriptions = [
                         'Procedimento gnocchi',
                         'Procedimento frittata',
                         'Procedimento torta salata',
                         'Procedimento pollo',
                         'Procedimento salsiccia',
                         'Procedimento arance',
                         'Procedimento caffelatte',
                         'Procedimento muesli',
                         'Procedimento salmone'
                        ];
        $users = [1,3,2,1,2,3,3,2,1];
        
        $recipes = [$titles,$descriptions,$users];
        for($i = 0; $i<9;$i++){
            DB::table('recipes')->insert([
               'title' => $recipes[0][$i],
               'description' => $recipes[1][$i],
               'user_id' => $recipes[2][$i],
            ]);
        }
    }
}
