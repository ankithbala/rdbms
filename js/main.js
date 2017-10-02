
var itemdb=
{
    "A":{name:"ca-Cola", value: 28},
    "B":{name:"Tea", value: 15},
    "C":{name:"Coffee", value: 15},
"D":{name:"Paneer", value: 30},
"E":{name:"Naan", value: 60},
"F":{name:"Gobi", value: 50},
"G":{name:"Pina", value: 30},
"H":{name:"Sizz", value: 30},
"I":{name:"Dessert", value: 30}
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
    var table=document.getElementById("items");
    var row=table.insertRow(-1);
    var cells=[];
    for (var i=0;i<6;i++)
        cells.push(row.insertCell(-1));
    cells[0].innerHTML=id;
    cells[1].innerHTML=itemdb[id].name;
    cells[2].innerHTML="<input type='number' value="+itemdb[id].value+" min=1 name='value"+size+"' id='val"+size+"'>" ;
cells[3].innerHTML="<input type='number' value=1 min=1 name='amount"+size+"' id='amnt"+size+"' oninput='refreshPrice()'>";    
    

//cells[4].innerHTML=itemdb[id].value;



tablecontents[id]={quantity:document.getElementById("amnt"+size+""),price:cells[4]};


    size++;

	document.getElementById("max").value=size;
    refreshPrice();
}

