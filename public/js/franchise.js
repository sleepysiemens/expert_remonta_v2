function mobileOrTablet() {
  let check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};

// при наведении на заголовок показываем подсказку
 let calcHeading = document.querySelector('#fr_page_calc .fr_page_heading')
 let calcHint = document.querySelector('#calc_hint')
 /*calcHeading.addEventListener('mouseover', function(e) {
    calcHint.style.display = 'block'
    setTimeout(() => {calcHint.classList.add('show')}, 100)
 })
 calcHeading.addEventListener('mouseout', function(e) {
  calcHint.classList.remove('show')
  setTimeout(() => {calcHint.style.display = 'none'}, 300)
})*/
if(!mobileOrTablet()) {
  $( "#fr_page_calc .fr_page_heading" ).hover(
    function(event) {
      if(event.target.id !== 'calc_hint') $('#calc_hint').slideDown(200);
    }, 
    function(event) {
      if(event.target.id !== 'calc_hint') $('#calc_hint').slideUp(200);
    }
  );
} else {
  $('#calc_hint i').show()
  $( "#fr_page_calc .fr_page_heading" ).click(
    function() {$('#calc_hint').slideToggle(200);}
  );
}

$( "#calc_hint i" ).click(
  function(event) {
    event.stopPropagation();
    $('#calc_hint').slideUp(200);
  }
);


      let option = document.querySelector('.fr_page_form select option:nth-of-type(1)')
      option.textContent = option.textContent + " (занято)"
      option = document.querySelector('.fr_page_form select option:nth-of-type(2)')
      option.textContent = option.textContent + " (занято)"

      document.addEventListener('click', function(event) {
  if(event.target.classList.contains('spoiler-title')) {
    let spoiler = event.target.parentNode

    if(spoiler.classList.contains('active')) {
      spoiler.classList.remove('active') 
    }
    else {
      spoiler.classList.add('active')
    }
  }
})

const rangeInput = document.querySelector('input[type="range"]')
calcObjectsCount(1500000)

rangeInput.addEventListener('input', e => {
  let percent = (Math.round(100 / (4000000 / Number(e.target.value))) - 25)
  percent = percent <= 100 ? percent : 100
  percent -= 5
  if(percent > 75) percent -= 5
  if(percent > 85) percent -= 5
  //console.log(percent)
  document.querySelector('#rangevalue').value = e.target.value + " ₸"
  document.querySelector('#rangevalue').style.left = `${percent}%`
  if(percent > 84) document.querySelector('#rangevalue').style.fontSize = '16px'
  else document.querySelector('#rangevalue').style.fontSize = '18px'
  calcObjectsCount(Number(e.target.value))
})

function calcObjectsCount(money, idx = null) {
  let initialMoney = money
  // money это инвестиции, значение которое приходит из инпута
  // отнимаем сразу 500к на подготовку
  // оплата труда административного преснола, по месяцам
  let adminPresnol = [0, 40000, 60000, 80000, 80000, 120000, 120000, 120000, 120000, 120000, 120000, 120000]
  // бюджет на маркетинг начиная с 40 месяца
  let marketingBudget = [0, 0, 0, 50000, 50000, 100000, 100000, 100000, 100000, 100000, 100000, 100000, 100000, 100000, 100000]
  // роялти процент начиная с 4го месяца
  //let royalty = [0, 0, 0, 10, 9, 8, 7, 7, 7, 6, 5, 5]
  let royalty = [0, 0, 0, 0.1, 0.09, 0.08, 0.07, 0.07, 0.07, 0.06, 0.05, 0.05]
  money -= 500000
  let objectAvgCheck = 250000 // средний чек объекта, сказали что 250к, в экселе 300к
  let objectIncome = 100000 // средний доход с одного объекта в мес
  let profit = 0
  let totalObjectsCount = 0
  let totalIncome = 0
  let royaltyBonus = 0
  let maxObjects = 12
  // формат 1 : { new: 2, inWork: 2 }
  let objectsInWork = { }
  for(let i = 1; i <= 12; i++) {
    // вычислим сколько объектов можно взять в этом месяце
    let objectsToWork = Math.floor(money / objectAvgCheck)
    // не берем больше 12-ти объектов
    if(objectsToWork > maxObjects) objectsToWork = maxObjects
    //money = money - (objectsToWork * objectAvgCheck) + (objectsToWork * objectAvgCheck + 100000)
    //money += objectsToWork * 100000
    // заполним объекты в работе (как в экселе)
    objectsInWork[i] = { new: objectsToWork, inWork: i === 1 ? objectsToWork : objectsInWork[i-1].inWork + objectsToWork}
    // здесь еще начиная с 3го месяца нужно корректировать объекты в работе, старые сливаем
    if(i >= 3) {
      objectsInWork[i].inWork -= objectsInWork[i-2].new
    }
    let monthIncome = objectsInWork[i].inWork * objectIncome
    let monthPureProfit = monthIncome // чистая прибыль месяца
    // вычисляем доход от объектов
    if(i >= 4) {
      //royaltyBonus = monthIncome * ((royalty[i-1] / 100) * 10)
      royaltyBonus = (monthIncome * royalty[i-1]) * 0.4
      money += royaltyBonus, monthPureProfit += royaltyBonus
    }
    monthIncome += royaltyBonus
    totalIncome += monthIncome
    money += monthIncome
    // отнимаем Оплата труда Административного преснола
    money -= adminPresnol[i-1], monthPureProfit -= adminPresnol[i-1]
    // отнимаем зп рабочим
    money -= monthIncome * 0.45, monthPureProfit -= monthIncome * 0.45
    // отнимаем 15к на налоги всегда
    money -= 15000, monthPureProfit -= 15000
    // начиная с 3го месяца отнимаем еще и всегда разные расходы
    if(i >= 3) {
      money -= 47500, monthPureProfit -= 47500
    }
    // в 3й месяц отнимаем за мебель и оборудку 
    if(i === 3) money -= 150000, monthPureProfit -= 150000
    // отнимаем бюджет на маркетинг
    money -= marketingBudget[i-1], monthPureProfit -= marketingBudget[i-1]
    // начиная с 4го месяца учитывпем роялти
    profit += monthPureProfit
    totalObjectsCount += objectsInWork[i].new

    if(idx && i === idx) {
      return {
        totalObjectsCount: totalObjectsCount,
        monthObjects: objectsInWork[i],
        monthIncome: monthIncome,
        totalIncome: totalIncome,
        inbestmentsReturn: money - initialMoney,
        monthPureProfit: monthPureProfit,
        profit: profit,
        royaltyBonus: royaltyBonus
      }
    }
  }
  //totalIncome = money - initialMoney
  if(initialMoney > 3500000) {
    moneyRest = initialMoney - 3500000
    totalIncome += moneyRest * 3
    profit += moneyRest * 1.4
  }

  const table = document.querySelector('.fr_page_calc table')
  document.querySelector('.fr_page_calc table tr:nth-of-type(2) td:nth-of-type(2)').textContent = Math.floor(totalObjectsCount * 0.4)
  document.querySelector('.fr_page_calc table tr:nth-of-type(3) td:nth-of-type(2)').textContent = totalIncome
  document.querySelector('.fr_page_calc table tr:nth-of-type(4) td:nth-of-type(2)').textContent = profit
  // для 2го года пока подсчет моковый
  document.querySelector('.fr_page_calc table tr:nth-of-type(2) td:nth-of-type(3)').textContent = Math.floor(totalObjectsCount * 0.4 * 1.6)
  document.querySelector('.fr_page_calc table tr:nth-of-type(3) td:nth-of-type(3)').textContent = Math.floor(totalIncome * 1.6)
  document.querySelector('.fr_page_calc table tr:nth-of-type(4) td:nth-of-type(3)').textContent = Math.floor(profit * 1.6)
}

