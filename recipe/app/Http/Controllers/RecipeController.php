<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Recipe;
use App\User;
use App\Ingred;
use Input;

class RecipeController extends Controller
{	
/*
|--------------------------------------------------------------------------
| Recipe section
|--------------------------------------------------------------------------
*/
	//shows home page
	public function showHome() 
		{
			return view('home');
		}
	
	//shows page with all recipes and search forms	
	public function showList() 
		{
			$users = User::all();
			$recipes = Recipe::all();
			$ingreds = Ingred::lists('name','id');
			
			return view('list',compact('recipes','users','ingreds'));      
		}
	
	//shows page with all recipes of the logged in user	
	public function showUserList() 
		{
			$user = Auth::user()->id;
			$titles = Recipe::where('user_id','=',$user)->pluck('title', 'id');
			$recipes = Recipe::where('user_id','=',$user)->get();
			
			return view('userList',compact('recipes','titles','user','ingreds'));      
		}
	
	//shows form to create new recipe
	public function showForm() 
		{	
			$ingreds = Ingred::orderBy('name')->pluck('name','id');
			return view('form',compact('ingreds'));
		}

	//creates new recipe
	public function create(Request $request) 
		{	
			$this->validate($request,
							['title'=>'required',
							'description'=>'required',
							'ingreds'=>'required']);
			
			$recipe=new Recipe($request->all());				
						
			Auth::user()->recipes;
			Auth::user()->recipes()->save($recipe);
			
			$ingredsId=$request->input('ingreds');
			$recipe->ingreds()->attach($ingredsId);
			
			$newIngreds=Input::get('newIngreds');
	
			if ($newIngreds)
				{
					$newIngredsNames=preg_split('/[\s,]+/',$newIngreds);
					foreach ($newIngredsNames as $newIngName)
						{	
							$tempIng= new Ingred();
							
							if (Ingred::where('name','=',$newIngName)->exists())
								{
									return redirect('crea')->withErrors("Ingrediente già esistente!");
								}
							else
							{
								$tempIng->name=$newIngName;
								$tempIng->save();
								$recipe->ingreds()->attach($tempIng->id);
							}
						}	
				}			

			return redirect('lista');
		}
	
	//redirects to the modify form if recipe belongs to auth user
	public function modify($id) 
		{	
			$recipe=Recipe::find($id);
			$ingreds = $recipe->ingreds->pluck('name','id');
			$allIngreds = Ingred::orderBy('name')->pluck('name','id');
			
			if (Auth::user()->id == $recipe->user_id || Auth::user()->isAdmin == 1)
				{ 
					return view('modify',compact('recipe','ingreds','allIngreds'));
				}
			else 
				{
					return redirect('lista')->withErrors("Errore di autorizzazione!");
				}
		}
    
    //modifies selected recipe  
    public function modifier(Request $request,$id) 
		{	
				$recipe=Recipe::find($id);
				$recipe->title = $request->title;
				$recipe->description = $request->description;
				$recipe->save();
				$addIngredsId=$request->input('addIngreds');
				$deleteIngredsId=$request->input('deleteIngreds');
				$newIngreds=$request->input('newIngreds');
				if ($addIngredsId) 
					{
					$recipe->ingreds()->attach($addIngredsId);	
					}
					
				if ($deleteIngredsId) 
					{
					$recipe->ingreds()->detach($deleteIngredsId);
					}
					
				if ($newIngreds) 
					{
						$newIngredsName=preg_split('/[\s,]+/',$newIngreds);
						foreach ($newIngredsName as $newIngName)
						{	
							$tempIng= new Ingred();
							
							if (Ingred::where('name','=',$newIngName)->exists())
								{
									return redirect('/modifica/'.$recipe->id)->withErrors("Ingrediente già esistente!");
								}
							else
							{
								$tempIng->name=$newIngName;
								$tempIng->save();
								$recipe->ingreds()->attach($tempIng->id);
							}
						}	
					}
			return redirect('lista');
		}
    
    //returns found recipe
    public function finder($id) 
		{
			$recipe=Recipe::find($id);
			$ingreds = $recipe->ingreds->lists('name','id');
			
			return view('find',compact('recipe','ingreds'));
		}
    
    //finds recipe by dropdown on title
    public function findTitle() 
		{	
			$id = Input::get('id');
			$recipe=Recipe::find($id);
			return view('find',compact('recipe'));
		}
    
    //finds recipe by search on ingredients
    public function findIngredients() 
		{
			$input = Input::get('ingredienti');
			$ingredsName=preg_split('/[\s,]+/',$input);
			
			$ingreds = Ingred::where(function($query) use($ingredsName) 
				{
					foreach($ingredsName as $ingred) 
						{
							$query->orWhere('name', 'like',"%".$ingred."%");
						}
				})->get()->lists('id');

			$recipe = Recipe::whereHas('ingreds', function($q) use ($ingreds)
				{
					$q->whereIn('ingred_id', $ingreds);
				})->get();
						
			return view('findByAttribute',['recipes'=>$recipe,'input'=>$input]);
		}
    
    //finds recipe by search on name(title)
    public function findName() 
		{
			$input = Input::get('name');
			$names = preg_split('/[\s,]+/',$input);
			$recipe = Recipe::where(function ($result) use ($names) 
					{
					foreach ($names as $name) {
						$result->orWhere('title', 'like', "%".$name."%");
						}      
					})->get();
						
			return view('findByAttribute',['recipes'=>$recipe,'input'=>$input]);
		}
     
    //deletes selected recipe
    public function deleteRecipe($id) 
		{	
			$recipe = Recipe::find($id);
			$recipe->delete();
			
			return redirect ('lista');
		}
	
/*
|--------------------------------------------------------------------------
| Admin-user section
|--------------------------------------------------------------------------
*/	
	//shows home page for admin with all users
	public function adminHome() 
		{	
			$users = User::all();
			$ingreds = Ingred::all();
			return view('adminHome',compact('users','ingreds'));
		}
	
	//shows page to modify users
	public function modifyUser($user_id) 
		{
			$user=User::find($user_id);
			return view('modifyUser',compact('user'));
		}
	
	//shows page to modify ingredient
	public function modifyIngred($ingred_id) 
		{
			$ingred=Ingred::find($ingred_id);
			return view('modifyIngred',compact('ingred'));
		}
	
	//modifies selected user	
	public function modifierUser(Request $request,$user_id) 
		{
			$user=User::find($user_id);
			$user->name = $request->name;
			$user->email = $request->email;
			$user->save();
			
			return redirect('admin');
		}
	
	//modifies selected ingredient	
	public function modifierIngred(Request $request,$ingred_id) 
		{
			$ingred=Ingred::find($ingred_id);
			$ingred->name = $request->name;
			$ingred->save();
			
			return redirect('admin');
		}
		
	//deletes selected user and his recipes
    public function deleteUser($user_id) 
		{	
			$user=User::find($user_id);
			 if (!$user->recipes->isEmpty())
				{
					foreach ($user->recipes as $recipe)
						{
						Recipe::find($recipe->id)->delete();
						}
				}
            $user->delete();

			return redirect ('admin');
		}
		
	//deletes selected ingredient
    public function deleteIngred($ingred_id) 
		{	
			$ingred=Ingred::find($ingred_id);
            $ingred->delete();

			return redirect ('admin');
		}
  
}
