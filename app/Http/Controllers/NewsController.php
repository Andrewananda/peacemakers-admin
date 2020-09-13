<?php

namespace App\Http\Controllers;

use App\News;
use App\Prayer_request;
use App\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function getNews() {
        $news = News::all();
        if ($news) {
            return GeneralResponseController::getGeneralSuccessResponse('News fetched successfully',$news,200);
        }else{
            return GeneralResponseController::getGeneralSuccessResponse('News empty',null,200);
        }
    }

    public function index() {
        return view('news.add-news');
    }

    public function addNews(Request $request) {

        $rules=[
            'title'=>'required',
            'date'=>'required'
        ];
        $validation=Validator::make($request->all(),$rules);
        if (!$validation){
            return redirect()->back()->with(['warning'=>'Kindly fill required fields!']);
        }
        if ($request->has('featured_photo')){
            $url = $request->file('featured_photo');
            $name = $url->getClientOriginalName();
            $filename = pathinfo($name,PATHINFO_FILENAME);
            $extension = $request->file('featured_photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_'.time().'.' .$extension;
            $request->file('featured_photo')->storeAs('public/news',$filenameToStore);


            $news = new News();
            $news->title = $request['title'];
            $news->date=$request['date'];
            $news->description=$request['description'];
            $news->featured_photo = $filenameToStore;

            $news->save();

            return redirect()->back()->with(['success'=>'News Created Successfully']);

        }

    }

    public function allNews() {
        $news=News::all();
        return view('news.all-news',['news'=>$news]);
    }

    public function singleNews($id){
        $single_news = News::where(['id'=>$id])->first();
        return view('news.single-news',['news'=>$single_news]);
    }
    public function updateNews($id, Request $request){
        $get_news=News::where(['id'=>$id])->first();

        if ($request->has('featured_photo')){
            $url = $request->file('featured_photo');
            $name = $url->getClientOriginalName();
            $filename = pathinfo($name,PATHINFO_FILENAME);
            $extension = $request->file('featured_photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_'.time().'.' .$extension;
            $request->file('featured_photo')->storeAs('public/news',$filenameToStore);

            $get_news->title = $request['title'];
            $get_news->date=$request['date'];
            $get_news->description=$request['description'];
            $get_news->featured_photo = $filenameToStore;

            $get_news->update();

            return redirect()->back()->with(['success'=>'News Updated Successfully']);

        }

        $get_news->title = $request['title'];
        $get_news->date=$request['date'];
        $get_news->description=$request['description'];

        $get_news->update();
        return redirect()->back()->with(['success'=>'News Updated Successfully']);

    }

}
