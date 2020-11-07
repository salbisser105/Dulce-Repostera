<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Acquired</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>OrderId</td>
        <td>ProductId</td>
        <td>Quantity</td>
        <td>Price</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($items as $products)
        <tr>
            <td>{{ $products->OrderId }}</td>
            <td>{{ $products->ProductId }}</td>
            <td>{{ $products->Quantity }}</td>
            <td>{{ $products->Price }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>