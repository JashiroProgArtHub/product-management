@extends('layouts.app')

@section('content')
    <section class="mb-6 rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-3xl font-semibold text-slate-900">Products</h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">A unified view of products, stock, and pricing for fast inventory decisions.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('products.create') }}" class="inline-flex items-center justify-center rounded-3xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-200/30 transition hover:bg-slate-800">New product</a>
                <a href="{{ route('categories.index') }}" class="inline-flex items-center justify-center rounded-3xl border border-slate-200 bg-slate-50 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Categories</a>
            </div>
        </div>
    </section>

    <section class="rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        @if($products->isEmpty())
            <div class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center text-sm text-slate-600">
                No products yet. <a href="{{ route('products.create') }}" class="font-semibold text-slate-900 hover:underline">Add your first product</a>.
            </div>
        @else
            <div class="overflow-x-auto rounded-[1.75rem] border border-slate-200">
                <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
                    <thead class="bg-slate-950 text-left text-xs uppercase tracking-[0.2em] text-slate-200">
                        <tr>
                            <th class="px-5 py-4">Product</th>
                            <th class="px-5 py-4">Category</th>
                            <th class="px-5 py-4">Price</th>
                            <th class="px-5 py-4">Stock</th>
                            <th class="px-5 py-4">Description</th>
                            <th class="px-5 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @foreach($products as $product)
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-5 py-4 font-medium text-slate-900">{{ $product->name }}</td>
                                <td class="px-5 py-4 text-slate-600">{{ $product->category?->cat_name ?? 'Unassigned' }}</td>
                                <td class="px-5 py-4 text-slate-600">${{ number_format($product->price, 2) }}</td>
                                <td class="px-5 py-4 text-slate-600">{{ $product->stock }}</td>
                                <td class="px-5 py-4 text-slate-600">{{ $product->description ?? '-' }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('products.show', $product) }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">View</a>
                                        <a href="{{ route('products.edit', $product) }}" class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">Edit</a>
                                        <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete this product?');" class="rounded-2xl bg-rose-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-rose-700">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
