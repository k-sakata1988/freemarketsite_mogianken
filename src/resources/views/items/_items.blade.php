{{-- resources/views/items/_items.blade.php --}}
<!-- @foreach ($items as $item)
<div class="item-card">
    <a href="{{ route('items.show', $item->id) }}">
        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}">
        <h3>{{ $item->name }}</h3>
        <p>¥{{ number_format($item->price) }}</p>
    </a>
</div>
@endforeach -->
@php
// 仮データを用意
$dummyItems = $items->isEmpty() ? collect([
    (object)[
        'id' => 1,
        'name' => '仮商品A',
        'price' => 1000,
        'image_path' => 'dummy1.png'
    ],
    (object)[
        'id' => 2,
        'name' => '仮商品B',
        'price' => 2000,
        'image_path' => 'dummy2.png'
    ],
    (object)[
        'id' => 3,
        'name' => '仮商品C',
        'price' => 3000,
        'image_path' => 'dummy3.png'
    ],
]) : $items;
@endphp

<div class="items-container">
@foreach ($dummyItems as $item)
    <div class="item-card">
        <a href="{{ route('items.show', $item->id) }}">
            {{-- 仮画像はstorageにない場合はサンプル画像を表示 --}}
            <img src="{{ asset('storage/' . ($item->image_path ?? 'dummy.png')) }}" alt="{{ $item->name }}"onerror="this.src='https://via.placeholder.com/200x200?text=商品画像';">
            <h3>{{ $item->name }}</h3>
            <p>¥{{ number_format($item->price) }}</p>
        </a>
    </div>
@endforeach
</div>