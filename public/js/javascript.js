let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
}
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".btn-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

let drp = document.querySelectorAll(".drp");
for (var i = 0; i < drp.length; i++) {
    drp[i].addEventListener("click", (e) => {
        let drpParent = e.target.parentElement.parentElement.parentElement; //selecting main parent of arrow
        drpParent.classList.toggle("showMenu");
    });
}


const kode_kategori_dom = document.querySelectorAll('.kode-kategori');
const nip_dom = document.querySelectorAll('.nip-pengelola');
const aset_dom = document.querySelectorAll('.harga-aset');

if (kode_kategori_dom.length > 0) {
    const kode = new Cleave('.kode-kategori', {
        delimiter: '.',
        // 1.2.3.09.008.004.008
        blocks: [1, 1, 1, 2, 3, 3, 3],
        uppercase: true
    });
}

if (nip_dom.length > 0) {
    const nip = new Cleave('.nip-pengelola', {
        blocks: [8, 6, 1, 3],
        numericOnly: true
    });

    const nohp = new Cleave('.nohp', {
        phone: true,
        phoneRegionCode: 'ID'
    });
}

if (aset_dom.length > 0) {
    var harga = new Cleave('.harga-aset', {
        numeral: true,
        numeralDecimalMark: '.',
        delimiter: ',',
        prefix: 'Rp ',
        rawValueTrimPrefix: true
    });

    document.querySelector('.btn-save').addEventListener('click', function () {
        document.getElementById('harga').value = harga.getRawValue();
    });
}


$(document).ready(function () {
    $('.jenis-barang').select2({
        placeholder: "-- Pilih Jenis Barang --",
        allowClear: true,
        cache: false,
        width: '100%',
        theme: "bootstrap-5"
    });
});

$(document).ready(function () {
    $('.select-inventaris').select2({
        placeholder: "-- Pilih Inventaris yang akan dimasukkan --",
        width: '100%',
        theme: "bootstrap-5"
    });
});

function previewImage() {
    const image = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}

function viewLabel() {
    var id = document.getElementById("ruangan").value;
    document.getElementById("view-label").src = "http://localhost:8000/laporan/label/view?ruangan=" + id;
}

function selectJenisBarang() {
    var x = document.getElementById("jenis-barang").value;
    var token = $("input[name='_token']").val();
    if (!["", null, undefined].includes(x)) {
        $.ajax({
            URL: "{{ route('AddInputRegister' }}",
            type: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                "jenis": x,
                "_token": token
            },

            success: function (response) {
                document.getElementById('kode').value = response.kode;
                document.getElementById('register').value = response.register;
            },

            error: function (response) {
                console.log(response)
            }

        });
    } else {
        document.getElementById('kode').value = "";
        document.getElementById('register').value = "";
    }
}

function selectEditJenisBarang() {
    var x = document.getElementById("jenis-barang").value;
    var token = $("input[name='_token']").val();
    if (!["", null, undefined].includes(x)) {
        $.ajax({
            URL: "{{ route('EditInputRegister' }}",
            type: "POST",
            dataType: "JSON",
            cache: false,
            data: {
                "jenis": x,
                "_token": token
            },

            success: function (response) {
                document.getElementById('kode').value = response.kode;
                document.getElementById('register').value = response.register;
            },

            error: function (response) {
                console.log(response)
            }

        });
    } else {
        document.getElementById('kode').value = "";
        document.getElementById('register').value = "";
    }
}
