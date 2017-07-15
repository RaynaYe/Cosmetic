<header>
    <?php
    session_start();
    ?>
             
    <!--LogoPart-->

                        <a class="logocontainer" title="CosmeticUtopia" href="Report-CosmeticUtopia.pdf"><span>Cosmetic Utopia</span></a>



                    <!--SearchPart-->
                    <div class="searchbarcontainer">

                            <form id="searchForm" class="searchForm" method="post" action="action.php">
                                <input class="search-text" type="text" placeholder="search the Brand" name="searchname">
                                <button type="submit"  name="search" class="searchForm-button">
                                <i class="material-icons searchbtn">&#xe8b6;</i>
                                </button>
                            </form>

                    </div>


            <!--headerrightPart-->
                    <div class="headerrightbar">

                        
                        
                        <!--useraccount-->
                            <?php
                            if (isset($_SESSION['id']))
                            {
                                ?>
                                
                                    <a class="account"   href="SubPageUser.php">
                                   <i class="material-icons accounticon">&#xe851;</i>
                                    </a>
                                
                                <?php
                            }
                            else{
                                ?>
                                
                                    <a class="account tooltip" >

                                  <i class="material-icons accounticon">&#xe851;</i>

                                        <div class="tooltiptext">Login First</div>
                                    </a>
                                

                                <?php
                            }
                            ?>
               
                        <!--userwishlist-->

                            <?php
                            if(isset($_SESSION['id'])) {
                                ?>
                                
                                    <a class="wishlist" >
	  	 					<span onClick="document.getElementById('id04').style.display='block'" class="mywishlist">
  	 						<i class="material-icons wishlisticon">&#xe146;</i>
  	 						</span>
                                    </a>
                                
                                <?php
                            }else {
                                ?>

                               
                                    <a class="wishlist tooltip" >
	  	 					<span  class="mywishlist">
  	 						<i class="material-icons wishlisticon">&#xe146;</i>
  	 						</span>
                                        <div class="tooltiptext">Login First</div>
                                    </a>
                              
                                <?php
                            }
                            ?>



                            <!--wishlistpopup-->


                                <div id="id04" class="wishlist-popup">
                                    <div class="wishlist-popup-wrap">

                                <span onClick="document.getElementById('id04').style.display='none'" class="close1"
                                      title="Close Modal">&times;</span>
                                        <div class="logocontainer1">
                                            <img src="Pics/logo.svg"/>
                                        </div>

                                        <form enctype="multipart/form-data" action="action.php" method="post">

                                            <div class="prodimg">
                                                <span class="title">Product Image</span>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                                                <input name="file" id="file" type="file">
                                            </div>


                                            <div class="popup-right">


                                                    <span class="title">Product Name</span>
                                                    <input class="posttext" id="PostTitle" name="PostTitle" type="text">



                                                    <span class="title">Brand</span>
                                                    <input class="posttext" id="Brand" name="Brand" type="text">


                                                
                                                    <div class="tag1">
                                                        <span class="title">Tag1</span>
                                                        <select id="Tag1" name="Tag1" onchange="changetaglist()">
                                                            <option value="">Please select</option>
                                                            <option value="Beauty">Beauty</option>
                                                            <option value="Body">Body</option>
                                                            <option value="Fragrance">Fragrance</option>
                                                            <option value="Nail">Nail</option>
                                                        </select>
                                                    </div>

                                                   
                                                
                                                    <div class="tag2">
                                                        <span class="title">Tag2</span>
                                                        <select id="Tag2" name="Tag2"></select>
                                                    </div>
                                               
                                                
                                             
                                                <div class="prod-descri">
                                                    <span class="title">Product Description</span>
                                                    <textarea rows="4" cols="50" type="text" class="descritext" id="PostContent" name="PostContent" ></textarea>
                                                </div>
                                            </div>
                                            
                                                <button type="submit" id="post" name="post" class="wishlistsubmit">Submit
                                                </button>
                                            
                                            
                                        </form>

                                      <!--wishlistwrap--></div>

                                 <!--whishlistpopup modal--> </div>

                               

     <!--Login-->
                           <?php
                            if(isset($_SESSION['id'])) {
                                ?>
                            <form action="action.php" method="post">
                            <button id="logout" type="submit" name="logout" class="logout" >
	  	 						Logout
	  	 					</button >
                            </form>
                        
                          <?php
                            }else {
                                ?>
                                
	  	 					<button onClick="document.getElementById('id01').style.display='block'" class="loginbutton">
	  	 						Login
	  	 					</button>
                               
     
                            <!--Loginpopup-->

                            <div id="id01" class="modal"  >
                                <div class="modal-content">
                                    
                                    
                                        <span onClick="document.getElementById('id01').style.display='none'"
                                              class="close" title="Close Modal">&times;</span>
                                        <img class="imgcontainer" src="Pics/logo.svg" alt="logo" class="logo">

                                    <form class="container animate" action="action.php" method="post">
                                    
                                       
                                        
                                        
                                        
                                        <label><b>Email</b></label>
                                        <input type="text" placeholder="Enter Your Email" name="loginemail"
                                               id="loginemail" required>

                                        <label><b>Password</b></label>
                                        <input type="password" placeholder="Enter Your Password" name="loginpassword"
                                               id="loginpassword" required>

                                        <button type="submit" name="login" id="login">Login</button>

                                
                                </form>
                                
                        </div>
                            </div>
                           
                           <?php
                            }
                            ?>

                        
 <!--Register-->

	  	 					<button onClick="document.getElementById('id02').style.display='block'" class="registerbutton">
	  	 						Register
	  	 					</button>
                               

                            <!--Registerpopup-->




                            <div id="id02" class="modal">
                                
                                    <div class="modal-content"><span onClick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    
                                        <img class="imgcontainer" src="Pics/logo.svg" alt="logo" class="logo">
                                    <form class="animate" action="action.php" method="post">
                                    <div class="container">
                                        <label><b>Username</b></label>
                                        <input type="text" placeholder="Enter Your Username" name="inputusername" id="inputusername" required>
                                        
                                       

                                        <!--<div class="sex">
                                        <input type="checkbox" name="female">
                                        <label class="selsex"><b>Female</b></label>    
                                        <input type="checkbox" name="female">
                                        <label class="selsex"><b>Male</b></label> 
                                        </div>-->
                                        
                                        <label><b>Email</b></label>
                                        <input type="text" placeholder="Enter Your Email" name="inputemail"
                                               id="inputemail" required>
                                        
                                        <label><b>Password</b></label>
                                        <input type="password" placeholder="Enter Your Password" name="inputpassword" id="inputpassword" required>
                                        <div class="tag1">
                                                        <span class="title">Gender</span>
                                                        <select id="gender" name="gender" >
                                                            <option value="">Please select</option>
                                                            <option value="female">female</option>
                                                            <option value="male">male</option>
                                                        </select>
                                                    </div>

                                        <button type="submit" name="register" value="register">Register</button>

                                    </div>
                                   

                                </form>
 
                                </div>
                            
                        </div>


                        <!--headerrightbar--></div>

        </header>



            <!--Navigation-->


                <nav>
                    <ul class="menu">

                            <li>
                                
                                <a class="nav-text" title="Home"  href="MainPage.php">
                                    Home
                                </a>
                                
                            </li>

                            <li>
                            <a class="nav-text" href="SubPageCate.php?Category=Beauty">
                                Beauty
                            </a>

                            <ul class="drop-menu">
                                <li class="menu-text"><a href="SubPageCate.php?Category=Beauty&Sub=Face">Face</a></li>
                                <li class="menu-text"><a  href="SubPageCate.php?Category=Beauty&Sub=Eye">Eye</a></li>
                                <li class="menu-text"><a  href="SubPageCate.php?Category=Beauty&Sub=Lip">Lip</a></li>
                            </ul>

                            </li>

                            <li><a class="nav-text" href="SubPageCate.php?Category=Body">Body</a>
                            <ul class="drop-menu">
                                <li class="menu-text"><a  href="SubPageCate.php?Category=Body&Sub=Shampoo">Shampoo</a></li>
                                <li class="menu-text"><a  href="SubPageCate.php?Category=Body&Sub=Lotion">Lotion</a></li>
                            </ul>
                            </li>


                            <li><a class="nav-text" href="SubPageCate.php?Category=Fragrance">Fragrance</a>
                            <ul class="drop-menu">
                                <li class="menu-text"><a href="SubPageCate.php?Category=Fragrance&Sub=Man">Man</a></li>
                                <li class="menu-text"><a  href="SubPageCate.php?Category=Fragrance&Sub=Woman">Woman</a></li>
                            </ul>
                            </li>


                            <li>
                              
                                    <a class="nav-text"  href="SubPageCate.php?Category=Nail">Nail</a>
                             
                            </li>

                    </ul>
                </nav>
