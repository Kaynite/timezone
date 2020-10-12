@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">{{ __('admin.orders.create title') }}</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="first_name">{{ __('admin.orders.form.first_name') }}</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="{{ __('admin.orders.form.first_name placeholder') }}" value="{{ $order->first_name }}" readonly>
                        </div>
    
                        <div class="form-group col-lg-6">
                            <label for="last_name">{{ __('admin.orders.form.last_name') }}</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="{{ __('admin.orders.form.last_name placeholder') }}" value="{{ $order->last_name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('common.email') }}</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="{{ __('admin.orders.form.email placeholder') }}" value="{{ $order->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="state">{{ __('admin.orders.form.state') }}</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="{{ __('admin.orders.form.state placeholder') }}" value="{{ $order->state }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="address_1">{{ __('admin.orders.form.address_1') }}</label>
                        <input type="text" class="form-control" id="address_1" name="address_1" placeholder="{{ __('admin.orders.form.address_1 placeholder') }}" value="{{ $order->address_1 }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="address_2">{{ __('admin.orders.form.address_2') }}</label>
                        <input type="text" class="form-control" id="address_2" name="address_2" placeholder="{{ __('admin.orders.form.address_2 placeholder') }}" value="{{ $order->address_2 }}" readonly>
                    </div>

                    @if ($order->discount > 0)
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="discount">{{ __('admin.orders.form.discount') }}</label>
                            <input type="text" class="form-control" id="discount" name="discount" placeholder="{{ __('admin.orders.form.discount placeholder') }}" value="{{ $order->discount }} LE" readonly>
                        </div>
    
                        <div class="form-group col-lg-6">
                            <label for="discount_code">{{ __('admin.orders.form.discount_code') }}</label>
                            <input type="text" class="form-control" id="discount_code" name="discount_code" placeholder="{{ __('admin.orders.form.discount_code placeholder') }}" value="{{ $order->discount_code }}" readonly>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="comment">{{ __('admin.orders.form.comment') }}</label>
                        <textarea class="form-control" name="comment" id="comment" rows="3" readonly>{{ $order->comment }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Status:</label>
                        @if ($order->error)
                        <span class="badge badge-danger">Failed</span>
                        <input type="text" class="form-control" name="error" placeholder="{{ __('admin.orders.form.error placeholder') }}" value="{{ $order->error }}" readonly>
                        @else
                        <span class="badge badge-success">Success</span>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">{{ __('admin.orders.create title') }}</h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $totalQuantity = 0; ?>
                        @foreach ($order->products as $product)
                            <tr>
                                <?php $totalQuantity +=  $product->pivot->quantity ?>
                                <td>{{ $product->id }}</td>
                                <td><a href="{{ route('product.show', $product->id) }}">{{ $product->{ 'title_' . siteLang() } }}</a></td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->price }} LE</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">Subtotal:</td>
                                <td>{{ $order->subtotal }} LE</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Tax:</td>
                                <td>{{ $order->tax }} LE</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Total:</td>
                                <td>{{ $order->total }} LE</td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('admin.orders.create title') }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('orders.update', $order->id) }}" method="post">
                        @csrf
                        @method('put')
                        @if($order->shipped)
                        <div class="row">
                            <div class="col-lg-8">
                                <label>Shipping Status: </label>
                                <span class="badge badge-success">Shipped on ({{ $order->shipped_on }})</span>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button type="submit" name="ship" class="btn btn-danger btn-sm">Cancel Shipping</button>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-lg-8">
                                <label>Shipping Status: </label>
                                <span class="badge badge-danger">Not Shipped</span>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button type="submit" name="ship" class="btn btn-success btn-sm">Start Shipping</button>
                            </div>
                        </div>
                        @endif
                        @if($order->completed)
                        <div class="row mt-3">
                            <div class="col-lg-8">
                                <label>Order Status: </label>
                                <span class="badge badge-success">Completed on ({{ $order->completed_on }})</span>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button type="submit" name="complete" class="btn btn-danger btn-sm">Cancel Order</button>
                            </div>
                        </div>
                        @else
                        <div class="row mt-3">
                            <div class="col-lg-8">
                                <label>Order Status: </label>
                                <span class="badge badge-danger">Not Completed</span>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button type="submit" name="complete" class="btn btn-success btn-sm">Complete Order</button>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
{{ __('admin.orders.show title', ['id' => $order->id]) }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('adminlte/js/custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
@endsection