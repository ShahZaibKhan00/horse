@extends('layouts.user_app')

@section('content')
    <style>
        .saved-search-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border: 1px solid #eee;
        }
        .search-title {
            font-size: 18px;
            font-weight: 700;
            color: #1d2139;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-criteria {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 6px;
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }
        .criteria-item {
            display: inline-block;
            margin-right: 15px;
            margin-bottom: 5px;
        }
        .criteria-label {
            font-weight: 600;
            color: #1d2139;
        }
        .action-btns {
            display: flex;
            gap: 10px;
        }
        .btn-view {
            background: var(--Linear, linear-gradient(0deg, #B09240 35.48%, #FAF8F4 68.55%));
            color: #1d2139;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: 600;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }
        .btn-view:hover {
            opacity: 0.9;
            color: #1d2139;
        }
        .btn-delete {
            background: #e74c3c;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
        }
        .no-data {
            text-align: center;
            padding: 50px;
            background: #fff;
            border-radius: 10px;
            color: #888;
        }
        
        
        
        
        
        
        .saved-search-container {
            position: relative;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
       .badge_icon {
            width: 100px;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1c2039;
        }
        .badge_icon .fa-ribbon {
            color: #fff;
                font-size: 30px;
            }
        .saved-search-container .header {
            color: #000;
            padding: 12px 20px 0px 125px;
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .saved-search-container .bookmark-icon {
            width: 48px;
            height: 48px;
            background: #1e40af;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }
        
        .saved-search-container .title {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }
        
        .saved-search-container .date-info {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            opacity: 0.9;
        }
        
        .saved-search-container .content {
            padding: 10px 20px 10px 120px;
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            align-items: center;
        }
        .saved-search-container .criteria {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            flex: 1;
        }
        
        .saved-search-container .criterion {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 220px;
        }
        .saved-search-container .criterion div {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .saved-search-container .icon {
            font-size: 20px;
            margin-top: 2px;
        }
        
        .saved-search-container .label {
            font-size: 14px;
            color: #1c2039;
            font-weight: 800;
            white-space: nowrap;
        }
        
        .saved-search-container .value {
            font-size: 15px;
            color: #1c2039;
            font-weight: 500;
        }
        
        .saved-search-container .actions {
            display: flex;
            gap: 12px;
            margin-left: auto;
            align-items: center;
        }
        
        .saved-search-container .btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }
        
        .saved-search-container .view-btn {
            background: #1c2039;
            color: #fff;
        }
        
        .saved-search-container .view-btn:hover {
            background: #1c2039;
        }
        
        .saved-search-container .delete-btn {
            background: white;
            color: #e74c3c;
            border: 2px solid #e74c3c;
        }
                
        .saved-search-container .delete-btn:hover {
            background: white;
        }
        
        .nav-link {
            padding: 10px 30px;
            color: #1c2039;
        }
        .nav-link:focus, .nav-link:hover {
            color: #1c2039;
        }
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #cfb068;
            border-color: #1c2039;
            background: #1c2039;
        }
        .points_btn {
            display: flex;
            flex-direction: row;
            width: fit-content;
        }
        
        @media (max-width: 768px) {
           .saved-search-container  .content {
                flex-direction: column;
                align-items: stretch;
            }
           .saved-search-container  .actions {
                margin-left: 0;
                justify-content: flex-end;
            }
        }
    </style>

    <div class="user_main_content">
        <div class="dark_bar">
            <h2>Saved Searches</h2>
            <a href="{{ route('horse_listing_filter') }}" class="points_btn">
                <i class="fa fa-plus me-2"></i> New Search
            </a>
        </div>
        
        <div class="p-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fa-solid fa-chess-knight me-2"></i>Horse</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="fa-solid fa-briefcase me-2"></i>Services</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="fa-solid fa-house me-2"></i>Real Estate</button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="inner_content_wrapper p-0 pt-4">
                        @php $horseSearches = $savedSearches->where('type', 'horse'); @endphp
                        @if($horseSearches->isEmpty())
                            <div class="no-data">
                                <img src="{{ asset('assets/images/search.png') }}" alt="" style="width: 50px; opacity: 0.3; margin-bottom: 20px;">
                                <h3>No saved searches found.</h3>
                                <p>Start searching for horses and save your favorite criteria!</p>
                                <a href="{{ route('horse_listing_filter') }}" class="btn-view d-inline-block mt-3">Go to Search Page</a>
                            </div>
                        @else
                            <div class="row">
                                @foreach($horseSearches as $search)
                                    <div class="col-12 mb-4">
                                        <div class="saved-search-container">
                                            <div class="badge_icon"><img src="{{ asset('assets/images/saved-horse-icon.png') }}" alt="" style="width: 50px;"></div>
                                            
                                            <div class="header">
                                                <h1 class="title">
                                                    {{ $search->search_name ?? 'Saved Search — ' . $search->created_at->format('Y-m-d H:i') }}
                                                </h1>
                                                <div class="date-info">
                                                    <span>📅</span>
                                                    Saved on {{ $search->created_at->format('M d, Y \a\t H:i') }}
                                                </div>
                                            </div>
                                    
                                            <div class="content">
                                                {{-- Logic to handle criteria display --}}
                                                
                                                @if($search->breed)
                                                <div class="criterion">
                                                    <span class="icon">🐴</span>
                                                    <div>
                                                        <div class="label">Breed:</div>
                                                        <div class="value">{{ $search->breed }}</div>
                                                    </div>
                                                </div>
                                                @endif
                                    
                                                @if($search->color)
                                                <div class="criterion">
                                                    <span class="icon">🎨</span>
                                                    <div>
                                                        <div class="label">Color:</div>
                                                        <div class="value">{{ $search->color }}</div>
                                                    </div>
                                                </div>
                                                @endif
                                    
                                                @if($search->gender)
                                                <div class="criterion">
                                                    <span class="icon">♂️</span>
                                                    <div>
                                                        <div class="label">Gender:</div>
                                                        <div class="value">{{ $search->gender }}</div>
                                                    </div>
                                                </div>
                                                @endif
                            
                                                @if($search->min_price || $search->max_price)
                                                <div class="criterion">
                                                    <span class="icon">💰</span>
                                                    <div>
                                                        <div class="label">Price Range:</div>
                                                        <div class="value">
                                                            {{ $search->min_price ?? '0' }} - {{ $search->max_price ?? 'Any' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                    
                                                <div class="actions">
                                                    <a href="{{ route('horse_listing_filter', $search->filters) }}" class="btn view-btn" style="text-decoration: none; display: inline-flex; align-items: center;">
                                                        👁️ View Details
                                                    </a>
                                                    
                                                    <form action="{{ route('saved-searches.destroy', $search->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?')" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="type" value="horse">
                                                        <button type="submit" class="btn delete-btn">
                                                            🗑️ Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        
                        
                        
                    </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="inner_content_wrapper p-0 pt-4">
                        @if($serviceSearches->isEmpty())
                            <div class="no-data">
                                <img src="{{ asset('assets/images/search.png') }}" alt="" style="width: 50px; opacity: 0.3; margin-bottom: 20px;">
                                <h3>No saved searches found.</h3>
                                <p>Start searching for services and save your favorite criteria!</p>
                                <a href="{{ route('services') }}" class="btn-view d-inline-block mt-3">Go to Search Page</a>
                            </div>
                        @else
                            <div class="row">
                                @foreach($serviceSearches as $search)
                                    <div class="col-12 mb-4">
                                        <div class="saved-search-container">
                                            <div class="badge_icon"><img src="{{ asset('assets/images/saved-service-icon.png') }}" alt="" style="width: 50px;"></div>
                                            <div class="header">
                                                <h1 class="title">{{ $search->search_name ?? 'Saved Service Search' }}</h1>
                                                <div class="date-info"><span>📅</span> Saved on {{ $search->created_at->format('M d, Y') }}</div>
                                            </div>
                                            <div class="content">
                                                <div class="criteria">
                                                    @if($search->location)
                                                    <div class="criterion">
                                                        <span class="icon">📍</span>
                                                        <div><div class="label">Location:</div><div class="value">{{ $search->location }}</div></div>
                                                    </div>
                                                    @endif
                                                    @if($search->distance_min || $search->distance_max)
                                                    <div class="criterion">
                                                        <span class="icon">📏</span>
                                                        <div><div class="label">Distance:</div><div class="value">{{ $search->distance_min ?? '0' }} - {{ $search->distance_max ?? 'Any' }} {{ $search->hr_miles }}</div></div>
                                                    </div>
                                                    @endif
                                                    @if($search->name)
                                                    <div class="criterion">
                                                        <span class="icon">👤</span>
                                                        <div><div class="label">Name:</div><div class="value">{{ $search->name }}</div></div>
                                                    </div>
                                                    @endif
                                                    @php
                                                        $cats = ['health', 'holistic', 'breeding', 'leasing', 'transport', 'grooming', 'recreational', 'performance', 'property', 'boarding', 'farrier', 'consulting', 'retail', 'promotion'];
                                                        $activeCats = [];
                                                        foreach($cats as $cat) {
                                                            if($search->$cat) $activeCats[] = ucfirst($cat);
                                                        }
                                                    @endphp
                                                    @if(count($activeCats) > 0)
                                                    <div class="criterion">
                                                        <span class="icon">📂</span>
                                                        <div><div class="label">Categories:</div><div class="value">{{ implode(', ', $activeCats) }}</div></div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="actions">
                                                    <a href="{{ route('services', $search->filters) }}" class="btn view-btn">👁️ View Results</a>
                                                    <form action="{{ route('saved-searches.destroy', $search->id) }}" method="POST" onsubmit="return confirm('Delete this search?')">
                                                        @csrf @method('DELETE')
                                                        <input type="hidden" name="type" value="service">
                                                        <button type="submit" class="btn delete-btn">🗑️ Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
              </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="inner_content_wrapper p-0 pt-4">
                        @if($realEstateSearches->isEmpty())
                            <div class="no-data">
                                <img src="{{ asset('assets/images/search.png') }}" alt="" style="width: 50px; opacity: 0.3; margin-bottom: 20px;">
                                <h3>No saved searches found.</h3>
                                <p>Start searching for properties and save your favorite criteria!</p>
                                <a href="{{ route('realestate_listing_filter') }}" class="btn-view d-inline-block mt-3">Go to Search Page</a>
                            </div>
                        @else
                            <div class="row">
                                @foreach($realEstateSearches as $search)
                                    <div class="col-12 mb-4">
                                        <div class="saved-search-container">
                                            <div class="badge_icon"><img src="{{ asset('assets/images/saved-state-icon.png') }}" alt="" style="width: 50px;"></div>
                                            <div class="header">
                                                <h1 class="title">{{ $search->search_name ?? 'Saved Property Search' }}</h1>
                                                <div class="date-info"><span>📅</span> Saved on {{ $search->created_at->format('M d, Y') }}</div>
                                            </div>
                                            <div class="content">
                                                <div class="criteria">
                                                    @if($search->location)
                                                    <div class="criterion">
                                                        <span class="icon">📍</span>
                                                        <div><div class="label">Location:</div><div class="value">{{ $search->location }}</div></div>
                                                    </div>
                                                    @endif
                                                    @if($search->price_min || $search->price_max)
                                                    <div class="criterion">
                                                        <span class="icon">💰</span>
                                                        <div><div class="label">Price:</div><div class="value">${{ $search->price_min ?? '0' }} - ${{ $search->price_max ?? 'Any' }}</div></div>
                                                    </div>
                                                    @endif
                                                    @if($search->acre_min || $search->acre_max)
                                                    <div class="criterion">
                                                        <span class="icon">🚜</span>
                                                        <div><div class="label">Acreage:</div><div class="value">{{ $search->acre_min ?? '0' }} - {{ $search->acre_max ?? 'Any' }}</div></div>
                                                    </div>
                                                    @endif
                                                    @if($search->bedrooms_min)
                                                    <div class="criterion">
                                                        <span class="icon">🛏️</span>
                                                        <div><div class="label">Bedrooms:</div><div class="value">{{ $search->bedrooms_min }}+</div></div>
                                                    </div>
                                                    @endif
                                                    @if($search->bathrooms_min)
                                                    <div class="criterion">
                                                        <span class="icon">🚿</span>
                                                        <div><div class="label">Bathrooms:</div><div class="value">{{ $search->bathrooms_min }}+</div></div>
                                                    </div>
                                                    @endif
                                                    @if($search->stall_min)
                                                    <div class="criterion">
                                                        <span class="icon">🐎</span>
                                                        <div><div class="label">Stalls:</div><div class="value">{{ $search->stall_min }}+</div></div>
                                                    </div>
                                                    @endif
                                                    @php
                                                        $features = [];
                                                        if($search->heated_barn) $features[] = 'Heated Barn';
                                                        if($search->has_indoor_ring) $features[] = 'Indoor Ring';
                                                        if($search->has_outdoor_ring) $features[] = 'Outdoor Ring';
                                                        if($search->fenced_grass) $features[] = 'Fenced Grass';
                                                    @endphp
                                                    @if(count($features) > 0)
                                                    <div class="criterion">
                                                        <span class="icon">🏠</span>
                                                        <div><div class="label">Features:</div><div class="value">{{ implode(', ', $features) }}</div></div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="actions">
                                                    <a href="{{ route('realestate_listing_filter', $search->filters) }}" class="btn view-btn">👁️ View Results</a>
                                                    <form action="{{ route('saved-searches.destroy', $search->id) }}" method="POST" onsubmit="return confirm('Delete this search?')">
                                                        @csrf @method('DELETE')
                                                        <input type="hidden" name="type" value="realestate">
                                                        <button type="submit" class="btn delete-btn">🗑️ Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
              </div>
            </div>
        </div>
        
        
        
    </div>
@endsection
