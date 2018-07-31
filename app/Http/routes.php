<?php

use App\Country;
use App\Photo;
Use App\Post;
use App\Tag;
Use App\User;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 Route::get('/', function () {
     return view('welcome');
 });



// Route::get('/about', function () {
//
//     return 'hi about page';
//
// });
//
// Route::get('/contact', function () {
//
//     return 'hi contact page';
//
// });
//
// Route::get('/post/{id}',function ($id) {
//
//     return 'post numero'.$id;
//
// });
//
// Route::get('/post2/{id}/{nombre}',function ($id,$nombre) {
//
//     return 'post numero: '.$id . ' , Nombre: '.$nombre;
//
// });
//
// Route::get('admin/posts/example', array('as'=>'admin.home', function(){
//   $url = route('admin.home');
//   return 'la url es ' . $url;
//
//   }));

//Route::get('/post/{nombre}','PostsController@index');

//Route::resource('posts','PostsController');

//Route::get('contact','PostsController@contact');
//
//Route::get('post/{id}/{nombre}','PostsController@show_post');



/* ********************************
 * DATABASE RAW SQL QUERIES
 *********************************/



//Route::get('/insert',function(){
//    DB::insert('insert into posts (title, content) values (?,?)', ['Laravel is awesome','PHP with the framework Laravel is the best, PERIOD']);
//});


//Route::get('/read',function(){
//
//    $results = DB::select('select * from posts where id=?',[1]);
//
//    // $results tiene un array de resultados, lo recorro mostrando
//
//    foreach ($results as $post){
//        return $post->title;
//    }
//
//    //return $results;
////    return var_dump($results);
//
//});

//Route::get('/update',function(){
//
//    $updated = DB::update('update posts set title = "Updated title" where id=?',[1]);
//    return $updated;
//
//});



//Route::get('/delete',function() {
//    $deleted = DB::delete('delete from posts where id=?',[1]);
//    return $deleted;
//});


/* ***************************************
 * ELOQUENT ORM: object relational model
 *****************************************/

//Route::get('/read',function(){
//
//    $posts = Post::all();  //trae todos los registros a $posts
//
//    foreach ($posts as $post){
//
//        return $post->title;
//    }
//
//});


//Route::get('/find',function(){
//
//    $post = Post::find(2);  //trae el registro con id=2
//    return $post->title;
//
//});
//
//Route::get('/findwhere',function(){
//
//    $posts = Post::where('id',2)->orderBy('id','desc')->take(1)->get();
//    return $posts;
//
//});


//Route::get('/findmore',function(){
//
//    //$posts = Post::findOrFail(1); // si no lo encuentra da una excepción
//    $posts = Post::where('users_count','<',50)->firstOrFail(); // es un ejemplo no funcional
//});


// ruta para insertar en forma básica
//Route::get('/basicinsert',function(){
//
//   $post = new Post;
//   $post->title = 'New Eloquent title insert';
//   $post->content = 'Wow eloquent is really cool';
//   $post->save();
//
//});

// ruta para encontrar y actualizar
//Route::get('/basicinsert2',function(){
//
//    $post = Post::find(2);
//    $post->title = 'New Eloquent title insert/2';
//    $post->content = 'Wow eloquent is really cool/2';
//    $post->save();
//
//});

//
//Route::get('create',function(){
//
//    //Post::create(['title'=>'método create','content'=>'estoy aprendiendo eloquent en laravel']);
//    // si ejecuto así da una excepción de MassAsignmet
//    // hay que explicitar que es seguro hacerlo, eso se hace en el modelo: Post.php con $fillable
//    Post::create(['title'=>'método create','content'=>'estoy aprendiendo eloquent en laravel']);
//
//});


// update method with Eloquent
//Route::get('/update',function(){
//
//Post::where('id',2)->where('is_admin',0)->update(['title'=>'Nuevo título php','content'=>'Nuevo comentario']);
//
//});


//// delete
//Route::get('/delete',function(){
//
//   $post = Post::find(6);
//   $post->delete();
//
//});

// delete de un model existente o conociendo la clave, se puede usar otro método, el destroy
//Route::get('/delete2',function (){
//
//    Post::destroy(3); // destruye un registro
//
//    Post::destroy([4,5]); // destruye varios registros
//
//    //Post::where('is_admin',0)->delete() // otra forma de destruir
//
//});


//Route::get('/softDelete',function (){
//
//Post::find(6)->delete();
//
//});


//
//Route::get('/readsoftDelete',function (){
//
////    $post = Post::find(6);
////    return $post;
//
////    $post = Post::withTrashed()->where('id',6)->get();
////    return $post;
//
//    //$post = Post::onlyTrashed()->where('is_admin',0)->get();
//    $post = Post::onlyTrashed()->get();
//
//    return $post;
//});

//Route::get('/restore',function(){
//
//   Post::withTrashed()->where('is_admin',0)->restore();
//
//});

//Route::get('/forcedelete',function(){
//
//   Post::onlyTrashed()->where('is_admin',0)->forceDelete();
//
//});


/* ***************************************
 * ELOQUENT Relationships
 *****************************************/

// One to One relationship
// function para traer un post de un usuario parametrizado
//Route::get('/user/{id}/post',function($id){
//
//    return User::find($id)->post; // trae todo el objeto
//    //return User::find($id)->post->title; // trae el campo titulo
//});
//
//// relación inversa: el usuario de un post
//Route::get('/post/{id}/user',function($id){
//
//    return Post::find($id)->user->name;
//});
//
//// One to Many relationship
//// relación uno a varios, para traer varios posts de un usuario
//Route::get('/posts',function(){
//
//    $user = User::find(1);
//
//    foreach($user->posts as $post){
//
//        echo $post->title."<br>"; // con echo traigo todos los posteos del usuario
//        // return $post->title;   // solo traería un registro
//    }
//});

//// Many to Many relationship
//Route::get('/user/{id}/role',function($id){
//    $user = User::find($id);
//
//    foreach ($user->roles as $role){
//        return $role->name;
//    }
//});

// Many to Many relationship
// devuelve el rol completo
// con este enfoque si un usuario tiene más de un rol obtengo todos los roles
//Route::get('/user/{id}/role',function($id){
//    $user = User::find($id)->roles()->orderBy('id','desc')->get();
//    return $user;
//});
//
////Acceso a la tabla intermedia/pivot
//Route::get('user/pivot',function (){
//
//    $user = User::find(1);
//    foreach($user->roles as $role){
//        echo $role->pivot->created_at;
//
//    }
//});
//
//// recupera el post de un usuario con país id 1
//Route::get('/user/country',function(){
//    $country = Country::find(1); //argentina
//    foreach ($country->posts as $post){
//        return $post->title;
//    }
//});


//// Polimorphic relation, la foto de un usuario
//Route::get('user/photos',function(){
//    $user = User::find(1);
//    foreach ($user->photos as $photo){
//        return $photo; // return $photo->path obtiene solo el path
//    }
//
//});
//
//// Polimorphic relation, la foto de un usuario
//Route::get('post/photos',function(){
//    $post = Post::find(1);
//    foreach ($post->photos as $photo){
//        return $photo; // return $photo->path obtiene solo el path
//    }
//
//});
//
//// Polimorphic relation, la foto de un usuario
//Route::get('post/photos2',function(){
//    $post = Post::find(1);
//    foreach ($post->photos as $photo){
//        echo $photo->path . "<br>";
//    }
//});
//
//
//// Polimorphic relation, la foto de un usuario
//Route::get('post/{id}/photos3',function($id){
//    $post = Post::find($id);
//    foreach ($post->photos as $photo){
//        echo $photo->path . "<br>";
//    }
//});

////// Polimorphic relation, la inversa
//Route::get('photo/{id}/post',function ($id){
//    $photo = Photo::findOrFail($id);
//    return $photo->imageable;
//});
//
//// Polymorphic many to many relation
//Route::get('post/tag', function(){
//    $post = Post::find(1);
//    foreach ($post->tags as $tag){
//        echo $tag->name;
//    }
//});

//Route::get('tag/post',function(){
//    $tag=Tag::find(2);
//    foreach ($tag->posts as $post){
//
//        return $post->title;
//    }
//});



/*
 * CRUD aplication
 */

//Route::group(['middleware'=>'web'],function(){
//});
    Route::resource('/posts','PostsController');


Route::get('/dates',function(){

    $date = new DateTime('+1 week');
    echo $date->format('d-m-Y');

    echo '<br>';
    echo Carbon::now()->addDays(10)->diffForHumans();

    echo '<br>';
    echo Carbon::now()->subMonth(5)->diffForHumans();

    echo '<br>';
    echo Carbon::now()->yesterday()->diffForHumans();

    echo '<br>';

});

// accessor, obtiene data de la bd, y la manipula antes de pasarla a la app
Route::get('/getname',function(){

    $user = User::find(1);
    echo $user->name;

});

// mutator, manipula info antes de pasarla a la bd
Route::get('/setname',function(){

    $user = User::find(1);
    $user->name = "guillermo";
    $user->save();  // va al mutator

});