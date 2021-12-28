<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Article;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

 
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

   
    // public function build()
    // {
    //     return $this->view('view.name');
    // }

    public function build()
    {
        //เวลาใช้งานดึงการแสดงผลจาก View เหมือนกับ Controller ทั่วไป
        $article = $this->article;
        return $this->subject('This is my Test Mail Subject')
                    ->view('article.testmail', compact('article') );
    }
}
