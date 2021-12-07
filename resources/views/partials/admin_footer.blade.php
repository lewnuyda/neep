 <!-- Footer -->
    <footer class="py-4 bg-light mt-auto">
        <div class="container">
        <p class="m-0 text-center "><?php $date = date('Y');
        $footer= 'Copyright &copy;'.$date.' .  National Research Council of the Philippines | NEEP Home | Contact us'; echo  $footer; ?></p>
        </div>
        <!-- /.container -->
    </footer>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ URL::asset('public/admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('public/admin/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('public/admin/js/scripts.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>


</body>

</html>
