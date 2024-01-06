<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Controller;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'kana',
        'tel',
        'email',
        'body',
        // 'del_flg',
        // 'deleted_at'
    ];

    //編集画面への表示内容検索
    public function show($id){
        $contact = Contact::find($id); 

        // データが存在する場合は、詳細ビューにデータを渡して表示する
        return view('contacts.detail', ['contact' => $contact]);
    }

    public function customUpdateMethod($id, $data)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($data);
        return $contact;
    }



}