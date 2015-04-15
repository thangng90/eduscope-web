        <!-- above is header -->

        <div class="warper container-fluid">
            <div class="row middle">
                <div class="col-sm-6 padd-xlg">
                    <a href="?action=all-albums" class="stack link-box"><img src="http://placehold.it/640x480/00acde/fff&text=ALBUM" alt="" class="img-responsive"></a>
                </div>
                <div class="col-sm-6 padd-xlg">
                    <a href="?action=all-photos" class="link-box"><img src="http://placehold.it/640x480/00aced/fff&text=ALL" alt="" class="img-responsive"></a>
                </div>
            </div>
        </div>
        
        <!-- include login and register dialogs if needed -->
        <?php 
            if(!isset($_SESSION['user'])) {
                include "common/dialogs/login.php";
                include "common/dialogs/register.php";
            }
        ?>

        <footer class="container-fluid footer">
            Copyright &copy; 2015 <a href="#">Lawrence S.Ting Fund | IS Technology Co., Ltd.</a>
            <a href="#" class="pull-right scrollToTop"><i class="fa fa-chevron-up"></i></a>
        </footer>
    </section>
    <!-- /footer - begin scripts-->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    
    
    <!-- NanoScroll -->
    <script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- Custom JQuery -->
    <script src="assets/js/app/custom.js" type="text/javascript"></script>
</body>

</html>