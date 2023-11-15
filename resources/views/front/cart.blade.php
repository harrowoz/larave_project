@extends('front.layouts.master')
@section('main-content')
<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
        <div class="container">
            @if(Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!!Session::get('success')!!} 
                        </div>
                </div>
             @endif           
            @if(Session::has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {!!Session::get('error')!!} 
                    </div>
                </div>
            @endif   
            <div class="row">
                @if(Cart::count()>0)
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartContent as $item)
                                <tr>
                                    <td class="cart__product__item text-start">
                                    @if(!empty($item->options->image))
                                        <img src="{{asset('front-assets/img/shop-cart/cp-1.jpg')}}" alt="">
                                        @else
                                        <img src="{{asset('front-assets/img/shop-cart/cp-1.jpg')}}" alt="">
                                        @endif
                                        <div class="cart__product__item__title">
                                            <h6>{{$item->name}}</h6>
                                        </div>
                                    </td>
                                    <td class="cart__price">${{$item->price}}</td>
                                    <td class="cart__quantity">
                                    <div style="align-items: center;display: flex;width:50%">
                                    <div>
                                        <button data-id="{{$item->rowId}}" class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm border-0 text-center" value="{{$item->qty}}">
                                    <div>
                                      <button data-id="{{$item->rowId}}" class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 add">
                                        <i class="fa fa-plus"></i>
                                        </button>  
                                    </div>
                                </div>

                                    </td>
                                    <td class="cart__total">${{$item->price*$item->qty}}</td>
                                    <td class="cart__close"><button class="btn btn-sm btn-danger" onclick="deleteItem('{{$item->rowId}}');"><i class="fa fa-times"></i></button></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{ route("front.shop")}}">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="{{ route("front.cart")}}"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                   
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>${{Cart::subtotal()}}</span></li>
                            <li>Total <span>$ {{Cart::subtotal()}}</span></li>
                        </ul>
                        <a href="{{ route("front.checkout")}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h4>Your Cart is empty!</h4>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
@endsection
@section('customJs')
    <script> 
$('.add').click(function(){
      var qtyElement = $(this).parent().prev(); // Qty Input
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue < 10) {
        qtyElement.val(qtyValue+1);
        var rowId = $(this).data('id');
        var newQty = qtyElement.val(); 
        updateCart(rowId,newQty)
      }            
  });

  $('.sub').click(function(){
      var qtyElement = $(this).parent().next(); 
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue > 1) {
          qtyElement.val(qtyValue-1);
          var rowId=$(this).data('id');
          var newQty=qtyElement.val(); 
          updateCart(rowId,newQty)
      }        
  });
  function updateCart(rowId,qty){
    $.ajax({
        url:'{{route("front.updateCart")}}',
        type:'post',
        data:{rowId:rowId,qty:qty},
        datatype:'json',
        success:function(response){
        }
    });
  }

  function deleteItem(rowId){
    if(confirm("Are you sure you want to delete?")){
    $.ajax({
            url:'{{route("front.deleteItem.cart")}}',
            type:'post',
            data:{rowId:rowId},
            datatype:'json',
            success:function(response){
                if(response.status==true){
                    window.location.href='{{route("front.cart")}}';
                }
            }
        });
    }
  }
</script>
 @endsection

