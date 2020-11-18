<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8">
    <title>Ramadan Timing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
</head>
<body>
<div class="container  col-sm-12">
    <div class="col-md-10 col-md-offset-1 col-sm-12">
        <div class="row">
            <div class="row" style="text-align: center;margin-top: 20px;">
                <img class="img-fluid" src="{{asset('public/images/logo.png')}}" style="text-align: center; ">
            </div>
            <div class="row">
                <h4 style="font-size: 2.5em;">পবিত্র মাহে রমজানের সাহরী ও ইফতারের সময়সূচী হিজরি ১৪৪১</h4>
            </div>
            <div class="card-block">
                <div class="">
                    <div class="row form-group col-md-8 col-sm-8 col-lg-8 col-md-offset-2 col-sm-offset-2 col-lg-offset-2" style="text-align: center; padding: 0; font-size: 1.5em">
                        <label for="district" style="color: red;text-shadow: 1px 1px 1px grey; font-size: 2em;">আপনার জেলা নির্বাচন করুন</label>
                        <select class="form-control js-example-basic-single col-sm-12" name="district" onchange="singleDay()" id="district" style="font-size:2em;">
                            @if(isset($districts))
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <button class="form-group col-md-8 col-sm-8 col-lg-8 col-md-offset-2 col-sm-offset-2 col-lg-offset-2 btn btn-danger">
                        আজকের সময়সূচী
                        @if(isset($timings))
                            @foreach($timings as $timing)
                                @if($timing->ramadan->date_english == $today)
                                     ( {{ $timing->ramadan->date_bangla }}, ২০২০ )
                                @endif
                            @endforeach
                        @endif
                    </button>
                </div>
                <div class="card-block">
                    <div class="row table-responsive col-md-12" style="box-shadow:10px 10px 10px grey; padding: 0; margin-top: 20px">
                        <table id="today_table" class="table table-striped table-bordered nowrap" style="margin-bottom: 0;" >
                            <thead>
                            <tr class="current_header">
                                <th style="text-align: center">সাহরীর শেষ সময়</th>
                                <th style="text-align: center">ইফতারের সময়</th>
                            </tr>
                            </thead>
                            <tbody id="today_body" style="overflow-y:scroll;">
                            @if(isset($timings))
                                @foreach($timings as $timing)
                                    @if($timing->ramadan->date_english == $today)
                                        <tr class="current_table">
                                            <td>{{ $timing->sehri_time }}</td>
                                            <td>{{ $timing->iftar_time }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <button class="form-group col-md-8 col-sm-8 col-lg-8 col-md-offset-2 col-sm-offset-2 col-lg-offset-2 btn btn-success" onclick="fullMonth()" style="font-size:2.5em;">
                        জেলার সম্পূর্ণ সময়সূচী দেখতে ক্লিক করুন
                    </button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-block">
                <div class="card-block">
                    <div  class="row" id="tableHead">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" style="margin: 0px 30px 0px 15px;width:96%;">
                                <thead style="box-shadow:10px 10px 10px grey; position: sticky; top: 0;">
                                    <tr class="full_header">
                                        <th style="text-align: center;width:20%;">রমজান </th>
                                        <th style="text-align: center;width:20%;">তারিখ</th>
                                        <th style="text-align: center;width:20%;">বার </th>
                                        <th style="text-align: center;width:20%;">সাহরীর শেষ সময়</th>
                                        <th style="text-align: center;width:20%;">ইফতারের সময়</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="table-responsive col-md-12" style="max-height:580px; overflow-y:scroll;">
                        <table id="time_table" class="table table-striped table-bordered " style="">

                        </table>
                    </div>
                </div>
            </div>

            <div class="row card-footer" style="margin-top:-20px;">
                <div>
                    <p class="footer2" style="font-size:2em;margin-top:-11px;">তথ্যসূত্রঃ ইসলামিক ফাউন্ডেশন, গণপ্রজাতন্ত্রী বাংলাদেশে সরকার</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    $("#tableHead").hide();
    function singleDay() {
        var dis = document.getElementById('district');
        var district = dis.options[dis.selectedIndex].value;
        $.ajax({
            dataType: 'json',
            type : 'get',
            url : '{{URL::to('singleDay')}}',
            data:{ 'district': district },
            success: function (data) {
                console.log(data);
                $('#today_body').empty();
                $('#time_table').empty();
                $("#tableHead").hide();

                $.each(data.timings, function (key, value) {
                    $('#today_body').append(
                        '<tr class="current_table">' +
                        "<td>" + value.sehri_time + "</td>" +
                        "<td>" + value.iftar_time + "</td>" +
                        "</tr>"
                    );
                });
            }
        });
    }

    function fullMonth() {
        $("#tableHead").show();
        var dis = document.getElementById('district');
        var district = dis.options[dis.selectedIndex].value;
        var count = 1;
        $.ajax({
            dataType: 'json',
            type : 'get',
            url : '{{URL::to('fullMonth')}}',
            data:{ 'district': district },
            success: function (data) {
                console.log(data);
                $('#time_table').empty();

                $('#time_table').append(
                    // '<thead style="box-shadow:10px 10px 10px grey;position: sticky; top: 0;">' +
                    // '<tr class="full_header">' +
                    // '<th style="text-align: center">রমজান </th>' +
                    // '<th style="text-align: center">এপ্রিল / মে</th>' +
                    // '<th style="text-align: center">বার </th>' +
                    // '<th style="text-align: center">সাহরীর শেষ সময়</th>' +
                    // '<th style="text-align: center">ইফতারের সময়</th>' +
                    // '</tr>' +
                    // '</thead>' +
                    '<tbody style="box-shadow:10px 10px 10px grey; font-weight: bold; font-size: 1.2em;">'
                );

                $.each(data.timings, function (key, value) {
                    if(count == 1){
                        $('#time_table').append(
                            '<tr class="type_title">' +
                            '<th colspan="5" style="text-align: center">রহমত </th>' +
                            "</tr>");
                    }
                    if(count == 11){
                        $('#time_table').append(
                            '<tr class="type_title">' +
                            '<th colspan="5" style="text-align: center">মাগফিরাত </th>' +
                            "</tr>");
                    }
                    if(count == 21){
                        $('#time_table').append(
                            '<tr class="type_title">' +
                            '<th colspan="5" style="text-align: center">নাজাত </th>' +
                            "</tr>");
                    }
                    $('#time_table').append("<tr>" +
                        "<td style='width:20%;'>" + value.ramadan_no + "</td>" +
                        "<td style='width:20%;'>" + value.date_bangla + "</td>" +
                        "<td style='width:20%;'>" + value.day + "</td>" +
                        "<td style='width:20%;'>" + value.sehri_time + "</td>" +
                        "<td style='width:20%;'>" + value.iftar_time + "</td>" +
                        "</tr>"
                    );
                    count++;
                });
                $('#time_table').append(
                    '</tbody>'
                );

            }
        });
    }
</script>
</body>
</html>
