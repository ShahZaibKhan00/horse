@extends('layouts.app') @section('content')
    <style>
        .top_head {
            text-align: center;
        }

        .top_head img {
            max-width: 70px;
            margin-bottom: 10px;
        }

        .border_btm {
            border-bottom: 1px solid #e0e0e0;
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
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .section-title.section-title-one {
            font-size: 18px;
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

        .location-input span {
            position: absolute;
            background: #ced4da;
            width: 39px;
            height: 37px;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 50%;
            transform: translateY(-50%);
            left: 1px;
            font-size: 18px;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px inset;
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
            content: "▼";
            /* you can replace with an icon/font if needed */
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            /* disables click so select remains clickable */
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
                    <form action="{{ route('services') }}" id="mainForm" method="GET" class="service_filter_dropdown">
                        <div class="search-form">
                            <!-- Location Section -->
                            <div class="form-section">
                                <div class="section-title text-uppercase">Location</div>
                                <div class="location-input">
                                    <input type="text" class="form-control ps-5" name="location" value="{{ request('location', '') }}" placeholder="City, State, or Zip" />
                                    <button class="location-clear" onclick="clearLocation()">×</button>
                                    <span><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <!-- Distance Range Section -->
                            <div class="form-section">
                                <div class="section-title text-uppercase">Distance Range</div>
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
                                    <input type="text" class="form-control" name="name" value="{{ request('name', '') }}" placeholder="TYPE NAME HERE" />
                                </div>
                            </div>

                            <div class="form-section">
                                <div class="section-title section-title-one">SEARCH FOR A SERVICE:</div>
                                <div class="section-title">Veterinary & Health</div>
                                <select class="form-control" name="health" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="acupuncture" {{ request('health') == 'acupuncture' ? 'selected' : '' }}>Acupuncture</option>
                                    <option value="anhydrosis_treatment" {{ request('health') == 'anhydrosis_treatment' ? 'selected' : '' }}>Anhydrosis diagnosis & treatment</option>
                                    <option value="blood_transfusion" {{ request('health') == 'blood_transfusion' ? 'selected' : '' }}>Blood transfusion services</option>
                                    <option value="cardiac_telemetry" {{ request('health') == 'cardiac_telemetry' ? 'selected' : '' }}>Cardiac telemetry</option>
                                    <option value="chiropractic_care" {{ request('health') == 'chiropractic_care' ? 'selected' : '' }}>Chiropractic care</option>
                                    <option value="clinical_trials" {{ request('health') == 'clinical_trials' ? 'selected' : '' }}>Clinical trials / research participation</option>
                                    <option value="dentistry" {{ request('health') == 'dentistry' ? 'selected' : '' }}>Dentistry</option>
                                    <option value="dermatology" {{ request('health') == 'dermatology' ? 'selected' : '' }}>Dermatology</option>
                                    <option value="deworming_programs" {{ request('health') == 'deworming_programs' ? 'selected' : '' }}>Deworming programs</option>
                                    <option value="diagnostic_imaging" {{ request('health') == 'diagnostic_imaging' ? 'selected' : '' }}>Diagnostic imaging</option>
                                    <option value="dynamic_endoscopy" {{ request('health') == 'dynamic_endoscopy' ? 'selected' : '' }}>Dynamic endoscopy</option>
                                    <option value="emergency_vet_care" {{ request('health') == 'emergency_vet_care' ? 'selected' : '' }}>Emergency vet care</option>
                                    <option value="endoscopy_gastroscopy" {{ request('health') == 'endoscopy_gastroscopy' ? 'selected' : '' }}>Endoscopy & gastroscopy</option>
                                    <option value="equine_hospice" {{ request('health') == 'equine_hospice' ? 'selected' : '' }}>Equine hospice / end-of-life care</option>
                                    <option value="shock_wave_therapy" {{ request('health') == 'shock_wave_therapy' ? 'selected' : '' }}>Extra-corporeal shock wave therapy</option>
                                    <option value="fracture_repair" {{ request('health') == 'fracture_repair' ? 'selected' : '' }}>Fracture repair surgery</option>
                                    <option value="gait_analysis" {{ request('health') == 'gait_analysis' ? 'selected' : '' }}>Gait analysis and biomechanics</option>
                                    <option value="general_veterinary" {{ request('health') == 'general_veterinary' ? 'selected' : '' }}>General veterinary care</option>
                                    <option value="genetic_testing" {{ request('health') == 'genetic_testing' ? 'selected' : '' }}>Genetic testing & disease screening</option>
                                    <option value="hyperbaric_oxygen" {{ request('health') == 'hyperbaric_oxygen' ? 'selected' : '' }}>Hyperbaric oxygen therapy</option>
                                    <option value="iv_fluid_therapy" {{ request('health') == 'iv_fluid_therapy' ? 'selected' : '' }}>IV fluid therapy for hydration/illness</option>
                                    <option value="interspinous_desmotomy" {{ request('health') == 'interspinous_desmotomy' ? 'selected' : '' }}>Inter-spinous ligament desmotomy</option>
                                    <option value="internal_medicine" {{ request('health') == 'internal_medicine' ? 'selected' : '' }}>Internal medicine specialty consults</option>
                                    <option value="joint_fusion" {{ request('health') == 'joint_fusion' ? 'selected' : '' }}>Joint fusion</option>
                                    <option value="joint_lavage" {{ request('health') == 'joint_lavage' ? 'selected' : '' }}>Joint lavage</option>
                                    <option value="lameness_evaluation" {{ request('health') == 'lameness_evaluation' ? 'selected' : '' }}>Lameness evaluation and treatment</option>
                                    <option value="lung_function_testing" {{ request('health') == 'lung_function_testing' ? 'selected' : '' }}>Lung function testing</option>
                                    <option value="mesotherapy" {{ request('health') == 'mesotherapy' ? 'selected' : '' }}>Mesotherapy</option>
                                    <option value="neurectomy" {{ request('health') == 'neurectomy' ? 'selected' : '' }}>Neurectomy</option>
                                    <option value="neurological_evaluation" {{ request('health') == 'neurological_evaluation' ? 'selected' : '' }}>Neurological evaluation</option>
                                    <option value="nuclear_medicine" {{ request('health') == 'nuclear_medicine' ? 'selected' : '' }}>Nuclear medicine</option>
                                    <option value="oncology" {{ request('health') == 'oncology' ? 'selected' : '' }}>Oncology</option>
                                    <option value="prp_irap_stem_cell" {{ request('health') == 'prp_irap_stem_cell' ? 'selected' : '' }}>PRP / IRAP / stem cell therapies</option>
                                    <option value="podiatry" {{ request('health') == 'podiatry' ? 'selected' : '' }}>Podiatry (advanced hoof care)</option>
                                    <option value="post_surgical_rehab" {{ request('health') == 'post_surgical_rehab' ? 'selected' : '' }}>Post-surgical rehab programs</option>
                                    <option value="radiology_mri" {{ request('health') == 'radiology_mri' ? 'selected' : '' }}>Radiology/CT/MRI/High-field MRI</option>
                                    <option value="reproductive_services" {{ request('health') == 'reproductive_services' ? 'selected' : '' }}>Reproductive services</option>
                                    <option value="respiratory_evaluations" {{ request('health') == 'respiratory_evaluations' ? 'selected' : '' }}>Respiratory evaluations and sinus surgery</option>
                                    <option value="telemetric_diagnostics" {{ request('health') == 'telemetric_diagnostics' ? 'selected' : '' }}>Telemetric diagnostics</option>
                                    <option value="vaccination_programs" {{ request('health') == 'vaccination_programs' ? 'selected' : '' }}>Vaccination programs</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Alternative & Holistic</div>
                                <select class="form-control" name="holistic" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="aromatherapy" {{ request('holistic') == 'aromatherapy' ? 'selected' : '' }}>Aromatherapy</option>
                                    <option value="bioresonance_therapy" {{ request('holistic') == 'bioresonance_therapy' ? 'selected' : '' }}>Bioresonance therapy</option>
                                    <option value="herbal_homeopathic" {{ request('holistic') == 'herbal_homeopathic' ? 'selected' : '' }}>Herbal/homeopathic therapies</option>
                                    <option value="magnet_therapy" {{ request('holistic') == 'magnet_therapy' ? 'selected' : '' }}>Magnet therapy</option>
                                    <option value="pemf" {{ request('holistic') == 'pemf' ? 'selected' : '' }}>PEMF</option>
                                    <option value="red_light_laser" {{ request('holistic') == 'red_light_laser' ? 'selected' : '' }}>Red light/laser therapy</option>
                                    <option value="sound_vibration" {{ request('holistic') == 'sound_vibration' ? 'selected' : '' }}>Sound/vibration therapy</option>
                                    <option value="thermography" {{ request('holistic') == 'thermography' ? 'selected' : '' }}>Thermography</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Breeding & Foaling</div>
                                <select class="form-control" name="breeding" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="artificial_insemination" {{ request('breeding') == 'artificial_insemination' ? 'selected' : '' }}>Artificial insemination</option>
                                    <option value="breeding_soundness" {{ request('breeding') == 'breeding_soundness' ? 'selected' : '' }}>Breeding soundness exams</option>
                                    <option value="foal_handling" {{ request('breeding') == 'foal_handling' ? 'selected' : '' }}>Foal handling/imprinting</option>
                                    <option value="foaling_assistance" {{ request('breeding') == 'foaling_assistance' ? 'selected' : '' }}>Foaling assistance</option>
                                    <option value="mare_management" {{ request('breeding') == 'mare_management' ? 'selected' : '' }}>Mare management</option>
                                    <option value="stallion_services" {{ request('breeding') == 'stallion_services' ? 'selected' : '' }}>Stallion services (stud)</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Sales, Leasing & Auction</div>
                                <select class="form-control" name="leasing" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="auction_online" {{ request('leasing') == 'auction_online' ? 'selected' : '' }}>Auction - On-line</option>
                                    <option value="auction_live" {{ request('leasing') == 'auction_live' ? 'selected' : '' }}>Auction - Live</option>
                                    <option value="consignment_sales" {{ request('leasing') == 'consignment_sales' ? 'selected' : '' }}>Consignment sales</option>
                                    <option value="horse_leasing_services" {{ request('leasing') == 'horse_leasing_services' ? 'selected' : '' }}>Horse leasing services</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Transport & Travel</div>
                                <select class="form-control" name="transport" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="emergency_evacuation" {{ request('transport') == 'emergency_evacuation' ? 'selected' : '' }}>Emergency evacuation (natural disasters)</option>
                                    <option value="gate_training" {{ request('transport') == 'gate_training' ? 'selected' : '' }}>Gate training</option>
                                    <option value="hauling_services" {{ request('transport') == 'hauling_services' ? 'selected' : '' }}>Hauling services</option>
                                    <option value="horse_international_shipping" {{ request('transport') == 'horse_international_shipping' ? 'selected' : '' }}>Horse international shipping</option>
                                    <option value="horse_local_transport" {{ request('transport') == 'horse_local_transport' ? 'selected' : '' }}>Horse local transport</option>
                                    <option value="travel_management_show_horses" {{ request('transport') == 'travel_management_show_horses' ? 'selected' : '' }}>Travel management for show horses
                                    </option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Grooming & Presentation</div>
                                <select class="form-control" name="grooming" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="bathing" {{ request('grooming') == 'bathing' ? 'selected' : '' }}>Bathing</option>
                                    <option value="body_clipping" {{ request('grooming') == 'body_clipping' ? 'selected' : '' }}>Body clipping</option>
                                    <option value="braiding" {{ request('grooming') == 'braiding' ? 'selected' : '' }}>Braiding</option>
                                    <option value="grooming_services" {{ request('grooming') == 'grooming_services' ? 'selected' : '' }}>Grooming services</option>
                                    <option value="mane_tail_care" {{ request('grooming') == 'mane_tail_care' ? 'selected' : '' }}>Mane & tail care</option>
                                    <option value="show_prep" {{ request('grooming') == 'show_prep' ? 'selected' : '' }}>Show prep</option>
                                    <option value="tack_cleaning" {{ request('grooming') == 'tack_cleaning' ? 'selected' : '' }}>Tack cleaning</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Recreational & Community</div>
                                <select class="form-control" name="recreational" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="4h_ffa_support" {{ request('recreational') == '4h_ffa_support' ? 'selected' : '' }}>4-H/FFA horse program support</option>
                                    <option value="horsemanship_camps" {{ request('recreational') == 'horsemanship_camps' ? 'selected' : '' }}>Horsemanship camps</option>
                                    <option value="junior_mounted_patrol" {{ request('recreational') == 'junior_mounted_patrol' ? 'selected' : '' }}>Junior mounted patrol units</option>
                                    <option value="pony_parties" {{ request('recreational') == 'pony_parties' ? 'selected' : '' }}>Pony parties</option>
                                    <option value="school_visits" {{ request('recreational') == 'school_visits' ? 'selected' : '' }}>School visits or public education</option>
                                    <option value="therapy_programs" {{ request('recreational') == 'therapy_programs' ? 'selected' : '' }}>Therapy programs</option>
                                    <option value="vocational_therapies" {{ request('recreational') == 'vocational_therapies' ? 'selected' : '' }}>Vocational therapies</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Performance, Training & Riding</div>
                                <select class="form-control" name="performance" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="behavior_correction" {{ request('performance') == 'behavior_correction' ? 'selected' : '' }}>Behavior correction</option>
                                    <option value="colt_starting" {{ request('performance') == 'colt_starting' ? 'selected' : '' }}>Colt starting / breaking</option>
                                    <option value="desensitization_training" {{ request('performance') == 'desensitization_training' ? 'selected' : '' }}>Desensitization training</option>
                                    <option value="eventing_preparation" {{ request('performance') == 'eventing_preparation' ? 'selected' : '' }}>Eventing preparation</option>
                                    <option value="foal_training" {{ request('performance') == 'foal_training' ? 'selected' : '' }}>Foal training</option>
                                    <option value="groundwork_horsemanship" {{ request('performance') == 'groundwork_horsemanship' ? 'selected' : '' }}>Groundwork and horsemanship</option>
                                    <option value="horse_conditioning" {{ request('performance') == 'horse_conditioning' ? 'selected' : '' }}>Horse conditioning & fitness</option>
                                    <option value="horse_training" {{ request('performance') == 'horse_training' ? 'selected' : '' }}>Horse training</option>
                                    <option value="horse_sales" {{ request('performance') == 'horse_sales' ? 'selected' : '' }}>Horse Sales</option>
                                    <option value="jockey_services" {{ request('performance') == 'jockey_services' ? 'selected' : '' }}>Jockey services</option>
                                    <option value="jumping_training" {{ request('performance') == 'jumping_training' ? 'selected' : '' }}>Jumping training</option>
                                    <option value="liberty_training" {{ request('performance') == 'liberty_training' ? 'selected' : '' }}>Liberty training</option>
                                    <option value="mounted_archery" {{ request('performance') == 'mounted_archery' ? 'selected' : '' }}>Mounted archery or games training</option>
                                    <option value="problem_horse_retraining" {{ request('performance') == 'problem_horse_retraining' ? 'selected' : '' }}>Problem horse retraining</option>
                                    <option value="racehorse_conditioning" {{ request('performance') == 'racehorse_conditioning' ? 'selected' : '' }}>Racehorse conditioning & prep</option>
                                    <option value="rider_coaching" {{ request('performance') == 'rider_coaching' ? 'selected' : '' }}>Rider coaching</option>
                                    <option value="riding_lessons" {{ request('performance') == 'riding_lessons' ? 'selected' : '' }}>Riding lessons</option>
                                    <option value="show_coaching" {{ request('performance') == 'show_coaching' ? 'selected' : '' }}>Show coaching</option>
                                    <option value="therapeutic_riding_instruction" {{ request('performance') == 'therapeutic_riding_instruction' ? 'selected' : '' }}>Therapeutic riding instruction
                                    </option>
                                    <option value="virtual_training" {{ request('performance') == 'virtual_training' ? 'selected' : '' }}>Virtual training/coaching</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Barn, Facility & Property</div>
                                <select class="form-control" name="property" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="arena_construction" {{ request('property') == 'arena_construction' ? 'selected' : '' }}>Arena construction & maintenance</option>
                                    <option value="arena_footing" {{ request('property') == 'arena_footing' ? 'selected' : '' }}>Arena footing consulting</option>
                                    <option value="barn_cleaning" {{ request('property') == 'barn_cleaning' ? 'selected' : '' }}>Barn cleaning & mucking</option>
                                    <option value="fence_installation" {{ request('property') == 'fence_installation' ? 'selected' : '' }}>Fence installation & repair</option>
                                    <option value="pasture_management" {{ request('property') == 'pasture_management' ? 'selected' : '' }}>Pasture management</option>
                                    <option value="portable_stall_setup" {{ request('property') == 'portable_stall_setup' ? 'selected' : '' }}>Portable stall setup for events</option>
                                    <option value="stall_rental" {{ request('property') == 'stall_rental' ? 'selected' : '' }}>Stall rental</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Boarding & Stabling</div>
                                <select class="form-control" name="boarding" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="coop_boarding" {{ request('boarding') == 'coop_boarding' ? 'selected' : '' }}>Co-op boarding</option>
                                    <option value="full_care_boarding" {{ request('boarding') == 'full_care_boarding' ? 'selected' : '' }}>Full-care boarding</option>
                                    <option value="layup_rehab_boarding" {{ request('boarding') == 'layup_rehab_boarding' ? 'selected' : '' }}>Layup and rehab boarding</option>
                                    <option value="pasture_boarding" {{ request('boarding') == 'pasture_boarding' ? 'selected' : '' }}>Pasture boarding</option>
                                    <option value="retirement_boarding" {{ request('boarding') == 'retirement_boarding' ? 'selected' : '' }}>Retirement boarding</option>
                                    <option value="self_care_boarding" {{ request('boarding') == 'self_care_boarding' ? 'selected' : '' }}>Self-care boarding</option>
                                    <option value="temporary_event_stabling" {{ request('boarding') == 'temporary_event_stabling' ? 'selected' : '' }}>Temporary event stabling</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Farrier & Hoof</div>
                                <select class="form-control" name="farrier" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="applied_equine_podiatry" {{ request('farrier') == 'applied_equine_podiatry' ? 'selected' : '' }}>Applied equine podiatry</option>
                                    <option value="corrective_therapeutic_shoeing" {{ request('farrier') == 'corrective_therapeutic_shoeing' ? 'selected' : '' }}>Corrective/therapeutic shoeing</option>
                                    <option value="glue_on_shoes" {{ request('farrier') == 'glue_on_shoes' ? 'selected' : '' }}>Glue-on shoe application</option>
                                    <option value="hoof_casting" {{ request('farrier') == 'hoof_casting' ? 'selected' : '' }}>Hoof casting for injuries</option>
                                    <option value="hoof_reconstruction" {{ request('farrier') == 'hoof_reconstruction' ? 'selected' : '' }}>Hoof reconstruction/resin fill</option>
                                    <option value="hoof_resections" {{ request('farrier') == 'hoof_resections' ? 'selected' : '' }}>Hoof resections</option>
                                    <option value="integrated_podiatry" {{ request('farrier') == 'integrated_podiatry' ? 'selected' : '' }}>Integrated podiatry</option>
                                    <option value="natural_hoof_care" {{ request('farrier') == 'natural_hoof_care' ? 'selected' : '' }}>Natural hoof care</option>
                                    <option value="performance_shoeing" {{ request('farrier') == 'performance_shoeing' ? 'selected' : '' }}>Performance shoeing</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Professional, Educational & Consulting</div>
                                <select class="form-control" name="consulting" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="business_planning" {{ request('consulting') == 'business_planning' ? 'selected' : '' }}>Business planning (equine-specific)</option>
                                    <option value="continuing_education" {{ request('consulting') == 'continuing_education' ? 'selected' : '' }}>Continuing education for equine pros</option>
                                    <option value="equine_appraisals" {{ request('consulting') == 'equine_appraisals' ? 'selected' : '' }}>Equine appraisals</option>
                                    <option value="equine_behavior_consulting" {{ request('consulting') == 'equine_behavior_consulting' ? 'selected' : '' }}>Equine behavior consulting</option>
                                    <option value="equine_branding_marketing" {{ request('consulting') == 'equine_branding_marketing' ? 'selected' : '' }}>Equine branding & marketing services</option>
                                    <option value="equine_insurance_brokerage" {{ request('consulting') == 'equine_insurance_brokerage' ? 'selected' : '' }}>Equine insurance brokerage</option>
                                    <option value="equine_assisted_therapy" {{ request('consulting') == 'equine_assisted_therapy' ? 'selected' : '' }}>Equine-assisted therapy</option>
                                    <option value="farm_ranch_bookkeeping" {{ request('consulting') == 'farm_ranch_bookkeeping' ? 'selected' : '' }}>Farm & ranch bookkeeping</option>
                                    <option value="grant_writing" {{ request('consulting') == 'grant_writing' ? 'selected' : '' }}>Grant writing</option>
                                    <option value="horse_ownership_consulting" {{ request('consulting') == 'horse_ownership_consulting' ? 'selected' : '' }}>Horse ownership consulting</option>
                                    <option value="legal_consulting" {{ request('consulting') == 'legal_consulting' ? 'selected' : '' }}>Legal consulting</option>
                                    <option value="nutritional_consulting" {{ request('consulting') == 'nutritional_consulting' ? 'selected' : '' }}>Nutritional consulting</option>
                                    <option value="public_relations" {{ request('consulting') == 'public_relations' ? 'selected' : '' }}>Public relations for equestrian athletes/facilities</option>
                                    <option value="risk_management" {{ request('consulting') == 'risk_management' ? 'selected' : '' }}>Risk management assessment</option>
                                    <option value="tech_software_training" {{ request('consulting') == 'tech_software_training' ? 'selected' : '' }}>Tech & software training for equine businesses
                                    </option>
                                    <option value="trademark_copyright" {{ request('consulting') == 'trademark_copyright' ? 'selected' : '' }}>Trademark and copyright help</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Retail, Feed & Mobile</div>
                                <select class="form-control" name="retail" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="bit_fitting" {{ request('retail') == 'bit_fitting' ? 'selected' : '' }}>Bit fitting services</option>
                                    <option value="blanket_washing_repair" {{ request('retail') == 'blanket_washing_repair' ? 'selected' : '' }}>Blanket washing and repair</option>
                                    <option value="custom_leatherwork" {{ request('retail') == 'custom_leatherwork' ? 'selected' : '' }}>Custom leatherwork or repairs</option>
                                    <option value="customized_feeding_plans" {{ request('retail') == 'customized_feeding_plans' ? 'selected' : '' }}>Customized feeding plans and consulting</option>
                                    <option value="equestrian_subscription_boxes" {{ request('retail') == 'equestrian_subscription_boxes' ? 'selected' : '' }}>Equestrian subscription boxes</option>
                                    <option value="mobile_feed_delivery" {{ request('retail') == 'mobile_feed_delivery' ? 'selected' : '' }}>Mobile feed delivery / subscription boxes</option>
                                    <option value="mobile_saddle_tack" {{ request('retail') == 'mobile_saddle_tack' ? 'selected' : '' }}>Mobile saddle and tack shops</option>
                                    <option value="mobile_veterinary_pharmacy" {{ request('retail') == 'mobile_veterinary_pharmacy' ? 'selected' : '' }}>Mobile veterinary pharmacy delivery</option>
                                    <option value="organic_feed_supplement" {{ request('retail') == 'organic_feed_supplement' ? 'selected' : '' }}>Organic feed/supplement production</option>
                                    <option value="saddle_fitting_consulting" {{ request('retail') == 'saddle_fitting_consulting' ? 'selected' : '' }}>Saddle fitting consulting</option>
                                    <option value="specialized_horse_feed" {{ request('retail') == 'specialized_horse_feed' ? 'selected' : '' }}>Specialized horse feed manufacturing</option>
                                </select>
                            </div>
                            <div class="form-section">
                                <div class="section-title">Media, Events & Promotion</div>
                                <select class="form-control" name="promotion" id="">
                                    <option disabled selected>Select a service</option>
                                    <option value="equine_photography_videography" {{ request('promotion') == 'equine_photography_videography' ? 'selected' : '' }}>Equine photography & videography
                                    </option>
                                    <option value="horse_show_announcing" {{ request('promotion') == 'horse_show_announcing' ? 'selected' : '' }}>Horse show announcing & judging</option>
                                    <option value="horse_show_entry_management" {{ request('promotion') == 'horse_show_entry_management' ? 'selected' : '' }}>Horse show entry management</option>
                                    <option value="horse_show_management" {{ request('promotion') == 'horse_show_management' ? 'selected' : '' }}>Horse show management</option>
                                    <option value="live_streaming" {{ request('promotion') == 'live_streaming' ? 'selected' : '' }}>Live streaming / online show coverage</option>
                                    <option value="marketing_horses_farms" {{ request('promotion') == 'marketing_horses_farms' ? 'selected' : '' }}>Marketing for horses or farms</option>
                                    <option value="prize_procurement" {{ request('promotion') == 'prize_procurement' ? 'selected' : '' }}>Prize procurement and sponsor outreach</option>
                                    <option value="sales_video_editing" {{ request('promotion') == 'sales_video_editing' ? 'selected' : '' }}>Sales video editing</option>
                                    <option value="show_steward" {{ request('promotion') == 'show_steward' ? 'selected' : '' }}>Show steward or technical delegate</option>
                                    <option value="stabling_grounds_crew" {{ request('promotion') == 'stabling_grounds_crew' ? 'selected' : '' }}>Stabling and grounds crew</option>
                                    <option value="stallion_promotion" {{ request('promotion') == 'stallion_promotion' ? 'selected' : '' }}>Stallion promotion and stud marketing</option>
                                </select>
                            </div>

                            <div class="action-buttons border_btm">
                                <button type="submit" class="choose-btn">
                                    <span class="btn-icon">🔍</span>
                                    SEARCH
                                </button>
                            </div>
                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <button type="submit" class="choose-btn">
                                    <span class="btn-icon">💾</span>
                                    SAVE THIS SEARCH
                                </button>
                                <button class="choose-btn" onclick="resetSearch()">
                                    <span class="btn-icon">🔄</span>
                                    RESET
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="filter_content_box equestrian_service_sec ">
                    <div class="shortcuts_tags_flex" id="shortcutsContainer">

                    </div>

                    <div class="row gy-4">
                        @forelse ($services as $service)
                            <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
                                <div class="product_clm">
                                    <div class="product_clm_img_box">
                                        <img src="{{ asset('service-profile/' . $service->ser_profile) }}" class="pro_img border-0 mb-0" width="" height="" alt="" />
                                        <div class="product_clm_img_hover_box">
                                            <a href="javascript:;" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                            <a href="javascript:;" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                            <a href="javascript:;" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                        </div>
                                    </div>
                                    <h5 class="heading22px primeColor">{{ $service->business_name }}</h5>
                                    <p>{{ $service->number }}</p>
                                    <a href="{{ $service->website_url }}" target="_blank" class="webLink">{{ $service->website_url }}</a>
                                    <div class="btn_set mt-3">
                                        <a href="{{ url('service_details/' . Crypt::encrypt($service->id)) }}" class="horse_card_btn">View Detail</a>
                                        <label class="fvrt_btn">
                                            <input type="checkbox" hidden />
                                            Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
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
        document.querySelector(".skill_select").addEventListener("change", function(e) {
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
