    <div class="lonyo-section-padding2 position-relative">
        <div class="container">

            @php
                $title = App\Models\Title::find(1);
            @endphp
            <div class="lonyo-section-title center">
                <h2 id="features-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                    data-id="{{ $title->id }}">{{ $title->features }}</h2>
            </div>

            @php
                $feature = App\Models\Feature::latest()->limit(6)->get();
            @endphp


            <div class="row">
                @foreach ($feature as $item)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="500">
                            <div class="lonyo-service-title">
                                <h4>{{ $item->title }}</h4>
                                <img src="{{ asset('frontend/assets/images/v1/' . $item->icon . '.svg') }}"
                                    alt="">
                            </div>
                            <div class="lonyo-service-data">
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="lonyo-feature-shape"></div>
    </div>

    {{-- Penting: Meta CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const titleElement = document.getElementById("features-title");

            function saveChanges(element) {
                if (!element || !element.dataset.id) return;

                let featuresId = element.dataset.id;
                let field = element.id === "features-title" ? 'features' : '';
                let newValue = element.innerText.trim();

                fetch(`/edit-features/${featuresId}`, {
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
        });
    </script>
