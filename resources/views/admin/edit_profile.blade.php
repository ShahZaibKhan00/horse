@extends('layouts.admin_app') @section('content')
<style>
    .avatar-upload {
        position: relative;
    }
    label svg {
        margin: 8px;
    }
    .avatar-upload .avatar-edit input {
        display: none;
    }
    .action_btn_flex {
        padding: 20px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }
    .avatar-upload .avatar-edit input + label {
        width: 200px;
        height: 40px;
        margin-bottom: 0;
        border-radius: 6px;
        background: #b09240;
        background: linear-gradient(90deg, rgba(176, 146, 64, 1) 0%, rgba(250, 248, 244, 1) 113%);
        border: 0;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: 800;
        transition: all 0.2s ease-in-out;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .avatar-upload .avatar-preview {
        max-width: 300px;
        margin: 0 auto;
        width: 100%;
        height: 300px;
        position: relative;
        border-radius: 20px;
        border: 4px solid #fff;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        background-size: cover;
        border-radius: 20px;
        background-repeat: no-repeat;
        background-position: center;
    }
    .edit_gen_btn {
        width: 200px;
        height: 40px;
        margin-bottom: 0;
        border-radius: 6px;
        background: #b09240;
        background: linear-gradient(90deg, rgba(176, 146, 64, 1) 0%, rgba(250, 248, 244, 1) 113%);
        border: 0;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: 800;
        transition: all 0.2s ease-in-out;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card-body a.btn:hover {
        color: #fff !important;
    }
    .card-body a.btn {
        background-color: transparent !important;
    }
    .box_frame {
        border: 2px solid #1d2139;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        height: 55px;
    }
    .form-check.check_one {
        width: 240px;
        margin-left: auto;
    }


    .dropdown-container {
            position: relative;
            width: 100%;
            font-family: sans-serif;
        }

        .dropdown-header {
            border: 2px solid #1d2139;
            padding: 6px 7px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 5px;
            position: relative;
            cursor: text;
            background-color: #fff;
            height: 55px;
        }

        .dropdown-header input {
            flex: 1;
            border: none;
            min-width: 150px;
            padding: 4px;
            outline: none;
            font-size: 14px;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .tag {
            background-color: #e4e7ee;
            padding: 3px 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            font-size: 10px;
        }

        .tag button {
            background: none;
            border: none;
            margin-left: 5px;
            cursor: pointer;
            font-size: 14px;
            color: #333;
        }

        #searchInput {
            border: none;
            outline: none;
            flex: 1;
            padding: 5px;
            min-width: 120px;
        }

        .dropdown-arrow {
            position: absolute;
            right: 10px;
            cursor: pointer;
            font-size: 10px;
            width: 100px;
            text-align: end;
        }

        .dropdown-list {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #ccc;
            background: #e4e7ee;
            display: none;
            z-index: 10;
            border-radius: 0 0 10px 10px;
        }

        .dropdown-list.active {
            display: block;
        }

        .dropdown-list div {
            padding: 10px;
            cursor: pointer;
            font-size: 0.8rem;
        }

        .dropdown-list div:hover {
            background-color: #fff;
        }

         .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            height: 55px !important;
            color: #000000;
            padding: 8px 15px;
        }

        .select2-container--default .select2-selection--single {
            height: 55px !important;
            border-radius: 0!important;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #000;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #ffffff transparent transparent transparent;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 6px;
            right: 9px;
            width: 20px;
        }

        .select2-container--default .select2-results>.select2-results__options {
            max-height: 310px;
            overflow-y: auto;
        }

        .select2-results__option--selectable {
            font-size: 14px;
        }
        .content {
            padding-bottom: 150px;
        }
        .card h2 {
            font-size: 25px;
        }
        .card h2 span {
            font-size: 18px;
            color: #9c9c9c;
            }

            .textarea_about {
              height: 150px;
            }
            .submit_btn {
                font-size: 20px;
                font-weight: 800;
                width: 100%;
                height: 50px;
                margin-bottom: 0;
                border-radius: 6px;
                border: 0;
                background: #b09240;
                background: linear-gradient(90deg, rgba(176, 146, 64, 1) 0%, rgba(250, 248, 244, 1) 113%);
            }
</style>
<div class="content">
    @foreach ($profile as $profile)
    <div class="row align-items-center mb-4">
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <h2 class="mb-2 text-white main_heading_dashboard">Edit Profile</h2>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="avatar-upload">
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('{{ getenv('APP_URL') }}/Profile_image/{{ $profile->Profile_img != '' ? $profile->Profile_img : 'profile.jpg' }}');"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="action_btn_flex">
                <!-- <button class="edit_gen_btn">Edit Profile</button> -->
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload">
                            Upload Photo or Logo
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-12 col-xxl-12">
            <form action="{{route('update.profile.info')}}" method="POST" class="row g-3">
             @csrf
                <div class="col-12 col-lg-12">
                    <div class="card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-3 justify-content-center">
                                <h2 class="me-1">Contact Information</h2>
                                <!-- <a href="{{url('edit_profile')}}" class="btn btn-link p-0">
                                    <svg
                                        class="svg-inline--fa fa-pen fs-0 ms-3 text-500"
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fas"
                                        data-icon="pen"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                        data-fa-i2svg=""
                                    >
                                        <path
                                            fill="currentColor"
                                            d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"
                                        ></path>
                                    </svg>
                                     <span class="fas fa-pen fs-0 ms-3 text-500"></span> Font Awesome fontawesome.com 
                                </a> -->
                            </div>

                            <div class="row g-2">
                                <div class="col-6 mb-2">
                                      <h5 class="text-800 mb-2">Full Name:</h5>
                                      <input class="box_frame w-100" name="name" value="{{$profile->name}}" placeholder="Enter Name"/>
                                      @error('name')
                                        <div class="text-danger">{{$message}}</div>
                                      @enderror
                                </div>

                                <div class="col-6 mb-2">
                                      <h5 class="text-800 mb-2">Business Name:</h5>
                                      <input class="box_frame w-100" name="bussiness_name" value="{{$profile->bussiness_name}}" placeholder="Enter Business Name"/>
                                </div>

                                <div class="col-6 mb-2">
                                    <h5 class="text-800 mb-2">Email:</h5>
                                    <input class="box_frame w-100" name="email" value="{{$profile->email}}" @disabled(true) placeholder="Enter Email"/>
                                </div>
                                <div class="col-6 mb-2">
                                    <h5 class="text-800 mb-2">Phone:</h5>
                                    <input class="box_frame w-100" name="Number" value="{{$profile->Number}}" placeholder="Enter Phone"/>
                                </div>

                                <div class="col-12 mb-2">
                                    <h5 class="text-800 mb-2">Street Address:</h5>
                                    <input class="box_frame w-100" name="Address" value="{{$profile->Address}}" placeholder="Enter Address"/>
                                </div>

                                <div class="col-6">
                                    <h5 class="text-800 mb-2">Town:</h5>
                                    <input class="box_frame w-100" name="town" value="{{$profile->town}}" placeholder="Enter Your Town"/>
                                </div>
                                <div class="col-6">
                                    <h5 class="text-800 mb-2">State:</h5>
                                    <input class="box_frame w-100" name="state" value="{{$profile->state}}" placeholder="Enter Your State"/>
                                </div>
                                <!-- <div class="col-12 mt-4">
                                    <div class="form-check check_one">
                                        <label><input class="form-check-input" name="" type="checkbox" value="" /> Show full address on Profile</label>
                                    </div>
                                    <div class="form-check check_one">
                                        <label><input class="form-check-input" name="" type="checkbox" value="" /> Show town and state only</label>
                                    </div> 
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-3 justify-content-center">
                                <h2 class="me-1">Links:</h2>
                            </div>

                            <div class="row g-2">
                                <div class="col-12 mb-2">
                                    <h5 class="text-800 mb-2">Website Link:</h5>
                                    <input class="box_frame w-100" name="website_link" value="{{$profile->website_link}}" placeholder="www.example.com"/>
                                </div>
                                <div class="col-12 mb-2">
                                        <h5 class="text-800 mb-2">Facebook Link:</h5>
                                        <input class="box_frame w-100" name="facebook_link" value="{{$profile->facebook_link}}" placeholder="Paste here"/>
                                </div>
                                <div class="col-12 mb-2">
                                        <h5 class="text-800 mb-2">Instagram Link:</h5>
                                        <input class="box_frame w-100" name="insta_link" value="{{$profile->insta_link}}" placeholder="Paste here"/>
                                </div>
                                <div class="col-12 mb-2">
                                        <h5 class="text-800 mb-2">TikTok Link:</h5>
                                        <input class="box_frame w-100" name="tiktok_link" value="{{$profile->tiktok_link}}" placeholder="Paste here"/>
                                </div>
                                <div class="col-12 mb-2">
                                        <h5 class="text-800 mb-2">Youtube Link:</h5>
                                        <input class="box_frame w-100" name="youtube_link" value="{{$profile->youtube_link}}" placeholder="Paste here"/>
                                </div>
                                <div class="col-12">
                                        <h5 class="text-800 mb-2">Google Business Link:</h5>
                                        <input class="box_frame w-100" name="business_link" value="{{$profile->business_link}}" placeholder="Paste here"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6">
                    <!-- CARD 1: Specialized Skills -->
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <h2 class="mb-3">Specialized Skills | Disciplines: <span>Choose up to 6</span></h2>
                            <div class="dropdown-container">
                                <input type="hidden" name="pro_skill" id="selectedActivitiesInput" />
                                <div class="dropdown-header" id="dropdownHeader1">
                                    <div class="tags" id="tagsContainer1"></div>
                                    <input type="text" id="searchInput1" placeholder="Start typing" oninput="handleInput(1)" onkeydown="handleKeyDown(event, 1)" />
                                    <span class="dropdown-arrow" onclick="toggleDropdown(1)">▼</span>
                                </div>
                                <div class="dropdown-list" id="dropdownList1"></div>
                                <input type="hidden" name="pro_rider_level" id="pro_rider_level1" value="" />
                            </div>
                        </div>
                    </div>

                    <!-- CARD 2: Specialized Breeds -->
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <h2 class="mb-3">Specialized Breeds: <span>Choose up to 6</span></h2>
                            <div class="dropdown-container">
                                <input type="hidden" name="pro_breeds" />
                                <div class="dropdown-header" id="dropdownHeader2">
                                    <div class="tags" id="tagsContainer2"></div>
                                    <input type="text" id="searchInput2" placeholder="Start typing" oninput="handleInput(2)" onkeydown="handleKeyDown(event, 2)" />
                                    <span class="dropdown-arrow" onclick="toggleDropdown(2)">▼</span>
                                </div>
                                <div class="dropdown-list" id="dropdownList2"></div>
                                <input type="hidden" name="pro_breed_level" id="pro_rider_level2" value="" />
                            </div>
                        </div>
                    </div>

                    <!-- CARD 3: Services Offered -->
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <h2 class="mb-3">Services Offered: <span>Choose up to 6</span></h2>
                            <div class="dropdown-container">
                                <input type="hidden" name="pro_services" />
                                <div class="dropdown-header" id="dropdownHeader3">
                                    <div class="tags" id="tagsContainer3"></div>
                                    <input type="text" id="searchInput3" placeholder="Start typing" oninput="handleInput(3)" onkeydown="handleKeyDown(event, 3)" />
                                    <span class="dropdown-arrow" onclick="toggleDropdown(3)">▼</span>
                                </div>
                                <div class="dropdown-list" id="dropdownList3"></div>
                                <input type="hidden" name="pro_service_level" id="pro_rider_level3" value="" />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-lg-12">
                  <div class="card mb-4">
                        <div class="card-body p-3">
                            <h2 class="mb-3">About Me:</h2>
                            <textarea class="box_frame w-100 textarea_about" name="about" placeholder="Write here….">{{$profile->about}}</textarea>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                <button class="submit_btn">Save</button>
                 </div>
             </form>
            @endforeach
        </div>
    </div>


    <script>
(function () {
    const optionsById = {
        1: [
            "Agility", "All Around", "All-Around Show", "Beginner", "Barrel Racing",
            "Barrels* Poles *Gymkhana", "Breakaway Roping", "Brood mare", "Cutting Prospect",
            "Cutting", "Calf Roping", "Clicker Training", "Companion Only", "Competitive Trail Riding",
            "Country English Pleasure", "Cowboy Dressage", "Cowboy Mounted Shooting", "Cowboy Racing",
            "Cow horse", "Cross-Country", "Dressage", "Drill Team", "Driving",
            "Endurance Riding", "English", "English Pleasure", "Equitation", "Eventing",
            "Field Trial", "Foxhunter", "Gun - Safe Hunting", "Halter", "Harness",
            "Harness Racing", "Horsemanship", "Hunt Seat Equitation", "Hunter", "Hunter Pleasure",
            "Hunter Under Saddle", "Jumping", "Lesson Horse", "Liberty Training", "Light Riding",
            "Longe Line", "Mountain Trail", "Mounted Games", "Mounted Police", "Native Costume",
            "Natural Horsemanship Training", "Nurse Mare", "Pacing Gait", "Pack", "Parade",
            "Performance", "Play day", "Pleasure Driving", "Pole Bending", "Polo",
            "Pony Club", "Project", "Racing", "Retired Race Horse", "Racking Gait",
            "Ranch Conformation Class", "Ranch Rail Class", "Ranch Riding - Ranch Pleasure",
            "Ranch Sorting", "Ranch Trail Class", "Ranch Versatility", "Ranch Work", "Reining",
            "Reining - Cowhorse - Cutting", "Rodeo", "Rodeo Bronc", "Roping", "Saddle Seat",
            "School", "Schoolmaster", "Show Experience", "Show Hack", "Show Winner",
            "Showmanship Halter", "Sidesaddle", "Stallion - Stud - Breeding", "Started Under Saddle",
            "Steer Roping", "Steer Wrestling", "Stock", "Team Driving", "Team Penning",
            "Team Roping", "Team Roping - Head", "Team Roping - Heel", "Team Sorting",
            "Therapeutic Riding", "Therapy", "Trail Class Competition", "Trail Master",
            "Trail Riding", "Trick", "Unicorn", "Vaulting", "Western", "Western Dressage",
            "Western Pleasure", "Western Riding", "Working Cattle", "Working Equitation", "4H"
        ],
        2: [
            "Akhal-Teke", "Aegidienberger", "Alberta Wild Horse", "Alter Real", "Altmark Coldblood",
            "Altor Real", "American Bashkir Curly", "American Belgian Draft", "American Cream Draft Horse",
            "American Indian Horse", "American Miniature Horse", "American Saddlebred", "American Shetland Pony",
            "American Spotted", "American Standardbred", "American Walking Pony", "Andalusian Horse",
            "Anglo Arabian", "Appaloosa", "Arabian", "Arabian Horses", "Ardennes", "Arabian-Berber",
            "Arabian Halfbred", "Arabian Partbred", "Araloosa", "Arcenberg-Nordkirchen", "Australian Brumby",
            "Australian Draught Horse", "Australian Stock Horse", "Austrian Warmblood", "Auxois",
            "Baden-Wurttemberg", "Balearic", "Balikun Horse", "Baltic Hanoverian", "Bardigiano",
            "Bashkir Horse", "Bavarian Warmblood", "Belgian Cold Blood", "Belgian Draft", "Belgian Warmblood",
            "Black Forest Horse", "Boerperd", "Boulonnais", "Brabant Horse", "Brandenburger Warmblood",
            "Breton", "British Riding Pony", "Budyonny", "Burguete", "Byelorussian Harness Horse",
            "Calabrese", "Camargue Horse", "Canadian Horse", "Canadian Pacer", "Canadian Rustic Pony",
            "Carolina Marsh Tacky", "Cerbat Mustang", "Chincoteague Pony", "Chickasaw Horse", "Choctaw Pony",
            "Classic Pony", "Cleveland-Bay", "Clydesdale", "Clydesdale Cross", "Cumberland Island Horse",
            "Cob Horse", "Comtois", "Connemara Pony", "Criollo Horse", "Curly Horses", "Dales Pony",
            "Dartmoor Pony", "Draft Cross", "Dutch Warmblood", "Fell Pony", "Finnhorse", "Friesian",
            "Friesian Cross", "Fjord", "Fjord Cross", "Gelderland", "Gypsy Vanner", "Gypsy Cross", "Hackney",
            "Hanoverian", "Haflinger", "Holsteiner", "Icelandic Horse", "Irish Draught", "Irish Draft Cross",
            "Kinsky Horse", "Knabstrupper", "Lippizan", "Lusitano", "Marwari Horse", "Morgan", "Morgan Cross",
            "Mustang", "Paso Fino", "Percheron", "Percheron Cross", "Pinto", "Polish Warmblood",
            "Quarter Horse", "Quarter Horse Cross", "Rocky Mountain Horse", "Shire", "Shire Cross",
            "Spotted Draft", "Spotted Draft Cross", "Tennessee Walking Horse", "Thoroughbred",
            "Thoroughbred Cross", "Trakehner", "Welsh", "Welsh Pony", "Westphalian", "Welsh Cross",
            "Warmblood", "Warmblood Cross", "Zweibrücker Horse"
        ],
        3: [
            "Accountants", "AI Services", "Arena Builder", "Auctions", "Barn Builders",
            "Barn Hand", "Blanket Cleaning", "Boarding", "Breeders", "Brokers",
            "Broodmare Manager", "Burial Services", "Caretaking & Sitters", "Carriage Hire",
            "Children’s Camp", "Chiropractor / Acupuncture / MagnaWave", "Clubs", "Construction",
            "Cremation Service", "Dentists", "Education", "Employment", "Entertainment",
            "Equine Artist", "Equine Nutrition", "Equipment", "Event Coordinator", "Events",
            "Exercise Riders", "Farm Lenders", "Farriers", "Feed Supply", "Feed / Produce Supplier",
            "Fencing Contractors / Suppliers", "General Services", "Giftware", "Grooming / Clipping",
            "Hay Delivery", "Horse Transport", "Instructors / Coaches", "Insurance", "Jewelry",
            "Lawyers", "Manure Removal", "Marketing", "Message Therapy", "Parties", "Photography",
            "Physical Therapy", "Pony Parties", "Property Care", "Real Estate", "Registries",
            "Rehabilitation Therapist", "Rescues", "Riding Centers", "Saddle Fitters", "Saddlery",
            "Saddlery Repairs", "Shipping", "Show Judges", "Sponsors", "Stables", "Stallion Manager",
            "Stud Services", "Supplements", "Tack Repair", "Tack Stores",
            "Therapeutic Riding Instructor / Coach", "Trail Guide", "Trail Riding", "Trailers",
            "Trainer / Rider", "Veterinarian / Veterinary Surgeon", "Video Production",
            "Riding Lessons (Beginner / Intermediate / Advanced)", "Horse Training (Groundwork, Jumping, Dressage, etc.)",
            "Boarding Services", "Horse Grooming / Care", "Equine Therapy / Healing", "Horse Leasing",
            "Trail Guiding", "Mobile Equestrian Services", "Events / Clinics / Workshops", "Show Preparation / Coaching"
        ]
    };

    const selectedValues = {
        1: [],
        2: [],
        3: []
    };

    function toggleDropdown(id) {
        document.getElementById(`dropdownList${id}`).classList.toggle("active");
        filterOptions("", id);
    }

    function handleInput(id) {
        document.getElementById(`dropdownList${id}`).classList.add("active");
        filterOptions(document.getElementById(`searchInput${id}`).value, id);
    }

    function handleKeyDown(e, id) {
        if (e.key === "Enter") {
            e.preventDefault();
            const value = document.getElementById(`searchInput${id}`).value.trim();
            if (value && !selectedValues[id].includes(value) && selectedValues[id].length < 6) {
                selectedValues[id].push(value);
                document.getElementById(`searchInput${id}`).value = "";
                renderTags(id);
                filterOptions("", id);
            }
        }
    }

    function filterOptions(query, id) {
        const allOptions = optionsById[id];
        const filtered = allOptions.filter(option =>
            option.toLowerCase().startsWith(query.toLowerCase()) &&
            !selectedValues[id].includes(option)
        );

        const list = document.getElementById(`dropdownList${id}`);
        list.innerHTML = "";

        filtered.forEach(option => {
            const div = document.createElement("div");
            div.textContent = option;
            div.onclick = () => selectOption(option, id);
            list.appendChild(div);
        });

        if (filtered.length === 0 && query.trim() !== "") {
            const customOption = document.createElement("div");
            customOption.textContent = `Add "${query}"`;
            customOption.className = "custom-option";
            customOption.onclick = () => {
                if (!selectedValues[id].includes(query) && selectedValues[id].length < 6) {
                    selectedValues[id].push(query);
                    document.getElementById(`searchInput${id}`).value = "";
                    renderTags(id);
                    filterOptions("", id);
                }
            };
            list.appendChild(customOption);
        }
    }

    function selectOption(value, id) {
        if (!selectedValues[id].includes(value) && selectedValues[id].length < 6) {
            selectedValues[id].push(value);
            document.getElementById(`searchInput${id}`).value = "";
            renderTags(id);
            filterOptions("", id);
        }
    }

    function renderTags(id) {
        const container = document.getElementById(`tagsContainer${id}`);
        container.innerHTML = "";

        selectedValues[id].forEach(value => {
            const tag = document.createElement("div");
            tag.className = "tag";
            tag.innerHTML = `${value} <button onclick="removeTag('${value}', ${id})">✕</button>`;
            container.appendChild(tag);
        });

        document.getElementById(`pro_rider_level${id}`).value = selectedValues[id].join(',');
    }

    window.removeTag = function (value, id) {
        selectedValues[id] = selectedValues[id].filter(v => v !== value);
        renderTags(id);
        filterOptions(document.getElementById(`searchInput${id}`).value, id);
    }

    window.toggleDropdown = toggleDropdown;
    window.handleInput = handleInput;
    window.handleKeyDown = handleKeyDown;

    document.addEventListener("click", (e) => {
        for (let i = 1; i <= 3; i++) {
            const container = document.getElementById(`dropdownHeader${i}`);
            const list = document.getElementById(`dropdownList${i}`);
            if (!container.contains(e.target)) {
                list.classList.remove("active");
            }
        }
    });

    // Initialize all dropdowns
    renderTags(1);
    renderTags(2);
    renderTags(3);
})();
</script>


    
    @endsection
</div>
