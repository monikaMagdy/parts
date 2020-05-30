<?php

include"View.php";

class ViewCart extends View
{
 public function output()
 {
   $str=' <!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auto spare parts</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

      <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Your cart</h2>
          <h3 class="section-subheading text-muted">Add to Cart</h3>
        </div>
      </div>
      
       <table id="items">
        <tr >
            <td>
              PartNumber :
            </td>
            <td>
              PartName :
            </td>
            <td>
              quantity:
            </td>
            <td>
              ItemPrice:
            </td>
            <td>
              TotalPrice:
            </td>
            <td>
              Total Price with taxis:
          </td>
           
            </tr>';
     foreach ($this->model-> getCarts() as $cart) 
    {
      $str.="<tr>";
      $str.="<td ><label name='PartNumber'>".$cart->getpartNumber()."</label></td> ";
      $str.="<td ><label name='PartName'>".$cart->getPartName()."</label></td> ";
      $str.="<td ><label name='Quantity'>".$cart->getpartQuantity()."</label></td> ";
      $str.="<td ><label name='itemPrice'>".$cart->getPartPrice()."</label></td> ";
      $str.="<td ><label name='TotalCost'>".$this->model->gettotalPrice()."</label></td> ";
      $str.="<td ><label name='TotalCost'>".$this->model->gettotalPriceWithTax()."</label></td> ";

      /* $str.="<td>
      <a href='exportIndex.php?action=delete&id=".$export->getExportID()."'>Delete</a>
      </td>
      ";*/
    }
      $str.='
      </table>
     
     
            </div>
          </div>
        </div>
      </div>
      

      ';
      $str.="<form method='post' action='exportIndex.php'>
      <div class='container'>
        <div class='row-2'>
          <div class='col-lg-3 mx-auto'>
       <div class='modal-body'>
        <button id= 'back' class='btn btn-primary btn-xl text-uppercase'' name= 'back' type='submit'> back            </button>
 </form>";

      return $str;
    }

    function add_to_Cart(){

    }
  }
  ?>