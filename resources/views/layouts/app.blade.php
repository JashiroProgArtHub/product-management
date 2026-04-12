<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Product Management') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
        <header class="mb-10 overflow-hidden rounded-[2rem] border border-slate-200/80 bg-gradient-to-r from-slate-950 via-slate-900 to-sky-700 px-6 py-8 shadow-[0_30px_60px_-30px_rgba(15,23,42,0.5)] text-white">
            <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">
                <div class="max-w-2xl">
                    <p class="text-sm uppercase tracking-[0.24em] text-sky-300">Inventory dashboard</p>
                    <h1 class="mt-4 text-4xl font-semibold tracking-tight sm:text-5xl">{{ config('app.name', 'Product Management') }}</h1>
                    <p class="mt-4 text-base leading-7 text-slate-200">A polished inventory workspace for tracking products, categories, and stock across your store.</p>
                </div>

                <nav class="flex flex-wrap items-center gap-3 text-sm font-semibold">
                    <a href="{{ route('products.index') }}" class="rounded-full border border-white/20 bg-white/10 px-4 py-2 transition hover:bg-white/20">Products</a>
                    <a href="{{ route('categories.index') }}" class="rounded-full border border-white/20 bg-white/10 px-4 py-2 transition hover:bg-white/20">Categories</a>
                    <a href="{{ route('products.create') }}" class="rounded-full bg-white px-4 py-2 text-slate-950 transition hover:bg-slate-100">Add product</a>
                    <a href="{{ route('categories.create') }}" class="rounded-full border border-white/20 bg-white/10 px-4 py-2 text-white transition hover:bg-white/20">Add category</a>
                </nav>
            </div>
        </header>

        @if(session('success'))
            <div class="mb-6 rounded-3xl border border-emerald-200/80 bg-emerald-50/90 px-5 py-4 text-sm text-emerald-800 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-3xl border border-rose-200/80 bg-rose-50/90 px-5 py-4 text-sm text-rose-800 shadow-sm">
                <strong class="font-semibold">Fix the errors below:</strong>
                <ul class="mt-3 list-disc space-y-1 pl-5 text-slate-700">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
