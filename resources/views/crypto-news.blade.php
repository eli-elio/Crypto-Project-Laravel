<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crypto Market News') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="overflow-x-auto">
            <div class="bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                <div class="w-full lg:w-5/6">
                    <div class="bg-white shadow-md rounded my-6">
                        <section class="bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                            <ul class="flex-column items-center text-center">
                                @foreach ($cryptoNews as $cryptoNew)
                                    <li class="py-3 px-6 text-left text-gray-800">
                                        <div class="uppercase text-xl text-bold" >
                                            <a href="{{ $cryptoNew->getUrl() }}" target="_blank">{{ $cryptoNew->getHeadline() }}</a>
                                        </div>
                                        <div class="text-left">
                                            <a href="{{ $cryptoNew->getUrl() }}" target="_blank">{{ $cryptoNew->getSummary() }}</a>
                                        </div>
                                        <div class="align-content-center items-center">
                                            <a href="{{ $cryptoNew->getUrl() }}" target="_blank"><img src="{{ $cryptoNew->getUrlToImage() }}" alt="image not found" width="60%"></a>
                                        </div>
                                    </li>
                                    <br/><br/>
                                @endforeach
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
