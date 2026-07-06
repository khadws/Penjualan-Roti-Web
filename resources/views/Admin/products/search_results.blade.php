<x-app-layout>
    @if($products->isEmpty())
    <p>No products found for your search.</p>
@else
    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p>Price: {{ $product->price }}</p>
                </a>
            </li>
        @endforeach
    </ul>
@endif
</x-app-layout>