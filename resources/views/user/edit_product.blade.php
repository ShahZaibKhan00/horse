@extends('layouts.user_app')

@section('content')

<div class="content">
@foreach ($data as $data)

    <form class="mb-9" action="{{ route('update_product') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="cate_id_name" value="{{$name}}">
        <input type="hidden" name="id" value="{{$data->id}}">
        <input type="hidden" name="pro_sku" value="{{$data->pro_sku}}">
        <div class="row g-3 flex-between-end mb-5">

            <div class="col-auto">

                <h2 class="mb-2">Update a product</h2>

                <h5 class="text-700 fw-semi-bold">Update Product On Your Store</h5>

            </div>

            <div class="col-auto"><a href="{{ url('products') }}/{{ last(request()->segments()) }}" class="btn px-5 me-2 mb-2 mb-sm-0" style="border: 1px solid #000;">Cancel</a><button class="btn btn-primary mb-2 mb-sm-0" type="submit">Update product</button></div>

        </div>

        <div class="row g-5">

            <div class="col-12 col-xl-8">

                <h4 class="mb-3">Product Title</h4>
                <input class="form-control mb-5" type="text" value="{{$data->pro_name}}" name="pro_name" placeholder="Write title here..." />

                <div class="row">
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Height </h4>
						<select class="form-control mb-5" name="pro_height">
                            @php
                                $selectedHeight = $data->pro_height ?? '';
                            @endphp

                            @foreach([
                                "5.0 hh (20in)", "6.0 hh (24in)", "7.0 hh (28in)", "8.0 hh (32in)", "8.2 hh (34in)",
                                "9.0 hh (36in)", "9.2 hh (38in)", "10.0 hh (40in)", "10.2 hh", "11.0 hh (44in)",
                                "11.2 hh", "12.0 hh (48in)", "12.1 hh", "12.2 hh", "12.3 hh", "13.0 hh (52in)",
                                "13.1 hh", "13.2 hh", "13.3 hh", "14.0 hh (56in)", "14.1 hh", "14.2 hh", "14.3 hh",
                                "15.0 hh (60in)", "15.1 hh", "15.2 hh", "15.3 hh", "16.0 hh (64in)", "16.1 hh",
                                "16.2 hh", "16.3 hh", "17.0 hh (68in)", "17.1 hh", "17.2 hh", "17.3 hh",
                                "18.0 hh (72in)", "18.1 hh", "18.2 hh", "18.3 hh", "19.0 hh (76in)",
                                "20.0 hh (80in)", "21.0 hh (84in)"
                            ] as $height)
                                <option value="{{ $height }}" {{ $selectedHeight == $height ? 'selected' : '' }}>
                                    {{ $height }}
                                </option>
                            @endforeach
                        </select>
					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Age </h4>
						<select class="form-control mb-5" name="pro_age">
                            @php
                                $selectedAge = $data->pro_age ?? '';
                            @endphp

                            @foreach([
                                "1 Year", "2 Years", "3 Years", "4 Years", "5 Years", "6 Years", "7 Years",
                                "8 Years", "9 Years", "10 Years", "12 Years", "15 Years", "18 Years", "20 Years"
                            ] as $age)
                                <option value="{{ $age }}" {{ $selectedAge == $age ? 'selected' : '' }}>
                                    {{ $age }}
                                </option>
                            @endforeach
                        </select>
					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Color </h4>
						<select class="form-control mb-5" name="pro_color">
                            @php
                                $selectedColor = $data->pro_color ?? ''; // Default selected value
                            @endphp

                            @foreach([
                                "Bay", "Bay Dun", "Bay Dun Roan", "Bay Roan", "Black", "Black Bay", "Blue Roan", "Brindle", 
                                "Brown", "Buckskin", "Buckskin Roan", "Champagne", "Chestnut", "Chocolate", "Cremello", "Cremello Dun",
                                "Dun", "Dunalino", "Dunskin", "Grey", "Grullo", "Isabella", "Liver Chestnut", "Other",
                                "Palomino", "Palomino Roan", "Pearl", "Perlino", "Lerino Dun", "Piebald", "Pinto", "Red Chocolate",
                                "Red Dun", "Red Dun Roan", "Red Roan", "Silver", "Silver Bay", "Silver Black", "Silver Black Roan",
                                "Silver Buckskin", "Silver Dapple", "Silver Perlino", "Silver Smokey Black", "Silver Smokey Cream",
                                "Skewbald", "Smokey Black", "Smokey Cream", "Smokey Cream Dun", "Smokey Grullo", "Sorrel", "Unknown", "White"
                            ] as $color)
                                <option value="{{ $color }}" {{ $selectedColor == $color ? 'selected' : '' }}>
                                    {{ $color }}
                                </option>
                            @endforeach
                        </select>

					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Skill</h4>
						<select class="form-control mb-5" name="pro_skill">
                            @php
                                $selectedSkill = $data->pro_skill ?? '';
                            @endphp

                            @foreach([
                                "4H", "Agility", "All-Around Show", "Barrel Racing", "Barrels* Poles *Gymkhana", "Breakaway Roping", 
                                "Brood mare", "Calf Roping", "Clicker Training", "Companion Only", "Competitive Trail Riding",
                                "Country English Pleasure", "Cowboy Dressage", "Cowboy Mounted Shooting", "Cowboy Racing",
                                "Cow horse", "Cross-Country", "Cutting", "Dressage", "Drill Team", "Driving", "Endurance Riding",
                                "English", "English Pleasure", "Equitation", "Eventing", "Field Trial", "Foxhunter", "Gun - Safe Hunting",
                                "Halter", "Harness", "Harness Racing", "Horsemanship", "Hunt Seat Equitation", "Hunter", 
                                "Hunter Pleasure", "Hunter Under Saddle", "Jumping", "Lesson Horse", "Liberty Training", "Light Riding",
                                "Longe Line", "Mountain Trail", "Mounted Games", "Mounted Police", "Native Costume",
                                "Natural Horsemanship Training", "Nurse Mare", "Pacing Gait", "Pack", "Parade", "Performance",
                                "Play day", "Pleasure Driving", "Pole Bending", "Polo", "Pony Club", "Project", "Racing",
                                "Retired Race Horse", "Racking Gait", "Ranch Conformation Class", "Ranch Rail Class",
                                "Ranch Riding - Ranch Pleasure", "Ranch Sorting", "Ranch Trail Class", "Ranch Versatility",
                                "Ranch Work", "Reining", "Reining - Cowhorse - Cutting", "Rodeo", "Rodeo Bronc", "Roping",
                                "Saddle Seat", "School", "Schoolmaster", "Show Experience", "Show Hack", "Show Winner",
                                "Showmanship Halter", "Sidesaddle", "Stallion - Stud - Breeding", "Started Under Saddle",
                                "Steer Roping", "Steer Wrestling", "Stock", "Team Driving", "Team Penning", "Team Roping",
                                "Team Roping - Head", "Team Roping - Heel", "Team Sorting", "Therapeutic Riding", "Therapy",
                                "Trail Class Competition", "Trail Master", "Trail Riding", "Trick", "Unicorn", "Vaulting",
                                "Western", "Western Dressage", "Western Pleasure", "Western Riding", "Working Cattle",
                                "Working Equitation"
                            ] as $skill)
                                <option value="{{ $skill }}" {{ $selectedSkill == $skill ? 'selected' : '' }}>
                                    {{ $skill }}
                                </option>
                            @endforeach
                        </select>

					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Breed</h4>
						<select class="form-control mb-5" name="pro_breed">
                            @php
                                $selectedbreed = $data->pro_breed ?? '';
                            @endphp
                            @foreach([
                                "Akhal-Teke", "Aegidienberger", "Alberta Wild Horse", "Alter Real", "Altmark Coldblood", 
                                "American Bashkir Curly", "American Belgian Draft", "American Cream Draft Horse", "American Indian Horse", 
                                "American Miniature Horse", "American Saddlebred", "American Shetland Pony", "American Spotted", 
                                "American Standardbred", "American Walking Pony", "Andalusian Horse", "Anglo Arabian", "Appaloosa", 
                                "Arabian Horses", "Ardennes", "Arabian-Berber", "Arabian Halfbred", "Arabian Partbred", "Araloosa", 
                                "Arenberg-Nordkirchen", "Australian Brumby", "Australian Draught Horse", "Australian Stock Horse", 
                                "Austrian Warmblood", "Auxois", "Baden-Wurttemberg", "Balearic", "Balikun Horse", "Baltic Hanoverian", 
                                "Bardigiano", "Bashkir Horse", "Bavarian Warmblood", "Belgian Cold Blood", "Belgian Draft", 
                                "Belgian Warmblood", "Black Forest Horse", "Boerperd", "Boulonnais", "Brabant Horse", 
                                "Brandenburger Warmblood", "Breton", "British Riding Pony", "Budyonny", "Burguete", 
                                "Byelorussian Harness Horse", "Calabrese", "Camargue Horse", "Canadian Horse", "Canadian Pacer", 
                                "Canadian Rustic Pony", "Carolina Marsh Tacky", "Cerbat Mustang", "Chincoteague Pony", 
                                "Chickasaw Horse", "Chinese Horse", "Choctaw Pony", "Classic Pony", "Cleveland-Bay", 
                                "Clydesdale", "Cumberland Island Horse", "Cob Horse", "Comtois", "Connemara Pony", 
                                "Criollo Horse", "Curly Horses", "Dales Pony", "Dartmoor Pony", "Dutch Warmblood", 
                                "Fell Pony", "Finnhorse", "Friesian", "Gelderland", "Hackney", 
                                "Hanoverian", "Haflinger", "Holsteiner", "Icelandic Horse", "Irish Draught", 
                                "Kinsky Horse", "Knabstrupper", "Lippizan", "Lusitano", "Marwari Horse", 
                                "Morgan Horse", "Mustang", "Paso Fino", "Percheron", "Pinto", 
                                "Polish Warmblood", "Rocky Mountain Horse", "Shire Horse", "Tennessee Walking Horse", 
                                "Thoroughbred", "Trakehner", "Welsh Pony", "Westphalian", "Zweibrücker Horse"
                            ] as $breed)
                                <option value="{{ $breed }}" {{ $selectedbreed == $breed ? 'selected' : '' }}>
                                    {{ $breed }}
                                </option>
                            @endforeach
                        </select>
					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Gender</h4>
						<select class="form-control mb-5" name="pro_gender">
                            @foreach(["Colt", "Filly", "Gelding", "Mare", "Stallion", "Unborn Foal", "Jack", "Jenny", "John", "Molly"] as $gender)
                                <option value="{{ $gender }}" @if(isset($data->pro_gender) && $data->pro_gender == $gender) selected @endif>
                                    {{ $gender }}
                                </option>
                            @endforeach
                        </select>

					</div>
                </div>

                <div class="mb-6">
                    <h4 class="mb-3"> Product Description</h4>
                    <textarea class="tinymce" name="pro_desc" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'><?= $data->pro_desc ?></textarea>
                </div>

                <h4 class="mb-3">Display images</h4>
                <div class="dropzone dropzone-multiple p-0 mb-5" id="my-awesome-dropzone" data-dropzone="data-dropzone">
                    <div class="fallback"><input name="Product_file[]" type="file" multiple="multiple" /></div>
                    <div class="dz-preview d-flex flex-wrap">
                        <div class="border bg-white rounded-3 d-flex flex-center position-relative me-2 mb-2" style="height:80px;width:80px;"><img class="dz-image" src="../../../assets/img/products/23.png" alt="..." data-dz-thumbnail="data-dz-thumbnail" /><a class="dz-remove text-400" href="#!" data-dz-remove="data-dz-remove"><span data-feather="x"></span></a></div>
                    </div>
                    <div class="dz-message text-600" data-dz-message="data-dz-message">Drag your photo here<span class="text-800 px-1">or</span><button class="btn btn-link p-0" type="button">Browse from device</button><br /><img class="mt-3 me-2" src="../../../assets/img/icons/image-icon.png" width="40" alt="" /></div>
                </div>

            </div>

            <div class="col-12 col-xl-4">

                <div class="row g-2">

                    <div class="col-12 col-xl-12">

                        <div class="card mb-3">

                            <div class="card-body">

                                <h4 class="card-title mb-4">Organize</h4>

                                <div class="row gx-3">

                                    <div class="col-12 col-sm-6 col-xl-12">

                                        <div class="mb-4">

                                            <h5 class="mb-2 text-1000">Featured Image</h5>
                                            <img src="{{ getenv('APP_URL') }}/Featured_image/{{ $data->pro_Fimg }}" class="f_img_preview" width="" height="" align=""/>
                                            <input class="form-control mb-xl-3" name="pro_Fimg" type="file" placeholder="Featured Image" />

                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6 col-xl-12">

                                        <div class="mb-4">

                                            <div class="d-flex flex-wrap mb-2">

                                                <h5 class="mb-0 text-1000 me-2">Category</h5>

                                                <a class="fw-bold fs--1" href="{{ route('add_category') }}">Add new category</a>

                                            </div>
                                            <div class="checkbox_wrap">
                                                @php
                                                    $selectedCategories = explode(',', $data->cate_id);
                                                @endphp
                                                
                                                @foreach($categories as $cate)
                                                    <label class="category_check">
                                                        <input type="checkbox" name="cate_id[]" value="{{ $cate->id }}" 
                                                               @if(in_array($cate->id, $selectedCategories)) checked @endif>
                                                        <span class="categoryMark">{{ $cate->cate_name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>

                                            <!-- <select name="cate_id" class="form-select mb-3" aria-label="category">

                                                @foreach($categories as $cate)

                                                <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>

                                                @endforeach

                                            </select> -->

                                        </div>

                                    </div>

                                    <!-- <div class="col-12 col-sm-6 col-xl-12">

                                        <div class="mb-4">

                                            <div class="d-flex flex-wrap mb-2">

                                                <h5 class="mb-0 text-1000 me-2">Vendor</h5>

                                                <a class="fw-bold fs--1" href="#!">Add new vendor</a>

                                            </div>

                                            <select class="form-select mb-3" aria-label="category">

                                                <option value="men-cloth">Men's Clothing</option>

                                                <option value="women-cloth">Womens's Clothing</option>

                                                <option value="kid-cloth">Kid's Clothing</option>

                                            </select>

                                        </div>

                                    </div> -->

                                    <!-- <div class="col-12 col-sm-6 col-xl-12">

                                        <div class="d-flex flex-wrap mb-2">

                                            <h5 class="mb-0 text-1000 me-2">Tags</h5>

                                            <a class="fw-bold fs--1 lh-sm" href="#!">View all tags</a>

                                        </div>

                                        <select class="form-select" aria-label="category">

                                            <option value="men-cloth">Men's Clothing</option>

                                            <option value="women-cloth">Womens's Clothing</option>

                                            <option value="kid-cloth">Kid's Clothing</option>

                                        </select>

                                    </div> -->

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- <div class="col-12 col-xl-12">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title mb-4">Variants</h4>

                                <div class="row g-3">

                                    <div class="col-12 col-sm-6 col-xl-12">

                                        <div class="border-bottom border-dashed border-sm-0 border-bottom-xl pb-4">

                                            <div class="d-flex flex-wrap mb-2">

                                                <h5 class="text-1000 me-2">Option 1</h5>

                                                <a class="fw-bold fs--1" href="#!">Remove</a>

                                            </div>

                                            <select class="form-select mb-3">

                                                <option value="size">Size</option>

                                                <option value="color">Color</option>

                                                <option value="weight">Weight</option>

                                                <option value="smell">Smell</option>

                                            </select>

                                            <div class="product-variant-select-menu">

                                                <select class="form-select mb-3" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>

                                                    <option value="size">4x6 in</option>

                                                    <option value="color">9x6 in</option>

                                                    <option value="weight">11x8 in</option>

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6 col-xl-12">

                                        <div class="d-flex flex-wrap mb-2">

                                            <h5 class="text-1000 me-2">Option 2</h5>

                                            <a class="fw-bold fs--1" href="#!">Remove</a>

                                        </div>

                                        <select class="form-select mb-3">

                                            <option value="size">Size</option>

                                            <option value="color">Color</option>

                                            <option value="weight">Weight</option>

                                            <option value="smell">Smell</option>

                                        </select>

                                        <div class="product-variant-select-menu mb-3">

                                            <select class="form-select mb-3" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>

                                                <option value="size">4x6 in</option>

                                                <option value="color">9x6 in</option>

                                                <option value="weight">11x8 in</option>

                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <button class="btn btn-phoenix-primary w-100" type="button">Add another option</button>

                            </div>

                        </div>

                    </div> -->

                </div>

            </div>

        </div>

    </form>

@endforeach

<script>
	let addBtn = document.querySelector('.addBtn');
	let invoiceForm = document.querySelector('.invoiceForm');

	function updateRemoveButtons() {
	    let removeButtons = document.querySelectorAll('.removeBtn');
	    if (removeButtons.length > 1) {
	        removeButtons.forEach(button => button.style.display = 'block');
	    } else {
	        removeButtons.forEach(button => button.style.display = 'none');
	    }
	}

	addBtn.addEventListener('click', () => {
	    let div = document.createElement('div');
	    div.classList.add('fields__clm', 'd-flex', 'flex-wrap', 'align-items-center', 'flex-lg-nowrap', 'gap-3');
	    
	    let color_name = document.createElement('input');
	    color_name.setAttribute('type', 'text');
	    color_name.setAttribute('placeholder', 'Cigar Name');
	    color_name.setAttribute('name', 'color_name[]');
	    color_name.classList.add('form-control');
	    div.appendChild(color_name);

	    let choose_color = document.createElement('input');
	    choose_color.setAttribute('type', 'text');
	    choose_color.setAttribute('placeholder', 'Cigar Size');
	    choose_color.setAttribute('name', 'choose_color[]');
	    choose_color.classList.add('form-control');
	    div.appendChild(choose_color);

	    let file_upload = document.createElement('input');
	    file_upload.setAttribute('type', 'file');
	    file_upload.setAttribute('name', 'file_upload[]');
	    file_upload.classList.add('form-control');
	    div.appendChild(file_upload);

	    let removeBtn = document.createElement('div');
	    removeBtn.classList.add('removeBtn');
	    removeBtn.setAttribute('title', 'Remove Field');
	    removeBtn.innerHTML = '<i class="fa-solid fa-trash-can"></i>';
	    removeBtn.addEventListener('click', () => {
	        div.remove();
	        updateRemoveButtons();
	    });
	    div.appendChild(removeBtn);

	    invoiceForm.appendChild(div);
	    updateRemoveButtons();
	});

	document.querySelectorAll('.removeBtn').forEach(button => {
	    button.addEventListener('click', (e) => {
	        e.target.parentElement.remove();
	        updateRemoveButtons();
	    });
	});

	updateRemoveButtons(); // Ensure the initial state is correct

</script>


<style>
	img.f_img_preview {width: 100%;height: auto;margin-bottom: 10px;border-radius: 7px;border: 1px solid #00000036;}
	.prodict_Color {width: 50px;height: 30px;border-radius: 4px;}
	.removeBtn svg {color: red; }



    .checkbox_wrap {display: flex; flex-wrap: wrap; gap: 5px; } 
    .category_check {display: block;position: relative;/* padding-left: 35px; *//* margin-bottom: 12px; */cursor: pointer;/* font-size: 22px; */-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
    .category_check input {position: absolute; opacity: 0; cursor: pointer; height: 0; width: 0; } 
    .categoryMark {/* position: absolute; */top: 0;left: 0;/* height: 25px; *//* width: 25px; */background-color: #ccc;transition: .5s;color: #fff;font-size: 13px;text-transform: capitalize;padding: 10px 10px;display: inline-block;border-radius: 8px;}
    .category_check:hover input ~ .categoryMark {background-color: #ccc; } 
    .category_check input:checked ~ .categoryMark {background-color: #b22033;}   







    .formWrapper form {width: 50%;position: relative;}
    .formWrapper .fields__clm {width: 100%;background-color: #00000012;padding: 10px;border-radius: 10px;margin-bottom: 25px;}
    .formWrapper .inputField {width: 100%;margin: 0 0 15px 0;border: 1px solid #0000001a;padding: 15px 15px;border-radius: 6px;box-sizing: border-box;outline: none !important;}
    .formWrapper .inputField:last-child {margin-bottom: 0; }
    .formWrapper textarea.inputField {height: 150px; }
    .addBtn {background-color: #00d600;width: 30px;height: 30px;display: flex;justify-content: center;align-items: center;font-size: 25px;font-weight: 700;border-radius: 50%;cursor: pointer;color: #fff;} 
    .minusBtn {background-color: red;width: 30px;height: 30px;font-size: 32px;font-weight: 100;border-radius: 50%;cursor: pointer;color: #fff;line-height: 23px;text-align: center;} 
    .btnWrapper {display: flex; column-gap: 7px; margin-top: 15px; }
    .choose_color {padding: 0; overflow: hidden; height: 37px; }
</style>
<script>
document.querySelectorAll('.deleteButton').forEach(function(button) {
    button.addEventListener('click', function(event) {
        var form = button.closest('form');

        var id = form.getAttribute('action').split('/').pop();

        var confirmDelete = confirm("Are you sure you want to delete this Addon?");

        if (confirmDelete) {
            form.submit();
        } else {
            alert("Listed Addon not deleted.");
            event.preventDefault(); // Stop the form from submitting
        }
    });
});

</script>
@endsection