<div class="my-3 px-3 navbar-sticky-top">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <picture>
                    <source type="image/webp" srcset="{{ asset('img/logo/doGrade-icon-196w.webp') }} 196w,
                                    {{ asset('img/logo/doGrade-icon-240w.webp') }} 240w,
                                    {{ asset('img/logo/doGrade-icon-360w.webp') }} 360w,
                                    {{ asset('img/logo/doGrade-icon-480w.webp') }} 480w,
                                    {{ asset('img/logo/doGrade-icon-768w.webp') }} 768w,
                                    {{ asset('img/logo/doGrade-icon-1280w.webp') }} 1280w,
                                    {{ asset('img/logo/doGrade-icon-1600w.webp') }} 1600w,
                                    {{ asset('img/logo/doGrade-icon-1920w.webp') }} 1920w," class="logo">
                </picture>
                <img srcset="{{ asset('img/logo/doGrade-icon-196w.png') }} 196w,
                             {{ asset('img/logo/doGrade-icon-240w.png') }} 240w,
                             {{ asset('img/logo/doGrade-icon-360w.png') }} 360w,
                             {{ asset('img/logo/doGrade-icon-480w.png') }} 480w,
                             {{ asset('img/logo/doGrade-icon-768w.png') }} 768w,
                             {{ asset('img/logo/doGrade-icon-1280w.png') }} 1280w,
                             {{ asset('img/logo/doGrade-icon-1600w.png') }} 1600w,
                             {{ asset('img/logo/doGrade-icon-1920w.png') }} 1920w,"
                    src="{{ asset('img/logo/doGrade-icon.png') }}" class="logo" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    @if (Auth::check() && isset(Auth::user()->can_dograde) && Auth::user()->can_dograde)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">อัปโหลดเกรด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('studentdata')}}">จัดการนักเรียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subjectlist')}}">จัดการวิชา</a>
                    </li>
                    @endif
                    @if (Auth::check() && isset(Auth::user()->can_manage_user) && Auth::user()->can_manage_user)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users')}}">จัดการผู้ใช้</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">เช็คเกรด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">เกี่ยวกับเรา</a>
                    </li>
                    
                    <!-- Authentication Links -->
                        @if (!Auth::check())
                            <li class="nav-item">
                                <a class="nav-link text-light btn btn-kjn" @click="openLoginModal()">เข้าสู่ระบบ</a>
                            </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    ออกจากระบบ
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                </ul>
            </div>
        </div>
    </nav>
</div>

@if (Auth::check() == false)
<div class="modal fade" tabindex="-1" id="loginModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="h1 text-center">เข้าสู่ระบบ</p>
                    <div class="row justify-content-center mt-3">
                        <label for="username"
                            class="form-label col-12 col-lg-2 m-0 d-flex justify-content-center align-items-center" :class="{'text-danger':authError.username}">ชื่อผู้ใช้</label>
                        <input type="text" id="username" name="email" class="form-control w-50 col-12 col-lg-10" :class="{'border-danger':authError.username}" v-model="username">
                        <div class="invalid-feedback" v-if="authError.username">
                            @{{authError.username[0]}}
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <label for="password"
                            class="form-label col-12 col-lg-2 m-0 d-flex justify-content-center align-items-center" :class="{'text-danger':authError.password}">รหัสผ่าน</label>
                        <input type="password" id="password" name="password" class="form-control w-50 col-12 col-lg-10" :class="{'border-danger':authError.password}" v-model="password">
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 m-0"></div>
                        <div class="invalid-feedback col-12 col-lg-10" v-if="authError.password">
                            @{{authError.password[0]}}
                        </div>
                    </div>
                    
                    <div class="form-check d-flex justify-content-center col-12 col-lg-10 mt-2">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label ms-1" for="remember">เข้าสู่ระบบไว้ตลอด</label>

                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4 mt-0 mt-lg-2">
                        </div>
                        <div class="col-12 col-lg-8 mt-2 d-flex justify-content-center justify-content-lg-start p-0">
                            <button class="btn btn-kjn" type="button" @click="auth()">เข้าสู่ระบบ</button>
                        </div>  
                    </div>
            </div>
        </div>
    </div>
</div> 
@endif

