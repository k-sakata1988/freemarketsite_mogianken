@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="tabs">
    <button 
        class="tab-button {{ $activeTab === 'recommended' ? 'active' : '' }}" 
        data-tab="recommended">
        おすすめ
    </button>

    <button 
        class="tab-button {{ $activeTab === 'mylist' ? 'active' : '' }}" 
        data-tab="mylist"
        @if(!Auth::check()) data-requires-login="true" @endif>
        マイリスト
    </button>
</div>

<div id="items-container">
    @include('items._items', ['items' => $items])
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.tab-button');
    const container = document.getElementById('items-container');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const requiresLogin = button.dataset.requiresLogin === "true";
            const tabType = button.dataset.tab;

            if (requiresLogin) {
                window.location.href = '/login';
                return;
            }

            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            fetch(`/items/tab/${tabType}`)
                .then(response => response.text())
                .then(html => {
                    container.innerHTML = html;
                })
                .catch(err => {
                    console.error('タブ取得エラー:', err);
                });
        });
    });
});
</script>
@endsection
