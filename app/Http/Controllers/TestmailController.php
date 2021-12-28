<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
        
    }
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        $article = Article::create($requestData);
        //ส่งเมล์หลังจากสร้าง Article 
        $this->testmail($article->id);
        return redirect('article');
    }
    public function testmail($id)
    {
        $article = Article::findOrFail($id);
        $email = "yyyyy@gmail.com";
        //หรือ ใช้ relationship เรียกจากตาราง user
        //$email = $article->user->email; 
         
        Mail::to($email)->send(new TestMail($article));
    }
}