<x-base-layout title="Home">
  <section class="mb-5" id="hero">
    <div class="container">
      <div class="row align-items-center mt-4">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h1 class="title mb-3">
            Welcome to
            <br>
            <span class="text-danger">Ventuno Production </span>
          </h1>
          <p class="text mb-4">We don't remember days, we remember moments.</p>

          <p class="text-justify">Biarkan gambar dan video berbicara. Kami memahami betapa pentingnya gambar dan video dalam menyampaikan pesan, itulah mengapa kami menawarkan jasa fotografi dan videografi yang dapat membantu Anda membuat kesan yang tahan lama</p>
          <a href="{{ route('courses.index') }}" class="btn btn-danger shadow">Mulai</a>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded " src="{{ url('assets/images/samples/undraww.png') }}" alt="hero-image">
        </div>
      </div>
    </div>
  </section>
  <section class="mb-5" id="featured_courses">
    <div class="container">
      <div class="row mb-4 text-center">
        <div class="col-12">
          <h2 class="heading">Top Featured</h2>
          <p class="text">Layanan unggulan di studio foto kami</p>
        </div>
      </div>
      <div class="row mb-2">
        @forelse ($courses as $course)
        <div class="col-lg-4 col-md-6 col-12 mb-3">
          <x-base-course-card :course="$course" />
        </div>
        @empty
        <div class="col-lg-4 col-md-6 col-12">
          <x-primary-alert :message="'No data'" />
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <section class="mb-5" id="crew">
    <div class="container">
      <div class="row mb-4 text-center">
        <div class="col-12">
          <h2 class="heading">Our Crew</h2>
          <p class="text">Rasakan Perbedaan Bersama Studio Foto Kami dan Biarkan Kami Membantu Anda Menciptakan Karya Visual yang Mengagumkan dan Mengesankan.</p>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-4 g-5 justify-content-center">
        <div class="col mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="{{ url('assets/images/person/IMG_0118.jpg') }}" alt="...">
            <div class="card-body">
              <h5 class="card-title">Assyfa Musthofa</h5>
              <p class="card-text">CEO</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100">
            <img src="{{ url('assets/images/person/IMG_0157.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Muafi Hazim</h5>
              <p class="card-text">COO</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100">
            <img src="{{ url('assets/images/person/IMG_0164.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">M Haykal Hidayat</h5>
              <p class="card-text">General Manager</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100">
            <img src="{{ url('assets/images/person/IMG_0068.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Dendi Raihan</h5>
              <p class="card-text">CFO</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100">
            <img src="{{ url('assets/images/person/IMG_0012.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Muhammad Fahmi</h5>
              <p class="card-text">Public Relations</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100">
            <img src="{{ url('assets/images/person/IMG_0089.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Rafly Ravana</h5>
              <p class="card-text">Media Creative</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100">
            <img src="{{ url('assets/images/person/IMG_0021.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">M Hafiz Daffa</h5>
              <p class="card-text">Media Creative</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mb-5">
    <div class="container">
      <div class="row mb-4 text-center">
        <div class="col-12">
          <h2 class="heading">Our Client</h2>
          <p class="text">Kami telah melayani klien dari berbagai latar belakang dan sektor untuk kebutuhan foto dan video mereka, dan memastikan mereka menerima konten visual berkualitas tinggi yang selaras dengan visi mereka.</p>
        </div>
      </div>
      <div class="row">
        <img src="{{ url('assets/images/person/Client.png') }}" alt="">

      </div>
    </div>
  </section>

</x-base-layout>
