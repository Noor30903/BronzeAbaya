<!DOCTYPE html >
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name= "viewport" content="width=device-widt, initial-scale-1.0"> 
    <meta http-equiv= "X-UA-Compatible" content= "ie=edge">

    <title> Order Email </title>

</head>
<body style="font-family: Arial,Helvetica, sans,serif; font-size:16px;">
            <h1>thanks for ur order</h1>
            <h2> ur order id is:#{{$mailData['order']->id}}</h2>

            <h2>Shipping Address</h2>
            <address>
                <strong>{{ $mailData[ 'order' ]->first_name.' .$mailData[ 'order']->last_name}}</strong><br>
                {{ $mailData[ 'order' ]->address }}<br>
                {{ $mailData['order']->city }}, {{ $mailData['order']->zip }} {{ $mailData['order']->countryName}}<br>
                Phone: {{ $mailData[ 'order' ]->mobile }}<br>
                Email: {{ $mailData[ 'order' ]->email }}
            </address>

            <h2> product</h2>

            <table cellpadding="3" cellspacing="3" border="0" width="700">
                <thead>
                    <tr style="background: #CCC;">
                         <th>Product</th>
                         <th>Price</th>
                         <th>Qty</th>
                         <th ">Total</th>

                    
                    </tr>
                </thead>                              
                <tbody>
                    @foreach ($mailDatal['order']->orderItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price,2) }}</td>
                        <td>{{ $item->qty }}</td> 
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