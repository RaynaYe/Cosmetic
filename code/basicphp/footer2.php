<footer>
<a href="#top" id="return-to-top"><i style="font-size:24px" class="fa">&#xf106;</i></a> 
            <div class="copyright">
            <p>
                &copy;2017
            </p>
                <div class="footerlogo"> 
                    <span>Cosmetic Utopia</span>
                </div>
                
            </div>
    
                <div class="ustext">
                    <a href="AboutUs.php" class="aboutus">About Us</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="#" class="contactus" >
                        <span class="contactus" onClick="document.getElementById('id03').style.display='block'">Contact Us</span></a>

                    
                        <!--contactus-->

                        <div id="id03" class="modal" >
                            <form class="modal-content animate" action="action.php" method="post">

                                    <span onClick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <img class="imgcontainer" src="Pics/logo.svg" alt="logo" class="logo">


                                <div class="container">
                                    <label><b>Email</b></label>
                                    <input type="text" placeholder="Please enter your email" name="emailadd" id="emailadd"  required>

                                    <label><b>Details</b></label>
                                    <textarea rows="4" cols="50" type="text" placeholder="Please enter your concerns" name="emailcontent" id="emailcontent" required> </textarea>

                                    <button type="submit" id="email" name="email">Submit</button>
                            </form>


                                </div>




                            </form>
                        </div>


                    </div>


        </footer>

    </div>


    <!--Scriptforloginpopup-->
    <script>
        var modal = document.getElementById('id01');
        window.onclick=function(event){
            if(event.target == modal){
                modal.style.display="none";
            }
        }
    </script>


    <!--Scriptforregisterpopup-->
    <script>
        var modal = document.getElementById('id02');
        window.onclick=function(event){
            if(event.target == modal){
                modal.style.display="none";
            }
        }
    </script>


    <!--ScriptforAboutus-->
    <script>
        var modal = document.getElementById('id03');
        window.onclick=function(event){
            if(event.target == modal){
                modal.style.display="none";
            }
        }
    </script>


    <!--Scriptforwishlistpopup-->
    <script>
        var modal = document.getElementById('id04');
        window.onclick=function(event){
            if(event.target == modal){
                modal.style.display="none";
            }
        }
    </script>







<!--ScriptforTag-->
    <script>
    var tag1AndTag2 = {};
    tag1AndTag2['Beauty'] = ['Face', 'Eye', 'Lip'];
    tag1AndTag2['Body'] = ['Shampoo', 'Lotion'];
    tag1AndTag2['Fragrance'] = ['Man', 'Woman'];
    tag1AndTag2['Nail'] = ['--'];

    function changetaglist() {
        var tag1 = document.getElementById("Tag1");
        var tag2 = document.getElementById("Tag2");
        var selTag = tag1.options[tag1.selectedIndex].value;
        while (tag2.options.length) {
            tag2.remove(0);
        }
        var tag = tag1AndTag2[selTag];
        if (tag) {
            var i;
            for (i = 0; i < tag.length; i++) {
                var taglist = new Option(tag[i], i);
                tag2.options.add(taglist);
            }
        }
    }
    </script>


<!--ScriptforTag-->
<script>
    var tag1WithTag2 = {};
    tag1WithTag2['Beauty'] = ['Face', 'Eye', 'Lip'];
    tag1WithTag2['Body'] = ['Shampoo', 'Lotion'];
    tag1WithTag2['Fragrance'] = ['Man', 'Woman'];
    tag1WithTag2['Nail'] = ['--'];

    function changetag() {
        var tag1 = document.getElementById("Tagone");
        var tag2 = document.getElementById("Tagtwo");
        var selTag = tag1.options[tag1.selectedIndex].value;
        while (tag2.options.length) {
            tag2.remove(0);
        }
        var tag = tag1WithTag2[selTag];
        if (tag) {
            var i;
            for (i = 0; i < tag.length; i++) {
                var taglist = new Option(tag[i], i);
                tag2.options.add(taglist);
            }
        }
    }
</script>



    <!--Scriptforsubpageprod-facebookshare-->
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!--Scriptforpreview-->   
    <script>
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    function imgPreview(){
        // Get the modal
        document.getElementById('imgmodal').style.display = "block";  
        //captionText.innerHTML =document.getElementById("prodcover").alt;
    }
    </script>

<!-- SCRIPT for SCROLLTOP-->
    <script>
    $(document).ready(function () {

    $("#return-to-top").hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('#return-to-top').fadeIn();
        } else {
            $('#return-to-top').fadeOut();
        }
    });

    $('#return-to-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    });
    </script>
    
    </body>
    </html>

<!-- SCRIPT for CAROUSEL-->
<script>

    var carousel = $(".carousel"),
        currdeg  = 0;

    $(".next").on("click", { d: "n" }, rotate);
    $(".prev").on("click", { d: "p" }, rotate);

    function rotate(e){
        if(e.data.d=="n"){
            currdeg = currdeg - 60;
        }
        if(e.data.d=="p"){
            currdeg = currdeg + 60;
        }
        carousel.css({
            "-webkit-transform": "rotateY("+currdeg+"deg)",
            "-moz-transform": "rotateY("+currdeg+"deg)",
            "-o-transform": "rotateY("+currdeg+"deg)",
            "transform": "rotateY("+currdeg+"deg)"
        });
    }

</script>