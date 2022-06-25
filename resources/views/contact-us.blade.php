@extends('main')

@section('content')
<div class="section">
    <div class="container">
        <section class="section-preview">

      <!--Section: Contact v.2-->
      <section class="mb-4">

          <!--Section heading-->
          <h2 class="h1-responsive font-weight-bold text-center my-4">Liên hệ</h2>
          <!--Section description-->
          <p class="text-center w-responsive mx-auto mb-5">Bạn có câu hỏi nào không? Xin vui lòng liên hệ trực tiếp với chúng tôi. Nhóm của chúng tôi sẽ quay lại với bạn trong vòng vấn đề hàng giờ để giúp bạn.</p>

          <div class="row">

              <!--Grid column-->
              <div class="col-md-9 mb-md-0 mb-5">
                  <form id="contact-form" name="contact-form" action="#s" method="POST">

                      <!--Grid row-->
                      <div class="row">

                          <!--Grid column-->
                          <div class="col-md-6">
                              <div class="md-form mb-0">
                                  <input type="text" id="name" name="name" class="form-control">
                                  <label for="name" class="">Họ và tên</label>
                              </div>
                          </div>
                          <!--Grid column-->

                          <!--Grid column-->
                          <div class="col-md-6">
                              <div class="md-form mb-0">
                                  <input type="text" id="email" name="email" class="form-control">
                                  <label for="email" class="">Địa chỉ email</label>
                              </div>
                          </div>
                          <!--Grid column-->

                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row">
                          <div class="col-md-12">
                              <div class="md-form mb-0">
                                  <input type="text" id="subject" name="subject" class="form-control">
                                  <label for="subject" class="">Chủ đề</label>
                              </div>
                          </div>
                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row">

                          <!--Grid column-->
                          <div class="col-md-12">

                              <div class="md-form">
                                  <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                  <label for="message">Nội dung</label>
                              </div>

                          </div>
                      </div>
                      <!--Grid row-->

                  </form>

                  <div class="text-center text-md-left">
                      <a class="btn btn-primary waves-effect waves-light">Send</a>
                  </div>
                  <div id="status"></div>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-3 text-center">
                  <ul class="list-unstyled mb-0">
                      <li><i class="fas fa-map-marker-alt fa-2x"></i>
                          <p>San Francisco, CA 94126, USA</p>
                      </li>

                      <li><i class="fas fa-phone mt-4 fa-2x"></i>
                          <p>+ 01 234 567 89</p>
                      </li>

                      <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                          <p>contact@mdbootstrap.com</p>
                      </li>
                  </ul>
              </div>
              <!--Grid column-->

          </div>

      </section>
      <!--Section: Contact v.2-->

    </section>
    </div>
</div>

@endsection