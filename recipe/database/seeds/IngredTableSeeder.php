<?php

use Illuminate\Database\Seeder;

class IngredTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingreds = [
                    'sale','pepe','farina','uova','cipolla','maggiorana','olio','acqua','latte','fontina','zucchine','pangrattato','prezzemolo','parmigiano','pastasfoglia','mollica','pollo','peperoncino','menta','zenzero','coriandolo','patate','salsiccia','pomodoro','origano','rosmarino','arance','olive','caffè','zucchero','ghiaccio','gelatofiordilatte','panna','muesli','banana','salmone','limone','cipollotto'
                 ];
        foreach($ingreds as $ingred){
            DB::table('ingreds')->insert([
               'name' => $ingred,
            ]);
		}
    }
}
