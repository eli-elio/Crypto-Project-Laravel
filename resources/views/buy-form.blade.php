<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buy Cryptocurrencies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Wallet balance = {{ DB::table('wallets')->where('user_id', '2')->value('balance') ?? 0 }}$
                </div>

                    <div class="grid p-2 place-items-left">

                            <h1 class="text-xl font-semibold">
                                Hello, {{ DB::table('users')->where('id', '2')->value('name') }}, <span
                                    class="font-normal">please choose cryptocurrency</span></h1>
                            <form class="mt-6" action="{{ route('buy.crypto') }}" method="GET">
                                @csrf
                                <div class="form-group mb-3">
                                    <select  id="dropdown" class="form-control">
                                        <?php
                                        $cryptoSymbol = [
                                            'ADA',
                                            'BNB',
                                            'BTC',
                                            'DOGE',
                                            'DOT',
                                            'ETH',
                                            'SOL',
                                            'USDC',
                                            'USDT',
                                            'XRP'
                                        ];
                                        ?>
                                        <option >-- Select Cryptocurrency --</option>
                                        @foreach ($cryptoSymbol as $crypto)
                                            <option id="crypto-dropdown" name="crypto-dropdown" value="{{ $crypto}}">
                                                {{ $crypto }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="w-full py-3 mt-6 font-medium text-center  tracking-widest text-black uppercase shadow-lg focus:outline-none hover:text-gray-400">
                                    Choose
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
