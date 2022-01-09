function CheckAll(form)
{
    form = document.getElementById(form);

    for (var i = 0; i < form.elements.length; i++) {    
        eval("form.elements[" + i + "].checked = true ");  
    } 
}  

function unCheckAll(form)
{
    form= document.getElementById(form);

    for (var i = 0; i < form.elements.length; i++){    
        eval("form.elements[" + i + "].checked = false ");  
    } 
}