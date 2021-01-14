

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>

<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">


    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                <a href=""></a>
            </div>
            <!-- Grid column --><!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Partenaires</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="#!">Congo Agile High Tech</a>
                </p>
                <p>
                    <a href="#!">Tokdoc Monganga</a>
                </p>
                <p>
                    <a href="#!">Gouvernorat Haut-Katanga</a>
                </p>
                <p>
                    <a href="#!">Ministere de la sante</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Support Technique</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="#!">Mon compte</a>
                </p>
                <p>
                    <a href="#!">Assistance</a>
                </p>
                <p>
                    <a href="#!">Products</a>
                </p>
                <p>
                    <a href="#!">Help & FAQ</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contacts </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p class="text-capitalize">
                    <i class="fas fa-home mr-3"></i> 25, des rosiers, bel-air, kampemba, lubumbashi, haut-katanga, D.R.Congo</p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> info@congoagile.net</p>
                <p>
                    <i class="fas fa-phone mr-3"></i> +243 858 533 285</p>
                <p>
                    <i class="fas fa-print mr-3"></i> +243 977 090 011</p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->
        <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4"> </div>
            <!-- Grid column -->
            <div class="col-md-9 col-lg-9 col-xl-9 mx-auto mb-4">

                <!-- Content -->
                <h5 class="text-uppercase mb-4 font-weight-bold">Faire bien vos affaires</h5>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p style="text-align: justify;">Le monde devient de plus en plus vaste mais grâce aux nouvelles
                    technologies de l'information et de communication, vous pouvez atteindre toute la planette
                    en quelques sécondes en passant par un site internet ou une application mobile disponible sur le
                    net.
                    Si vous voulez booster votre carrière par la publicité de vos produits et services,
                    faire la promotion de vos activités professionnelles,
                    étendre ses révenues, bref avoir une visibilité sur internet, nous sommes une solution idéale
                    pour vous. Congo Agile peut vous concevir un site web ou une application dans un temps records
                    cela à un prix abordable conformement à votre catégorie d'entreprise ou d'association.</p>

            </div>
            <!-- Grid column -->
        </div>
    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        © 2019 -
        <script>document.write(new Date().getFullYear());</script>
        <a href="https://www.hautkatanga.gouv.cd" target="_blank"> Gouvernement Provincial du Haut-Katanga </a> by
        <a href="https://www.congoagile.net" target="_blank"> CEO - Congo Agile </a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/main.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>plugins/alert.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>plugins/alert-index.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>plugins/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/plugins/select2.full.min.js"></script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script type="text/javascript">

    $('#demoDate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });

    $('#demoSelect').select2();

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        //Initialize Select2 Elements
        $('.select2').select2()
    });
    // Animations initialization
    new WOW().init();
    //function for datatable
    $(function () {
        $('table').DataTable();
    });

</script>


</body>
</html>
