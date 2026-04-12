@extends('layouts.app')

@section('content')
    <section class="mb-6 rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-3xl font-semibold text-slate-900">Create category</h2>
                <p class="mt-2 text-sm text-slate-600">Add a new category and set a label color for easy product grouping.</p>
            </div>
            <a href="{{ route('categories.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Back to categories</a>
        </div>
    </section>

    <section class="rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        <form method="POST" action="{{ route('categories.store') }}" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="cat_name" class="block text-sm font-semibold text-slate-700">Category Name</label>
                <input id="cat_name" type="text" name="cat_name" value="{{ old('cat_name') }}" placeholder="Category name" required class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100" />
            </div>

            <div class="space-y-2">
                <label for="cat_color" class="block text-sm font-semibold text-slate-700">Category Color</label>
                <input id="cat_color" type="text" name="cat_color" value="{{ old('cat_color') }}" placeholder="#4f46e5 or blue" class="w-full rounded-3xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100" />
            </div>

            <button type="submit" class="inline-flex items-center justify-center rounded-3xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-200/50 transition hover:bg-slate-800">Save category</button>
        </form>
    </section>
@endsection
