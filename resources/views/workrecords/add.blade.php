@extends('layouts.workrecords')

@section('title', '記録')

@component('components.header')
@endcomponent

@section('content')
<form action="add" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
	<div class="inputs">
		<label class="label">画像</label>
		<input class="input_form" type="file" name="img">
	</div>
        <div class="inputs">
		<label class="label">タイトル</label>
		<input class="input_form" type="text" name="tittle">
	</div>
	<div class="inputs">
		 <label class="label">内容</label>
		 <input class="input_form" type="text" name="content">
	</div>
	<div class="inputs">
		 <label class="label">試験日</label>
		 <input class="input_form" type="date" name="day">
	</div>
	<div class="inputs">
		 <label class="label">復習の間隔</label>
		 <input class="input_form" type="text" name="interval">
	</div>
	<div class="inputs">
		 <label class="label">復習回数</label>
		 <input class="input_form" type="text" name="count">
	</div>
	<div class="btn-area">
		<input type="reset" value="リセット"><input type="submit" value="送信">
	</div>
</form>
    <!-- <form action="add" method="post">
        <table>
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <tr><th>画像</th><td><input type="text" name="img" value="画像を選択"></td></tr>
            <tr><th>タイトル</th><td><input type="text" name="tittle" value="参考書名"></td></tr>
            <tr><th>内容</th><td><input type="text" name="content" value="画像を選択"></td></tr>
            <tr><th>日付</th><td><input type="text" name="day" value="最初の復習日"></td></tr>
            <tr><th></th><td><input type="submit" value="送信"></td></tr>
        </table>
    </form> -->
@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection