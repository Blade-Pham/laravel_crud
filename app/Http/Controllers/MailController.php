<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestSendMail;
// use App\Http\Controllers\Mail;
class MailController extends Controller
{
    public function sendMail(){
        Mail::to("phamanh062003@gmail.com")
        ->cc(["21a100100026@students.hou.edu.vn"])
        ->later(now()->addSeconds(30), new TestSendMail("DucAnh"));
        // ->queue(new TestSendMail("DucAnh")));
        dd("Controller send mail");
    }
}
