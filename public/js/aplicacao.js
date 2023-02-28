
function excluirPaciente(id){
    if(confirm("Deseja excluir esse Paciente?")){
        window.location.assign("delete-paciente/"+id)
    }
}
