<x-app-layout>
    <div class ="bg-gray-100 dark:bg-gray-900" style="display: flex; justify-content: center">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> 
        <h1 class="text-lg font-bold" style="text-align: center">Add Monrey</h1>
            <form method="POST" action="{{ route('transaction.store') }}" enctype="multipart/form-data" required> 
                @csrf

                <div class="mt-4">
                    <x-input-label for="transaction_type" :value="__('Transaction Type')" />
                    <select class="form-select w-full" id="transaction_type" name="transaction_type" multiple>
                        <option selected="" disabled="" value="">...</option>
                            <option><p>Deposite </p></option>
                            <option><p>Withdraw </p></option>
                            
                    </select>  
                    <x-input-error :messages="$errors->get('transaction_type')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="amount" :value="__('Amount')" />
                    <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" autofocus />
                    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                </div>

                

                <div class="flex justify-end mt-4"> 
                    <x-primary-button class="ml-3"> 
                        Add
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>