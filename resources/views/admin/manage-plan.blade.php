@extends('layouts.admin_app')
@section('content')
    <div class="content">
        <div class="pb-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ isset($plan) ? route('admin.plans.update', $plan->id) : route('admin.plans.store') }}" class="row g-3 mb-6">
                @csrf
                @if (isset($plan))
                    @method('PUT')
                @endif
                <div class="box_top">
                    <h2 class="mb-2 main_heading_dashboard"> {{ isset($plan) ? 'Update Plan' : 'Add New Plan' }}</h2>
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="border_box_one">
                                <h4 class="mb-3">{{ isset($plan) ? 'Update Plan' : 'Create Plan' }} <span class="asterisk">*</span></h4>
                                <div class="form-group">
                                    <label for="name">Plan Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $plan->name ?? '') }}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Description</label>
                                    <input type="text" name="description" id="price" value="{{ old('description', $plan->description ?? '') }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" value="{{ old('price', $plan->price ?? '') }}" class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label for="quantity">Image Quantity</label>
                                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $plan->quantity ?? 1) }}" class="form-control" min="1" required>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ isset($plan) ? 'Update Plan' : 'Create Plan' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
