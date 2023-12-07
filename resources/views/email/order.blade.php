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

                {{ $mailData['address']->city }}, {{ $mailData['address']->country }} {{ $mailData['address']->street}}<br>
                Email: {{ $mailData[ 'user' ]->email }}
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
                    @foreach ($mailData['orderitems'] as $item)
                    <tr>
                        <td>{{ $item->product_title }}</td>
                        <td>{{ number_format($item->product_price,2) }}</td>
                        <td>{{ $item->product_quantity }}</td> 
                        <td>{{ number_format($item->product_price * $item->product_quantity ,2) }}</td>
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