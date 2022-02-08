  <!-- jQuery -->
  <script src="<?= base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/');?>dist/js/adminlte.min.js"></script>
  <script src="<?= base_url('assets/');?>node_modules/gsap/dist/gsap.min.js"></script>
  <script>
gsap.from("#card", {
  duration: 2.5,
  ease: "bounce.out",
  y: -500
});

gsap.from("#logoT", {
  duration: 2.5,
  ease: "expo.out",
  x: -900,
  delay: 2
});
  </script>

  </body>

  </html>