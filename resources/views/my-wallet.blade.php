<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Wallet') }}
        </h2>
    </x-slot>

    <div class="py-12">
                    <div class=" grid place-items-center">
                        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
                            <h1 class="text-xl font-semibold">
                                Hello, {{ DB::table('users')->where('id', '2')->value('name') }}, <span
                                    class="font-normal">please enter your card data</span></h1>
                            <form class="mt-6" action="{{ route('my-wallet.store') }}" method="POST">
                                @csrf
                                <label for="cardholder_name" class="block text-xs font-semibold text-gray-600 uppercase">
                                    Cardholder name:
                                </label>
                                <input id="cardholder_name" type="text" name="cardholder_name" placeholder="JOHN DOE" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner uppercase" required/>

                                <label for="card_number" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">
                                    Card number:
                                </label>
                                <input id="card_number" type="text" name="card_number" placeholder="1234 1234 1234 1234" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required/>

                                <label for="cvv" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">
                                    CVV:
                                </label>
                                <input id="cvv" type="number" name="cvv" placeholder="123" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required/>

                                <label for="expiration_date" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">
                                    Expiration date:
                                </label>
                                <input id="expiration_date" type="date" name="expiration_date" placeholder="YYYY-MM-DD" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required/>

                                <label for="balance" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">
                                    Top up your wallet:
                                </label>
                                <input id="balance" type="number" name="balance" placeholder="100$" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required/>
                                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-black uppercase shadow-lg focus:outline-none hover:text-gray-400">
                                    Send money
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
