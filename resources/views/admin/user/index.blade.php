@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex">
                        <h6>All User Registered</h6>
                        <a href="{{ route('createUser')}}" class=" ms-auto me-4"><button class="btn btn-info btn-sm"
                                type="button">Add
                                Account</button></a>
                    </div>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Account</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        LongName</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Role Account</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Employed</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $data->username}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $data->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $data->firstname }}</p>
                                        <p class="text-xs text-secondary mb-0">{{ $data->lastname }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{
                                            $data->role }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($data->is_online == 1)
                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-danger">Offline</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{
                                            $data->created_at }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('detailsUser', ['id' => $data->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="container pt-2">
                            <div class="">
                                {{ $datas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>

@endsection

@section('require')
@include('admin/user/script')
@endsection