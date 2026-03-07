    <div class="lonyo-section-padding position-relative overflow-hidden">
        <div class="container">
            <div class="lonyo-section-title">
                <div class="row">

                    @php
                        $title = App\Models\Title::find(1);
                    @endphp
                    <div class="col-xl-8 col-lg-8">
                        <h2 id="reviews-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
                            data-id="{{ $title->id }}">{{ $title->reviews }}</h2>
                    </div>

                    <div class="col-xl-4 col-lg-4 d-flex align-items-center justify-content-end">
                        <div class="lonyo-title-btn">
                            <a class="lonyo-default-btn t-btn" href="contact-us.html">Read Customer Stories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lonyo-testimonial-slider-init">

            @php
                $review = App\Models\Review::latest()->get();
            @endphp

            @foreach ($review as $item)
                <div class="lonyo-t-wrap wrap2 light-bg">
                    <div class="lonyo-t-ratting">
                        <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
                    </div>
                    <div class="lonyo-t-text">
                        <p>{{ $item->message }}</p>
                    </div>
                    <div class="lonyo-t-author">
                        <div class="lonyo-t-author-thumb">
                            <img src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div class="lonyo-t-author-data">
                            <p>{{ $item->name }}</p>
                            <span>{{ $item->position }}</span>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="lonyo-t-overlay2">
            <img src="{{ asset('frontend/assets/images/v2/overlay.png') }}" alt="">
        </div>
    </div>

    {{-- Penting: Meta CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const titleElement = document.getElementById("reviews-title");

            function saveChanges(element) {
                if (!element || !element.dataset.id) return;

                let reviewsId = element.dataset.id;
                let field = element.id === "reviews-title" ? 'reviews' : '';
                let newValue = element.innerText.trim();

                fetch(`/edit-reviews/${reviewsId}`, {
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
