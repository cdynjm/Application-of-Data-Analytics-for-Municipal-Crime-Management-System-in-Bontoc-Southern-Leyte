<footer class="bg-none text-center mt-6">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <center>
    <div class="me-2 mb-3">
        <span>
        <a href="https://www.facebook.com/slsuccsit" target="_blank">
          <img src="{{ asset('storage/logo/ccsit-logo.jpg') }}" alt="..." class="shadow-sm me-2" style="height: 80px; width: 80px; border-radius: 50px;">
        </a>
        </span>
        <span>
        <a href="https://www.facebook.com/southernleytestateu" target="_blank">
            <img src="{{ asset('storage/logo/slsu-logo.png') }}" alt="..." class="shadow-sm" style="height: 80px; width: 80px; border-radius: 50px;">
        </a>
        </span>
      </div>
      </center>
    <section class="mb-4">
        <p>Online Portals</p>
      <!-- Facebook -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #3b5998;"
        href="https://www.facebook.com/slsuccsit"
        role="button"
        target="_blank"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Website -->
      <a
        class="btn text-white btn-floating m-1 bg-info"
        style=""
        href="https://southernleytestateu.edu.ph/"
        role="button"
        target="_blank"
        ><i class="fa fa-globe"></i></a>

      <!-- Google -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: darkOrange;"
        href="https://gmail.com"
        role="button"
        target="_blank"
        ><i class="fab fa-google"></i
      ></a>

      <!-- YouTube -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: red;"
        href="https://www.youtube.com/@SouthernLeyteStateUniversity"
        role="button"
        target="_blank"
        ><i class="fab fa-youtube"></i></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="">
  © <script>
    document.write(new Date().getFullYear())
</script> Copyright:
    <a class="text-dark" href="">{{ ENV('APP_NAME') }}</a>
  </div>
  <!-- Copyright -->
</footer>