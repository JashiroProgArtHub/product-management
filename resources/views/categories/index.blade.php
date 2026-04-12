@extends('layouts.app')

@section('content')
    <section class="mb-6 rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-3xl font-semibold text-slate-900">Categories</h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">Use categories to control product organization and carry consistent labeling across your inventory.</p>
            </div>
            <a href="{{ route('categories.create') }}" class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">New category</a>
        </div>
    </section>

    <section class="rounded-[2rem] border border-slate-200/80 bg-white p-6 shadow-[0_18px_50px_-30px_rgba(15,23,42,0.35)]">
        @if($categories->isEmpty())
            <div class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center text-sm text-slate-600">
                No categories yet. <a href="{{ route('categories.create') }}" class="font-semibold text-slate-900 hover:underline">Create one now</a> to get started.
            </div>
        @else
            <div class="overflow-x-auto rounded-[1.75rem] border border-slate-200">
                <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
                    <thead class="bg-slate-950 text-left text-xs uppercase tracking-[0.2em] text-slate-200">
                        <tr>
                            <th class="px-5 py-4">Name</th>
                            <th class="px-5 py-4">Color</th>
                            <th class="px-5 py-4">Products</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @foreach($categories as $category)
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-5 py-4 font-medium text-slate-900">{{ $category->cat_name }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <span class="h-5 w-5 rounded-full border border-slate-300" style="background: {{ $category->cat_color }}"></span>
                                        <span class="text-slate-600">{{ $category->cat_color }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-slate-600">{{ $category->products->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
