@extends('layouts.workrecords')

@section('title', 'ELS')

@component('components.header')
@endcomponent

@section('content')
<div class="add_box"><a class="add_link" href="add">今日の学習を記録しよう</a></div>
<section id="tasks">
        <div class="today">
           <h2>今日</h2>
                @foreach($td_contents as $td_content)
                <div class="list_items">
                <table class="td_table">
                <tr>
                    <td>{{ $td_content->record->tittle }}</td>
                    <td>{{$td_content->record->content}}</td>
                    <td><form action="done" method="post">
                        @csrf
                        <input type="hidden" name="record_id" value="{{$td_content->record_id}}">
                        <button class="reset button-shadow type="submit">完了</button>
                        </form>
                    </td>
                </tr>
                </table>
                </div>
                @endforeach
        </div>

        <div class="tomorrow">
            <h2>明日</h2>
                @foreach($tm_contents as $tm_content)
                <div class="list_items">
                <table class="td_table">
                <tr>
                    <td>{{ $tm_content->record->tittle }}</td>
                    <td>{{$tm_content->record->content}}</td>
                    <td><form action="done" method="post">
                        @csrf
                        <input type="hidden" name="record_id" value="{{$tm_content->record_id}}">
                        <button class="reset button-shadow type="submit">完了</button>
                        </form>
                    </td>
                </tr>
                </table>
                </div>
                @endforeach
            </table>
        </div>

        <div class="after_tomorrow">
            <h2>明後日</h2>
                @foreach($itd_contents as $itd_content)
                <div class="list_items">
                <table class="td_table">
                <tr>
                    <td>{{ $itd_content->record->tittle }}</td>
                    <td>{{$itd_content->record->content}}</td>
                    <td><form action="done" method="post">
                        @csrf
                        <input type="hidden" name="record_id" value="{{$itd_content->record_id}}">
                        <button class="reset button-shadow type="submit">完了</button>
                        </form>
                    </td>
                </tr>
                </table>
                </div>
                @endforeach
            </table>
        </div>
    </section>

    <section id="today_records">
        <div class="records">
            <h2>今日新しくやったもの</h2>
            <div class="record_table">
                @foreach ($records as $record)
                <div class="record_content">
                    <table>
                        <tr>
                            <td class="img"><img class="record_img" src="{{ $record->img_path }}"></td>
                        </tr>
                        <tr>
                            <td class="content">{{ $record->tittle }} <br>{{ $record->content }}</td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
        <div class="records">
            <h2>復習したもの</h2>
            <div class="record_table">
                @foreach ($days as $day)
                <div class="record_content">
                    <table>
                    <tr>
                        <td class="img"><img class="record_img" src="{{ $day->record->img_path }}"></td>
                    </tr>
                    <tr>
                        <td class="content">{{ $day->record->tittle }} <br>{{ $day->record->content }}</td>
                    </tr>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('footer')
@component('components.footer')
@endcomponent
@endsection


