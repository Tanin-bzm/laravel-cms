<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use app\http\Controllers;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Models\Post;
use App\Models\country;
use App\Models\Photo;
use App\Models\Tag;
use App\Models\Video;
use App\Models\Role;


// Route::get('/', function () {
//     return view('welcome');
// });

// route::get('/contact',function(){
//     return "به صفحه ما خوش امدید";
// });

// route::get('/about',function(){
//     return "درباره ما";
// });

// route::get('/post/{id}/{name?}' , function($id,$name=null){
//     return 'ایدی برابراست با:'. "".$id . "$name";
// });
// route::get('/admin/post/example',function(){
//     $url=route('admin');
//     return "این صفحه برای مدیریت میباشد".$url;
// })->name('admin');

// route::get('admin/login', function(){
//     return "صفحه ورود مدیریت";
// });
 
// route::redirect('/admin/login', '/admin/post/example',301);

// route::prefix('user')->group(function(){
//     route::get('post/example',function(){
//         return"گروه بندی ادمین";
//     });
//     route::get('login',function(){
//         return "صفحه لاگین ";
//     });
// });

// Route::get('user/{id}', 'Show@show');
// Route::get('/posts', 'App\Http\Controllers\PostsController@index');
// Route::get('/posts', [PostsrController::class, 'index']);
// Route::resource('/posts','App\Http\Controllers\PostsController')->only(['store', 'delete']);
// Route::resource('posts/{id?}', PostsController::class);
// route::get('/show-view/{id}/{name}/{password}', [PostsController::class, 'showMyView']);
// // route::get('/contact','App\Http\Controllers\PostsController@contact');
// route::get('/insert',[PostsController::class,'insert']);
// route::get('/select',[PostsController::class,'select']);
// route::get('/update',[PostsController::class,'updatePosts']);
// route::get('/delete',[PostsController::class,'deletePost']);
// Route::get('show-post', [PostsController::class,'getAllPosts']);
// Route::get('save-post', [PostsController::class,'savePost']);
// Route::get('update-post',[PostsController::class,'newUpdatePost']);
// Route::get('delete-post',[PostsController::class,'newDeletePost']);
// Route::get('data-trash',[PostsController::class,'workWithTrash']);
// Route::get('restore-trash',[PostsController::class,'restorePost']);
// Route::get('force-delete-post',[PostsController::class,'forceDelete']);

// // Eloquent Relationship
// // one to one Relationship
// Route::get('user/{id}/post', function ($id) {
//     // $user_post=User::find(1)->post;
//     $user_post=User::find($id)->post->content; 
//     return $user_post;
// }); 
// Route::get('post/{id}/user', function ($id) {
//     // $post_user=Post::find($id)->user;
//     $post_user=Post::find($id)->user->email;
//     return $post_user;
// });

// // one to many Relationship
// Route::get('user/{id}/posts', function ($id) {
//     $user_posts= User::find($id)->posts;
//     foreach ($user_posts as $post){
//         echo $post->title;
//         echo "</br>";}
    
// });

// // many to many Relationship
// Route::get('user/{id}/roles', function ($id) {
//     $user=User::find($id);
//     foreach ($user->roles as $role){
//         echo $role->name;
//         echo "</br>";
//     }
// });
// Route::get('user/pivot', function () {
//     $user=User::find(1);
//     foreach($user->roles as $role){
//         echo $role->pivot->created_at;
//         echo "</br>";
//     }
// });

// // ELOQUENT has to many through
// Route::get('users/country', function () {
//     $country=country::find(1);
//     foreach($country->posts as $post){
//         echo $post->title;
//         echo "</br>";
//     }
// });

// // polymorphic Relationship
// Route::get('user/photos', function () {
//     $user=User::find(1);
//     foreach($user->photos as $photo){
//         echo $photo->path;
//         echo "</br>";
//     }
// });

// Route::get('post/photos', function () {
//     $post=Post::find(10);
//     foreach($post->photos as $photo){
//         echo $photo->path;
//         echo "</br>";
//     }
// });
// Route::get('photo/{id}/post', function () {
//     $photo=Photo::find(1);
//     return $photo->imageable;
// });

// Route::get('post/tags', function () {
//     $post=Post::find(1);
//     foreach ($post->tags as $tag){
//         echo $tag->name;
//         echo "</br>";
//     }
// });

// Route::get('video/tags', function () {
//     $video=Video::find(10);
//     foreach ($video->tags as $tag){
//         echo $tag->name;
//         echo "</br>";
//     }
// });

// Route::get('tag/{id}/post    ', function ($id) {
//     $tag=Tag::find($id);
//     foreach ($tag->posts as $post){
//     echo $post->title;
//     }
// });
// // CRUD one to many relationship
// Route::get('create', function () {
//     $user=User::find(1);
//     $post=new Post();
//     $post->title='new post with one to many Reltionship';
//     $post->content='here for content';
//     $user->posts()->save($post);
// });

// Route::get('read', function () {
//     $user=User::find(1);
//     // dd($user);
//     foreach($user->posts as $post){
//         echo $post->title;
//         echo "</br>";
//     }
// });

// Route::get('update', function () {
//     $user=User::find(2);
//     $user->posts()->whereId(2)->update(['title'=>'update post by CRUD','content'=>'update content']);
// });

// Route::get('delete', function () {
//     $user=User::find(2);
//     $user->posts()->whereId(2)->delete();
// });
// // CRUD many to many relationship
// Route::get('create-role', function () {
//     $user=User::find(1);
//     $role=new Role();
//     $role->name='writter';
//     $user->roles()->save($role);
// });
// Route::get('read-role', function () {
//     $user=User::find(1);
//     foreach ($user->roles as $role){
//         echo $role->name;
//     }
// });
// Route::get('update-role', function () {
//     $user=User::find(1);
//     if($user->has('roles')){
//     foreach ($user->roles as $role){
//         if ($role->name=='writter'){
//             $role->name='author';
//             $role->save();}
//         }
//     }
// });
// Route::get('delete-role', function () {
//     $user=User::find(1);
//     foreach ($user->roles as $role){
//         if ($role->name=='author'){
//             $role->delete();
//         }
//     }
// });
// Route::get('detach', function () {
//     $user=User::find(1);
//     $user->roles()->detach(1);
// });
// Route::get('attach', function () {
//     $user=User::find(1);
//     $user->roles()->attach(1);
// });
// Route::get('sync', function () {
//     $user=User::find(1);
//     $user->roles()->sync([1,2,3,40]);
// });
// // CRUD Polymorphic Relationship
// Route::get('create-poly', function () {
//     $video=video::find(1);
//     $video->tags()->create(['name'=>'morph video']);
// });
// Route::get('read-poly', function () {
//     $video=video::find(1);
//     foreach($video->tags as $tag){
//         echo $tag->name;
//         echo "</br>";
//     }
// });
// Route::get('update-poly', function () {
//     $video=video::find(1);
//     $tag=$video->tags;
//     $newtags=$tag->where('id',12)->first();
//     $newtags->name='new tag';
//     $newtags->save();
// });
// Route::get('delete-poly', function () {
//     $video=video::find(1);
//     $tag=$video->tags;
//     $deletetags=$tag->where('id',12)->first();
//     $deletetags->delete();
// });
// Route::get('detach-poly', function () {
//     $video=Video::find(1);
//     $video->tags()->detach();
// });
// Route::get('attach-poly', function () {
//     $video=Video::find(1);
//     $video->tag()->attach();
// });
// Route::get('sync-poly', function () {
//     $video=Video::find(1);
//     $video->roles()->sync([1,2,]);
// });
// Form Routes
// Route::resource('posts', PostsController::class);



// Route::middleware(['auth:sanctum', 'verified', 'isAdmin'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Auth::routes(['verify'=>true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//   $user=Auth::user();
//   $id=Auth::id();
//   if(Auth::check()){
//       echo "hello".$user;
//       echo "id".$id;}
//       else{
//           return redirect()->to('home');
//       }
   
// });
// Route::get('/home',['middleware'=>['auth','verified']], [HomeController::class , 'index'])->name('home');
// route::get('/home' ,[HomeController::class , 'index'])->middleware(['auth' , 'verified'])->name('home');
// group auth
// route::middleware(['auth','verified'])->group(function(){
//     Route::get('/home', [HomeController::class,'index']) ;
//     Route::resource('/posts', PostsController::class);
//     });

// Route::get('/admin', function () {
//     echo "heeeeeeeeeeeeeello my admin";
// })->name('admin');
// event and listener
// localization

Route::prefix('fa')->group(function(){
    App::setLocale('fa'); 
Route::get('message', function () {
    return view('message');
    });
});
