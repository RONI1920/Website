@php
    $slider = App\Models\Slider::find(1);
@endphp

<div class="lonyo-hero-section light-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 d-flex align-items-center">
                <div class="lonyo-hero-content" data-aos="fade-up" data-aos-duration="700">

                    {{-- Bagian Judul --}}
                    <h1 id="slider-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                        data-id="{{ $slider->id }}" class="hero-title">{{ $slider->title }}</h1>

                    {{-- Bagian Deskripsi --}}
                    <p id="slider-description" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                        data-id="{{ $slider->id }}" class="text">{{ $slider->description }}</p>

                    <div class="mt-50" data-aos="fade-up" data-aos-duration="900">
                        <a href="{{ $slider->link }}" class="lonyo-default-btn hero-btn">Contact With Us</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="lonyo-hero-thumb" data-aos="fade-left" data-aos-duration="700">
                    <img src="{{ asset($slider->image) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Penting: Meta CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const titleElement = document.getElementById("slider-title");
        const descElement = document.getElementById("slider-description");

        function saveChanges(element) {
            if (!element || !element.dataset.id) return;

            let sliderId = element.dataset.id;
            let field = element.id === "slider-title" ? 'title' : 'description';
            let newValue = element.innerText.trim();

            fetch(`/edit-slider/${sliderId}`, {
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
                .then(response => {
                    if (!response.ok) throw new Error('Gagal menyimpan ke server');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        console.log(`${field} berhasil diperbarui!`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal menyimpan perubahan. Silakan cek koneksi atau login kembali.');
                });
        }

        // Event: Simpan saat tekan Enter
        document.addEventListener("keydown", function(e) {
            if (e.key === "Enter") {
                if (e.target.id === "slider-title" || e.target.id === "slider-description") {
                    e.preventDefault();
                    e.target.blur(); // Memicu event blur di bawah
                }
            }
        });

        // Event: Simpan saat kursor keluar (Blur)
        if (titleElement) {
            titleElement.addEventListener("blur", function() {
                saveChanges(this);
            });
        }

        if (descElement) {
            descElement.addEventListener("blur", function() {
                saveChanges(this);
            });
        }
    });
</script>
