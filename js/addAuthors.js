let c = 0;

function addAuthor()
{
    let cont = document.getElementById('container');
    let inputF = document.createElement('input');
    let pF = document.createElement('p');
    let pL = document.createElement('p');

    inputF.type = 'text';
    inputF.name = 'authorFirst' + c;
    pF.innerHTML = "Имя автора:";
    cont.append(pF);
    cont.append(inputF);

    let inputL = document.createElement('input');
    inputL.type = 'text';
    inputL.name = 'authorLast' + c;
    pL.innerHTML = "Фамилия автора:";
    cont.append(pL);
    cont.append(inputL);

    c++;
}
function getCounter()
{
    let counter = document.getElementById('counter').value = c;
}
