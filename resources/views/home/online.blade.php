@extends('components.layouts.app2')


@section('content')
    <main dir="rtl" class="flex flex-col items-center justify-between p-4 md:p-24 min-h-screen"
        style="background-image: url('/bg3.jpg')">
        <section>
            <div className="w-screen flex items-start p-4">
                <div className="hidden md:flex space-x-2 text-white">
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
                <div className="flex justify-center  md:pl-20  w-full">
                    <Image src="/logo.png" width='150' height="150" />
                </div>
            </div>

            <div
                className="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-20 mt-8">
                <button className="text-white rounded-md bg-gradient-to-r from-orange-400  text-4xl w-96 h-24">خوولی
                    ڕووبەڕوو</button>
            </div>
            @livewire('createolineform')


            {{-- <footer dir="ltr" className="text-white flex flex-row mt-8 p-4 justify-between">
            <a href="tel:+9647508031313" className="mr-10">+964(750)803-1313</a>
            <p className="text-orange-300">هەولێر - بەختیاری</p>
            <a href="tel:+9647504493513" className="ml-10">+964(750)449-3513</a>
        </footer> --}}
        </section>
    </main>
@endsection
