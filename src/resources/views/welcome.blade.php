<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Renessans Test</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">    
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <table class="table table-hover mt-4">
                        <thead>
                            <tr align="center">
                                <th scope="col">Цифр. код</th>
                                <th scope="col">Букв. код</th>
                                <th scope="col">Едениц</th>
                                <th scope="col">Валюта</th>
                                <th scope="col">Курс на {{$xml['Date']}}</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($xml->Valute as $val)
                                <tr align="center" onclick="window.location.href='/{{$val['ID']}}'; return false" style="cursor: pointer;">
                                    <td>{{$val->NumCode}}</td>
                                    <td>{{$val->CharCode}}</td>
                                    <td>{{$val->Nominal}}</td>
                                    <td>{{$val->Name}}</td>
                                    <td>{{$val->Value}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
