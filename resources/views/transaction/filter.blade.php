<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <div class="flex justify-between">
            <a href="{{ route('transaction.create') }}" class="ml-2">Deposite or Withdraw Amount </a>
            <a href="{{ route('transaction.filter') }}" class="ml-2">Filter Transactions </a>
        </div>
        
        </h2>
    </x-slot>

    <div class="row flex justify-between p-4">
        <div class="col-md-6">
            <h3 class="font-bold text-center py-4">Deposite</h3>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Amount</th>   
                    <th scope="col">Date</th> 
                </tr>
            </thead>
            @foreach ($transactionsDepo as $transaction)
            <tbody>
                    <tr>
                        <td><p>{{ $transaction->id }}</p></td>
                        <td><p>{{ $transaction->user_id }}</p></td>
                        <td><p>{{ $transaction->amount }}</p></td>
                        <td><p>{{ $transaction->updated_at }}</p></td>
                    </tr>      
                </tbody>
                
            @endforeach
            </table>
        </div>

        <div class="col-md-6">
            <h3 class="font-bold text-center py-4">Withdraw</h3>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Amount</th>   
                    <th scope="col">Date</th> 
                </tr>
            </thead>
            @foreach ($transactionsWith as $transaction)
                <tbody>
                    <tr>
                        <td><p>{{ $transaction->id }}</p></td>
                        <td><p>{{ $transaction->user_id }}</p></td>
                        <td><p>{{ $transaction->amount }}</p></td>
                        <td><p>{{ $transaction->updated_at }}</p></td>
                    </tr>      
                </tbody>
                
            @endforeach
            </table>
        </div>

    </div>
    
   
</x-app-layout>