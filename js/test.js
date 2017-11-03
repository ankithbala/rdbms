var itemdata={
    1:["Pen",5],
    2:["Pencil",3]
};

var orderitem={};
var tablePointer=[];
init();
function init()
{
    //get data fron db itemdata
    var selectdata="";
    for(var i in itemdata)
    {
        selectdata+=
        "<option value="+i+">"+itemdata[i][0]+" : "+itemdata[i][1]+"</option>\n";
    }
    var itemSelect=document.getElementById("itemSelection");
    itemSelect.innerHTML=selectdata;

}
function addItem(id)
{
    if(orderitem.hasOwnProperty(id))
    {
        orderitem[id]+=1;
    }
    else
    {
        orderitem[id]=1;
    }
    var itemTable=document.getElementById("itemTable");
    var newRow=itemTable.insertRow(-1);
    var newCell=newRow.insertCell(-1);
    newCell.innerHTML=id;
    var newCell=newRow.insertCell(-1);
    newCell.innerHTML=itemdata[id][0];
    var newCell=newRow.insertCell(-1);
    newCell.innerHTML=itemdata[id][1];
    var newCell=newRow.insertCell(-1);
    newCell.innerHTML="<input type=number id=quantity"+id+"></input>";
    var newCell=newRow.insertCell(-1);
    tablePointer[id]={quantity:document.getElementById("amnt"+id+""),price:newCell};
    refresh();
}
function refresh()
{
    var total=0;
    for(var i in tablePointer)
    {
        tablePointer[i].quantity=orderitem[i];
        var price=itemdata[i][1];
        tablePointer[i].price.innerHTML=price;
        total+=price;
    }
    var grandTotalField=document.getElementById("grandTotal");
    grandTotalField.value=total;
}
function ajx()
{
    var jsonArray=JSON.stringify(orderitem);
    
var obj, dbParam, xmlhttp, myObj, x, txt = "";
//obj = { "table":"customers", "limit":10 };
//dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        for (x in myObj) {
            txt += myObj[x].name + "<br>";
        }
        document.getElementById("demo").innerHTML = txt;
    }
};
xmlhttp.open("POST", "jsonp.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + jsonArray);

alert(jsonArray);
}

function addButtonPressed()
{
    var itemSelect=document.getElementById("itemSelection");
    var itemId=parseInt(itemSelect.value);
    addItem(itemId);
}

function submitPressed()
{
    ajx();
}
