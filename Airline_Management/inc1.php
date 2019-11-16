<div class="container" style="margin-top:30px;">
            <div class="row" style="">
           
                <div class="col-sm-12" style="">
                <img src="planel.png" style="  display: block;
    margin: auto;"><br>
            <form action="flight_search.php" style="padding-top:30px;text-align:center;">
            <input type="text" placeholder="From" name="ffrom" style="border:0px; font-size:30px;"><br>
            <input type="text" placeholder="To" name="fto" style="border:0px; font-size:30px;"><br>
            <input type="date" name="fdate" style="border:0px; font-size:30px;" min="<?php echo date("Y-m-d"); ?>" max="2018-02-01"><br>
                
                <button type="submit" style="padding:0px; margin-top:10px;width:100px; height:30px; background-color:#fff; border:1px solid #e3e3e3; font-size:16px; border-radius:15px;"><b>Search</b></button>
            </form>
                </div>
            
            
        </div>
        </div>