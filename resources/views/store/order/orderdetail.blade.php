<x-guest-layout>
    <div class="mt-16">
        <div class="flex flex-wrap mb-5 container mx-auto">
            <div class="w-full max-w-full px-3 mb-6  mx-auto">
                <div
                    class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white m-5">
                    <div
                        class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30">
                        <!-- card header -->
                        <div
                            class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
                            <h3 class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark">
                                <span class="mr-3 font-semibold text-dark">Bundle Order</span>
                            </h3>
                        </div>
                        <!-- end card header -->
                        <!-- card body  -->
                        <div class="flex-auto block py-8 pt-6 px-9">
                            <div class="overflow-x-auto">
                                @if($orders->isEmpty())
                                    <p class="bg-white shadow-lg p-3">You have no orders.</p>
                                @else
                                    <table class="w-full my-0 align-middle text-dark border-neutral-200">
                                        <thead class="align-bottom">
                                        <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                                            <th class="pb-3 text-start min-w-[175px]">Timestamp</th>
                                            <th class="pb-3 text-start min-w-[175px]">Reference</th>
                                            <th class="pb-3 text-start min-w-[100px]">Amount</th>
                                            <th class="pb-3 pr-12 text-start min-w-[100px]">Payment Status</th>
                                            <th class="pb-3 text-start min-w-[50px]">Order Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr class="border-b border-dashed last:border-b-0">
                                                <td class="p-3 pl-0">
                                                    {{ $order->created_at }}
                                                </td>
                                                <td class="p-3 pl-0">Reference goes here
                                                    {{--                                                {{ $order->transaction->reference }}--}}
                                                </td>
                                                <td class="p-3 pr-0 text-start"> Amount goes here
                                                    {{--                                                {{ $order->transaction->amount }}--}}
                                                </td>
                                                <td class="pr-0 text-start
{{--                                                    @if ($order->transaction->status == 'success')--}}
{{--                                                        text-teal-500--}}
{{--                                                    @elseif ($order->transaction->status == 'failed')--}}
{{--                                                        text-red-500--}}
{{--                                                    @elseif ($order->transaction->status == 'pending')--}}
{{--                                                        text-orange-500--}}
{{--                                                    @else--}}
{{--                                                        text-gray-500--}}
{{--                                                   @endif--}}
                                            ">
                                                    Payment Status goes here
                                                    {{--                                                {{ $order->transaction->status }}--}}
                                                </td>

                                                <td class="p-3 pr-0 text-start {{  $order->status == 'processed' ? 'text-teal-500' : 'text-red-500' }}">
                                                    {{ $order->status }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if(!$orders>0)
                                            <p class="bg-white shadow-lg">You have No Orders</p>
                                        @endif
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
