<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>登録中</title>
    <?php 
        /* 新規登録のDB登録書くところ */
    ?>
</head>
<body>
<div id="page_all">
    <div id="header"></div>
    <div id="menu_contents_wrap">
        <div id="contents_wrap">
            <!-- 左に表示させるメニュー(予定なのでまだ追加していません)
            <div id="menu_area">
                
            </div>
            -->
            <div id="contents_area">
                <form action="tourokukari.html" method="post">
                    <p class="desc"><span class="required">必須</span>ユーザーID</p>
                    <input type="text" id="userid">
                    <p class="desc"><span class="required">必須</span>名前</p>
                    <input type="text" id="name">
                    <p class="desc"><span class="required">必須</span>生年月日</p>
                    <select id="year" name="birth01" type="text" class="js-changeYear">
                        <option value="0">----</option>
                    </select>年
                    <select id="month"name="birth02" class="js-changeMonth">
                        <option value="0">--</option>
                    </select>月
                    <select id="day"name="birth03" class="js-changeDay">
                        <option value="0">--</option>
                    </select>日
                    <script>
                        //現在の年数から1900年までを表示
                    var time = new Date();
                    var year = time.getFullYear();
                    for (var i = year; i >= 1900; i--) {
                    $('#year').append('<option value="' + i + '">' + i + '</option>');
                    }
                    //１~12月
                    for (var i = 1; i <= 12; i++) {
                        $('#month').append('<option value="' + i + '">' + i + '</option>');
                    }
                    //1~31日
                    for (var i = 1; i <= 31; i++) {
                        $('#day').append('<option value="' + i + '">' + i + '</option>');
                    }
                        (function($){
                            function formSetDay(){
                                var lastday = formSetLastDay($('.js-changeYear').val(), $('.js-changeMonth').val());
                                var option = '';
                                for (var i = 1; i <= lastday; i++) {
                                    if (i === $('.js-changeDay').val()){
                                        option += '<option value="' + i + '" selected="selected">' + i + '</option>\n';
                                    }else{
                                        option += '<option value="' + i + '">' + i + '</option>\n';
                                    }
                                }
                                $('.js-changeDay').html(option);
                            }
                            //存在しない日付及びうるう年の制御
                            function formSetLastDay(year, month){
                                var lastday = new Array('', 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
                                if ((year % 4 === 0 && year % 100 !== 0) || year % 400 === 0){
                                    lastday[2] = 29;
                                }
                                return lastday[month];
                            }
                            $('.js-changeYear, .js-changeMonth').change(function(){
                                formSetDay();
                            });
                        })(jQuery);
                    </script>
                    <p class="desc"><span class="required">必須</span>性別</p>
                    <select name="sex"><option value="">-</option><option value="man">男</option><option value="woman">女</option></select>
                    <p class="desc"><span class="required">必須</span>電話番号</p>
                    <input type="tel" name="tel">
                    <br><input type="submit" value="登録する">
                    <!-- 初期登録(名前,年齢,ID etc.)はメールアドレスに飛ばしたURLから登録するのかそのまま進むのかどっち？
                        (https://qiita.com/isotai/items/f810493dd192e0597f3a) -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>