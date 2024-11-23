@extends('template-dashbor.index')
@section('content')
    <div class="body-wrapper">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Name</h6>
                                </th>


                            </tr>
                        </thead>
                        <tbody>
                            @if ($kategori->isEmpty())
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <p class="mb-0 fw-normal">Nama kategori kosong</p>
                                    </td>
                                </tr>
                            @else
                                @foreach ($kategori as $item)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $item->id }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $item->nama_kategori }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
