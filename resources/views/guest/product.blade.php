@extends('guest.layouts.structure')

@section('title', $product->name)

@section('content')
    <section class="product-page">
        <product-vue
        product_details=" {{ $product }} "
        related_products=" {{ $related_products }} "
        product_nutrition=" {{ $product_nutrition }} "
        />
    </section>
@endsection
