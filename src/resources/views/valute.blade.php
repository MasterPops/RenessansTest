<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <title>{{$val->CharCode}}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">    
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Назад</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <h2>{{$val->Nominal}} {{$val->Name}}</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center" align="center">
                        <div class="col-auto" >
                            <p>Цифр. код</p>
                            <p>{{$val->NumCode}}</p>
                        </div>
                        <div class="col-auto">
                            <p>Букв код</p>
                            <p>{{$val->CharCode}}</p>
                        </div>
                        <div class="col-auto">
                            <p>Едениц</p>
                            <p>{{$val->Nominal}}</p>
                        </div>
                        <div class="col-auto">
                            <p>Валюта</p>
                            <p>{{$val->Name}}</p>
                        </div>
                        <div class="col-auto">
                            <p>Курс</p>
                            <p>{{$val->Value}}</p>
                        </div>
                    </div>                 
                    <form method="GET">
                        <div class="row justify-content-between">
                            <div class="col-12">
                                <div class="row justify-content-center">                        
                                    <div class="col-auto">
                                        <center>Начало графика</center>
                                        <input type="date" name="date_old" max="{{date('Y-m-d')}}" value="{{date('Y-m-d',strtotime(str_replace('/', '-', $dateold)))}}">
                                    </div>
                                    <div class="col-auto">
                                        <center>Конец графика</center>
                                        <input type="date" name="date_now" max="{{date('Y-m-d')}}" value="{{date('Y-m-d',strtotime(str_replace('/', '-', $datenow)))}}">
                                    </div>
                                </div>                                                    
                                <div class="row justify-content-center mt-3">
                                    <div class="col-4">
                                        <button type="succes" class="btn btn-block btn-primary">Получить</button>
                                    </div>
                                </div> 
                            </div>  
                        </div>
                    </form>
                    <div class="mt-5 mb-5">
                        <center>
                            <h3>График котировок</h3>
                        </center>
                    </div>
                    <div id="chart" style="height: 250px;"></div>
                    <script>
                        new Morris.Line({
                            element: 'chart',
                            data: [
                                <?php   
                                    foreach ($recs as $rec) 
                                    {
                                        echo "{ date: '".date('Y-m-d', strtotime($rec['Date']))."', value: '".str_replace(',', '.', $rec->Value)."' },";
                                    }
                                ?>    
                            ],
                            xkey: 'date',
                            ykeys: ['value'],
                            labels: ['Value'],
                            xLabels: "day",
                            ymin: "auto",
                            ymax: "auto"
                        });
                   </script>
                </div>
            </div>
        </div>
    </body>
</html>
