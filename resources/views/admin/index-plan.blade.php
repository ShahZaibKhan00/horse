@extends('layouts.admin_app')
@section('content')
    <div class="content">
        <div class="pb-6">
            <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
                <div class="row g-3 justify-content-between mb-4">
                    <div class="col-auto">
                        <h2 class="mb-2 text-white main_heading_dashboard">{{ count($plans) }} Plans</h2>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex">
                            {{-- <div class="search-box me-2">
                            </div> --}}
                            <div class="col-auto">
                                <a href="{{ url('admin/add-plan') }}" class="btn submit_btn_one">Add Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mx-5">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($plans as $plan)
                                <tr class="text-light">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $plan->name }}</td>
                                    <td>{{ $plan->price }}</td>
                                    <td>{{ $plan->quantity }}</td>
                                    <td>
                                        <a href="{{ route('admin.plans.edit', $plan->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $plan->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="deleteModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this plan?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                    <form id="deleteForm" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Yes, Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const planId = button.getAttribute('data-id');
                const form = document.getElementById('deleteForm');
                form.action = `/plans/${planId}`;
            });
        </script>
    @endsection
