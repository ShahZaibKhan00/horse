@extends('layouts.app')
@section('content')
<style>
    header {position: unset;}
    img.color_image {width: 100px;box-shadow: 0px 0px 9px 0px #000;border-radius: 10px;height: 60px;object-fit: contain;}
.myToolTip {/* width: 50px; */position: absolute;top: -70px;display: flex;flex-wrap: wrap;gap: 70px;left: 0;background: #fff;text-align: center;transition: .5s;opacity: 0;justify-content: center;z-index: -1;border-radius: 10px;}
span.title {font-size: 10px; display: inline-block; }
.color_checkbox:hover .myToolTip {top: -80px;opacity: 1;z-index: 999;}
table {
    width: 100%;
}
</style>
@foreach($data as $data)
<section class="single_product">
    <div class="container">
        <form action="{{ url('cart_submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pro_sku" value="{{ $data->pro_sku }}">
            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    @php
                        $imageNames = json_decode($data->pro_imgs);
                    @endphp
                    <div class="proDetail_for">
                        <div class="item">
                            <img src="{{ getenv('APP_URL') }}/Featured_image/{{ $data->pro_Fimg }}" class="w-100" width="" height="" alt="">
                        </div>
                        @if (!empty($imageNames) && is_array($imageNames))
                            @foreach ($imageNames as $imageName)
                                <div class="item">
                                    <img src="{{ getenv('APP_URL') }}/Product_images/{{ trim($imageName) }}" class="w-100" width="" height="" alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="proDetail_nav">
                        <div class="item">
                            <img src="{{ getenv('APP_URL') }}/Featured_image/{{ $data->pro_Fimg }}" class="w-100" width="" height="" alt="">
                        </div>
                        @if (!empty($imageNames) && is_array($imageNames))
                            @foreach ($imageNames as $imageName)
                                <div class="item">
                                    <img src="{{ getenv('APP_URL') }}/Product_images/{{ trim($imageName) }}" class="w-100" width="" height="" alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 light">
                    <h2 class="heading34px mb-2 primeColor">{{ $data->pro_name }}</h2>
                    <p class="text-dark">Inventore optio reprehenderit beatae iusto</p>
                    <h2 class="heading22px mt-4 mb-3 primeColor">Product Description</h2>
                    <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit.ipsum dolor sit amet consectetur adipisicing elit. Odit iusto quis repellat explicabo voluptatum, adipisci debitis qui soluta laborum, facilis tempore quaerat cumque neque illum ducimus nobis nisi consequatur nesciunt quasi alias repellendus nam molestias culpa! A ab dicta officia porro, voluptatibus quaerat assumenda saepe, nobis unde aspernatur voluptate veritatis natus culpa doloremque tenetur, quasi facilis excepturi ipsum quos nihil temporibus velit consequatur? Hic beatae repudiandae voluptatem maxime autem eligendi. Inventore optio reprehenderit beatae Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore optio reprehenderit beatae iLorem ipsum dolor sit amet consectetur adipisicing elit. Inventore optio reprehenderit beatae iiusto maxime a nemo suscipit iure quisquam aliquam dicta nihil vel, deleniti quibusdam ex harum deserunt illum quasi corrupti provident pariatur atque ullam? Exercitationem necessitatibus pariatur repudiandae eum quo explicabo voluptate accusamus provident neque deserunt. Numquam, ipsa sequi.</p>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
function updateTable(checkbox) {
    const table = document.getElementById('detailsTable');
    const chooseFiles = document.getElementById('chooseFiles');
    const colorName = checkbox.value;
    const colorCode = checkbox.getAttribute('data-color');
    const colorProname = checkbox.getAttribute('data-proname');

    if (checkbox.checked) {
        // Create a new row
        const newRow = document.createElement('tr');
        newRow.setAttribute('data-color', colorName);
        newRow.innerHTML = `
            <td>${colorProname}</td>
            <td>${colorName} - ${colorCode}
            <input type="hidden" value="${colorProname}" name="pro_name[]"/>
            <input type="hidden" value="${colorName}" name="color_name[]"/>
            <input type="hidden" value="${colorCode}" name="pro_color[]"/>
            </td>
            <td>
                <input type="number" value="1" name="pro_quantity[]" class="input" min="1" 
                    onchange="updateFileInputs('${colorName}', this.value)"/>
            </td>
            <td>
                <button class="deleteIconBtn" onclick="removeRow(this)"><img src="{{ getenv('APP_URL') }}/assets/images/delete-icon.png" class="deleteIcon"/></button>
            </td>
        `;
        table.appendChild(newRow);

    } else {
        // Remove the corresponding row
        const rows = table.querySelectorAll('tr');
        rows.forEach(row => {
            if (row.getAttribute('data-color') === colorName) {
                table.removeChild(row);
            }
        });

        // Remove the corresponding file wrapper
        const fileWraps = chooseFiles.querySelectorAll('.file_wrap');
        fileWraps.forEach(fileWrap => {
            if (fileWrap.getAttribute('data-color') === colorName) {
                chooseFiles.removeChild(fileWrap);
            }
        });
    }
}

function updateFileInputs(colorName, quantity) {
    const fileWrap = document.querySelector(`.file_wrap[data-color="${colorName}"] .file_inputs`);
    fileWrap.innerHTML = ''; // Clear existing inputs

    for (let i = 0; i < quantity; i++) {
        const input = document.createElement('input');
        input.type = 'file';
        input.multiple = true;
        input.name = `Upload_Prescription[${colorName}][]`;
        fileWrap.appendChild(input);
    }
}

function removeRow(icon) {
    const row = icon.parentElement.parentElement;
    const colorName = row.getAttribute('data-color');
    const checkbox = document.querySelector(`input[type="checkbox"][value="${colorName}"]`);
    checkbox.checked = false;
    row.parentElement.removeChild(row);

    const chooseFiles = document.getElementById('chooseFiles');
    const fileWraps = chooseFiles.querySelectorAll('.file_wrap');
    fileWraps.forEach(fileWrap => {
        if (fileWrap.getAttribute('data-color') === colorName) {
            chooseFiles.removeChild(fileWrap);
        }
    });
}

</script>

@endforeach
@endsection