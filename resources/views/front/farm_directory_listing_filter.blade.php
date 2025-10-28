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
        width: 500px;
        background-color: #1d2139;
    }
    .filter_content_box {
        width: calc(100% - 500px);
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
    }
    .product_clm .pro_img {
        margin-bottom: 0;
    }
    .product_clm_img_box {
        position: relative;
        margin-bottom: 10px;
        overflow: hidden;
        border: 1px solid #1d2139;
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
        <h1 class="heading_main">FARM DIRECTORY</h1>
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
                <div class="search-form">
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

                    <!-- Breed Section -->
                    <div class="form-section">
                        <div class="section-title">SPECIALIZED Breed</div>
                        <div class="skills-tags" id="breed-tags">
                        <!-- Selected breeds will appear here -->
                    </div>
                        <div class="select-wrapper">
                            <select class="select-field form-select breed_select">
                                <option disabled selected>Select Breed</option>
                                <option value="Akhal-Teke">Akhal-Teke</option>
                                <option value="Aegidienberger">Aegidienberger</option>
                                <option value="Alberta Wild Horse">Alberta Wild Horse</option>
                                <option value="Alter Real">Alter Real</option>
                                <option value="Altmark Coldblood">Altmark Coldblood</option>
                                <option value="Altor Real">Altor Real</option>
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
                                <option value="Anglo Arabian">Anglo-Arabian</option>
                                <option value="Appaloosa">Appaloosa</option>
                                <option value="Arabian">Arabian</option>
                                <option value="Arabian Horses">Arabian Cross</option>
                                <option value="Ardennes">Ardennes</option>
                                <option value="Arabian-Berber">Arabian-Berber</option>
                                <option value="Arabian Halfbred">Arabian Halfbred</option>
                                <option value="Arabian Partbred">Arabian Partbred</option>
                                <option value="Araloosa">Araloosa</option>
                                <option value="Arcenberg-Nordkirchen">Arcenberg-Nordkirchen</option>
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
                                <option value="Choctaw Pony">Choctaw Pony</option>
                                <option value="Classic Pony">Classic Pony</option>
                                <option value="Cleveland-Bay">Cleveland-Bay</option>
                                <option value="Clydesdale">Clydesdale</option>
                                <option value="Clydesdale Cross">Clydesdale Cross</option>
                                <option value="Cumberland Island Horse">Cumberland Island Horse</option>
                                <option value="Cob Horse">Cob Horse</option>
                                <option value="Comtois">Comtois</option>
                                <option value="Connemara Pony">Connemara Pony</option>
                                <option value="Criollo Horse">Criollo Horse</option>
                                <option value="Curly Horses">Curly Horses</option>
                                <option value="Dales Pony">Dales Pony</option>
                                <option value="Dartmoor Pony">Dartmoor Pony</option>
                                <option value="Draft Cross">Draft Cross</option>
                                <option value="Dutch Warmblood">Dutch Warmblood</option>
                                <option value="Fell Pony">Fell Pony</option>
                                <option value="Finnhorse">Finnhorse</option>
                                <option value="Friesian">Friesian</option>
                                <option value="Friesian Cross">Friesian Cross</option>
                                <option value="Fjord">Fjord</option>
                                <option value="Fjord Cross">Fjord Cross</option>
                                <option value="Gelderland">Gelderland</option>
                                <option value="Gypsy Vanner">Gypsy Vanner</option>
                                <option value="Gypsy Cross">Gypsy Cross</option>
                                <option value="Hackney">Hackney</option>
                                <option value="Hanoverian">Hanoverian</option>
                                <option value="Haflinger">Haflinger</option>
                                <option value="Holsteiner">Holsteiner</option>
                                <option value="Icelandic Horse">Icelandic Horse</option>
                                <option value="Irish Draught">Irish Draught</option>
                                <option value="Irish Draft Cross">Irish Draft Cross</option>
                                <option value="Kinsky Horse">Kinsky Horse</option>
                                <option value="Knabstrupper">Knabstrupper</option>
                                <option value="Lippizan">Lippizan</option>
                                <option value="Lusitano">Lusitano</option>
                                <option value="Marwari Horse">Marwari Horse</option>
                                <option value="Morgan">Morgan</option>
                                <option value="Morgan Cross">Morgan Cross</option>
                                <option value="Mustang">Mustang</option>
                                <option value="Paso Fino">Paso Fino</option>
                                <option value="Percheron">Percheron</option>
                                <option value="Percheron Cross">Percheron Cross</option>
                                <option value="Pinto">Pinto</option>
                                <option value="Polish Warmblood">Polish Warmblood</option>
                                <option value="Quarter Horse">Quarter Horse</option>
                                <option value="Quarter Horse Cross">Quarter Horse Cross</option>
                                <option value="Rocky Mountain Horse">Rocky Mountain Horse</option>
                                <option value="Shire">Shire</option>
                                <option value="Shire Cross">Shire Cross</option>
                                <option value="Spotted Draft">Spotted Draft</option>
                                <option value="Spotted Draft Cross">Spotted Draft Cross</option>
                                <option value="Tennessee Walking Horse">Tennessee Walking Horse</option>
                                <option value="Thoroughbred">Thoroughbred</option>
                                <option value="Thoroughbred Cross">Thoroughbred Cross</option>
                                <option value="Trakehner">Trakehner</option>
                                <option value="Welsh">Welsh</option>
                                <option value="Welsh Pony">Welsh Pony</option>
                                <option value="Westphalian">Westphalian</option>
                                <option value="Welsh Cross">Welsh Cross</option>
                                <option value="Warmblood">Warmblood</option>
                                <option value="Warmblood Cross">Warmblood Cross</option>
                                <option value="Zweibrücker Horse">Zweibrücker Horse</option>
                            </select>
                        </div>
                    </div>

                    

                    <div class="form-section">
                        <div class="section-title">PERSON OR FARM NAME</div>
                        <div class="location-input">
                            <input type="text" class="form-control" placeholder="TYPE NAME HERE" />
                        </div>
                    </div>




                    <!-- Skills/Disciplines Section -->
                    <div class="form-section">
                        <div class="section-title">Skills/Disciplines</div>
                        <div class="skills-tags" id="skills-tags">
                            <div class="skill-tag">
                                Jumping 3'6"
                                <button class="remove" onclick="removeTag(this)">×</button>
                            </div>
                            <div class="skill-tag">
                                Trail Riding
                                <button class="remove" onclick="removeTag(this)">×</button>
                            </div>
                            <div class="skill-tag">
                                Hunter Horse
                                <button class="remove" onclick="removeTag(this)">×</button>
                            </div>
                        </div>
                        <div class="select-wrapper">
                            <select class="select-field form-select skill_select">
                                <option>Select Skills/Disciplines</option>
                                <option>Dressage</option>
                                <option>Jumping</option>
                                <option>Trail Riding</option>
                                <option>Western Pleasure</option>
                                <option>Barrel Racing</option>
                                <option>Hunter</option>
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
                </div>
            </div>

            <div class="filter_content_box">
                <div class="shortcuts_tags_flex">
                    <div class="shortcuts_tags_item">
                        <p>3 HOURS 07848</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>EXCLUDE AUCTION</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>INCLUDE SOLD</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>GELDING</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>FRIESIAN CROSS</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>WARMBLOOD</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>DRESSAGE</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>TRAIL RIDING</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>LESSON HORSE</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>BEGINNER</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>INTERMEDIATE</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>15 - 17 HH</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                    <div class="shortcuts_tags_item">
                        <p>0 - $15,000</p>
                        <a href="#!"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="filter_min_bars">
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
                </div> 

                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="product_clm">
                            <div class="product_clm_img_box">
                                <img src="assets/images/farm_logo_img.png"
                                    class="pro_img" width="" height="" alt="" />
                                <div class="product_clm_img_hover_box">
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                </div>
                            </div>
                            <h5 class="heading22px primeColor">GRACE RIDGE FARM</h5>
                            <p>(973) 555-555</p>
                            <a href="#!" class="webLink">www.abchorsetransport.com</a>
                            <div class="btn_set mt-3">
                                <a href="#!" class="horse_card_btn">View Detail</a>
                                <label class="fvrt_btn">
                                    <input type="checkbox" hidden />
                                    Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="product_clm">
                            <div class="product_clm_img_box">
                                <img src="assets/images/farm_logo_img.png"
                                    class="pro_img" width="" height="" alt="" />
                                <div class="product_clm_img_hover_box">
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                </div>
                            </div>
                            <h5 class="heading22px primeColor">GRACE RIDGE FARM</h5>
                            <p>(973) 555-555</p>
                            <a href="#!" class="webLink">www.abchorsetransport.com</a>
                            <div class="btn_set mt-3">
                                <a href="#!" class="horse_card_btn">View Detail</a>
                                <label class="fvrt_btn">
                                    <input type="checkbox" hidden />
                                    Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="product_clm">
                            <div class="product_clm_img_box">
                                <img src="assets/images/farm_logo_img.png"
                                    class="pro_img" width="" height="" alt="" />
                                <div class="product_clm_img_hover_box">
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                </div>
                            </div>
                            <h5 class="heading22px primeColor">GRACE RIDGE FARM</h5>
                            <p>(973) 555-555</p>
                            <a href="#!" class="webLink">www.abchorsetransport.com</a>
                            <div class="btn_set mt-3">
                                <a href="#!" class="horse_card_btn">View Detail</a>
                                <label class="fvrt_btn">
                                    <input type="checkbox" hidden />
                                    Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="product_clm">
                            <div class="product_clm_img_box">
                                <img src="assets/images/farm_logo_img.png"
                                    class="pro_img" width="" height="" alt="" />
                                <div class="product_clm_img_hover_box">
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                </div>
                            </div>
                            <h5 class="heading22px primeColor">GRACE RIDGE FARM</h5>
                            <p>(973) 555-555</p>
                            <a href="#!" class="webLink">www.abchorsetransport.com</a>
                            <div class="btn_set mt-3">
                                <a href="#!" class="horse_card_btn">View Detail</a>
                                <label class="fvrt_btn">
                                    <input type="checkbox" hidden />
                                    Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="product_clm">
                            <div class="product_clm_img_box">
                                <img src="assets/images/farm_logo_img.png"
                                    class="pro_img" width="" height="" alt="" />
                                <div class="product_clm_img_hover_box">
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                </div>
                            </div>
                            <h5 class="heading22px primeColor">GRACE RIDGE FARM</h5>
                            <p>(973) 555-555</p>
                            <a href="#!" class="webLink">www.abchorsetransport.com</a>
                            <div class="btn_set mt-3">
                                <a href="#!" class="horse_card_btn">View Detail</a>
                                <label class="fvrt_btn">
                                    <input type="checkbox" hidden />
                                    Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="product_clm">
                            <div class="product_clm_img_box">
                                <img src="assets/images/farm_logo_img.png"
                                    class="pro_img" width="" height="" alt="" />
                                <div class="product_clm_img_hover_box">
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-facebook"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-twitter"></i></a>
                                    <a href="#!" class="product_clm_icon"><i class="fa fa-skype"></i></a>
                                </div>
                            </div>
                            <h5 class="heading22px primeColor">GRACE RIDGE FARM</h5>
                            <p>(973) 555-555</p>
                            <a href="#!" class="webLink">www.abchorsetransport.com</a>
                            <div class="btn_set mt-3">
                                <a href="#!" class="horse_card_btn">View Detail</a>
                                <label class="fvrt_btn">
                                    <input type="checkbox" hidden />
                                    Favorite <i class="fa fa-heart" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
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

        function removeTag(button) {
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

            // Clear breed tags
            document.getElementById("breed-tags").innerHTML = "";

            // Reset skills tags to initial state
            document.getElementById("skills-tags").innerHTML = `
                <div class="skill-tag">
                    Jumping 3'6"
                    <button class="remove" onclick="removeTag(this)">×</button>
                </div>
                <div class="skill-tag">
                    Trail Riding
                    <button class="remove" onclick="removeTag(this)">×</button>
                </div>
                <div class="skill-tag">
                    Hunter Horse
                    <button class="remove" onclick="removeTag(this)">×</button>
                </div>
            `;

            alert("Search criteria reset!");
        }

        // Breed Select Functionality
        function addBreedTag(selectElement) {
            if (selectElement.value && selectElement.selectedIndex > 0) {
                const container = document.getElementById("breed-tags");
                
                // Check if tag already exists
                const existingTags = Array.from(container.children);
                const tagExists = existingTags.some(tag => 
                    tag.textContent.trim().replace('×', '').trim() === selectElement.value
                );
                
                if (!tagExists) {
                    const newTag = document.createElement("div");
                    newTag.className = "skill-tag";
                    newTag.innerHTML = `
                        ${selectElement.value}
                        <button class="remove" onclick="removeTag(this)">×</button>
                    `;
                    container.appendChild(newTag);
                }
                
                selectElement.selectedIndex = 0;
            }
        }

        // Skill Select Functionality
        function addSkillTag(selectElement) {
            if (selectElement.value && selectElement.selectedIndex > 0) {
                const container = document.getElementById("skills-tags");
                
                // Check if tag already exists
                const existingTags = Array.from(container.children);
                const tagExists = existingTags.some(tag => 
                    tag.textContent.trim().replace('×', '').trim() === selectElement.value
                );
                
                if (!tagExists) {
                    const newTag = document.createElement("div");
                    newTag.className = "skill-tag";
                    newTag.innerHTML = `
                        ${selectElement.value}
                        <button class="remove" onclick="removeTag(this)">×</button>
                    `;
                    container.appendChild(newTag);
                }
                
                selectElement.selectedIndex = 0;
            }
        }

        // Event listeners for breed and skill selects
        document.querySelector(".breed_select").addEventListener("change", function (e) {
            addBreedTag(e.target);
        });

        document.querySelector(".skill_select").addEventListener("change", function (e) {
            addSkillTag(e.target);
        });
    </script>



@endsection
