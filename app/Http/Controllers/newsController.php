<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{

    // Creating News Form Page
    public function add(){
        return view('News.addNews');
    }
    // News Creating controller
    public function create(Request $request){


        //fetching images array
        if($request->hasFile('images')){
            foreach ($request->file('images') as $img){
                $image_name = md5($img->getClientOriginalName()) .'.'.$img->getClientOriginalExtension();
                $img->move(public_path('uploads'),$image_name);
                $images[] = $image_name;
            }

            $images = implode(' ', $images);

        }


        $title=\request('title');
        $description=\request('description');
        $user_id=\request('user_id');

        DB::table('news')->insert(
            [
                'title' => $title,
                'user_id' => $user_id,
                'description'=>$description,
                'image_name'=>$images,
            ]
        );
        return redirect('/home');


    }
    //all News home page
    public function show(){
        $Snews = DB::table('news')->paginate(3);
        return view('News.showNews')->with([
            'news' => $Snews
        ]);
    }
    //single news page and it's count view
    public function view($id){
        $article = DB::table('news')->find($id);

        DB::table('news')->where('id',$id)->update([
            'views_number'=>$article->views_number+1

        ]);


        return view('News.view')->with([
            'article'=>$article
        ]);

    }
    //Searching for public news
    public function search(Request $request){
        $results = DB::table('news')->where('title','LIKE','%'.$request->input('search')."%")->get();
        return view('News.results')->with([
            'results'=>$results
        ]);
    }


    //searching for dates
    public function dateSearch(){
        $dateFrom=\request('searchFrom');
        $dateTo=\request('searchTo');
        $results=DB::table('news')->whereBetween('created_at',[$dateFrom,$dateTo])->get();
        return view('News.results')->with([
            'results'=>$results
        ]);
    }



    //deleting article
    public function destroy($id)
    {
        DB::table('news')->where('id', '=', $id)->delete();
        return redirect('/show');
    }
    // view the article view form
        public function edit($id){
        $article=DB::table('news')->find($id);
        return view('News.edit')->with([
            'article'=>$article
        ]);
        }
        //updating the article
        public function update( Request $request,$id){
            if($request->hasFile('images')){
                foreach ($request->file('images') as $img){
                    $image_name = md5($img->getClientOriginalName()) .'.'.$img->getClientOriginalExtension();
                    $img->move(public_path('uploads'),$image_name);
                    $images[] = $image_name;
                }

                $images = implode(' ', $images);

            }




            $title=\request('title');
            $description=\request('description');
            $user_id=\request('user_id');

            DB::table('news')->where('id',$id)
                ->update([
                    'title' => $title,
                    'description'=>$description,
                    'user_id'=>$user_id,
                    'image_name'=>$images,
                ]);
            return redirect('/show');
        }

}
