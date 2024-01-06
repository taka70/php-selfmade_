
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<title>cafe-cafe</title>
</head>
 <body>
 @include('contacts.header1')
    @yield('header')
        <div class="contact_box">
        <h2 style=background-color:coral;>お問い合わせ内容の編集</h2>
        <form id="myForm" action="{{ route('showUpdateConfirm',$id ,['id'=>$contact->id] )  }}" method="POST" >
        @csrf
            <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
            <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
            <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
            <p><span class="required">*</span>
            は必須項目となります。</p>
            <dl>
            </dt>
                <dt>
                    <label for="name">氏名</label>
                    <span class="required">*</span>
                </dt>
                    <div class="error-message">
                        @if ($errors->has('name'))
                        <li>{{$errors->first('name')}}</li>
                        @endif
                    </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="name" id="name" placeholder="山田太郎" value="{{ old('name', $contact->name) }}">
                </dd>
                <dt>
                    <label for="kana">フリガナ</label>
                    <span class="required">*</span>
                </dt>
                    <div class="error-message">
                        @if ($errors->has('kana'))
                        <li>{{$errors->first('kana')}}</li>
                        @endif
                    </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="{{ old('kana', $contact->kana) }}">
                </dd>
                <dt>
                    <label for="number">電話番号</label>
                </dt>
                    <div class="error-message">
                        @if ($errors->has('number'))
                        <li>{{$errors->first('number')}}</li>
                        @endif
                    </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="number" id="number" placeholder="09012345678" value="{{ old('number', $contact->tel) }}">
                </dd>
                <dt>
                    <label for="mail">メールアドレス</label>
                    <span class="required">*</span>
                </dt>
                    <div class="error-message">
                        @if ($errors->has('mail'))
                        <li>{{$errors->first('mail')}}</li>
                        @endif
                    </div>
                <dd>
                    <div class="form-input-error"></div>
                    <input type="text" name="mail" id="mail" placeholder="test@test.co.jp" value="{{old('mail', $contact->email) }}">
                </dd>
            </dl>
            <h3>
                <label for="body">
                    "お問い合わせ内容をご記載ください"
                    <span class="required">*</span>
                </label>
            </h3>
            <div class="error-message">
                @if ($errors->has('body'))
                    <li>{{$errors->first('body')}}</li>
                @endif
            </div>
            <dl class="body">
                <dd>
                    <div class="form-input-error"></div>
                    <textarea name="body" id="body">{{ old('body', $contact->body) }}</textarea>
                </dd>
            </dl>
            <dd>
                <button type="submit" class="submit">送信</button>
            </dd>
        </form>
    </div>
<script src="{{ asset('js/index1.js') }}"></script>
@include('Top.footer')
@yield('footer')
</body>
</html>
