// https://developer.mozilla.org/en-US/docs/Glossary/Base64#the_unicode_problem 
function base64ToBytes(base64) {
    const binString = atob(base64);
    return Uint8Array.from(binString, (m) => m.codePointAt(0));
  }
  
  function bytesToBase64(bytes) {
    const binString = String.fromCodePoint(...bytes);
    return btoa(binString);
  }
          function updateContent(html) {
            //console.log(bytesToBase64(new TextEncoder().encode(html)));
            //console.log(btoa(html))
            //return
            //let content = bytesToBase64(new TextEncoder().encode(html))
            
          const headers = new Headers({
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': `{{csrf_token()}}`
          });
            fetch(`/admin/dynamic-page/franchise`, {
              method: 'PUT',
              headers,
              // да, надо весь body превращать в json
              body: JSON.stringify({page: 'franchise', html: html})
          }).then(response => {
            //response.json()
            console.log('updated')
          })
          }
          let app = document.querySelector('#app')
          app.childNodes.forEach(node => {
            if(node.tagName !== undefined) {
              node.setAttribute('contenteditable', true)
              // только не на инпут бы, а на ctrl + s сделать
              node.addEventListener('input', e => {
                // вычищать надо будет contenteditable
                //console.log(e.target.parentNode.innerHTML)
                updateContent(e.target.parentNode.innerHTML)
                //console.log(e)
                //console.log(e.target.innerHTML)
                // даже скорее e.target.parentNode.innerHTML
                // ага, и вот здесь надо делать ajax запрос на редактирование html, огонь!
                // ну и надо завести табличку для хранения кода динамических страниц
              })
            }
          })