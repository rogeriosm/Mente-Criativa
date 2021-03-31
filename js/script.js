//criar conta aluno
function cadastrarAluno(login){
        var instlogin = login;
        var nome = prompt ("Qual é o seu nome?");
        if (nome!== null && nome !== ""){
            if (confirm('O nome esta correto? '+ nome)) {
                window.location.href = '/projetoFinal/controller/cadastrarAlunoController.php?aluno='+nome+'&login='+instlogin;
            } else {
                alert('Não cadastrado');
            }
        }
}

//excluir conta usuario
function excluirUsuario(login, tipo){
    if (confirm('Deseja excluir essa conta??')) {
        window.location.href = '/projetoFinal/controller/excluirUsuarioController.php?id='+login+'&tipo='+tipo;
    } 
}

//excluir aluno da lista de alunos da instituição
function excluirAluno(aluno,nome){
    if (confirm('Deseja excluir esse aluno? '+nome)) {
        window.location.href = '/ProjetoFinal/controller/excluirAlunoController.php?id='+aluno;
    } 
}

//excluir amigo da lista de amigos
function excluirAmigo(amigo_login,nomeAmigo,login_usuario){
    
    if (confirm('Deseja excluir esse Amigo? '+nomeAmigo)) {
        window.location.href = '/ProjetoFinal/controller/excluirAmigoController.php?idamigo='+amigo_login+'&idminha='+login_usuario;
    } 
}