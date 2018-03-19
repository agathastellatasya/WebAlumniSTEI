@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
      <div class="row">
        <nav class="col-3 sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="/dashboard">
                    <span data-feather="home"></span>
                    <i class="sideMenu">Dashboard</i><span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/members">
                    <span data-feather="users"></span>
                    <i class="sideMenu">Members List</i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/dashboard">
                    <span data-feather="file"></span>
                    <i class="sideMenu">TBD</i>
                  </a>
                </li>
              </ul>
            </div>
          </nav>

        <main role="main" class="col-7">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <img src="{{URL::asset('storage/banner.jpg')}}" id="bannerMember">
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2">Website Alumni STEI-ITB</h1>
            </div>
            <p class="bio">
              Saat ini, belum terdapat sarana resmi bagi para alumni STEI ITB untuk berinteraksi. Para alumni hanya berinteraksi melalui media sosial sehingga tidak dapat diketahui identitas asli sang pemilik akun. Oleh karena itu, organisasi STEI ITB ingin membuat suatu sarana resmi untuk interaksi para alumni dengan melakukan verifikasi credential melalui email yang terdaftar pada STEI ITB sehingga dapat dipastikan bahwa pemilik akun adalah benar merupakan alumni STEI ITB. Dengan adanya sistem ini, pemalsuan identitas yang mengatasnamakan salah satu alumni STEI ITB dapat dicegah/dikurangi. Selain itu, sistem ini juga diharapkan dapat menjadi sarana bagi para alumni STEI ITB untuk saling bertukar informasi satu dengan yang lain agar dapat saling membangun sebagai satu kesatuan alumni STEI ITB.
            </p>
          </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
</html>
@endsection
