function confirmUpdate(){
    
    if(confirm("Deseja alterar os dados cadastrados?"))
        return true;
    else
        return false;  
}
function confirmDelete() {
    if(confirm("Deseja apagar os dados cadastrados?"))
        return true;
    else
        return false;  
}
function topo(ID) {
    document.getElementById(ID).focus;
}