<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@lang('messages.order_receipt')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css%22%3E
</head>
<body>
  <h1 class="page-header mt-4">
    <small>@lang('messages.name')</small>
  </h1>
  <small>{{$data['userid']}}</small>
  <table class="table table-bordered">
    <thead>
      <tr class="table-success">
        <td>@lang('messages.productName')</td>
        <td>@lang('messages.productDescription')</td>
        <td>@lang('messages.productCategory')</td>
        <td>@lang('messages.productPrice')</td>
        <td>@lang('messages.quantity')</td>
        <td>@lang('messages.total-sub-price')</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($data['products'] as $item)
      <tr>
        <td>{{ $item['product']->getName() }}</td>
        <td>{{ $item['product']->getDescription() }}</td>
        <td>@lang('messages.' . $item['product']->getCategory())</td>
        <td>${{ $item['product']->getPrice() }}</td>
        <td>{{ $item['quantity'] }}</td>
        <td>${{ $item['quantity']*$item['product']->getPrice() }}</td>
      </tr>
      @endforeach
    </tbody>

  </table>
  <h5 class="page-header mt-4">@lang('messages.total-price'): ${{ $data['order']['Total'] }}</h5>
</body>

</html>