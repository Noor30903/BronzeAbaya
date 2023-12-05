<!DOCTYPE html >
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name= "viewport" content="width=device-widt, initial-scale-1.0"> 
    <meta http-equiv= "X-UA-Compatible" content= "ie-edge">

<title> Order Email </title>

</head>
<body>
            <h1>thanks for ur order</h1>
            <h2> ur order id is:# {{$mailData['order']->id}}</h2>
            <h2> product</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                         <th>Product</th>
                         <th width="100">Price</th>
                         <th width="100">Pric</th>
                         <th width="100">Price</th>

                    
                    </tr>
                </thead>                              
                <tbody>
                    @foreach (SmailDatal'order'i| as sitem)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format ($item->price,2) }}</td>
                        <td>{{ $item->qty }}</td> 
                        <td>{{ number_format (Sitem->total,2) }}</td>
                    </tr>
                     @endforeach 


                     <tr>
                        <th colspan="3" class="text-right">Grand total:</th>
                        <td>${{number_format($mailData['order']->grand_total,2)}}
                     </tr> 

</body> 
</html>