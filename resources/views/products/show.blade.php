@extends('layouts.app')

@section('content')
    <section class="mb-6 rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-3xl font-semibold text-slate-900">{{ $product->name }}</h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $product->description ?? 'No description provided.' }}</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center justify-center rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Edit</a>
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-3xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-200/30 transition hover:bg-slate-800">Back to products</a>
            </div>
        </div>
    </section>

    <section class="rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6">
                <p class="text-sm font-semibold text-slate-500">Category</p>
                <p class="mt-3 text-xl font-semibold text-slate-900">{{ $product->category?->cat_name ?? 'Unassigned' }}</p>
            </div>
            <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6">
                <p class="text-sm font-semibold text-slate-500">Price</p>
                <p class="mt-3 text-xl font-semibold text-slate-900">${{ number_format($product->price, 2) }}</p>
            </div>
            <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6">
                <p class="text-sm font-semibold text-slate-500">Stock</p>
                <p class="mt-3 text-xl font-semibold text-slate-900">{{ $product->stock }}</p>
            </div>
            <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6">
                <p class="text-sm font-semibold text-slate-500">Created</p>
                <p class="mt-3 text-xl font-semibold text-slate-900">{{ $product->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </section>
@endsection
