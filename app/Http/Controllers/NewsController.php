<?php

namespace App\Http\Controllers;

use App\News;
use App\Prayer_request;
use Illuminate\Http\Request;

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

}
