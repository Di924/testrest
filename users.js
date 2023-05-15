function ClassTH(value, elem, type){
    this.element = document.createElement(type);
    this.element.innerHTML = value;
    elem.appendChild(this.element);//Добавляем ячейку
    // this.element.colSpan = colspann;
}

function delTR(tr) {
    console.log(tr);
    var table = document.querySelector('.staff-table');
    console.log(table);
    console.log(tr.rowIndex);
    table.deleteRow(tr.rowIndex);
}

function AddTR(){
    // Сделать ограничение
    var table = document.querySelector('.staff-table');

    arrTR = ['', 
    `<div class="input-box">
        <input type="text" name="lname" placeholder=" " id="">
        <label>Фамилия</label>
    </div>`,            
    `<div class="input-box">
        <input type="text" name="fname" placeholder=" " id="">
        <label>Имя</label>
    </div>`,
    `<div class="input-box">
        <input type="text" name="mname" placeholder=" " id="">
        <label>Отчество</label>
    </div>`,
    `<div class="input-box">
        <input type="text" name="login" placeholder=" " id="">
        <label>Логин</label>
    </div>`,
    `<div class="input-box">
        <input type="text" name="password" placeholder=" " id="">
        <label>Пароль</label>
    </div>`,
    `<div class="input-box">
        <input type="text" name="photoFile" placeholder=" " id="">
        <label>Фотография</label>
    </div>`,
    `<div class="input-box">
        <input type="text" name="roleId" placeholder=" " id="">
        <label>Должность</label>
    </div>`,
    `<button>Зап.</button>`, 
    `<button onclick="delTR(this.parentNode.parentNode);">Уд.</button>`];

    newRow = document.createElement('tr');
    table.appendChild(newRow);
    for (i = 0; i<arrTR.length; i++) {
        new ClassTH(arrTR[i], newRow,'td');
    }
}