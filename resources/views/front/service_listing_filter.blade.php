@extends('layouts.app') @section('content')
<style>
    .top_head {
        text-align: center;
    }
    .top_head img {
        max-width: 70px;
        margin-bottom: 10px;
    }
    .membershipBanner {
        padding: 0px 20px;
    }
    .membershipBanner .heading_main {
        font-family: "AvenirNextLTPro-Bold";
        font-size: 80px;
        margin: 0;
        background: var(--Linear, linear-gradient(0deg, #b09240 35.48%, #faf8f4 68.55%));
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 300;
    }
    .filter_sec {
        padding: 20px 10px;
    }
    .filter_row {
        display: flex;
    }
    .filter_side_bar {
        width: 350px;
        background-color: #1d2139;
    }
    .filter_content_box {
        width: calc(100% - 350px);
        padding-left: 20px;
    }
    .filter_side_bar {
        padding: 20px;
    }
    .filter_side_bar .heading44px {
        font-family: "AvenirLTStd-Book";
        font-size: 30px;
        margin: 0;
        background: var(--Linear, linear-gradient(0deg, #b09240 35.48%, #faf8f4 68.55%));
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .search-form {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .form-section {
        border-bottom: 1px solid #e0e0e0;
        padding: 15px 20px;
    }

    .form-section:last-child {
        border-bottom: none;
    }

    .section-title {
        font-size: 15px;
        font-weight: 600;
        color: #1d2139;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
    }

    .location-input {
        position: relative;
    }

    .location-input input {
        width: 100%;
        padding: 8px 30px 8px 10px;
        border: 1px solid #1d2139;
        border-radius: 0;
        font-size: 14px;
        outline: none;
        transition: border-color 0.3s;
    }

    .location-input input:focus {
        border-color: #1d2139;
    }

    .location-clear {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        font-size: 16px;
        color: #999;
        cursor: pointer;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .distance-controls {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
    }

    .distance-input {
        padding: 6px 8px;
        border: 1px solid #1d2139;
        border-radius: 0;
        font-size: 14px;
        text-align: center;
        width: 100%;
    }

    .unit-label {
        font-size: 12px;
        color: #666;
        font-weight: 500;
    }

    .checkbox-grid {
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 8px 15px;
        align-items: center;
        margin-top: 8px;
    }

    .checkbox-header {
        font-size: 11px;
        color: #666;
        font-weight: 600;
        text-align: center;
    }

    .checkbox-row {
        display: contents;
    }

    .checkbox-label {
        font-size: 12px;
        color: #333;
    }

    .checkbox-item {
        display: flex;
        justify-content: center;
    }

    .checkbox-item input[type="checkbox"] {
        width: 14px;
        height: 14px;
        accent-color: #007bff;
    }
    .form-select:focus,
    .form-control:focus {
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgb(250 233 207);
    }

    .select-field {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #1d2139;
        border-radius: 0;
        font-size: 14px;
        background: #fff;
        outline: none;
        transition: border-color 0.3s;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 23px inset;
    }

    .select-field:focus {
        border-color: #007bff;
    }

    .skills-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        margin-bottom: 8px;
    }

    .skill-tag {
        background: #c0995754;
        color: #000000;
        padding: 4px 11px;
        border-radius: 12px;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 4px;
        background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
    }

    .skill-tag .remove {
        background: none;
        border: none;
        color: #1d2139;
        cursor: pointer;
        font-size: 12px;
        padding: 0;
        width: 14px;
        height: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .range-inputs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 8px;
    }

    .range-input {
        padding: 6px 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        text-align: center;
    }

    .range-separator {
        font-size: 12px;
        color: #666;
    }

    .age-options {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 8px;
    }

    .age-option {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .age-option input[type="checkbox"] {
        width: 14px;
        height: 14px;
        accent-color: #007bff;
    }

    .age-option label {
        font-size: 12px;
        color: #333;
    }

    .price-inputs {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 8px;
    }

    .price-symbol {
        font-size: 16px;
        color: #333;
        font-weight: 500;
    }

    .action-buttons {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .btn {
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary {
        background: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background: #0056b3;
    }

    .btn-secondary {
        background: #f8f9fa;
        color: #6c757d;
        border: 1px solid #dee2e6;
    }

    .btn-secondary:hover {
        background: #e9ecef;
    }

    .btn-icon {
        font-size: 12px;
    }
    .form-check-input:checked {
        background-color: #b39648;
        border-color: #b39648;
    }
    .form-check-input[type="radio"] {
        border-radius: 5px;
    }
    .form-check-input {
        width: 15px;
        height: 15px;
        margin-top: 1px;
    }
    .shortcuts_tags_flex {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }
    .shortcuts_tags_item {
        width: fit-content;
        height: 50px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border: 2px solid #1c2038;
        cursor: pointer;
    }
    .shortcuts_tags_item p {
        margin: 0;
    }
    .shortcuts_tags_item i {
        font-size: 18px;
    }
    .choose-btn {
        font-size: 15px;
        font-family: "AvenirNextLTPro-Bold";
        padding: 10px 35px;
        background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
        width: 100%;
        text-transform: uppercase;
        border-radius: 0;
        z-index: 999;
        border: none;
        color: #1d2139;
        letter-spacing: 0.5px;
        cursor: pointer;
        border: 1px solid #1d2139;
        text-transform: capitalize;
        transition: background 0.4s ease, box-shadow 0.4s ease, transform 0.3s ease, color 0.3s ease;
    }
    .countdown {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: center;
    }

    .circle-container {
        position: relative;
        width: 68px;
        height: 68px;
    }

    .progress-ring {
        transform: rotate(-90deg);
    }

    .progress-ring circle {
        fill: none;
        stroke-width: 4;
    }

    .bg {
        stroke: #31302e;
    }

    .progress {
        stroke: #fff;
        stroke-linecap: round;
        transition: stroke-dashoffset 0.35s;
    }

    .circle-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
    }

    .circle-text span {
        font-size: 14px;
        font-weight: bold;
    }

    .circle-text small {
        font-size: 9px;
        display: block;
    }
    .info_list li {
        border: 2px solid #1d2139;
        padding: 5px;
        text-align: center;
        font-size: 11px;
    }

    .horse_list_card .img_box {
        height: 250px;
    }
    .blue_stripe h2 {
        font-size: 30px;
    }

    .reset_btn {
        max-width: 200px;
        font-size: 11px;
        padding: 10px;
    }
    .filter_right_flex {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .filter_right_flex select {
        padding: 10px;
        background: linear-gradient(90deg, rgba(191, 152, 85, 1) 0%, rgba(250, 233, 207, 1) 73%);
        outline: 0;
        font-size: 11px;
        font-family: "AvenirNextLTPro-Bold";
    }
    .filter_right_flex p {
        margin: 0;
        font-size: 11px;
        font-family: "AvenirNextLTPro-Bold";
    }
    .filter_min_bars {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .select-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    .select-wrapper::after {
        content: "▼"; /* you can replace with an icon/font if needed */
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none; /* disables click so select remains clickable */
        font-size: 12px;
        color: #1d2139;
    }
    .map_box {
        padding: 10px;
        border: 2px solid #000;
        height: 100%;
        height: 50%;
    }
    iframe {
        height: 100%;
    }
    

    @media only screen and (max-width: 1799px) {
        .filter_sec {
            padding: 10px 0px;
        }
        .filter_side_bar {
            width: 300px;
        }
        .filter_content_box {
            width: calc(100% - 300px);
            padding: 0px 10px;
        }
        .shortcuts_tags_item {
            height: 35px;
            padding: 10px;
            font-size: 11px;
        }
        .filter_side_bar {
            padding: 10px;
        }
        .form-section {
            padding: 12px 10px;
        }
        .checkbox-label {
            font-size: 10px;
        }
        .choose-btn {
            font-size: 13px;
            padding: 10px 7px;
        }
    }
</style>
<section class="inner_page_banner membershipBanner">
    <div class="container text-center">
        <h1 class="heading_main">SERVICES</h1>
    </div>
</section>

<section class="filter_sec">
    <div class="container-fluid">
        <div class="filter_row">
            <div class="filter_side_bar">
                <div class="top_head">
                    <img src="assets/images/heading_logo.png" alt="img" class="img-fluid">
                    <h3 class="heading44px mb-4 text-center">SEARCH & FILTER ADS</h3>
                </div>
                <form class="search-form" id="mainForm">
                    <!-- Location Section -->
                    <div class="form-section">
                        <div class="section-title">Location</div>
                        <div class="location-input">
                            <input type="text" class="form-control" placeholder="City, State, or Zip" />
                            <button class="location-clear" onclick="clearLocation()">×</button>
                        </div>
                    </div>

                    <!-- Distance Range Section -->
                    <div class="form-section">
                        <div class="section-title">Distance Range</div>
                        <div class="distance-controls">
                            <input type="number" class="distance-input form-control" placeholder="MIN" />
                            <input type="number" class="distance-input form-control" placeholder="MAX" />
                        </div>
                        <div class="unit-label mt-3">
                            <div class="checkbox-item justify-content-start gap-3">
                                <label><input type="radio" class="form-check-input" name="hr_miles" /> Hours</label>
                                <label><input type="radio" class="form-check-input" name="hr_miles" /> Miles</label>
                            </div>
                        </div>
                    </div>




                    <div class="form-section">
                        <div class="section-title">FIRST NAME, LAST NAME OR COMPANY NAME</div>
                        <div class="location-input">
                            <input type="text" class="form-control" placeholder="TYPE NAME HERE" />
                        </div>
                    </div>


                    <!-- Breed Section -->
                    <div class="form-section">
                        <div class="section-title">Service</div>
                        <div class="select-wrapper">
                            <select class="select-field form-select">
                                <option>See All</option>                             
                                <option>Service 1</option>                             
                                <option>Service 2</option>                             
                                <option>Service 3</option>                             
                                <option>Service 4</option>                             
                                <option>Service 5</option>                             
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <button class="choose-btn" onclick="saveSearch()">
                            <span class="btn-icon">💾</span>
                            SAVE THIS SEARCH
                        </button>
                        <button class="choose-btn" onclick="resetSearch()">
                            <span class="btn-icon">🔄</span>
                            RESET SEARCH CRITERIA
                        </button>
                    </div>
                </form>
            </div>

            <div class="filter_content_box">
                <div class="shortcuts_tags_flex" id="shortcutsContainer">

                    </div>

                <!--<div class="filter_min_bars">
                    <button class="reset_btn choose-btn"><i class="fa fa-refresh" aria-hidden="true"></i> RESET SEARCH CRITERIA</button>

                    <div class="filter_right_flex">
                        <p>1-24 of 494 Listing</p>
                        <select>
                            <option value="">1-34</option>
                            <option value="">1-44</option>
                            <option value="">1-54</option>
                        </select>

                        <select>
                            <option value="">Price (High to Low)</option>
                            <option value="">Price (Low to High)</option>
                            <option value="">Price (High)</option>
                            <option value="">Price (Low)</option>
                        </select>
                    </div>
                </div>-->
                <div class="map_box">
                    <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31513238.245366327!2d-124.78440774999999!3d37.09024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDA1JzI0LjkiTiA5NcKwNDcnNTIuNCJX!5e0!3m2!1sen!2sus!4v1722267333995!5m2!1sen!2sus" 
                    width="100%" 
                    height="95%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                    <p>39 results</p> 
                    <p>Page 1 of 2</p> 
                </div>
                
            </div>
            

                
                   
                
            </div>
        </div>
    </div>
</section>
<script>
    function clearLocation() {
        document.querySelector(".location-input input").value = "";
    }

    function removeSkill(button) {
        button.parentElement.remove();
    }

    function saveSearch() {
        alert("Search criteria saved!");
    }

    function resetSearch() {
        // Reset all form fields
        document.querySelectorAll("input").forEach((input) => {
            if (input.type === "checkbox") {
                input.checked = false;
            } else {
                input.value = "";
            }
        });

        document.querySelectorAll("select").forEach((select) => {
            select.selectedIndex = 0;
        });

        alert("Search criteria reset!");
    }

    // Add some interactivity for the skills dropdown
    document.querySelector(".skill_select").addEventListener("change", function (e) {
        if (e.target.value && e.target.selectedIndex > 0) {
            const skillsContainer = document.querySelector(".skills-tags");
            const newSkill = document.createElement("div");
            newSkill.className = "skill-tag";
            newSkill.innerHTML = `
                    ${e.target.value}
                    <button class="remove" onclick="removeSkill(this)">×</button>
                `;
            skillsContainer.appendChild(newSkill);
            e.target.selectedIndex = 0;
        }
    });
</script>


    <script>
        const tagsContainer = document.querySelector(".shortcuts_tags_flex");
        const form = document.getElementById("mainForm");

        // Function to create a tag (only value)
        function createTag(value, sourceElement) {
            value = value.trim();
            if (!value) return;

            // Avoid duplicate tags
            if ([...tagsContainer.children].some(tag => tag.dataset.value === value)) return;

            const tag = document.createElement("div");
            tag.classList.add("shortcuts_tags_item");
            tag.dataset.value = value;
            tag.innerHTML = `
      <p>${value}</p>
      <a href="#!" class="remove-tag">
        <i class="fa fa-times-circle" aria-hidden="true"></i>
      </a>
    `;
            tagsContainer.appendChild(tag);

            // Remove tag on click
            tag.querySelector(".remove-tag").addEventListener("click", () => {
                tag.remove();

                // Reset matching input/select when tag removed
                if (sourceElement.tagName === "SELECT") {
                    if (sourceElement.options[sourceElement.selectedIndex]?.text === value) {
                        sourceElement.selectedIndex = 0;
                    }
                } else {
                    // ✅ Now only clear input value when tag is removed
                    if (sourceElement.value.trim() === value) {
                        sourceElement.value = "";
                    }
                }
            });
        }

        // 🟢 For text inputs → create tag on Enter or blur (but don't clear input)
        form.querySelectorAll("input[type='text'], input[type='number']").forEach(input => {
            input.addEventListener("keydown", e => {
                if (e.key === "Enter") {
                    e.preventDefault();
                    if (input.value.trim()) {
                        createTag(input.value.trim(), input);
                        // ❌ Don't clear input here — leave it as is
                    }
                }
            });

            input.addEventListener("blur", () => {
                // optional: you can remove this if you only want Enter to trigger tags
                if (input.value.trim()) {
                    createTag(input.value.trim(), input);
                    // ❌ Don't clear input here either
                }
            });
        });

        // 🟢 For selects → create tag on change
        form.querySelectorAll("select").forEach(select => {
            select.addEventListener("change", () => {
                const selectedText = select.options[select.selectedIndex].text;
                if (selectedText && selectedText !== "Select") {
                    createTag(selectedText, select);
                    // ✅ Keep the selected option visible
                }
            });
        });
    </script>



@endsection
