 <footer class="main-footer">
     <strong>Copyright &copy; 2023-2024 <a href="#">Sri Mulliyanti</a>.</strong>
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 1.0.0
     </div>
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <script>
     let nilai_rapor = $('#nilai_rapor');
     $(document).ready(function() {
         $(".nilai").on("input", function() {
             let nilaix_xmti = $('#nilaix_xmti').val();
             let nilaix_xmtii = $('#nilaix_xmtii').val();
             let nilaix_ximti = $('#nilaix_ximti').val();
             let nilaix_ximtii = $('#nilaix_ximtii').val();
             let nilaix_xiimti = $('#nilaix_xiimti').val();
             let nilaix_xiimtii = $('#nilaix_xiimtii').val();
             if (nilaix_xmti != null &&
                 nilaix_xmtii != null &&
                 nilaix_ximti != null &&
                 nilaix_ximtii != null &&
                 nilaix_xiimti != null &&
                 nilaix_xiimtii != null
             ) {
                 let rata_rata = (parseFloat(nilaix_xmti) + parseFloat(nilaix_xmtii) + parseFloat(nilaix_ximti) + parseFloat(nilaix_ximtii) + parseFloat(nilaix_xiimti) + parseFloat(nilaix_xiimtii)) / 6;
                 nilai_rapor.val(rata_rata.toFixed(2));
             }
         });
     })
     $(document).ready(function() {
         $("#jumlah_data").change(function() {
             var value = $(this).val();
             let jumlah_data = window.location.search.split('&')
             jumlah_data[0] = '?jumlah_data=' + value;
             if (window.location.search.includes('page')) {
                 jumlah_data[2] = "page=0"
             }
             window.location = window.location.origin + window.location.pathname + jumlah_data.join('&')
         })
     })
 </script>

 <?php if (isset($_SESSION['response'])) : ?>
     <script>
         let message = '<?= $_SESSION['response']['message'] ?>';
         var is_error = '<?= $_SESSION['response']['error'] ?>';
         is_error = is_error == false ? 'error' : 'success';
         Swal.fire(
             'Alert!',
             message,
             is_error,
         )
     </script>
 <?php unset($_SESSION['response']);
    endif; ?>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 </body>

 </html>