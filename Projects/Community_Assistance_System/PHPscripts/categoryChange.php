<?php
    $category = $_POST['cat'];

    echo $category;

    if ($category == "All")
    {
    header('Location: ../volunteer.php?c=%');
    exit;
    }
    else if ($category == "Grocery")
    {
    header('Location: ../volunteer.php?c=Grocery');
    exit;
    }
    else if ($category == "Yardwork")
    {
    header('Location: ../volunteer.php?c=Yardwork');
    exit;
    }
    else if ($category == "Care")
    {
    header('Location: ../volunteer.php?c=Care');
    exit;
    }
    else if ($category == "Home Maintenance")
    {
    header('Location: ../volunteer.php?c=Home%20Maintenance');
    exit;
    }
    else if ($category == "Cleaning")
    {
    header('Location: ../volunteer.php?c=Cleaning');
    exit;
    }
    else if ($category == "Disaster Relief")
    {
    header('Location: ../volunteer.php?c=Disaster%20Relief');
    exit;
    }
    else if ($category == "Ride Share")
    {
    header('Location: ../volunteer.php?c=Ride%20Share');
    exit;
    }
    else if ($category == "Other")
    {
    header('Location: ../volunteer.php?c=Other');
    exit;
    }
    else 
?>