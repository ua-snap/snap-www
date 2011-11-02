<?php
    include("connect.php");

    
?>
<style>
html {
    margin: 0px;
    padding: 0px;
    border: 0px;
}
body {
    background-color: #6a7173;
    margin: auto;
    width: 800px;
    color: #ffffff;
    font-size: 18px;
    font-family: sans-serif;
    border: 0px;
    margin: 0px;
    padding: 0px;
}
label {
    clear: both;
    width: 125px;
    float: left;
text-align: right;
margin-right: 0.5em;
display: block
}
</style>
<html>

    <body>  
        <div>
        <?php
            if ($_POST['first'] && $_POST['email']){
                $query = "INSERT INTO people (title, first, middle, last, position, organization, staffgroup, email, phone, fax, image) 
                    VALUES ('".$_POST['title']."', '".$_POST['first']."', '".$_POST['middle']."', '".$_POST['last']."', 
                        '".$_POST['position']."', '".$_POST['organization']."', '".$_POST['staffgroup']."', 
                        '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['fax']."', '".$_POST['image']."'
                    )";
                $result = mysql_query($query) or die(mysql_error());
            }
        ?>
        <form method="post" action="people_submit.php"> 
            <div style="margin-top: 20px; width: 400px; text-align: right;">
                <div>Honorific: <input name="title" /></div>
                <div>First: <input name="first" /></div>
                <div>Middle: <input name="middle" /></div>
                <div>Last: <input name="last" /></div>
                <div>Job Title: <input name="position" /></div>
            </div>
            <div style="margin-top: 20px; width: 400px; text-align: right;">
                <div>Organization: <input name="organization" /></div>
                <div>Staff Group: <select name="staffgroup">
                    <option value="1">Leaders</option>
                    <option value="2">Research Staff</option>
                    <option value="3">Core Staff</option>
                    </select>
                </div>
            </div>
            <div style="margin-top: 20px; width: 400px; text-align: right;">
                <div>Email: <input name="email" /></div>
                <div>Phone: <input name="phone" /></div>
                <div>Fax: <input name="fax" /></div>
                <div>Image URL: <input name="image" /></div>
            </div>
            <div style="margin-top: 20px; width: 400px; text-align: right;">
                <input type="submit" />
            </div>
        </form>
        </div>
    </body>

</html>
