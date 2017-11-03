var itemdb=
{
    "1":{name:"ca-Cola", value: 28},
    "2":{name:"Tea", value: 15},
    "3":{name:"Coffee", value: 15},
"4":{name:"Paneer", value: 30},
"5":{name:"Naan", value: 60},
"6":{name:"Gobi", value: 50},
"7":{name:"Pina", value: 30},
"8":{name:"Sizz", value: 30},
"9":{name:"Dessert", value: 30}
};

var grandtotal=document.getElementById("grandtotal");

var tablecontents={};

var size=0;

function refreshPrice()
{

    var total=0;   
    for(var itemid in tablecontents)
    {    

 var money=tablecontents[itemid].quantity.value*itemdb[itemid].value;
        tablecontents[itemid].price.innerHTML=money;
        total+=money;
    }
    document.getElementById("grandtotal").value=total;
}

function addItem(id)
{

    if(!itemdb.hasOwnProperty(id))
    {
        alert("Wrong Item ID");
        return;
    }
    if(tablecontents.hasOwnProperty(id))
    {
         tablecontents[id].quantity.value++;
        refreshPrice();
        return;
    }
    var hello=document.getElementById("items");
    var row=hello.insertRow(-1);
    var cells=[];
         for (var i=0;i<6;i++)
     {
        cells.push(row.insertCell(-1));
        

      }






    cells[0].innerHTML=id;
    cells[1].innerHTML=itemdb[id].name;
    cells[2].innerHTML="<input type='number' value="+itemdb[id].value+" min=1 name='value' id='val"+size+"'>" ;
cells[3].innerHTML="<input type='number' value=1 min=1 name='amount' id='amnt"+size+"' oninput='refreshPrice()'>";    
    

tablecontents[id]={quantity:document.getElementById("amnt"+size+""),price:cells[4]};


    size++;
    refreshPrice();

}

