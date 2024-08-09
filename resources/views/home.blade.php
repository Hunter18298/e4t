@extends('layouts.app')

@section('content')
    {{-- @if ($isHome)
        @include('partials.splash-screen', ['finishLoading' => 'handleLoadComplete'])
    @else --}}
    <main dir="rtl" class="flex flex-col items-center justify-between p-4 md:p-24 min-h-screen"
        style="background-image: url('/bg3.jpg')">
        <div class="w-screen flex items-start p-4 ">
            <div class="hidden md:flex space-x-2 text-white">
                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                    <FaFacebook size={24} />
                </a>
                <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
                    <FaTwitter size={24} />
                </a>
                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
                    <FaInstagram size={24} />
                </a>
            </div>
            <div class="flex justify-center md:pl-20 w-full">
                <img src="/logo.png" width="150" height="150" alt="Logo" />
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-20 mt-8">
            <a href='/meeting'>
                <button
                    class="glassmorphism-button text-white text-4xl font-bold py-4 px-8 rounded-md shadow-lg transform transition-transform hover:scale-105">خوولی
                    ڕوبەڕوو</button>
            </a>
            <a href='/online'>
                <button
                    class="md:mr-20 glassmorphism-button text-white text-lg  md:text-4xl font-bold py-4 px-8 rounded-md shadow-lg transform transition-transform hover:scale-105">خوولی
                    ئۆنڵاین</button>
            </a>
        </div>
        <div class="md:text-xl mt-8 space-y-4">
            <h1 class="text-white square-bullet">ئەو فۆڕمە دیجیتاڵیە زانیاریەکانت بەدروستی پڕ بکەرەوە وخۆت تۆمار بکە لە
                خولی ئۆنڵاین یان ڕوبەڕوو هەڵبژرە</h1>
            <h1 class="text-white square-bullet">لە نزیکترین کاتدا تیمی ئیفۆرتیپەیوەندیت پێوە دەکەین</h1>
        </div>
        <footer dir="ltr" class="text-white flex flex-row mt-8 p-4 justify-between">
            <a href="tel:+9647508031313" class="mr-10">+964(750)803-1313</a>
            <p class="text-orange-300">هەولێر - بەختیاری</p>
            <a href="tel:+9647504493513" class="ml-10">+964(750)449-3513</a>
        </footer>
    </main>
    {{-- @endif --}}
@endsection
