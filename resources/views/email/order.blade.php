<!DOCTYPE html>
<html lang="ar">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>بريد تأكيد الطلب</title>

</head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size:16px; direction: rtl; text-align: right;">
    <h1>شكراً لك على طلبك</h1>
    <h2>رقم طلبك هو: #{{$mailData['order']->id}}</h2>

    <h2>عنوان الشحن</h2>
    <address>
        <strong>{{ $mailData['user']->name}}</strong><br>

        {{ $mailData['address']->city }}, {{ $mailData['address']->country }} {{ $mailData['address']->street}}<br>
        البريد الإلكتروني: {{ $mailData['user']->email }}
    </address>

    <h2>المنتج</h2>

    <table cellpadding="3" cellspacing="3" border="0" width="700">
        <thead>
            <tr style="background: #CCC;">
                <th>المنتج</th>
                <th>السعر</th>
                <th>الكمية</th>
                <th>المجموع</th>
            </tr>
        </thead>                              
        <tbody>
            @foreach ($mailData['orderitems'] as $item)
            <tr>
                <td>{{ $item->product_title }}</td>
                <td>{{ number_format($item->product_price, 2) }} ريال</td>
                <td>{{ $item->product_quantity }}</td> 
                <td>{{ number_format($item->product_price * $item->product_quantity, 2) }} ريال</td>
            </tr>
            @endforeach 
            <tr>
                <th colspan="3" align="right">المجموع:</th>
                <td>${{ number_format($mailData['order']->totalcost, 2) }}
            </tr> 
        </tbody>
    </table>

</body> 
</html>
