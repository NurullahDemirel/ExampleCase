<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body >
    <div class="row">
        <div class="col-4">
            <h4 class="card-header">Eleman Aylık Satış Hedef (TL)</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id-firstname</th>
                    <th scope="col">Ocak</th>
                    <th scope="col">Şubart</th>
                    <th scope="col">Mart</th>
                    <th scope="col">Nisan</th>
                    <th scope="col">Mayıs</th>
                    <th scope="col">Haziran</th>
                    <th scope="col">Temmuz</th>
                    <th scope="col">Ağustos</th>
                    <th scope="col">Eylül</th>
                    <th scope="col">Ekim</th>
                    <th scope="col">Kasım</th>
                    <th scope="col">Aralık</th>
                </tr>
                </thead>
                <tbody>

                @foreach($targets as $target)
                    <tr>
                        <th scope="row">{{$target->id}} - {{$target->firstname}} </th>
                        <td>{{$target->preSellerTargets->where('month_number',1)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',2)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',3)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',4)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',5)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',6)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',7)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',8)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',9)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',10)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',11)->first()->monthly_target}}</td>
                        <td>{{$target->preSellerTargets->where('month_number',12)->first()->monthly_target}}</td>
                    </tr>
                @endforeach


                </tbody>
            </table>

            <h4 class="card-header">Eleman Aylık Yaptığı Satış(TL)</h4>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id-firstname</th>
                    <th scope="col">Ocak</th>
                    <th scope="col">Şubart</th>
                    <th scope="col">Mart</th>
                    <th scope="col">Nisan</th>
                    <th scope="col">Mayıs</th>
                    <th scope="col">Haziran</th>
                    <th scope="col">Temmuz</th>
                    <th scope="col">Ağustos</th>
                    <th scope="col">Eylül</th>
                    <th scope="col">Ekim</th>
                    <th scope="col">Kasım</th>
                    <th scope="col">Aralık</th>
                </tr>
                </thead>
                <tbody>

                @foreach($preSellers as $preSeller)
                    <tr>
                        <th scope="row">{{$preSeller->id}} - {{$preSeller->firstname}} </th>
                        @foreach($months as $month)

                            <td>{{$preSellerData[$preSeller->id][$month-1]['total']}}</td>
                        @endforeach
                    </tr>
                @endforeach


                </tbody>
            </table>

            <h4 class="card-header">Eleman Aylık Tuturma Oranı(%)</h4>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id-firstname</th>
                    <th scope="col">Ocak</th>
                    <th scope="col">Şubart</th>
                    <th scope="col">Mart</th>
                    <th scope="col">Nisan</th>
                    <th scope="col">Mayıs</th>
                    <th scope="col">Haziran</th>
                    <th scope="col">Temmuz</th>
                    <th scope="col">Ağustos</th>
                    <th scope="col">Eylül</th>
                    <th scope="col">Ekim</th>
                    <th scope="col">Kasım</th>
                    <th scope="col">Aralık</th>
                </tr>
                </thead>
                <tbody>

                @foreach($preSellers as $preSeller)
                    <tr>
                        <th scope="row">{{$preSeller->id}} - {{$preSeller->firstname}} </th>
                        @foreach($months as $month)
                            <td>%{{ round(($preSellerData[$preSeller->id][$month-1]['total'] / $preSeller->preSellerTargets->where('month_number',$month)->first()->monthly_target)*100,2)}}</td>
                        @endforeach
                    </tr>
                @endforeach


                </tbody>
            </table>

            <h4 class="card-header">Satış Türüne Göre Aylık Prim(TL)</h4>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id-firstname</th>
                    <th scope="col">Ocak</th>
                    <th scope="col">Şubart</th>
                    <th scope="col">Mart</th>
                    <th scope="col">Nisan</th>
                    <th scope="col">Mayıs</th>
                    <th scope="col">Haziran</th>
                    <th scope="col">Temmuz</th>
                    <th scope="col">Ağustos</th>
                    <th scope="col">Eylül</th>
                    <th scope="col">Ekim</th>
                    <th scope="col">Kasım</th>
                    <th scope="col">Aralık</th>
                </tr>
                </thead>
                <tbody>
                @foreach($preSellers as $preSeller)
                    <tr>
                        <th scope="row">{{$preSeller->id}} - {{$preSeller->firstname}} </th>
                        @foreach($months as $month)
                            <td>
                                <p>Hizmet Tedarik: </p>{{round($preSellerData[$preSeller->id]['Hizmet Tedarik'][$month-1]['monthSalePrice'],2)}}
                                <p>Gayrimenkul: </p>{{round($preSellerData[$preSeller->id]['Gayrimenkul'][$month-1]['monthSalePrice'],2)}}
                                <p>Genel: </p>{{round($preSellerData[$preSeller->id]['Genel'][$month-1]['monthSalePrice'],2)}}
                                <p>Total: {{round((round($preSellerData[$preSeller->id]['Hizmet Tedarik'][$month-1]['monthSalePrice'],2) + round($preSellerData[$preSeller->id]['Gayrimenkul'][$month-1]['monthSalePrice'],2)+ round($preSellerData[$preSeller->id]['Genel'][$month-1]['monthSalePrice'],2))*round(($preSellerData[$preSeller->id][$month-1]['total'] / $preSeller->preSellerTargets->where('month_number',$month)->first()->monthly_target)*100,2)/100,2)}}</p>
                            </td>
                        @endforeach
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

        <h4 class="card-header">PreSeller Monthly Sale For Each Sale Type</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id-firstname</th>
                <th scope="col">Ocak</th>
                <th scope="col">Şubart</th>
                <th scope="col">Mart</th>
                <th scope="col">Nisan</th>
                <th scope="col">Mayıs</th>
                <th scope="col">Haziran</th>
                <th scope="col">Temmuz</th>
                <th scope="col">Ağustos</th>
                <th scope="col">Eylül</th>
                <th scope="col">Ekim</th>
                <th scope="col">Kasım</th>
                <th scope="col">Aralık</th>
            </tr>
            </thead>
            <tbody>

            @foreach($preSellers as $preSeller)
                <tr>
                    <th scope="row">{{$preSeller->id}} - {{$preSeller->firstname}} </th>
                    @foreach($months as $month)
                        <td>
                            <p><span>{{$preSellerData[$preSeller->id]['Hizmet Tedarik'][$month-1]['monthSalePrice'] .'*0.03'}}</span></p>
                            <p>Hizmet Tedarik: {{round($preSellerData[$preSeller->id]['Hizmet Tedarik'][$month-1]['monthSalePrice']*0.03,2)}}</p>

                            <p><span>{{$preSellerData[$preSeller->id]['Gayrimenkul'][$month-1]['monthSalePrice'] .'*0.05'}}</span></p>
                            <p>Gayrimenkul: {{round($preSellerData[$preSeller->id]['Gayrimenkul'][$month-1]['monthSalePrice']*0.05,2)}}</p>.

                            <p><span>{{$preSellerData[$preSeller->id]['Genel'][$month-1]['monthSalePrice'] .'*0.04'}}</span></p>
                            <p>Genel: {{round($preSellerData[$preSeller->id]['Genel'][$month-1]['monthSalePrice']*0.04,2)}}</p>
                        </td>
                    @endforeach
                </tr>
            @endforeach


            </tbody>
        </table>







    {{--    <table class="table">--}}
{{--        <tr>--}}
{{--            <th>Name</th>--}}
{{--            <th>Sale Type</th>--}}
{{--            <th>Count</th>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            @foreach($preSellers as $preSeller)--}}
{{--                <td rowspan = "2">{{$preSeller->id}} - {{$preSeller->firstname}}</td>--}}
{{--            @endforeach--}}
{{--            <td rowspan = "2">xxx</td>--}}

{{--            <td>Advanced Web</td>--}}
{{--            <td>75</td>--}}
{{--        </tr>--}}

{{--    </table>--}}



{{--    <h4 class="card-header">Premium Rate</h4>--}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">id-firstname</th>--}}
{{--            <th scope="col">Total Target</th>--}}
{{--            <th scope="col">Total Sale</th>--}}
{{--            <th scope="col">(Total Sale/Target Sale)*100</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($preSellers as $preSeller)--}}
{{--            <tr>--}}
{{--                <th scope="row">{{$preSeller->id}} - {{$preSeller->firstname}} </th>--}}
{{--                <td>{{$preSellerData[$preSeller->id]['yearlyTotalTarget']}}</td>--}}
{{--                <td>{{$preSellerData[$preSeller->id]['yearTotal']}}</td>--}}
{{--                <td>{{$preSellerData[$preSeller->id]['yearRate']}}</td>--}}

{{--            </tr>--}}
{{--        @endforeach--}}

{{--        </tbody>--}}
{{--    </table>--}}

{{--    <h4 class="card-header">Total Price For Each Sale Type</h4>--}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">id-firstname</th>--}}
{{--            @foreach($saleTypes as $saleType)--}}
{{--                <th>{{$saleType}}</th>--}}
{{--            @endforeach--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($preSellers as $preSeller)--}}
{{--            <tr>--}}
{{--                <th scope="row">{{$preSeller->id}} - {{$preSeller->firstname}} </th>--}}
{{--                @foreach($saleTypes as $saleType)--}}
{{--                    <td>{{$preSellerData[$preSeller->id][$saleType.'total-price']}}</td>--}}
{{--                @endforeach--}}


{{--            </tr>--}}
{{--        @endforeach--}}

{{--        </tbody>--}}
{{--    </table>--}}


{{--    <h4 class="card-header">Prim For Each Sale Type</h4>--}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">id-firstname</th>--}}
{{--            @foreach($saleTypes as $saleType)--}}
{{--                <th>{{$saleType}}</th>--}}
{{--            @endforeach--}}
{{--            <th>Prim(Prim Rate)*(Yearly Retention Rate)</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($preSellers as $preSeller)--}}
{{--            <tr>--}}
{{--                <th scope="row">{{$preSeller->id}} - {{$preSeller->firstname}} </th>--}}
{{--                @foreach($saleTypes as $saleType)--}}
{{--                    <td>{{$preSellerData[$preSeller->id][$saleType.'total-price']}}</td>--}}
{{--                @endforeach--}}


{{--            </tr>--}}
{{--        @endforeach--}}

{{--        </tbody>--}}
{{--    </table>--}}




    </body>
</html>
