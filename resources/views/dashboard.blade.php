<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3 class="text-dark">{{$total_url}}</h3>
                                        <p class="text-dark">Total Link</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3 class="text-light">{{$total_url_active}}</h3>
                                        <p class="text-light">Total Link Aktif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3 class="text-light">{{$total_url_archive}}</h3>
                                        <p class="text-light">Total Link Arsip</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3 class="text-dark">{{$url_visit}}</h3>
                                        <p class="text-dark">Total Pengunjung</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h1 class="my-2 fs-4 fw-bold text-center">Pendekin</h1>
                            <form action="{{ route('url.shorten.user') }}" method="POST" class="my-2">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="url" class="form-control"
                                        placeholder="URL Shortener">
                                    <button class="btn btn-outline-secondary" type="submit">Pendekin</button>
                                </div>
                            </form>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            {{-- <th scope="col">URL Key</th> --}}
                                            <th scope="col">URL Tujuan</th>
                                            <th scope="col">URL Pendekin</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Pengunjung</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($urls as $key => $item)
                                            <tr class="{{ $item->deactivated_at != null ? 'table-active' : '' }}">
                                                <th scope="row">{{ ++$key }}</th>
                                                {{-- <td>{{ $item->url_key }}</td> --}}
                                                <td>{{ $item->destination_url }}</td>
                                                <td>
                                                    {{-- {{ $item->default_short_url }} --}}
                                                    <input class="form-control form-control-sm"
                                                        id="short_url-{{ $key }}"
                                                        value="{{ $item->default_short_url }}" readonly>
                                                </td>
                                                <td>{{ $item->deactivated_at == null ? 'Aktif' : 'Arsip' }}</td>
                                                <td>{{ $item->visits->count() }}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic mixed styles example">
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal-{{ $key }}">
                                                            Edit
                                                        </button>
                                                        <button class="btn btnc btn-warning btn-sm" type="button"
                                                            data-clipboard-target="#short_url-{{ $key }}">Salin</button>
                                                        <button type="button"
                                                            class="btn btn-{{ $item->deactivated_at == null ? 'danger' : 'success' }} btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal2-{{ $key }}">
                                                            {{ $item->deactivated_at == null ? 'Arsipkan' : 'Aktifkan' }}
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal edit-->
                                            <div class="modal fade" id="exampleModal-{{ $key }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('update.user', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="key" class="form-label">URL
                                                                        Key</label>
                                                                    <input type="text" name="url"
                                                                        value="{{ $item->url_key }}"
                                                                        class="form-control" id="key">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="destination"
                                                                        class="form-label">Destination URL</label>
                                                                    <input type="text" name="destination"
                                                                        value="{{ $item->destination_url }}"
                                                                        class="form-control" id="destination">
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal arsipkan-->
                                            <div class="modal fade" id="exampleModal2-{{ $key }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                {{ $item->deactivated_at == null ? 'Arsipkan' : 'Aktifkan' }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route($item->deactivated_at == null ? 'deactivate.user' : 'activate.user', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <p>Apakah Anda Yakin?</p>
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-{{ $item->deactivated_at == null ? 'danger' : 'success' }}">{{ $item->deactivated_at == null ? 'Arsipkan' : 'Aktifkan' }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
                        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
