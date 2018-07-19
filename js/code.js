//adiciona mascara ao telefone
function mascaraTelefone(telefone){
	if (telefone.value.length == 0)
		telefone.value = '(' + telefone.value;

	if (telefone.value.length == 3)
		telefone.value = telefone.value + ')';

	if(telefone.value.length == 9)
		telefone.value = telefone.value + '-';
}

function mascaraCpf(cpf){
  if(cpf.value.length == 3)
    cpf.value += '.';

  if(cpf.value.length == 7)
    cpf.value += '.';

  if(cpf.value.length == 11)
    cpf.value += '-';
}

function excecaoTeclas(e){
	tecla = e;
	if (tecla == 8 || tecla == 46)//tecla backspace e delete
		return true;
	else if (tecla == 37 || tecla == 39)//setas esquerda e direita
		return true;
	else if (tecla == 9 || tecla == 11)//tecla tab
		return true;
	else if(tecla == 116)//tecla f5
		return true;
}

function somenteNumero(e){
  tecla = (window.event)?event.keyCode:e.which;
  if((tecla > 47 && tecla < 58) || (tecla > 95 && tecla < 106))//teclas dos numeros
    return true;
	else if(excecaoTeclas(tecla))
		return true;
	else if(tecla == 144)//tecla num lock
		return true;
  else
    return false;
}

/*function somenteLetra(e){
	tecla = (window.event)?event.keyCode:e.which;
	if (tecla > 64 && tecla < 91)
	  return true;
	else if(excecaoTeclas(tecla))
		return true;
	else if(tecla == 32)//tecla espaço
		return true;
	else
	  return false;
}*/

function somenteLetra(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
        ((evt.which) ? evt.which : 0));
    if (charCode > 32 && (charCode < 65 || charCode > 90) &&
        (charCode < 97 || charCode > 122)) {
        alert("Digite apenas letras.");
        return false;
    }
    return true;
}
