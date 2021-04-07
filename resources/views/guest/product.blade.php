@extends('guest.layouts.structure')

@section('title', $product->name)

@section('content')
    <section class="product-page" id="product-vue">
        <product-vue
        product_details="{{$product}}"
        related_products="{{$related_products}}"
        product_nutrition="{{$product_nutrition}}"
        />
    </section>
@endsection

@section('script')
    <script src=" {{ asset('js/app2.js') }} " charset="utf-8"></script>
@endsection
