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
      </div>';
  
     $str.='<table id="items">
      <tr>
       
            <td>
              PartNumber 
            </td>
            <td>
              PartName 
            </td>
            <td>
              Quantity
            </td>
            <td>
              ItemPrice
            </td>
            <td> 
              Delete Cart
            </td>
            <!---
            <td>
              total Parts
            </td>
            <td>
              Total Price
          </td>----->
           
            </tr>';
            
     foreach ($this->model->getCarts() as $cart) 
     {
     
      /*$str.="<td><select name='company'>";
      $company =$mysqli->query("SELECT * FROM company;");
      while($row ->fetech_assoc ())
      {

        echo"<option name='companyName' value='".$row['CompanyName']."'></option>";
      }
  $str.="<td></td>";*/
         $str.='</select></td>';
         $str.="<td ><label name='PartNumber'>".$cart->getpartNumber()."</label></td> ";
         $str.="<td ><label name='PartName'>".$cart->getPartName()."</label></td> ";
         $str.="<td ><label name='Quantity'>".$cart->getpartQuantity()."</label></td> ";
         $str.="<td ><label name='itemPrice'>".$cart->getPartPrice()."</label></td>";
         $str.="
      <td>
      <div class='portfolio-caption'>
              <div class='btn-group btn-group-lg'>
                <button type='submit' class='btn btn-primary btn-xl
                 name='delete' id='delete' 
                 onclick='\"location.href='Cart.php?action=delete&cartID=".$cart->getid()."'\">
                Delete</button>
              </div>
            </div>";
         $str.="</tr>";
     }
    
     $str.="

      <tr>
      <td><label name='totalParts'>total Parts:</td> <td></td><td>".$this->model->gettotalPrice()."</td><td></td>
      </tr>
      <tr>
       <td><label name='totalPrice'>Total Price: </td><td></td><td>".$this->model->gettotalPriceWithTax()."</td><td></td>
      </tr>
      <tr>
      <td><label name='AddCompanyID'>Please enter Company ID: </td><td></td><td><form action='Cart.php?action=getCompanyId&CompanyId=' method='post'>
      <input type='text' id='CompanyId' name='CompanyId' value='1'>
       <button type='submit'  class='btn btn-warning btn-block' name='id' id='id'>Add</button><br>
       </form>'</td><td></td>
     </tr>
     
      </table>
      <tr>
      <div class='portfolio-caption'>
              
            </div>
            </form>
     
     
            </div>
          </div>
        </div>
      </div> ";
     foreach ($this->model->getCarts() as $cart) 
     {
         $str.="
      <div class='container'>
        <div class='row-2'>
          <div class='col-lg-3 mx-auto'>
       <div class='modal-body'>
       <div class='btn-group btn-group-lg'>


       <button type='submit' class='btn btn-primary btn-xl name='submit' id='submit'  onclick=\"location.href='exportIndex.php?action=export'\" > Export</button>
       <button id= 'back' class='btn btn-primary btn-xl text-uppercase' name= 'back' type='submit' onclick=\"location.href='Car.php'\"> back</button>";
         if ($_GET['exported']==true) {
             $str.="
       <button id= 'payment' class='btn btn-primary btn-xl text-uppercase' name= 'payment' type='submit' onclick=\"location.href='cart.php?action=deletecart&partNumber=".$cart->getpartNumber()."&Qty=".$cart->getpartQuantity()."&cartID=".$cart->getid()."'\"> payment</button>
     </div>";
         }
     
         return $str;
      }
 }
  }
  ?>
 