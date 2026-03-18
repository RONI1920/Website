<section class="lonyo-cta-section bg-heading">

    @php
        $app = App\Models\Apps::find(1);
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="lonyo-cta-thumb" data-aos="fade-up" data-aos-duration="500">
                    <img id="appImage" src="{{ asset($app->image) }}" data-id="{{ $app->id }}" alt=""
                        style="cursor: pointer; width: 100%; max-width: 300px;">

                    @if (auth()->check())
                        {{-- Sembunyikan input file agar lebih rapi --}}
                        <input type="file" id="uploadImage" style="display:none">
                    @endif

                </div>
            </div>
            <div class="col-lg-6">
                <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">

                    {{-- Editable Title --}}
                    <h2 class="editable-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                        data-id="{{ $app->id }}">{{ $app->title }}</h2>

                    {{-- Editable Description --}}
                    <p class="editable-description" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                        data-id="{{ $app->id }}">{{ $app->description }}</p>
                    <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
                        <ul>
                            <li>
                                <a href="https://www.apple.com/app-store/"><img
                                        src="{{ asset('frontend/assets/images/v1/app-store.svg') }}" alt=""></a>
                            </li>
                            <li>
                                <a href="https://playstore.com/"><img
                                        src="{{ asset('frontend/assets/images/v1/play-store.svg') }}"
                                        alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Penting: Meta CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    document.addEventListener("DOMContentLoaded", function() {

        function saveChanges(element) {
            let appId = element.dataset.id;
            // Pastikan dataset.id tidak kosong sebelum lanjut
            if (!appId) return;

            let field = element.classList.contains('editable-title') ? 'title' : 'description';
            let newValue = element.innerText.trim();

            fetch(`/update-app/${appId}`, {
                    method: 'POST',
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                            "content"),
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        [field]: newValue // Mengirim data sesuai field yang diedit
                    })
                })
                .then(response => response.json())
                .then(data => { // PERBAIKAN: Menggunakan arrow function
                    if (data
                        .succes
                    ) { // Catatan: Pastikan ini cocok dengan response backend (success vs succes)
                        console.log(`${field} Updated Successfully`);
                    }
                })
                .catch(error => console.error("Error:", error));
        }

        // Event: Simpan saat tekan Enter
        document.addEventListener("keydown", function(e) {
            // PERBAIKAN: Cek apakah yang sedang difokuskan adalah elemen yang bisa diedit
            let isEditable = e.target.classList.contains('editable-title') || e.target.classList
                .contains('editable-description');

            if (e.key === "Enter" && isEditable) {
                e.preventDefault(); // Mencegah enter membuat baris baru
                saveChanges(e.target);
                e.target.blur(); // Opsional: menghilangkan fokus dari teks setelah di-enter
            }
        });

        // Event: Simpan saat kursor keluar (Blur)
        document.querySelectorAll('.editable-title, .editable-description').forEach(el => {
            el.addEventListener('blur', function() { // PERBAIKAN: Merapikan tutup kurung
                saveChanges(el);
            });
        });

    });

    // IMAGE UPLOAD FUNCTION START
    let imageElement = document.getElementById('appImage');
    let uploadInput = document.getElementById('uploadImage');

    // Pastikan elemennya ada sebelum menjalankan event listener

    imageElement.addEventListener('click', function() {
        @if (auth()->check())
            uploadInput.click();
        @else
            alert('Silakan login untuk mengubah gambar');
        @endif
    });

    uploadInput.addEventListener('change', function() {
        let file = this.files[0];
        if (!file) return;

        let formData = new FormData();
        formData.append('image', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]')
            .getAttribute('content'));

        // Gunakan appId di dalam URL
        fetch("/upload-app-image/1", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(response => response.json())
            .then(data => { // PERBAIKAN: Menggunakan arrow function
                if (datA.succes) {
                    imageElement.src = data.image_url;
                    console.log(` Image Upload Successfully`);
                }
            })
            .catch(error => console.error("Error:", error));
    });
</script>
