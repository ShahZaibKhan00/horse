@extends('layouts.app')

@section('content')

<style>

    .primeColor_btn i {color: #fff !important; }

</style>

<section class="inner_page_banner accessoriesbanner">
	<div class="container text-center">
		<h1 class="heading80px monte_carlo fw_400">Cart</h1>
	</div>
</section>

<section class="cart_section">

    <div class="container light">

        <form action="{{ url('checkout') }}" method="HEAD">

            <table cellpadding="10" width="100%">

                <thead>

                    <tr>

                        <!-- <th>&nbsp;</th> -->

                        <th>&nbsp;</th>

                        <th>PRODUCT</th>

                        <th>QUANTITY</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($data as $data)

                    <tr>

                        <!--<td>X</td>-->

                        <td>

                            <img src="{{ getenv('APP_URL') }}/Featured_image/{{ $data->pro_Fimg }}" class="cart_pro_img" width="" hight="" alt="">

                        </td>

                        <td>

                            <div class="tag_wrap">

                                <div class="tag">Choose Colors: {{ $data->color_name }}</div>

                                <!--- <div class="tag">Age: 10+ Years</div> --->


                            </div>

                        </td>

                        <td>

                            <div class="tag_wrap">

                                <div class="tag">Quantity: {{ $data->pro_quantity }}</div>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            <!--<button type="submit" class="primeColor_btn float-end">Update</button>-->
            <div class="btn_set justify-content-center mt-4">
                <a href="{{ url('products') }}" class="border_btn"><i class="fa fa-angle-double-left light" aria-hidden="true"></i> CONTINUE SHOPPING</a>
                <button class="border_btn">PROCEED TO CHECKOUT <i class="fa fa-angle-double-right light" aria-hidden="true"></i></button>
            </div>

        </form>

    </div>

</section>

@endsection