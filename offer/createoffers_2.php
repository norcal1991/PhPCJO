<!-- Header end from BasicPageHeader.tpl -->

<html>
    <head>
        <title>CJO </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Compare Jobs Offers" />
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/tabstyle.css">
        <link rel="stylesheet" type="text/css" href="../css/userstyle.css">
    </head>
   
<body>
    
<?php

    require_once('../includes/database.php');  

    $_SESSION['BaseSalary'] = $_POST['basesalary'];
    $_SESSION['Pto']        = $_POST['pto'];
    $_SESSION['SignBonus']  = $_POST['signbonus'];
    $_SESSION['Stocks']     = $_POST['stocks'];
    $_SESSION['Pension']    = $_POST['pension'];
    
    session_start();

    $_SESSION['offer_count'] = 1;

    $mysqli = db_connect();

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    } 

    $query   = "select * from location ";             
    $result  = $mysqli->query($query);
?>    

<div id="container">
   <div id="intro">
       <div id="pageHeader">
               <div id="sitename">
                   <h1>&nbsp;&nbsp;CompareJobOffers</h1>
               </div>          
       </div>
   </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
  
<div align="center">
    <div class="tabbable">
        <ul class="tabs">
            <li><a href="../index/.php" 
                   style="background-color: #f2f2f2; color: black" >
                    <b>Home</b>
                </a>
            </li>
            <li><a class="active" ><b>Create Job Offers</b></a></li>
            <li><a href="./compareoffers.php"><b>Compare Job Offers</b></a></li>
            <li><a href="./evaloffer.php"><b>Evaluate an Offer</b></a></li>
            <li><a href="./convertoffers.php"><b>Convert to Hourly Wages</b></a></li>
            <li><a href="./viewprintoffers.php"><b>View or Print Offer(s)</b></a></li>
        </ul>           
   
    <table width="1200"> 
            <td width="20%">                 
                <br><br><br>          
                <?php include '../includes/nav_links.php'; ?>                          
            </td>
            <td width="80%" align="left"  valign="top" >
                <br><br>
                <h1 id="caption_h1">Create Job Offers</h1>
                <table border="0" id="cojformtable">                  
                <tr>                       
                    <td colspan="2" align="center">                    
                        <h1 id="title_h1">Job Relocation</h1>'                                   
                        <form action="" method="POST" >
                        <?php                            
                            if ($_POST['reimburse'] == 'No'){
                                header('Location: ./db/insertofferDb.php');
                              } else {
                                echo '';                                     
                              }
                        ?>
                        <table border="0" width="600" style="background-color: white">
                            <tr >
                              <td colspan="3" height="20">
                              </td>
                            </tr>                             
                            <tr height="30">
                                <td width="10%" >
                                </td>
                                <td width="30%" style="font-family: Times New Roman; font-size: 15px">
                                  Relocating to<font color="red">*</font> 
                                </td>
                                <td width="60%" style="font-family: Times New Roman; font-size: 15px">
                                    <select name="locationID" style="width: 180px; height: 25px" >
                                        <option value="">--- Choose ---</option>
                                       <?php while($row = mysqli_fetch_array($result)) { ?>
                                        <option value="<?php echo $row['LocationID']; ?>">
                                                       <?php echo $row['Name']; ?>  
                                        </option>
                                        <?php } ?>
                                    </select>
                               </td>
                            </tr>                          
                           <tr height="30">
                                <td width="10%" >
                                </td>
                                <td width="20%" style="font-family: Times New Roman; font-size: 15px">
                                  Paid reimbursement<font color="red">*</font>
                                </td>
                                <td width="70%" style="font-family: Times New Roman; font-size: 15px">
                                    <select name="reimbursed" style="width: 52px; height: 25px" >
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                               </td>
                            </tr>                          
                            <tr height="30">
                                <td width="10%" >
                                </td>
                                <td width="30%" style="font-family: Times New Roman; font-size: 15px">
                                    Reimbursement amount<font color="red">*</font>
                                </td>
                                <td width="60%" style="font-family: Times New Roman; font-size: 15px">
                                   <input type="text" name="paidreimburse" value="" size="8" />
                               </td>
                            </tr>                          
                            <tr height="20">
                                <td colspan="3" >
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr>
                     <td colspan='2' height="60" align="center" valign="top" 
                       style="font-family: Times New Roman; font-size: 20px;" >
                        <input type="button" value="BACK" 
                        onclick="window.location.href='./createoffers_1.php'"                          
                        style="color: white; height: 32px; width: 135px; 
                        background-color:  DodgerBlue" />

                        <input type="submit" value="CONTINUE"  
                        style="color: white; height: 32px; width: 135px; 
                        background-color:  DodgerBlue" />
                        <br><br>
                     </td>
                 </tr>
            </table>
        </form>
        </td>
        </tr>
    </table>
</div>

</div>
</body>
</html>