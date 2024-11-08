@extends('member.layouts.main')

@section('container')
    @if ($data->historyA->first())
        <section>
            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                <div class="mx-auto max-w-3xl">
                    <header class="text-center">
                        <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">History Lapnagan A</h1>
                    </header>

                    <!-- looping disini -->

                    @foreach ($data->historyA as $item)
                        <div class="mt-4 border shadow rounded-md px-10 py-4">
                            <ul class="space-y-4">
                                <li class="flex items-center gap-4">
                                    <img src="{{ asset('img/bg.jpeg') }}" alt=""
                                        class="size-16 rounded object-cover" />

                                    <div>
                                        <h3 class="text-sm text-gray-900">Lapangan A</h3>

                                        <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                            <div>
                                                <dt class="inline text-green-500 font-bold">
                                                    {{ date('D', strtotime($item->waktu_mulai)) }},
                                                    {{ date('d M Y', strtotime($item->waktu_mulai)) }} ◦
                                                    {{ date('H:i', strtotime($item->waktu_mulai)) }}
                                                    - {{ date('H:i', strtotime($item->waktu_akhir)) }}
                                                </dt>
                                            </div>
                                        </dl>
                                    </div>

                                    <div class="flex flex-1 items-center justify-end gap-2">
                                        <form>
                                            <label for="Line1Qty" class="sr-only"> Quantity </label>

                                            <input type="number" min="1" value="100.000" id="Line1Qty"
                                                class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                        </form>


                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($data->historyB->first())
        <section>
            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                <div class="mx-auto max-w-3xl">
                    <header class="text-center">
                        <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">History Lapangan B</h1>
                    </header>

                    <!-- looping disini -->

                    @foreach ($data->historyB as $item)
                        <div class="mt-4 border shadow rounded-md px-10 py-4">
                            <ul class="space-y-4">
                                <li class="flex items-center gap-4">
                                    <img src="{{ asset('img/bg.jpeg') }}" alt=""
                                        class="size-16 rounded object-cover" />

                                    <div>
                                        <h3 class="text-sm text-gray-900">Lapangan B</h3>

                                        <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                            <div>
                                                <dt class="inline text-green-500 font-bold">
                                                    {{ date('D', strtotime($item->waktu_mulai)) }},
                                                    {{ date('d M Y', strtotime($item->waktu_mulai)) }} ◦
                                                    {{ date('H:i', strtotime($item->waktu_mulai)) }}
                                                    - {{ date('H:i', strtotime($item->waktu_akhir)) }}
                                                </dt>
                                            </div>
                                        </dl>
                                    </div>

                                    <div class="flex flex-1 items-center justify-end gap-2">
                                        <form>
                                            <label for="Line1Qty" class="sr-only"> Quantity </label>

                                            <input type="number" min="1" value="100.000" id="Line1Qty"
                                                class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                        </form>


                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
