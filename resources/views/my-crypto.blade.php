<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Cryptocurrencies') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="overflow-x-auto">
            <div class="bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                <div class="w-full lg:w-5/6">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Wallet balance = {{ DB::table('wallets')->where('user_id', '2')->value('balance') ?? 0 }}$
                    </div>
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Symbol</th>
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-center">Price When Bought</th>
                                        <th class="py-3 px-6 text-center">Amount</th>
                                        <th class="py-3 px-6 text-center">Price Now</th>
                                        <th class="py-3 px-6 text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{ DB::table('my_cryptocurrencies')->where('user_id', 2)->value('symbol') }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span class="font-medium">{{ DB::table('crypto_assets')->where('symbol', DB::table('my_cryptocurrencies')->where('user_id', 2)->value('symbol'))->orderBy('id', 'desc')->value('name') }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="font-medium">{{ DB::table('my_cryptocurrencies')->where('user_id', 2)->value('price')}}$</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="font-medium">{{ DB::table('my_cryptocurrencies')->where('user_id', 2)->value('amount')}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span class="font-medium">{{ DB::table('crypto_assets')->where('symbol', DB::table('buy_crypto')->where('user_id', '2')->value('crypto-dropdown'))->orderBy('id', 'desc')->value('price') }}$</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <div class="w-3 mr-2 transform hover:bg-orange-100 hover:text-orange-500 hover:scale-110">
                                                    <button class="bg-yellow-200 text-yellow-600 py-1 px-1 rounded-full text-xs" type="button"><a href="{{ route('crypto-sell') }}">Sell</a></button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
