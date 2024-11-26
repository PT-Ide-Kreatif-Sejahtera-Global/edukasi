@extends('customer.index')

@section('content')
    <section id="course-detail" class="my-5">
        <div class="container">
            <h2 class="mb-4">{{ $course->title }}</h2>

            <!-- Gambar Kursus -->
            <div class="course-image mb-4 text-center">
                <img width="150" height="150" src="{{ url('storage/course/' . $course->foto) }}" alt="Course Image"
                    class="img-thumbnail">
            </div>

            <div class="row">
                <!-- Kolom Kiri: Deskripsi Kursus -->
                <div class="col-md-8">
                    <div class="course-description p-4 bg-light rounded mb-4">
                        <p>{{ $course->description }}</p>
                    </div>

                    <div class="course-info p-3 bg-white rounded shadow-sm">
                        <p><strong>Instructor:</strong> {{ $course->instructor->user->name ?? 'N/A' }}</p>
                        <p><strong>Price:</strong>
                            {{ $course->price > 0 ? 'Rp. ' . number_format($course->price, 0, ',', '.') : 'Free' }}</p>

                        @if ($isLocked)
                            @if ($course->price > 0)
                                <a href="{{ route('pembayaran', ['id' => $course->id]) }}" class="btn btn-primary mt-3">Beli
                                    Sekarang</a>
                            @else
                                <a href="{{ route('courses.course', ['id' => $course->id]) }}"
                                    class="btn btn-success mt-3">Claim Sekarang</a>
                            @endif
                        @endif
                    </div>

                    <!-- Forum Diskusi -->
                    <div class="discussion-forum mt-4">
                        <h4>Forum Diskusi</h4>

                        <!-- Form Komentar Baru -->
                        @auth
                            <form action="{{ route('discuss', ['id' => $course->id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea name="content" class="form-control" rows="3" placeholder="Tambahkan komentar..."></textarea>
                                    @error('content')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        @else
                            <p class="text-muted">Anda harus <a href="{{ route('login') }}">login</a> untuk menambahkan
                                komentar.</p>
                        @endauth

                        <!-- Pesan Sukses -->
                        @if (session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif

                        <div class="comments-section mt-4">
                            <h5>Diskusi</h5>
                            @forelse($discussComments as $comment)
                                <div class="comment mb-3 p-3 bg-light rounded">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <p>{{ $comment->content }}</p>
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        
                                    <!-- Menampilkan balasan -->
                                    <div class="replies mt-3 pl-4 border-left">
                                        @foreach ($comment->discussComments as $reply)
                                            <div class="reply mb-2 p-2 bg-white rounded shadow-sm">
                                                <strong>{{ $reply->user->name }}</strong>
                                                <p>{{ $reply->content }}</p>
                                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                            </div>
                                        @endforeach
                                    </div>
                        
                                    <!-- Form untuk menambahkan balasan -->
                                    @auth
                                        <form action="{{ route('comment', ['DiscussId' => $comment->id]) }}" method="POST" class="mt-3">
                                            @csrf
                                            <div class="form-group">
                                                <textarea name="content" class="form-control" rows="2" placeholder="Tambahkan balasan..."></textarea>
                                                @error('content')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-secondary btn-sm">Balas</button>
                                        </form>
                                    @endauth
                                </div>
                            @empty
                                <p class="text-muted">Belum ada diskusi. Jadilah yang pertama berkomentar!</p>
                            @endforelse
                        </div>
                        
                    </div>
                </div>

                <!-- Kolom Kanan: Konten Kursus -->
                <div class="col-md-4">
                    <div class="course-contents p-4 bg-light rounded shadow-sm">
                        <h3 class="mb-3">Course Contents</h3>
                        @foreach ($course->contents->groupBy('section.name') as $sectionName => $contents)
                            <div class="course-section mb-4">
                                <h4 class="font-weight-bold text-primary">{{ $sectionName ?? 'Uncategorized' }}</h4>
                                <div class="list-group">
                                    @foreach ($contents as $index => $content)
                                        <div class="list-group-item">
                                            <div class="d-flex w-100 justify-content-between">
                                                @if ($isLocked && $index > 0)
                                                    <h5 class="mb-1 text-muted">
                                                        <i class="fa fa-lock"></i> {{ $content->title }}
                                                    </h5>
                                                    <small class="text-muted">Locked</small>
                                                @else
                                                    <h5 class="mb-1">
                                                        <a href="{{ $content->url }}" target="_blank"
                                                            class="text-decoration-none">
                                                            {{ $content->title }}
                                                        </a>
                                                    </h5>
                                                @endif
                                            </div>
                                            <p class="mb-1">{{ $content->description }}</p>
                                            <small><strong>Category:</strong>
                                                {{ $content->category->category_name ?? 'N/A' }}</small><br>
                                            <small><strong>Section:</strong>
                                                {{ $content->section->section ?? 'Uncategorized' }}</small><br>
                                            <small><strong>Duration:</strong> {{ $content->duration }} Minutes</small>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    // Toggle form balasan
    document.querySelectorAll('.reply-toggle').forEach(function(button) {
        button.addEventListener('click', function() {
            const formId = 'reply-form-' + this.getAttribute('data-comment-id');
            const replyForm = document.getElementById(formId);
            replyForm.classList.toggle('d-none');
        });
    });
</script>
