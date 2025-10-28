@extends('layouts.user_app')

@section('content')

<style>
	.input {width: 100%;font-size: 14px;padding: 15px 15px;margin-bottom: 0px;border: none;border-radius: 5px;}	
	.upload__box {
		border-radius: 5px;
		padding: 15px;
		background: white;
		position: relative;
	}
	.upload__inputfile {
		width: 100%;
		height: 100%;
		opacity: 0;
		position: absolute;
		z-index: 99;
		top: 0;
		left: 0;
	}
	.upload__btn {
		display: inline-block;
		font-weight: 600;
		color: #ccc;
		text-align: center;
		width: 100%;
		padding: 5px;
		transition: all 0.3s ease;
		cursor: pointer;
		height: 100%;
		font-size: 14px;
	}
	.upload__box p {
		color: #ccc;
	}
	.upload__btn:hover {
	background-color: unset;
	color: #4045ba;
	transition: all 0.3s ease;
	}
	.upload__btn-box {
		margin-bottom: 0px;
		border: 1px dashed #000;
		border-radius: 5px;
		padding: 30px 30px;
	}
	.upload__img-wrap {
		display: flex;
		flex-wrap: wrap;
		position: relative;
		z-index: 999;
		gap: 10px;
	}
	.upload__img-box {
		width: 79px;
		margin-bottom: 12px;
		border-radius: 5px;
		overflow: hidden;
	}
	.upload__img-close {
		width: 18px;
		height: 18px;
		border-radius: 5px;
		background-color: rgba(0, 0, 0, 0.5);
		position: absolute;
		top: 0px;
		right: 0px;
		text-align: center;
		line-height: 16px;
		z-index: 1;
		cursor: pointer;
	}
	.upload__img-close:after {
		content: "✖";
		font-size: 10px;
		color: white;
	}

	.img-bg {
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		position: relative;
		padding-bottom: 100%;
		}
		.upload__box p span {
		display: inline-block;
		width: 100%;
		color: var(--primeColor);
		font-weight: 600;
	}

	.upload__box p span.browse_option {
		color: #8d8d8d;
		font-weight: 400;
	}
</style>

<div class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="mb-9" action="{{ route('submit_list') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="cate_id_name" value="{{$name}}">

        <div class="row g-3 flex-between-end mb-5">

            <div class="col-auto">

                <h2 class="mb-2">Add a product</h2>

                <h5 class="text-700 fw-semi-bold">List Product On Your Store</h5>

            </div>

            <div class="col-auto"><a href="{{ url('products') }}/{{ last(request()->segments()) }}" class="btn px-5 me-2 mb-2 mb-sm-0" style="border: 1px solid #000;">Discard</a><button class="btn btn-primary mb-2 mb-sm-0" type="submit">Publish product</button></div>

        </div>

        <div class="row g-5">

            <div class="col-12 col-xl-8">

                <h4 class="mb-3">Product Title</h4>
                <input class="form-control mb-5" type="text" name="pro_name" placeholder="Write title here..." />

				<div class="row">
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Height </h4>
						<select class="form-control mb-5" name="pro_height">
							<option value="5.0 hh (20in)">5.0 hh (20in)</option>
							<option value="6.0 hh (24in)">6.0 hh (24in)</option>
							<option value="7.0 hh (28in)">7.0 hh (28in)</option>
							<option value="8.0 hh (32in)">8.0 hh (32in)</option>
							<option value="8.2 hh (34in)">8.2 hh (34in)</option>
							<option value="9.0 hh (36in)">9.0 hh (36in)</option>
							<option value="9.2 hh (38in)">9.2 hh (38in)</option>
							<option value="10.0 hh (40in)">10.0 hh (40in)</option>
							<option value="10.2 hh">10.2 hh</option>
							<option value="11.0 hh (44in)">11.0 hh (44in)</option>
							<option value="11.2 hh">11.2 hh</option>
							<option value="12.0 hh (48in)">12.0 hh (48in)</option>
							<option value="12.1 hh">12.1 hh</option>
							<option value="12.2 hh">12.2 hh</option>
							<option value="12.3 hh">12.3 hh</option>
							<option value="13.0 hh (52in)">13.0 hh (52in)</option>
							<option value="13.1 hh">13.1 hh</option>
							<option value="13.2 hh">13.2 hh</option>
							<option value="13.3 hh">13.3 hh</option>
							<option value="14.0 hh (56in)">14.0 hh (56in)</option>
							<option value="14.1 hh">14.1 hh</option>
							<option value="14.2 hh">14.2 hh</option>
							<option value="14.3 hh">14.3 hh</option>
							<option value="15.0 hh (60in)">15.0 hh (60in)</option>
							<option value="15.1 hh">15.1 hh</option>
							<option value="15.2 hh">15.2 hh</option>
							<option value="15.3 hh">15.3 hh</option>
							<option value="16.0 hh (64in)">16.0 hh (64in)</option>
							<option value="16.1 hh">16.1 hh</option>
							<option value="16.2 hh">16.2 hh</option>
							<option value="16.3 hh">16.3 hh</option>
							<option value="17.0 hh (68in)">17.0 hh (68in)</option>
							<option value="17.1 hh">17.1 hh</option>
							<option value="17.2 hh">17.2 hh</option>
							<option value="17.3 hh">17.3 hh</option>
							<option value="18.0 hh (72in)">18.0 hh (72in)</option>
							<option value="18.1 hh">18.1 hh</option>
							<option value="18.2 hh">18.2 hh</option>
							<option value="18.3 hh">18.3 hh</option>
							<option value="19.0 hh (76in)">19.0 hh (76in)</option>
							<option value="20.0 hh (80in)">20.0 hh (80in)</option>
							<option value="21.0 hh (84in)">21.0 hh (84in)</option>
						</select>
					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Age </h4>
						<select class="form-control mb-5" name="pro_age">
							<option value="1 Year">1 Year</option>
							<option value="2 Years">2 Years</option>
							<option value="3 Years">3 Years</option>
							<option value="4 Years">4 Years</option>
							<option value="5 Years">5 Years</option>
							<option value="6 Years">6 Years</option>
							<option value="7 Years">7 Years</option>
							<option value="8 Years">8 Years</option>
							<option value="9 Years">9 Years</option>
							<option value="10 Years">10 Years</option>
							<option value="12 Years">12 Years</option>
							<option value="15 Years">15 Years</option>
							<option value="18 Years">18 Years</option>
							<option value="20 Years">20 Years</option>
						</select>
					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Color </h4>
						<select class="form-control mb-5" name="pro_color">
							<option value="Bay">Bay</option>
							<option value="Bay Dun">Bay Dun</option>
							<option value="Bay Dun Roan">Bay Dun Roan</option>
							<option value="Bay Roan">Bay Roan</option>
							<option value="Black">Black</option>
							<option value="Black Bay">Black Bay</option>
							<option value="Blue Roan">Blue Roan</option>
							<option value="Brindle">Brindle</option>
							<option value="Brown">Brown</option>
							<option value="Buckskin">Buckskin</option>
							<option value="Buckskin Roan">Buckskin Roan</option>
							<option value="Champagne">Champagne</option>
							<option value="Chestnut">Chestnut</option>
							<option value="Chocolate">Chocolate</option>
							<option value="Cremello">Cremello</option>
							<option value="Cremello Dun">Cremello Dun</option>
							<option value="Dun">Dun</option>
							<option value="Dunalino">Dunalino</option>
							<option value="Dunskin">Dunskin</option>
							<option value="Grey">Grey</option>
							<option value="Grullo">Grullo</option>
							<option value="Isabella">Isabella</option>
							<option value="Liver Chestnut">Liver Chestnut</option>
							<option value="Other">Other</option>
							<option value="Palomino">Palomino</option>
							<option value="Palomino Roan">Palomino Roan</option>
							<option value="Pearl">Pearl</option>
							<option value="Perlino">Perlino</option>
							<option value="Lerino Dun">Lerino Dun</option>
							<option value="Piebald">Piebald</option>
							<option value="Pinto">Pinto</option>
							<option value="Red Chocolate">Red Chocolate</option>
							<option value="Red Dun">Red Dun</option>
							<option value="Red Dun Roan">Red Dun Roan</option>
							<option value="Red Roan">Red Roan</option>
							<option value="Silver">Silver</option>
							<option value="Silver Bay">Silver Bay</option>
							<option value="Silver Black">Silver Black</option>
							<option value="Silver Black Roan">Silver Black Roan</option>
							<option value="Silver Buckskin">Silver Buckskin</option>
							<option value="Silver Dapple">Silver Dapple</option>
							<option value="Silver Perlino">Silver Perlino</option>
							<option value="Silver Smokey Black">Silver Smokey Black</option>
							<option value="Silver Smokey Cream">Silver Smokey Cream</option>
							<option value="Skewbald">Skewbald</option>
							<option value="Smokey Black">Smokey Black</option>
							<option value="Smokey Cream">Smokey Cream</option>
							<option value="Smokey Cream Dun">Smokey Cream Dun</option>
							<option value="Smokey Grullo">Smokey Grullo</option>
							<option value="Sorrel">Sorrel</option>
							<option value="Unknown">Unknown</option>
							<option value="White">White</option>
						</select>
					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Skill</h4>
						<select class="form-control mb-5" name="pro_skill">
							<option value="4H">4H</option>
							<option value="Agility">Agility</option>
							<option value="All-Around Show">All-Around Show</option>
							<option value="Barrel Racing">Barrel Racing</option>
							<option value="Barrels* Poles *Gymkhana">Barrels* Poles *Gymkhana</option>
							<option value="Breakaway Roping">Breakaway Roping</option>
							<option value="Brood mare">Brood mare</option>
							<option value="Calf Roping">Calf Roping</option>
							<option value="Clicker Training">Clicker Training</option>
							<option value="Companion Only">Companion Only</option>
							<option value="Competitive Trail Riding">Competitive Trail Riding</option>
							<option value="Country English Pleasure">Country English Pleasure</option>
							<option value="Cowboy Dressage">Cowboy Dressage</option>
							<option value="Cowboy Mounted Shooting">Cowboy Mounted Shooting</option>
							<option value="Cowboy Racing">Cowboy Racing</option>
							<option value="Cow horse">Cow horse</option>
							<option value="Cross-Country">Cross-Country</option>
							<option value="Cutting">Cutting</option>
							<option value="Dressage">Dressage</option>
							<option value="Drill Team">Drill Team</option>
							<option value="Driving">Driving</option>
							<option value="Endurance Riding">Endurance Riding</option>
							<option value="English">English</option>
							<option value="English Pleasure">English Pleasure</option>
							<option value="Equitation">Equitation</option>
							<option value="Eventing">Eventing</option>
							<option value="Field Trial">Field Trial</option>
							<option value="Foxhunter">Foxhunter</option>
							<option value="Gun - Safe Hunting">Gun - Safe Hunting</option>
							<option value="Halter">Halter</option>
							<option value="Harness">Harness</option>
							<option value="Harness Racing">Harness Racing</option>
							<option value="Horsemanship">Horsemanship</option>
							<option value="Hunt Seat Equitation">Hunt Seat Equitation</option>
							<option value="Hunter">Hunter</option>
							<option value="Hunter Pleasure">Hunter Pleasure</option>
							<option value="Hunter Under Saddle">Hunter Under Saddle</option>
							<option value="Jumping">Jumping</option>
							<option value="Lesson Horse">Lesson Horse</option>
							<option value="Liberty Training">Liberty Training</option>
							<option value="Light Riding">Light Riding</option>
							<option value="Longe Line">Longe Line</option>
							<option value="Mountain Trail">Mountain Trail</option>
							<option value="Mounted Games">Mounted Games</option>
							<option value="Mounted Police">Mounted Police</option>
							<option value="Native Costume">Native Costume</option>
							<option value="Natural Horsemanship Training">Natural Horsemanship Training</option>
							<option value="Nurse Mare">Nurse Mare</option>
							<option value="Pacing Gait">Pacing Gait</option>
							<option value="Pack">Pack</option>
							<option value="Parade">Parade</option>
							<option value="Performance">Performance</option>
							<option value="Play day">Play day</option>
							<option value="Pleasure Driving">Pleasure Driving</option>
							<option value="Pole Bending">Pole Bending</option>
							<option value="Polo">Polo</option>
							<option value="Pony Club">Pony Club</option>
							<option value="Project">Project</option>
							<option value="Racing">Racing</option>
							<option value="Retired Race Horse">Retired Race Horse</option>
							<option value="Racking Gait">Racking Gait</option>
							<option value="Ranch Conformation Class">Ranch Conformation Class</option>
							<option value="Ranch Rail Class">Ranch Rail Class</option>
							<option value="Ranch Riding - Ranch Pleasure">Ranch Riding - Ranch Pleasure</option>
							<option value="Ranch Sorting">Ranch Sorting</option>
							<option value="Ranch Trail Class">Ranch Trail Class</option>
							<option value="Ranch Versatility">Ranch Versatility</option>
							<option value="Ranch Work">Ranch Work</option>
							<option value="Reining">Reining</option>
							<option value="Reining - Cowhorse - Cutting">Reining - Cowhorse - Cutting</option>
							<option value="Rodeo">Rodeo</option>
							<option value="Rodeo Bronc">Rodeo Bronc</option>
							<option value="Roping">Roping</option>
							<option value="Saddle Seat">Saddle Seat</option>
							<option value="School">School</option>
							<option value="Schoolmaster">Schoolmaster</option>
							<option value="Show Experience">Show Experience</option>
							<option value="Show Hack">Show Hack</option>
							<option value="Show Winner">Show Winner</option>
							<option value="Showmanship Halter">Showmanship Halter</option>
							<option value="Sidesaddle">Sidesaddle</option>
							<option value="Stallion - Stud - Breeding">Stallion - Stud - Breeding</option>
							<option value="Started Under Saddle">Started Under Saddle</option>
							<option value="Steer Roping">Steer Roping</option>
							<option value="Steer Wrestling">Steer Wrestling</option>
							<option value="Stock">Stock</option>
							<option value="Team Driving">Team Driving</option>
							<option value="Team Penning">Team Penning</option>
							<option value="Team Roping">Team Roping</option>
							<option value="Team Roping - Head">Team Roping - Head</option>
							<option value="Team Roping - Heel">Team Roping - Heel</option>
							<option value="Team Sorting">Team Sorting</option>
							<option value="Therapeutic Riding">Therapeutic Riding</option>
							<option value="Therapy">Therapy</option>
							<option value="Trail Class Competition">Trail Class Competition</option>
							<option value="Trail Master">Trail Master</option>
							<option value="Trail Riding">Trail Riding</option>
							<option value="Trick">Trick</option>
							<option value="Unicorn">Unicorn</option>
							<option value="Vaulting">Vaulting</option>
							<option value="Western">Western</option>
							<option value="Western Dressage">Western Dressage</option>
							<option value="Western Pleasure">Western Pleasure</option>
							<option value="Western Riding">Western Riding</option>
							<option value="Working Cattle">Working Cattle</option>
							<option value="Working Equitation">Working Equitation</option>
						</select>
					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Breed</h4>
						<select class="form-control mb-5" name="pro_breed">
							<option value="Akhal-Teke">Akhal-Teke</option>
							<option value="Aegidienberger">Aegidienberger</option>
							<option value="Alberta Wild Horse">Alberta Wild Horse</option>
							<option value="Alter Real">Alter Real</option>
							<option value="Altmark Coldblood">Altmark Coldblood</option>
							<option value="American Bashkir Curly">American Bashkir Curly</option>
							<option value="American Belgian Draft">American Belgian Draft</option>
							<option value="American Cream Draft Horse">American Cream Draft Horse</option>
							<option value="American Indian Horse">American Indian Horse</option>
							<option value="American Miniature Horse">American Miniature Horse</option>
							<option value="American Saddlebred">American Saddlebred</option>
							<option value="American Shetland Pony">American Shetland Pony</option>
							<option value="American Spotted">American Spotted</option>
							<option value="American Standardbred">American Standardbred</option>
							<option value="American Walking Pony">American Walking Pony</option>
							<option value="Andalusian Horse">Andalusian Horse</option>
							<option value="Anglo Arabian">Anglo Arabian</option>
							<option value="Appaloosa">Appaloosa</option>
							<option value="Arabian Horses">Arabian Horses</option>
							<option value="Ardennes">Ardennes</option>
							<option value="Arabian-Berber">Arabian-Berber</option>
							<option value="Arabian Halfbred">Arabian Halfbred</option>
							<option value="Arabian Partbred">Arabian Partbred</option>
							<option value="Araloosa">Araloosa</option>
							<option value="Arenberg-Nordkirchen">Arenberg-Nordkirchen</option>
							<option value="Australian Brumby">Australian Brumby</option>
							<option value="Australian Draught Horse">Australian Draught Horse</option>
							<option value="Australian Stock Horse">Australian Stock Horse</option>
							<option value="Austrian Warmblood">Austrian Warmblood</option>
							<option value="Auxois">Auxois</option>
							<option value="Baden-Wurttemberg">Baden-Wurttemberg</option>
							<option value="Balearic">Balearic</option>
							<option value="Balikun Horse">Balikun Horse</option>
							<option value="Baltic Hanoverian">Baltic Hanoverian</option>
							<option value="Bardigiano">Bardigiano</option>
							<option value="Bashkir Horse">Bashkir Horse</option>
							<option value="Bavarian Warmblood">Bavarian Warmblood</option>
							<option value="Belgian Cold Blood">Belgian Cold Blood</option>
							<option value="Belgian Draft">Belgian Draft</option>
							<option value="Belgian Warmblood">Belgian Warmblood</option>
							<option value="Black Forest Horse">Black Forest Horse</option>
							<option value="Boerperd">Boerperd</option>
							<option value="Boulonnais">Boulonnais</option>
							<option value="Brabant Horse">Brabant Horse</option>
							<option value="Brandenburger Warmblood">Brandenburger Warmblood</option>
							<option value="Breton">Breton</option>
							<option value="British Riding Pony">British Riding Pony</option>
							<option value="Budyonny">Budyonny</option>
							<option value="Burguete">Burguete</option>
							<option value="Byelorussian Harness Horse">Byelorussian Harness Horse</option>
							<option value="Calabrese">Calabrese</option>
							<option value="Camargue Horse">Camargue Horse</option>
							<option value="Canadian Horse">Canadian Horse</option>
							<option value="Canadian Pacer">Canadian Pacer</option>
							<option value="Canadian Rustic Pony">Canadian Rustic Pony</option>
							<option value="Carolina Marsh Tacky">Carolina Marsh Tacky</option>
							<option value="Cerbat Mustang">Cerbat Mustang</option>
							<option value="Chincoteague Pony">Chincoteague Pony</option>
							<option value="Chickasaw Horse">Chickasaw Horse</option>
							<option value="Chinese Horse">Chinese Horse</option>
							<option value="Choctaw Pony">Choctaw Pony</option>
							<option value="Classic Pony">Classic Pony</option>
							<option value="Cleveland-Bay">Cleveland-Bay</option>
							<option value="Clydesdale">Clydesdale</option>
							<option value="Cumberland Island Horse">Cumberland Island Horse</option>
							<option value="Cob Horse">Cob Horse</option>
							<option value="Comtois">Comtois</option>
							<option value="Connemara Pony">Connemara Pony</option>
							<option value="Criollo Horse">Criollo Horse</option>
							<option value="Curly Horses">Curly Horses</option>
							<option value="Dales Pony">Dales Pony</option>
							<option value="Dartmoor Pony">Dartmoor Pony</option>
							<option value="Dutch Warmblood">Dutch Warmblood</option>
							<option value="Fell Pony">Fell Pony</option>
							<option value="Finnhorse">Finnhorse</option>
							<option value="Friesian">Friesian</option>
							<option value="Gelderland">Gelderland</option>
							<option value="Hackney">Hackney</option>
							<option value="Hanoverian">Hanoverian</option>
							<option value="Haflinger">Haflinger</option>
							<option value="Holsteiner">Holsteiner</option>
							<option value="Icelandic Horse">Icelandic Horse</option>
							<option value="Irish Draught">Irish Draught</option>
							<option value="Kinsky Horse">Kinsky Horse</option>
							<option value="Knabstrupper">Knabstrupper</option>
							<option value="Lippizan">Lippizan</option>
							<option value="Lusitano">Lusitano</option>
							<option value="Marwari Horse">Marwari Horse</option>
							<option value="Morgan Horse">Morgan Horse</option>
							<option value="Mustang">Mustang</option>
							<option value="Paso Fino">Paso Fino</option>
							<option value="Percheron">Percheron</option>
							<option value="Pinto">Pinto</option>
							<option value="Polish Warmblood">Polish Warmblood</option>
							<option value="Rocky Mountain Horse">Rocky Mountain Horse</option>
							<option value="Shire Horse">Shire Horse</option>
							<option value="Tennessee Walking Horse">Tennessee Walking Horse</option>
							<option value="Thoroughbred">Thoroughbred</option>
							<option value="Trakehner">Trakehner</option>
							<option value="Welsh Pony">Welsh Pony</option>
							<option value="Westphalian">Westphalian</option>
							<option value="Zweibrücker Horse">Zweibrücker Horse</option>
						</select>
					</div>
					<div class="col-lg-6">
						<h4 class="mb-3"> Horse Gender</h4>
						<select class="form-control mb-5" name="pro_gender">
							<option value="Colt">Colt</option>
							<option value="Filly">Filly</option>
							<option value="Gelding">Gelding</option>
							<option value="Mare">Mare</option>
							<option value="Stallion">Stallion</option>
							<option value="Unborn Foal">Unborn Foal</option>
							<option value="Jack">Jack</option>
							<option value="Jenny">Jenny</option>
							<option value="John">John</option>
							<option value="Molly">Molly</option>
						</select>
					</div>
                </div>

                <div class="mb-6">
                    <h4 class="mb-3"> Product Description</h4>
                    <textarea class="tinymce" name="pro_desc" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'></textarea>
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
                                            <input class="form-control mb-xl-3" name="pro_Fimg" type="file" placeholder="Featured Image" />
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-xl-12">
                                        <div class="mb-4">
                                            <h5 class="mb-2 text-1000">Horse Price</h5>
                                            <input class="form-control mb-xl-3" name="pro_reg_price" type="text" placeholder="Featured Image" />
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-xl-12">

                                        <div class="mb-4">

                                            <div class="d-flex flex-wrap mb-2">

                                                <h5 class="mb-0 text-1000 me-2">Category</h5>

                                                <a class="fw-bold fs--1" href="{{ route('add_category') }}">Add new category</a>

                                            </div>
                                            <div class="checkbox_wrap">
                                                @foreach($categories as $cate)
                                                    <label class="category_check">
                                                      <input type="checkbox" name="cate_id[]" value="{{ $cate->id }}">
                                                      <span class="categoryMark">{{ $cate->cate_name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>


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