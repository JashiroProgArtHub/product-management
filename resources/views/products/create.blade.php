@extends('layouts.app')

@section('content')
    <section class="mb-6 rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-3xl font-semibold text-slate-900">Create product</h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">Add a new product with pricing, stock, and category assignment.</p>
            </div>
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Back to products</a>
        </div>
    </section>

    <section class="rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        <form method="POST" action="{{ route('products.store') }}" class="space-y-6">
            @csrf

            <div class="grid gap-6">
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-semibold text-slate-700">Product Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Enter product name" required class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-100" />
                </div>

                <div class="space-y-2">
                    <label for="description" class="block text-sm font-semibold text-slate-700">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Describe the product" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-100">{{ old('description') }}</textarea>
                </div>

                <div class="grid gap-6 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="price" class="block text-sm font-semibold text-slate-700">Price</label>
                        <input id="price" type="number" name="price" step="0.01" value="{{ old('price') }}" placeholder="0.00" required class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-100" />
                    </div>
                    <div class="space-y-2">
                        <label for="stock" class="block text-sm font-semibold text-slate-700">Stock</label>
                        <input id="stock" type="number" name="stock" step="1" min="0" value="{{ old('stock', 0) }}" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-100" />
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="category_id" class="block text-sm font-semibold text-slate-700">Category</label>
                    <select id="category_id" name="category_id" required class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-100">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="inline-flex items-center justify-center rounded-3xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-200/40 transition hover:bg-slate-800">Save product</button>
        </form>
    </section>
@endsection
