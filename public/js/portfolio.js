var x = 0;
var totalPrice = 0;
var cartArray = Array();
var dataArray = Array();

$('.add').click(function () {
if ($(this).prev().val() < 200) {
$(this).prev().val(+$(this).prev().val() + 1);
  console.log($(this).prev().attr('id').replace('to',''));
  dataArray[$(this).prev().attr('id').replace('to','')-1].qty = $(this).prev().val();
}
});
$('.sub').click(function () {
if ($(this).next().val() > 1) {
if ($(this).next().val() > 1) {
  $(this).next().val(+$(this).next().val() - 1);
  dataArray[$(this).next().attr('id').replace('to','')-1].qty = $(this).next().val();
}
}
});

function partOne(){
dataArray = [{
  autoType:'SCANIA',
  name: 'Fuel filter',
  number : '2060-821',
  Country : 'Turkey',
  price: 100,
  qty:1
},{
  autoType:'SCANIA',
  name: 'Tube water pump',
  number : '7251-331',
  Country : 'Germany',
  price: 100,
  qty:1
},{

  autoType:'SCANIA',
  name:'Piston',
  number:'5061-228',
  Country:'Germany',
  price:100,
  qty:1
},{
autoType:'IVECO',
name: 'Sebaka',
number : '299-5665',
Country : 'Italy',
price:100,
qty:1
},{
autoType:'IVECO',
name: 'Piston',
number: '22850-040',
Country: 'Turkey',
price:100,
qty:1
},{
autoType:'IVECO',
name: 'Tube oil pump',
number: '4897-481',
Country: 'Italy',
price:100,
qty:1
},{
autoType:'MAN',
name: 'Tube water pump',
number: '567-2145',
Country: 'Germany',
price:100,
qty:1
},{
autoType: 'MAN',
name: 'Turbocharger',
number: '628-6891',
Country: 'Germany',
price:100,
qty:1
},{
autoType:'MAN',
name: 'Piston',
number: '1071-285',
Country: 'Germany',
price:100,
qty:1
}]

for(var i =0; i<dataArray.length;i++)
{
  var s = document.createElement("span");
  s.innerHTML = dataArray[i].autoType;
  var a = document.createElement("span");
  a.innerHTML =  dataArray[i].name;
  var b = document.createElement("span");
  b.innerHTML =  dataArray[i].number;
  var c = document.createElement("span");
  c.innerHTML =  dataArray[i].Country;
  var d = document.createElement("span");
  d.innerHTML =  dataArray[i].price;
  document.getElementById('autoType'+(i+1)).appendChild(s);
  document.getElementById('name11'+(i+1)).appendChild(a);
  document.getElementById('number'+(i+1)).appendChild(b);
  document.getElementById('Country'+(i+1)).appendChild(c);
  document.getElementById('price'+(i+1)).appendChild(d);
}
  }


function updateReciept(){ 
  var tP = document.getElementById("tPrice");
  if(typeof(tP) != 'undefined' && tP != null){
    tP.parentNode.removeChild(tP);
  }

  for(var index=0;index<cartArray.length;index++){
    alert(cartArray[index].name);

    var tr = document.createElement("tr"); //Starting Row
	
    var td1 = document.createElement("td"); // First Element ( Car Model )

    td1.innerHTML = cartArray[index].autoType;

    var td2 = document.createElement("td"); // Second Element ( Item )

    td2.innerHTML = cartArray[index].name;

    var td3 = document.createElement("td"); // Third Element ( Part Number )

    td3.innerHTML = cartArray[index].number;

    var td4 = document.createElement("td"); // Fourth Element ( Unit Cost ) ## El hya price bardo msh fahem :)
    
    td4.innerHTML = cartArray[index].price;

    var td5 = document.createElement("td"); // Fifth Element ( Qty )
    
    td5.innerHTML = cartArray[index].qty;
    
    var td6 = document.createElement("td"); // Sixth Element ( Price )

    td6.innerHTML = cartArray[index].qty*cartArray[index].price;

    totalPrice += cartArray[index].qty*cartArray[index].price; // Total Price
    totalPrice+=totalPrice*0.14;
    tr.appendChild(td1);

    tr.appendChild(td2);

    tr.appendChild(td3);

    tr.appendChild(td4);

    tr.appendChild(td5);

    tr.appendChild(td6);
        
    document.getElementById("items").appendChild(tr);
  }

  // Total Price Row 

  var tr = document.createElement("tr"); //Starting Row

  tr.setAttribute("id", "tPrice");
	
  var td1 = document.createElement("td"); // Total Price Lbl

  td1.innerHTML = "Total Price";

  var tdE1 = document.createElement("td");
  var tdE2 = document.createElement("td");
  var tdE3 = document.createElement("td");
  var tdE4 = document.createElement("td");
  
  var td2 = document.createElement("td"); // Total Price Val
  
  td2.innerHTML = totalPrice;

  tr.appendChild(td1);

  tr.appendChild(tdE1);
  tr.appendChild(tdE2);
  tr.appendChild(tdE3);
  tr.appendChild(tdE4);

  tr.appendChild(td2);
 
  document.getElementById("items").appendChild(tr);
}

function addToCart(index){
  cartArray.push(dataArray[index]);
  updateReciept();
}
