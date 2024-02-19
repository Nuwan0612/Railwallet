<?php require APPROOT . '/views/user/includes/header.php';?>
<div class="container-main">
        <div class="container2">
            <div class="container3">
            
    <div class="wrapperBooking">
        <div class="select-btn">
            <span class="Select Station">Departure Station</span>
            <i class="uil uil-angle-down"> </i>
        </div>
        <div class="content1">
            <div class="search">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="search" id="searchInput1">
            </div>
            <ul class="options" id="options1">
            </ul>
        </div>
    </div>

    <div class="wrapper2">
        <div class="select-btn2">
            <span class="Select Station">Arrival Station</span>
            <i class="uil uil-angle-down"> </i>
        </div>
        <div class="content2">
            <div class="search2">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="search" id="searchInput2">
            </div>
            <ul class="options2" id="options2">
            </ul>
        </div>
    </div>
    </div>
    <div class="date">
        <input type="date">
    </div>
   
<div class="text">
<input type="button" value="Search" id="btn">
</div>
</div>


</div>
</div>
    <?php require APPROOT . '/views/user/includes/footer.php';?>   