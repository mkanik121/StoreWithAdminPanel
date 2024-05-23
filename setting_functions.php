
<?php include('inc/db.php'); 


// Contact Query
if(isset($_GET['contact'])){
   
      $id = $_GET['id'];
    $Title = $_POST['title'];
    $Desc = $_POST['description'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];
    $Copy = $_POST['copyright'];
    $Address = $_POST['address'];

    $query = "UPDATE settings SET SiteTitle='$Title', Description='$Desc', Phone='$Phone', Email='$Email', Notice='$Copy', Address='$Address' Where id='$id'";
    $sql = mysqli_query($db,$query);

    if($sql){
        header('location:settings.php');
    }else{
        die('mysqli error'. mysqli_error($db));
    }

};



// Social Query
if(isset($_GET['social'])){
    $id = $_GET['id'];
    $Facebook = $_POST['facebook'];
    $Google = $_POST['google'];
    $Youtube = $_POST['youtube'];
    $Linkedin = $_POST['linkedin'];
    $Twitter = $_POST['twitter'];
    $Whatsapp = $_POST['whatsapp'];
    $query = "UPDATE settings SET Facebook='$Facebook', Google='$Google', Youtube='$Youtube', Linkedin='$Linkedin', Twitter='$Twitter', Whatsapp='$Whatsapp' Where id='$id'";
    $sql = mysqli_query($db,$query);

    
    if($sql){
        header('location:settings.php');
    }else{
        die('mysqli error'. mysqli_error($db));
    }
}


// Logo Query
if(isset($_GET['logo'])){
    $id        = $_GET['id'];
    $Header    = $_FILES['header_logo']['name'];
    $HeaderTmp = $_FILES['header_logo']['tmp_name'];
    $Footer    = $_FILES['footer_logo']['name'];
    $FooterTmp = $_FILES['footer_logo']['tmp_name'];
    $row = mysqli_query($db, "SELECT * FROM settings Where id='$id' ")->fetch_assoc();
    $DeleteHeaderImage = $row['HeaderLogo'];
    $DeleteFooterImage = $row['FooterLogo'];

    if(!empty($Header) || empty($Footer)){
            $Header = rand(1,502120).'_'.$Header;
            move_uploaded_file($HeaderTmp,'inc/images/logo/'.$Header);
            $query  = "UPDATE settings SET HeaderLogo='$Header' Where id='$id'";
            $sql = mysqli_query($db,$query);
            if($sql){
                header('location:settings.php');
            }else{
                die('mysqli error'. mysqli_error($db));
            }
            unlink('inc/images/logo/'. $DeleteHeaderImage);
    }

    if(empty($Header) || !empty($Footer)){
            $Footer = rand(1,502120).'_'.$Footer;
            move_uploaded_file($FooterTmp,'inc/images/logo/'.$Footer);
            $query  = "UPDATE settings SET FooterLogo='$Footer' Where id='$id'";
            $sql = mysqli_query($db,$query);
            if($sql){
                header('location:settings.php');
            }else{
                die('mysqli error'. mysqli_error($db));
            }
            unlink('inc/images/logo/'. $DeleteFooterImage);
    }

}


?>