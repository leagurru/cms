<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;


// este if es por un problema de incompatibilidad de php 7.2+ y laravel
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}


class PostsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index($nombre)
//    {
//        return "Método index de PostsController.php: el nombre parámetro es: " . $nombre;
//    }

//    public function index()
//    {
//        return view('posts.index');
//    }

    public function index()
    {

        // $posts = DB::table('posts')->get();
        // $posts = Post::all();
        // $posts = Post::latest()->get();
        $posts = Post::latest(); // usa el scope query del controller "Post": scopeLatest()

        return view('posts.index',compact('posts'));
    }




//    public function index()
//    {
//        $posts = Post::all(); // trae todos los datos
//
//        //función compact() toma todos los nombres que encuentra y los convierte a variables
//        return view('posts.index',compact('posts'));
//    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

//    public function store(Request $request)
//    {
//        Post::create($request->all());
//    }

//    public function store(Request $request)
//    {
//        $input=$request->all();
//        $input['title']=$request->title;
//        Post::create($request->all());
//    }

//    public function store(Request $request)
//    {
//        $post = new Post;
//        $post->title = $request->title;
//        $post->save();
//    }


//    public function store(Request $request)
//    {
//        Post::create($request->all());
//    }

    public function store(CreatePostRequest $request)
    {
        $input = $request->all(); // trae toda la info del formulario

        // averiguo si viene un file
        if($file = $request->file('file')){

            $name = $file->getClientOriginalName(); // obtengo el nombre
            $file->move('images', $name); // muevo el file a la carpeta images de la carpeta publica (ver permisos)
            $input['path'] = $name;
        }

        Post::create($input);



//        $file = $request->file('file');
//        echo "<br>";
//        echo $file->getClientOriginalName(); // devuelve nombre original
//        echo "<br>";
//        echo $file->getClientSize(); // devuelve el tamaño del archivo
//        echo "<br>";

        // retorna path con nombre temporario
        // return $request->file('file');


//        $this->validate($request,[
//            'title'=>'required|max:4',
//        ]);

//        Post::create($request->all());
//        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');



        // forma 1
//        $post = Post::findOrFail($id);
//        $post->delete();

        // forma 2

//       Post::whereId($id)->delete();

//        return redirect('/posts');

    }

    public function contact(){

      $people = ['Juan','Pedro','Maria','Ana'];
      //return view('contact');
        return view('contact',compact('people'));

      }


    public function show_post($id,$nombre){
        //return view('post')->with('id',$id);
        return view('post',compact('id','nombre'));

    }
}
