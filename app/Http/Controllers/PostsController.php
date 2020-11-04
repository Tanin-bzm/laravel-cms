<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Role_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\PostViewEvent;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // echo asset('storage/laravel.png');
        // return 'id is'."".$id;
        $posts=Post::all();
        return view('posts.index',compact(['posts']));
        // storage
        
    }

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
    public function store(CreatePostRequest $request)
    {   $this->validate($request,['title'=>'bail|required','content'=>'required'],['tilte.required'=>'لطفا پر کنید']);
        // return $request->all();        
        $post=new Post();
        if($file=$request->file('file')){
            // $name=$file->getClientOriginalName();
            // $file->move('images',$name);
            // $post->path=$name;
        // }
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=1;
        $post->save();
        // session()->flash('post_created','post created');
        // // return redirect()->back();
      

    }}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);
        event(new PostViewEvent($post)) ; 
        return view('posts.show' , compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    // {   
    //     $post=Post::findorfail($id);
    //     $user=Auth::user();
    //     if($user->can('update',$post)){
    //         return view('posts.edit',compact(['post']));} 
    //             return "شما اجازه ی ویرایش این مطلب را ندارید";  
    //         }
       { $post=Post::findorfail($id);
        if(Gate::allows('edite-post',$post)){
        return view('posts.edit',compact(['post']));}
        else{
            return "شما اجازه ی ویرایش این مطلب را ندارید";}
        // }
        // $post=Post::findorfail($id);
        // if(Gate::denies('edite-post',$post)){
        //     return "شما اجازه ی ویرایش این مطلب را ندارید";}
        
        // else{
        //   return view('posts.edit',compact(['post']));  
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
        $post=Post::findorfail($id);
        $post->update($request->all());
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=post::findorfail($id);
        $post->delete();
        return redirect('posts');
    }
    // public function showMyView($id,$name,$password){
    //     // return view('pages.myView');
    //     return view('pages.myView',compact(['id','name','password']));
    // }
    // public function contact(){
    //     $people = ['سارا','طنین','ریحان'];
    //     return view('pages.contact', compact('people'));
    // }
    // public function insert(){
    //     DB::insert('insert into posts (title,content) values (?, ?)', ['insert post', 'this post insert by method insert ']);
    //     // DB::insert('insert into users (id, name,email,password) values (?, ?)', [1, 'Tanin','tanin.bz@yahoo.com',4424824]);
    // }
    // public function select(){
    //    $allposts= DB::select('select * from posts');
    //    return $allposts;
    //    $allusers= DB::select('select * from users');
    //    return $allusers;
    // }
    // public function updatePosts(){
    //     $updatepost=DB::update('update posts set title="title updated" where id = ?', [1]);
    //     return $updatepost;
    // }
    // public function deletepost(){
    //     $deletepost=DB::delete('delete from posts where id = ?', [2]);
    //     return $deletepost;
    // }
    // public function getAllPosts(){
    //     $post=Post::all();
    //     // $post=Post::find(3);
    //     // $post=Post::where('title','insert post')->orderBy('id','asc')->take(1)->get();
    //     // $post=Post::findorFail(1);
    //     return $post;
    // }
    // public function savePost(){
    //     // $user=new User();
    //     // $user=User::create(['id'=>1,'name'=>'tanin','email'=>'tanin.bz@yahoo.com','password'=>4424824]);
    //     // // $user=User::create(['id'=>2,'name'=>'sara','email'=>'saroos@yahoo.com','password'=>'sa1377ra']);
    //     // $user->save();
    //     // // $post=new Post();      
    //     // // $post->title ='post number =1';
    //     // // $post->content ='this is a test';
    //     // $post=Post::create(['title'=>'post number =2','content'=>'this is a test']);
    //     // // $post=Post::create(['id'=>2,'title'=>'one to many','content'=>'every user has many posts']);
    //     // $post->save();
    //     // return $post; 
    //     $role=Role::create(['name'=>'normal user']);
    //     $role->save();
    //     return $role;
    // //     $role_user=Role_user::create(['role_id'=>1,'user_id'=>1]);
    // //     $role_user->save();
    // //     return $role_user;
    // }
    //  public function newUpdatePost(){
    //     // $post=Post::where('id',6)->update(['title'=>'updated post','content'=>'update content']);
    //     $post=Post::findorfail(6);
    //     $post->title ='post updated';
    //     $post->content ='this is a test';
    //     $post->save(); 
    //     return $post;
    // }
    // public function newDeletePost(){
    //     // $post=Post::whrer('id',6)->first();
    //     // $post->delete();
    //     //  $post=Post::destroy([5,4 ]);
    //     $post=Post::where('id',3)->delete(); 
    // }
    // public function workWithTrash(){
    //     // $post=Post::withTrashed()->get();
    //     $post=Post::onlyTrashed()->get();
    //     return $post;
    // }
    //  public function restorePost(){
    //      $post=Post::onlyTrashed()->where('id',3)->restore();
    //  }
    //  public function forceDelete(){
    //      $post=Post::withTrashed()->where(['title'=>'insert post','id'=>9])->forceDelete();
    //  }

    }