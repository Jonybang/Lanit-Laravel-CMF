<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use \Response;
use \Auth;
use \App\Models\Page;
use \App\Models\MailTemplate;
use \App\Models\SubscriberGroup;
use \App\Models\SentMail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function cur_user()
    {
        return \Auth::user();
    }

    public function site_settings_dictionary()
    {
        return Response::json(
            \DB::table('settings')->lists('value', 'key'),
            200
        );
    }

    public function preview_mail(Request $request)
    {
        $data = $request->all();

        $mail = new SentMail([
            'mail_template_id' => $data['mail_template_id']
        ]);

        if(isset($data['page_id']))
            $mail->page_id = $data['page_id'];

        if(isset($data['sub_data']))
            $mail->sub_data = $data['sub_data'];

        if(isset($data['mail_template']['title']))
            $mail->mail_template->title = $data['mail_template']['title'];

        if(isset($data['mail_template']['content']))
            $mail->mail_template->content = $data['mail_template']['content'];

        return $mail->prepareMailData();
    }
}
