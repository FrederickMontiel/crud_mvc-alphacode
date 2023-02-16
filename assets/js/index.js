(()=>{
    const send = document.querySelector('#send_contact');

    if (send){
        send.addEventListener('click',(e)=>{

            e.preventDefault();

            const form = new FormData(document.querySelector('#form_contact'));

            fetch(base_url+'contact',{method:'POST',body:form})
                .then(res => {
                    if(res.ok){
                        return res.json();
                    }
                    return Promise.reject(res)
                })
                .then(res => {
                    alert(res.data)
                    location.href = base_url
                }).catch(e => {
                e.json().then(({data}) => {
                    alert(data)
                })
            })

        });
    }


    const deleteContact =  document.querySelectorAll('.delete');
    deleteContact.forEach(contact => {
        contact.addEventListener('click', function handleClick(e) {

            const id = e.target.dataset.id

            fetch(base_url+'contact/'+id,{method:'DELETE'})
                .then(res =>{
                    if(res.ok){
                        return res.json();
                    }
                    return Promise.reject(res)
                }).then(res =>{
                    alert(res.data)
                    e.path[3].remove()
                    window.location.reload()
                }).catch(e => {
                    e.json().then(({data}) => {
                        alert(data)
                    })
                })

        });
    });

    const editContact = document.querySelector('#edit_contact');

    if(editContact){

        editContact.addEventListener('click',e=>{
            e.preventDefault();

            const myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
            const form = new FormData(document.querySelector('#form_contact'));
            const urlencoded = new URLSearchParams(form);

            const requestOptions = {
                method: 'PUT',
                headers: myHeaders,
                body: urlencoded,
                redirect: 'follow'
            };


            fetch(base_url+'contact/'+id_contact,requestOptions)
                .then(res => {
                    if(res.ok){
                        return res.json();
                    }
                    return Promise.reject(res)
                })
                .then(res => {
                    alert(res.data)
                    location.href = base_url
                }).catch(e => {
                e.json().then(({data}) => {
                    alert(data)
                })
            })

        })

    }

})();