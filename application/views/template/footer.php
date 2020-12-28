

    <!-- footer -->
    <footer class="py-5">
        <div class="container py-xl-4 py-lg-3">
            <div class="row footer-grids">
                <div class="col-lg-3 col-6 footer-grid">
                    <h3 class="mb-sm-4 mb-3">Links</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?= base_url()?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>Contact">About Us</a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>Question/add_question">Ask Something</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-6 footer-grid">
                    <h3 class="mb-sm-4 mb-3">Some More</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?= base_url()?>Question">Question</a>
                        </li>
                       
                            <?php if (empty($this->session->userdata('userid'))) { ?>
                            <li><a href="<?= base_url()?>Login">Login</a></li>
                            <?php } else{ ?>
                            <li><a href="<?= base_url()?>Question/my_questions">My Questions</a></li>
                            <li><a href="<?= base_url()?>Logout">Logout</a></li>
                            <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-3 col-6 footer-grid footer-contact mt-lg-0 mt-4">
                    <h3 class="mb-sm-4 mb-3">Get In Touch</h3>
                    <ul class="list-unstyled">
                        <li>
                            +01711 123321
                        </li>
                        <li>
                            <a href="mailto:info@example.com">info@knowledge.com</a>
                        </li>
                    </ul>
                </div>
                
                <div class="col-lg-3 footer-grid mt-lg-0 mt-4">
                    <div class="footer-logo">
                        <h2 class="text-lg-center text-center">
                            <a class="logo text-wh font-weight-bold" href="index.html">
                                Knowledge</a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="copyright-w3ls py-4">
        <div class="container">
            <div class="row">
                <!-- copyright -->
                <p class="col-lg-8 copy-right-grids text-wh text-lg-left text-center mt-lg-2">© 2020 Knowledge. All Rights Reserved
                </p>
                <!-- //copyright -->
                <!-- social icons -->
                <div class="col-lg-4 w3social-icons text-lg-right text-center mt-lg-0 mt-3">
                    <ul>
                        <li>
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="px-2">
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li class="pl-2">
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- //social icons -->
            </div>
        </div>
    </div>
    <!-- //copyright -->
    <!-- move top icon -->
    <a href="#move-to-top" onclick="topFunction()" class="move-top text-center" id="myBtn">
        <span class="fa fa-angle-double-up" aria-hidden="true"></span>
    </a>
    <!-- //move top icon -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!--- Code Mirror --->
<script>

    var editor = CodeMirror.fromTextArea(document.getElementById("demotext"), {
      lineNumbers: true,
      mode: "text/html",
      matchBrackets: true
    });
</script>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<!--- Code Mirror --->
<!-- <script>
$(document).ready(function(){
  $("#like").click(function(){
    $("#like").css("color", "#3578E5");
    var like = parseInt($("#like").text());
    var like_new = like+1;
    $("#like").text(like_new);
    
  });

  $("#dislike").click(function(){
    $("#dislike").css("color", "#3578E5");
    var dislike = parseInt($("#dislike").text());
    var dislike_new = dislike-1;
    $("#dislike").text(dislike_new);
    
  });


});
</script> -->

</body>


</html>