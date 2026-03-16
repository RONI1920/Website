@php
    $usability = App\Models\Usability::find(1);
@endphp

<div class="lonyo-section-padding bg-heading position-relative sectionn">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="lonyo-video-thumb">
                    <img src="{{ asset($usability->image) }}" alt=""
                        style="width: 100%; height: auto; object-fit: cover; border-radius: 8px;">
                    <a class="play-btn video-init" href="{{ $usability->youtube }}">
                        <img src="{{ asset('frontend/assets/images/v1/play-icon.svg') }}" alt="play">
                        <div class="waves wave-1"></div>
                        <div class="waves wave-2"></div>
                        <div class="waves wave-3"></div>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 d-flex align-items-center">
                <div class="lonyo-default-content lonyo-video-section pl-50" data-aos="fade-up" data-aos-duration="500">
                    <h2>{{ $usability->title }}</h2>
                    <p>{{ $usability->description }}</p>
                    <div class="mt-50" data-aos="fade-up" data-aos-duration="700">
                        <a class="lonyo-default-btn video-btn" href="contact-us.html">Download the app</a>
                    </div>
                </div>
            </div>

        </div>

        @php
            $connect = App\models\Connect::whereIn('id', [1, 2, 3])
                ->get()
                ->keyBy('id');
        @endphp

        <div class="row">

            @foreach ($connect as $value)
                <div class="col-xl-4 col-md-6">
                    <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="500">
                        <div class="lonyo-process-number">
                            <img src="{{ asset('frontend/assets/images/v1/n' . $value->id . '.svg') }}" alt="">
                        </div>
                        <div class="lonyo-process-title">
                            <h4 class="editable-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                                data-id="{{ $value->id }}">{{ $value->title }}</h4>
                        </div>
                        <div class="lonyo-process-data">
                            <p class="editable-description" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                                data-id="{{ $value->id }}">{{ $value->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="border-bottom" data-aos="fade-up" data-aos-duration="500">
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="lonyo-content-shape1">
    <img src="{{ asset('frontend/assets/images/shape/shape3.svg') }}" alt="">
</div>


{{-- Penting: Meta CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    document.addEventListener("DOMContentLoaded", function() {

        function saveChanges(element) {
            if (!element || !element.dataset.id) return;

            let connectId = element.dataset.id;
            let field = element.classList.contains('editable-title') ? 'title' : 'description';
            let newValue = element.innerText.trim();

            fetch(`/update-connect/${connectId}`, {
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
                if (e.target.classList.contains("editable-title") || e.target.classList.contains(
                        "editable-description")) {
                    e.preventDefault();
                    e.target.blur();
                }
            }
        });

        // Event: Simpan saat kursor keluar (Blur)
        document.querySelectorAll('.editable-title, .editable-description').forEach(el => el.addEventListener(
            'blur',
            function() {
                saveChanges(el)
            }));


    });
</script>
