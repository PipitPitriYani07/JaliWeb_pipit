<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{url("")}}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{url("")}}/assets/style/css/adminlte.min.css">
    <script nonce="99952dd9-1264-4584-b0f3-ecd7a13cdb66">
        (function (w, d) {
            ! function (a, e, t, r) {
                a.zarazData = a.zarazData || {};
                a.zarazData.executed = [];
                a.zaraz = {
                    deferred: []
                };
                a.zaraz.q = [];
                a.zaraz._f = function (e) {
                    return function () {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: t
                        })
                    }
                };
                for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.zaraz.init = () => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    n && (a.zarazData.t = e.getElementsByTagName("title")[0].text);
                    a.zarazData.x = Math.random();
                    a.zarazData.w = a.screen.width;
                    a.zarazData.h = a.screen.height;
                    a.zarazData.j = a.innerHeight;
                    a.zarazData.e = a.innerWidth;
                    a.zarazData.l = a.location.href;
                    a.zarazData.r = e.referrer;
                    a.zarazData.k = a.screen.colorDepth;
                    a.zarazData.n = e.characterSet;
                    a.zarazData.o = (new Date).getTimezoneOffset();
                    a.zarazData.q = [];
                    for (; a.zaraz.q.length;) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0;
                    for (const e of [localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a
                        .startsWith("_zaraz_"))).forEach((t => {
                        try {
                            a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                        } catch {
                            a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                        }
                    }));
                    z.referrerPolicy = "origin";
                    z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData)));
                    t.parentNode.insertBefore(z, t)
                };
                ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, 0, "script");
        })(window, document);

    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo text-center">
            <img src="{{ url('assets/logo.png') }}" alt="logo JALI" style="width: 100px;">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg">
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <span style="font-weight: bold;">{{session('error')}}</span>
                    </div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <span style="font-weight: bold;">{{session('success')}}</span>
                    </div>
                @endif
            </div>
        </div>
        <div style="width: 360px">
            <div class="card">
                <div class="card-heder">
                    <div class="row">
                        <div class="col-12">
                            <center><b>JALI WEB ADMIN</b></center>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body login-card-body">
                        <div class="col-15">
                            <center>
                                <p class="box-msg">Selamat datang kembali, silakan masukan akun login Anda</p>
                            </center>
                            <form action="{{url("")}}/" method="POST" id="form-login">
                                </br>
                                @csrf
                                <b>Masukan Alamat Email</b>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="alamat_email"
                                        placeholder="Gunakan Alamat Email Login Anda"
                                        value="{{session()->get('alamat_email')}}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <b>Masukan Password</b>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" name="kata_kunci"
                                        placeholder="Gunakan Password Login Anda"
                                        value="{{session()->get('kata_kunci')}}" id="password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span id="iconshow" name="iconshow" onClick="showPass()"
                                                class="fa fa-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div style="margin-top:5px" class="row">
                    <div class="col-12">
                        <center><a href="{{url("forgot-password")}}">Lupa Password Anda?</a>
                            <center></br></br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url("")}}/assets/plugins/jquery/jquery.min.js"></script>
    <script src="{{url("")}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{url("")}}/assets/style/js/adminlte.min.js"></script>
    <!-- jquery-validation -->
    <script src="{{url("")}}/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{url("")}}/assets/plugins/jquery-validation/additional-methods.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#form-login').validate({
                rules: {
                    alamat_email: {
                        required: true,
                    },
                    kata_kunci: {
                        required: true,
                    },
                },
                messages: {
                    alamat_email: {
                        required: "Harap isi bidang ini!",
                    },
                    kata_kunci: {
                        required: "Harap isi bidang ini!",
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

    </script>
    <script type="text/javascript">
        function showPass() {
            if (document.getElementById("password").type == 'password') {
                document.getElementById("password").type = 'text';
                document.getElementById("iconshow").classList.remove('fa-eye-slash');
                document.getElementById("iconshow").classList.add('fa-eye');
            } else {
                document.getElementById("password").type = 'password';
                document.getElementById("iconshow").classList.remove('fa-eye');
                document.getElementById("iconshow").classList.add('fa-eye-slash');
            }
        }
    </script>
    </div>
    </div>
    </div>
</body>

</html>
