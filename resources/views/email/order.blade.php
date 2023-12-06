<!DOCTYPE html >
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name= "viewport" content="width=device-widt, initial-scale-1.0"> 
    <meta http-equiv= "X-UA-Compatible" content= "ie=edge">

    <title> Order Email </title>

</head>
<body style="font-family: Arial,Helvetica, sans,serif; font-size:16px;">
            <h1>thanks for Your order</h1>
            <h2> Your order id is:#{{$mailData['order']->id}}</h2>

            <h2>Shipping Address</h2>
            <address>
                <strong>{{ $mailData[ 'user' ]->name}}</strong><br>

                {{ $mailData['orderaddress']->city }}, {{ $mailData['orderaddress']->country }} {{ $mailData['orderaddress']->street}}<br>
                Email: {{ $mailData[ 'order' ]->email }}
            </address>

            <h2> product</h2>

            <table cellpadding="3" cellspacing="3" border="0" width="700">
                <thead>
                    <tr style="background: #CCC;">
                         <th>Product</th>
                         <th>Price</th>
                         <th>Qty</th>
                         <th>Total</th>

                    
                    </tr>
                </thead>                              
                <tbody>
                    @foreach ($mailDatal['orderitems'] as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ number_format($item->price,2) }}</td>
                        <td>{{ $item->product_quantity }}</td> 
                        <td>{{ number_format($item->total,2) }}</td>
                    </tr>
                     @endforeach 
                     <tr>
                        <th colspan="3" align="right">total:</th>
                        <td>${{number_format($mailData['order']->totalcost,2)}}
                     </tr> 
                </tbody>
            </table>

</body> 
</html>