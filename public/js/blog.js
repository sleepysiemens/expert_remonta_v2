document.addEventListener('DOMContentLoaded', function(e) {
    function toggleMenu(e) {
      let target = e.target.classList.contains('top_level') ? e.target : e.target
      let submenu = target.querySelector('ul')
      if(!submenu) return
      //console.log(target.classList.contains('top_level'))
      if(target.classList.contains('top_level')) {
        target.classList.contains('active') 
        ? target.classList.remove('active') 
        : target.classList.add('active')
      }
      
      !submenu.classList.contains('hide') 
      ? submenu.classList.add('hide') 
      : submenu.classList.remove('hide')
    }
    let topLevelItems = document.querySelectorAll('.top_level')
    topLevelItems.forEach(item => {
      item.addEventListener('click', e => toggleMenu(e))
    })

    document.querySelector('#categories_btn').addEventListener('click', function(e) {
      console.log(e.target)
      e.target.classList.contains('active') 
      ? e.target.classList.remove('active')
      : e.target.classList.add('active')

      let list = document.querySelector('.blog_category ul.top_list')
      //list.style.display === 'none' ? list.style.display = 'block' : ''
      list.classList.contains('active') 
      ? list.classList.remove('active')
      : list.classList.add('active')
    })


    

})